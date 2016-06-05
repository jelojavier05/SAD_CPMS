@extends('layout.maintenanceLayout')

@section('title')
Armed Service
@endsection

@section('content')	
    <div class="row">
        <div class="col s12">
            <div class="col s4 offset-s3">
                <div class="flow-text">
                    <h1 class="colortitle blue-text text-darken-3">Armed Service</h1>
                </div>
            </div>
            
            <div class="col s3 offset-s2">
            
                <button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large waves-effect waves-light green hide-on-med-and-down modal-trigger" href="#modalarmedserviceAdd">
                    <i class="material-icons left">add</i> ADD
                </button>
                </br></br>
            </div>
        </div>

        <!-- TABLE -->
        <div class="row">
            <div class="col s10 push-s2">
                <div class="scroll z-depth-2" style=" border-radius: 10px; margin: 5%; margin-top: -10px;">
                    <table class="highlight white" style="border-radius: 10px; margin-top: -8%;	" id = "dataTable">
                        <div class="right-align">
                            <div class="fixed-action-btn horizontal click-to-toggle">
                                <button class="btn-floating btn-large green hide-on-large-only waves-effect waves-light modal-trigger" href="#modalarmedserviceAdd">
                                    <i class="material-icons">add</i>
                                </button>
                            </div>
                        </div>
                        
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th data-field="id">ID</th>
                                <th data-field="name">Armed Service</th>
                                <th data-field="number">Description</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($armedServices as $armedService)
                                <tr>
                                    <td> 
                                        <div class="switch" style="margin-right: -80px;">
                                        <label>
                                            Deactivate
                                            @if ($armedService->boolFlag==1)
                                            <input type="checkbox" checked class = "checkboxFlag" id = "{{ $armedService->intArmedServiceID }}">
                                            @else
                                            <input type="checkbox" class = "checkboxFlag" id = "{{ $armedService->intArmedServiceID }}" >
                                            @endif
                                            <span class="lever"></span>
                                            Activate
                                        </label>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <button class="buttonUpdate btn  modal-trigger"  name="armedService" id="{{ $armedService->intArmedServiceID }}" href="#modalarmedserviceEdit" style="margin-right: -40px; margin-left:40px;">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <label for="{{ $armedService->intArmedServiceID }}"></label>
                                    </td>

                                    <td>
                                        <button class="btn red buttonDelete" id="{{ $armedService->intArmedServiceID }}">
                                            <i class="material-icons" >delete</i>
                                        </button>
                                    </td>

                                    <td id = "id{{ $armedService->intArmedServiceID }}">
                                        {{ $armedService->intArmedServiceID }}
                                    </td>
                                    
                                    <td id = "name{{ $armedService->intArmedServiceID }}">
                                        {{ $armedService->strArmedServiceName }}
                                    </td>
                                    
                                    <td id = "description{{ $armedService->intArmedServiceID }}">
                                        {{ $armedService->strDescription }}
                                    </td>	
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="row">
                <div class="col s3 push-s4">

                </div>
                </div>
            </div>
            </br></br></br></br></br>
        </div>
        <!-- TABLE -->

        <!-- Modal Armed Service ADD -->
        <div id="modalarmedserviceAdd" class="modal modal-fixed-footer" style="overflow:hidden;">
            <div class="modal-header">
                <h2>Armed Service</h2>
            </div>
            
            <div class="modal-content">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                    <div class="col s8">
                        <div class="input-field">
                            <input  id="intArmedServiceID" type="text" class="validate" name = "armedServiceID" disabled>
                            <label for="intArmedServiceID">Armed Service ID</label>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col s5">
                        <div class="input-field">
                            <input id="strArmedServiceAdd" type="text" class="validate" name = "armedServiceName" required="" aria-required="true">
                            <label for="strArmedServiceAdd">Armed Service Type</label> 
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col s5">
                        <div class="input-field">
                            <input id="strArmedServiceDescAdd" type="text" class="validate"  name = "armedServiceDescription" required="" aria-required="true">
                            <label for="strArmedServiceDescAdd">Description</label> 
                        </div>
                    </div>
                </div>
                
                <!-- Modal Button Save -->
                <div class="modal-footer">
                    <button class="btn waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnAddSave">Save
                        <i class="material-icons right">send</i>
                    </button>
                </div>
                <!-- Modal Button Save -->
            </div>
        </div>
        <!-- Modal Armed Service ADD -->

        <!-- MODAL Armed Service EDIT -->
        <div id="modalarmedserviceEdit" class="modal modal-fixed-footer" style="overflow:hidden;">
            <div class="modal-header">
                <h2>Armed Service</h2>
            </div>
            
            <div class="modal-content">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                    <div class="col s8">
                        <div class="input-field">
                            <input  id="editID" type="text" class="validate" name = "armedServiceID" readonly required="" aria-required="true" value = "test">
                            <label for="editID">Armed Service ID</label>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col s5">
                        <div class="input-field">
                            <input id="editname" type="text" class="validate" name = "armedServiceName" required="" aria-required="true" value = "test">
                            <label for="editname">Armed Service Type</label> 
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col s5">
                        <div class="input-field">
                            <input id="editdescription" type="text" class="validate"  name = "armedServiceDescription" required="" aria-required="true" value = "test">
                            <label for="editDescription">Description</label> 
                        </div>
                    </div>
                </div>

                <!-- Modal Button Save -->
                <input id = "okayCancel"type="hidden" name="okayCancelChecker" value="">
                <div class="modal-footer">
                    <button class="btn waves-effect waves-light" name="action1" style="margin-right: 30px;" id = "btnUpdate">Update
                        <i class="material-icons right">send</i>
                    </button>
                </div>
                <!-- Modal Button Save -->
            </div>
        </div>
        <!-- MODAL Armed Service EDIT -->
    </div>
@stop

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){

            $("#dataTable").DataTable({
                 "columns": [
                { "orderable": false },
                { "orderable": false },
                { "orderable": false },
                null,
                null,
                null
                ] ,  
                "pageLength":5,
            });

            $("#btnAddSave").click(function(){
              if ($('#strArmedServiceAdd').val().trim() && $('#strArmedServiceDescAdd').val().trim()){
                $.ajax({

                    type: "POST",
                    url: "{{action('ArmedServiceController@addArmedService')}}",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        armedServiceName: $('#strArmedServiceAdd').val(),
                        armedServiceDescription: $('#strArmedServiceDescAdd').val(),
                    },
                    success: function(data){
                        var toastContent = $('<span>Record Added.</span>');
                        Materialize.toast(toastContent, 1500,'green', 'edit');
                        window.location.href = "{{action('ArmedServiceController@index')}}";
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

            });//button add clicked

            $("#btnUpdate").click(function(){
                if ($('#editID').val().trim() && $('#editname').val().trim()){
                $.ajax({

                    type: "POST",
                    url: "{{action('ArmedServiceController@updateArmedService')}}",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        armedServiceID: $('#editID').val(),
                        armedServiceName: $('#editname').val(),
                        armedServiceDescription: $('#editdescription').val(),
                    },
                    success: function(data){
                        var toastContent = $('<span>Record Updated.</span>');
                        Materialize.toast(toastContent, 1500,'green', 'edit');
                        window.location.href = "{{action('ArmedServiceController@index')}}";
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

            });//button add clicked

            $(".buttonDelete").click(function(){
                if(confirm('Are you sure you want to delete the record?')){

                    $.ajax({
                        
                        type: "POST",
                        url: "{{action('ArmedServiceController@deleteArmedService')}}",
                        beforeSend: function (xhr) {
                            var token = $('meta[name="csrf_token"]').attr('content');

                            if (token) {
                                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                            }
                        },
                        data: {
                            armedServiceID: this.id
                        },
                        success: function(data){
                            var toastContent = $('<span>Record Deleted.</span>');
                            Materialize.toast(toastContent, 1500, 'edit');
                            window.location.href = "{{action('ArmedServiceController@index')}}";
                        },
                        error: function(data){
                            var toastContent = $('<span>Error Occur. </span>');
                            Materialize.toast(toastContent, 1500, 'edit');
                        }

                    });//ajax
                }
            });//button delete

            $(".buttonUpdate").click(function(){

                var itemID = "id" + this.id;
                var itemName = "name" + this.id;
                var itemDescription = "description" + this.id;

                document.getElementById('editID').value = $("#"+itemID).html();
                document.getElementById('editname').value = $("#"+itemName).html();
                document.getElementById('editdescription').value = $("#"+itemDescription).html();

            });//button update

            $(".checkboxFlag").click(function(){

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
                    url: "{{action('ArmedServiceController@flagArmedService')}}",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        armedServiceID: this.id,
                        flag: flag
                    },
                    success: function(data){

                    },
                    error: function(data){
                        var toastContent = $('<span>Error Occur. </span>');
                        Materialize.toast(toastContent, 1500, 'edit');

                    }

                });//ajax

            });//checkbox clicked

        });//document ready
    </script>
@stop