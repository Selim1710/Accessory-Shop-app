<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Accessory;


class AccessoryCartController extends Controller
{
    public function cart($id)
    {
        $product = Accessory::find($id);
        if (!$product) {
            return redirect()->route('website.home')->with('error', 'there is no product into the cart');
        }
        $cartExist = session()->get('cart');
        // case-1:no cart
        if (!$cartExist) {
            $cartData = [$id => [
                'product_id' => $product->id,
                'product_model' => $product->model,
                'product_name' => $product->name,
                'regular_price' => $product->price,
                'product_offer' => $product->offer,
                'product_quantity' => 1,
            ]];
            session()->put('cart', $cartData);
            return redirect()->back()->with('message', 'Product added into the cart');
        }
        // case-2:already one cart exist
        if (!isset($cartExist[$id])) {
            $cartExist[$id] = [
                'product_id' => $product->id,
                'product_model' => $product->model,
                'product_name' => $product->name,
                'regular_price' => $product->price,
                'product_offer' => $product->offer,
                'product_quantity' => 1,
            ];
            session()->put('cart', $cartExist);
            return redirect()->back()->with('message', 'Product added into the cart');
        }
        // case-3: same product adding into the cart
        $cartExist[$id]['product_quantity'] = $cartExist[$id]['product_quantity'] + 1;
        session()->put('cart', $cartExist);
        return redirect()->back()->with('message', 'Product added into the cart');
    }
}
