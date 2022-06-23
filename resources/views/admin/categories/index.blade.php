@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Crea nuova category</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Creation Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td><a href="{{ route('admin.categories.show', $category->id) }}">{{ $category->id }}</a></td>
                    <td><a href="{{ route('admin.categories.show', $category->id) }}"> {{ $category->name }}</a></td>
                    <td>{{ $category->created_at }}</td>
                    <td><a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary">Modifica</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                            @csrf
                            @method('DELETE')


                            <button type="submit" class="btn btn-danger">
                                Elimina
                            </button>


                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
