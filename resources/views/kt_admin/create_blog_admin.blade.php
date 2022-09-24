@extends('layouts.body')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
    <h2>Create Blog Admin</h2>
      <ol class="breadcrumb">
            <li class="breadcrumb-item">
             </li>
            <li class="breadcrumb-item-active">
                
            </li>
        </ol>
    </div>
  <div id="confrim-modal"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="ibox-content">
            <div class="row">
                <div class="col-sm-12 b-r">
                   <ul class="nav nav-tabs">
                      <li class="clor"><a class="nav-link" data-toggle="tab" href="#tab-1"><i class="fa fa-plus"></i>Create Blog Admin</a></li>
                     </ul>
                    <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <h3 class="m-t-none m-b text-center table-color">ADD NEW BLOG ADMIN</h3>
                            <form role="form" action="{{ route('kt-adminstore')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                     <input type="text" name="full_name" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Email</label>
                                     <input type="email" name="email" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Phone</label>
                                     <input type="number" name="phone" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Password</label>
                                     <input type="password" name="password" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Confirm Password</label>
                                     <input type="password" name="confirm_password" class="form-control">
                                  </div>
                                 <!-- <div class="form-group">
                                    <select name="active" class="form-control">
                                        <option disabled selected>Select Bulletin Status</option>
                                        <option value="1">ACTIVE</option>
                                        <option value="0">INACTIVE</option>
                                     </select>
                                  </div> -->
                                <div class="form-group" >
                                 <input class="btn btn-ms btn-primary float-right m-t-n-xs" type="submit" value="Create">
                               </div>
                           </form>
                        </div>
                      
                  </div>
             </div>
          </div>
       </div>
   </div>
</div>
@endsection
 
@section('scripts')
  
   
@endsection
