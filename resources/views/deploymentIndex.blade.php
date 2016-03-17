@extends('layout.maintenanceLayout')

@section('title')
Deployment
@endsection

@section('content')

 <div class="row">
        <div class="col s3 push-s3">
            <h1 class="colortitle blue-text text-darken-3">Client</h1>
        </div>
    
       
    </div>
        <div class="row">
            <div class="col s8 push-s3">
             <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#test1">Guard</a></li>
        <li class="tab col s3"><a href="#test2">Equipment</a></li>
        </ul>
            </div>  
           
        </div>
    <div class="row" id="test1">
    <div class="row">
        <div class="col s8 push-s3">
            <table class="white z-depth-3" id="datatable" style="border-radius:10px;">
                <thead>
                    <tr>
                        <th></th>
						<th>ID</th>
                        <th>Name</th>
                        <th>No. of Guards</th>
                    
                    </tr>
                    
                </thead>
                
                <tbody>
                    <tr>
                        <td><input class="with-gap" name="selectClient" type="radio" id="test5" checked/><label for="test5"></label></td>
						<td>1</td>
                        <td>Polytechnic University of the Philippines</td>
                        <td>23</td>
                    </tr>
                    
                    <tr>
						<td><input class="with-gap" name="selectClient" type="radio" id="test6"  /><label for="test6"></label></td>
						<td>2</td>
                        <td>Ateneo De Manila</td>
                        <td>15</td>
                    </tr>
                    
                    <tr>
						<td><input class="with-gap" name="selectClient" type="radio" id="test3" /><label for="test3"></label></td>
						<td>3</td>
                        <td>SWA Sta Lucia Village</td>
                        <td>19</td>
                    </tr>
                    
                    <tr>
						<td><input class="with-gap" name="selectClient" type="radio" id="test4" /><label for="test4"></label></td>
						<td>4</td>
                        <td>Ferdinand Compound</td>
                        <td>12</td>
                    </tr>
                </tbody>
    
            </table>
        </div>
    </div>
    

    
<div class='row'>
    <div class="col s3 push-s3">
        <h4 class="colortitle blue-text text-darken-3">Security Guard (Current)</h4>
    </div>
    <div class="col s3 push-s4">
        <h4 class="colortitle blue-text text-darken-3">Security Guard (Available)</h4>
    </div>
</div>
    
    
<div class="row">
    <div class="col s3 push-s3">
        <table class="white z-depth-3" id="datatable" style="border-radius:10px;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                    
                    </tr>
                    
                </thead>
                
                <tbody>
                    <tr>
                        <td>4</td>
                        <td>Rustom Cister</td>
                        <td>M</td>
                    </tr>
                    
                    <tr>
                        <td>8</td>
                        <td>Jane Bonagua</td>
                        <td>F</td>
                    </tr>
                    
                    <tr>
                        <td>9</td>
                        <td>Raymundo Cezar</td>
                        <td>M</td>
                    </tr>
                    
                    <tr>
                        <td>10</td>
                        <td>Geroldin Forte</td>
                        <td>F</td>
                    </tr>
                </tbody>
    
            </table>
    </div>
    
    <div class="col s4 push-s4">
        <table class="white z-depth-3" id="datatable" style="border-radius:10px;">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                    
                    </tr>
                    
                </thead>
                
                <tbody>
                    <tr>
                        <td><button class="buttonUpdate btn" href="#"><i class="material-icons">add</i></button>
            			 </td>
                        <td>18</td>
                        <td>Darren Protacio</td>
                        <td>M</td>
                    </tr>
                    
                    <tr>
                         <td><button class="buttonUpdate btn " href="#"><i class="material-icons">add</i></button>
            			 </td>
                        <td>14</td>
                        <td>Ferdinand Perlin</td>
                        <td>M</td>
                    </tr>
                    
                    <tr>
                         <td><button class="buttonUpdate btn" href="#"><i class="material-icons">add</i></button>
            			 </td>
                        <td>11</td>
                        <td>Sonia Gundo</td>
                        <td>F</td>
                    </tr>
                    
                    <tr>
                         <td><button class="buttonUpdate btn" href="#" ><i class="material-icons">add</i></button>
            			 </td>
                        <td>9</td>
                        <td>Jayson Tukmal</td>
                        <td>M</td>
                    </tr>
                </tbody>
    
            </table>
    </div>
</div>
    <div class="row">
    <div class='col s4 push-s8'>
    <button class="btn waves-effect waves-light z-depth-2" type="submit" name="action" style="margin-right: 30px;">Save
    			<i class="material-icons right">send</i>
    </button>
    </div>
    </div>
        </div>
    
    
    
    <div class="row" id="test2">
    <div class="row">
        <div class="col s8 push-s3">
            <table class="white z-depth-3" id="datatable" style="border-radius:10px;">
                <thead>
                    <tr>
                        <th></th>
						<th>ID</th>
                        <th>Name</th>
                        <th>No. of Gun</th>
                    
                    </tr>
                    
                </thead>
                
               <tbody>
                    <tr>
                        <td><input class="with-gap" name="selectClient" type="radio" id="test5" checked/><label for="test5"></label></td>
						<td>1</td>
                        <td>Polytechnic University of the Philippines</td>
                        <td>23</td>
                    </tr>
                    
                    <tr>
						<td><input class="with-gap" name="selectClient" type="radio" id="test6"  /><label for="test6"></label></td>
						<td>2</td>
                        <td>Ateneo De Manila</td>
                        <td>15</td>
                    </tr>
                    
                    <tr>
						<td><input class="with-gap" name="selectClient" type="radio" id="test3" /><label for="test3"></label></td>
						<td>3</td>
                        <td>SWA Sta Lucia Village</td>
                        <td>19</td>
                    </tr>
                    
                    <tr>
						<td><input class="with-gap" name="selectClient" type="radio" id="test4" /><label for="test4"></label></td>
						<td>4</td>
                        <td>Ferdinand Compound</td>
                        <td>12</td>
                    </tr>
                </tbody>
    
            </table>
        </div>
    </div>
    

    
<div class='row'>
    <div class="col s3 push-s3">
        <h4 class="colortitle blue-text text-darken-3">Equipment (Current)</h4>
    </div>
    <div class="col s4 push-s4">
        <h4 class="colortitle blue-text text-darken-3">Equipment (Available)</h4>
    </div>
</div>
    
    
<div class="row">
    <div class="col s3 push-s3">
        <table class="white z-depth-3" id="datatable" style="border-radius:10px;">
                <thead>
                    <tr>
                     
                        <th>ID</th>
                        <th>Equipment Name</th>
                        <th>Equipment Status</th>
                    
                    </tr>
                    
                </thead>
                
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>M4A1</td>
                        <td>M</td>
                    </tr>
                    
                    <tr>
                        <td>2</td>
                        <td>M16</td>
                        <td>F</td>
                    </tr>
                    
                    <tr>
                        <td>3</td>
                        <td>Remington</td>
                        <td>M</td>
                    </tr>
                    
                    <tr>
                        <td>4</td>
                        <td>Desert Eagle</td>
                        <td>F</td>
                    </tr>
                </tbody>
    
            </table>
    </div>
    
    <div class="col s4 push-s4">
        <table class="white z-depth-3" id="datatable" style="border-radius:10px;">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Equipment Name</th>
                        <th>Equipment Status</th>
                    
                    </tr>
                    
                </thead>
                
                <tbody>
                    <tr>
                        <td><button class="buttonUpdate btn" href="#"><i class="material-icons">add</i></button>
            			 </td>
                        <td>1</td>
                        <td>Tat</td>
                        <td>F</td>
                    </tr>
                    
                    <tr>
                         <td><button class="buttonUpdate btn " href="#"><i class="material-icons">add</i></button>
            			 </td>
                        <td>2</td>
                        <td>Tet</td>
                        <td>M</td>
                    </tr>
                    
                    <tr>
                         <td><button class="buttonUpdate btn" href="#"><i class="material-icons">add</i></button>
            			 </td>
                        <td>3</td>
                        <td>PUP</td>
                        <td>F</td>
                    </tr>
                    
                    <tr>
                         <td><button class="buttonUpdate btn" href="#"><i class="material-icons">add</i></button>
            			 </td>
                        <td>4</td>
                        <td>PUP</td>
                        <td>M</td>
                    </tr>
                </tbody>
    
            </table>
    </div>
</div>
    <div class="row">
    <div class='col s4 push-s8'>
    <button class="btn waves-effect waves-light z-depth-2" type="submit" name="action" style="margin-right: 30px;">Save
    			<i class="material-icons right">send</i>
    </button>
    </div>
    </div>
        </div>
    @stop