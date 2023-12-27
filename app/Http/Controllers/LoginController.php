<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Mobile;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function perform(Request $request)
    {
        $account = Account::whereEmail($request->email)
                         ->wherePassword($request->password)->first();

        if($account != null) {
            //in case, login OK, go to home page
            $data = Mobile::all();
            return view('index', compact('data'));
        }

        //login not OK
        return redirect()->to('login')
            ->withErrors('Username or password invalid');

        //return view('auth.login');
    }

//    public function login(LoginRequest $request)
//    {
//        $credentials = $request->getCredentials();
//
//        if(!Auth::validate($credentials)):
//            return redirect()->to('login')
//                ->withErrors(trans('auth.failed'));
//        endif;
//
//        $user = Auth::getProvider()->retrieveByCredentials($credentials);
//
//        Auth::login($user);
//
//        return $this->authenticated($request, $user);
//    }

}
