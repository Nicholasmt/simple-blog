<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class KtAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('kt_admin.create_blog_admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=['full_name'=>'required',
                'email'=>'required',
                'phone'=>'required',
                'password'=>'required',
                'confirm_password'=>'required|same:password',
               ];
       
        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return back()->withErrors($validator->errors());
        }
        else
        {
             Admin::create(['full_name'=>$request->full_name,
                            'email'=>$request->email,
                            'phone'=>$request->phone,
                            'role_id'=> 2,
                            'password'=>\Hash::make($request->password),
                          ]);
            return back()->with('success','Created Successfully');
        }
    }

    public function blog_admins()
    {
        $css=[
            'css/plugins/dataTables/datatables.min.css' 
            ];
          $js=[
                'js/plugins/dataTables/datatables.min.js','js/plugins/dataTables/dataTables.bootstrap4.min.js'
             ];
        $count=1;
        $blog_admins = Admin::where('role_id',2)->get();
        return view('kt_admin.view_blog_admins',compact('blog_admins','count','js','css'));
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
