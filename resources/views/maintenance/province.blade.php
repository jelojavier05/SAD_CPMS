@extends('layout.maintenanceLayout')

@section('title')
Province
@endsection

@section('content')

<div class="row">
   <div class="row">
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>  
        <div class="row"></div>  
    <div class="row">
 
     <div class="col s5 push-s3" style="margin-left:-2%">
    
                   <h2 class="blue-text" style="font-family:Myriad Pro;margin-top:9.2%">Province</h2>
                </div>
    
    </div>
   
    </div>
    <div class="col s12 push-s1" style="margin-top:-5%">
        <div class="container white lighten-2 z-depth-2">
<!--            <div class="row">-->
               

                <div class="col s3 offset-s9">
                <button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href= "#modalprovinceAdd">
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
                                <th>Name</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($provinces as $province)
                                <tr>
                                    <td> 
                                        <div class="switch" style="margin-right: -80px;">
                                            <label>
                                                @if ($province->boolFlag==1)
                                                    <input type="checkbox" checked class = "checkboxFlag" id = "{{ $province->intProvinceID }}">
                                                @else
                                                    <input type="checkbox" class = "checkboxFlag" id = "{{ $province->intProvinceID }}" >
                                                @endif
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </td>

                                    <td>
                                        <button class="buttonUpdate btn" id="{{ $province->intProvinceID }}" href="#modalprovinceEdit">
                                            <i class="material-icons">edit</i>
                                        </button>

                                        <label for="{{ $province->intProvinceID }}"></label>
                                    </td>

                                    <td>
                                        <button class="buttonDelete btn red" id="{{ $province->intProvinceID }}" >
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>

                                    <td id = "id{{ $province->intProvinceID }}">{{ $province->intProvinceID }}</td>

                                    <td id = "name{{ $province->intProvinceID }}">{{ $province->strProvinceName }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modalprovinceAdd" class="modal modal-fixed-footer" style="overflow:hidden; width:500px !important; height:330px !important;">
    <div class="modal-header"><h2>Province</h2></div>
    
    <div class="modal-content">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
       
        
        <div class="row">
            <div class="col s10 push-s1">
                <div class="input-field">
                    <input id="addProvinceName" type="text" class="validate" required="" aria-required="true">
                    <label for="">Province</label> 
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal-footer" style="background-color:#01579b !important;">
        <button class="btn waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnAddSave">Save
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>

<div id="modalprovinceEdit" class="modal modal-fixed-footer" style="overflow:hidden; width:500px !important; height:420px !important;">
    <div class="modal-header"><h2>Province</h2></div>
    
    <div class="modal-content">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <div class="row">
            <div class="col s3 push-s1">
                <div class="input-field">
                    <input  id="editID" type="text" class="validate blue-text center-align" readonly required="" aria-required="true" value = " ">
                    <label for="editID">Province ID</label>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col s10 push-s1">
                <div class="input-field">
                    <input id="editname" type="text" class="validate" required="" aria-required="true" value = " ">
                    <label for="editname">Province</label> 
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal-footer" style="background-color:#01579b !important;">
        <button class="btn waves-effect waves-light" name="action1" style="margin-right: 30px;" id = "btnUpdate">Update
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>

<input type="hidden" name="idDelete" id = "deleteID">
@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		
		$("#dataTable").DataTable({
             "columns": [
            {"searchable": false},
			{"searchable": false},
			{"searchable": false},
            null,
            null
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
		});
        
        $('#btnAddSave').click(function(){
            if ($('#addProvinceName').val().trim()){
                $.ajax({
                    type: "POST",
                    url: "{{action('ProvinceController@create')}}",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        strProvinceName: $('#addProvinceName').val(),
                    },
                    success: function(data){
                        refreshTable();
                        $('#modalprovinceAdd').closeModal();
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
                    url: "{{action('ProvinceController@update')}}",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        intProvinceID: $('#editID').val(),
                        strProvinceName: $('#editname').val(),
                    },
                    success: function(data){
                        refreshTable();
                        $('#modalprovinceEdit').closeModal();
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
            $('#modalprovinceEdit').openModal();
            var itemID = "id" + this.id;
            var itemName = "name" + this.id;

            document.getElementById('editID').value = $("#"+itemID).html();
            document.getElementById('editname').value = $("#"+itemName).html();
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
                    url: "{{action('ProvinceController@delete')}}",
                    beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');
                        if (token) {
                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        intProvinceID: deleteID.value
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
                url: "{{action('ProvinceController@flag')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    intProvinceID: this.id,
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
                url: '{{ URL::to("/maintenance/province/get") }}', 
                data: { get_param: 'value' },
                dataType: 'json',
                success: function (data) { 

                    $.each(data, function(index, element) {
                        var flag = data[index].boolFlag;

                        if (flag){
                            var checkbox = '<div class="switch" style="margin-right: -80px;"><label><input type="checkbox" checked class = "checkboxFlag" id = "'+data[index].intProvinceID+'"><span class="lever"></span></label></div>';
                        }else{
                            var checkbox = '<div class="switch" style="margin-right: -80px;"><label><input type="checkbox" class = "checkboxFlag" id = "'+data[index].intProvinceID+'"><span class="lever"></span></label></div>';
                        }

                        dataTable.row.add([
                            checkbox,
                            '<button class="buttonUpdate btn" name="" id="' +data[index].intProvinceID+'" ><i class="material-icons">edit</i></button>',
                            '<button class="buttonDelete btn red" id="'+ data[index].intProvinceID +'"><i class="material-icons">delete</i></button>',
                            '<h id = "id' +data[index].intProvinceID + '">' + data[index].intProvinceID +'</h>',
                            '<h id = "name' +data[index].intProvinceID + '">' + data[index].strProvinceName +'</h>']).draw();
                    });//foreach

                    document.getElementById('addProvinceName').value = "";

                },
                error: function(data){
                    var toastContent = $('<span>Error Occur. </span>');
                    Materialize.toast(toastContent, 1500,'red', 'edit');
                     console.log(data);
                }
            });//ajax

        }//refresh table
        
    }); //button delete in table
    
</script>
@stop