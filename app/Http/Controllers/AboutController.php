<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Carbon;
use Auth;

class AboutController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    //Index
    public function HomeAbout() {
        $homeAbout = HomeAbout::latest()->get();
        $framework = SubCategory::latest()->get();
        $skills = Category::latest()->get();


        return view('admin.home.about.index', compact('homeAbout', 'framework', 'skills'));
    }

    // Create
    public function AddAbout() {
        return view('admin.home.about.create');
    }

    //Store
    public function StoreAbout(Request $request) {
        HomeAbout::insert([
            'title' => $request->title,
            'sort_description' => $request->sort_description,
            'long_description' => $request->long_description,
            'sub_description' => $request->sub_description,
            'long_description_sec' => $request->long_description_sec,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('home.about')->with('success', 'About Inserted Successfully');
    }

    // Edit 
    public function EditAbout($id) {
        $abouts = HomeAbout::find($id);
        return view('admin.home.about.edit', compact('abouts'));
    }

    //Update
    public function UpdateAbout(Request $request, $id) {
        $update = HomeAbout::find($id)->update([
            'title' => $request->title,
            'sort_description' => $request->sort_description,
            'long_description' => $request->long_description,
            'sub_description' => $request->sub_description,
            'long_description_sec' => $request->long_description_sec,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('home.about')->with('success', 'About Updated Successfully');
    }

    // Destroy
    public function DestroyAbout(Request $request, $id){
        HomeAbout::find($id)->delete();
        return Redirect()->route('home.about')->with('success', 'Slider Delete Successfully');
    }
 
}
