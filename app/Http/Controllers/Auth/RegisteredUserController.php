<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(UserRequest $request)
    {
        Auth::login($user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'company' => $request->company,
            'cvr' => $request->cvr,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'zip' => $request->zip,
            'city' => $request->city,
            'country' => $request->country,
        ]));
        if( count(User::all()) === 1) {
            $user->addRole('admin');
        }

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
