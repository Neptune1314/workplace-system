<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class EmployerRegisterController extends Controller
{
    public function store(Request $request){
        // return($request)->email;
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type
        ]);
        // return($user);
        Company::create([
            'user_id' => $user->id,
            'cname' => $request->cname,
            'slug' => Str::slug($request->cname)
        ]);
        $user->sendEmailVerificationNotification();

        return redirect()->back('login')->with('MessageCompany', 'Та цахим хаягаа шалгана уу? Таны бүртгүүлсэн хаягруу баталгаажуулах линк явуулсан байгаа.');
    }
}
