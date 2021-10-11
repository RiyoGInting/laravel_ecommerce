<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function store(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->discount == NULL) {
            $price = $product->price;
        } else {
            $price = $product->price - $product->discount;
        }

        Cart::add([
            'id' => $id,
            'name' => $request->productName,
            'qty' => $request->quantity,
            'price' => $price,
            'weight' => 1,
            'options' => [
                'image' => $product->thumbnail,
                'color' => $request->color,
                'size' => $request->size,
            ],
        ]);

        return response()->json(['success' => 'Successfully Added Product to Cart']);
    }

    public function miniCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
        ));
    }

    public function deleteMiniCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Removed From Cart']);
    }
}
