@extends('ClientDashboard')
@section('title')
Client Views Guards Attendance
@endsection


@section('content')



<div class="row">
    <div class="col l12">
        <div class="col l9">
            <div class="card large z-depth-2">
                <div class="row">
                    <div class="col l12">
                        <div class="col l3">
                            <i class="material-icons left" style="font-size:6rem">email</i> 
                        </div>
                             
                        <div class="col l6">
                            <div class="row"></div>
                                <span class="black-text" style="font-size:20px;font-family:Verdana">GUARD ATTENDANCE</span>  
                        </div>
                    </div>
                </div>
                    <table class="striped" style="background-color:">
                        <thead>
                          <tr>
                              <th data-field="guard">NAME</th>
                              <th data-field="status">Today Status</th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr>
                            <td>Juan Dela Cruz</td>
                            <td>On Duty</td>
                          </tr>
                          <tr>
                            <td>Mang Tomas</td>
                            <td>Half Shift</td>
                          </tr>
                          <tr>
                            <td>Jose Rizal</td>
                            <td>Suspended</td>
                          </tr>
                        </tbody>
                    </table>
      
                </div>
            </div>
    
    
    







<script>
    $(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
</script>

@stop