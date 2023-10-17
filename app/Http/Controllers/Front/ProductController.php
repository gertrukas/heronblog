<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Traits\GetIpAddress;
use App\Models\Category;
use App\Models\PageConfig;
use App\Models\Product;
use App\Models\Viewer;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    use SEOTools;
    use GetIpAddress;

    public function index($slug)
    {

        $ip = $this->getIp() ?? 'UNKNOWN';
        $viewer = Viewer::where('ip', $ip)->first();
        if ($viewer) {
            $viewer->count =  $viewer->count + 1;
            $viewer->save();
        } else {
            $viewer = new Viewer();
            $viewer->count = 1;
            $viewer->ip = $ip ?? 'UNKNOWN';
            $viewer->country =  getIpCountry($ip) ?? 'UNKNOWN';
            $viewer->save();
        }
        $category = Category::where('slug', '=', $slug)->firstOrFail();
        $url = url()->current();
        $urlBase = url('/');

        $this->seo()->setTitle($category->name);
        $this->seo()->setDescription($category->description);
        $this->seo()->addImages([$urlBase . '/storage/' . $category->url_image]);
        $this->seo()->opengraph()->setUrl($url);
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->jsonLd()->setType('Article');
        $pageConfig =  PageConfig::first();

        return view('front.products', compact('category', 'pageConfig'));
    }

    public function show($slug)
    {

        $ip = $this->getIp() ?? 'UNKNOWN';
        $viewer = Viewer::where('ip', $ip)->first();
        if ($viewer) {
            $viewer->count =  $viewer->count + 1;
            $viewer->save();
        } else {
            $viewer = new Viewer();
            $viewer->count = 1;
            $viewer->ip = $ip ?? 'UNKNOWN';
            $viewer->country =  getIpCountry($ip) ?? 'UNKNOWN';
            $viewer->save();
        }

        $book = Product::where('slug', '=', $slug)->firstOrFail();
        $name = config('globals.categories.' . $book->category_id . '.name');
        $quantity = 5;
        $url = url()->current();
        $urlBase = url('/');

        $this->seo()->setTitle($book->title);
        $this->seo()->setDescription($book->description);
        $this->seo()->addImages([$urlBase . '/storage/' . $book->url_image]);
        $this->seo()->opengraph()->setUrl(route('product.show', $book->slug));
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->jsonLd()->setType('Article');
        $this->seo()->jsonLd()->addImage($urlBase . '/storage/' . $book->url_image);


        $pageConfig =  PageConfig::first();
        return view('front.product', compact('book', 'name', 'quantity', 'pageConfig'));
    }
}
