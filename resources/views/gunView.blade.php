@extends('layout.maintenanceLayout')

@section('title')
Gun
@endsection

@section('content')

<div class="row">	
    
    <div class="col s12 push-s1" id="Active" >
        <div class="row" id="activeGuns">
            <div class="col s8">
                <div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:25px;">
                    <div class="col s6 push-s1">
                        <h4 class="blue-text">Guns</h4>
                    </div>
                    
                    <div class="row">
                        <div class="col s11" style="margin: -15px 25px 25px 25px;">
                            <table class="highlight white" style="border-radius:10px;" id="dataTable">
                                <thead>
                                    <tr>
                                        <th style="width:50px;"></th>
                                        <th style="width:50px;"></th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Type of Gun</th>
                                        <th style="width:50px;"></th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <td>
                                            <button class="buttonUpdate btn col s12"  name="" id="" >
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <label for=""></label>
                                        </td>
                                        
                                        <td>
                                            <button class="buttonDelete btn red col s12" id="">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </td>
                                        
                                        <td id = "">1</td>
                                        <td id = "">Arctic Warfare Magnum</td>
                                        <td id = "">Sniper</td>
                                        <td>
                                            <button id="detaillist" class="btn blue col s12" onclick="Materialize.showStaggeredList('#collectionActive')" >
                                            MORE
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col s4 pull-s1" style="margin-top:25px;">	
                <ul class="collection with-header" id="collectionActive">
                    <li class="collection-header" style="opacity:0;"><h5 style="font-weight:bold;">Details</h5></li>
                    
                    <div style="visibility:hidden;" id="detailcontainer">
                        <li class="collection-item" style="font-weight:bold; opacity:0;">Manufacturer:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;Remington</div>
                        </li>
                        <li class="collection-item" style="font-weight:bold; opacity:0;">Serial Number:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;2013-01234-SJ-0</div>
                        </li>
                        <li class="collection-header" style="font-weight:bold; opacity:0;"><h5 style="font-weight:bold;">License</h5>
                        </li>
                        <li class="collection-item" style="font-weight:bold; opacity:0;">License Number:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;123456789</div>
                        </li>
                        <li class="collection-item" style="font-weight:bold; opacity:0;">Date Issued:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;11/29/2015</div>
                        </li>
                        <li class="collection-item" style="font-weight:bold; opacity:0;">Date Expired:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;11/29/2016</div>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </div>

    
    
    
</div>

@stop
	
@section('script')


<script type="text/javascript">
	$("#dataTable").DataTable({
             "columns": [
            { "orderable": false },
            { "orderable": false },
            null,
            null,
			null,
			{ "orderable": false }
            ] ,  
            "pageLength":5,
			"lengthMenu": [5,10,15,20]
        });
	
	$('#detaillist').click(function() {
			$('#detailcontainer').css({
				'visibility': 'visible',
				'overflow': 'scroll',
				'overflow-x': 'hidden',
				'height': '400px'
			});
		});
</script>

<script>
	$(document).ready(function(){
			$('ul.tabs').tabs();
		  });
</script>
@stop