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
                   Administrator's Name:
                    <div style="font-weight:normal;" id = ''>
                        &nbsp;&nbsp;&nbsp; John Cena
                    </div>
                </li>
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
                    SYSTEM THEME:
                    
                </li>
                <div class="row"> 
                    <div class="col s12">
                    
                    <div class="col s6"> 
                         <li class="collection-item" style="font-weight:bold;">
                  
                    <p style="margin-top:-7%">For HEADER</p>
                    <div style="font-weight:normal;" id = ''>
                        &nbsp;&nbsp;&nbsp;  <input class="jscolor {onFineChange:'update(this)'}" value="#0d47a1">
                    </div>
                        </li>
                    </div>
                         <div class="col s6">  
                            <li class="collection-item" style="font-weight:bold;">
                    <p style="margin-top:-7%">For SIDE NAV</p>
                     <div style="font-weight:normal;" id = ''>
                        &nbsp;&nbsp;&nbsp;  <input class="jscolor {onFineChange:'update1(this)'}" value="#0d47a1">
                    </div>
                                  </li>
                    </div>
                    </div>
                </div>
              
              
                

                
            </div>
        </div>
        <li class="collection-header">
           <p style="color:white">.</p>
        </li>
    </ul>
</div>
    
    
<!--------------------CUSTOMIZATION TAB------------------->
    
    
<!--
<div id="Customization" class="ci col s8 push-s3" style="margin-top:2px;">
    <ul class="collection with-header" id="collectionActive" >
        <li class="collection-header">
            <h4 style="font-weight:bold;">Basic Design</h4>
        </li>
                
        <div class="col s12"> 
            <div class="col s6">                        
                <li class="collection-item" style="font-weight:bold;">
                    System Title
                    <input class="jscolor {onFineChange:'update(this)'}" value="#ffffff">
                </li>

                <li class="collection-item" style="font-weight:bold;">
                    Header and Wrapper
                    <input class="jscolor {onFineChange:'update1(this)'}" value="#0d47a1">
                </li>
                
                <li class="collection-item" style="font-weight:bold;">
                    Side Navigation
                    <input class="jscolor {onFineChange:'update2(this)'}" value="#0d47a1">
                    </li>
                
                <li class="collection-item" style="font-weight:bold;">
                    Body
                    <input class="jscolor {onFineChange:'update3(this)'}" value="#0d47a1">
                </li>
            </div>
        </div>
-->
            
<!--
<<<<<<< HEAD
<!--
                <div class="col s6">                        
                        <li class="collection-item" style="font-weight:bold;">
                            System Title
                            <input class="jscolor {onFineChange:'update(this)'}" value="cc66ff">
                        </li>

                        <li class="collection-item" style="font-weight:bold;">
                            Header and Wrapper
                            <input class="jscolor {onFineChange:'update1(this)'}" value="cc66ff">
                        </li>
                        <li class="collection-item" style="font-weight:bold;">
                            Side Navigation
                            <input class="jscolor {onFineChange:'update2(this)'}" value="cc66ff">
                        </li>
                     <li class="collection-item" style="font-weight:bold;">
                            Body
                            <input class="jscolor {onFineChange:'update3(this)'}" value="cc66ff">
                        </li>
                </div>
			 </div>
            <li class="collection-header">
				<h4 style="font-weight:bold;">.</h4>
			</li>
        <li class="collection-header">
            <h4 style="font-weight:bold;">.</h4>
        </li>
-->

    <!--
           <li class="collection-header">
				<h4 style="font-weight:bold;">Modals, Tabs,  </h4>
			</li>
             <div class="col s12"> 
            
                <div class="col s6">                        
                        <li class="collection-item" style="font-weight:bold;">
                            Modals
                            <input class="jscolor {onFineChange:'update4(this)'}" value="cc66ff">
                        </li>

                        <li class="collection-item" style="font-weight:bold;">
                            Header and Wrapper
                            <input class="jscolor {onFineChange:'update1(this)'}" value="cc66ff">
                        </li>
                      
                </div>
			 </div>
        </ul>
              <button class="z-depth-1 btn-large green modal-trigger" href="#modalEditAccount">
                        <i class="material-icons left">add</i> EDIT ACCOUNT
                    </button>
          <button class="z-depth-1 btn-large green modal-trigger" href="#modalEditColor">
                        <i class="material-icons left">add</i> EDIT COLOR
                    </button>
             
            
        </div>
        
    </div>
        </div>
    </div>
<!--

<div id="modalEditAccount" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:400px !important; border-radius:10px;">
       <div class="modal-header">
                <div id="h">
                    <h3><center>Account</center></h3>  
				</div>

            </div>
</div>
<div id="modalEditColor" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:400px !important; border-radius:10px;">
       <div class="modal-header" id="modalss">
                <div id="h">
                    <h3><center>Color</center></h3>  
				</div>

            </div>-->
</div>

@stop

@section('script')
<script>
	$('#buttonEditAccount').click(function(){
		

		$('#modalEditAccount').openModal();
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