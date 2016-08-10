@extends('securityguard.SecurityGuardDashboard')

@section('title')
Security Change Location
@endsection


@section('content')
<div class="row"></div>
<div class="row"></div>
<div class="row">
    <div class="col l12">
        <div class="col s10 push-s2" style=";max-height:100% !important;height:550px !important;">
    
                <div class="row" style="margin-top:-8%">
                        <div class="row"> 
                                    <div class="col s12 push-s1">

                                       <h3 class="blue-text" style="font-family:Myriad Pro;margin-top:9.2%">Change Location</h3>
                                    </div>  
                        </div>
                        <div class="row">
                        <div class="col s12" style="margin-top:-4%" >
                                <div class="container white lighten-2 z-depth-2" style="overflow:scroll;overflow-x:hidden; width:900px">
                                    <div class="row">
                                        <div class="col s12" >
                                            <table class="centered" style="border-radius:10px;" id="dataTable">

                                                <thead>
                                                    <tr>
                                                        <th style="width:50px;" class="blue darken-3 white-text">Client Name</th>
                                                        <th style="width:50px;" class="blue darken-3 white-text">Company Name</th>
                                                        <th style="width:50px;" class="blue darken-3 white-text">Nature of Business</th>
                                                        <th style="width:50px;" class="blue darken-3 white-text">Location</th>
                                                         <th style="width:50px;" class="blue darken-3 white-text">Action</th>


                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td>
                                                        Adrian Flores
                                                        </td>
                                                        <td>
                                                        Padi's Point
                                                        </td>
                                                         <td>
                                                        Bar
                                                        </td>
                                                         <td>
                                                        Makati City
                                                        </td>
                                                         <td>
                                                        <button id="detaillist" class="btn blue">
                                                            Send Request
                                                        </button>
                                                        </td>
                                                    </tr>

                                                </tbody>
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
    
    
    <!--MODAL APPROVAL-->
    
    <div id="modalapproval" class="modal modal-fixed-footer ci" style="overflow:hidden; width:75% !important; margin-top:100px !important;  max-height:100% !important; height:60% !important; border-radius:10px;">
        
        
            <div class="modal-header">
                <div class="h">
                    <h3><center>Approval Form for Location Request Swapping</center></h3>  
				</div>

            </div>
        
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">


                    <div class="row">
                        <div class="col l12">
                            <div class="col l6">
                            
                                     <div class="col s10 push-s1">
                                              <div class="row"></div>
                                                    <div class="input-field col s12">
                                                         <i class="mdi-communication-business prefix" style="font-size:35px;"></i>
                                                            <input id="" type="text" class="validate" name = "" required="" aria-required="true" pattern="([A-z0-9 '.-]){2,}">
                                                            <label for="">Client Name:</label> 
                                                    </div>
                                      </div>
                                     <div class="col s10 push-s1">
                                              <div class="row"></div>
                                                    <div class="input-field col s12">
                                                         <i class="mdi-communication-business prefix" style="font-size:35px;"></i>
                                                            <input id="" type="text" class="validate" name = "" required="" aria-required="true" pattern="([A-z0-9 '.-]){2,}">
                                                            <label for="">Business Address:</label> 
                                                    </div>
                                      </div>
                                    <div class="col s10 push-s1">
                                              <div class="row"></div>
                                                    <div class="input-field col s12">
                                                         <i class="mdi-communication-business prefix" style="font-size:35px;"></i>
                                                            <input id="" type="text" class="validate" name = "" required="" aria-required="true" pattern="([A-z0-9 '.-]){2,}">
                                                            <label for="">Request Approved Date:</label> 
                                                    </div>
                                      </div>

                            </div>
                            
                            
                            <div class="col l6">
                                
                                    <div class="col s10 push-s1">
                                          <div class="row"></div>
                                                <div class="input-field col s12">
                                                     <i class="mdi-communication-business prefix" style="font-size:35px;"></i>
                                                        <input id="" type="text" class="validate" name = "" required="" aria-required="true" pattern="([A-z0-9 '.-]){2,}">
                                                        <label for="">Guard For Replacement:</label> 
                                                </div>
                                  </div>
                                   <div class="col s10 push-s1">
                                          <div class="row"></div>
                                                <div class="input-field col s12">
                                                     <i class="mdi-communication-business prefix" style="font-size:35px;"></i>
                                                        <input id="" type="text" class="validate" name = "" required="" aria-required="true" pattern="([A-z0-9 '.-]){2,}">
                                                        <label for="">Reliever:</label> 
                                                </div>
                                  </div> 
                                  <div class="col s10 push-s1">
                                          <div class="row"></div>
                                                <div class="input-field col s12">
                                                     <i class="mdi-communication-business prefix" style="font-size:35px;"></i>
                                                        <input id="" type="text" class="validate" name = "" required="" aria-required="true" pattern="([A-z0-9 '.-]){2,}">
                                                        <label for="">Effectivity Date:</label> 
                                                </div>
                                  </div>
                                 
                            
                            </div>
                        
                        </div>
                                
                              
                               
                                
                              <form class="col s10 push-s1">
                                <div class="row">
                                  <div class="input-field col s12">
                                    <input id="input_text" type="text" length="120">
                                    <label for="input_text">REASON</label>
                                  </div>
                                </div>
                              </form>
                    </div>
	
    		 
                					
	<!-- Modal Button Save -->
 
        </div>
    
      
  
    <div class="modal-footer" style="background-color: #00293C;">
        
                     <a href="#!" class="btn blue darken-4 z-depth-3">Send</a>
    </div>
</div>
   

<script>


    $(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
</script>



@stop