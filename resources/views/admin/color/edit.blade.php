@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">Color</h4>
                    <p class="card-description">
                        Edit Color
                    </p>
                    <form action="{{url('admin/color/'.$colors->id)}}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Name" name="name" value="{{$colors->name}}">
                            @error('name') <small style="color: red">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Code</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" name="code" value="{{$colors->code}}">
                            @error('email') <small style="color: red">{{$message}}</small> @enderror
                        </div>
                        <div class="">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" checked name="status" {{$colors->status ? 'checked':''}}>
                                Status
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

