<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;


class TripController extends Controller
{
    /**
     * Building tour to show in the front
     * Reference One in outboud flight info and two is inbound flight info if the trip is round
     * fetching roundway data
     * merging based on the conditions date timezone, and providing a new data structure for trip.
     * if the trip is round way but but there is no inbound flight it shows the inbound flights
     * for each round trip it matches the time zone. if it is possible on or not. and execute in that way.
     * It will gives an error if the client choese arrival day before the departure day
     * it returns the all matching if hte day is different
     * one way trip option
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function build(Request $request)
    {
            $response = $request->all();

            $round_way = NULL;
            $trip = [];
            //fetching roundway data
            if($response['two_way'] == 'true'){

                $round_way = $this->searchflight($response['arrival_from'],$response['deperture_from']);
            }
            $sort=$response['by_price'];
            //one way data fetching
            $one_ways = $this->searchflight($response['deperture_from'],$response['arrival_from']);
            $count =0;
            //merging based on the conditions date timezone, and providing a new data structure for trip.
            foreach ($one_ways as $one_way){
                if($response['two_way']== 'true'){
                    // if the trip is round way but but there is no inbound flight it shows the inbound flights
                    if($round_way==NULL){
                        $trip[$count]['one']=$one_way;
                        $trip[$count]['round']=$response['two_way'];
                        $trip[$count]['two'] = NULL;
                        $trip[$count]['total']=$one_way->price;
                        $count++;
                    }else{
                        foreach ($round_way as $way){
                            //for each round trip it matches the time zone. if it is possible on or not. and exicute in that way.
                            if(new \DateTime($response['start_date'])!=new \DateTime($response['retun_date']) &&
                            new \DateTime($response['start_date']) < new \DateTime($response['retun_date'])
                            ){
                                $trip[$count]['one']=$one_way;
                                $trip[$count]['round']=$response['two_way'];
                                $trip[$count]['two'] = $way;
                                $trip[$count]['total']=$one_way->price + $way->price;
                                $count++;
                            }elseif(new \DateTime($response['start_date']) > new \DateTime($response['retun_date'])){
                                // It will gives an error if the client choese arrival day before the departure day
                                return response()->json(["message"=>"Check the dates"],404);
                            }
                            else{
                                // it returns the all matching if hte day is different
                                $timezone_to = DB::table('airports')->where('code',  $response['arrival_from'])->value('timezone');
                                $date = new \DateTime($response['retun_date'].' '.$way->departure_time, new \DateTimeZone($timezone_to));
                                $date->setTimezone(new \DateTimeZone('UTC'));
                                $back_date = $date->format('Y-m-d H:i:sP');

                                $timezone_from = DB::table('airports')->where('code',  $response['deperture_from'])->value('timezone');
                                $date_from = new \DateTime($response['start_date'].' '.$one_way->arrival_time, new \DateTimeZone($timezone_from));
                                $date_from->setTimezone(new \DateTimeZone('UTC'));
                                $fromdate = $date_from->format('Y-m-d H:i:sP');
                                $one_way->updated_at = $fromdate;
                                $way->updated_at = $back_date;
                                if($fromdate<$back_date){
                                    $trip[$count]['one']=$one_way;
                                    $trip[$count]['round']=$response['two_way'];
                                    $trip[$count]['two'] = $way;
                                    $trip[$count]['total']=$one_way->price + $way->price;
                                    $count++;
                                }
                            }
                        }
                    }
                }else{

                    // one way trip option
                    $trip[$count]['one']=$one_way;
                    $trip[$count]['round']=$response['two_way'];
                    $trip[$count]['two'] = NULL;
                    $trip[$count]['total']=$one_way->price;
                    $count++;
                }
            }
            //sorting by price
            if($sort== 'true'){
                usort($trip, function($a, $b) {
                    return $a["total"] <=> $b["total"];
                });
            }
        $trip = $this->paginate($trip);

        return $trip;

    }


    public function searchflight($start,$end){
        $flights = DB::table('flights')
            ->where('departure_airport', '=', $start)
            ->where('arrival_airport', '=', $end)
            ->get();

        return $flights;

    }

    /**

     * Custom Pagingnation create

     *

     * @var array

     */

    public function paginate($items, $perPage = 10, $page = null, $options = [])

    {

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);

    }
    /**
     * Building tour to show details in the front
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function individual(Request $request)
    {
        $response = $request->all();
        $one_airline = $response['airline'];
        $one_airline_number = $response['number'];

        $two_airline = $response['twoairline'];
        $two_airline_number = $response['twonumber'];
        $flight_two=NULL;

        $two_way = $response['two_way'];

        $flight_one = DB::table('flights')
            ->where('airline', '=', $one_airline)
            ->where('number', '=', $one_airline_number)
            ->get();

        if($two_way== 'true'){
            $flight_two = DB::table('flights')
                ->where('airline', '=', $one_airline)
                ->where('number', '=', $one_airline_number)
                ->get();
        }
        $trip = ['departure'=>$flight_one, 'arrival'=>$flight_two];

        return $trip;
    }
}
