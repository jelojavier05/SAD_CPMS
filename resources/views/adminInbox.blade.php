@extends('layout.maintenanceLayout')

@section('title')
Inbox
@endsection

@section('content')
<div class="row"></div>
<div class="row"></div>
<div class="row">
	<div class="col s8 push-s3">
		
		<ul class="tabs" style="">
        	<li style="color:white"class="tab col l3"><a href="#message" class="active">Messages</a></li>
        </ul>
		
<!-----------------------------------------------message table----------------------------->		
		
		<div id="message">
			<div class="container-fluid grey lighten-2">	
				<table class="striped" id="dataTableMsg">
					<thead>
						<tr>
							<th class="grey lighten-1" style="width: 20px;"></th>
							<th class="grey lighten-1" style="width: 30px;"></th>
							<th class="grey lighten-1">Date</th>
							<th class="grey lighten-1">From</th>
							<th class="grey lighten-1">Subject</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td><input name="" type="radio" id="1" /> <label for="1"></label></td>
							<td><center><button class="btn blue darken-4 modal-trigger" href="#modalMessage"><i class="material-icons">keyboard_arrow_right</i></button></center></td>
							<td>01/01/2016</td>
							<td>Master</td>
							<td>ASASASASASASASAS</td>


						</tr>
						
						<tr>
							<td><input name="" type="radio" id="1" /> <label for="1"></label></td>
							<td><center><button class="btn blue darken-4 modal-trigger" href="#modalSendNoti"><i class="material-icons">keyboard_arrow_right</i></button></center></td>
							<td>02/02/2016</td>
							<td>CPMS</td>
							<td>New Client</td>


						</tr>
					</tbody>

				</table>
			</div>
		</div>
		
<!-----------------------------------------------message table end----------------------------->		

		
<!----------------------------Modal Message---------------->

<div id="modalMessage" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:470px; margin-top:-10px;">
    <div class="modal-header">
      	<div class="h">
			<h3><center>Message</center></h3>  
		</div>
    </div>
	
	<div class="modal-content">
		<div class="row">
			<div class="col s12">
				<ul class="collection with-header" id="collectionActive">
					<li class="collection-header" style="font-weight:bold;">Subject:<div style="font-size:18px;" id = "">&nbsp;Hello</div></li>
					<!----------------message---------------------->
					<li class="collection-item"><p id = ''>The practice of writing paragraphs is essential to good writing. Paragraphs help to break up large chunks of text and makes the content easier for readers to digest. They guide the reader through your argument by focusing on one main idea or goal. However, knowing how to write a good, well-structured paragraph can be little tricky. Read the guidelines below and learn how to take your paragraph writing skills from good to great!</p>
                    </li>
			</div>
		</div>
	</div>
		
	<div class="modal-footer ci modal-close" style="background-color: #00293C;">
		<button class="btn green waves-effect waves-light" name="" id = "" style="margin-right: 30px;">OK
        </button>
	</div>
</div>


<!----------------------------Modal Client Contract Approved Message End---------------->
	
<!----------------------------Modal New Client Send noti---------------->

<div id="modalSendNoti" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:630px; margin-top:-50px;">
    <div class="modal-header">
      	<div class="h">
			<h3><center>Message</center></h3>  
		</div>
    </div>
	
	<div class="modal-content">
		<div class="row">
			<div class="col s12">
				<ul class="collection with-header" id="collectionActive">
					<li class="collection-header" style="font-weight:bold;">Number of Guards Needed:<div style="font-size:18px;" id = "">&nbsp;5</div><button class="btn blue right" style="margin-top:-40px;" id="btnSuggested">
								Suggested
								</button></li>
					<!----------------message---------------------->
					<li class="collection-item">
						<div class="row">
							<div class="col s12">
								
								<table class="striped white" style="border-radius:10px; width:100%;" id="dataTableSendNoti">
									<thead>
										<th class="grey lighten-1" style="width:10px;"></th>
										<th class="grey lighten-1">ID</th>
										<th class="grey lighten-1">First Name</th>
										<th class="grey lighten-1">Last Name</th>
										<th class="grey lighten-1">Province</th>
										<th class="grey lighten-1">City</th>
									</thead>
									<tbody>
										<tr>
											<td><input type="checkbox" id="test1"/>
      										<label for="test1"></label></td>
											<td>1</td>
											<td>Kobe</td>
											<td>Bryant</td>
											<td>Metro Manila</td>
											<td>Las Pinas</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
                    </li>
			</div>
		</div>
	</div>
		
	<div class="modal-footer ci modal-close" style="background-color: #00293C;">
		<button class="btn blue waves-effect waves-light" name="" id = "" style="margin-right: 30px;">Send<i class="material-icons right">send</i>
        </button>
	</div>
</div>


<!----------------------------Modal New Client Send noti End---------------->
		
	</div>
</div>

@stop

@section('script')
<script>
$('#dataTableMsg').DataTable({
             "columns": [
            { "orderable": false },
			{ "orderable": false },
			null,
            null,
			{ "orderable": false }
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20],
			"bFilter": false,
         });
	
$('#dataTableRequest').DataTable({
             "columns": [
            { "orderable": false },
			{ "orderable": false },
			null,
            null,
			{ "orderable": false }
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20],
			"bFilter": false,
         });
	
$('#dataTableSendNoti').DataTable({
             "columns": [
            { "orderable": false },
			null,
            null,
			null,
			null,
			null
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
         });
	
</script>
@stop