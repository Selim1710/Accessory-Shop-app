<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function manageProduct()
    {
        $products = Product::with('brand')->orderBy('id','desc')->get();
        return view('admin.layouts.product.product_table', compact('products'));
    }
    public function add()
    {
        $brands = Brand::with('product')->get();
        return view('admin.layouts.product.add_product', compact('brands'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required|unique:products',
            'name' => 'required|unique:products',
            'price' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'offer' => 'required',
            'description' => 'required',
            // specifications
            'bluetooth'=>'required',
            'DVD_player'=>'required',
            'leather_interior'=>'required',
            'push_star_ignition'=>'required',
            'perking_assist'=>'required',
            // details
            'wheel'=>'required',
            'top_speed'=>'required',
            'seat_capacity'=>'required',
            'body'=>'required',
            'engine_capacity'=>'required',
            'drive'=>'required',
            'mileage'=>'required',
            'fuel_type'=>'required',
            'condition'=>'required',
            'exterior_color'=>'required',
            'interior_color'=>'required',
            'warranty'=>'required',

            'brand_id' => 'required',

        ]);

        $filename = '';
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/products'), $filename);
        }
        Product::create([
            'model' => $request->model,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $filename,
            'offer' => $request->offer,
            'description' => $request->description,

             // specifications
            'bluetooth'=>$request->bluetooth,
            'DVD_player'=>$request->DVD_player,
            'leather_interior'=>$request->leather_interior,
            'push_star_ignition'=>$request->push_star_ignition,
            'perking_assist'=>$request->perking_assist,
            // details
            'wheel'=>$request->wheel,
            'top_speed'=>$request->top_speed,
            'seat_capacity'=>$request->seat_capacity,
            'body'=>$request->body,
            'engine_capacity'=>$request->engine_capacity,
            'drive'=>$request->drive,
            'mileage'=>$request->mileage,
            'fuel_type'=>$request->fuel_type,
            'condition'=>$request->condition,
            'exterior_color'=>$request->exterior_color,
            'interior_color'=>$request->interior_color,
            'warranty'=>$request->warranty,

            'brand_id' => $request->brand_id,
        ]);
        return redirect()->route('admin.manage.product')->with('message', 'Product added successfully');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.layouts.product.edit_product', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update([
            'model' => $request->model,
            'name' => $request->name,
            'price' => $request->price,
            'offer' => $request->offer,
            'description' => $request->description,

             // specifications
            'bluetooth'=>$request->bluetooth,
            'DVD_player'=>$request->DVD_player,
            'leather_interior'=>$request->leather_interior,
            'push_star_ignition'=>$request->push_star_ignition,
            'perking_assist'=>$request->perking_assist,
            // details
            'wheel'=>$request->wheel,
            'top_speed'=>$request->top_speed,
            'seat_capacity'=>$request->seat_capacity,
            'body'=>$request->body,
            'engine_capacity'=>$request->engine_capacity,
            'drive'=>$request->drive,
            'mileage'=>$request->mileage,
            'fuel_type'=>$request->fuel_type,
            'condition'=>$request->condition,
            'exterior_color'=>$request->exterior_color,
            'interior_color'=>$request->interior_color,
            'warranty'=>$request->warranty,
        ]);
        return redirect()->route('admin.manage.product')->with('message', 'Product updated');
    }
    public function delete($id)
    {
        $product = Product::find($id);
        $image = str_replace('\\', '/', public_path('uploads/products/' . $product->image));
        if (is_file($image)) {
            unlink($image);
            $product->delete();
            return redirect()->route('admin.manage.product')->with('error', 'Product deleted');
        } else {
            return redirect()->back()->with('error', 'File Not found');
        }
    }

    public function view($id)
    {
        $product = Product::find($id);
        return view('admin.layouts.product.view_product', compact('product'));
    }
    public function change(Request $request, $id)
    {
        $product = Product::find($id);
        $filename = '';
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/products'), $filename);
        }
        $product->update([
            'image' => $filename,
        ]);
        return redirect()->route('admin.manage.product')->with('message', 'Product Image Updated');
    }
}
