@extends('ClientDashboard')
@section('title')
Client Request of Gun
@endsection


@section('content')



<div class="row">


    <div class="col l12">
    
        <div class="col l6 blue">
        
            <div class="row yellow">
                <div class="col l12">
                    <div class="col l6">
                    
                     SWA
                    
                    </div>
                    
                    <div class="col l6">
                    
                    
                      ADRIAN
                    </div>
                
                
                </div>
               
            
            </div>
            
            
            
            <div class="row green">
            
          
            </div>
        
        </div>
    
        <div class="col l6 red">
        
        sadasdasd
        </div>
    
       
    </div>
    
    
    
    
    
    </div>







<!--BASIC LEAVE-->
<div class="row">
    <div class="col l12">
        
        <div class="col l6">
            
    <form class="card medium z-depth-1">
     
        <div class="row"></div>
                                <div class="row">
                                    <div class="col l12 push-l1">
                                        <div class="col l3">
                                            <i class="material-icons left" style="font-size:6rem">play_for_work
                                            </i> 
                                        </div>
                             
                                        <div class="col l6">
                                        <div class="row"></div>
                                            <span class="black-text" style="font-size:20px;font-family:Verdana">REQUISITION OF GUARDS
                                            </span>
                                
                                        </div>
                                    </div>
                                </div>
                <div class="row"></div>
                <div class="row">
                                <div class="col l12">
                                    <div class="col l6">
                                            <label for="test8">TYPE OF REQUESTS FOR GUARDS</label><br>
                                                <input type="checkbox" id="test8" disabled="disabled" />
                                            <label for="test8">Additional</label><br>
                                                <input type="checkbox" id="test8" disabled="disabled" />
                                            <label for="test8">Replacement</label><br>
                                                <input type="checkbox" id="test8" disabled="disabled" />
                                    </div>
                                    <div class="col l6">
         
                                            <label for="test8">NOTE!</label><br>
                                                    <span class="black-text"><bold>THE APPLICATION OF REQUISITION MUST <br>BE 2 WEEKS PRIOR TO THE GIVEN DATE OF APPROVAL</bold></span>
                                        </div>
            
            
                            </div>
                </div>
    </form>  
    </div>
        
         <!-- END OF BASIC LEAVE -->
        
        
        
        
        <!-- LEAVE FORM -->
        <div class="col l6">
            
    <form class="card medium z-depth-1">
     
        <div class="row"></div>
                       
    <div class="col l12">
        
        <div class="col l6 push-l2">
        <i class="material-icons" style="font-size:16rem">web</i>
            </div>
        <div class="col l6 pull-l1">
            <div class="row"></div>
            <div class="row"></div>
        
        </div>
    </div>
    <div class="card-content">
        <div class="row"></div>
      <span class="card-title activator grey-text text-darken-4">REQUEST APPLICATION FORM
          <i class="material-icons right" style="font-size:2rem">view_headline</i></span>
    </div>
    <div class="card-reveal">
        
      <span class="card-title grey-text text-darken-4">Fill Up the Following<i class="material-icons right">close</i></span>
     
        <div class="row">
    <form class="col s12">
      <div class="row">
          <div class="col l5 push-l4">
          <i class="material-icons prefix" style="font-size:6rem">account_circle</i>
          <label for="icon_prefix">ACCOUNT NAME</label>
              
            </div>
        </div>
                 
        <center><a class='dropdown-button btn' href='#' data-activates='dropdown1'>TYPE OF REQUESTS</a></center>

  <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
    <li><a href="#!">Additional</a></li>
    <li><a href="#!">Replacement</a></li>
  </ul>
        
        <div class="row"></div>
        <div class="row">
            <div class="col l12">
                <div class="col l6">
                        <label for="icon_prefix">Application Date:</label><br>
                        <input type="date" class="datepicker"><br>

                </div>
                <div class="col l6">
                
                        <label for="icon_prefix">Date Needed</label><br>
                        <input type="date" class="datepicker">
                
                </div>
                
                <!--textarea-->
                <div class="row">
                          <form class="col s12">
                            <div class="row">
                              <div class="input-field col s12">
                                <input id="input_text" type="text" length="10">
                                <label for="input_text">REASON</label>
                              </div>
                            </div>
                          </form>
                    
                     <div class="col l12 push-l2">
                                
                      <a href="#!" class="btn green darken-4 z-depth-3">Send</a>
                     <a href="#!" class="btn red darken-4 z-depth-3">Cancel</a>
                
                    
                    </div>
            </div>
                </div>
            </div>
    </form>
  </div>
    </div>

    </form>  
    </div>
       
     
    </div>

</div>




<script>
    $(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
</script>

@stop