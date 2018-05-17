<?php

namespace App\Http\Controllers;

use App\Main;
use Illuminate\Http\Request;

class GuestController extends Controller
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

    public function home()
    {
        return view($this->_path . 'home', $this->_data);
    }

    public function login($type = 'home')
    {
        return view($this->_path . 'login', $this->_data);
    }

    public function shopLogin(Request $request)
    {
        $this->_data['post'] = $request->all();
        return view($this->_path . 'login/shop', $this->_data)->with('fail', 'Invalid login information');
    }

    public function userLogin(Request $request)
    {
        $this->_data['post'] = $request->all();
        return view($this->_path . 'login/user', $this->_data)->with('fail', 'Invalid login information');
    }
}
