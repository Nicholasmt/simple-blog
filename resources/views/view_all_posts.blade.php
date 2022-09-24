@extends('layouts.app')

@section('body')

<body class="gray-bg">
 
<div class="navbar-wrapper">
<nav class="navbar navbar-default navbar-fixed-top navbar-expand-md" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="{{ route('kt-admincreate')}}">KT BLOG</a>
        <div class="navbar-header page-scroll">
        @include('layouts.error')
        </div>
        <div class="  navbar-collapse justify-content-end" id="navbar">
            <ul class="nav   navbar-right">
                <li> </li>
                <!-- Blog Admin login Modal starts -->
                    <div class="text-center">
                    @if(Session::get('privilege') ==2 && Session::get('authentication') == true)
                      <a href="{{ route('blog-admin-posts')}}" class="btn btn-primary btn-sm"> Blog Admin Dasboard</a>
                    @else
                      <button type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#myModal5" aria-hidden="true">
                        Login
                      </button>
                    @endif
                    
                    </div>
                <div class="modal inmodal" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form action="{{ route('blog-adminAuth')}}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModal5">Blog Admin Login</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                            <label for="">Enter Email or Phone</label>
                            <input type="text" class="form-control" name="email_phone">
                            </div>
                            <div class="form-group">
                            <label for="">Enter Password</label>
                            <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </div>
                        </form>
                     </div>
                  </div>
              </div>
           <!-- Blog Admin Login Modal Ends -->
           </ul>
        </div>
     </div>
  </nav>
 
</div>
 
<section class="margin">
    <div class="container">
        <div class="row m-b-lg ">
            <div class="col-lg-12 text-color">
                <div class="navy-line"></div>
                <h1 class="text-info">VIEW ALL POSTS</h1>
                <span> 
                  <div class="text-center">
                    
                </div>
              </span>
             </div>
        </div>
        <div class="row">
        <div class="ibox">
            @if ($posts->count()==0)
             <p class="badge badge-info text-center"> No Post Found</p>
            @else

            @foreach ($posts as $post)
            <div class="ibox-content">
                <a href="#" class="btn-link">
                    <h2>
                       {{$post->title}}
                    </h2>
                </a>
                <div class="small m-b-xs">
                    <strong>posted by: {{$post->posted_by->full_name}}</strong> <span class="text-muted">Time <i class="fa fa-clock-o"></i> {{$post->created_at->diffForHumans()}}</span>
                </div>
                <p>
                  Content:  {{$post->content}}
                </p>
             </div>
          @endforeach
        @endif
         </div>
         <div class="d-flex justify-content-center">
             {{$posts->links()}}
         </div>
     </div>

     
     


</div>
</section>
 
  

 
</body> 
<style>
   .margin{
     color:black;
     margin-top:8%
   }
</style>
 
<script src="{!! asset('assets/js/app.js') !!}" ></script>
 @endsection