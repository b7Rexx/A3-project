<?php

namespace App\Http\Controllers;

use App\Main;
use Illuminate\Http\Request;

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

    public function index(){
        return view($this->_path . 'index', $this->_data);
    }

}
