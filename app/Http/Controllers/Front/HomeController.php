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
        $sliderBanners = Slider::all();

        if (count($sliderBanners) == 0) {
            $sliderBanner = [
                'title' => 'Herón Pazzi',
                'description' => 'Médico Veterinario Zootecnista, dedicado a la clínica y cirugía de perros y gatos. Ex académico de la FMVZ UNAM y de la FCN UAQ. Conferencista y amante de los perros y su bienestar.'
            ];
        }else{
            $activeSliderBanner = $sliderBanners->where('status',1)->first();
            if (!$activeSliderBanner) {
                $sliderBanner = Slider::orderBy('id', 'desc')->first()->toArray();
            }else{
                $sliderBanner = $activeSliderBanner;
            }
        }

        return view('front.home')->with([
            'sliderBanner' => $sliderBanner,
        ]);
    }

    public function bio()
    {

        return view('front.bio', );
    }
}
