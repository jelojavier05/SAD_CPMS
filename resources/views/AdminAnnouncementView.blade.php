@extends('layout.maintenanceLayout')

@section('title')
Announcement
@endsection

@section('content')

<div class="row" style="margin-top:-30px;">
  <div class="row"> 
        
    <div class="row">
 
     <div class="col s5 push-s3" style="margin-left:-2%">
    
                   <h3 class="blue-text" style="font-family:Myriad Pro;margin-top:9.2%">Announcements</h3>
                </div>
    
    </div>
   
    </div>
    <div class="col s12 push-s1" style="margin-top:-4%">
        <div class="container white lighten-2 z-depth-2 animated fadeIn">
<!--            <div class="row">-->
               

                <div class="col s6 offset-s8">
                <button style="margin-top: 30px;" id="" class=" z-depth-2 btn-large blue modal-trigger" href="#modalcreateAnnouncement">
                     Make an Announcement
                </button>
            </div>
            
            <div class="row">
                <div class="col s12" style="margin-top:-5px;">
                    <table class="striped white" style="border-radius:10px;" id="tableAnnouncement">
                        <thead>
                            <tr>
                                <th style="width:50px;" class="grey lighten-1 "></th>
                                <th style="width:50px;" class="grey lighten-1 "></th>
                                <th style="width:50px;" class="grey lighten-1 "></th>
                                <th class="grey lighten-1 ">ID</th>
                                <th class="grey lighten-1 ">Date</th>
                                <th class="grey lighten-1 ">Subject</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--modal create announcement-->

<div id="modalcreateAnnouncement" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:500px; margin-top:-10px;">
    <div class="modal-header">
      	<div class="h">
			<h3><center>Announcement</center></h3>  
		</div>
    </div>
	
	<div class="modal-content">
		<div class="row">
			<div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
				 <div class="row"></div>  
				 <div class="input-field col s8">
					 <i class="material-icons prefix" style="font-size:35px;">announcement</i>
					 <input placeholder=" " id="strSubjectAdd" type="text" class="validate" name = "" required="" aria-required="true">
					 <label for="">Subject</label> 
					 
				 </div>
			</div>
			
			
			<div class="col s10 push-s1" >      
                                            
				 <div class="row"></div>  
				 <div class="input-field col s12">
					 <i class="material-icons prefix" style="font-size:35px;">announcement</i>
					 <textarea placeholder=" " class="materialize-textarea" id="strMessageAdd" type="text" length="224"></textarea>
					 <label for="input_text">Content</label> 
					 
				 </div>
			</div>
			
		</div>
	</div>
		
	<div class="modal-footer ci" style="background-color: #00293C;">
		<button class="btn large waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnAdd">Save
			<i class="material-icons right">send</i>
		</button>
	</div>
</div>

<!--modal create announcement end-->

<!--modal edit announcement -->

<div id="modaleditAnnouncement" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:550px; margin-top:-10px;">
    <div class="modal-header">
      	<div class="h">
			<h3><center>Announcement</center></h3>  
		</div>
    </div>
	
	<div class="modal-content">
		<div class="row">
			
			<div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
				<div class="row"></div>  
				<div class="input-field col s2">
					<input  id="strAnnouncementIDEdit" type="text" class="validate"  name = "" readonly required="" aria-required="true" value = "1">
					<label for="">ID</label> 

				</div>
			</div>
			
			
			<div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
				 <div class="row"></div>  
				 <div class="input-field col s8">
					 <i class="material-icons prefix" style="font-size:35px;">announcement</i>
					 <input placeholder=" " id="strSubjectEdit" type="text" class="validate" name = "" required="" aria-required="true" value="TEST 1">
					 <label for="">Subject</label> 
					 
				 </div>
			</div>
			
			
			<div class="col s10 push-s1" >      
                                            
				 <div class="row"></div>  
				 <div class="input-field col s12">
					 <i class="material-icons prefix" style="font-size:35px;">announcement</i>
					 <textarea  class="materialize-textarea" id="strMessageEdit" type="text" length="224" placeholder=" "></textarea>
					 <label for="input_text">Content</label> 
					 
				 </div>
			</div>
			
			
			
		</div>
	</div>
		
	<div class="modal-footer ci modal-close" style="background-color: #00293C;">
		<button class="btn large waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnEdit">Save
			<i class="material-icons right">send</i>
		</button>
	</div>
</div>

<!--modal edit announcement end-->


<!--Modal read announcement content-->
<div id="modalopenAnnouncement" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:470px; margin-top:-10px;">
    <div class="modal-header">
      	<div class="h">
			<h3><center>Announcement</center></h3>  
		</div>
    </div>
	
	<div class="modal-content">
		<div class="row">
			<div class="col s12">
				<ul class="collection with-header" id="collectionActive">
					<li class="collection-header"><div style="font-size:18px;" id = "strSubjectOpen">&nbsp;</div></li>
					<li class="collection-item"><p id = 'strMessageOpen'></p>
                    </li>
				</ul>
			</div>
		</div>
	</div>
		
	<div class="modal-footer ci modal-close" style="background-color: #00293C;">
		<button class="btn green waves-effect waves-light" style="margin-right: 30px;">OK
            </button>
	</div>
</div>
	
<!--Modal read announcement end-->
	


@stop

@section('script')

<script>
$(document).ready(function(){

	refreshTable();

	function refreshTable(){
		$.ajax({
	        type: "GET",
	        url: "{{action('AdminAnnouncementViewController@get')}}",
	        success: function(data){
	        	var table = $('#tableAnnouncement').DataTable();
            	table.clear().draw(); //clear all the row

	            $.each(data, function(index, value){
	            	var buttonRead = '<button class="btn blue darken-4 buttonOpen" id ="'+value.intAnnouncementID+'"><i class="material-icons">keyboard_arrow_right</i></button>';
	            	var buttonEdit = '<button class="btn col s12 buttonEdit" name="" id="'+value.intAnnouncementID+'"><i class="material-icons">edit</i></button>'; 
	            	var buttonDelete = '<button class="buttonDelete btn red col s12" id="'+value.intAnnouncementID
	            	+'" ><i class="material-icons">delete</i></button>';

	            	table.row.add([
		                buttonRead,
		                buttonEdit,
		                buttonDelete,
		                '<h id = "id'+value.intAnnouncementID+'">' + value.intAnnouncementID +'</h>',
		                '<h id = "date'+value.intAnnouncementID+'">' + value.dateFormatedCreated +'</h>',
		                '<h id = "subject'+value.intAnnouncementID+'">' + value.strSubject +'</h>' + 
		                '<input type = "hidden" id = "message'+value.intAnnouncementID+'" value = "'+value.strMessage+'">'
		            ]).draw();
	            });
	        },
	    });//ajax
	}

	$('#btnAdd').click(function(){
		var strSubject = $('#strSubjectAdd').val().trim();
		var strMessage = $('#strMessageAdd').val().trim();
		if (checkInput(strSubject, strMessage)){
			create(strSubject, strMessage);
		}else{
			var toastContent = $('<span>Please check your input.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
	});

	$('#btnEdit').click(function(){
		var strSubject = $('#strSubjectEdit').val().trim();
		var strMessage = $('#strMessageEdit').val().trim();
		var intAnnouncementID = $('#strAnnouncementIDEdit').val().trim();
		if (checkInput(strSubject, strMessage)){
			update(strSubject, strMessage, intAnnouncementID);
		}else{
			var toastContent = $('<span>Please check your input.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
	});

	function checkInput(strSubject, strMessage){

		if (strSubject == '' || strMessage == ''){
			return false;
		}else{
			return true;
		}
	}

	function create(strSubject, strMessage){
		$.ajax({
	        type: "POST",
	        url: "{{action('AdminAnnouncementViewController@create')}}",
	        beforeSend: function (xhr) {
	            var token = $('meta[name="csrf_token"]').attr('content');

	            if (token) {
	                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
	            }
	        },
	        data: {
	            strSubject: strSubject,
	            strMessage: strMessage
	        },
	        success: function(data){
	        	$('#strSubjectAdd').val('');
	        	$('#strMessageAdd').val('');
	        	$('#modalcreateAnnouncement').closeModal();
                swal("Success!", "Announcement is created", "success");
                refreshTable();
	        },
	        error: function(data){
	        }
	    });//ajax
	}

	function update(strSubject, strMessage, intAnnouncementID){
		$.ajax({
	        type: "POST",
	        url: "/adminannouncement/update?announcementID=" + intAnnouncementID,
	        beforeSend: function (xhr) {
	            var token = $('meta[name="csrf_token"]').attr('content');

	            if (token) {
	                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
	            }
	        },
	        data: {
	            strSubject: strSubject,
	            strMessage: strMessage
	        },
	        success: function(data){
	        	$('#modaleditAnnouncement').closeModal();
                swal("Success!", "Announcement is updated", "success");
                refreshTable();
	        },
	        error: function(data){
	        }
	    });//ajax
	}

	$('#tableAnnouncement').on('click', '.buttonOpen', function(){
        var strMessageOpen = 'message' + this.id;
        var strSubjectOpen = 'subject' + this.id;

        $('#strMessageOpen').text($('#' + strMessageOpen).val());
        $('#strSubjectOpen').text($('#' + strSubjectOpen).text());
        $('#modalopenAnnouncement').openModal();       
    });
	
	$('#tableAnnouncement').on('click', '.buttonEdit', function(){
        var strMessageEdit = 'message' + this.id;
        var strSubjectEdit = 'subject' + this.id;
        
        $('#strAnnouncementIDEdit').val(this.id);
        $('#strMessageEdit').val($('#' + strMessageEdit).val());
        $('#strSubjectEdit').val($('#' + strSubjectEdit).text());
        $('#modaleditAnnouncement').openModal();       
    });
	
	$('#tableAnnouncement').on('click', '.buttonDelete', function(){
        var deleteID = this.id;
	    swal({   title: "Are you sure?",   
				  	 text: "Record will be deleted!",   
				     type: "warning",   
				     showCancelButton: true,   
				     confirmButtonColor: "#DD6B55",   
				     confirmButtonText: "Yes, delete it!",   
				     closeOnConfirm: false 
				 }, 
				 function(){
					$.ajax({

                type: "POST",
                url: "/adminannouncement/delete?id=" + deleteID,
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {

                },
                success: function(data) {
					swal("Deleted!", "Announcement has been successfully deleted!", "success");
					refreshTable();
				  },
			  	error: function(data) {
					swal("Oops", "We couldn't connect to the server!", "error");
			  	  }

            	});//ajax
			});
	});
});
</script>


<script>
$("#tableAnnouncement").DataTable({             
 "columns": [     
 {"orderable": false},
 {"orderable": false},
 {"orderable": false},
 null,
 null,
 null
 ] ,  
 "pageLength":5,
 "lengthMenu": [5,10,15,20],		
});
</script>

<!--zzzz-->
@stop