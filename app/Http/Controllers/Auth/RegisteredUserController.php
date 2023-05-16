<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Sport;
use App\Models\Prefecture;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Sport $sport, Prefecture $prefecture): View
    {
        return view('auth.register')->with(['sports' => $sport->get()])->with(['prefectures' => $prefecture->get()]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'sport' => ['required', 'string'],
            'prefecture' => ['required', 'string'],
            'image' => ['required', 'string'],
            'comment' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'sport' =>$request->sport,
            'prefecture'=>$request->prefecture,
            'image'=>$request->image,
            'comment'=>$request->comment,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
