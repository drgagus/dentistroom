<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class LoginController extends Controller
{
    public function formlogin()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        $attr = request()->validate([
            'username' => 'required|max:20',
            'password' => 'required|max:20'
        ]);

        $username = $request->username;
        $password = $request->password;
        $cekuser = User::where('username',$username)->first();
        if ($cekuser):
            $cekuser = User::where('username',$username)->first();
            if(Hash::check($request->password, $cekuser->password)):
                if($cekuser->position == 'dentist'):
                    Auth::attempt($attr);
                    return redirect()->route('home')->with('status', 'selamat datang');
                elseif($cekuser->position == 'dentistguest'):
                    if (date('Y-m-d') <= date('Y-m-d', strtotime($cekuser->expired))):
                        Auth::attempt($attr);
                        return redirect()->route('guest')->with('status', 'selamat datang guest');
                    else:
                        return redirect()->route('login')->with('status', 'Akun Guest Telah Expired');
                    endif;
                else:
                    return redirect()->route('login')->with('status', 'akses dilarang');
                endif;
            else:
                return redirect()->route('login')->with('status', 'password salah');
            endif;
        else:
            return redirect()->route('login')->with('status', 'username salah');
        endif;
    }
}
