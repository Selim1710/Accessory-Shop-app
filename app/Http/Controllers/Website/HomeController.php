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
        $products = Product::with('brand')->orderBy('id', 'DESC')->paginate(6);
        $accessories = Accessory::with('product')->orderBy('id', 'DESC')->paginate(6);
        return view('website.layouts.home', compact('categories', 'products', 'accessories'));
    }

    public function search(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $products = Product::where('model', 'LIKE', "%$search%")
                ->orwhere('name', 'LIKE', "%$search%")
                ->orderBy('id', 'DESC')
                ->get();
            $accessories = Accessory::where('model', 'LIKE', "%$search%")
                ->orwhere('name', 'LIKE', "%$search%")
                ->orderBy('id', 'DESC')
                ->get();
            $result1 = $products->count();
            $result2 = $accessories->count();
        } else {
            $products = Product::with('brand')->orderBy('id', 'DESC')->get();
            $accessories = Accessory::with('product')->orderBy('id', 'DESC')->get();
            $result1 = 0;
        }
        return view('website.layouts.search', compact('products', 'accessories', 'search', 'result1', 'result2'));
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

    public function allProduct(Request $request)
    {
        $checkBrand = $request['brand'] ?? "";
        if ($checkBrand) {
            $products = Product::whereBetween('brand_id', [$checkBrand])->orderBy('id', 'DESC')->paginate(6);
            $brands = Brand::with('product')->get();
            return view('website.layouts.all_product', compact('products', 'brands'));
        } else {
            $products = Product::with('brand')->orderBy('id', 'DESC')->paginate(6);
            $brands = Brand::with('product')->get();
            return view('website.layouts.all_product', compact('products', 'brands'));
        }
    }
    public function allAccessory()
    {
        $accessories = Accessory::with('product')->orderBy('id', 'DESC')->paginate(4);
        return view('website.layouts.all_accessory', compact('accessories'));
    }

    public function productDetails($id)
    {
        $product = Product::find($id);
        $stocks = Stock::where('id', $product->id)->get();
        return view('website.layouts.product_details', compact('product', 'stocks'));
    }
    public function productAccessory($id)
    {
        $product = Product::find($id);
        $accessories = Accessory::where('product_id', $product->id)->orderBy('id', 'DESC')->paginate(4);
        $result = $accessories->count();
        return view('website.layouts.product_accessory', compact('accessories', 'result'));
    }

    public function accessoryDetails($id)
    {
        $accessory = Accessory::find($id);
        return view('website.layouts.accessory_details', compact('accessory'));
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
