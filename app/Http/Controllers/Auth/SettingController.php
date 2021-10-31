<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dentistguest;
use Auth;
use Hash;

class SettingController extends Controller
{
    public function setting()
    {
        return view('auth.setting', [
            'dentistguests' => Dentistguest::where('cektahun', 1)->orderBy('tahun', 'desc')->get()
        ]);
    }
   
    public function password(Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:4|max:20',
            'new_password' => 'required|min:4|max:30|confirmed'
        ]);
        
        $id = Auth::user()->id;
        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $current_password = Auth::user()->password;

        if (Hash::check($old_password, $current_password)):
            if (Hash::check($new_password, $current_password)):
                return redirect()->route('setting')->with('password', 'Password Baru Sama Dengan Password Lama!');
            else:
                user::where('id', $id)->update([
                    'password' => Hash::make($new_password)
                ]);
                return redirect()->route('setting')->with('password', 'Password Berhasil Diganti');
            endif;
        else:
            return redirect()->route('setting')->with('password', 'Password Lama Salah!');
        endif;

    }
    
    public function username(Request $request)
    {
        $request->validate([
            'username' => 'required|min:4|max:20',
            'password' => 'required|min:4|max:30'
        ]);
        
        $id = Auth::user()->id;
        $usernamebaru = $request->username;
        $password = $request->password;
        $usernamelama = Auth::user()->username;
        $current_password = Auth::user()->password;

        if ($usernamebaru == $usernamelama):
            return redirect()->route('setting')->with('username', 'Username baru tidak boleh sama dengan username lama');
        else:
            if (Hash::check($password, $current_password)):
                user::where('id', $id)->update([
                    'username' => $usernamebaru
                ]);
                return redirect()->route('setting')->with('username', 'Username berhasil diganti');
            else:
                return redirect()->route('setting')->with('username', 'Password salah');
            endif;
        endif;
    }

    public function photoprofile(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'passsword' => 'required'
        ]);

        $id = Auth::user()->id;
        $current_password = Auth::user()->password;

        if (Hash::check($request->passsword, $current_password)):
            $oldimage = Auth::user()->image;
            if($oldimage):
                \Storage::delete($oldimage);
            endif;
            $filephoto = request()->file('photo');
            $file = $filephoto->storeAs("images/profile", "ID-{$id}-photo-{$filephoto->getMtime()}.{$filephoto->getClientOriginalExtension()}");
            user::where('id', $id)->update([
                'image' => $file
            ]);
            return redirect()->route('setting')->with('photo', 'Foto profil berhasil diganti');
        else:
            return redirect()->route('setting')->with('photo', 'Password salah');
        endif;
    }
}
