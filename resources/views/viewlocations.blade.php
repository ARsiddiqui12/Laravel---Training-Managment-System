@extends('layouts.master')

@push('css')



        <link href="{!! asset('theme/assets/global/plugins/datatables/datatables.min.css') !!}" rel="stylesheet" type="text/css" />
        <link href="{!! asset('theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')!!}" rel="stylesheet" type="text/css" />

<style>
.buttons-print,.buttons-excel,.buttons-copy,.buttons-csv,.buttons-pdf,.buttons-colvis {
  background-color: #32c5d2 !important;
  color: white !important;
    border-color: white !important;
}
  
</style>

@endpush


@section('content')




    <div class="container-fluid">
        <div class="page-content">
            <!-- BEGIN BREADCRUMBS -->
            <div class="breadcrumbs">
                <h1 style="text-transform: none;">View Training Locations List</h1>
                <ol class="breadcrumb">
                    <li>
                        Home
                    </li>
                    <li>
                        Training
                    </li>
                    <li class="active">View List</li>
                </ol>
                <!-- Sidebar Toggle Button -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".page-sidebar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="toggle-icon">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </span>
                </button>
                <!-- Sidebar Toggle Button -->
            </div>
            <!-- END BREADCRUMBS -->
            <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
            <div class="page-content-container">
                <div class="page-content-row">
                    
                   
                        <!-- BEGIN PAGE BASE CONTENT -->

                        <div class="row">
                            <div class="col-md-12">
                                
                                 @if(Session('deletemsg'))

                                            <div class="form-body">
                                            <div class="alert alert-success" role="alert" style="font-style: italic;">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                
                                                Success: {{ Session('deletemsg') }}</div>
                                            </div>

                                        @endif
                                
                                <!-- BEGIN VALIDATION STATES-->
                                <div class="portlet light portlet-fit portlet-form bordered" id="form_wizard_1">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-green"></i>
                                            <span class="caption-subject font-green sbold uppercase">Training Locations</span>
                                        </div>

                                    </div>
<div class="portlet-body" style="padding:10px;">
                                                
                                                
                                                <div class="table-toolbar">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="btn-group">
    <a href="{{url('training/addlocation')}}" id="sample_editable_1_new" class="btn sbold green"> Add New
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
    
                                            
                                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                S.No
                                                            </th>
                                                            <th> Location Id </th>
                                                            <th> Location </th>
                                                            <th> Catgory </th>
                                                            <th> Address </th>
                                                            <th> Country </th>
                                                            <th>State</th>
                                                            <th>City</th>
                                                            <th>Taluka / Tehsil</th>
                                                            <th>Union Council</th>
                                                            <th>Telephone</th>
                                                            <th>Focal Person</th>
                                                            <th>Focal Person Mobile No.</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
<tbody>
                                                        
    <?php $var = 1; ?>
    
    @forelse($locations as $record)
    
    <tr class="odd gradeX">
        
                                                            <td>{{$var}}</td>
                                                            <td>{{$record->locationid}}</td>
                                                            <td> {{$record->location}} </td>
                                                            <td> {{$record->category}} </td>
                                                            <td> {{$record->address}} </td>
                                                            <td><?php $expcountry=explode("-",$record->country); ?> {{$expcountry[1]}}</td>
                                                            <td><?php $expstate=explode("-",$record->state); ?> {{$expstate[1]}}</td>
                                                            <td><?php $expcity=explode("-",$record->city); ?> {{$expcity[1]}}</td>
                                                            <td>{{$record->taluka}} </td>
                                                            <td>{{$record->uc}} </td>
                                                            <td>{{$record->telephone}} </td>
                                                            <td>{{$record->forcalperson}} </td>
                                                            <td>{{$record->mobile}} </td>
        
        
                                                            <td>
                                                                <div class="btn-group">
                                                                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                        <i class="fa fa-angle-down"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu" role="menu">
<!--
                                                                        <li>
                        <a href="#">
                        <i class="fa fa-edit"></i>Edit </a>
                                                                        </li>
-->
                        <li>
                     <a href="javascript:;" class="deletelocation" id="{{$record->id}}">
                    <i class="icon-trash"></i> Delete </a>
                                                                        </li>
<!--
                                                                        <li>
                                                                            <a href="#">
                                                                                <i class="icon-user"></i> New User </a>
                                                                        </li>
-->
<!--                                                                        <li class="divider"> </li>-->
<!--
                                                                        <li>
                                                                            <a href="#">
                                                                                <i class="icon-flag"></i> Comments
                                                                                <span class="badge badge-success">4</span>
                                                                            </a>
                                                                        </li>
-->
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
    
    <?php $var++; ?>
@empty
    
    
<tr class="odd gradeX">
    
    <td colspan="6">
        <div class="alert alert-info">
        <strong>Record Not Found...!</strong>
        </div>
    </td>
    
</tr>
    
    
@endforelse    
                                                                                                    
</tbody>
                                                </table>
                                            </div>                                    
                                </div>
                                <!-- END VALIDATION STATES-->
                            </div>
                        </div>
                        
                        
                        
                        <!-- END PAGE BASE CONTENT -->
                   
                </div>
            </div>
            <!-- END SIDEBAR CONTENT LAYOUT -->
        </div>
        <!-- BEGIN FOOTER -->
        <p class="copyright"> 
             2017 &copy; TRAIN SMART By ABDUL REHMAN
        </p>
<!--
        <a href="#index" class="go2top">
            <i class="icon-arrow-up"></i>
        </a>
-->
        <!-- END FOOTER -->
    </div>

    <!-- END CONTAINER -->
    <!-- BEGIN QUICK SIDEBAR -->
    
    






















@endsection


















@push('js')


<script src="{!! asset('theme/assets/global/scripts/datatable.js')!!}" type="text/javascript"></script>

<script src="{!! asset('theme/assets/global/plugins/datatables/datatables.min.js')!!}" type="text/javascript"></script>

<script src="{!!asset('theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')!!}" type="text/javascript"></script>

<script src="{!! asset('theme/assets/pages/scripts/table-datatables-managed.min.js')!!}" type="text/javascript"></script>

<script type="text/javascript">
    
    $(document).ready(function(){
    $('#sample_1').DataTable({
        
         
        "pageLength": 25,
        "scrollX": true,
         dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print','colvis'
        ]
        
        
    });
        
    $(".deletelocation").click(function(){
        
      var id = $(this).attr("id");
        
      var msg = confirm("Are you sure you want to delete it?");

        if(msg==true)
            {
                
                window.location.href="{{url('training/deletelocation')}}/"+id;
            }
        
    });  
        
});

</script>

@endpush
