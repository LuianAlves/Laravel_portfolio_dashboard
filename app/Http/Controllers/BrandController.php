<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Multiplic;
use Illuminate\Support\Carbon;
use Image;
use Auth;

class BrandController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    // Index
    public function AllBrand() {

        $brands = Brand::latest()->paginate(10);
        return view ('admin.brand.index', compact('brands'));

    }

    // Store
    public function StoreBrand(Request $request) {
        $validatedData = $request->validate(
            [
                'brand_name' => 'required|unique:brands|min:4',
                'brand_image' => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'brand_name.required' => 'Please Input Brand Name',
                'brand_image.required' => 'Please Input Brand Image',

                'brand_name.min' => 'Brand Long Then 4 Chars',
            ]
        );

        $brand_image = $request->file('brand_image');

        // Utilizando o Intervention Pack não precisa
        // $name_gen = hexdec(uniqid());
        // $img_ext = strtolower($brand_image->getClientOriginalExtension());
        // $img_name = $name_gen.'.'.$img_ext;
        // $up_location = 'storage/up_image/brand/';
        // $last_img = $up_location.$img_name;
        // $brand_image->move($up_location, $img_name);

        // Intervention Pack
            $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
            Image::make($brand_image)->resize(300,200)->save('storage/up_image/brand/'.$name_gen);
            $last_img = 'storage/up_image/brand/'.$name_gen;
        // --

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'error'
        );

        return Redirect()->back()->with($notification);
    }

    // Edit
    public function Edit($id) {
        $brands = Brand::find($id);
        return view ('admin.brand.edit', compact('brands'));
    }

    // Update
    public function Update(Request $request, $id){
        $validatedData = $request->validate(
            [
                'brand_name' => 'required|min:4',
            ],
            [
                'brand_name.required' => 'Please Input Brand Name',
                'brand_image.required' => 'Please Input Brand Image',

                'brand_name.min' => 'Brand Long Then 4 Chars',
            ]
        );

        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');

        if($brand_image) {
            
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'storage/up_image/brand/';
            $last_img = $up_location.$img_name;
            $brand_image->move($up_location, $img_name);
            
            unlink($old_image);
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now()
            ]);
            
            return Redirect()->route('all.brand')->with('success', 'Brand Updated Successfully');

        } else {
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()
            ]);
            
            return Redirect()->route('all.brand')->with('success', 'Brand Updated Successfully');
        }
    }

    // Destroy
    public function Destroy($id) {
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);

        Brand::find($id)->delete();
        return Redirect()->back()->with('success', 'Brand Delete Successfully');
    }


    // Multiplics Images
        // Index
        public function Multiplic(){

            $images = Multiplic::all();
            return view('admin.multiplic.index', compact('images'));
        }

        // Store
        public function StoreImage(Request $request) {
            $image = $request->file('image');

            foreach($image as $multi_image) {   // Criando Loop para adicionar várias imagens       
                // Intervention Pack
                $name_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();
                Image::make($multi_image)->resize(300,200)->save('storage/up_image/multi/'.$name_gen);
                $last_img = 'storage/up_image/multi/'.$name_gen;
                // --
                
                Multiplic::insert([
                    'image' => $last_img,
                    'created_at' => Carbon::now()
                ]);           
            }

            return Redirect()->back()->with('success', 'Brand Inserted Successfully');
        }
    
    // Logout
    public function Logout() {
        Auth::logout();
        return Redirect()->route('login')->with('success', 'User Logout');
    }

    
    
    
    
    
    
}
