@extends('layouts.admin');
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title">ADD CATEGORY</h4>
                    <p class="card-description">
                        ADD CATEGORY
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                <a href="{{url('/admin/category')}}" class="btn btn-primary text-white">Back</a>
                </div>
            </div>

            <form action="{{url('/admin/category')}}" class="forms-sample" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputUsername1">Name</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Name" name="cate_name">
                    @error('cate_name') <small style="color: red;">{{$message}}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Slug</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Slug" name="cate_slug">
                </div>

                <div class="form-group">
                    <label>Banner</label>
                    <input type="file" name="cate_banner">

                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Parent Id</label>
                    <select class="form-control" id="exampleFormControlSelect2" name="parent_id">
                        <option value="1">1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-check form-check-flat form-check-primary">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="status">
                        Status
                    </label>
                </div>
                <button type="submit" class="btn btn-primary me-2 text-white">Submit</button>
                <a href="{{url('/admin/category')}}" type="button" class="btn btn-light" >Cancel</a>
            </form>
        </div>
    </div>
@endsection