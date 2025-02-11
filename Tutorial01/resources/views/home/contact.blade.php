@extends('layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p class="lead">{{ $description }}</p>
            </div>
        </div>
    </div>
@endsection
