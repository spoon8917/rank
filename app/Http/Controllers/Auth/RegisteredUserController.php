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
use Cloudinary;


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
        $img_path = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        // dd($img_path);
        // dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'comment' => ['required', 'string', 'max:255'],
           
        ]);
        
        $sport_id=(int)$request["sport_id"];//register.bladeで $request[sport_id]はstring型になってしまったのでint型に戻す
        $prefecture_id=(int)$request["prefecture_id"];//DBに入れる際は設定したカラムと同じデータ型にする必要がある
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'sport_id' => $sport_id,
            'prefecture_id'=>$prefecture_id,
            'img_path'=>$img_path,
            'comment'=>$request->comment,
        ]);
       
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
