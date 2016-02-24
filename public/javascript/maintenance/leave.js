function editButton(){

	if (sessionStorage.strLeaveID == null){
		alert("Select One Row");	
	}else{
		document.getElementById('editID').value = sessionStorage.strLeaveID;
		document.getElementById('editname').value = sessionStorage.strLeave;
		document.getElementById('editDefault').value = sessionStorage.strLeaveCount;
		sessionStorage.removeItem("strArmedServiceID");
		sessionStorage.removeItem("strArmedServiceName");
		sessionStorage.removeItem("strDescription");
	}
}

function radioClicked(strID, strName, strCount){
	sessionStorage.setItem("strLeaveID", strID);
	sessionStorage.setItem("strLeave", strName);
	sessionStorage.setItem("strLeaveCount", strCount);
	document.getElementById('btnEdit').disabled = false;
	document.getElementById('btnDelete').disabled = false;
}

