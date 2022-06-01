<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Accessory;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::with('brand')->get();
        $products = Product::with('brand')->orderBy('id', 'DESC')->paginate(8);
        $accessories = Accessory::with('product')->orderBy('id', 'DESC')->paginate(6);
        return view('website.layouts.home', compact('categories', 'products','accessories'));
    }

    public function search(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $products = Product::where('model', 'LIKE', '%' . $search . '%')
                ->orwhere('product_name', 'LIKE', '%' . $search . '%')
                ->orderBy('id', 'DESC')
                ->get();
        } else {
            $products = Product::with('subCategory')->orderBy('id', 'DESC')->get();
        }
        return view('website.layouts.search', compact('products', 'search'));
    }

    public function productDetails($id){
        $product = Product::find($id);
        $stocks = Stock::where('id',$product->id)->get();
        return view('website.layouts.product_details', compact('product','stocks'));
    }

    public function accessoryDetails($id){
        $accessory = Accessory::find($id);
        return view('website.layouts.accessory_details', compact('accessory'));
    }
   
    public function allProduct()
    {
        $products = Product::with('brand')->orderBy('id', 'DESC')->paginate(6);
        return view('website.layouts.all_product', compact('products'));
    }
    public function allAccessory()
    {
        $accessories = Accessory::with('product')->orderBy('id', 'DESC')->paginate(4);
        return view('website.layouts.all_accessory', compact('accessories'));
    }

    public function brandProduct($id)
    {
        $brand = Brand::find($id);
        $products = Product::where('brand_id', '=', $id)->orderBy('id', 'DESC')->get();
        return view('website.layouts.brand_product', compact('products'));
    }
    public function categoryProduct($id)
    {
        $category = Category::find($id);
        $brand = Brand::where('category_id', '=', $id)->get();
        foreach ($brand as $br) {
            $products = Product::where('brand_id', '=', $br->id)->orderBy('id', 'DESC')->get();
        }
        return view('website.layouts.category_product', compact('products'));
    }

    public function refundPolicy()
    {
        return view('website.layouts.refund_policy');
    }
    public function termsConditions()
    {
        return view('website.layouts.terms_condition');
    }
}
