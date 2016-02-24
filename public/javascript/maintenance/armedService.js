function editButton(){

	if (sessionStorage.strArmedServiceID == null){
		alert("Select One Row");	
	}else{
		document.getElementById('editID').value = sessionStorage.strArmedServiceID;
		document.getElementById('editname').value = sessionStorage.strArmedServiceName;
		document.getElementById('editdescription').value = sessionStorage.strDescription;
		sessionStorage.removeItem("strArmedServiceID");
		sessionStorage.removeItem("strArmedServiceName");
		sessionStorage.removeItem("strDescription");
	}
}

function radioClicked(strArmedServiceID, strArmedServiceName, strDescription){
	sessionStorage.setItem("strArmedServiceID", strArmedServiceID);
	sessionStorage.setItem("strArmedServiceName", strArmedServiceName);
	sessionStorage.setItem("strDescription", strDescription);
	document.getElementById('btnEdit').disabled = false;
	document.getElementById('btnDelete').disabled = false;
}

