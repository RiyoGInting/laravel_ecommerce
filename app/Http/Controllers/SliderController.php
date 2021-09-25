<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Image;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();

        return view('admin.sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        // validation
        $request->validate(
            [
                'image' => 'required'
            ],
            // error message
            [
                'image.required' => 'Please input image'
            ]
        );

        // upload image
        $image = $request->file('image');
        $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('upload/slider/' . $image_name);
        $path = 'upload/slider/' . $image_name;

        // create new slider
        $slider = new Slider;
        $slider->title_en = $request->title_en;
        $slider->title_id = $request->title_id;
        $slider->description_en = $request->description_en;
        $slider->description_id = $request->description_id;
        $slider->image = $path;

        if ($request->title_en) {
            $slider->slug_en = strtolower(str_replace(' ', '-', $request->title_en));
        }

        if ($request->title_id) {
            $slider->slug_id = strtolower(str_replace(' ', '-', $request->title_id));
        }

        // save slider to db
        $slider->save();

        // toastr notifications
        $notification = array(
            'message' => 'Slider has been successfully added',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);

        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        // update brand
        $slider = Slider::findOrFail($id);
        $slider->title_en = $request->title_en;
        $slider->title_id = $request->title_id;
        $slider->description_en = $request->description_en;
        $slider->description_id = $request->description_id;
        $slider->slug_en = strtolower(str_replace(' ', '-', $request->name_en));
        $slider->slug_id = strtolower(str_replace(' ', '-', $request->name_id));

        if ($request->file('image')) {
            unlink($request->existing_image);

            // upload image
            $image = $request->file('image');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(870, 370)->save('upload/slider/' . $image_name);
            $path = 'upload/slider/' . $image_name;

            // update brand image
            $slider->image = $path;
        }
        // save slider to db
        $slider->save();

        // toastr notifications
        $notification = array(
            'message' => 'Slider has been updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('slider.list')->with($notification);
    }

    public function status($id)
    {
        $slider = Slider::findOrFail($id);

        if ($slider->status == 1) {
            $slider->status = 0;
        } else {
            $slider->status = 1;
        }

        $slider->save();

        // toastr notifications
        $notification = array(
            'message' => 'Slider status has been updated',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function delete($id)
    {
        $slider = Slider::findOrFail($id);

        // unlink image
        unlink($slider->image);

        // delete brand
        $slider->delete();

        // toastr notifications
        $notification = array(
            'message' => 'Slider has been deleted',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
