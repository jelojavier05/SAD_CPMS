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
        <h2><center><b><strong><i>Guns Query</i></strong></b></center></h2>
        <br>
 <!--<body>       
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img id="logo" src="{!! public_path('img/cpms-logo.png') !!}" width="100">
   <p id="title"> CLIENT AND PERSONNEL <br>MANAGEMENT SYSTEM</p>
        <hr>
          <h2><center><b><strong><i>Guards Query</i></strong></b></center></h2>

    <h5><center><b><strong><i>From: January 1, 2013 To: January 1, 2017</i></strong></b></center></h5>-->
           <h4>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Status: All
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Client: All 
        </h4>
        
        <h4>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Type of Gun: All
        </h4>
        <br>
        <br>
 
         <table>
                <tbody>
                    <tr>
                    <th><center>Type of Gun</center></th>
                    <th><center>License Number</center></th>
                    <th><center>Name</center></th>
                    <th><center>Status</center></th>
                    <th><center>Client</center></th>
                    </tr>
                    
                    <tr>
                        <td>Pistol</td>
                        <td>123-123</td>
                        <td>Glock</td>
                        <td>Available</td>
                        <td>ChinaBank Pilar</td>
                    </tr>

                   
                    <tr>
                        <td>Pistol</td>
                        <td>888-999</td>
                        <td>Colt 45</td>
                        <td>Pending</td>
                        <td>None</td>
                    </tr>
    
                    <tr>
                        <td>Rifle</td>
                        <td>456-654</td>
                        <td>M16</td>
                        <td>Pending</td>
                        <td>None</td>
                    </tr>
                    
                    <tr>
                        <td>Rifle</td>
                        <td>111-222</td>
                        <td>M4A1</td>
                        <td>Available</td>
                        <td>David' Salon Makati</td>
                    </tr>
                </tbody>
            </table>


    </body>
    
</html>