<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index()
    {
        return view('frontend.wishlist.index');
    }

    public function store(Request $request, $productId)
    {
        if (Auth::check()) {
            $isExists = Wishlist::where('user_id', Auth::id())
                ->where('product_id', $productId)->first();

            if ($isExists) {
                return response()->json(['error' => 'Product Already in your wishlist']);
            }

            // create new wishlist
            $wishlist = new Wishlist;
            $wishlist->user_id = Auth::id();
            $wishlist->product_id = $productId;
            $wishlist->save();

            return response()->json(['success' => 'Product Added to wishlist']);
        } else {
            return response()->json(['error' => 'Please login first to add product to wishlist']);
        }
    }

    public function getAll()
    {
        $wishlists = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();

        return response()->json($wishlists);
    }

    public function delete($id)
    {
        Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();

        return response()->json(['success' => 'Product removed from wishlist']);
    }
}
