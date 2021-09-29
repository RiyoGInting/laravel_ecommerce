<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name_en', 'ASC')->get();
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->get();
        $featured = Product::where('featured', 1)->orderBy('id', 'DESC')->get();
        $hotDeals = Product::where('hot_deals', 1)->where('discount', '!=', NULL)->orderBy('id', 'DESC')->limit(3)->get();
        $specialOffer = Product::where('special_offer', 1)->orderBy('updated_at', 'DESC')->limit(3)->get();
        $specialDeals = Product::where('special_deals', 1)->orderBy('updated_at', 'DESC')->limit(3)->get();


        return view('frontend.index', compact(
            'categories',
            'sliders',
            'products',
            'featured',
            'hotDeals',
            'specialOffer',
            'specialDeals'
        ));
    }

    public function language($locale)
    {
        session()->get('language');
        session()->forget('language');
        if ($locale == 'en') {
            Session::put('language', 'english');

            // toastr notifications
            $notification = array(
                'message' => 'Language successfully changed to English',
                'alert-type' => 'success'
            );
        } else {
            Session::put('language', 'indonesia');

            // toastr notifications
            $notification = array(
                'message' => 'bahasa berhasil di ubah ke bahasa indonesia',
                'alert-type' => 'success'
            );
        }

        return redirect()->back()->with($notification);
    }
}
