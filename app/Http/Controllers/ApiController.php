<?php

namespace App\Http\Controllers;

use App\Shop;
use App\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
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
        return response()->json(['status' => true]);
    }
}
