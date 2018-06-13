<?php

namespace App\Http\Controllers;

use App\Item;
use App\Main;
use Illuminate\Http\Request;

class ItemController extends Controller
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

    public function browse()
    {
        $this->_data['items'] = Item::orderBy('name')->paginate(16);
        return view($this->_path . 'browse-item', $this->_data);
    }
}
