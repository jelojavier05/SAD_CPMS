//function editButton(){
//
//	if (sessionStorage.strGovernmentExamID == null){
//		alert("Select One Row");	
//	}else{
//		document.getElementById('editID').value = sessionStorage.strGovernmentExamID;
//		document.getElementById('editname').value = sessionStorage.strGovernmentExam;
//		sessionStorage.removeItem("strArmedServiceID");
//		sessionStorage.removeItem("strArmedServiceName");
//		sessionStorage.removeItem("strDescription");
//	}
//}

function radioClicked(strID, strName, strDescription){
	document.getElementById('editID').value = strID;
	document.getElementById('editname').value = strName;
	document.getElementById('editdescription').value = strDescription;
}

