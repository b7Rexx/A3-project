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
                return response()->json(['status' => true, 'last_insert_id' => $id]);
            }
        } elseif ($request->type === 'shop') {
            if ($id = Shop::create($data)->id) {
                return response()->json(['status' => true, 'last_insert_id' => $id]);
            }
        }
        return response()->json(['status' => false]);
    }
}
