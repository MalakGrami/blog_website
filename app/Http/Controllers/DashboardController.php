<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DashboardController extends Controller
{
    //
        // dashboard
        public function blog_in_day()
{
    $blogs = Blog::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
        ->whereDate('created_at', '<=', Carbon::now()->format('Y-m-d'))
        ->groupBy('date')
        ->pluck('count', 'date')
        ->toArray();

    $labels = [];
    $data = [];
    $start = Carbon::now()->subDays(29)->format('Y-m-d');

    $currentDate = Carbon::parse($start);
    while ($currentDate < Carbon::now()) {
        $labels[] = $currentDate->format('Y-m-d');
        $data[] = $blogs[$currentDate->format('Y-m-d')] ?? 0;
        $currentDate->addDay();
    }

    $chartData = [
        'labels' => $labels,
        'data' => $data,
    ];

    return $chartData;
}


        public function blog_with_category()
        {
            $blogs = Blog::select('category_id', DB::raw('count(*) as count'))
                ->groupBy('category_id')
                ->pluck('count', 'category_id')
                ->toArray();
        
            $categoryChartData = [];
            
            foreach ($blogs as $categoryId => $count) {
                $categoryName = Category::find($categoryId)->name;
                $categoryChartData[$categoryName] = $count;
            }
        
            return $categoryChartData;
        }

                    // Retrieve the number of blogs created today
                    public function blogsCreatedToday()
            {
                $blogsCount = Blog::whereDate('created_at', Carbon::today())->count();
                return $blogsCount;
            }

            // Retrieve the number of accepted blogs
            public function acceptedBlogsCount()
            {
                $acceptedBlogsCount = Blog::where('accepted', 1)->count();
                    return $acceptedBlogsCount;
            }


            // Retrieve the number of blogs in pending (not accepted) status:

            public function pendingBlogsCount()
            {
                $pendingBlogsCount = Blog::where('accepted', 0)->count();
                return $pendingBlogsCount;
            }
                    

            // Retrieve the number of all users
            public function allUsersCount()
            {
                $usersCount = User::count();
                return $usersCount;
            }
            // include the functions and pass their values to the view

        public function getDashboardData()
        {
            $blog_in_day = $this->blog_in_day();
            $blog_with_category = $this->blog_with_category();
            $blogsCreatedToday = $this->blogsCreatedToday();
            $acceptedBlogsCount = $this->acceptedBlogsCount();
            $pendingBlogsCount = $this->pendingBlogsCount();
            $allUsersCount = $this->allUsersCount();
        
            return view('adminPanel.dashboard', compact('blog_in_day', 'blog_with_category', 'blogsCreatedToday', 'acceptedBlogsCount', 'pendingBlogsCount', 'allUsersCount'));
        }
}
