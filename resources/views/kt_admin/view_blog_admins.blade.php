@extends('layouts.body')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
    <h2>VIEW BLOG ADMINS</h2>
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
                     <li><a class="nav-link active" data-toggle="tab" href="#tab-2"><i class="fa fa-newspaper-o"></i> VIEW BLOG ADMINS</a></li>
                    </ul>
                    <div class="tab-content">
                      <div id="tab-2" class="tab-pane active">
                          <div class="row">
                            <div class="col-lg-12">
                               <div class="ibox ">
                                  <div class="ibox-title">
                                      <h5 class="table-color">BLOG ADMINS</h5>
                                       <div class="ibox-tools">
                                          <a class="collapse-link">
                                           <i class="fa fa-chevron-up"></i>
                                          </a>
                                         <ul class="dropdown-menu dropdown-user">
                                         </ul>
                                        </div>
                                    </div>
                                   <div class="ibox-content">
                                     <div class="table-responsive">
                                      <table class="table table-bordered table-hover users" >
                                        <thead class="table-color">
                                           <tr>
                                            <th>S/N</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                           </tr>
                                      </thead>
                                   <tbody>
                                      @foreach ($blog_admins as $blog_admin)
                                      <tr class="gradeX">
                                        <td>{{$count++}}</td>
                                        <td class="tb">{{($blog_admin->full_name)}}</td>
                                        <td class="tb">{{($blog_admin->email)}} </td>
                                        <td class="lg-col-2 del">{{($blog_admin->phone)}}</td>
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
			                   </div>
			                 </div>
		                 </div>
	                 </div>
                 </div>
               </div>
             </div>
          </div>
       </div>
   </div>
</div>
@endsection
@section('')
@section('scripts')
  <script src="{{ asset('assets/js/delete.js')}}"></script>
  <script src="{{ asset('js/plugins/dataTables/datatables.min.js')}}"></script>
  <script src="{{ asset('js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>
  <script>
    $(document).ready(function()
      {
        $('.users').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                customize: function (win)
                {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                  }
               }
            ]

        });

        
     });


</script>
@endsection
