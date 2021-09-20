<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get();

        return view('admin.brands.index', compact('brands'));
    }

    public function store(Request $request)
    {
        // validation
        $request->validate(
            [
                'name_en' => 'required',
                'name_id' => 'required',
                'image' => 'required',
            ],
            // custom error message
            [
                'name_en.required' => 'Please input name in english',
                'name_id.required' => 'Please input name in indonesian',
            ]
        );

        // upload image
        $image = $request->file('image');
        $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brand/' . $image_name);
        $path = 'upload/brand/' . $image_name;

        // create new brand
        $brand = new Brand;
        $brand->name_en = $request->name_en;
        $brand->name_id = $request->name_id;
        $brand->slug_en = strtolower(str_replace(' ', '-', $request->name_en));
        $brand->slug_id = strtolower(str_replace(' ', '-', $request->name_id));
        $brand->image = $path;

        // save brand to db
        $brand->save();

        // toastr notifications
        $notification = array(
            'message' => 'Brand has been successfully added',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        return view('admin.brands.edit', compact('brand'));
    }

    public function update($id, Request $request)
    {
        // validation
        $request->validate(
            [
                'name_en' => 'required',
                'name_id' => 'required',
            ],
            // custom error message
            [
                'name_en.required' => 'Please input name in english',
                'name_id.required' => 'Please input name in indonesian',
            ]
        );

        // update brand
        $brand = Brand::findOrFail($id);
        $brand->name_en = $request->name_en;
        $brand->name_id = $request->name_id;
        $brand->slug_en = strtolower(str_replace(' ', '-', $request->name_en));
        $brand->slug_id = strtolower(str_replace(' ', '-', $request->name_id));

        if ($request->file('image')) {
            unlink($request->existing_image);

            // upload image
            $image = $request->file('image');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brand/' . $image_name);
            $path = 'upload/brand/' . $image_name;

            // update brand image
            $brand->image = $path;
        }
        // save brand to db
        $brand->save();

        // toastr notifications
        $notification = array(
            'message' => 'Brand has been updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.brand')->with($notification);
    }

    public function delete($id)
    {
        $brand = Brand::findOrFail($id);

        // unlink image
        unlink($brand->image);

        // delete brand
        $brand = Brand::findOrFail($id)->delete();

        // toastr notifications
        $notification = array(
            'message' => 'Brand has been updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
