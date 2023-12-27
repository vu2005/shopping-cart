@extends('master')

@section('content')

    <div class="card">
        <h5 class="card-header">{{ $mobile->mobile_name }}</h5>
        <div class="card-body">
            <h5 class="card-title">{{ $mobile->maker }}</h5>
            <img src="{{ asset('images/' . $mobile->mobile_image) }}" height="200" width="200">
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="{{ url('add-to-cart/'. $mobile->id) }}" class="btn btn-primary">Add to cart</a>
        </div>
    </div>
    <p></p>
    <a class="btn btn-primary" href="{{ route('mobiles.index') }}" role="button">Back to Mobile list</a>

@endsection('content')


