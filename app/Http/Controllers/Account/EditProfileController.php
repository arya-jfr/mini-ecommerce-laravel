<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\EditProfilePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;

class EditProfileController extends Controller
{
    public function index()
    {
        $title = 'اطلاعات حساب کاربری';
        $user = auth()->user();

        return view('account.edit-profile', compact('user', 'title'));
    }

    public function post(EditProfilePostRequest $request)
    {

        $inputs = $request->only([
           'first_name',
           'last_name',
           'mobile',
           'email'
        ]);

        if ($request->filled('password')){
            $inputs['password'] = Hash::make($request->input('password'));
        }

        Auth::user()->update($inputs);

        return redirect()->back();
    }
}
