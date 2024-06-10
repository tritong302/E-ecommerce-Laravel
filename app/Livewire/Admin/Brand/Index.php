<?php

namespace App\Livewire\Admin\Brand;

use App\Models\Manufactures;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginateTheme = 'bootstrap';
    public $name, $slug, $status,$id;
    public function rules(){
        return [
            'name'=>'required|string',
            'slug'=>'required|string',
            'status'=>'nullable'
        ];
    }
    public function resetInput(){
        $this->name=null;
        $this->slug=null;
        $this->status=null;
        $this->id = null;
    }
     public function closeModal(){
        $this->resetInput();
        }
        public function openModal(){

        }
     public function editBrand(int $id){
     $this->id = $id;
     $manufacturers = Manufactures::findOrFail($id);
        $this->name = $manufacturers->name;
        $this->slug = $manufacturers->slug;
        $this->status = $manufacturers->status;
     }
    public function storeBrand(){
    $validatedData = $this->validate();
    Manufactures::create([
        'name'=>$this->name,
        'slug'=>Str::slug($this->slug),
        'status'=>$this->status == true ? '1':'0',
    ]);
    session()->flash('message','Brand Added Successfully');
    $this->dispatch('close-modal');
    $this->resetInput();
    }
    public function updateBrand(){
     $validatedData = $this->validate();
        Manufactures::findOrFail($this->id)->update([
            'name'=>$this->name,
            'slug'=>Str::slug($this->slug),
            'status'=>$this->status == true ? '1':'0',
        ]);
        session()->flash('message','Brand Updated Successfully');
        $this->dispatch('close-modal');
        $this->resetInput();
    }
    public function deleteBrand($id){
    $this->id = $id;
    }
    public function destroyBrand(){
    Manufactures::find($this->id)->delete();
     session()->flash('message','Brand Deleted Successfully');
            $this->dispatch('close-modal');
            $this->resetInput();
    }
    public function render()
    {
        $manufacturers = Manufactures::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.brand.index',['manufacturers'=>$manufacturers])
            ->extends('layouts.admin')
            ->section('content');
    }
}
