<?php

namespace App\Http\Controllers;

use App\Item;
use App\Main;
use App\Post;
use App\Shop;
use App\User;
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
        $this->_data['shops'] = Shop::inRandomOrder()->get()->take(2);
        $this->_data['items'] = Item::orderBy('id', 'DESC')->paginate(12);
        return view($this->_path . 'index', $this->_data);
    }

    public function shopList()
    {
        $this->_data['shops'] = Shop::orderBy('name', 'ASC')->paginate(6);
        return view($this->_path . 'shop-list', $this->_data);
    }

    public function userList()
    {
        $this->_data['users'] = User::orderBy('name', 'ASC')->paginate(6);
        return view($this->_path . 'user-list', $this->_data);
    }

    public function postList()
    {
        $this->_data['posts'] = Post::orderBy('id', 'DESC')->paginate(8);
        return view($this->_path . 'post-list', $this->_data);
    }

}
