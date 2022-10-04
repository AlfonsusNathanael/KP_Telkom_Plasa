<?php

namespace App\Http\Controllers;

use App\Models\User2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function login(Request $request){
        $username = $request->username;
        $password = $request->password;

        # Get data user
        $user = User2::select('id_user', 'username', 'password', 'nama_user')
                ->where('username',$username)->first();

        # Check apakah data user ada
        if($user){
            # Check Password User
            $encrypted = $user->password;
            $isCorrect = Hash::check($password, $encrypted);
            if($isCorrect){

                $session = array('nama_user' => $user->nama_user);

                session()->put($session);

                return redirect('/');
            } else {
                return redirect()->back()->withErrors(['msg' => 'Password Anda salah']);

            }
        }
        return redirect()->back()->withErrors(['msg' => 'Username/NIP atau Password Anda salah']);
    }

    public function logout(){
        session()->flush();
        return redirect('login');
    }
}
