@extends('CGR.CGRMain')
@section('title')
Receiving Delivery
@endsection

@section('content')

<div class="row">
 
     <div class="col s5 push-s3" style="margin-left:-2%">
    
                   <h3 class="blue-text" style="font-family:Myriad Pro;margin-top:7%">Receiving Delivery</h3>
                </div>
    
    </div>
<div class="row">
    <div class="col l12">
            <div class="col l10 offset-l2" style="overflow:scroll;max-height:690px">
        
                 <table class="centered">
                        <thead>
                          <tr>
                              
                              <th data-field="status">Delivery ID</th>
                              <th data-field="guard">Delivery Person/s</th>
                              <th data-field="status">Delivery Date</th>
                              <th data-field="guard">Received By</th>                
                          </tr>
                        </thead>

                        <tbody>
                          <tr>
                            
                            <td>0001</td>
                            <td>Rustom Cister</td>
                            <td>02/05/16</td>
                            <td> 
                                 <button class="btn waves-effect waves-light blue darken-4 modal-trigger" type="button" name="action" href="#verifybtn">Verify
                                 
                                            </button>       
                            </td>
                          </tr> 
                            
                            
                            
                         
                        </tbody>
                    </table>
      
        
        
            
        
            </div>
    </div>




</div>

<div id="verifybtn" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:10% !important;  max-height:100% !important; height:50% !important; border-radius:10px;">
        
        
            <div class="modal-header">
                <div class="h">
                    <h3><center>Receiving Account Form</center></h3>  
				</div>

            </div>
        
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">


                    <div class="row">
                                    <div class="col s10 push-s1">
                                                <div class="input-field col s12">
														 <i class="mdi-action-account-circle prefix" style="font-size:35px;"></i>
                                                        <input id="strNatureOfBusiness" type="text" class="validate" name = "natureOfBusiness" required="" aria-required="true" pattern="([A-z0-9 '.-]){2,}">
                                                            <label for="">Username:</label> 
                                                </div>
                                    </div>
                           
                                  
                                  <div class="col s10 push-s1">       
                                                <div class="input-field col s12">
                                                    <i class="mdi-action-lock-outline prefix" style="font-size:35px;"></i>
                                                    <input  id="deciRate" maxlength="6" type="text" class="validate" pattern="[0-9.]{3,}" required="" aria-required="true">
                                                    <label data-error="Incorrect" for="deciRate">Password</label>

                                                </div>
                                  </div>
                        
                                    
                                  <div class="col s10 push-s1">      
                                                <div class="input-field col s12">
                                                    <i class="mdi-hardware-security prefix" style="font-size:35px;"></i>
                                                    <input  id="deciRate" maxlength="6" type="text" class="validate" pattern="[0-9.]{3,}" required="" aria-required="true">
                                                    <label data-error="Incorrect" for="deciRate">Security Code</label>

                                                </div>
                                  </div>
                            
                        </div>
                        <div class="row">
                                <div class="col l12 push-l4">
                            
                            
                             <button class="btn large waves-effect green darken-4 waves-light" name="action" style="margin-right: 30px;" id = "btnAddSave">Log In
                               <i class="material-icons right">send</i>
                             </button>
                        
                                    
                            </div>
                        </div>
	
    		 
                					
	<!-- Modal Button Save -->
 
        </div>
    
      
  
    <div class="modal-footer" style="background-color: #00293C;">
            
    </div>
</div>
 


@stop