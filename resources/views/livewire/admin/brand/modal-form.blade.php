<div wire:ignore.self class="modal fade" id="addBrandModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Brands</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="storeBrand()">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name">Brand Name</label>
                        <input type="text" wire:model.defer="name" class="form-control" name="name">
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Brand Slug</label>

                        <input type="text"  wire:model.defer="slug" class="form-control" name="slug">
                    @error('slug')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="status" wire:model.defer="status">
                        Status
                    </label>
                    @error('status')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div wire:ignore.self class="modal fade" id="updateBrandModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Brands</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div wire:loading class="p-2">
            <div class="spinner-border" role="status">
              <span class="visually-hidden">Loading...</span>

            </div>
            </div wire:loading.remove>
            <form wire:submit.prevent="updateBrand()">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name">Brand Name</label>
                        <input type="text" wire:model.defer="name" class="form-control" name="name">
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Brand Slug</label>

                        <input type="text"  wire:model.defer="slug" class="form-control" name="slug">
                    @error('slug')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="status" wire:model.defer="status">
                        Status
                    </label>
                    @error('status')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="deleteBrandModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Brand</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div wire:loading class="p-2">
            <div class="spinner-border" role="status">
              <span class="visually-hidden">Loading...</span>

            </div>
            </div wire:loading.remove>
            <form wire:submit.prevent="destroyBrand">
            <div class="modal-body">
                <h4>Are you sure want to delete this data ?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Yes. Delete</button>
            </div>
            </form>
        </div>
    </div>
</div>
