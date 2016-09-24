<!DOCTYPE html>
<html>
    <title> Gun Query </title>
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
    </style>
    <body>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img id="logo" src="{!! public_path('img/cpms-logo.png') !!}" style="width:100px;margin-left:8%">
        <h2 id="pdf"><center><b><strong><i>&nbsp;&nbsp;CLIENT AND PERSONNEL<br> MANAGEMENT SYSTEM</i></strong></b></center></h2>
        <br>
        <hr>
        <h2><center><b><strong><i>Clients Query</i></strong></b></center></h2>
        <br>
           <h4>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Nature of Business: All
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Province: All
        </h4>
        
        <h4>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Type of Contract: All
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;City: All 
        </h4>
        <br>
        <br>
 
         <table>
                <tbody>
                    <tr>
                        <th><center>Nature of Business</center></th>
                        <th><center>Type of Contract</center></th>
                        <th><center>Name</center></th>
                        <th><center>Person in Charge</center></th>
                        <th><center>Province</center></th>
                        <th><center>City</center> </th>
                    </tr>
                    
                    <tr>
                        <td>Bank</td>
                        <td>Contract 1</td>
                        <td>LandBank Almanza</td>
                        <td>Juan Dela Cruz</td>
                        <td>Metro Manila</td>
                        <td>Las Pinas</td>
                    </tr>

                   
                    <tr>
                        <td>School</td>
                        <td>Contract 2</td>
                        <td>PUP Sta.Mesa</td>
                        <td>Mang Kanor</td>
                        <td>Rizal</td>
                        <td>Antipolo</td>
                    </tr>
                    
                     <tr>
                        <td>Bank</td>
                        <td>Contract 1</td>
                        <td>LandBank Almanza</td>
                        <td>Juan Dela Cruz</td>
                        <td>Metro Manila</td>
                        <td>Las Pinas</td>
                    </tr>

                   
                    <tr>
                        <td>School</td>
                        <td>Contract 2</td>
                        <td>PUP Sta.Mesa</td>
                        <td>Mang Kanor</td>
                        <td>Rizal</td>
                        <td>Antipolo</td>
                    </tr>
                    

                </tbody>
            </table>


    </body>
    
</html>