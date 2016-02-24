function editButton(){

	if (sessionStorage.strGovernmentExamID == null){
		alert("Select One Row");	
	}else{
		document.getElementById('editID').value = sessionStorage.strGovernmentExamID;
		document.getElementById('editname').value = sessionStorage.strGovernmentExam;
		sessionStorage.removeItem("strArmedServiceID");
		sessionStorage.removeItem("strArmedServiceName");
		sessionStorage.removeItem("strDescription");
	}
}

function radioClicked(strID, strName){
	sessionStorage.setItem("strGovernmentExamID", strID);
	sessionStorage.setItem("strGovernmentExam", strName);
	document.getElementById('btnEdit').disabled = false;
	document.getElementById('btnDelete').disabled = false;
}

