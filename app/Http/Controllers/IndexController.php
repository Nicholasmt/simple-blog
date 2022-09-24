<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function redirect()
    {
        if(session()->get('authentication') == true && session()->get('privilege') == 2)
        {
          return redirect('blog-admin/posts');
        }
        
         
    }

    public function authentication(Request $request)
    {

       
       $rules=['email_phone'=>'required',
               'password'=>'required'
              ];
       $custom_message=['email_phone.required' => 'email or phone number is required'];
       $validator = \Validator::make($request->all(),$rules,$custom_message);
       if($validator->fails())
       {
          return back()->withErrors($validator->errors());
       }
       else
       {
         $password = $request->password;
        //  dd($password);
         $user = Admin::where('email',$request->email_phone)
                        ->orWhere('phone',$request->email_phone)->first();
       
         
         if($user)
         {
            if(\Hash::check($password,$user->password))
            {
                    $request->session()->put('id', $user->id);
                    $request->session()->put('full_name', $user->full_name);
                    $request->session()->put('privilege', $user->role_id);
                    $request->session()->put('authentication', true);
                    return redirect('redirectAuth');
                 }
            else
            {
                return back()->with('error','email and password is incorrect!');
            }

         }
         else
         {
            return back()->with('error','User does not exist!');
         }
      }
    }


    public function logout(Request $request)
    {
       $request->session()->invalidate();
       return redirect('/');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
