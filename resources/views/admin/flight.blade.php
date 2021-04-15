<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Flights') }}
        </h2>
    </x-slot>

@section('content')



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p></p>
            </div>
        @endif
        <a href="{{route('flight_create')}}" > Create </a>
        <table style="width: 100%">
            <tr>
                <th>Airline Code</th>
                <th>Flight Number</th>
                <th>Departure Airport</th>
                <th>Departure Time</th>
                <th>Arrival Airport</th>
                <th>Arrival Time</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            @foreach ($flights as $flight)
                <tr style="text-align: center">
                    <td>{!! $flight->airline; !!}</td>
                    <td>{!! $flight->number; !!}</td>
                    <td>{!! $flight->departure_airport; !!}</td>
                    <td>{!! $flight->departure_time; !!}</td>
                    <td>{!! $flight->arrival_airport; !!}</td>
                    <td>{!! $flight->arrival_time; !!}</td>
                    <td>{!! $flight->price; !!}</td>
                    <td>
                        <form action="{{route('flight_delete',['id'=>$flight])}}" method="POST">


                            <a href="{{route('flight_edit', ['id'=> $flight])}}">
                                <i class="fas fa-edit  fa-lg">EDIT</i>
                            </a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                <i class="fas fa-trash fa-lg text-danger"> Delete</i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $flights->links() !!}
        </div>
    </div>
</x-app-layout>
