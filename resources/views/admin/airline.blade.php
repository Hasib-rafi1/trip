<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Airlines') }}
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
        <a href="{{route('airlines_create')}}" > Create </a>
        <table style="width: 100%">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            @foreach ($airlines as $airline)
                <tr style="text-align: center">
                    <td>{!! $airline->code; !!}</td>
                    <td>{!! $airline->name; !!}</td>
                    <td>
                        <form action="{{route('airlines_delete',['id'=>$airline])}}" method="POST">


                            <a href="{{route('airlines_edit', ['id'=> $airline])}}">
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

        {!! $airlines->links() !!}
        </div>
    </div>
</x-app-layout>
