@extends('master')

@section('content')
    <h1>Create New Mobile</h1>

    <div class="card">
        <div class="card-header">Add Mobile</div>
        <div class="card-body">
            <form method="post" action="{{ route('mobiles.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Mobile Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="mobile_name" class="form-control" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Description</label>
                    <div class="col-sm-10">
                        <input type="text" name="description" class="form-control" />
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form">Maker</label>
                    <div class="col-sm-10">
                        <select name="maker" class="form-control">
                            <option value="Apple">Apple</option>
                            <option value="Samsung">Samsung</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form">Mobile Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="mobile_image" />
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Add" />
                </div>
            </form>
        </div>
    </div>

    <a class="btn btn-primary" href="{{ route('mobiles.index') }}" role="button">Back to Mobile list</a>

@endsection
