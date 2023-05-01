<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    /**
     * Show the login page.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginPage()
    {
        return view('admin.auth.login');
    }

    public function login(AdminLoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        if (auth()->guard('admin')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login')->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }


    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }

    // public function makeNewAdmin()
    // {
    //     $admin = new Admin();
    //     $admin->name = 'fares';
    //     $admin->email = 'fares@gmail.com';
    //     $admin->username = 'fares';
    //     $admin->password = bcrypt('123456');
    //     $admin->com_code = '125833';
    //     $admin->save();
    // }
}
