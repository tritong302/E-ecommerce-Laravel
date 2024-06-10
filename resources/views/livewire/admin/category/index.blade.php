<div>
@if(session('message'))
    <h6 class="alert alert-success">{{session('message')}}</h6>
@endif
    <div wire:ignore.self class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Category Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body">
                        Are you sure want to delete this data?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes. Delete</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title">Category</h4>
                    <p class="card-description">
                        Categories List
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                <a href="{{url('/admin/add-category')}}" class="btn btn-primary text-white">Add Category</a>
                </div>
            </div>

            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Id</th>
                        <th>Name </th>
                        <th>Slug</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($category_product as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{$item->id}}</td>
                            <td>{{$item->cate_name}}</td>
                            <td>{{$item->cate_slug}}</td>
                            <td>
                                    @if($item->cate_banner)
                                        <img src="{{ asset('/uploads/category/'.$item->cate_banner) }}" alt="image" style="width: auto; height: 50px">
                                    @endif
                            </td>
                            <td>{{$item->status == '1'?'Hidden':'Visible'}}</td>
                            <td>
                                <a href="{{url('admin/category/'.$item->id.'/edit')}}" class="btn btn-success">Edit</a>
                                <a href="#" wire:click="deleteCategory({{$item->id}})" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    {!! $category_product->links('pagination::bootstrap-4', ['prev_page' => '← Previous', 'next_page' => 'Next→'])
                !!}
                </div>
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
