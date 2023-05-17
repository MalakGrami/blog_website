<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories=category::paginate(3);
        return view('adminPanel.categories.index',compact('categories'));
    }



    public function add(Request $request)
    {
    //    validate
    $request->validate([
        'name'=>'required|unique:categories|max:255'
    ]);
    // store
    $category=new category();
    $category->name=$request->name;
    $category->save();

    // return response
    return back()->with('success','category saved');
    
    }


    public function delete($id){
        category::findOrFail($id)->delete();
        return back()->with('success','category deleted');
    }
}
