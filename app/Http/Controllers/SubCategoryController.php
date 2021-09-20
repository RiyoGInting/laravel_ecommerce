<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::latest()->get();
        $categories = Category::orderBy('name_en', 'ASC')->get();

        return view('admin.subcategories.index', compact('subcategories', 'categories'));
    }

    public function store(Request $request)
    {
        // validation
        $request->validate(
            [
                'category_id' => 'required',
                'name_en' => 'required',
                'name_id' => 'required'
            ],
            // custom error message
            [
                'category_id.required' => 'Please select category',
                'name_en.required' => 'Please input name in english',
                'name_id.required' => 'Please input name in indonesian'
            ]
        );

        // create new sub_category
        $sub_category = new SubCategory;
        $sub_category->category_id = $request->category_id;
        $sub_category->name_en = $request->name_en;
        $sub_category->name_id = $request->name_id;
        $sub_category->slug_en = strtolower(str_replace(' ', '-', $request->name_en));
        $sub_category->slug_id = strtolower(str_replace(' ', '-', $request->name_id));

        // save sub_category to db
        $sub_category->save();

        // toastr notifications
        $notification = array(
            'message' => 'Sub-Category has been successfully added',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::orderBy('name_en', 'ASC')->get();

        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    public function update($id, Request $request)
    {
        // validation
        $request->validate(
            [
                'category_id' => 'required',
                'name_en' => 'required',
                'name_id' => 'required'
            ],
            // custom error message
            [
                'category_id.required' => 'Please input icon',
                'name_en.required' => 'Please input name in english',
                'name_id.required' => 'Please input name in indonesian'
            ]
        );

        // update category
        $sub_category = SubCategory::findOrFail($id);
        $sub_category->category_id = $request->category_id;
        $sub_category->name_en = $request->name_en;
        $sub_category->name_id = $request->name_id;
        $sub_category->slug_en = strtolower(str_replace(' ', '-', $request->name_en));
        $sub_category->slug_id = strtolower(str_replace(' ', '-', $request->name_id));

        // save sub_category to db
        $sub_category->save();

        // toastr notifications
        $notification = array(
            'message' => 'Sub-Category has been updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.subcategory')->with($notification);
    }

    public function delete($id)
    {
        // delete sub category
        SubCategory::findOrFail($id)->delete();

        // toastr notifications
        $notification = array(
            'message' => 'Sub-Category has been updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
