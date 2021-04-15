
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Flights Edit') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{route('flight_update', ['id'=>$flight])}}" method="POST" >
                        @csrf
                        @method('PUT')
                        <strong>Airline Code:</strong>
                        <input type="text" name="airline" value="{{$flight->airline}}"></input>



                        <strong>Flight Number:</strong>
                        <input type="text" name="number" value="{{$flight->number}}"></input>
                        <strong>Departure Airport Code:</strong>
                        <input type="text" name="departure_airport"  value="{{$flight->departure_airport}}">
                        <br> <br> <br>

                        <strong>Departure Time:</strong>
                        <input type="text" name="departure_time" value="{{$flight->departure_time}}"></input>


                        <strong>Arrival Airport Code:</strong>
                        <input type="text" name="arrival_airport"  value="{{$flight->arrival_airport}}">

                        <strong>Arrival Time:</strong>
                        <input type="text" name="arrival_time" value="{{$flight->arrival_time}}"></input>
                        <br> <br> <br>

                        <strong>Price:</strong>
                        <input type="text" name="price"  value="{{$flight->price}}">

                        <br> <br> <br>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
