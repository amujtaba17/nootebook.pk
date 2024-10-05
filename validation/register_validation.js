function user_form_validation(){


var flag = true
// ---------------------- Patterns
var alpha_pattern =/^[A-Z]{1}[a-z]{2,}$/;
var email_pattern =/^[a-z]+\d*[@]{1}[a-z]+[.]{1}(com|net|org){1}$/;
var password_pattern =  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@.#$!%*?&^])[A-Za-z\d@.#$!%*?&]{8,15}$/;
// -----------------------

// ----------Values
var first_name = document.querySelector("#firstname").value;
var last_name = document.querySelector("#lastname").value;
var email = document.querySelector("#email").value;
var password = document.querySelector("#password").value;
var gender = document.querySelector("input[type='radio']:checked");
var dob = document.querySelector("#dob").value;
// var profilepic = document.querySelector("#profilepic").value;
var address= document.querySelector('#addressline').value;
// ------------------------------

// -------------Messages
var fnmsg= document.querySelector("#firstname_msg")
var lnmsg= document.querySelector("#lastname_msg")
var emailmsg= document.querySelector("#email_msg")
var passmsg= document.querySelector("#password_msg")
var gendermsg= document.querySelector("#gender_msg")
var dobmsg=document.querySelector("#birth_message")
// var profilemsg=document.querySelector("#profile_msg")
var addressmsg=document.querySelector("#addressmsg")
// -------------------------------------
	
	if (first_name ==="") {
		 flag = false;
		fnmsg.innerHTML ="Field Required";
	}else{

		fnmsg.innerHTML="";

		if (alpha_pattern.test(first_name)=== false) {
			 flag = false;
			fnmsg.innerHTML ="Firstname must start with an uppercase eg: Ahmed/Ali ";
		}
	}
// ----------------------------
		if (last_name ==="") {
		 flag = false;
		lnmsg.innerHTML ="Field Required";
	}else{

		lnmsg.innerHTML="";
		if (alpha_pattern.test(last_name)=== false) {
			 flag = false;
			lnmsg.innerHTML ="Lastname also start with an uppercase eg: Khan/Jahangeer ";
		}
	}

// ----------------------------------------

if (email ==="") {
		 flag = false;
		emailmsg.innerHTML ="Field Required";
	}else{

		emailmsg.innerHTML="";
		if (email_pattern.test(email)=== false) {
			 flag = false;
			emailmsg.innerHTML ="Email must contain @ & .com|.net|.etc";
		}
	}

// ---------------------------------------------------------------------------

if (password ==="") {
		 flag = false;
		passmsg.innerHTML ="Field Required";
	}else{

		passmsg.innerHTML="";
		if (password_pattern.test(password)=== false) {
			 flag = false;
			passmsg.innerHTML ="Password must be atleast 8 characters long with 1-Uppercase 1-Lowercase 1-Digit & 1-Special Character";
		}
	}

// ------------------------------------------------------------
if (!gender) {
		flag = false;
		gendermsg.innerHTML ="Field Required";
	}else{
		gendermsg.innerHTML ="";

	}
//---------------------------------------------------------------
	if (dob ==="") {
		flag = false;
		dobmsg.innerHTML ="Field Required";
	}else{
		dobmsg.innerHTML ="";

	}

// --------------------------------------------------------------
// if (profilepic ==="") {
// 		flag = false;
// 		profilemsg.innerHTML ="Field Required";
// 	}else{
// 		profilemsg.innerHTML ="";

// 	}
// -----------------------------------------------------------------

if (address ==="") {
		flag = false;
		addressmsg.innerHTML ="Field Required";
	}else{
		addressmsg.innerHTML ="";

	}

// -----------------------------------------------------------------
//------------------------------------------------------------------- 
if (flag === true) {
	return true;
}else{
	return false;
}

}