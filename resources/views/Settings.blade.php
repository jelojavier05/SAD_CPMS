@extends('layout.maintenanceLayout')

@section('title')
    Admin Settings
@endsection

@section('content')


<div class="row">
    <div class="col s5 push-s3" style="margin-left:-2%">
            <h3 class="blue-text animated fadeIn" style="font-family:Myriad Pro;margin-top:9.2%">Settings</h3>
    </div>
    <div class="col s10 push-s2">
      <ul class="tabs">
        <li class="tab col s3"><a href="#General">General</a></li>
        <li class="tab col s3"><a href="#AdminSettings">Admin Email Settings</a></li>
        <li class="tab col s3"><a href="#PriAuth">Privileges and Authentication</a></li>
      </ul>
    </div>
    
<!--------------------GENERAL TAB------------------->
    
    <div id="General" class="ci col s8 push-s3" style="margin-top:25px;">

		<ul class="collection with-header" id="collectionActive" >
			
			<li class="collection-header">
				<h4 style="font-weight:bold;">General Settings</h4>
			</li>
                
            <div class="col s12"> 
            
                <div class="col s6">                        
                        <li class="collection-item" style="font-weight:bold;">
                            Organization/Site Name:
                            <div style="font-weight:normal;" id = ''>
                                &nbsp;&nbsp;&nbsp; CLIENT AND PERSONNEL MANAGEMENT SYSTEM
                            </div>
                        </li>

                        <li class="collection-item" style="font-weight:bold;">
                            Site Logo:
                            <div style="font-weight:normal;" id = ''>
                                &nbsp;&nbsp;&nbsp; 
                                <img src="{!! URL::asset('../Materialize/images/logo.png') !!}" width="30%">
                            </div>
                        </li>
                        
                        <li class="collection-item" style="font-weight:bold;">
                            Allowed Image Size:
                            <div style="font-weight:normal;" id = ''>
                                &nbsp;&nbsp;&nbsp; 1 MB
                            </div>
                        </li>
                </div>
                     
                <div class="col s6">
                      
                        <li class="collection-item" style="font-weight:bold;">
                            Primary Color:
                            <div style="font-weight:normal;" id = ''>
                                &nbsp;&nbsp;&nbsp; #0d47a1
                            </div>
                        </li>
                        
                        <li class="collection-item" style="font-weight:bold;">
                            Secondary Color:
                            <div style="font-weight:normal;" id = ''>
                                &nbsp;&nbsp;&nbsp; #F0EFEA
                            </div>
                        </li>
                        
                        <li class="collection-item" style="font-weight:bold;">
                            Font :
                            <div style="font-weight:normal;" id = ''>
                                &nbsp;&nbsp;&nbsp; Arial
                            </div>
                        </li>
                        
                </div>
                     
			 </div>
            
            <li class="collection-item" style="font-weight:bold;color:transparent">
                <a  data-position="bottom" data-delay="50" data-tooltip="Edit Account" class="btn blue tooltipped " id = 'buttonDetail' style="margin-right: 20px;" ><i class="material-icons">mode_edit</i></a>
            </li>
            
		</ul>
    </div>


<!--------------------ADMIN SETTINGS------------------->

    <div id="AdminSettings" class="col s10 push-s2">
        <div class="col s10 push-s2">
        
        </div>
    </div>

<!--------------------PRIVELEGES & AUTHENTICATION------------------->

    <div id="PriAuth" class="col s10 push-s2">
        <div class="col s10 push-s2">
    
        </div>
    </div>


</div>



@stop