@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Add User
                        <a class="btn btn-danger btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <h4 class="card-title">User</h4>
                    <p class="card-description">
                        Add User
                    </p>
                    <form action="{{url('admin/user/'.$user->id)}}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Name" name="name" value="{{$user->name}}">
                            @error('name') <small style="color: red">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" value="{{$user->email}}">
                            @error('email') <small style="color: red">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phone</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Phone" name="phone" value="{{$user->phone}}">
                            @error('phone') <small style="color: red">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" >
                            @error('password') <small style="color: red">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" name="password_confirmation">
                            @error('password_confirmation') <small style="color: red">{{$message}}</small> @enderror
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{asset('/uploads/user/'.$user->image)}}" style="width: 100px; height: auto" alt="image">

                        </div>

                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
