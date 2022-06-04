<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function manageOffer()
    {
        $offers=Offer::with('product')->orderBy('id','DESC')->paginate(6);
        return view('admin.layouts.offer.offer_table',compact('offers'));
    }
    public function add()
    {
        $products=Product::with('offer')->get();
        return view('admin.layouts.offer.add_offer',compact('products'));
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'product_id'=>'required',
            'image'=>'required',
        ]);
            $filename = '';
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/uploads/offers'), $filename);
            }
            offer::create([
                'name'=>$request->name,
                'product_id'=>$request->product_id,
                'image'=>$filename,
            ]);
            return redirect()->route('admin.manage.offer')->with('message','offer Added Successfully');
    }
    
    public function delete($id)
    {
        $offer=Offer::find($id);
        $image = str_replace('\\','/',public_path('uploads/offers/'.$offer->image));
        unlink($image);
        $offer->delete();
        return redirect()->route('admin.manage.offer')->with('error','offer deleted');
    }
    public function view($id)
    {
        $offer=Offer::find($id);
        return view('admin.layouts.offer.view_offer',compact('offer'));
    }
    public function change(Request $request,$id){
        $offer=Offer::find($id);
        $filename = '';
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/uploads/offers'), $filename);
            }
        $offer->update([
            'image'=>$filename,
        ]);
        return redirect()->route('admin.manage.offer')->with('message','offer Image Updated');
    }
}
