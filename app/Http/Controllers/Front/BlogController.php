<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Traits\GetIpAddress;
use App\Models\Blog;
use App\Models\PageConfig;
use App\Models\Viewer;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use SEOTools;
    use GetIpAddress;

    public function index()
    {

        return view('front.blog.index');
    }

    public function show($slug)
    {

        $blogAside = Blog::inRandomOrder()->limit(3)->get();
        $blog = Blog::where('slug', '=', $slug)->firstOrFail();
        return view('front.blog.show', compact('blog', 'blogAside'));
    }
}
