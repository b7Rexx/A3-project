<?php

namespace App\Http\Controllers;

use App\Item;
use App\Main;
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

        $this->_data['shop'] = Shop::find($id);
        return view($this->_path . 'shop-profile', $this->_data);
    }

    public function LoggedProfile()
    {
        $this->_data['shop_id'] = Auth::user()->id;
        if (empty($this->_data['shop_id'])) return redirect()->to(route('home'));
        $id = $this->_data['shop_id'];
        $this->_data['shop'] = Shop::find($id);
        return view($this->_path . 'shop-profile', $this->_data);
    }

    public function shopItems()
    {
        $this->_data['shop_id'] = Auth::user()->id;
        if (empty($this->_data['shop_id'])) return redirect()->to(route('home'));

        $id = $this->_data['shop_id'];
        $this->_data['shop'] = Shop::find($id);
        return view($this->_path . 'shop-items', $this->_data);
    }

    public function profileImageUpload(Request $request)
    {
        $this->_data['shop_id'] = Auth::user()->id;

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
        $this->_data['shop_id'] = Auth::user()->id;
        $id = $this->_data['shop_id'];
        $data = Item::where('shop_id', '=', $id)->orderBy('id', 'DESC')->get();
//        $shop = Shop::find($id)->name;

        return response($data);
//        return response(['data' => $data, 'shop' => $shop,'shop_id' => $id]);
    }

    public function post(Request $request)
    {
        return redirect(route('home'));
    }
}
