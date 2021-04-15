
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Airport Edit') }}
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
                    <form action="{{route('airport_update',['id'=>$airport])}}" method="POST" >
                        @csrf
                        @method('PUT')
                        <strong>Code:</strong>
                        <input type="text" name="code" value="{{$airport->code}}"></input>


                        <strong>City Code:</strong>
                        <input type="text" name="city_code"  value="{{$airport->city_code}}">
                        <strong>Name:</strong>
                        <input type="text" name="name" value="{{$airport->name}}"></input>
                        <br> <br> <br>

                        <strong>City:</strong>
                        <input type="text" name="city"  value="{{$airport->city}}">
                        <strong>Country Code:</strong>
                        <input type="text" name="country_code" value="{{$airport->country_code}}"></input>


                        <strong>Region Code:</strong>
                        <input type="text" name="region_code"  value="{{$airport->region_code}}">
                        <br> <br> <br>
                        <strong>Latitude:</strong>
                        <input type="text" name="latitude" value="{{$airport->latitude}}"></input>


                        <strong>Longitude:</strong>
                        <input type="text" name="longitude" value="{{$airport->longitude}}">
                        <strong>TimeZone:</strong>

                        <input type="text" name="timezone"  value="{{$airport->timezone}}">

                        <br> <br> <br>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
