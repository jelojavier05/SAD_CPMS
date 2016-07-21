@extends('layout.maintenanceLayout')

@section('title')
City
@endsection

@section('content')

<div class="row" style="margin-top:-30px;">
  <div class="row"> 
        
    <div class="row">
 
     <div class="col s5 push-s3" style="margin-left:-2%">
    
                   <h3 class="blue-text" style="font-family:Myriad Pro;margin-top:9.2%">City</h3>
                </div>
    
    </div>
   
    </div>
    <div class="col s12 push-s1" style="margin-top:-4%">
        <div class="container white lighten-2 z-depth-2">
<!--            <div class="row">-->
               

                <div class="col s3 offset-s9">
                <button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="#modalcityAdd">
                    <i class="material-icons left">add</i> ADD
                </button>
            </div>
            
            <div class="row">
                <div class="col s12" style="margin-top:-20px;">
                    <table class="highlight white" style="border-radius:10px;" id="dataTable">
                        <thead>
                            <tr>
                                <th style="width:50px;"></th>
                                <th style="width:50px;"></th>
                                <th style="width:50px;"></th>
                                <th>ID</th>
                                <th>Province</th>
                                <th>City</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($cities as $city)
                                <tr>
                                    <td> 
                                        <div class="switch" style="margin-right: -80px;">
                                        <label>
                                            @if($city->boolFlag == 1)
                                                <input type="checkbox" checked class = "checkboxFlag" id = "{{$city->intCityID}}">
                                            @else
                                                <input type="checkbox" class = "checkboxFlag" id = "{{$city->intCityID}}">
                                            @endif
                                            <span class="lever"></span>
                                        </label>
                                        </div>
                                    </td>

                                    <td>
                                        <button class="buttonUpdate btn col s12" name="" id="{{$city->intCityID}}">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <label for=""></label>
                                    </td>

                                    <td>
                                        <button class="buttonDelete btn red col s12" id="{{$city->intCityID}}" >
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                    <td id = "id{{$city->intCityID}}">{{$city->intCityID}}</td>
                                    <td id = "province{{$city->intCityID}}" value = "{{$city->intProvinceID}}">{{$city->Province->strProvinceName}}</td>
                                    <input type="hidden" id = "provinceID{{$city->intCityID}}" value = "{{$city->intProvinceID}}" >
                                    <td id = "name{{$city->intCityID}}">{{$city->strCityName}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modalcityAdd" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:100px !important;  max-height:100% !important; height:300px !important; border-radius:10px;">
        
       	<div class="modal-header">
                <div class="h">
                    <h3><center>City</center></h3>  
				</div>

        </div>
         
        
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="row">
                                               
                                  <div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>  
                                        <div class="input-field col s12">
                            				<select  class="browser-default" id = "addSelectProvince">
												<option disabled selected value = "0">Choose Province</option>
												@foreach($provinces as $province)
													<option id = "{{$province->intProvinceID}}" value = "{{$province->intProvinceID}}">{{$province->strProvinceName}}</option>
												@endforeach
											</select> 

                                        </div>
                                  </div>
						
								  <div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>
									  	<div class="row"></div>
                                        <div class="input-field col s12">
											<i class="mdi-social-domain prefix" style="font-size:35px;"></i>
                            				<input id="addCityName" type="text" class="validate" required="" aria-required="true">
                                    		<label for="">City</label>

                                        </div>
                                  </div>
                            
                        </div>
						
    		</div>
    
   <div class="modal-footer" style="background-color: #00293C;">
            
                     <button class="btn large waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnAddSave">Save
                       <i class="material-icons right">send</i>
                     </button>
        </div>
</div>

<div id="modalcityEdit" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:100px !important;  max-height:100% !important; height:360px !important; border-radius:10px;">
        
       	<div class="modal-header">
                <div class="h">
                    <h3><center>City</center></h3>  
				</div>

        </div>
         
        
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="row">
                                               
                                <div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>  
                                        <div class="input-field col s5">
                            				<input  id="editID" type="text" class="validate blue-text center-align" name = "cityID" readonly required="" aria-required="true" value = "1">
											<label for="editID">City ID</label>

                                        </div>
                                  </div>  
						
								<div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>  
                                        <div class="input-field col s12">
                            				<select  class="browser-default" id = "editProvince" >
												<option disabled>Choose Province</option>
												@foreach($provinces as $province)
													<option id = "{{$province->intProvinceID}}" value = "{{$province->intProvinceID}}">{{$province->strProvinceName}}</option>
												@endforeach
											</select> 

                                        </div>
                                  </div>
						
								  <div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>
									  	<div class="row"></div>
                                        <div class="input-field col s12">
											<i class="mdi-social-domain prefix" style="font-size:35px;"></i>
                            				<input id="editname" type="text" class="validate" name = "city" required="" aria-required="true" value = "Manila City">
                    <label for="editname">City</label>

                                        </div>
                                  </div>
                            
                        </div>
						
    		</div>
    
   <div class="modal-footer" style="background-color: #00293C;">
        <button class="btn waves-effect waves-light" name="action1" style="margin-right: 30px;" id = "btnUpdate">Update
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>

<input type="hidden" id = "deleteID">
@stop

@section('script')
<script type="text/javascript">
	
    $(document).ready(function(){
        var arrProvince;
        $.ajax({ 
            type: 'GET', 
            url: '{{ URL::to("/maintenance/province/get") }}', 
            data: { get_param: 'value' },
            dataType: 'json',
            success: function (data) { 
                arrProvince = data;                
            },
            error: function(data){

            }
        });//ajax       
        

        $("#dataTable").DataTable({
             "columns": [
            {"searchable": false},
			{"searchable": false},
			{"searchable": false},
            null,
            null,
			null
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20],
			
		});
        
        $('#btnAddSave').click(function(){
            if ($('#addCityName').val().trim() && $('#addSelectProvince').val().trim()){
                $.ajax({
                    type: "POST",
                    url: "{{action('CityController@create')}}",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        strCityName: $('#addCityName').val(),
                        intProvinceID: $('#addSelectProvince').val()
                    },
                    success: function(data){
                        refreshTable();
                        $('#addCityName').val("");
                        $('#addSelectProvince').val('0');
                        $('#modalcityAdd').closeModal();
                        swal("Success!", "Record has been Added!", "success");

                    },
                    error: function(data){
                        var toastContent = $('<span>Error Occured. </span>');
                        Materialize.toast(toastContent, 1500,'red', 'edit');

                    }

                });//ajax

                 }else{
                    var toastContent = $('<span>Please Check Your Input. </span>');
                    Materialize.toast(toastContent, 1500,'red', 'edit');
                }
        }); //button add clicked      
        
        $("#btnUpdate").click(function(){
            if ($('#editID').val().trim() && $('#editname').val().trim()){
                $.ajax({

                    type: "POST",
                    url: "{{action('CityController@update')}}",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        intCityID: $('#editID').val(),
                        strCityName: $('#editname').val(),
                        intProvinceID: $('#editProvince').val()
                    },
                    success: function(data){
                        refreshTable();
                        $('#modalcityEdit').closeModal();
                        swal("Success!", "Record has been Updated!", "success");
                    },
                        error: function(data){
                        var toastContent = $('<span>Error Occured. </span>');
                        Materialize.toast(toastContent, 1500,'red', 'edit');
                    }
                });//ajax
            }else{
                var toastContent = $('<span>Please Check Your Input. </span>');
                Materialize.toast(toastContent, 1500,'red', 'edit');
            }

        });//button update clicked
        
        $('#dataTable').on('click', '.buttonUpdate', function(){
            $('#modalcityEdit').openModal();
            var itemID = "id" + this.id;
            var itemName = "name" + this.id;
            var itemProvince = "provinceID" + this.id;
            
            document.getElementById('editID').value = $("#"+itemID).html();
            document.getElementById('editname').value = $("#"+itemName).html();
            $('#editProvince').val($('#'+itemProvince).val());

        });  //button update in table
        
        $('#dataTable').on('click', '.buttonDelete', function(){
            document.getElementById('deleteID').value =this.id;  

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
                    url: "{{action('CityController@delete')}}",
                    beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');
                        if (token) {
                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        intCityID: deleteID.value
                    },
                    success: function(data) {
                        swal("Deleted!", "Record has been successfully deleted!", "success");
                        refreshTable();
                    },
                    error: function(data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                        console.log(data);
                    }
                });//ajax
            });
	   });
        
        $('#dataTable').on('click', '.checkboxFlag', function(){
            var $this = $(this);
            var flag;
            // $this will contain a reference to the checkbox   
            if ($this.is(':checked')) {
                flag = 1;
            } else {
                flag = 0;
            }

            $.ajax({
                type: "POST",
                url: "{{action('CityController@flag')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    intCityID: this.id,
                    flag: flag
                },
                success: function(data){
                    var toastContent = $('<span>Status Changed.</span>');
                    Materialize.toast(toastContent, 1500,'green', 'edit');
                },
                error: function(data){
                    var toastContent = $('<span>Error Occur. </span>');
                    Materialize.toast(toastContent, 1500, 'edit');
                }
            });//ajax
        });
        
        function refreshTable(){
            var dataTable = $('#dataTable').DataTable();
            dataTable.clear().draw(); //clear all the row
            $.ajax({ 
                type: 'GET', 
                url: '{{ URL::to("/maintenance/city/get") }}', 
                data: { get_param: 'value' },
                dataType: 'json',
                success: function (data) { 
                    console.log(data);
                    $.each(data, function(index, element) {
                        $('#provinceID' + data[index].intCityID).remove();
                        var flag = data[index].boolFlag;
                        provinceName = getProvince(data[index].intProvinceID);
                        if (flag){
                            var checkbox = '<div class="switch" style="margin-right: -80px;"><label><input type="checkbox" checked class = "checkboxFlag" id = "'+data[index].intCityID+'"><span class="lever"></span></label></div>';
                        }else{
                            var checkbox = '<div class="switch" style="margin-right: -80px;"><label><input type="checkbox" class = "checkboxFlag" id = "'+data[index].intCityID+'"><span class="lever"></span></label></div>';
                        }
                        
                        dataTable.row.add([
                            checkbox,
                            '<button class="buttonUpdate btn" name="" id="' +data[index].intCityID+'" ><i class="material-icons">edit</i></button>',
                            '<button class="buttonDelete btn red" id="'+ data[index].intCityID +'"><i class="material-icons">delete</i></button>',
                            '<h id = "id' +data[index].intCityID + '">' + data[index].intCityID +'</h>',
                            '<h id = "province' +data[index].intCityID + '" value = "' + data[index].intProvinceID+'">' + provinceName +'</h>',
                            '<h id = "name' +data[index].intCityID + '">' + data[index].strCityName +'</h>' ]).draw();
                        
                        $('<input>').attr({
                            type: 'hidden',
                            id: 'provinceID' + data[index].intCityID ,
                            value: data[index].intProvinceID
                        }).appendTo('#dataTable');
                    });//foreach

                },
                error: function(data){
                    var toastContent = $('<span>Error Occur. </span>');
                    Materialize.toast(toastContent, 1500,'red', 'edit');
                     console.log(data);
                }
            });//ajax

        }//refresh table
        
        function getProvince(provinceID){
            var provinceName;
            $.each(arrProvince, function(index, element) {
                if (provinceID == arrProvince[index].intProvinceID){
                    provinceName = arrProvince[index].strProvinceName;
                    return false;
                }
            });
            return provinceName;
        }
	});
</script>
@stop