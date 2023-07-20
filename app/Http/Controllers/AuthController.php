<?php
 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
 
class AuthController extends Controller
{
    
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $input) {
        $checkEmail = User::where('email', $input->email)->first();
        if($checkEmail) {
            $login = Auth::attempt(['email' => $input->email, 'password' => $input->password], true);
            if ($login) {
                $checkEmail->last_login = date('Y-m-d H:i:s');
                $checkEmail->save();
                return redirect()->route('user');
            }
            return redirect()->back()->with('danger', 'Maaf, Password yang Anda masukkan salah.');
        }
        return redirect()->back()->with('danger', 'Maaf, email yang Anda masukkan belum terdaftar');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

}