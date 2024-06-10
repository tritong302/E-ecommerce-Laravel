@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">Color</h4>
                    <p class="card-description">
                        Add Color
                    </p>
                    <form action="{{url('admin/color')}}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Name" name="name">
                            @error('name') <small style="color: red">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Code</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" name="code">
                            @error('email') <small style="color: red">{{$message}}</small> @enderror
                        </div>
                        <div class="form-check form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" checked name="status">
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
