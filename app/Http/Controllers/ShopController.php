<?php

namespace App\Http\Controllers;

use App\Main;
use App\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    private $_path = 'Guest.pages.';
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

    public function list()
    {
        $this->_data['shop_carousel'] = Shop::all()->take(5);
        $this->_data['shop_list'] = Shop::all();
        return view($this->_path . 'shop-list', $this->_data);
    }

    public function shopview($id)
    {
        $this->_data['shop_carousel'] = Shop::all()->take(5);
        $this->_data['shop'] = Shop::find($id);
        return view($this->_path . 'shop-view', $this->_data);
    }
}
