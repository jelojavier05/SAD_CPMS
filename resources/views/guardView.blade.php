@extends('layout.maintenanceLayout')

@section('title')
Guard
@endsection

@section('content')

<div class="row">
    <div class="col s12 push-s1">
        <div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:25px;">
<!--            <div class="row">-->
                <div class="col s6 push-s1">
                    <h2 class="blue-text">Security Guard</h2>
                </div>

                <div class="col s3 offset-s3">
					<a style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="/guard/registration/personalData">
                        <i class="material-icons left">add</i> ADD
                    </a>
                </div>
<!--            </div>-->
        
            <div class="row">
                <div class="col s10 push-s1" style="margin-top:-20px;">
                    <table class="highlight white" style="border-radius:10px;" id="dataTable">

                        <thead>
                            <tr>
                                <th style="width:50px;"></th>
								<th style="width:50px;"></th>
                                <th>ID</th>
                                <th>Name</th>
								<th>Gender</th>
								
                                
                            </tr>
                        </thead>

                        <tbody>
                            
                                <tr>
                                    
									
									<td>
                                        <button class="buttonUpdate btn"  name="" id="" >
                                            <i class="material-icons">edit</i>
                                        </button>
                                    <label for=""></label>
                                    </td>

                                    <td>
                                        <button class="buttonDelete btn red" id="">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                    <td id = "">1</td>
                                	<td id = "">Mang Jose</td>
									<td id = "">Male</td>
                                	
                                </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
<!--        </br></br></br></br></br>-->
        </div>
    </div>
@stop
	
@section('script')


<script type="text/javascript">
	$(document).ready(function(){
        $("#dataTable").DataTable({
                 "columns": [
                { "orderable": false },
                { "orderable": false },
                null,
                null,
				null
                ] ,  
                "pageLength":5,
				"lengthMenu": [5,10,15,20]
            });
	});
</script>
@stop