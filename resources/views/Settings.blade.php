@extends('layout.maintenanceLayout')

@section('title')
    Admin Settings
@endsection

@section('content')


<div class="row">
    <div class="col s5 push-s3" style="margin-left:-2%">
            <h3 class="blue-text animated fadeIn" style="font-family:Myriad Pro;margin-top:5%">Settings</h3>
    </div>

    <div class="col s10 push-s2">
      <ul class="tabs">
        <li class="tab col s3"><a href="#General">General</a></li>
        <li class="tab col s3"><a href="#AdminSettings">Admin Email Settings</a></li>
       <!-- <li class="tab col s3"><a href="#PriAuth">Privileges and Authentication</a></li>-->
      </ul>
    </div>
    
<!--------------------GENERAL TAB------------------->
    
    <div id="General" class="ci col s8 push-s3" style="margin-top:2px;">

		<ul class="collection with-header" id="collectionActive" >
			
			<li class="collection-header">
				<h4 style="font-weight:bold;">General Settings</h4>
			</li>
                
            <div class="col s12"> 
            
                <div class="col s6">                        
                        <li class="collection-item" style="font-weight:bold;">
                            Organization/System Name:
                            <div style="font-weight:normal;" id = ''>
                                &nbsp;&nbsp;&nbsp; CLIENT AND PERSONNEL MANAGEMENT SYSTEM
                            </div>
                        </li>

                        <li class="collection-item" style="font-weight:bold;">
                            System Logo:
                            <div style="font-weight:normal;" id = ''>
                                &nbsp;&nbsp;&nbsp; 
                                <img src="{!! URL::asset('../Materialize/images/logo.png') !!}" width="30%">
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
                  
                </div>
                     
			 </div>
            
            <li class="collection-item" style="font-weight:bold;color:transparent">
                <a  data-position="bottom" data-delay="50" data-tooltip="Edit Account" class="btn blue tooltipped " id = 'buttonEditAccount' style="margin-right: 20px;" href="#modalEditAccount "><i class="material-icons">mode_edit</i></a>
                
                
            </li>
            
		</ul>
 
        
    </div>

<!--
  <div class="fixed-action-btn vertical click-to-toggle" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large blue darken-4">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
      <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
      <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
      <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
    </ul>
  </div>

    
<!--------------------ADMIN SETTINGS------------------->

    <div id="AdminSettings"class="ci col s8 push-s3" style="margin-top:2px;">

		<ul class="collection with-header" id="collectionActive" >
			
			<li class="collection-header">
				<h4 style="font-weight:bold;">Admin Email Settings</h4>
			</li>
                
            <div class="col s12"> 
            
                <div class="col s6">                        
                        <li class="collection-item" style="font-weight:bold;">
                            Sender Email:
                            <div style="font-weight:normal;" id = ''>
                                &nbsp;&nbsp;&nbsp; cpms@gmail.com
                            </div>
                        </li>

                        <li class="collection-item" style="font-weight:bold;">
                            Sender Display Name:
                            <div style="font-weight:normal;" id = ''>
                                &nbsp;&nbsp;&nbsp; Admin
                            </div>
                        </li>
                        
                        <li class="collection-item" style="font-weight:bold;">
                            
                            <div style="font-weight:normal;" id = ''>
                                &nbsp;&nbsp;&nbsp; 
                            </div>
                        </li>
                </div>
                     
                <div class="col s6">
                      
                        <li class="collection-item" style="font-weight:bold;">
                            Current Password:
                            <div style="font-weight:normal;" id = ''>
                                &nbsp;&nbsp;&nbsp; cpms
                            </div>
                        </li>
                        
                        <li class="collection-item" style="font-weight:bold;">
                            New Passowrd:
                            <div style="font-weight:normal;" id = ''>
                                &nbsp;&nbsp;&nbsp; cpms2016
                            </div>
                        </li>
                        
                        <li class="collection-item" style="font-weight:bold;">
                            Verify Password:
                            <div style="font-weight:normal;" id = ''>
                                &nbsp;&nbsp;&nbsp; cpms2016
                            </div>
                        </li>
                        
                </div>
                     
			 </div>
            
            <li class="collection-item" style="font-weight:bold;color:transparent">
                <a  data-position="bottom" data-delay="50" data-tooltip="Edit Account" class="btn blue tooltipped " id = '' style="margin-right: 20px;" href="#modalSettings"><i class="material-icons">mode_edit</i></a>
                
                
            </li>
            
		</ul>
 
        
    </div>
            
        </div>
    </div>

<div id="modalEditAccount" class="modal modal-fixed-footer ci" style="overflow:hidden; border-radius:10px; margin-top:5% !important">      
	<div class="modal-header">
		<div class="h">
			<h3><center>Edit Admin Account</center></h3>  
		</div>
	</div>
	<div class="modal-content">
		<div class="row">
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				<div class="row"></div>  
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">vpn_key</i>
					<input id="strCurrent" type="password" class="validate" name = "" required="" aria-required="true">
					<label for="">Organization/Site Name:</label> 
				</div>
			</div>
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				<div class="row"></div>
				<div class="row"></div>  
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">vpn_key</i>
					<input id="strNew" type="password" class="validate" name = "" required="" aria-required="true">
					<label for="">System Logo</label> 
				</div>
			</div>
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				<div class="row"></div>
				<div class="row"></div>
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">vpn_key</i>
					<input id="strConfirm" type="password" class="validate" name = "" required="" aria-required="true">
					<label for="">Primary Color</label> 
				</div>
			</div>
            <div class="col s10 push-s1" style="margin-top:-30px;">      
				<div class="row"></div>
				<div class="row"></div>
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">vpn_key</i>
					<input id="strConfirm" type="password" class="validate" name = "" required="" aria-required="true">
					<label for="">Secondary Color</label> 
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer" style="background-color: #00293C;">
		<button class="btn large waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnChangePasswordSave">Save
			<i class="material-icons right">send</i>
		</button>
	</div>	
</div>

@stop

@section('script')
<script>
	$('#buttonEditAccount').click(function(){
		

		$('#modalEditAccount').openModal();
	});


</script>
@stop