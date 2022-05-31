<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Accessory;
use App\Models\Product;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class AccessoryController extends Controller
{
    public function manageAccessory()
    {
        $accessories = Accessory::with('product')->orderBy('id', 'desc')->get();
        return view('admin.layouts.accessory.accessory_table', compact('accessories'));
    }
    public function add()
    {
        $products = Product::with('accessory')->get();
        return view('admin.layouts.accessory.add_Accessory', compact('products'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required|unique:accessories',
            'name' => 'required|unique:accessories',
            'price' => 'required',
            'stock_quantity' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'offer' => 'required',
            'description' => 'required',
            // specifications
            'function' => 'required',
            'metarials' => 'required',
            'certification' => 'required',
            'color' => 'required',
            'size' => 'required',
            'warranty' => 'required',
        ]);

        $filename = '';
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/accessories'), $filename);
        }
        Accessory::create([
            'model' => $request->model,
            'name' => $request->name,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'image' => $filename,
            'offer' => $request->offer,
            'description' => $request->description,

            // specifications
            'function' => $request->function,
            'metarials' => $request->metarials,
            'certification' => $request->certification,
            'color' => $request->color,
            'size' => $request->size,
            'warranty' => $request->warranty,

            'product_id' => $request->product_id,
        ]);
        return redirect()->route('admin.manage.accessory')->with('message', 'Accessory added successfully');
    }
    public function edit($id)
    {
        $accessory = Accessory::find($id);
        return view('admin.layouts.accessory.edit_accessory', compact('accessory'));
    }
    public function update(Request $request, $id)
    {
        $accessory = Accessory::find($id);
        $accessory->update([
            'model' => $request->model,
            'name' => $request->name,
            'price' => $request->price,
            'offer' => $request->offer,
            'description' => $request->description,
            // specifications
            'function' => $request->function,
            'metarials' => $request->metarials,
            'certification' => $request->certification,
            'color' => $request->color,
            'size' => $request->size,
            'warranty' => $request->warranty,

            'product_id' => $request->product_id,
        ]);
        return redirect()->route('admin.manage.accessory')->with('message', 'Accessory updated');
    }
    public function delete($id)
    {
        $accessory = Accessory::find($id);
        $image = str_replace('\\', '/', public_path('uploads/accessories/' . $accessory->image));
        if (is_file($image)) {
            unlink($image);
            $accessory->delete();
            return redirect()->route('admin.manage.Accessory')->with('error', 'Accessory deleted');
        } else {
            return redirect()->back()->with('error', 'File Not found');
        }
    }

    public function view($id)
    {
        $accessory = Accessory::find($id);
        return view('admin.layouts.accessory.view_accessory', compact('accessory'));
    }
    public function change(Request $request, $id)
    {
        $accessory = Accessory::find($id);
        $filename = '';
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/accessories'), $filename);
        }
        $accessory->update([
            'image' => $filename,
        ]);
        return redirect()->route('admin.manage.accessory')->with('message', 'Accessory Image Updated');
    }
}
