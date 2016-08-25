@extends('client.ClientDashboard')
@section('title')
Inbox
@endsection


@section('content')

<!--Inbox-->
<div class="row"></div>
<div class="row">
	<div class="col s8 push-s3">
          <div class="row" style="margin-top:-40px;"> 
                    <div class="col s12 push-s4">
                     <h3 style="font-family:Myriad Pro;margin-top:9.2%;color:#662E1C;font-weight:bold">MESSAGES</h3>
                    </div>  
               <hr>
          </div>	
		<!-- table message -->
		<div id="message">
			<div class="container-fluid grey lighten-2">	
				<table class="striped" id="inboxTable">
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
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!--Inbox End-->

<!--modal message approved client/contract-->
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
					<li class="collection-header"><div style="font-size:18px;" id = "messageSubject">&nbsp;</div></li>
					<li class="collection-item"><p id = 'messageInbox'></p>
                    </li>
			</div>
		</div>
	</div>
		
	<div class="modal-footer ci modal-close" style="background-color: #00293C;">
		<button class="btn green waves-effect waves-light" name="" id = "" style="margin-right: 30px;">OK</button>
	</div>
</div>
<!--modal message approved client/contract end-->
@stop

@section('script')
<script>
$(document).ready(function(){
	var table = $('#inboxTable').DataTable();
	$.ajax({
        type: "GET",
        url: "{{action('InboxController@getInbox')}}",
        success: function(data){
            if (data){

                $.each(data, function(index,value){
                    if (value.tinyintStatus == 1){
                        radio = '<input name="" type="radio" id="radio'+value.intInboxID+'" checked/> <label for="'+value.intInboxID+'"></label>';  
                    }else{
                        radio = '<input name="" type="radio" id="radio'+value.intInboxID+'" /> <label for="'+value.intInboxID+'"></label>';
                    }
                    button = '<center><button class="btn blue darken-4 buttonRead" id="'+value.intInboxID+'"><i class="material-icons">keyboard_arrow_right</i></button></center>';
                    
                    table.row.add([
                        radio,
                        button,
                        '<h>' + value.datetimeSend + '</h>',
                        '<h>' + value.nameSender + '</h>',
                        '<h>' + value.strSubject + '</h>' + 
                        '<input type = "hidden" id = "type'+value.intInboxID+'" value="'+value.tinyintType+'">'
                    ]).draw(false);
                });//foreach
            }//if else
        }
    });//get inbox 

	$('#inboxTable').on('click', '.buttonRead', function(){
        var type = $('#type' + this.id).val();
        inboxID = this.id;
        readMessage();

        if (type == 0){
			message();
        }
    });

    function readMessage(){
        if($('#radio' + inboxID).is(':checked')){
            $('#radio' + inboxID).attr('checked', false); // all read mark as unread        
            $.ajax({
                type: "POST",
                url: "{{action('InboxController@readInbox')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    inboxID: inboxID
                }
            });//ajax

            $.ajax({
                type: "GET",
                url: "{{action('InboxController@getNumberOfUnreadMessages')}}",
                success: function(data){
                    if (data > 0){
                        $('#notification_count').text(data);
                        $('#notification_count').show();
                    }else{
                        $('#notification_count').hide();    
                    }
                }
            });//notification update
        }//if else
    }//function readMessage

    function message(){
        $('#modalMessage').openModal();
        getMessage();
    }

    function getMessage(){
        $.ajax({
            type: "GET",
            url: "/adminInbox/get/message?inboxID=" + inboxID,
            success: function(data){
                console.log(data);
                $('#messageSubject').text(data.strSubject);
                $('#messageInbox').text(data.strMessage);
            },async:false
        });//get guard waiting
    }//get message to db

});

</script>

<script>
$("#inboxTable").DataTable({
     "columns": [         
	{"orderable": false},
	{"orderable": false},
	null,
	null,
	null,
    ] ,  
	"pageLength":5,
	"lengthMenu": [5,10,15,20],
	"bFilter" : false
});
</script>
@stop