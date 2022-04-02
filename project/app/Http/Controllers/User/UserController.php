<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('user.dashboard', compact('user'));
    }

    public function trans()
    {
        $user = Auth::user();
        return view('user.transactions', compact('user'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        //--- Validation Section
        $request->validate([
            'photo' => 'mimes:jpeg,jpg,png',
            'email' => 'unique:users,email,' . Auth::user()->id
        ]);

        //--- Validation Section Ends
        $input = $request->all();
        $data = Auth::user();
        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('assets/images/users/', $name);
            if ($data->photo != null) {
                if (file_exists(public_path() . '/assets/images/users/' . $data->photo)) {
                    unlink(public_path() . '/assets/images/users/' . $data->photo);
                }
            }
            $input['photo'] = $name;
        }
        $data->update($input);
        $msg = 'Profile details updated successfully.';
        return redirect()->back()->with('success', $msg);
    }

    public function resetform()
    {
        return view('user.password');
    }

    public function reset(Request $request)
    {
        $user = Auth::user();
        if ($request->cpass) {
            if (Hash::check($request->cpass, $user->password)) {
                if ($request->newpass == $request->renewpass) {
                    $input['password'] = Hash::make($request->newpass);
                } else {
                    return response()->json(array('errors' => [0 => 'Confirm password does not match.']));
                }
            } else {
                return response()->json(array('errors' => [0 => 'Current password Does not match.']));
            }
        }
        $user->update($input);
        $msg = 'Successfully change your password';
        return response()->json($msg);
    }

    public function affilate_code()
    {
        $user = Auth::guard('web')->user();
        return view('user.affilate_code', compact('user'));
    }
}