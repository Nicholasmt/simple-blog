<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class BlogAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $count =1;
        $id = session()->get('id');
       $posts =  BlogPost::where('admin_id',$id)->paginate(4);
       return view('blog_admin.all_posts',compact('posts','count'));
    }

     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=['title'=>'required',
                ];
        // $custom_message=['email_phone.required' => 'email or phone number is required'];
        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails())
        {
           return back()->withErrors($validator->errors());
        }
        else
        {
            $id = session()->get('id');

            if($request->hasFile('file'))
            {

                $file = $request->file('file');
               
                if($file->getClientOriginalExtension() == "txt")
                {
                     $handle = fopen($file,'r');
                     $content = fread($handle,filesize($file));
                    // dd($content);
                    BlogPost::create(['title'=>$request->title,
                                           'content'=>$content,
                                            'admin_id'=>$id
                                       ]);

                      return back()->with('success','Post Created Successfully');
                   fclose($handle);
                }
                else
                {
                    return back()->with('error','pls upload txt file');
                }
               
            }
            elseif($request->has('content')) 
            {
                BlogPost::create(['title'=>$request->title,
                                  'content'=>$request->content,
                                   'admin_id'=>$id
                                 ]);
               return back()->with('sucess','Post Created Successfully');
            }
            

            
        }

       
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
