@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row">
     <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="title" name="name"
                placeholder="inserisci categoria">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection
