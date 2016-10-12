<!DOCTYPE html>
<html>
    <title> Daily Time Record </title>
    <style>
    #logo{
        margin-top: 35px;
        margin-left: -25px;
        width: 90px;
        height: 90px;
        position: absolute;
        z-index: 99;
    }
    span {
        font-weight: normal;
    }
    th {
        font-size: 13px;
        background-color:#2D4262;
        color: white;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse:collapse;
        width:100%;
        margin-top:-2%;
    }
    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
  /*  tr:nth-child(even) {
        background-color: #A1D6E2;*/
    }
    td {
        font-weight: bold;
    }
    span {
        font-weight: normal;
    }
    h3 {
        margin-top: 30px;
    }
    h4 {
        padding-top: -20px;
    }
    body {
        font-family: "Helvetica";
    }
    .margin {
        padding-top: -20px;
    }
    .date {
        padding-top: -20px;
    }
        .text
        {
            text-align: justify;
        }
     #title
        {
            font-family: arial, sans-serif;
            font-size:30px;
            color:#011A27;
            text-align: center;
        }
    .pdf
        {
            font-family:inherit;
            font-size:14px;
        }
  .text
        {
            font-size:13px;
            padding-top:-2%;
        }
         .ss
        {
            font-size:16px;
        }

        .container1
        {
            position:relative;            
            /*background: red;*/
            width:50%;

        }

        .container2
        {
            position:absolute;        
            /*margin-left:400px;
            margin-top:-200px;*/
            width:50%;
            /*background:green;*/
            top:250px;
            left:360px;
        }
</style>

<body>  
         
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img id="logo" src="{!! public_path('img/cpms-logo.png') !!}" width="100">
    <h3><center><b><strong><i style="font-size:30px">CLIENT AND PERSONNEL <br> MANAGEMENT SYSTEM</i></strong></b></center></h3>
        <hr>
          <h2><center><b><strong><i>Daily Time Record</i></strong></b></center></h2><br>

<h4>Guard: {{$strGuardName}}</h4>
<h4>Date Range: {{$dateStart}} - {{$dateEnd}}</h4>
     <br>
     <br>
         <table>
                <tbody>
                    <tr>
                    <th><center>Client Name</center>
                    </th>
                     <th><center>Time In</center>
                    </th>
                     <th><center>Time Out</center>
                        </th>
                    </tr>
                    
                    @foreach($arrData as $value)
                    <tr>
                        <td>{{$value->strClientName}}</td>
                        <td>{{$value->timeIn}}</td>
                        <td>{{$value->timeOut}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


    </body>
    
</html>