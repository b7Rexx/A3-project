<?php

namespace App\Http\Controllers;

use App\Item;
use App\Main;
use App\Rating;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ShopController extends Controller
{
    private $_path = 'Home.shop.';
    private $_data = [];

    public function __construct()
    {
        //send main table data as array
        $lists = Main::all();
        foreach ($lists as $list) {
            $array[$list['name']] = $list['value'];
        }
        $this->_data['mains'] = $array;
    }

    public function loginAction(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember === true ?? false;

        if (Auth::guard('shop')->attempt(['email' => $email, 'password' => $password], $remember)) {
//            return redirect()->intended(route('shop-profile'));
            return response(['status' => true]);

        }
        return response(['status' => false]);
//        return redirect()->back()->with('fail', 'Invalid Email or Password Combination.');
    }

    public function logout()
    {
        Auth::guard('shop')->logout();
        return redirect(route('home'));
    }


    public function signup()
    {
        if (Auth::guard('shop')->check()) {
            return redirect(route('shop-profile'));
        }
        return view($this->_path . 'signup', $this->_data);
    }

    public function register(Request $request)
    {
        $this->validate($request, ['password' => 'confirmed']);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);

        if ($last_insert_id = Shop::create($data)->id) {
            return response(['status' => true, 'last_insert_id' => $last_insert_id]);
        }

        return response(['status' => false]);
    }

    public function registerSecond(Request $request)
    {
        $data['phone'] = $request->phone;
        $data['bio'] = $request->bio;
        $data['address'] = $request->address;

        Shop::find($request->id)->update($data);
        return response(['id' => $request->id]);
    }


    public function profile($id)
    {
        if (empty($id)) return redirect()->to(route('login'));

        if (Auth::guard('shop')->user()) {
            if ($id == Auth::guard('shop')->user()->id) {
                return redirect(route('shop-profile'));
            }
        }

        $this->_data['shop'] = Shop::find($id);
        $this->_data['shop_id'] = $id;
        $this->_data['items'] = Item::where('shop_id', '=', $id)->paginate(12);
        return view($this->_path . 'shop-guest', $this->_data);
    }

    public function LoggedProfile()
    {
        $this->_data['shop_id'] = Auth::guard('shop')->user()->id;
        if (empty($this->_data['shop_id'])) return redirectx()->to(route('home'));
        $id = $this->_data['shop_id'];
        $this->_data['shop'] = Shop::find($id);
        return view($this->_path . 'shop-profile', $this->_data);
    }

//    public function shopItems()
//    {
//        $this->_data['shop_id'] = Auth::guard('shop')->user()->id;
//        if (empty($this->_data['shop_id'])) return redirect()->to(route('home'));
//
//        $id = $this->_data['shop_id'];
//        $this->_data['shop'] = Shop::find($id);
//        return view($this->_path . 'shop-profile', $this->_data);
//    }

    public function profileImageUpload(Request $request)
    {
        $this->_data['shop_id'] = Auth::guard('shop')->user()->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/shop/profile/');
            if ($image->move($destinationPath, $name)) {
                $data['image'] = $name;
                $old_image = 'images/shop/profile/' . Shop::find($this->_data['shop_id'])->image;
                if (File::exists($old_image)) {
                    File::delete($old_image);
                }
                Shop::find($this->_data['shop_id'])->update($data);
                return redirect()->back()->with(['success' => 'Image uploaded successfully']);
            };
        };
        return redirect()->back()->with(['fail' => 'Failed to upload image']);
    }

    public function addItem(Request $request)
    {
        $data['name'] = $request->name;
        $data['price'] = $request->price;
//        if ($request->hasFile('image')) {
//            echo "<script>console.log( 'STEP OK');</script>";
//            $image = $request->file('image');
//            $name = $request->shop_id . '_' . time() . '.' . $image->getClientOriginalExtension();
//            $destinationPath = public_path('/images/shop/item/');
//            if ($image->move($destinationPath, $name)) {
//                $data['image'] = $name;
//            };
//        }
        $data['image'] = 'dummy.jpg';
        $data['status'] = $request->status;
        $data['category_id'] = $request->category;
        $data['shop_id'] = $request->shop_id;

        if ($last_id = Item::create($data)->id) {
            return response(['status' => true, 'last_id' => $last_id]);
        }
        return response(['status' => false]);
    }

    public function addImage(Request $request)
    {
        if ($request->hasFile('file')) {
            echo "<script>console.log( 'STEP OK');</script>";
            $image = $request->file('file');
            $name = $request->id . '_' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/shop/item/');
            if ($image->move($destinationPath, $name)) {
                $data['image'] = $name;
                Item::find($request->id)->update($data);
                return response(['status' => 'image added']);
            };
        }
        return response(['status' => 'failed']);
    }

    public function itemShopList()
    {
        $this->_data['shop_id'] = Auth::guard('shop')->user()->id;
        $id = $this->_data['shop_id'];
        $data = Item::where('shop_id', '=', $id)->orderBy('id', 'DESC')->get();

        return response($data);
    }

    public function getsetting()
    {
        $this->_data['shop_id'] = Auth::guard('shop')->user()->id;
        if (empty($this->_data['shop_id'])) return redirect()->to(route('home'));

        $id = $this->_data['shop_id'];
        $this->_data['data'] = Shop::find($id);
        return view($this->_path . 'shop-setting', $this->_data);
    }

    public function postsetting(Request $request)
    {
        $id = Auth::guard('shop')->user()->id;
        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['bio'] = $request->bio;
        $data['phone'] = $request->phone;

        if (Shop::find($id)->update($data)) {
            return redirect()->back()->with(['success' => 'profile updated successfully']);
        }
        return redirect()->back()->with(['fail' => 'failed to update profile']);
    }


    public function updateItem(Request $request)
    {
        $id = $request->id;
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['status'] = $request->status;
        if (Item::find($id)->update($data)) {
//            return response(['message' => 'ok']);
            return response($request);
        }
        return response(['message' => 'NO']);
    }

    public function deleteItem(Request $request)
    {
        $id = $request->id;
        $image = Item::find($id)->image;
        if (!empty($image)) {
            File::delete(url('/images/shop/item/' . $image));
        }
        Rating::where('item_id', '=', $id)->delete();
        Item::find($id)->delete();
        return response(['delete' => 'ok']);
    }
}