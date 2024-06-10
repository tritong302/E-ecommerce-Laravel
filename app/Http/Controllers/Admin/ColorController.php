<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.color.index',compact('colors'));
    }
    public function create()
    {
        return view('admin.color.create');
    }
    public function store(ColorFormRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1':'0';
        Color::create($validatedData);
        return redirect('admin/color')->with('message','Color Added Successfully');
    }
    public function edit(Color $colors)
    {
    return view('admin.color.edit',compact('colors'));
    }
    public function update(ColorFormRequest $request, $colors)
    {
        $validatedData = $request->validated();
       $validatedData['status'] = $request->status == true ? '1':'0';
        Color::find($colors)->update($validatedData);
        return redirect('admin/color')->with('message','Color Updated Successfully');
    }
    public  function destroy($colors)
    {
    $colors = Color::find($colors);
    $colors->delete();
    return redirect('admin/color')->with('message','Color Deleted Successfully');
    }
}
