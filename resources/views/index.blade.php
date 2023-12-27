@extends('master')

@section('content')
    <h1>Mobile List</h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Maker</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        @if(count($data) > 0)
            @foreach($data as $row)

                <tr>
                    <th scope="row">{{ $row->id }} </th>
                    <td>{{ $row->mobile_name }}</td>
                    <td>{{ $row->description }}</td>
                    <td>{{ $row->maker }}</td>
                    <td>${{ $row->price }}</td>
                    <td><img src="images/{{ $row->mobile_image }}" height="40" width="40"></td>
                    <td><a href="{{ route('mobiles.show', $row->id) }}">Detail</a></td>
                </tr>

            @endforeach
        @else
            <tr>
                <td colspan="5" class="text-center">No Data Found</td>
            </tr>
        @endif

        </tbody>
    </table>

    <a class="btn btn-primary" href="mobiles/create" role="button">Create Mobile</a>
    <a class="btn btn-primary" href="cart" role="button">Show shopping cart</a>

@endsection
