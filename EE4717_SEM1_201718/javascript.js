
//UID regex requirements 
//egin: (Alphabet) End: (word) 
//In between any number of word characters . - 'space'

regexUID = /^[A-Za-z][\w\-\.\s]*[\w]$/;

//Password regex requirements
// At least one upper case character
// At least one numeric digit
// At least one nonword 

regexPassword = /(?=.*[A-Z])(?=.*[0-9])(?=.*[\W])/;


function testRegexUID(testword,ele){
	console.log("Hello");
	if(regexUID.test(testword)){
		ele.style.color='green';
	}else{
		ele.style.color='red';
	}
}

function testPassword(testword,ele){
	if(regexPassword.test(testword)){
		ele.style.color='green';
	}else{
		ele.style.color='red';
	}
}