<?php

namespace App\Http\Controllers;

use App\Main;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class mainController extends Controller
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
        return view($this->_path . 'index', $this->_data);
    }

    public function login()
    {
        return view($this->_path . 'login', $this->_data);
    }

    public function loginAction(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::guard('shop')->attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended(route('home-index'));
        }
        return redirect()->back()->with('fail', 'Invalid Email or Password Combination.');
    }

    public function logout()
    {
        Auth::guard('shop')->logout();
        return view($this->_path . 'login', $this->_data);
    }

    public function register()
    {
        return view($this->_path . 'register', $this->_data);
    }

    public function registerAction(Request $request)
    {
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        if (Shop::create($data)) {
            return redirect()->to(route('login'))->with('success', 'Registered Successfully');
        }
        return redirect()->back()->with('fail', 'Something went wrong');
    }
}
