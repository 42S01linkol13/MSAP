<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginPage;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function index(request $request){

        $root = $request->get('root');
        $user = $request->get('user');
        $admin = LoginPage::first();

        if($admin && $root == $admin->root && $user == $admin->user){
            $request->session()->regenerate();
            return redirect('/msap/mainpage');
        } else {
            abort(403, 'Error data.');
        }
    }

   public function post(request $request){

        $root = $request->get('root');
       $user = $request->get('user');
       $admin = LoginPage::first();

       if($admin && $root == $admin->root && $user == $admin->user){
           $role =  json_encode(['role' => 'admin', 'is_registered' => true]);
           Auth();
           $admin->is_registered = true; // Устанавливаем статус регистрации
           $admin->save();
           Session::put('user', ['role' => 'admin', 'is_registered' => true]);
           cookie('role', $role);
           return redirect('/msap/');
       } else {
           abort(403, 'Error data.');
       }
   }
}
