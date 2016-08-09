@extends('layout.maintenanceLayout')

@section('title')
Announcement
@endsection

@section('content')

<div class="row" style="margin-top:-30px;">
  <div class="row"> 
        
    <div class="row">
 
     <div class="col s5 pull-s2" style="margin-left:-2%">
    
                   <h3 class="blue-text" style="font-family:Myriad Pro;margin-top:9.2%">Announcements</h3>
                </div>
    
    </div>
   
    </div>
    <div class="col s12 push-s1" style="margin-top:-4%">
        <div class="container white lighten-2 z-depth-2">
<!--            <div class="row">-->
               

                <div class="col s6 offset-s8">
                <button style="margin-top: 30px;" id="" class=" z-depth-2 btn-large blue modal-trigger" href="#modalcreateAnnouncement">
                     Make an Announcement
                </button>
            </div>
            
            <div class="row">
                <div class="col s12" style="margin-top:-5px;">
                    <table class="striped white" style="border-radius:10px;" id="dataTable">
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
                            
                                <tr>
                                    <td> 
                                        <button class="btn blue darken-4 buttonOpen"><i class="material-icons">keyboard_arrow_right</i></button>
                                    </td>

                                    <td>
                                        <button class="btn col s12 buttonEdit" name="" id="">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <label for=""></label>
                                    </td>

                                    <td>
                                        <button class="buttonDelete btn red col s12" id="" >
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                    <td id = "">1</td>
                                    <td id = "" >01/01/2016</td>                             
                                    <td id = "">TEST 1</td>
                                </tr>
                            
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
					 <textarea placeholder=" " class="materialize-textarea" id="strMessageAdd" type="text" length="480"></textarea>
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
					<input  id="" type="text" class="validate"  name = "" readonly required="" aria-required="true" value = "1">
					<label for="">ID</label> 

				</div>
			</div>
			
			
			<div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
				 <div class="row"></div>  
				 <div class="input-field col s8">
					 <i class="material-icons prefix" style="font-size:35px;">announcement</i>
					 <input placeholder=" " id="" type="text" class="validate" name = "" required="" aria-required="true" value="TEST 1">
					 <label for="">Subject</label> 
					 
				 </div>
			</div>
			
			
			<div class="col s10 push-s1" >      
                                            
				 <div class="row"></div>  
				 <div class="input-field col s12">
					 <i class="material-icons prefix" style="font-size:35px;">announcement</i>
					 <textarea  class="materialize-textarea" id="" type="text" length="480">The practice of writing paragraphs is essential to good writing. Paragraphs help to break up large chunks of text and makes the content easier for readers to digest. They guide the reader through your argument by focusing on one main idea or goal. However, knowing how to write a good, well-structured paragraph can be little tricky. Read the guidelines below and learn how to take your paragraph writing skills from good to great!</textarea>
					 <label for="input_text">Content</label> 
					 
				 </div>
			</div>
			
			
			
		</div>
	</div>
		
	<div class="modal-footer ci modal-close" style="background-color: #00293C;">
		<button class="btn large waves-effect waves-light" name="action" style="margin-right: 30px;" id = "">Save
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
	
<!--Modal read announcement end-->
	


@stop

@section('script')

<script>
$(document).ready(function(){
	$('#btnAdd').click(function(){
		var strSubject = $('#strSubjectAdd').val().trim();
		var strMessage = $('#strMessageAdd').val().trim();
		if (checkInput(strSubject, strMessage)){
			sendData(strSubject, strMessage);
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

	function sendData(strSubject, strMessage){
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
	        success: function(data)

	        },
	        error: function(data){
	        }
	    });//ajax
	}

	$('#dataTable').on('click', '.buttonOpen', function(){
        $('#modalopenAnnouncement').openModal();       
    });
	
	$('#dataTable').on('click', '.buttonEdit', function(){
        $('#modaleditAnnouncement').openModal();       
    });
	
	$('#dataTable').on('click', '.buttonDelete', function(){
            
	    var deleteID =this.id;  
	    swal({title: "Are you sure?",   
             text: "Record will be deleted!",   
             type: "warning",   
             showCancelButton: true,   
             confirmButtonColor: "#DD6B55",   
             confirmButtonText: "Yes, delete it!",   
             closeOnConfirm: false 	 
	    });
	});
});
</script>


<script>
$("#dataTable").DataTable({             
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