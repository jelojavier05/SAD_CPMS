@extends('client.ClientDashboard')
@section('title')
Client Homepage
@endsection


@section('content')

<!--

<div class="row">
    <div class="col l12">
        <div class="slider z-depth-1" style="height:350px">
        <ul class="slides">
        <li>
            <img src="{!! URL::asset('../Materialize/images/training.jpeg') !!}"> <!-- random image 
            <div class="caption center-align">
                <h3>Client and Personnel Management System</h3>
                <h5 class="light grey-text text-lighten-3" >Security Agency</h5>
            </div>
        </li>
        <li>
            <img src="{!! URL::asset('../Materialize/images/cpms1.jpeg') !!}" > <!-- random image 
            <div class="caption left-align">
                <h3>Client and Personnel Management System</h3>
                <h5 class="light grey-text text-lighten-3">Security Agency</h5>
            </div>
        </li>
        <li>
            <img src="{!! URL::asset('../Materialize/images/cpms.jpeg') !!}"> <!-- random image 
            <div class="caption right-align">
                <h3>Right Aligned Caption</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
        <li>
            <img src="{!! URL::asset('../Materialize/images/cpms1.jpeg') !!}"> <!-- random image 
            <div class="caption center-align">
                <h3>This is our big Tagline!</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
        </ul>
        </div>
    </div>
</div>


      <!----------------------------------------MESSAGE--------------------------------
<div class="row">
    <div class="col l12">
        <div class="col l6">
            <div class="card large z-depth-2">
                <div class="row">
                    <div class="col l12">
                        <div class="col l3">
                            <i class="material-icons left" style="font-size:6rem">email</i> 
                        </div>
                             
                        <div class="col l6">
                            <div class="row"></div>
                                <span class="black-text" style="font-size:20px;font-family:Verdana">INBOX MESSAGE</span>  
                        </div>
                    </div>
                </div>
                    <table class="striped" style="background-color:">
                        <thead>
                          <tr>
                              <th data-field="id">DATE</th>
                              <th data-field="name">MESSAGES</th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr>
                            <td>JUN 4, 2016</td>
                            <td>Deployment of Guards</td>
                          </tr>
                          <tr>
                            <td>JUL 5, 2016</td>
                            <td>Addtional Deployment of Guards</td>
                          </tr>
                          <tr>
                            <td>JUL 10, 2016</td>
                            <td>Request have been approved</td>
                          </tr>
                        </tbody>
                    </table>
      
                </div>
            </div>
            
        
        
        <!--ANNOUNCEMENTS/UPDATES--
            <div class="col l6">
                    <div class="card large z-depth-2">
                
                        
                        <div class="row">
                            <div class="col l12">
                                <div class="col l3">
                             <i class="material-icons left" style="font-size:6rem">announcement
                    </i> 
                                </div>
                             
                                <div class="col l6">
                                   <div class="row"></div>
                                <span class="black-text" style="font-size:20px;font-family:Verdana">ANNOUNCEMENT/UPDATES</span>
                                
                                </div>
                        </div>
                        </div>
      
                </div>
            </div>
    
    
    
    </div>
</div>

-->



<!--MESSAGE-->
<div class="row"></div>
<div class="row">
	<div class="col s8 push-s3">
		
		<ul class="tabs" style="">
        	<li style="color:white"class="tab col l3"><a href="#announcement" class="active">Announcements</a></li>
        </ul>	
		<!-- table message -->
		<div id="announcement">
			<div class="container-fluid grey lighten-2">	
				<table class="striped" id="announcementTable">
					<thead>
						<tr>
							<th class="grey lighten-1" style="width: 30px;"></th>
							<th class="grey lighten-1">Date</th>						
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
					<li class="collection-header"><div style="font-size:18px;" id = "strSubject">&nbsp;</div></li>
					<li class="collection-item"><p id = 'strMessage'></p>
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
	
	$.ajax({
        type: "get",
        url: "{{action('AdminAnnouncementViewController@get')}}",
        success: function(data){
        	var table = $('#announcementTable').DataTable();
        	table.clear().draw(); //clear all the row

            $.each(data, function(index, value){
            	var buttonRead = '<button class="btn blue darken-4 buttonOpen" id ="'+value.intAnnouncementID+'"><i class="material-icons">keyboard_arrow_right</i></button>';

            	table.row.add([
	                buttonRead,
	                '<h id = "date'+value.intAnnouncementID+'">' + value.dateFormatedCreated +'</h>',
	                '<h id = "subject'+value.intAnnouncementID+'">' + value.strSubject +'</h>' + 
	                '<input type = "hidden" id = "message'+value.intAnnouncementID+'" value = "'+value.strMessage+'">'
	            ]).draw();
            });
        }
    });//ajax

    $('#announcementTable').on('click', '.buttonOpen', function(){
        var strMessageOpen = 'message' + this.id;
        var strSubjectOpen = 'subject' + this.id;

        $('#strMessage').text($('#' + strMessageOpen).val());
        $('#strSubject').text($('#' + strSubjectOpen).text());
        $('#modalContent').openModal();       
    });
	
	$("#announcementTable").DataTable({
             "columns": [
			{"searchable": false},
            null,
			null
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20],
			"bFilter": false,
			
		});
</script>	





<script>
    $(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
</script>

@stop
