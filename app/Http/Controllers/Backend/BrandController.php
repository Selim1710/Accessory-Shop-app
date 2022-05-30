<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function manageBrand()
    {
        $brands = Brand::with('category')->orderBy('id','desc')->get();
        return view('admin.layouts.brand.brand_table', compact('brands'));
    }

    public function addBrand()
    {
        $categories = Category::select('id', 'category_name')->get();
        return view('admin.layouts.brand.add_brand', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|unique:brands|max:20'
        ]);
        Brand::create([
            'brand_name' => $request->brand_name,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('admin.manage.brand')->with('message', 'brand added successfully');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.layouts.Brand.edit_brand', compact('brand'));
    }
    public function update(Request $request,$id){
        // dd($request->all());
        $Brand = Brand::find($id);
        $Brand->update([
            'sub_category_name' => $request->sub_category_name,
        ]);
        return redirect()->route('admin.manage.brand')->with('message', 'brand Updated Successfully');

    }
    public function delete($id){
        $Brand = Brand::find($id);
        $Brand->delete();
        return redirect()->route('admin.manage.brand')->with('error', 'brand Deleted');

    }
}
