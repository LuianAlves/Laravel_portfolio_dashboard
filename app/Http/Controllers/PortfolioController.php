<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portofolio;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Image;
use Auth;

class PortfolioController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function HomePortfolio() {

        $portfolio = Portofolio::latest()->get();
        $trachList = Portofolio::onlyTrashed()->latest()->get(); // SoftDelete
        
        $categories = Category::latest()->get();

        return view('admin.home.portfolio.index', compact('portfolio', 'categories', 'trachList'));
    }

    public function Store(Request $request){
        
        $portfolio_image = $request->file('image');

        $name_gen = hexdec(uniqid()).'.'.$portfolio_image->getClientOriginalExtension();
        Image::make($portfolio_image)->resize(1920,1080)->save('storage/up_image/portfolio/port_card/'.$name_gen);
        $last_img = 'storage/up_image/portfolio/port_card/'.$name_gen;

        Portofolio::insert([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('home.portfolio')->with('success', 'Portfolio Card Inserted Successfully');
    }

    public function Edit($id) {
        $portfolio = Portofolio::find($id);
        $categories = Category::latest()->get();

        return view('admin.home.portfolio.edit', compact('portfolio', 'categories'));
    }

    public function Update(Request $request, $id) {
        $old_image = $request->old_image;
        $image = $request->file('image');

        if($image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'storage/up_image/portfolio/port_card/';
            $last_img = $up_location.$img_name;
            $image->move($up_location, $img_name);

            unlink($old_image);

            Portofolio::find($id)->update([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->route('home.portfolio')->with('success', 'Portfolio Card Updated Successfully');

        } else {
            Portofolio::find($id)->update([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->route('home.portfolio')->with('success', 'Portfolio Card Updated Successfully');
        }
    }

    // SoftDelete
    public function SoftDelete($id) {
        $softDelete = Portofolio::find($id)->delete();

        return Redirect()->back()->with('deleted', 'Portfolio Card Unavailable');
    }

    // Restore
    public function Restore($id) {
        $restore = Portofolio::withTrashed()->find($id)->restore();

        return Redirect()->back()->with('restore', 'Portfolio Card Restored');
    }

    // Delete
    public function Destroy($id) {
        $delete = Portofolio::onlyTrashed()->find($id)->forceDelete();

        return Redirect()->back()->with('deleted', 'Portfolio Card Permanently Deleted');
    }
}
