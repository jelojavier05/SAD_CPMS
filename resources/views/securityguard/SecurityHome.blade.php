@extends('securityguard.SecurityGuardDashboard')

@section('title')
Security Settings
@endsection


@section('content')

<!--MESSAGE-->
<div class="row"></div>
<div class="row">
	<div class="col s8 push-s3">
		
		<ul class="tabs" style="">
        	<li style="color:white"class="tab col l3"><a href="#announcement" class="active">Announcement</a></li>
        </ul>	
		<!-- table message -->
		<div id="announcement">
			<div class="container-fluid grey lighten-2">	
				<table class="striped" id="announcementTable">
					<thead>
						<tr>
							<th class="grey lighten-1" style="width: 20px;"></th>
							<th class="grey lighten-1" style="width: 30px;"></th>
							<th class="grey lighten-1">Date</th>						
							<th class="grey lighten-1">Subject</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td><input name="" type="radio" id="test1"/> <label for="test1"></label></td>
							<td><button class="btn blue darken-4 buttonOpen"><i class="material-icons">keyboard_arrow_right</i></button></td>
							<td>01/01/2016</td>
							<td>TEST SUBJECT</td>
						</tr>
						
						<tr>
							<td><input name="" type="radio" id="test2"/> <label for="test2"></label></td>
							<td><button class="btn blue darken-4 buttonOpen"><i class="material-icons">keyboard_arrow_right</i></button></td>
							<td>02/02/2016</td>
							<td>TEST SUBJECT 2</td>
						</tr>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!--Modal announcement content-->
<div id="modalContent" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:470px; margin-top:-10px;">
    <div class="modal-header">
      	<div class="h">
			<h3><center>Announcement</center></h3>  
		</div>
    </div>
	
	<div class="modal-content">
		<div class="row">
			<div class="col s12">
				<ul class="collection with-header" id="collectionActive">
					<li class="collection-header"><div style="font-size:18px;" id = "">&nbsp;TEST SUBJECT</div></li>
					<li class="collection-item"><p id = ''>The practice of writing paragraphs is essential to good writing. Paragraphs help to break up large chunks of text and makes the content easier for readers to digest. They guide the reader through your argument by focusing on one main idea or goal. However, knowing how to write a good, well-structured paragraph can be little tricky. Read the guidelines below and learn how to take your paragraph writing skills from good to great!</p>
                    </li>
				</ul>
			</div>
		</div>
	</div>
		
	<div class="modal-footer ci modal-close" style="background-color: #00293C;">
		<button class="btn green waves-effect waves-light" name="" id = "" style="margin-right: 30px;">OK
            </button>
	</div>
</div>

@stop
	
@section('script')
<script>
	 $('#announcementTable').on('click', '.buttonOpen', function(){
            $('#modalContent').openModal();       
        });
	
	$("#announcementTable").DataTable({
             "columns": [
            {"searchable": false},
			{"searchable": false},
            null,
			null
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20],
			"bFilter": false,
			
		});
</script>	
@stop