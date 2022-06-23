@extends('layouts.admin')
@section('content')

<form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <h1>modifica dati</h1>
  <div class="mb-3">
    <label for="name" class="form-label">name</label>
    <input type="text" class="form-control" placeholder="inserisci categoria" id="name" name="name" value="{{ $category->name }}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
    
@endsection