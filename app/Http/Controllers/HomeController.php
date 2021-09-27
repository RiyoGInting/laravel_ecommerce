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

        return view('frontend.index', compact(
            'categories',
            'sliders',
            'products'
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
