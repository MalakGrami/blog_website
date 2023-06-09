<?php

namespace App\Http\Controllers;
use App\Models\blog;
use App\Models\category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    //
    public function index()
{
   
        $categories = Category::paginate(3);
        return view('adminPanel.categories.index', compact('categories'));
   
}
public function allcategories()
{
   
    $categories = Category::all();
    return view('nav')->with('categories', $categories);

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
