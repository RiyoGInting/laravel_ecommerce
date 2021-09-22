<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubLevel;
use App\Models\Brand;
use App\Models\MultiImage;
use Image;

class ProductController extends Controller
{
    public function addIndex()
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();

        return view('admin.products.add', compact('categories', 'subcategories', 'brands'));
    }

    public function store(Request $request)
    {

        // validation
        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'sublevel_id' => 'required',
            'name_en' => 'required',
            'name_id' => 'required',
            'code' => 'required',
            'quantity' => 'required',
            'tags_en' => 'required',
            'tags_id' => 'required',
            'color_en' => 'required',
            'color_id' => 'required',
            'price' => 'required',
            'short_description_en' => 'required',
            'short_description_id' => 'required',
            'long_description_en' => 'required',
            'long_description_id' => 'required',
            'thumbnail' => 'required',
        ], [
            'brand_id.required' => 'The brand field is required.',
            'category_id.required' => 'The category field is required.',
            'subcategory_id.required' => 'The subcategory field is required.',
            'sublevel_id.required' => 'The sublevel field is required.',
        ]);

        // upload image
        $image = $request->file('thumbnail');
        $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/product/thumbnail/' . $image_name);
        $path = 'upload/product/thumbnail/' . $image_name;

        // create a new product
        $product = new Product;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->sublevel_id = $request->sublevel_id;

        $product->name_en = $request->name_en;
        $product->name_id = $request->name_id;
        $product->slug_en = strtolower(str_replace(' ', '-', $request->name_en));
        $product->slug_id = strtolower(str_replace(' ', '-', $request->name_id));
        $product->code = $request->code;

        $product->quantity = $request->quantity;
        $product->tags_en = $request->tags_en;
        $product->tags_id = $request->tags_id;
        $product->size_en = $request->size_en;
        $product->size_id = $request->size_id;

        $product->color_en = $request->color_en;
        $product->color_id = $request->color_id;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->thumbnail = $path;

        $product->short_description_en = $request->short_description_en;
        $product->short_description_id = $request->short_description_id;
        $product->long_description_en = $request->long_description_en;
        $product->long_description_id = $request->long_description_id;
        $product->hot_deals = $request->hot_deals;

        $product->featured = $request->featured;
        $product->special_offer = $request->special_offer;
        $product->special_deals = $request->special_deals;
        $product->status = 1;

        // save product to db
        $product->save();

        // multi image upload
        $images = $request->file('multi-image');
        foreach ($images as $img) {
            $img_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/product/multi-image/' . $img_name);
            $upload_path = 'upload/product/multi-image/' . $img_name;


            // create multi-image
            $multi_image = new MultiImage;
            $multi_image->product_id = $product->id;
            $multi_image->image = $upload_path;

            // save multi-image to db
            $multi_image->save();
        }

        // toastr notifications
        $notification = array(
            'message' => 'Product has been successfully added',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
