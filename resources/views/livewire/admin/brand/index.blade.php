<div>
   @include('livewire.admin.brand.modal-form')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title">Brand</h4>
                    <p class="card-description">
                        Brands List
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBrandModal">Add Brand</a>
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
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($manufacturers as $index => $brand)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->name}}</td>
                            <td>{{$brand->slug}}</td>
                            <td>{{$brand->status == '1'?'Hidden':'Visible'}}</td>
                            <td>
                                <a href="#" wire:click="editBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#updateBrandModal" class="btn btn-success">Edit</a>
                                <a href="#" wire:click="deleteBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#deleteBrandModal" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5"> No Brands Found</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
                <div>
                    {!! $manufacturers->links('pagination::bootstrap-4', ['prev_page' => '← Previous', 'next_page' => 'Next→'])
                    !!}
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        window.addEventListener('close-modal',e=>{
            $('#addBrandModal').modal('hide');
            $('#updateBrandModal').modal('hide');
            $('#deleteBrandModal').modal('hide');
        })
    </script>
@endpush
