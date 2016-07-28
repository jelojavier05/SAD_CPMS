@extends('CGR.CGRMain')
@section('title')
Guard Attendance
@endsection

@section('content')

<div class="row">
 
     <div class="col s5 push-s3" style="margin-left:-2%">
    
                   <h3 class="blue-text" style="font-family:Myriad Pro;margin-top:7%">Security Guard Attendance</h3>
                </div>
    
    </div>
<div class="row">
    <div class="col l12">
            <div class="col l10 offset-l2" style="overflow:scroll;max-height:690px">
        
                 <table class="centered">
                        <thead>
                          <tr>
                              
                              <th data-field="status">Security Guard </th>
                              <th data-field="guard">Picture</th>
                              <th data-field="status">View Profile</th>
                              <th data-field="guard">Action</th>
                              <th data-field="guard">Time in/out</th>
                              
                          </tr>
                        </thead>

                        <tbody>
                          <tr>
                            
                            <td>Adrian Flores</td>
                            <td>
                             
                                    <img src="/img/avatar2.png" alt="" class="responsive-img" width="50%" height="40%" >
                                 
                              
                            </td>
                            <td> 
                                        <button class="btn waves-effect waves-light green darken-4" type="button" name="action">PROFILE
                                            <i class="material-icons right">send</i>
                                        </button>
                              
                            </td>
                            <td> 
                                        
                                            <button class="btn waves-effect waves-light blue darken-4" type="button" name="action">TIME-IN
                                 
                                            </button>
                                
                                            <button class="btn waves-effect waves-light red darken-4" type="button" name="action">TIME-OUT
                                                    
                                            </button>

                              
                            </td>
                            <td> 
                                       
                            </td>
                          </tr> 
                            
                            
                            
                         
                        </tbody>
                    </table>
      
        
        
            
        
            </div>
    </div>




</div>
 



@stop