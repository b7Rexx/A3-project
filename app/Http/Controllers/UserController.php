<?php

namespace App\Http\Controllers;

use App\Main;
use App\Rating;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use function MongoDB\BSON\toJSON;

class UserController extends Controller
{
    private $_path = 'Home.user.';
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


    public function loginAction(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember === true ?? false;

        if (Auth::guard('user')->attempt(['email' => $email, 'password' => $password], $remember)) {
//            return redirect()->intended(route('shop-profile'));
            return response(['status' => true]);
        }
        return response(['status' => false]);
//        return redirect()->back()->with('fail', 'Invalid Email or Password Combination.');
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect(route('home'));
    }


    public function signup()
    {
        if (Auth::guard('user')->check()) {
            return redirect(route('user-profile'));
        }
        return view($this->_path . 'signup', $this->_data);
    }

    public function register(Request $request)
    {
        $this->validate($request, ['password' => 'confirmed']);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);

        if ($last_insert_id = User::create($data)->id) {
            return response(['status' => true, 'last_insert_id' => $last_insert_id]);
        }

        return response(['status' => false]);
    }

    public function registerSecond(Request $request)
    {
        $data['phone'] = $request->phone;
        $data['bio'] = $request->bio;
        $data['address'] = $request->address;

        User::find($request->id)->update($data);
        return response(['id' => $request->id]);
    }

    public function profile($id)
    {
        if (empty($id)) return redirect()->to(route('user-signup'));

        if (Auth::guard('user')->user()) {
            if ($id == Auth::guard('user')->user()->id) {
                return redirect(route('user-profile'));
            }
        }

        $this->_data['user'] = User::find($id);
        return view($this->_path . 'user-guest', $this->_data);
    }

    public function LoggedProfile()
    {
        $this->_data['user_id'] = Auth::guard('user')->user()->id;
        if (empty($this->_data['user_id'])) return redirect()->to(route('home'));
        $id = $this->_data['user_id'];
        $this->_data['user'] = User::find($id);
        return view($this->_path . 'user-profile', $this->_data);
    }


    public function profileImageUpload(Request $request)
    {
        $this->_data['user_id'] = Auth::guard('user')->user()->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/user/profile/');
            if ($image->move($destinationPath, $name)) {
                $data['image'] = $name;
                $old_image = 'images/user/profile/' . User::find($this->_data['user_id'])->image;
                if (File::exists($old_image)) {
                    File::delete($old_image);
                }

                User::find($this->_data['user_id'])->update($data);
                return redirect()->back()->with(['success' => 'Image uploaded successfully']);
            };
        };
        return redirect()->back()->with(['fail' => 'Failed to upload image']);
    }

    public function rate(Request $request)
    {
        $data['user_id'] = Auth::guard('user')->user()->id;
        $data['item_id'] = $request->id;
        $data['rate'] = $request->value;

        $getid = Rating::where('item_id', '=', $data['item_id'])->where('user_id', '=', $data['user_id']);

        if ($getid->update($data)) {
            return response(['message' => true]);
        } else if (Rating::create($data)) {
            return response(['message' => true]);
        }
        return response(['message' => false]);
    }

    public function post(Request $request)
    {
        var_dump($request->title);
        var_dump($request->description);
        var_dump($request->image);
        var_dump($request->video);
        die;
    }

}
