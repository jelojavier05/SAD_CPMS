<html>
<head>
    <title>CONTRACT FORM</title>
</head>
<body>
    
<h3>CLIENT CONTRACT</h3>

@foreach($tblcontract $key => $clientcontract)  

    <div>
       <label>CONTRACT ID:</label>
        {{$clientcontract->intContractID}}
        <label>TYPE OF CONTRACT</label>
        {{$clientcontract->intTypeOfContractID}}
        <label>CLIENT ID</label> 
        {{$clientcontract->intClientID}}
        <label>DURATION</label> 
        {{$clientcontract->intMonthsDuration}}
        <label>RATE</label> 
        {{$clientcontract->deciRate}}
        <label>START</label> 
        {{$clientcontract->dateStart}}
       <label>END</label>  
        {{$clientcontract->dateEnd}}
       <label>STATUS</label> 
        {{$clientcontract->boolStatus}}
    
    </div>
@endforreach
    
        
</body>
</html>