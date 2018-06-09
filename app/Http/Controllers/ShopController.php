<?php

namespace App\Http\Controllers;

use App\Item;
use App\Main;
use App\Shop;
use Illuminate\Http\Request;

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

        //Set shop id after login
        $this->_data['shop_id'] = 2;


    }

    public function profile($id)
    {
        if (empty($id)) return redirect()->to(route('home'));

        $this->_data['shop'] = Shop::find($id);
        return view($this->_path . 'shop-profile', $this->_data);
    }

    public function LoggedProfile()
    {
        if (empty($this->_data['shop_id'])) return redirect()->to(route('home'));

        $id = $this->_data['shop_id'];
        $this->_data['shop'] = Shop::find($id);
        return view($this->_path . 'shop-profile', $this->_data);
    }

    public function shopItems()
    {
        if (empty($this->_data['shop_id'])) return redirect()->to(route('home'));

        $id = $this->_data['shop_id'];
        $this->_data['shop'] = Shop::find($id);
        return view($this->_path . 'shop-items', $this->_data);
    }

    public function profileImageUpload(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/shop/profile/');
            if ($image->move($destinationPath, $name)) {
                $data['image'] = $name;
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
        $data['status'] = $request->status;
        $data['category_id'] = $request->category;
        $data['shop_id'] = $request->shop_id;

        if (Item::create($data)) {
            return response(['status' => true]);
        }
        return response(['status' => false]);
    }

    public function itemShopList()
    {
        $id = $this->_data['shop_id'];
        $data = Item::where('shop_id', '=', $id)->orderBy('id','DESC')->get();
        return response($data);
    }
}
