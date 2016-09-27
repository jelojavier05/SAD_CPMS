<!DOCTYPE html>
<html>
    <title> GUARD DEPLOYED PER AREA </title>
    <style>
        
        
    #logo{
        margin-top: 35px;
        margin-left: -25px;
        width: 120px;
        height: 120px;
        position: absolute;
        z-index: 99;
    }
    span {
        font-weight: normal;
    }
    th {
        font-size: 14px;
        background-color: #2D4262;
        color: white;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        margin-top: 10px;
    }
    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
/*
    tr:nth-child(even) {
        background-color: #dddddd;
    }
*/
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
            font-family: sans-serif;
            font-size:17px;
            margin-left:24%;
            color:#011A27;
            padding-top:13%;
        }
    li
        {
            list-style: none;
        }
    .ss
        {
            font-size:18px;
            text-decoration: underline;
            padding-top:-1%;
            
        }
    
    #pdf
        {
            font-family:inherit;
            font-size:20px;
            padding-top:2%;
        }
    #date
        {
            font-size:12px;
            padding-top:-1%;
        }
    .tot
        {
            background-color:#90AFC5;
            width:50%;
        }
</style>
<body style="border-style:solid">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img id="logo" src="{!! public_path('img/cpms-logo.png') !!}" style="width:100px;margin-left:8%">
    
      <h2 id="pdf"><center><b><strong><i>&nbsp;&nbsp;CLIENT AND PERSONNEL<br> MANAGEMENT SYSTEM</i></strong></b></center></h2>
    
    <p><center class="ss">GUARDS Deployed Per Area</center></p>
    <h2 id="date" ><center><b><strong><i>As Of: {{$dateAsOf}}</i></strong></b></center></h2>
        <hr>
        
        
        
    <table>
      <tbody>
        <tr>
          <th><center>CITY</center></th>
          <th><center>CLIENT</center></th>
          <th><center>NUMBER OF GUARDS</center></th>
        </tr>
      </tbody>
        @foreach($dataTable as $value)
        <tr>
          <td>{{$value->strCityName}}</td>
          <td>{{$value->strClientName}}</td>
          <td>{{$value->intCityCountGuard}}</td>
        </tr>
        @endforeach
    </table>
      <br>
    <br>
    <br>
    
    <p>Total Number of:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
     <p class="tot"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CITIES:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$totalNumber->city}}</p>
     <p class="tot">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CLIENTS:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$totalNumber->client}}</p>
     <p class="tot"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GUARDS:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$totalNumber->guard}}</p>
    </body>
    
</html>