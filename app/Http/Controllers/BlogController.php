<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\blog;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\CategoryController;



class BlogController extends Controller
{
    //get blogs with  search or not 
    public function home(Request $request)
    {
        $keyword = $request->input('keyword');
    
        $query = Blog::where('accepted', 1);
    
        if ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('description', 'like', '%' . $keyword . '%')
                    ->orWhereHas('category', function ($query) use ($keyword) {
                        $query->where('name', 'like', '%' . $keyword . '%');
                    });
            });
        }
    
        $blogs = $query->orderBy('created_at', 'desc')->paginate(9);
    
        return view('index', compact('blogs'));
    }
    
    
    
    

    public function createBlog()
    {
        $categories = Category::all();
        
        if (auth()->user()->is_admin == 1) {
            return view('adminPanel.blog.create', ['categories' => $categories]);
        } else {
            return view('user.blogs.addBlog',['categories'=>$categories]);
        }
    }
    
    

    public function index() 


    { 
        $blogs = blog::orderBy('created_at', 'desc')->paginate(7);; 
        return view('adminPanel.blog.blog', compact('blogs') );
        
    } 

    public function all_blogs_of_user(){
        $userId = auth()->user()->id;
    $blogs = blog::where('user_id', $userId)->paginate(7);
    return view('user.blogs.index', compact('blogs'));

    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        $categoryName = $blog->category->name; // Get the name of the category
    
        if (!auth()->check()) {
            return view('blogDetail', compact('blog', 'categoryName'));
        }
    
        if (auth()->user()->is_admin == 1) {
            return view('adminPanel.blog.showBlog', compact('blog', 'categoryName'));
        } elseif ($blog->user_id == auth()->user()->id) {
            return view('user.blogs.showBlog', compact('blog', 'categoryName'));
        } else {
            return view('blogDetail', compact('blog', 'categoryName'));
        }
    
    
    }


    // store
    public function store(Request $request){
        //    validate
        $request->validate([
            'title'=>'required|max:255',
            'category_id'=>'required',
            
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description'=>'required'

        ]);
        // store image in package in storge->app->public->new folder 
        $image_name='blogs/'.time().rand(0,9999).'.'.$request->image->getClientOriginalExtension();
        $request->image->storeAs('public',$image_name);

        // store
        $user = Auth::user(); // Get the currently authenticated user

        $blog=blog::create([
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'user_id'=>$user->id,
            'image'=>$image_name,
            'description'=>$request->description,


            ]);
            // return response

            return back()->with('success','product saved ');
            }



            public function acceptBlog($id)
            {
                $blog = blog::findOrFail($id);
                $blog->accepted = $blog->accepted == 0 ? 1 : 0;
                $blog->save();
                return redirect()->back();
            }

            public function deleteBlog($id){
                blog::findOrFail($id)->delete();
                return back()->with('success','task deleted');
            }


            public function edit($id){
                
                $blog=blog::findOrFail($id);
                $categories=category::all();
                
                
                if (auth()->user()->is_admin == 1) {
                    return view('adminPanel.blog.updateBlog',['categories'=>$categories] ,['blog'=>$blog]);
                } else {
                    return view('user.blogs.update',['categories'=>$categories] ,['blog'=>$blog]);
                }
                
            }


            public function update(Request $request, $id)
            {
            // Validate the request
            $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'description' => 'required',
            ]);
            // Get the authenticated user's ID
        $userId = Auth::id();

        // Find the blog based on the given ID
        $blog = Blog::findOrFail($id);

        // Check if the authenticated user is the owner of the blog
        if ($blog->user_id === $userId) {
            // Store the image if provided
            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                $imagePath = $request->file('image')->store('blogs', 'public');
                $blog->image = $imagePath;
            }

                    // Update the blog attributes
                    $blog->title = $request->input('title');
                    $blog->category_id = $request->input('category_id');
                    $blog->description = $request->input('description');
                    $blog->accepted = false;

                    // Save the changes to the database
                    $blog->save();

                    // Return a response
                    return back()->with('success', 'Blog updated.');
                } else {
                    // Redirect or show an error message indicating permission denied
                    return redirect()->back()->with('error', 'You are not authorized to update this blog.');
                }
            }





}


    
                
