@extends('securityguard.SecurityGuardDashboard')

@section('title')
Security Leave Request
@endsection


@section('content')



<!--BASIC LEAVE-->
<div class="row" class="ci">
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
                                            <span class="black-text" style="font-size:20px;font-family:Myriad Pro">BASIC LEAVE
                                            </span>
                                
                                        </div>
                                    </div>
                                </div>
                <div class="row"></div>
                <div class="row">
                                <div class="col l12">
                                    <div class="col l6">
                                            <label for="test8">TYPES OF LEAVE</label><br>
                                                <input type="checkbox" id="test8" disabled="disabled" />
                                            <label for="test8">Sick</label><br>
                                                <input type="checkbox" id="test8" disabled="disabled" />
                                            <label for="test8">Maternity</label><br>
                                                <input type="checkbox" id="test8" disabled="disabled" />
                                            <label for="test8">Personal Leave of Absence</label>
                                    </div>
                                    <div class="col l6">
                                            <label for="test8">MAXIMUM LEAVES: 5</label><br>
                                            <label for="test8">REMAINING LEAVES: 3</label><br>  
                                            <label for="test8">NOTE!</label><br>
                                                    <span class="ci"><bold>THE APPLICATION OF LEAVE MUST <br>BE <div class="blue-text">2 DAYS</div>PRIOR TO THE GIVEN DATE OF APPROVAL</bold></span>
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
      <span class="card-title activator grey-text text-darken-4">LEAVE APPLICATION FORM
          <i class="material-icons right" style="font-size:3rem">view_headline</i></span>
    </div>
    <div class="card-reveal sidenavhover">
        
      <span class="card-title grey-text text-darken-4">Fill Up the Following<i class="material-icons right">close</i></span>
     
        <div class="row">
    <form class="col s12">
      <div class="row">
          <div class="col l5 push-l4">
          <i class="material-icons prefix" style="font-size:6rem">account_circle</i>
          <label for="icon_prefix">ACCOUNT NAME</label>
              
            </div>
        </div>
                 
        <center><a class='dropdown-button btn' href='#' data-activates='dropdown1'>LEAVE TYPE</a></center>

  <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
    <li><a href="#!">Sick</a></li>
    <li><a href="#!">Maternity</a></li> 
    <li><a href="#!">Personal Leave of Absence</a></li>
  </ul>
        
        <div class="row"></div>
        <div class="row">
            <div class="col l12">
                
                <div class="col l6">
                
                        <label for="icon_prefix">Date Return to Work</label><br>
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
                    
                     <div class="col l12">
                                
                      <a href="#!" class="btn green darken-4 z-depth-3 right">Send</a>
                    
                
                    
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

<!--END OF lEAVE FORM-->


<div class="row"><fieldset style="background-color:grey"></fieldset></div>
  <!--MESSAGE-->


@stop