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
    public function index()
    {
        $products = Product::latest()->get();

        return view('admin.products.index', compact('products'));
    }

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

        $product->featured = $request->featured;
        $product->special_offer = $request->special_offer;
        $product->special_deals = $request->special_deals;
        $product->status = 1;

        if ($request->discount) {
            $percentage = ($request->discount / $request->price) * 100;
            $product->discount_percentage = round($percentage, 2);
            $product->hot_deals = 1;
        }

        // save product to db
        $product->save();

        // multi image upload
        $images = $request->file('multi_image');
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

        return redirect()->route('product.list')->with($notification);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $sublevels = SubLevel::latest()->get();
        $multi_image = MultiImage::where('product_id', $id)->get();

        return view('admin.products.edit', compact(
            'product',
            'brands',
            'categories',
            'subcategories',
            'sublevels',
            'multi_image',
        ));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
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
        $product->short_description_en = $request->short_description_en;

        $product->short_description_id = $request->short_description_id;
        $product->long_description_en = $request->long_description_en;
        $product->long_description_id = $request->long_description_id;
        $product->featured = $request->featured;

        $product->special_offer = $request->special_offer;
        $product->special_deals = $request->special_deals;
        $product->status = 1;

        if ($request->file('thumbnail')) {
            unlink($request->existing_image);

            // upload image
            $image = $request->file('thumbnail');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/product/thumbnail/' . $image_name);
            $path = 'upload/product/thumbnail/' . $image_name;

            // update brand image
            $product->thumbnail = $path;
        }


        if ($request->discount) {
            $percentage = ($request->discount / $request->price) * 100;
            $product->discount_percentage = round($percentage, 2);
            $product->hot_deals = 1;
        } else {
            $product->discount_percentage = NULL;
            $product->hot_deals = NULL;
        }
        $product->save();

        // toastr notifications
        $notification = array(
            'message' => 'Product has been updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.list')->with($notification);
    }

    public function multiImageUpdate(Request $request)
    {
        $images = $request->multi_image;

        foreach ($images as $id => $image) {
            // unlink existing image
            $item = MultiImage::findOrFail($id);
            unlink($item->image);

            // upload image
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/product/multi-image/' . $image_name);
            $path = 'upload/product/multi-image/' . $image_name;

            // save to db
            $multi_image = MultiImage::where('id', $id)->first();
            $multi_image->image = $path;
            $multi_image->save();
        }

        // toastr notifications
        $notification = array(
            'message' => 'Images has been updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function multiImageDelete($id)
    {
        // unlink selected image
        $data = MultiImage::findOrFail($id);
        unlink($data->image);

        //delete selected image
        MultiImage::findOrFail($id)->delete();

        // toastr notifications
        $notification = array(
            'message' => 'Images has been deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function status($id)
    {
        $product = Product::findOrFail($id);

        if ($product->status == 1) {
            $product->status = 0;
        } else {
            $product->status = 1;
        }
        $product->save();

        // toastr notifications
        $notification = array(
            'message' => 'Product status has been updated',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function delete($id)
    {
        // delete product
        $product = Product::findOrFail($id);
        unlink($product->thumbnail);
        Product::findOrFail($id)->delete();

        // delete product multi-image
        $images = MultiImage::where('product_id', $id)->get();
        foreach ($images as $data) {
            unlink($data->image);
            MultiImage::where('product_id', $id)->delete();
        }

        // toastr notifications
        $notification = array(
            'message' => 'Product has been deleted',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function details($id, $slug)
    {
        $product = Product::findOrFail($id);
        $color_en = explode(',', $product->color_en);
        $color_id = explode(',', $product->color_id);
        $size_en = explode(',', $product->size_en);
        $size_id = explode(',', $product->size_id);

        $multiImage = MultiImage::where('product_id', $id)->get();

        $related_products = Product::where('category_id', $product->category_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->get();

        return view('frontend.products.details', compact(
            'product',
            'multiImage',
            'color_en',
            'color_id',
            'size_en',
            'size_id',
            'related_products'
        ));
    }

    public function getBytagsEn($tag)
    {
        $products = Product::where('status', 1)
            ->where('tags_en', $tag)
            ->orderBy('id', 'DESC')->paginate(9);
        $categories = Category::orderBy('name_en', 'ASC')->get();

        return view('frontend.products.product_by_tags', compact('products', 'categories'));
    }

    public function getBytagsId($tag)
    {
        $products = Product::where('status', 1)
            ->where('tags_id', $tag)
            ->orderBy('id', 'DESC')->paginate(9);
        $categories = Category::orderBy('name_en', 'ASC')->get();


        return view('frontend.products.product_by_tags', compact('products', 'categories'));
    }

    public function getBySubcategory($id, $slug)
    {
        $products = Product::where('status', 1)
            ->where('subcategory_id', $id)
            ->orderBy('id', 'DESC')->paginate(9);
        $categories = Category::orderBy('name_en', 'ASC')->get();

        return view('frontend.products.subcategory_product_list', compact('products', 'categories'));
    }

    public function getBySublevel($id, $slug)
    {
        $products = Product::where('status', 1)
            ->where('sublevel_id', $id)
            ->orderBy('id', 'DESC')->paginate(9);
        $categories = Category::orderBy('name_en', 'ASC')->get();

        return view('frontend.products.sublevel_product_list', compact('products', 'categories'));
    }

    public function getOne($id)
    {
        $product = Product::with('category', 'brand')->findOrFail($id);
        $color_en = explode(',', $product->color_en);
        $color_id = explode(',', $product->color_id);
        $size_en = explode(',', $product->size_en);
        $size_id = explode(',', $product->size_id);

        return response()->json(array(
            'product' => $product,
            'color_en' => $color_en,
            'color_id' => $color_id,
            'size_en' => $size_en,
            'size_id' => $size_id,
        ));
    }
}
