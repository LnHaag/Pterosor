<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class UsersController extends Controller
{
    public function edit()
    {
        if (Auth::user())
        {
            $user=User::find(Auth::user()->id);
            if($user)
            {
                return view('auth.editprofile')->withUser($user);
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function update(Request $request ,User $user)
    {
        //$user=User::find(Auth::user()->id);
    //dd($request->name);
    //dd($request->firstname);
        /* if($user)
        
        {
           */  //$validate=null;
            /* if (Auth::user()->email===$request['email'])
            {
                $validate=$request->validate([
                    'name' => ['required', 'string', 'max:50'],
                    'email' => ['required', 'string', 'email', 'max:255',],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                    'firstname' =>['required','string','max:60'],
                    'country'=>['nullable','string','max:60'],
                    'organization'=>['nullable','string','max:250'],
                    'webpage' =>['nullable','string','max:70']
                    ]);
            }
            else
            { */
               /*  $validate=$request->validate([
                'name' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:255',],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'firstname' =>['required','string','max:60'],
                'country'=>['nullable','string','max:60'],
                'organization'=>['nullable','string','max:250'],
                'webpage' =>['nullable','string','max:70']
                    ]); */
            //}

            /* if ($validate)
        
            {  */
                $user->name=$request['name'];
                $user->firstname=$request['firstname'];
                $user->email=$request['email'];
                $user->organization=$request->organization;
                $user->country=$request->country;
                $user->webpage=$request->webpage;
                
                $user->save();
                $request->session()->flash('success','Your details have been updated!');
                return view('auth.editprofile'); 
        /*      }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect()->back();
        } */
    }
}
