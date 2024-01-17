<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Traits\GetIpAddress;
use App\Models\PageConfig;
use App\Models\Slider;
use App\Models\Viewer;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use SEOTools;
    use GetIpAddress;

    public function index()
    { 
       
        return view('front.home');
    }

    public function bio()
    {
  
        return view('front.bio', );
    }
}
