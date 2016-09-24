<!DOCTYPE html>
<html>
    <title> Guard Transfer History </title>
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
            font-size:25px;
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
    
   <p id="title"> CLIENT AND PERSONNEL <br>MANAGEMENT SYSTEM</p>

        <hr>
          <h2><center><b><strong><i>Guard Transfer History</i></strong></b></center></h2>
          <!-- <h4><center><b><strong><i>{{$now}}</i></strong></b></center></h4> -->
     

        
    <p style="text-align:center;"> Guard Personal Information </p>
    
    <div class="container1">
        <div style="font-weight: bold;">
            GUARD ID:&nbsp;&nbsp;<span style="font-weight:normal;">{{$guardInformation->intGuardID}}</span>
        </div>

        <div style="font-weight: bold;">
            GUARD NAME:&nbsp;&nbsp;<span style="font-weight:normal;">{{$guardInformation->strFirstName}} {{$guardInformation->strLastName}}</span>
        </div>

        <div style="font-weight: bold;">
            ADDRESS:&nbsp;&nbsp;<span style="font-weight:normal;">{{$guardInformation->strAddress}} {{$guardInformation->strCityName}}, {{$guardInformation->strProvinceName}}</span>
        </div>

        <div style="font-weight: bold;">
            AGE:&nbsp;&nbsp;<span style="font-weight:normal;">{{$guardInformation->age}}</span>
        </div>

        <div style="font-weight: bold;">
            CONTACT NUMBER (MOBILE):&nbsp;&nbsp;<span style="font-weight:normal;">{{$guardInformation->strContactNumberMobile}}</span>
        </div>
    </div>

    <div class="container2">
        <div style="font-weight: bold;">
            LICENSE NUMBER:&nbsp;&nbsp;<span style="font-weight:normal;">{{$guardInformation->strLicenseNumber}}</span>
        </div>

        <div style="font-weight: bold;">
            GENDER:&nbsp;&nbsp;<span style="font-weight:normal;">{{$guardInformation->strGender}}</span>
        </div>

        <div style="font-weight: bold;">
            PLACE OF BIRTH:&nbsp;&nbsp;<span width="20px" style="font-weight:normal;">{{$guardInformation->strPlaceBirth}} </span>
        </div>

        <div style="font-weight: bold;">
            CIVIL STATUS:&nbsp;&nbsp;<span style="font-weight:normal;">{{$guardInformation->strCivilStatus}}</span>
        </div>

        <div style="font-weight: bold;">
            CONTACT NUMBER (LANDLINE):&nbsp;&nbsp;<span style="font-weight:normal;">{{$guardInformation->strContactNumberLandline}}</span>
        </div>
    </div>
    
    
     <h3><center><b><i>Transfer History</i></b></center></h3>

     <br>
     <br>
         <table>
                <tbody>
                    <tr>
                    <th><center>Date Deployed</center>
                    </th>
                     <th><center>Client</center>
                    </th>
                     <th><center>Client's Nature of Business</center>
                    </th>
                     <th><center>Status</center>
                    </th>
                    @foreach($trackRecord as $value)
                    </tr>
                        <tr>
                        <td>{{$value->pdfCreated_at}} - {{$value->pdfDateEnd}}</td>
                        <td>{{$value->strClientName}}</td>
                        <td>{{$value->strNatureOfBusiness}}</td>
                        <td>{{$value->boolStatus}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


    </body>
    
</html>