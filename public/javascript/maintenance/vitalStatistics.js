function editButton(){

	if (sessionStorage.strUnitOfMeasurementID == null){
		alert("Select One Row");	
	}else{
		document.getElementById('editID').value = sessionStorage.strUnitOfMeasurementID;
		document.getElementById('editname').value = sessionStorage.strUnitOfMeasurement;
		sessionStorage.removeItem("strUnitOfMeasurementID");
		sessionStorage.removeItem("strUnitOfMeasurement");
	}
}

function radioClicked(strID, strName){
	sessionStorage.setItem("strUnitOfMeasurementID", strID);
	sessionStorage.setItem("strUnitOfMeasurement", strName);
	document.getElementById('btnEdit').disabled = false;
	document.getElementById('btnDelete').disabled = false;
}

