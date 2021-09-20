<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();

        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        // validation
        $request->validate(
            [
                'name_en' => 'required',
                'name_id' => 'required',
                'icon' => 'required'
            ],
            // custom error message
            [
                'name_en.required' => 'Please input name in english',
                'name_id.required' => 'Please input name in indonesian',
                'icon.required' => 'Please input icon'
            ]
        );

        // create new category
        $category = new Category;
        $category->name_en = $request->name_en;
        $category->name_id = $request->name_id;
        $category->slug_en = strtolower(str_replace(' ', '-', $request->name_en));
        $category->slug_id = strtolower(str_replace(' ', '-', $request->name_id));
        $category->icon = $request->icon;

        // save category to db
        $category->save();

        // toastr notifications
        $notification = array(
            'message' => 'Category has been successfully added',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update($id, Request $request)
    {
        // validation
        $request->validate(
            [
                'name_en' => 'required',
                'name_id' => 'required',
                'icon' => 'required'
            ],
            // custom error message
            [
                'name_en.required' => 'Please input name in english',
                'name_id.required' => 'Please input name in indonesian',
                'icon.required' => 'Please input icon'
            ]
        );

        // update category
        $category = Category::findOrFail($id);
        $category->name_en = $request->name_en;
        $category->name_id = $request->name_id;
        $category->slug_en = strtolower(str_replace(' ', '-', $request->name_en));
        $category->slug_id = strtolower(str_replace(' ', '-', $request->name_id));
        $category->icon = $request->icon;

        // save category to db
        $category->save();

        // toastr notifications
        $notification = array(
            'message' => 'Category has been updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification);
    }

    public function delete($id)
    {
        // delete category
        Category::findOrFail($id)->delete();

        // toastr notifications
        $notification = array(
            'message' => 'Category has been updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
