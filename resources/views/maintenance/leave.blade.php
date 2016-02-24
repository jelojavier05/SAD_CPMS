@extends('layout.maintenanceLayout')

@section('content')
<!-- ADD EDIT DELETE BUTTON -->	
<div class="row">
    	<div class="col s12">	
			<div class="col s3 offset-s3">
				<a class="btn-large waves-effect waves-light green hide-on-small-only modal-trigger" href="#modalleaveAdd"><i class="material-icons">add</i> ADD</a></br></br>
			</div>
			<div class="col s3">
				<a class="btn-large waves-effect waves-light blue hide-on-small-only modal-trigger" href="#modalleaveEdit"><i class="material-icons">settings</i> EDIT</a></br></br>
			</div>
			<div class="col s3">
				<a class="btn-large waves-effect waves-light red hide-on-small-only"><i class="material-icons">delete</i> DELETE</a>
			</div>
		</div>
			
  			
		
    </div>
<!-- TABLE -->
    <div class="row">
        <div class="container">
        	<div class="col l12 offset-l1">
            	<table class="highlight white" style="margin-top: -30px;">
                	<div class="right-align">
                 		<div class="fixed-action-btn horizontal click-to-toggle">
    						<a class="btn-floating btn-large red hide-on-large-only">
      							<i class="large mdi-navigation-menu"></i>
    						</a>
    							<ul>
      						<li><a class="btn-floating green modal-trigger hide-on-large-only" href="#modalleaveAdd"><i class="material-icons">add</i></a></li>
      						<li><a class="btn-floating blue modal-trigger hide-on-large-only" href="#modalleaveEdit"><i class="material-icons">settings</i></a></li>
      						<li><a class="btn-floating red darken-4 hide-on-large-only"><i class="material-icons">delete</i></a></li>
      
    							</ul>
  						</div>
                	</div>
           	<thead>
                    <tr>
              			<th data-field="id">ID</th>
              			<th data-field="name">Leave Name</th>
						<th data-field="number">Default No.</th>
                    </tr>
			</thead>
            
           <tbody>
          			<tr>
            			<td>Alvin</td>
            			<td>Eclair</td>
            			<td>$0.87</td>
            			<td><input class="with-gap" name="group1" type="radio" id="test3" />
      					<label for="test3">Green</label>
          			</tr>
          			
			   		<tr>
            			<td>Alan</td>
            			<td>Jellybean</td>
            			<td>$3.76</td>
          			</tr>
          			<tr>
						<td>Jonathan</td>
						<td>Lollipop</td>
						<td>$7.00</td>
          			</tr>
			   		<tr>
						<td>Jonathan</td>
						<td>Lollipop</td>
						<td>$7.00</td>
          			</tr>
			   		<tr>
						<td>Jonathan</td>
						<td>Lollipop</td>
						<td>$7.00</td>
          			</tr>
			   		<tr>
						<td>Jonathan</td>
						<td>Lollipop</td>
						<td>$7.00</td>
          			</tr>
			   		<tr>
						<td>Jonathan</td>
						<td>Lollipop</td>
						<td>$7.00</td>
          			</tr>
			   		<tr>
						<td>Jonathan</td>
						<td>Lollipop</td>
						<td>$7.00</td>
          			</tr>
			   		<tr>
						<td>Jonathan</td>
						<td>Lollipop</td>
						<td>$7.00</td>
          			</tr>
			   		<tr>
						<td>Jonathan</td>
						<td>Lollipop</td>
						<td>$7.00</td>
          			</tr>
			   
			   		
               
      
          
        </tbody>
      			</table>
        	</div>
			</br></br></br></br></br>
			<!-- Pagination -->
			<center>
				<ul class="pagination">
					<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
					<li class="active"><a href="#!">1</a></li>
					<li class="waves-effect"><a href="#!">2</a></li>
					<li class="waves-effect"><a href="#!">3</a></li>
					<li class="waves-effect"><a href="#!">4</a></li>
					<li class="waves-effect"><a href="#!">5</a></li>
					<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
				</ul>
			</center>
			
		</div> 
    </div>

<!-- Modal Leave ADD -->

<div id="modalleaveAdd" class="modal">
        <div class="modal-header"><h2>Leave</h2></div>
        	<div class="modal-content">
				<form>
					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="intLeaveID" type="text" class="validate" disabled>
									<label for="intLeaveID">Leave ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="strLeaveType" type="text" class="validate" required="" aria-required="true">
									<label for="strLeaveType">Leave Type</label> 
							</div>
						</div>
					</div>
						<div class="row">
							<div class="col s5">
								<div class="input-field">
									<input id="intDefaultLeave" type="text" class="validate" required="" aria-required="true">
										<label for="intDefaultLeave">DefaultLeave</label> 
								</div>
							</div>
						</div>
				
      
	<!-- Modal Button Save -->
				
		<div class="modal-footer">
			
			<button class="btn waves-effect waves-light modal-close red" style="margin-right: 30px;">Cancel
    			<i class="material-icons right">stop</i>
  			</button>
			<button class="btn waves-effect waves-light" type="submit" name="action" style="margin-right: 30px;">Save
    			<i class="material-icons right">send</i>
  			</button>
    	</div>
    		</div>
				</form>
</div>
<!-- Modal Leave Edit -->
<div id="modalleaveEdit" class="modal">
	<div class="modal-header"><h2>Leave</h2></div>
        	<div class="modal-content">
				<form>
					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="intLeaveID" type="text" class="validate" disabled required="" aria-required="true">
									<label for="intLeaveID">Leave ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="strLeaveType" type="text" class="validate" required="" aria-required="true">
									<label for="strLeaveType">Leave Type</label> 
							</div>
						</div>
					</div>
						<div class="row">
							<div class="col s5">
								<div class="input-field">
									<input id="intDefaultLeave" type="text" class="validate" required="" aria-required="true">
										<label for="intDefaultLeave">DefaultLeave</label> 
								</div>
							</div>
					</div>
      
	<!-- Modal Button Save -->
				
		<div class="modal-footer">
     		<button class="btn waves-effect waves-light modal-close red" style="margin-right: 30px;">Cancel
    			<i class="material-icons right">stop</i>
  			</button>
			<button class="btn waves-effect waves-light" type="submit" name="action" style="margin-right: 30px;">Save
    			<i class="material-icons right">send</i>
  			</button>
    	</div>
    		</div>
				</form>
</div>
</div>

	
@stop