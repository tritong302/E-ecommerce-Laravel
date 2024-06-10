<?php

namespace App\Livewire\Admin\Category;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;
use App\Models\CategoryProduct;
use Livewire\Component;

class Index extends Component
{
    use WithPagination;
    protected $paginationThem = 'bootstrap';
    public $category_id;
    public function deleteCategory($category_id){
        $this->category_id=$category_id;
    }
public function destroyCategory(){
      $category =  CategoryProduct::find($this->category_id);
      
        $category->delete();
        session()->flash('message','Category Deleted');
        $this->dispatch('close-modal');
}
    public function render()
    {

        $category_product = CategoryProduct::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.category.index',['category_product'=>$category_product]);
    }
}
