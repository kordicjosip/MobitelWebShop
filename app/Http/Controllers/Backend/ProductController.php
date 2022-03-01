<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MultiImg;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    //

    public function ProductAdd(){
        $brands = Brand::latest()->get();
        return view('backend.product.product_add', compact('brands'));
    }

    public function ProductStore(Request $request){
        $request->validate([
            'brand_id' => 'required',
            'product_name' => 'required',
            'product_description' => 'required',
            'product_code' => 'required',
            'product_quantity' => 'required',
            'product_color' => 'required',
            'product_price' => 'required',
            'product_thambnail' => 'required',
            'net_technology' => 'required',
            'launch_announced' => 'required',
            'body_dimensions' => 'required',
            'body_weight' => 'required',
            'body_build' => 'required',
            'body_sim' => 'required',
            'display_type' => 'required',
            'display_size' => 'required',
            'display_resolution' => 'required',
            'platform_os' => 'required',
            'platform_chipset' => 'required',
            'platform_cpu' => 'required',
            'platform_gpu' => 'required',
            'memory_card_slot' => 'required',
            'memory_internal' => 'required',
            'camera_spec' => 'required',
            'camera_features' => 'required',
            'camera_video' => 'required',
            'selfie_cam_single' => 'required',
            'selfie_cam_features' => 'required',
            'selfie_cam_video' => 'required',
            'sound_loudspeaker' => 'required',
            'sound_jack' => 'required',
            'comms_wlan' => 'required',
            'comms_bluetooth' => 'required',
            'comms_gps' => 'required',
            'comms_radio' => 'required',
            'comms_usb' => 'required',
            'comms_nfc' => 'required',
            'battery_type' => 'required',
            'battery_charging' => 'required',
        ]);

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_code' => $request->product_code,
            'product_quantity' => $request->product_quantity,
            'product_color' => $request->product_color,
            'product_price' => $request->product_price,
            'net_technology' => $request->net_technology,
            'launch_announced' => $request->launch_announced,
            'body_dimensions' => $request->body_dimensions,
            'body_weight' => $request->body_weight,
            'body_build' => $request->body_build,
            'body_sim' => $request->body_sim,
            'display_type' => $request->display_type,
            'display_size' => $request->display_size,
            'display_resolution' => $request->display_resolution,
            'platform_os' => $request->platform_os,
            'platform_chipset' => $request->platform_chipset,
            'platform_cpu' => $request->platform_cpu,
            'platform_gpu' => $request->platform_gpu,
            'memory_card_slot' => $request->memory_card_slot,
            'memory_internal' => $request->memory_internal,
            'camera_spec' => $request->camera_spec,
            'camera_features' => $request->camera_features,
            'camera_video' => $request->camera_video,
            'selfie_cam_single' => $request->selfie_cam_single,
            'selfie_cam_features' => $request->selfie_cam_features,
            'selfie_cam_video' => $request->selfie_cam_video,
            'sound_loudspeaker' => $request->sound_loudspeaker,
            'sound_jack' => $request->sound_jack,
            'comms_wlan' => $request->comms_wlan,
            'comms_bluetooth' => $request->comms_bluetooth,
            'comms_gps' => $request->comms_gps,
            'comms_radio' => $request->comms_radio,
            'comms_usb' => $request->comms_usb,
            'comms_nfc' => $request->comms_nfc,
            'battery_type' => $request->battery_type,
            'battery_charging' => $request->battery_charging,
            'product_thambnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $images = $request->file('multi_img');
        foreach($images as $img){
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multiimg/'.$make_name);
            $upload_path = 'upload/products/multiimg/'.$make_name;

            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $upload_path,
                'created_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Product inserted successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('product.manage')->with($notification);

    }

    public function ProductManage(){
        $products = Product::latest()->get();
        return view('backend.product.product_view', compact('products'));
    }

    public function ProductEdit($id){
        $multiImgs = MultiImg::where('product_id', $id)->get();
        $brands = Brand::latest()->get();
        $product = Product::findOrFail($id);
        return view('backend.product.product_edit', compact('brands', 'product', 'multiImgs'));
    }

    public function ProductDataUpdate(Request $request){
        $product_id = $request->id;

        $request->validate([
            'brand_id' => 'required',
            'product_name' => 'required',
            'product_description' => 'required',
            'product_code' => 'required',
            'product_quantity' => 'required',
            'product_color' => 'required',
            'product_price' => 'required',
            'net_technology' => 'required',
            'launch_announced' => 'required',
            'body_dimensions' => 'required',
            'body_weight' => 'required',
            'body_build' => 'required',
            'body_sim' => 'required',
            'display_type' => 'required',
            'display_size' => 'required',
            'display_resolution' => 'required',
            'platform_os' => 'required',
            'platform_chipset' => 'required',
            'platform_cpu' => 'required',
            'platform_gpu' => 'required',
            'memory_card_slot' => 'required',
            'memory_internal' => 'required',
            'camera_spec' => 'required',
            'camera_features' => 'required',
            'camera_video' => 'required',
            'selfie_cam_single' => 'required',
            'selfie_cam_features' => 'required',
            'selfie_cam_video' => 'required',
            'sound_loudspeaker' => 'required',
            'sound_jack' => 'required',
            'comms_wlan' => 'required',
            'comms_bluetooth' => 'required',
            'comms_gps' => 'required',
            'comms_radio' => 'required',
            'comms_usb' => 'required',
            'comms_nfc' => 'required',
            'battery_type' => 'required',
            'battery_charging' => 'required',
        ]);

        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_code' => $request->product_code,
            'product_quantity' => $request->product_quantity,
            'product_color' => $request->product_color,
            'product_price' => $request->product_price,
            'net_technology' => $request->net_technology,
            'launch_announced' => $request->launch_announced,
            'body_dimensions' => $request->body_dimensions,
            'body_weight' => $request->body_weight,
            'body_build' => $request->body_build,
            'body_sim' => $request->body_sim,
            'display_type' => $request->display_type,
            'display_size' => $request->display_size,
            'display_resolution' => $request->display_resolution,
            'platform_os' => $request->platform_os,
            'platform_chipset' => $request->platform_chipset,
            'platform_cpu' => $request->platform_cpu,
            'platform_gpu' => $request->platform_gpu,
            'memory_card_slot' => $request->memory_card_slot,
            'memory_internal' => $request->memory_internal,
            'camera_spec' => $request->camera_spec,
            'camera_features' => $request->camera_features,
            'camera_video' => $request->camera_video,
            'selfie_cam_single' => $request->selfie_cam_single,
            'selfie_cam_features' => $request->selfie_cam_features,
            'selfie_cam_video' => $request->selfie_cam_video,
            'sound_loudspeaker' => $request->sound_loudspeaker,
            'sound_jack' => $request->sound_jack,
            'comms_wlan' => $request->comms_wlan,
            'comms_bluetooth' => $request->comms_bluetooth,
            'comms_gps' => $request->comms_gps,
            'comms_radio' => $request->comms_radio,
            'comms_usb' => $request->comms_usb,
            'comms_nfc' => $request->comms_nfc,
            'battery_type' => $request->battery_type,
            'battery_charging' => $request->battery_charging,
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product data updated successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('product.manage')->with($notification);

    }

    public function ProductImagesUpdate(Request $request){
        $imgs = $request->multi_img;
        foreach($imgs as $id => $img){
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);
            $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multiimg/'.$name_gen);
            $save_url = 'upload/products/multiimg/'.$name_gen;

            MultiImg::where('id', $id)->update([
                'photo_name' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Product images updated successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductUpdateThambnail(Request $request){
        $product_id = $request->id;
        $old_img = $request->oldimage;
        unlink($old_img);

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;

        Product::findOrFail($product_id)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product image updated successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductImageDelete($id){
        $oldimage = MultiImg::findOrFail($id);
        unlink($oldimage->photo_name);
        MultiImg::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function ProductInactive($id){
        Product::findOrFail($id)->update([
            'status' => 0,
        ]);
        $notification = array(
            'message' => 'Product inactive.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductActive($id){
        Product::findOrFail($id)->update([
            'status' => 1,
        ]);
        $notification = array(
            'message' => 'Product active.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductDelete($id){
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        Product::findOrFail($id)->delete();
        $images = MultiImg::where('product_id', $id)->get();
        foreach($images as $image){
            unlink($image->photo_name);
            MultiImg::where('product_id', $id)->delete();
        }
        $notification = array(
            'message' => 'Product deleted successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
