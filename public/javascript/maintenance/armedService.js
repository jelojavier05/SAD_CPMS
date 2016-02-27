//function editButton(){
//
//	if (sessionStorage.strArmedServiceID == null){
//		alert("Select One Row");	
//	}else{
//		document.getElementById('editID').value = sessionStorage.strArmedServiceID;
//		document.getElementById('editname').value = sessionStorage.strArmedServiceName;
//		document.getElementById('editdescription').value = sessionStorage.strDescription;
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


