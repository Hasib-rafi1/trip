
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Flight Add') }}
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
                    <form action="{{route('flight_store')}}" method="POST" >
                        @csrf
                        <strong>Airline Code:</strong>
                        <input type="text" name="airline" placeholder="Airline Code"></input>



                        <strong>Flight Number:</strong>
                        <input type="text" name="number" placeholder="Flight Number"></input>
                        <strong>Departure Airport Code:</strong>
                        <input type="text" name="departure_airport"  placeholder="Departure Airport Code">
                        <br> <br> <br>

                        <strong>Departure Time:</strong>
                        <input type="text" name="departure_time" placeholder="Departure Time"></input>


                        <strong>Arrival Airport Code:</strong>
                        <input type="text" name="arrival_airport"  placeholder="Arrival Airport Code">

                        <strong>Arrival Time:</strong>
                        <input type="text" name="arrival_time" placeholder="Arrival Time"></input>
                        <br> <br> <br>

                        <strong>Price:</strong>
                        <input type="text" name="price"  placeholder="Price">

                        <br> <br> <br>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
