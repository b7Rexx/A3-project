<?php

namespace App\Http\Controllers;

use App\Main;
use App\Shop;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $_path = 'Admin.pages.';
    private $_data = [];

    public function index()
    {
        return view($this->_path.'index');
    }

    public function home()
    {
        return view($this->_path.'home');
    }


    public function homeAction(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'value' => 'required']);

        if (Main::create([
            'name' => $request->name,
            'value' => $request->value
        ])) {
            return redirect()->route('admin-home')->with('success', 'new item added');
        }

        return redirect()->back()->with('fail', 'There was some problem');
    }


    public function view()
    {
        $this->_data['mains'] = Main::all();
        return view($this->_path.'view', $this->_data);
    }

    public function viewDelete(Request $request)
    {
        $check = Main::find($request->id)->delete();
        if ($check) {
            return redirect()->route('admin-view')->with('success', 'deleted');
        }
        return redirect()->back()->with('fail', 'There was some problem');

    }


    public function adminview()
    {
        $this->_data['shops'] = Shop::all();
        return view($this->_path.'shopView',$this->_data);
    }





    public function test()
    {
        return view('Admin.test');
    }
}
