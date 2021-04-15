<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Airports') }}
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
        <a href="{{route('airport_create')}}" > Create </a>
        <table style="width: 100%">
            <tr>
                <th>Code</th>
                <th>City Code</th>
                <th>Name</th>
                <th>Country Code</th>
                <th>Region</th>
                <th>Timezone</th>
                <th>Actions</th>
            </tr>
            @foreach ($airports as $airport)
                <tr style="text-align: center">
                    <td>{!! $airport->code; !!}</td>
                    <td>{!! $airport->city_code; !!}</td>
                    <td>{!! $airport->name; !!}</td>
                    <td>{!! $airport->country_code; !!}</td>
                    <td>{!! $airport->region_code; !!}</td>
                    <td>{!! $airport->timezone; !!}</td>
                    <td>
                        <form action="{{route('airport_delete',['id'=>$airport])}}" method="POST">


                            <a href="{{route('airport_edit', ['id'=> $airport])}}">
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

        {!! $airports->links() !!}
        </div>
    </div>
</x-app-layout>
