@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                     <a href="{{route('admin.posts.index')}}">Tutti i post</a>
                     <a href="{{route('admin.categories.index')}}">Tutte le categories</a>
                    <i class="fa-solid fa-house"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
