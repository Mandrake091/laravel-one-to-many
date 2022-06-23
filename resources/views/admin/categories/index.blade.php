@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Crea nuovo post</a>
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
                    <td><a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary">Modifica</a></td>

                    <form id="form" action="{{ route('admin.categories.destroy', $category->id) }}" method="category">
                        @csrf
                        @method('DELETE')
                        <td>
                        <a href="{{ route('admin.categories.destroy', $category->id)}}" method="POST">
                          <button type="submit" class="btn btn-danger">
                          Elimina
                          </button>
                        </a>
                        </td>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
