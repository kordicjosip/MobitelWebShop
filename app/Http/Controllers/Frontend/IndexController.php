<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Brand;
use App\Models\MultiImg;

class IndexController extends Controller
{
    
    public function index(){
        $brands = Brand::latest()->get();
        $products = Product::where('status', 1)->get();
        return view('frontend.index', compact('brands', 'products'));
    }

    public function UserLogout(){
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function UserProfileUpdate(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();
        $notification = array(
            'message' => 'User Profile updated successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }

    public function UserChangePassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password', compact('user'));
    }

    public function UserUpdatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedPassword)){
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }else{
            return redirect()->back();
        }
    }

    public function ProductDetails($id){
        $product = Product::findOrFail($id);
        $color = $product->product_color;
        $product_color = explode(',', $color);
        $multiImage = MultiImg::where('product_id', $id)->get();
        return view('frontend.product.product_details', compact('product', 'multiImage', 'product_color'));
    }

    public function ProductViewAjax($id){
        $product = Product::with('brand')->findOrFail($id);
        $color = $product->product_color;
        $product_color = explode(',', $color);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
        ));
    }

}
