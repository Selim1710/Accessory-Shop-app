<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::with('brand')->get();
        $products = Product::with('brand')->orderBy('id', 'DESC')->paginate(8);
        // return $products;
        return view('website.layouts.home', compact('categories', 'products'));
    }
    public function productDetails($id){
        $product = Product::find($id);
        $stocks = Stock::where('id',$product->id)->get();
        return view('website.layouts.product_details', compact('product','stocks'));
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
    public function allProduct()
    {
        $products = Product::with('subCategory')->orderBy('id', 'DESC')->paginate(8);
        return view('website.layouts.all_product', compact('products'));
    }

    public function subCategoryProduct($id)
    {
        $subCategory = Subcategory::find($id);
        $products = Product::where('subCategory_id', '=', $id)->orderBy('id', 'DESC')->get();
        return view('website.layouts.sub_category_product', compact('products'));
    }
    public function categoryProduct($id)
    {
        $category = Category::find($id);
        $subCategory = Subcategory::where('category_id', '=', $id)->get();
        foreach ($subCategory as $sub) {
            $products = Product::where('subCategory_id', '=', $sub->id)->orderBy('id', 'DESC')->get();
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
