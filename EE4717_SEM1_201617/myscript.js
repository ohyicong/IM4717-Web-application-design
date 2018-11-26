const usernameRegex=/^([A-Za-z\.\s](?!([\.]{2,}|(\s\.+))))+$/;
const phoneRegex=/^(([0-9]{4}\-[0-9]{4})|([0-9]{8}))/;
const emailRegex=/^([\w\.\-](?![\.\-]{2,}))+@([\w]+\.)+[A-Za-z]{2,4}$/;
function testUsername(text,ele){
	if(usernameRegex.test(text)){
		ele.style.color="green";
	}else{
		ele.style.color="red";
	}
}
function testPhone(text,ele){
	if(phoneRegex.test(text)){
		ele.style.color="green";
	}else{
		ele.style.color="red";
	}
}
function testEmail(text,ele){
	if(emailRegex.test(text)){
		ele.style.color="green";
	}else{
		ele.style.color="red";
	}
}