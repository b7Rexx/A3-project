<?php

namespace App\Http\Controllers;

use App\Main;
use App\Shop;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class ApiController extends Controller
{
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

    public function registerFirst(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:shops,email',
            'password' => 'required|confirmed'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        if ($request->type === 'user') {
            if ($id = User::create($data)->id) {
                return response()->json(['status' => true, 'last_insert_id' => 'U=' . $id]);
            }
        } elseif ($request->type === 'shop') {
            if ($id = Shop::create($data)->id) {
                return response()->json(['status' => true, 'last_insert_id' => 'S=' . $id]);
            }
        }
        return response()->json(['status' => false]);
    }


    public function registerSecond(Request $request)
    {
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $data['bio'] = $request->bio;
        if ($request->id[0] === 'U') {
            $id = trim($request->id, 'U=');
            User::where('id', '=', $id)->update($data);
        } elseif ($request->id[0] === 'S') {
            $id = trim($request->id, 'S=');
            Shop::where('id', '=', $id)->update($data);
        }
        return response()->json(['status' => true, 'type' => $request->id[0], 'id' => $id]);
    }

    public function registerProfile($id)
    {
        if ($id[0] === 'U') {
            $this->_data['model'] = 'user';
            $this->_data['profile'] = User::where('id', '=', explode('=', $id)[1])->get();
            return view('Guest.pages.profile', $this->_data);
        } elseif ($id[0] === 'S') {
            $this->_data['model'] = 'shop';
            $this->_data['profile'] = Shop::where('id', '=', explode('=', $id)[1])->get();
            return view('Guest.pages.profile', $this->_data);
        }
        return view('Guest.pages.profile', $this->_data)->with('fail', 'Unmatched profile id`');
    }

    public function addPic(Request $request)
    {
        if ($request->hasFile('profile')) {
            $file = $request->profile;
            $extension = strtolower($file->extension());
            $newName = time() . '_.' . $extension;
//            Image::make(Input::file($file))->resize(380, 280)->save('public/images/profile/' . $newName);
            $request->profile->move(public_path('images/profile'), $newName);

            $data['image'] = $newName;
            if ($request->model === 'user') {
                User::where('id', '=', $request->id)->update($data);
            } elseif ($request->model === 'shop') {
                Shop::where('id', '=', $request->id)->update($data);
            }
        }
        return redirect()->back();
    }
}
