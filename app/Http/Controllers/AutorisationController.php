<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserCreator;
use http\Exception\RuntimeException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AutorisationController extends Controller
{
   public function CreateUser(Request $request)
   {
       $identifyUser = User::where('name', $request->name)->first();

       if($request->name == $identifyUser){
            throw new RuntimeException("User with this name already has");

       }
        else {
            $person = new UserCreator();

            $user = $person->AddUser(
                $request->name,
                $request->password,
                $request->email
            );

            $user->save();

            return redirect()->route('anime');
        }
   }

   public function authenticate(Request $request): RedirectResponse
   {

       $credentials = $request->validate([
           'email' => ['required', 'email'],
           'password' => ['required'],
       ]);

       if (Auth::attempt($credentials)) {
           $request->session()->regenerate();

           return redirect()->intended('');
       }

       return back()->withErrors([
           'email' => 'Предоставленные учетные данные не соответствуют нашим записям.',
       ])->onlyInput('email');

   }
}
