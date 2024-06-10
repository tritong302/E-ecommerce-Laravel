<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlideRequest;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SlideController extends Controller
{
    public function index(){
       $slide = Slide::all();
        return view('admin.slide.index',compact('slide'));
    }
    public function create(){
        return view('admin.slide.create');
    }
    public function store(SlideRequest $request){
        $validated = $request->validated();
        $slide = new Slide();
        $slide->title = $validated['title'];
        $slide->link = $validated['link'];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('uploads/slide/', $fileName);
            $slide->image = $fileName;
        }
        $slide->status = $request->status == true ? '1' : '0';
        $slide->position = $request->position;
        $slide->save();
        return redirect()->route('slide');
    }
    public function edit(Slide $slide){
        return view('admin.slide.edit',compact('slide'));
    }
    public function update(SlideRequest $request, $slide){
        $validated = $request->validated();
        $slide = Slide::findOrFail($slide);
        $slide->title = $validated['title'];
        $slide->link = $validated['link'];
        if ($request->hasFile('image')) {
            $path = 'uploads/slide/' . $slide->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('uploads/slide/', $fileName);
            $slide->image = $fileName;
        }
            $slide->status = $request->status == true ? '1' : '0';
        $slide->position = $request->position;
        $slide->update();
        return redirect('admin/slide')->with('message', 'Slide Updated Successfully');
    }
    public function destroy(int $slideId){
        $slide = Slide::findOrFail($slideId);

        $slide->delete();

        return redirect()->route('slide')->with('message', 'Slide deleted Successfully');
    }
}