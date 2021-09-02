<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Carbon;
use Auth;

class SubCategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    // Index
    public function AllSubCat(){
        $sub_categories = SubCategory::latest()->get();
        $categories = Category::latest()->get();
        return view('admin.sub-category.index', compact('sub_categories', 'categories'));
    }

    public function AddSubCat(Request $request) {
        SubCategory::insert([
            'category_id' => $request->category_id,
            'framework' => $request->framework,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('all.scategory')->with('success', 'Sub Category Inserted Sucessfull');
    }

    public function Edit($id) {
        $sub_categories = SubCategory::find($id);
        $categories = Category::latest()->get();

        return view('admin.sub-category.edit', compact('sub_categories', 'categories'));
    }

    public function Update(Request $request, $id) {
        $update = SubCategory::find($id)->update([
            'category_id' => $request->category_id,
            'framework' => $request->framework
        ]);

        return Redirect()->route('all.scategory')->with('success', 'Sub Category Inserted Sucessfull');
    }

    public function Destroy(Request $request, $id) {
        $delete = SubCategory::find($id)->delete();
        
        return Redirect()->route('all.scategory')->with('success', 'Sub Category Deleted Sucessfull');
    }
}
