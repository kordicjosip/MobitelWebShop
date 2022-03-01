<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    //

    public function BrandView(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('brands'));
    }

    public function BrandStore(Request $request){
        $request->validate([
            'brand_name' => 'required',
        ]);

        Brand::insert([
            'brand_name' => $request->brand_name,
        ]);

        $notification = array(
            'message' => 'Brand inserted successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function BrandEdit($id){
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('brand'));
    }

    public function BrandUpdate(Request $request){
        $brand_id = $request->id;

        $request->validate([
            'brand_name' => 'required',
        ]);

        Brand::findOrFail($brand_id)->update([
            'brand_name' => $request->brand_name,
        ]);

        $notification = array(
            'message' => 'Brand updated successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('all.brand')->with($notification);
    }

    public function BrandDelete($id){
        Brand::findOrFail($id)->delete();
        return redirect()->back();
    }

}
