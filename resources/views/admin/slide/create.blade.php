@extends('layouts.admin');
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title">ADD SLIDE</h4>
                    <p class="card-description">
                        ADD SLIDE
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                <a href="{{url('/admin/slide')}}" class="btn btn-primary text-white">Back</a>
                </div>
            </div>

            <form action="{{url('/admin/slide')}}" class="forms-sample" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputUsername1">Title</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Name" name="title">
                    @error('cate_name') <small style="color: red;">{{$message}}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Link</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Slug" name="link">
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Position</label>
                    <select class="form-control" id="exampleFormControlSelect2" name="position">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-check form-check-flat form-check-primary">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="status">
                        Status
                    </label>
                </div>
                <button type="submit" class="btn btn-primary me-2 text-white">Submit</button>
                <a href="{{url('/admin/slide')}}" type="button" class="btn btn-light" >Cancel</a>
            </form>
        </div>
    </div>
@endsection