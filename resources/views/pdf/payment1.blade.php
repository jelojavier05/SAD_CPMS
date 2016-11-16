<!DOCTYPE html>
<html>
    <title> Voucher </title>
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
            
            font-family:"Myriad Pro";
            font-size:20px;
            margin-left:20%;
            padding-top:-4%;
            color:white;
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
      
}
</style>

<body>  
	<div style="background-color:#2D4262; height:83px;">
		<img id="logo" src="{!! public_path('img/cpms-logo.png') !!}" style="width:100px;height:80px;margin-top:-.2%;margin-left:1%">
    
		<div id="" style="width:50%; color:white; font-weight:bold;">
			<p id="" style="margin-left:110px; margin-top:5px; font-family:Myriad Pro;">CLIENT AND PERSONNEL MANAGEMENT SYSTEM</p>
			<p style="margin-left:140px; font-size:13px; padding-top:-10px; font-family:Myriad Pro;">Sta Cruz, Laguna</p>
		</div>
		
		<div id="" style="height:80px; position:absolute; width:50%; color:white; font-weight:bold; margin-left:350px; margin-top:-100px; font-family:Myriad Pro;">
			<p ><b><center><div style="margin-top:20px; font-size:20px;">PAYMENT VOUCHER</div></center></b></p>
		</div>
		
		
	</div>
	
	<div style="width:50%">Statement Date:&nbsp;<span id="">{{$data->clientPayment->strDatetimepayment}}</span></div>
	<div style="background-color:#2D4262;color:white;width:50%">CLIENT INFORMATION</div>
    
	<div id="" style="width:50%;">
		<p id="" style="font-size:20px; padding-top:-2%;">{{$data->clientPayment->strClientName}}</p>
		<p id="" style="font-size:12px; padding-top:-2%;">{{$data->clientPayment->strNatureOfBusiness}}</p>
	</div>
    <div style="background-color:#2D4262;color:white;width:50%">MODE OF PAYMENT</div>
    
    <div id="" style="width:50%;">
        <p id="" style="font-size:20px; padding-top:-2%;">{{$data->clientPayment->modeOfPayment}}</p>
    </div>

    @if(isset($data->checkInfo))
	
	<div id="" style="height:80px; position:absolute; width:50%;  font-weight:bold; margin-left:380px; top:100px; ">
			<p ><b><div style="margin-top:20px; font-size:15px;">RECEIPT NUMBER:&nbsp;<span id="">{{$data->clientPayment->strReceiptNumber}}</span></div></b></p>
	</div>
	<p style="background-color:#2D4262;color:white;width:50%; margin-top:-1%;">CHEQUE DETAILS</p>
	<p style="padding-top:-1%;font-size:12px;">BANK NAME:&nbsp;<span id="">{{$data->checkInfo->strBankName}}</span></p>
	<p style="padding-top:-1%;font-size:12px;">DATE ISSUED:&nbsp;<span id="">{{$data->checkInfo->strDate}}</span></p>
	<p style="padding-top:-1%;font-size:12px;">CHEQUE NUMBER:&nbsp;<span id="">{{$data->checkInfo->strAccountNumber}}</span></p>
	<p style="padding-top:-1%;font-size:12px;">AMOUNT:&nbsp;<span id="">{{$data->checkInfo->deciAmount}}</span></p>
    @endif
    
    
    
    <div>       
		
	<p style="text" class="ss">GUARDS</p>
    <table style="width:50%">  <tbody>
                <tr>
					<th><center>Guard ID</center></th>
					<th><center>Name</center></th>
					<th><center>Hours</center></th>
                </tr>

                @foreach($data->arrGuard as $value)
                <tr>
                    <td>{{$value->intGuardID}}</td>
                    <td>{{$value->strFirstName}} {{$value->strLastName}}</td>
					<td>{{$value->totalHour}}</td>
					
                </tr>
				@endforeach
            </tbody>
        </table>
  
     
		
	<br>
  
     	<p style="text" class="ss">BILLING DATES</p>
    <table style="width:50%">  <tbody>
                <tr>
                    <th><center>Date</center>
                    </th>
                     <th><center>Amount</center>
                    </th>
                </tr>
                @foreach($data->billingDate as $value)
                <tr>
                    <td>{{$value->strDate}}</td>
                    <td>{{$value->totalAmount}}</td>      
                </tr>      
                @endforeach
            </tbody>
        </table>
        
</div>
    <div style="padding-top:-50%;padding-left:52%;width:50%">
     <div style="border:solid;padding:3%;">
    
        <p style="text-align:justify; font-size: 14px;">
            <b> This is your copy. Keep this in a safe place. </b>
            <br>
            <br>
            ALL FEES ARE NONREFUNDABLE AND NONTRANSFERABLE; hence only those who completed the registration shall be accomodated to apply. 
            <br>
            <br>
            I agree to the Terms of Use, have read and understood the Privacy Policy, and confirm that the information I have provided to the Security Agency are true and correct. 
            Furthermore, I agree and understand that I am legally responsible for the inforamtion I entered in the CPMS, and if I violate its Terms of Service, my contract shall be removed and shall lead to the termination, without prior notice of my registration and everything associated with it.
            <br>
            <br>
            <u style="text-align:center;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
            <br>
            <i>Client's Signature</i>
        </p>
         
     </div>
    
    </div>
   
    <br>    
    
    <div id="" style="width:50%;">
		<div id="" style="font-size:18px; padding-top:-2%; font-weight:bold;">TOTAL NUMBER OF HOURS:&nbsp;<span id="">{{$data->totalHours}}</span></div>
		<div id="" style="font-size:18px;padding-top:-2%; font-weight:bold;">RATE PER HOUR:&nbsp;<span id="">{{$data->deciRate}}</span></div>
        <div id="" style="font-size:18px;padding-top:-2%; font-weight:bold;">TOTAL AMOUNT PAID:&nbsp;<span id="">{{$data->totalAmount}}</span></div>
	</div>
	
	
    
    </body>
    
    

</html>