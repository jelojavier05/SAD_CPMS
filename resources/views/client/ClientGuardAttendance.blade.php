@extends('client.ClientDashboard')
@section('title')
Client Views Guards Attendance
@endsection


@section('content')

<div clas="col s12">
    
        <h1 class = "blue darken-3 white-text" style="border: 1px solid black;font-family:Verdana"><center>Guard Attendance</center></h1>
  
    </div>

<div class="row">
    <div class="col l12">
        <div class="col l8 white z-depth-2" style="overflow:scroll;height:613px">
  
        
                
                <div class="row">
                
                 <div class="col l5 push-l8">
                                  <div class="input-field col">
                                    <input type="text" name="gunreq"/>
                                    <label for="gunreq">Search</label>
                                  </div>
                        
                        </div>
                
                </div>
                    <table class="centered">
                        <thead>
                          <tr>
                              <th data-field="guard">Deployed Guard</th>
                              <th data-field="status">Deployment Start Date </th>
                              <th data-field="guard">Status</th>
                              <th data-field="status">View Profile</th>
                              
                          </tr>
                        </thead>

                        <tbody>
                          <tr>
                            <td>Juan Dela Cruz</td>
                            <td>12/05/2014</td>
                            <td>On Duty</td>
                            <td> 
                                <button class="btn waves-effect waves-light green darken-4" type="button" name="action">PROFILE
                            <i class="material-icons right">send</i>
                                </button>
                              
                            </td>
                          </tr>
                         
                              <tr>
                            <td>Juan Dela Cruz</td>
                            <td>12/05/2014</td>
                            <td>On Duty</td>
                            <td> 
                                <button class="btn waves-effect waves-light green darken-4" type="button" name="action">PROFILE
                            <i class="material-icons right">send</i>
                                </button>
                              
                            </td>
                          </tr>
                              <tr>
                            <td>Juan Dela Cruz</td>
                            <td>12/05/2014</td>
                            <td>On Duty</td>
                            <td> 
                                <button class="btn waves-effect waves-light green darken-4" type="button" name="action">PROFILE
                            <i class="material-icons right">send</i>
                                </button>
                              
                            </td>
                          </tr>
                            <tr>
                            <td>Juan Dela Cruz</td>
                            <td>12/05/2014</td>
                            <td>On Duty</td>
                            <td> 
                                <button class="btn waves-effect waves-light green darken-4" type="button" name="action">PROFILE
                            <i class="material-icons right">send</i>
                                </button>
                              
                            </td>
                          </tr>
                            <tr>
                            <td>Juan Dela Cruz</td>
                            <td>12/05/2014</td>
                            <td>On Duty</td>
                            <td> 
                                <button class="btn waves-effect waves-light green darken-4" type="button" name="action">PROFILE
                            <i class="material-icons right">send</i>
                                </button>
                              
                            </td>
                          </tr> 
                            <tr>
                            <td>Juan Dela Cruz</td>
                            <td>12/05/2014</td>
                            <td>On Duty</td>
                            <td> 
                                <button class="btn waves-effect waves-light green darken-4" type="button" name="action">PROFILE
                            <i class="material-icons right">send</i>
                                </button>
                              
                            </td>
                          </tr>
                            <tr>
                            <td>Juan Dela Cruz</td>
                            <td>12/05/2014</td>
                            <td>On Duty</td>
                            <td> 
                                <button class="btn waves-effect waves-light green darken-4" type="button" name="action">PROFILE
                            <i class="material-icons right">send</i>
                                </button>
                              
                            </td>
                          </tr>
                                                        <tr>
                            <td>Juan Dela Cruz</td>
                            <td>12/05/2014</td>
                            <td>On Duty</td>
                            <td> 
                                <button class="btn waves-effect waves-light green darken-4" type="button" name="action">PROFILE
                            <i class="material-icons right">send</i>
                                </button>
                              
                            </td>
                          </tr>
                                                        <tr>
                            <td>Juan Dela Cruz</td>
                            <td>12/05/2014</td>
                            <td>On Duty</td>
                            <td> 
                                <button class="btn waves-effect waves-light green darken-4" type="button" name="action">PROFILE
                            <i class="material-icons right">send</i>
                                </button>
                              
                            </td>
                          </tr>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        </tbody>
                    </table>
      
            </div>
        
        <div class="col l4  white" style="overflow:scroll;height:613px">
            <div class="row"></div>
          <div class="col l6 push-l3    ">
              <img src="/img/avatar04.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                <div class="row">
                    <label>Name:</label><br>
                    <label>Account Status:</label>
                </div>      
            </div>
        
        
        
        </div>
        
    </div>
</div>
    
    
    







<script>
    $(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
</script>

@stop