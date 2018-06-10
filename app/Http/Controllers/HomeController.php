<?php

namespace App\Http\Controllers;

use App\Item;
use App\Main;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    private $_path = 'Home.pages.';
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

    public function index()
    {
        $this->_data['items'] = Item::orderBy('id', 'DESC')->paginate(12);
        return view($this->_path . 'index', $this->_data);
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

    public function shopList()
    {
        $this->_data['shops'] = Shop::paginate(6);
        return view($this->_path . 'shop-list', $this->_data);
    }
}
