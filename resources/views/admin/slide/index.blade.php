@extends('layouts.admin')
@section('content')
    <div>
        @if(session('message'))
            <h6 class="alert alert-success">{{session('message')}}</h6>
        @endif


        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title">Slide</h4>
                        <p class="card-description">
                            Slide List
                        </p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <a href="{{url('/admin/add-slide')}}" class="btn btn-primary text-white">Add Slide</a>
                    </div>
                </div>

                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Id</th>
                            <th>Name </th>
                            <th>Link</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($slide as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->link}}</td>
                                <td>
                                    @if($item->image)
                                        <img src="{{ asset('/uploads/slide/'.$item->image) }}" alt="image" style="width: auto; height: 50px">
                                    @endif
                                </td>
                                <td>{{$item->status == '1'?'Hidden':'Visible'}}</td>
                                <td>
                                    <a href="{{url('admin/slide/'.$item->id.'/edit')}}" class="btn btn-success">Edit</a>
                                    <a href="{{'/admin/slide/'.$item->id.'/delete'}}" onclick="return confirm('Are you sure want to delete this data ?')" class="btn btn-danger" >Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
{{--                    <div>--}}
{{--                        {!! $slide->links('pagination::bootstrap-4', ['prev_page' => '← Previous', 'next_page' => 'Next→'])--}}
{{--                    !!}--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            window.addEventListener('close-modal',e=>{
                $('#deleteModal').modal('hide');
            })
        </script>
    @endpush

@endsection