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
        return view($this->_path . 'index');
    }

    public function home()
    {
        return view($this->_path . 'home');
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
        return view($this->_path . 'view', $this->_data);
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
        return view($this->_path . 'shopView', $this->_data);
    }

    public function carousel()
    {
        return view($this->_path . "carousel");
    }

    public function carouselAction(Request $request)
    {
        if ($request->hasFile('carousel')) {
            $files = $request->file('carousel');
            foreach ($files as $key => $file) {
                $extension = strtolower($file->extension());
                $newName = str_random(10) . '_' . time() . "." . $extension;
                $file->move(public_path('images/carousel/'), $newName);
                $data[$key] = $newName;
            }
            if (Main::create(['name' => 'carousel', 'value' => serialize($data)]))
                return redirect()->route('admin-view')->with('success', 'Image uploaded successfully');
        }
        return redirect()->route('admin-carousel')->with('fail', 'Fail Image upload');
    }

    public function test()
    {
        return view('Admin.test');
    }
}
