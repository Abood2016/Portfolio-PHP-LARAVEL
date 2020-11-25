<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user = User::find(Auth::id());
        return view('admin.profile.index', compact('user'));
    }

    public function update(UserRequest $request)
    {
        
        $user = User::findOrFail(auth()->user()->id);
        $array = [];
        if ($request->email != $user->email) {
            $email = User::where('email', $request->email)->first();
            if ($email == null) {
                $array['email'] = $request->email;
            }
        }

        if ($request->name != $user->name) {
            $array['name'] = $request->name;
        }

        if ($request->password != '') {
            $array['password'] = Hash::make($request->password);
        }

        if (!empty($array)) {
            $user->update($array);
        }
        return response()->json([
            'status' => true,
            'msg' => 'تم تحديث البيانات بنجاح',
        ]);
    }
}
