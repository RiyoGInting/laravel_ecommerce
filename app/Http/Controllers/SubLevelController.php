<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubLevel;
use App\Models\Category;
use App\Models\SubCategory;

class SubLevelController extends Controller
{
    public function index()
    {
        $sublevels = SubLevel::latest()->get();
        $categories = Category::orderBy('name_en', 'ASC')->get();

        return view('admin.categories.subcategories.sublevels.index', compact('sublevels', 'categories'));
    }

    public function store(Request $request)
    {
        // validation
        $request->validate(
            [
                'category_id' => 'required',
                'subcategory_id' => 'required',
                'name_en' => 'required',
                'name_id' => 'required'
            ],
            // custom error message
            [
                'category_id.required' => 'Please select category',
                'subcategory_id.required' => 'Please select subcategory',
                'name_en.required' => 'Please input name in english',
                'name_id.required' => 'Please input name in indonesian'
            ]
        );

        // create new sub_level
        $sub_level = new SubLevel;
        $sub_level->category_id = $request->category_id;
        $sub_level->subcategory_id = $request->subcategory_id;
        $sub_level->name_en = $request->name_en;
        $sub_level->name_id = $request->name_id;
        $sub_level->slug_en = strtolower(str_replace(' ', '-', $request->name_en));
        $sub_level->slug_id = strtolower(str_replace(' ', '-', $request->name_id));

        // save sub_level to db
        $sub_level->save();

        // toastr notifications
        $notification = array(
            'message' => 'Sub-Level has been successfully added',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $sublevel = SubLevel::findOrFail($id);
        $categories = Category::orderBy('name_en', 'ASC')->get();
        $subcategories = SubCategory::orderBy('name_en', 'ASC')->get();

        return view('admin.categories.subcategories.sublevels.edit', compact('sublevel', 'categories', 'subcategories'));
    }

    public function update($id, Request $request)
    {
        // validation
        $request->validate(
            [
                'category_id' => 'required',
                'subcategory_id' => 'required',
                'name_en' => 'required',
                'name_id' => 'required'
            ],
            // custom error message
            [
                'category_id.required' => 'Please select category',
                'subcategory_id.required' => 'Please select subcategory',
                'name_en.required' => 'Please input name in english',
                'name_id.required' => 'Please input name in indonesian'
            ]
        );

        // update sublevel
        $sub_level = SubLevel::findOrFail($id);
        $sub_level->category_id = $request->category_id;
        $sub_level->subcategory_id = $request->subcategory_id;
        $sub_level->name_en = $request->name_en;
        $sub_level->name_id = $request->name_id;
        $sub_level->slug_en = strtolower(str_replace(' ', '-', $request->name_en));
        $sub_level->slug_id = strtolower(str_replace(' ', '-', $request->name_id));

        // save sub_level to db
        $sub_level->save();

        // toastr notifications
        $notification = array(
            'message' => 'Sub-Level has been updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.sublevel')->with($notification);
    }

    public function delete($id)
    {
        // delete sub level
        SubLevel::findOrFail($id)->delete();

        // toastr notifications
        $notification = array(
            'message' => 'Sub-Level has been updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
