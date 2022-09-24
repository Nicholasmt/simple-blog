@extends('layouts.app')

@section('body')

<body class="gray-bg">
 
<div class="navbar-wrapper">
<nav class="navbar navbar-default navbar-fixed-top navbar-expand-md" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="{{('/')}}">KT BLOG ADMIN</a>
        <div class="navbar-header page-scroll">
        @include('layouts.error')
        </div>
        <div class="  navbar-collapse justify-content-end" id="navbar">
            <ul class="nav   navbar-right">
                <li> </li>
                <!-- Blog Admin login Modal starts -->
                    <div class="text-center">
                    <a href="{{ route('app-logout')}}" class="btn btn-primary btn-sm"> Logout</a>
                    <a href="{{ route('blog-posts')}}" class="btn btn-success btn-sm"> View Blog</a>
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
                <h1 class="text-info">BLOG ADMIN POSTS</h1>
                <span> 
                  <div class="text-center">
                    <button type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#myModal5" aria-hidden="true">
                        <i class="fa fa-plus"></i> ADD POST
                    </button>
                </div>
              </span>
             </div>
        </div>
        <div class="row">
        <div class="ibox">
            @if ($posts->count()==0)
             <p class="badge badge-info text-center"> No Post Found</p>
            @else
           <div class="ibox-content">
           <div class="table-responsive">
                <table class="table table-bordered table-hover users" >
                <thead class="table-color">
                    <tr>
                    <th>S/N</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Posted BY</th>
                    </tr>
                </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr class="gradeX">
                <td>{{$count++}}</td>
                <td class="tb">{{($post->title)}}</td>
                <td class="tb">{{($post->content)}} </td>
                <td class="lg-col-2 del">{{($post->posted_by->full_name)}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <thead class="table-color">
                <tr>
                    <th>S/N</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    </tr>
                </thead>
            </tfoot>
                </table>
            </div>
         @endif
         </div>
         <div class="d-flex justify-content-center">
             {{$posts->links()}}
         </div>
     </div>

     @if(Session::get('privilege') ==2 && Session::get('authentication') == true)
       <!--Add post Modal starts -->
        <div class="modal inmodal" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('blog-admin-addPosts')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="myModal5">ADD NEW POST</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                    <label for="">Enter Post Title</label>
                    <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                      <label for="">Enter Post Content</label>
                      <textarea type="text" class="form-control" name="content"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">OR Upload a Text File</label>
                      <input type="file" class="form-control-file" name="file"> 
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
 <!--Add post Modal Ends -->
  @endif 
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