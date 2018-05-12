<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class shopController extends Controller
{
    private $_path = 'Shop.Admin.pages.';
    private $_data = [];

    public function home()
    {
        return view($this->_path . 'home');
    }
}
