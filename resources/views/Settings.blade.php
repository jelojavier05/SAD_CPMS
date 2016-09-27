@extends('layout.maintenanceLayout')

@section('title')
    Admin Settings
@endsection

@section('content')

<div class="row"></div>
<div class="row"></div>
<div class="row">

<div id="General" class="ci col s8 push-s3" style="margin-top:2px;">
    <ul class="collection with-header" id="collectionActive" >
        <li class="collection-header">
            <h4 style="font-weight:bold;">General Settings</h4>
        </li>
        
        <div class="col s12"> 
            <div class="col s6">
                <li class="collection-item" style="font-weight:bold;">                   
                    <div class="input-field col s12">
						<input placeholder=" " id="" type="text" class="validate" name = "" required="" aria-required="true">
						<label class="active" for="">Administrator Name</label> 
					</div>	
                
                
                   <div class="input-field col s12">
						<input placeholder=" " id="" type="text" class="validate" name = "" required="" aria-required="true">
						<label class="active" for="">Organization/System Name</label> 
					</div>
                

                
                    <div class="file-field input-field col s12">
					  <label class="active">System Logo</label>
						<div class="row"></div>
					  <div class="btn blue">
						<span>File</span>
						<input type="file">
					  </div>
					  <div class="file-path-wrapper">
						<input class="file-path validate" type="text">
					  </div>
						
					</div>
                </li>
                  
            </div>
            
            <div class="col s6">                        
                <li class="collection-item" style="font-weight:bold;">
                    Address:
                    <div style="font-weight:normal;" id = ''>
                        &nbsp;&nbsp;&nbsp; 3383 V. Mapa 2nd St. Sta. Mesa, Manila
                    </div>
                </li>

                <li class="collection-item" style="font-weight:bold;">
                    Telephone/Cellphone Number:
                    <div style="font-weight:normal;" id = ''>
                        &nbsp;&nbsp;&nbsp; 09294206368
                    </div>
                </li>
                
              <li class="collection-item" style="font-weight:bold;">
                    Administrator Account:
                    
                </li>
                <div class="row"> 
                    <div class="col s12">
                    	
							<li class="collection-item">
								<div class="input-field col s12">
									<input placeholder=" " id="" type="text" class="validate" name = "" required="" aria-required="true">
									<label class="active" for="">Username</label> 
								</div>							
														
								<div class="input-field col s12">
									<input placeholder=" " id="" type="password" class='validate' name="" required="" aria-required="true">
									<label class='active' for="">Password</label>
								</div>
								
								<div class="input-field col s12">
									<input placeholder=" " id="" type="password" class='validate' name="" required="" aria-required="true">
									<label class='active' for="">Confirm Password</label>
								</div>
							</li>
						                 
                    </div>
                </div>								                                                            
            </div>
			<center><button class="btn blue btnSave">Save Changes</button></center>
        </div>
		
        <li class="collection-header">
           <p style="color:white">.</p>
        </li>
    </ul>
</div>        
</div>

@stop

@section('script')
<script>
	$('.btnSave').click(function(){
		

		swal({   title: "Are you sure?",  
			  text: "Your Changes will be saved",   
			  type: "warning",   
			  showCancelButton: true,   
			  confirmButtonColor: "green",   
			  confirmButtonText: "Save Changes",   
			  closeOnConfirm: false }, 
			 function(){   			 
		});
	});


</script>
<script>
function update(jscolor) {
    // 'jscolor' instance can be used as a string
     document.getElementById('jc').style.color = '#' + jscolor        
      document.getElementById('admin').style.color = '#' + jscolor        
    document.getElementById('tit').style.color = '#' + jscolor
        document.getElementById('incident').style.color = '#' + jscolor
             document.getElementById("msg").style.color = '#' + jscolor
                    document.getElementById('dash').style.color = '#' + jscolor
                          document.getElementById('btnLogout').style.color = '#' + jscolor                           
}
function update1(jscolor) {  
    document.getElementById('maint').style.color = '#' + jscolor
            document.getElementById('regi').style.color = '#' + jscolor
                document.getElementById('delivery').style.color = '#' + jscolor
                    document.getElementById('announcement').style.color = '#' + jscolor
                        document.getElementById('reports').style.color = '#' + jscolor
                            document.getElementById('queries').style.color = '#' + jscolor
                                document.getElementById('utilities').style.color = '#' + jscolor
}
</script>

@stop