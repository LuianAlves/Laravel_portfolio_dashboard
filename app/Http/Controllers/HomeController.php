<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Image;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Slider
    // Index
    public function HomeSlider()
    {
        $sliders = Slider::latest()->get();
        return view('admin.home.slider.index', compact('sliders'));
    }

    // Create
    public function AddSlider()
    {
        return view('admin.home.slider.create');
    }

    // Store
    public function StoreSlider(Request $request)
    {
        $slider_image = $request->file('image');
        $save_path = 'storage/up_image/slider/';

        // Intervention Pack
        if (!file_exists($save_path)) {
            mkdir($save_path, 666, true);

            $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
            Image::make($slider_image)->resize(1920, 1088)->save('storage/up_image/slider/'.$name_gen);
                    
            $last_img = 'storage/up_image/slider/'.$name_gen;
        }

        $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920, 1088)->save('storage/up_image/slider/'.$name_gen);
                    
        $last_img = 'storage/up_image/slider/'.$name_gen;
        // --
    
        Slider::insert([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
    
        return Redirect()->route('home.slider')->with('success', 'Slider Inserted Successfully');
    }

    // Edit
    public function EditSlider($id)
    {
        $sliders = Slider::find($id);
        return view('admin.home.slider.edit', compact('sliders'));
    }

    // Update
    public function UpdateSlider(Request $request, $id)
    {
        $old_image = $request->old_image;
        $image = $request->file('image');

        if ($image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'storage/up_image/slider/';
            $last_img = $up_location.$img_name;
            $image->move($up_location, $img_name);

            unlink($old_image);
                
            Slider::find($id)->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => $last_img,
                    'created_at' => Carbon::now()
                ]);
            
            return Redirect()->route('home.slider')->with('success', 'Slider Updated Successfully');
        } else {
            Slider::find($id)->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'created_at' => Carbon::now()
                ]);
            
            return Redirect()->route('home.slider')->with('success', 'Slider Updated Successfully');
        }
    }

    // Destroy
    public function DestroySlider(Request $request, $id)
    {
        $image = Slider::find($id);
        $old_image = $image->image;
        unlink($old_image);

        Slider::find($id)->delete();
        return Redirect()->route('home.slider')->with('success', 'Slider Delete Successfully');
    }
    // -----
}
