<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Category;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{   
    public function __construct() {
        $this->middleware('auth');
    }
    // Index
    public function AllCat() {
        $categories = Category::latest()->paginate(10);
        $trachCat = Category::onlyTrashed()->latest()->paginate(10);

        return view('admin.category.index', compact('categories', 'trachCat'));
    }

    // Store 
    public function AddCat(Request $request) {
        $validatedData = $request->validate(
            [
                'category_name' => 'required|unique:categories|max:255',
            ],

            [
                'category_name.required' => 'Please Input Category Name',
                'category_name.max' => 'Category Less Then 255 Chars',
            ]
        );

        // Category::insert([
        //     'user_id' => Auth::user()->id,
        //     'category_name' => $request->category_name,
        //     'created_at' => Carbon::now()
        // ]);

        // Ou

        $category = new Category;
        $category->category_name = $request->category_name; 
        $category->user_id = Auth::user()->id;
        $category->save();

        return Redirect()->back()->with('success', 'Category Inserted Sucessfull');
       
    }

    // Edit
    public function Edit($id) {
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));
    }

    // Update
    public function Update(Request $request, $id) {
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);

        return Redirect()->route('all.category')->with('success', 'Category Updated Successfull');
    }

    // SoftDelete
    public function SoftDelete($id) {
        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('success', 'Category Soft Delete Successfully');
    }

    public function Restore($id) {
        $delete = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success', 'Category Restore Successfully');
    }

    public function Destroy($id){
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('deleted', 'Category Permanently Deleted');
    }
}
