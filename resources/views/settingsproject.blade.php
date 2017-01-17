@extends('layouts.master')

@push('css')


<link href="{!! asset('theme/assets/global/plugins/datatables/datatables.min.css') !!}" rel="stylesheet" type="text/css" />
        <link href="{!! asset('theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')!!}" rel="stylesheet" type="text/css" />

<link href="{!! asset('theme/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css')!!}" rel="stylesheet" type="text/css" />

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
                        <h1>"{{$projectdetail[0]->title}}" Settings</h1>
                        <ol class="breadcrumb">
                            <li>
                                SMART
                            </li>
                            <li>
                                Project
                            </li>
                            <li class="active">Settings</li>
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
                            <!-- BEGIN PAGE SIDEBAR -->
                            <div class="page-sidebar">
                                <nav class="navbar" role="navigation">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <ul class="nav navbar-nav margin-bottom-35">
                                        <li class="active">
                                            <a href="index-2.html">
                                                <i class="icon-home"></i> Home </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-note "></i> Reports </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-user"></i> User Activity </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-basket "></i> Marketplace </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-bell"></i> Templates </a>
                                        </li>
                                    </ul>
                                    <h3>Quick Actions</h3>
                                    <ul class="nav navbar-nav">
                                        <li>
                                            <a href="#">
                                                <i class="icon-envelope "></i> Inbox
                                                <label class="label label-danger">New</label>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-paper-clip "></i> Task </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-star"></i> Projects </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-pin"></i> Events
                                                <span class="badge badge-success">2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- END PAGE SIDEBAR -->
                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- BEGIN Portlet PORTLET-->
                                        <div class="portlet box green">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    Project Working Areas
                                                
                                                
                                                </div>
                                                <div class="tools">
<!--                                                     <a href="javascript:;" class="collapse"> </a>-->
<!--                                                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>-->
                                                    <a href="#" class="fullscreen"> </a>
<!--                                                    <a href="javascript:;" class="reload"> </a>-->
                                                </div>
                                                
                                            </div>
                                            <div class="portlet-body">
                                                @if(Session('deletemsg'))

                                            <div class="form-body">
                                            <div class="alert alert-success" role="alert" style="font-style: italic;">Success: {{ Session('deletemsg') }}</div>
                                            </div>

                                        @endif  
                                                <a href="javascript:;" class="btn green" data-toggle="modal" data-target="#mymodal" data-backdrop="static" data-keyboard="false">
                                                        <i class="fa fa-plus"></i> Add New</a>
                                                <br><br>
                                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                                @if(count($workingarea)>0)
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                S.No
                                                            </th>
                                                            <th> Project </th>
                                                            <th> Country </th>
                                                            <th> State </th>
                                                            <th> City </th>
                                                            <th> Actions </th>
                                                        </tr>
                                                    </thead>
                                                @endif
<tbody>
    <?php $var = 1; ?>
                                                        
    @forelse($workingarea as $recordone)
    
    <tr class="odd gradeX">
    
    <td>{{$var}}</td>    
        
    <td>{{$recordone->projectname}}</td>
        
    <td>{{$recordone->country}} </td>
    
    <td>{{$recordone->state}}</td>
    
    <td>{{$recordone->city}}</td>
    
    
        
        
                                                            <td>
                                                                <div class="btn-group">
<a href="javascript:;" class="btn btn-xs btn-danger deletecountry" id="{{$recordone->id}}" type="button" data-toggle="dropdown" aria-expanded="false"> Delete
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                    
                                                                </div>
                                                            </td>
                                                        </tr>
    
   
    <?php $var++; ?>
@empty    

        <div class="alert alert-info" style="text-align:center;">
        <strong>Record Not Found...!</strong>
        </div>
    
    
@endforelse    
   
                                                                                                    
</tbody>
                                                </table>    
                                                
                                            </div>
                                        </div>
                                        <!-- END Portlet PORTLET-->
                                    </div>
                                </div>
                                
                                
                                
<div class="row">
                                    <div class="col-md-12">
                                        <!-- BEGIN Portlet PORTLET-->
                                        <div class="portlet box green">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    Targeted Working Place
                                                
                                                </div>
                                                <div class="tools">
<!--                                                    <a href="javascript:;" class="collapse"> </a>-->
<!--                                                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>-->
<!--                                                    <a href="javascript:;" class="reload"> </a>-->
                                                    <a href="#" class="fullscreen"> </a>
<!--                                                    <a href="javascript:;" class="remove"> </a>-->
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                
                                                 @if(Session('deletetargetmsg'))

                                            <div class="form-body">
                                            <div class="alert alert-success" role="alert" style="font-style: italic;">Success: {{ Session('deletetargetmsg') }}</div>
                                            </div>

                                        @endif
                                                
                                                
                                                <a href="javascript:;" class="btn green" data-toggle="modal" data-target="#targetedplace" data-backdrop="static" data-keyboard="false">
                                                        <i class="fa fa-plus"></i> Add New</a>
                                                <br><br>
                                               
                                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample2">
                                               @if(count($placelist)>0)
                                                    <thead>
                                                        
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Project Name</th>
                                                            <th>Place Id </th>
                                                            <th>Place Name </th>
                                                            <th>Category </th>
                                                            <th>Address </th>
                                                            <th>Postal Address/Code</th>
                                                            <th>Email</th>
                                                            <th>Telephone</th>
                                                            <th>Country</th>
                                                            <th>State</th>
                                                            <th>City</th>
                                                            <th>Longitude & Latitude</th>
                                                            <th>Additional Info</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                               @endif
                                                
<tbody>
          <?php $var = 1; ?>                                              
    @forelse($placelist as $recordthree)
    <tr class="odd gradeX">
<td>{{$var}}</td>
<td>{{$recordthree->projectname }}</td>
<td>{{$recordthree->facilityid }}</td>
<td>{{$recordthree->targetedplace }}</td>
<td>{{$recordthree->category }}</td>
<td>{{$recordthree->address }}</td>
<td>{{$recordthree->postalcode }}</td>
<td>{{$recordthree->email }}</td>
<td>{{$recordthree->telephone }}</td>
<td><?php $expcountry = explode("-",$recordthree->country); ?>{{$expcountry[1]}}</td>
<td><?php $expstate = explode("-",$recordthree->state); ?>{{$expstate[1]}}</td>
<td><?php $expcity = explode("-",$recordthree->city); ?>{{$expcity[1]}}</td>
<td>{{$recordthree->longnlat }}</td>
<td>{{$recordthree->info }}</td>                                                      
        
        
                                                            <td>
                                                            
                                                                <div class="btn-group">
<a href="javascript:;" class="btn btn-xs btn-danger deletearea" id="{{$recordthree->id}}" type="button" data-toggle="dropdown" aria-expanded="false"> Delete
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                    
                                                                </div>
                                                                
                                                            </td>
                                                        </tr>
    
   <?php $var++; ?>
   @empty 
    

        <div class="alert alert-info" style="text-align:center;">
        <strong>Record Not Found...!</strong>
        </div>
    

 @endforelse    
    
   
                                                                                                        
                                                </tbody>
                                                </table>    
                                                
                                            </div>
                                        </div>
                                        <!-- END Portlet PORTLET-->
                                    </div>
                                </div>                                
                                
                                
                                
                                
                                
                                
<!--      office work starts here                          -->
                                
<div class="row">
                                    <div class="col-md-12">
                                        <!-- BEGIN Portlet PORTLET-->
                                        <div class="portlet box green">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    Offices Details
                                                
                                                </div>
                                                <div class="tools">
<!--                                                    <a href="javascript:;" class="collapse"> </a>-->
<!--                                                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>-->
<!--                                                    <a href="javascript:;" class="reload"> </a>-->
                                                    <a href="#" class="fullscreen"> </a>
<!--                                                    <a href="javascript:;" class="remove"> </a>-->
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                
                                                 @if(Session('deleteofficemsg'))

                                            <div class="form-body">
                                            <div class="alert alert-success" role="alert" style="font-style: italic;">Success: {{ Session('deleteofficemsg') }}</div>
                                            </div>

                                        @endif
                                                <a href="javascript:;" class="btn green" data-toggle="modal" data-target="#office" data-backdrop="static" data-keyboard="false">
                                                        <i class="fa fa-plus"></i> Add New</a>
                                                <br><br>
                                                
                                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample3">
                                                @if(count($office)>0)
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Project Name</th>
                                                            <th>Branch Code </th>
                                                            <th>Branch Title </th>
                                                            <th>Address </th>
                                                            <th>Postal Address/Code </th>
                                                            <th>Fax </th>
                                                            <th>Telephone</th>
                                                            <th>Country</th>
                                                            <th>State</th>
                                                            <th>City</th>
                                                            <th>Taluka / Tehsil</th>
                                                            <th>Union Council</th>
                                                            <th>Longitude & Latitude</th>
                                                            <th>Additional Info</th>
                                                            <th>Added By</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                @endif
<tbody>
          <?php $var = 1; ?>                                              
    @forelse($office as $recordfour)
    <tr class="odd gradeX">
<td>{{$var}}</td>
                                                            <td>{{$recordfour->projectname}}</td>
                                                            <td>{{$recordfour->branchcode}}</td>
                                                            <td>{{$recordfour->branch}}</td>
                                                            <td>{{$recordfour->address}}</td>
                                                            <td>{{$recordfour->postalcode}}</td>
                                                            <td>{{$recordfour->fax}}</td>
                                                            <td>{{$recordfour->telephone}}</td>
                                                            <td>{{$recordfour->country}}</td>
                                                            <td>{{$recordfour->state}}</td>
                                                            <td>{{$recordfour->city}}</td>
                                                            <td>{{$recordfour->taluka}}</td>
                                                            <td>{{$recordfour->uc}}</td>
                                                            <td>{{$recordfour->longnlat}}</td>
                                                            <td>{{$recordfour->info}}</td>
                                                            <td><?php $expaddedby = explode("-",$recordfour->addedby);?>{{$expaddedby[1]}}</td>                                                    
        
        
                                                            <td>
                                                                <div class="btn-group">
<a href="javascript:;" class="btn btn-xs btn-danger deleteoffice" id="{{$recordfour->id}}" type="button" data-toggle="dropdown" aria-expanded="false"> Delete
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                    
                                                                </div>
                                                            </td>
                                                        </tr>
    
   <?php $var++; ?>
   @empty 
    

        <div class="alert alert-info" style="text-align:center;">
        <strong>Record Not Found...!</strong>
        </div>
    

 @endforelse    
    
   
                                                                                                    
</tbody>
                                                </table>    
                                                
                                            </div>
                                        </div>
                                        <!-- END Portlet PORTLET-->
                                    </div>
                                </div>                                 
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                <!-- END PAGE BASE CONTENT -->
                            </div>
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






<div class="modal fade" id="mymodal" tabindex="-1" backdrop="static" keyboard="false" role="dialog">

    <div class="modal-dialog" role="document">

    <div class="modal-content">

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><strong>Add Working Areas</strong></h4>
    </div>

    <div class="modal-body">
    @if($errors->has('country')) 
        <div class="alert alert-warning">Errors :{{$errors->first('country')}}</div>
    @endif 
    
        @if($errors->has('state')) 
        <div class="alert alert-warning">Errors :{{$errors->first('state')}}</div>
    @endif 
        
        @if($errors->has('city')) 
        <div class="alert alert-warning">Errors :{{$errors->first('city')}}</div>
    @endif 
        
     @if(Session('successmsg'))

                                            <div class="form-body">
                                            <div class="alert alert-success" role="alert" style="font-style: italic;">Success: {{ Session('successmsg') }}</div>
                                            </div>

                                        @endif  
        
        
        
    <form action="{{route('country.add')}}" method="post" >
        {{ csrf_field() }}
        
        @foreach($projectdetail as $precord)
        <div class="form-group">
        <label><strong>Project Name</strong></label>
        <input type="text" name="projecttitle" class="form-control" value="{{$precord->title}}" readonly>
        </div>

        <div class="form-group">
        <label><strong>Project Id</strong></label>
        <input type="text" name="projectid" class="form-control" value="{{$precord->projectid}}" readonly>
        </div>
        @endforeach
        
        <div class="form-group">
            
            <label><strong>Select Working Country</strong> <span style="color:red;">*</span></label>
            <select name="country" id="country" class="bs-select form-control" data-live-search="true" data-size="8" required>
                <option value="" selected>Select Working Country</option>
	<option value="4">Afghanistan</option>
	<option value="248">Åland Islands</option>
	<option value="8">Albania</option>
	<option value="12">Algeria</option>
	<option value="16">American Samoa</option>
	<option value="20">Andorra</option>
	<option value="24">Angola</option>
	<option value="660">Anguilla</option>
	<option value="10">Antarctica</option>
	<option value="28">Antigua and Barbuda</option>
	<option value="32">Argentina</option>
	<option value="51">Armenia</option>
	<option value="533">Aruba</option>
	<option value="36">Australia</option>
	<option value="40">Austria</option>
	<option value="31">Azerbaijan</option>
	<option value="44">Bahamas</option>
	<option value="48">Bahrain</option>
	<option value="50">Bangladesh</option>
	<option value="52">Barbados</option>
	<option value="112">Belarus</option>
	<option value="56">Belgium</option>
	<option value="84">Belize</option>
	<option value="204">Benin</option>
	<option value="60">Bermuda</option>
	<option value="64">Bhutan</option>
	<option value="68">Bolivia, Plurinational State of</option>
	<option value="535">Bonaire, Sint Eustatius and Saba</option>
	<option value="70">Bosnia and Herzegovina</option>
	<option value="72">Botswana</option>
	<option value="74">Bouvet Island</option>
	<option value="76">Brazil</option>
	<option value="86">British Indian Ocean Territory</option>
	<option value="96">Brunei Darussalam</option>
	<option value="100">Bulgaria</option>
	<option value="854">Burkina Faso</option>
	<option value="108">Burundi</option>
	<option value="116">Cambodia</option>
	<option value="120">Cameroon</option>
	<option value="124">Canada</option>
	<option value="132">Cape Verde</option>
	<option value="136">Cayman Islands</option>
	<option value="140">Central African Republic</option>
	<option value="148">Chad</option>
	<option value="152">Chile</option>
	<option value="156">China</option>
	<option value="162">Christmas Island</option>
	<option value="166">Cocos (Keeling) Islands</option>
	<option value="170">Colombia</option>
	<option value="174">Comoros</option>
	<option value="178">Congo</option>
	<option value="180">Congo, the Democratic Republic of the</option>
	<option value="184">Cook Islands</option>
	<option value="188">Costa Rica</option>
	<option value="384">Côte d'Ivoire</option>
	<option value="191">Croatia</option>
	<option value="192">Cuba</option>
	<option value="531">Curaçao</option>
	<option value="196">Cyprus</option>
	<option value="203">Czech Republic</option>
	<option value="208">Denmark</option>
	<option value="262">Djibouti</option>
	<option value="212">Dominica</option>
	<option value="214">Dominican Republic</option>
	<option value="218">Ecuador</option>
	<option value="818">Egypt</option>
	<option value="222">El Salvador</option>
	<option value="226">Equatorial Guinea</option>
	<option value="232">Eritrea</option>
	<option value="233">Estonia</option>
	<option value="231">Ethiopia</option>
	<option value="238">Falkland Islands (Malvinas)</option>
	<option value="234">Faroe Islands</option>
	<option value="242">Fiji</option>
	<option value="246">Finland</option>
	<option value="250">France</option>
	<option value="254">French Guiana</option>
	<option value="258">French Polynesia</option>
	<option value="260">French Southern Territories</option>
	<option value="266">Gabon</option>
	<option value="270">Gambia</option>
	<option value="268">Georgia</option>
	<option value="276">Germany</option>
	<option value="288">Ghana</option>
	<option value="292">Gibraltar</option>
	<option value="300">Greece</option>
	<option value="304">Greenland</option>
	<option value="308">Grenada</option>
	<option value="312">Guadeloupe</option>
	<option value="316">Guam</option>
	<option value="320">Guatemala</option>
	<option value="831">Guernsey</option>
	<option value="324">Guinea</option>
	<option value="624">Guinea-Bissau</option>
	<option value="328">Guyana</option>
	<option value="332">Haiti</option>
	<option value="334">Heard Island and McDonald Islands</option>
	<option value="336">Holy See (Vatican City State)</option>
	<option value="340">Honduras</option>
	<option value="344">Hong Kong</option>
	<option value="348">Hungary</option>
	<option value="352">Iceland</option>
	<option value="356">India</option>
	<option value="360">Indonesia</option>
	<option value="364">Iran, Islamic Republic of</option>
	<option value="368">Iraq</option>
	<option value="372">Ireland</option>
	<option value="833">Isle of Man</option>
	<option value="376">Israel</option>
	<option value="380">Italy</option>
	<option value="388">Jamaica</option>
	<option value="392">Japan</option>
	<option value="832">Jersey</option>
	<option value="400">Jordan</option>
	<option value="398">Kazakhstan</option>
	<option value="404">Kenya</option>
	<option value="296">Kiribati</option>
	<option value="408">Korea, Democratic People's Republic of</option>
	<option value="410">Korea, Republic of</option>
	<option value="414">Kuwait</option>
	<option value="417">Kyrgyzstan</option>
	<option value="418">Lao People's Democratic Republic</option>
	<option value="428">Latvia</option>
	<option value="422">Lebanon</option>
	<option value="426">Lesotho</option>
	<option value="430">Liberia</option>
	<option value="434">Libya</option>
	<option value="438">Liechtenstein</option>
	<option value="440">Lithuania</option>
	<option value="442">Luxembourg</option>
	<option value="446">Macao</option>
	<option value="807">Macedonia, the former Yugoslav Republic of</option>
	<option value="450">Madagascar</option>
	<option value="454">Malawi</option>
	<option value="458">Malaysia</option>
	<option value="462">Maldives</option>
	<option value="466">Mali</option>
	<option value="470">Malta</option>
	<option value="584">Marshall Islands</option>
	<option value="474">Martinique</option>
	<option value="478">Mauritania</option>
	<option value="480">Mauritius</option>
	<option value="175">Mayotte</option>
	<option value="484">Mexico</option>
	<option value="583">Micronesia, Federated States of</option>
	<option value="498">Moldova, Republic of</option>
	<option value="492">Monaco</option>
	<option value="496">Mongolia</option>
	<option value="499">Montenegro</option>
	<option value="500">Montserrat</option>
	<option value="504">Morocco</option>
	<option value="508">Mozambique</option>
	<option value="104">Myanmar</option>
	<option value="516">Namibia</option>
	<option value="520">Nauru</option>
	<option value="524">Nepal</option>
	<option value="528">Netherlands</option>
	<option value="540">New Caledonia</option>
	<option value="554">New Zealand</option>
	<option value="558">Nicaragua</option>
	<option value="562">Niger</option>
	<option value="566">Nigeria</option>
	<option value="570">Niue</option>
	<option value="574">Norfolk Island</option>
	<option value="580">Northern Mariana Islands</option>
	<option value="578">Norway</option>
	<option value="512">Oman</option>
	<option value="586">Pakistan</option>
	<option value="585">Palau</option>
	<option value="275">Palestinian Territory, Occupied</option>
	<option value="591">Panama</option>
	<option value="598">Papua New Guinea</option>
	<option value="600">Paraguay</option>
	<option value="604">Peru</option>
	<option value="608">Philippines</option>
	<option value="612">Pitcairn</option>
	<option value="616">Poland</option>
	<option value="620">Portugal</option>
	<option value="630">Puerto Rico</option>
	<option value="634">Qatar</option>
	<option value="638">Réunion</option>
	<option value="642">Romania</option>
	<option value="643">Russian Federation</option>
	<option value="646">Rwanda</option>
	<option value="652">Saint Barthélemy</option>
	<option value="654">Saint Helena, Ascension and Tristan da Cunha</option>
	<option value="659">Saint Kitts and Nevis</option>
	<option value="662">Saint Lucia</option>
	<option value="663">Saint Martin (French part)</option>
	<option value="666">Saint Pierre and Miquelon</option>
	<option value="670">Saint Vincent and the Grenadines</option>
	<option value="882">Samoa</option>
	<option value="674">San Marino</option>
	<option value="678">Sao Tome and Principe</option>
	<option value="682">Saudi Arabia</option>
	<option value="686">Senegal</option>
	<option value="688">Serbia</option>
	<option value="690">Seychelles</option>
	<option value="694">Sierra Leone</option>
	<option value="702">Singapore</option>
	<option value="534">Sint Maarten (Dutch part)</option>
	<option value="703">Slovakia</option>
	<option value="705">Slovenia</option>
	<option value="90">Solomon Islands</option>
	<option value="706">Somalia</option>
	<option value="710">South Africa</option>
	<option value="239">South Georgia and the South Sandwich Islands</option>
	<option value="728">South Sudan</option>
	<option value="724">Spain</option>
	<option value="144">Sri Lanka</option>
	<option value="729">Sudan</option>
	<option value="740">Suriname</option>
	<option value="744">Svalbard and Jan Mayen</option>
	<option value="748">Swaziland</option>
	<option value="752">Sweden</option>
	<option value="756">Switzerland</option>
	<option value="760">Syrian Arab Republic</option>
	<option value="158">Taiwan, Province of China</option>
	<option value="762">Tajikistan</option>
	<option value="834">Tanzania, United Republic of</option>
	<option value="764">Thailand</option>
	<option value="626">Timor-Leste</option>
	<option value="768">Togo</option>
	<option value="772">Tokelau</option>
	<option value="776">Tonga</option>
	<option value="780">Trinidad and Tobago</option>
	<option value="788">Tunisia</option>
	<option value="792">Turkey</option>
	<option value="795">Turkmenistan</option>
	<option value="796">Turks and Caicos Islands</option>
	<option value="798">Tuvalu</option>
	<option value="800">Uganda</option>
	<option value="804">Ukraine</option>
	<option value="784">United Arab Emirates</option>
	<option value="826">United Kingdom</option>
	<option value="840">United States</option>
	<option value="581">United States Minor Outlying Islands</option>
	<option value="858">Uruguay</option>
	<option value="860">Uzbekistan</option>
	<option value="548">Vanuatu</option>
	<option value="862">Venezuela, Bolivarian Republic of</option>
	<option value="704">Viet Nam</option>
	<option value="92">Virgin Islands, British</option>
	<option value="850">Virgin Islands, U.S.</option>
	<option value="876">Wallis and Futuna</option>
	<option value="732">Western Sahara</option>
	<option value="887">Yemen</option>
	<option value="894">Zambia</option>
	<option value="716">Zimbabwe</option>
</select>

        </div>
        <input type="hidden" name="countrytext" id="countrytext">
        <div class="form-group">
            
        <label><strong>State/Province</strong> <span style="color:red;">*</span></label>
        <input type="text" name="state" placeholder="State/Province" value="{{old('state')}}" class="form-control" required>
        
        </div>
        <div class="form-group">
        <label><strong>City Name</strong> <span style="color:red;">*</span></label>
        <input type="text" name="city" placeholder="City Name" value="{{old('city')}}" class="form-control" required>
        
        </div>
        <div class="form-group">
        <label><strong>Additional Information</strong> <span style="color:green;">(Optional)</span></label>
        <textarea class="form-control" name="info">{{old('info')}}</textarea>
        
        </div>
        
        <div class="form-group">

            <button type="submit" class="btn btn-info">Add Working Area</button>


        </div>
    </form>
    </div>

    <div class="modal-header">
    <button class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
    </div>

    </div>

    </div>

    </div>








<div class="modal fade" id="targetedplace" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><strong>Add Targeted Working Place</strong></h4>
      </div>
      <div class="modal-body">
          
    @if($errors->has('targetedplace')) 
    <div class="alert alert-warning">Errors :{{$errors->first('targetedplace')}}</div>
    @endif
    @if($errors->has('category')) 
    <div class="alert alert-warning">Errors :{{$errors->first('category')}}</div>
    @endif
    @if($errors->has('address')) 
    <div class="alert alert-warning">Errors :{{$errors->first('address')}}</div>
    @endif      
    @if($errors->has('selectedcountry')) 
    <div class="alert alert-warning">Errors :{{$errors->first('selectedcountry')}}</div>
    @endif
    @if($errors->has('selectedstate')) 
    <div class="alert alert-warning">Errors :{{$errors->first('selectedstate')}}</div>
    @endif
    @if($errors->has('selectedcity')) 
    <div class="alert alert-warning">Errors :{{$errors->first('selectedcity')}}</div>
    @endif  
    @if(Session('successmsgx'))      
    <div class="form-body">
    <div class="alert alert-success" role="alert" style="font-style: italic;">Success: {{ Session('successmsgx') }}
    </div>
    </div>
    @endif
    @if(Session('customerror'))      
    <div class="form-body">
    <div class="alert alert-warning" role="alert" style="font-style: italic;">Error: {{ Session('customerror') }}
    </div>
    </div>
    @endif       
          
        <form method="post" action="{{route('targetedplace.add')}}">
          {{ csrf_field() }}
          <div class="row">
          
          <div class="col-md-6">
          <div class="form-group">
              <label>Project Name</label>
              <input type="text" name="projecttitle" class="form-control" value="{{$projectdetail[0]->title}}" readonly>
          </div>        
          </div>
              
          <div class="col-md-6">
          <div class="form-group">
              <label>Project Id</label>
               <input type="text" name="projectid" class="form-control" value="{{$projectdetail[0]->projectid}}" readonly>
          </div>        
          </div>
              
          
          
          <div class="col-md-6">
          <div class="form-group">
              <label>Targeted Place Name <span style="color:red;">*</span></label>
              <input type="text" name="targetedplace" value="{{old('targetedplace')}}" class="form-control" placeholder="Targeted Place" required>
          </div>        
          </div>
              
          <div class="col-md-6">
          <div class="form-group">
              <label>Category <span style="color:red;">*</span></label>
              <input type="text" name="category" value="{{old('category')}}" class="form-control" placeholder="Hospital / School / Office" required>
          </div>        
          </div> 
            
          <div class="col-md-6">
          <div class="form-group">
              <label>Address <span style="color:red;">*</span></label>
              <input type="text" name="address" value="{{old('address')}}" class="form-control" placeholder="Address" required>
          </div>        
          </div> 
              
          <div class="col-md-6">
          <div class="form-group">
              <label>Postal Address / Postal Code <span style="color:green;">(Optional)</span> </label>
              <input type="text" name="postalcode" value="{{old('postalcode')}}" class="form-control" placeholder="Postal Address/Postal Code Optional" >
          </div>        
          </div>
              
          <div class="col-md-6">
          <div class="form-group">
              <label>Email <span style="color:green;">(Optional)</span></label>
              <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Email Address Optional" >
          </div>        
          </div>       

          <div class="col-md-6">
          <div class="form-group">
              <label>Telephone Number <span style="color:green;">(Optional)</span> </label>
              <input type="number" name="telephone" value="{{old('telephone')}}" class="form-control" placeholder="Telephone Number Optional">
          </div>        
          </div>        
          
          <div class="col-md-6">
          <div class="form-group">
              <label>Country <span style="color:red;">*</span></label>
              <select class="form-control" name="selectedcountry" required>
              <option value="" selected>Select Country</option>
              @forelse($country as $recordtwo)
                  
              <option value="{{$recordtwo->countryid.'-'.$recordtwo->country}}">{{$recordtwo->country}}</option> 
                  
              @empty
              <option value="">Record Not Found</option>      
              @endforelse      
    
              </select>
          </div>        
          </div>
          
              
          <div class="col-md-6">
          <div class="form-group">
              <label>State <span style="color:red;">*</span></label>
              <select class="form-control" name="selectedstate" required>
              <option value="" selected>Select State</option>
              @forelse($state as $recordtwo)
                  
              <option value="{{$recordtwo->stateid.'-'.$recordtwo->state}}">{{$recordtwo->state}}</option> 
                  
              @empty
              <option value="">Record Not Found</option>      
              @endforelse      
    
              </select>
          </div>        
          </div> 
              
          <div class="col-md-6">
          <div class="form-group">
              <label>City <span style="color:red;">*</span></label>
              <select class="form-control" name="selectedcity" required>
              <option value="" selected>Select City</option>
              @forelse($city as $recordtwo)
                  
              <option value="{{$recordtwo->cityid.'-'.$recordtwo->city}}">{{$recordtwo->city}}</option> 
                  
              @empty
              <option value="">Record Not Found</option>      
              @endforelse      
    
              </select>
          </div>        
          </div>
              
          <div class="col-md-6">
          <div class="form-group">
              <label>Longitude & Latitude <span style="color:green;">(Optional)</span></label>
              <input type="text" name="longnlat" value="{{old('longnlat')}}" class="form-control" placeholder="Longitude & Latitude">
          </div>        
          </div>
              
          <div class="col-md-12">
          <div class="form-group">
              <label>Additional Information <span style="color:green;">(Optional)</span></label>
             <textarea class="form-control" name="info">{{old('info')}}</textarea>
          </div>        
          </div>      
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary pull-left">Save Targeted Place</button>
      </div>
              </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>


<!--office work start here-->
<div class="modal fade" id="office" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><strong>Add Office Details</strong></h4>
      </div>
      <div class="modal-body">
          
    @if($errors->has('branch')) 
    <div class="alert alert-warning">Errors :{{$errors->first('branch')}}</div>
    @endif
    @if($errors->has('telephone')) 
    <div class="alert alert-warning">Errors :{{$errors->first('telephone')}}</div>
    @endif
    @if($errors->has('address')) 
    <div class="alert alert-warning">Errors :{{$errors->first('address')}}</div>
    @endif
    @if($errors->has('postalcode')) 
    <div class="alert alert-warning">Errors :{{$errors->first('postalcode')}}</div>
    @endif      
    @if($errors->has('officecountry')) 
    <div class="alert alert-warning">Errors :{{$errors->first('officecountry')}}</div>
    @endif
    @if($errors->has('officestate')) 
    <div class="alert alert-warning">Errors :{{$errors->first('officestate')}}</div>
    @endif
    @if($errors->has('officecity')) 
    <div class="alert alert-warning">Errors :{{$errors->first('officecity')}}</div>
    @endif  
    @if(Session('successmsgy'))      
    <div class="form-body">
    <div class="alert alert-success" role="alert" style="font-style: italic;">Success: {{ Session('successmsgy') }}
    </div>
    </div>
    @endif
           
          
        <form method="post" action="{{route('office.add')}}">
          {{ csrf_field() }}
          <div class="row">
          
          <div class="col-md-6">
          <div class="form-group">
              <label>Project Name</label>
              <input type="text" name="projecttitle" class="form-control" value="{{$projectdetail[0]->title}}" readonly>
          </div>        
          </div>
              
          <div class="col-md-6">
          <div class="form-group">
              <label>Project Id</label>
               <input type="text" name="projectid" class="form-control" value="{{$projectdetail[0]->projectid}}" readonly>
          </div>        
          </div>
              
          
          
          <div class="col-md-6">
          <div class="form-group">
              <label>Branch Title <span style="color:red;">*</span></label>
              <input type="text" name="branch" value="{{old('branch')}}" class="form-control" placeholder="Targeted Place" required>
          </div>        
          </div>
              
          <div class="col-md-6">
          <div class="form-group">
              <label>Branch Code</label>
              <input type="text" name="branchcode" value="{{rand(9100000,10000000)}}" class="form-control" readonly>
          </div>        
          </div> 
            
          <div class="col-md-6">
          <div class="form-group">
              <label>Address <span style="color:red;">*</span></label>
              <input type="text" name="address" value="{{old('address')}}" class="form-control" placeholder="Address" required>
          </div>        
          </div> 
              
          <div class="col-md-6">
          <div class="form-group">
              <label>Postal Address / Postal Code <span style="color:red;">*</span> </label>
              <input type="text" name="postalcode" value="{{old('postalcode')}}" class="form-control" placeholder="Postal Address/Postal Code" required>
          </div>        
          </div>
              
          <div class="col-md-6">
          <div class="form-group">
              <label>Fax <span style="color:green;">(Optional)</span></label>
              <input type="text" name="fax" value="{{old('fax')}}" class="form-control" placeholder="Fax Optional" >
          </div>        
          </div>       

          <div class="col-md-6">
          <div class="form-group">
              <label>Telephone Number <span style="color:red;">*</span> </label>
              <input type="number" name="telephone" value="{{old('telephone')}}" class="form-control" placeholder="Telephone Number" required>
          </div>        
          </div>        
          
          <div class="col-md-6">
          <div class="form-group">
              <label>Country <span style="color:red;">*</span></label>
              <select class="form-control" name="officecountry" required>
              <option value="" selected>Select Country</option>
              @forelse($country as $recordtwo)
                  
              <option value="{{$recordtwo->countryid.'-'.$recordtwo->country}}">{{$recordtwo->country}}</option> 
                  
              @empty
              <option value="">Record Not Found</option>      
              @endforelse      
    
              </select>
          </div>        
          </div>
          
              
          <div class="col-md-6">
          <div class="form-group">
              <label>State <span style="color:red;">*</span></label>
              <select class="form-control" name="officestate" required>
              <option value="" selected>Select State</option>
              @forelse($state as $recordtwo)
                  
              <option value="{{$recordtwo->stateid.'-'.$recordtwo->state}}">{{$recordtwo->state}}</option> 
                  
              @empty
              <option value="">Record Not Found</option>      
              @endforelse      
    
              </select>
          </div>        
          </div> 
              
          <div class="col-md-6">
          <div class="form-group">
              <label>City <span style="color:red;">*</span></label>
              <select class="form-control" name="officecity" required>
              <option value="" selected>Select City</option>
              @forelse($city as $recordtwo)
                  
              <option value="{{$recordtwo->cityid.'-'.$recordtwo->city}}">{{$recordtwo->city}}</option> 
                  
              @empty
              <option value="">Record Not Found</option>      
              @endforelse      
    
              </select>
          </div>        
          </div>
          
          <div class="col-md-6">
          <div class="form-group">
              <label>Taluka / Tehsil <span style="color:green;">(Optional)</span></label>
              <input type="text" name="taluka" value="{{old('taluka')}}" class="form-control" placeholder="Taluka / Tehsil">
          </div>        
          </div>
              
          <div class="col-md-6">
          <div class="form-group">
              <label>Union Council <span style="color:green;">(Optional)</span></label>
              <input type="text" name="uc" value="{{old('unioncouncil')}}" class="form-control" placeholder="Union Council">
          </div>        
          </div>      
                
          <div class="col-md-6">
          <div class="form-group">
              <label>Longitude & Latitude <span style="color:green;">(Optional)</span></label>
              <input type="text" name="longnlat" value="{{old('longnlat')}}" class="form-control" placeholder="Longitude & Latitude">
          </div>        
          </div>
              
          <div class="col-md-12">
          <div class="form-group">
              <label>Additional Information <span style="color:green;">(Optional)</span></label>
             <textarea class="form-control" name="info">{{old('info')}}</textarea>
          </div>        
          </div>      
          <input type="hidden" name="addedby" value="{{ Auth::user()->id }}-{{ Auth::user()->username }}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary pull-left">Save Targeted Place</button>
      </div>
              </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>

@endsection



















@push('js')

<script src="{!! asset('theme/assets/pages/scripts/components-bootstrap-select.min.js') !!}" type="text/javascript"></script>

<script src="{!! asset('theme/assets/global/scripts/datatable.js')!!}" type="text/javascript"></script>

<script src="{!! asset('theme/assets/global/plugins/datatables/datatables.min.js')!!}" type="text/javascript"></script>

<script src="{!!asset('theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')!!}" type="text/javascript"></script>

<script src="{!! asset('theme/assets/pages/scripts/table-datatables-managed.min.js')!!}" type="text/javascript"></script>



<script type="text/javascript">
    
    $(document).ready(function(){
        
    $("#country").on('change',function(){
        
    var countrytext = $("#country option:selected").text(); 
    
     $("#countrytext").val(countrytext);
        
    });     
        
        @if(count($workingarea)>0)
    $('#sample_1').DataTable({
        
         "pageLength": 10,
         dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print','colvis'
        ]
        
        
    });
        @endif
        
        @if(count($placelist)>0) 
    
    $('#sample2').DataTable({
        
         "pageLength": 10,
        "scrollX": true,
         dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print','colvis'
        ]
        
        
    });  
        
        @endif
        
         @if(count($office)>0)
        
     $('#sample3').DataTable({
        
         "pageLength": 10,
        "scrollX": true,
         dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print','colvis'
        ]
        
        
    });      
      
        @endif
     
    $(".deletecountry").click(function(){
        
       var id = $(this).attr("id");
       
       var deleteone = confirm("Are you sure you want to delete it ?");
        
       if(deleteone==true)
           {
               window.location.href="{{url('project/deletecity')}}/"+id;
           }
      
        
    });    
    
        
    $(".deletearea").click(function(){
        
       var id = $(this).attr("id");
       
       var deleteone = confirm("Are you sure you want to delete it ?");
        
       if(deleteone==true)
           {
               window.location.href="{{url('project/deletetarget')}}/"+id;
           } 
        
    });   
        
        
    $(".deleteoffice").click(function(){
        
       var id = $(this).attr("id");
       
       var deleteone = confirm("Are you sure you want to delete it ?");
        
       if(deleteone==true)
           {
               window.location.href="{{url('project/deletetoffice')}}/"+id;
           } 
        
    });     
        
        
    @if($errors->has('country') || $errors->has('state') || $errors->has('city') || Session('successmsg') )    
       
        
       $("#mymodal").modal({
           
          keyboard:false,
          backdrop:'static'
           
       }); 
        
        
    @endif   
    
    @if(Session('successmsgx') || Session('customerror') || $errors->has('targetedplace') || $errors->has('targetedplace') || $errors->has('address') || $errors->has('category') || $errors->has('selectedcountry') || $errors->has('selectedstate') || 
        $errors->has('selectedcity'))      
        
    $("#targetedplace").modal({
           
          keyboard:false,
          backdrop:'static'
           
       }); 
        
    @endif 
    
    
    @if($errors->has('branch') || $errors->has('address') || $errors->has('postalcode') || Session('successmsgy') || $errors->has('telephone') || $errors->has('officecountry') || $errors->has('officestate') || $errors->has('officecity')) 
       
        $("#office").modal({
           
          keyboard:false,
          backdrop:'static'
           
       }); 
        
    @endif    
    
    
       
});

</script>

@endpush
