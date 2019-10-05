var number;

function check_pass(){
	var val=document.getElementById("pass").value;
	var meter=document.getElementById("meter");
	var no=0;
	if(val!="")
	{
	// If the password length is less than or equal to 6
	if(val.length<=6)no=1;

	// If the password length is greater than 6 and contain any lowercase alphabet or any number or any special character
	if(val.length>6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))no=2;

	// If the password length is greater than 6 and contain alphabet,number,special character respectively
	if(val.length>6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))))no=3;

	// If the password length is greater than 6 and must contain alphabets,numbers and special characters
	if(val.length>6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))no=4;

	if(no==1)
	{
	$("#meter").animate({width:'50px'},300);
	meter.style.backgroundColor="red";
	document.getElementById("pass_type").innerHTML="Very Weak";
	}

	if(no==2)
	{
	$("#meter").animate({width:'100px'},300);
	meter.style.backgroundColor="#F5BCA9";
	document.getElementById("pass_type").innerHTML="Weak";
	}

	if(no==3)
	{
	$("#meter").animate({width:'150px'},300);
	meter.style.backgroundColor="#FF8000";
	document.getElementById("pass_type").innerHTML="Good";
	}

	if(no==4)
	{
	$("#meter").animate({width:'195px'},300);
	meter.style.backgroundColor="#2cab40";
	document.getElementById("pass_type").innerHTML="Strong";
	}
	}

	else
	{
	meter.style.backgroundColor="white";
	$("#meter").animate({width:'0px'},0000);
	document.getElementById("pass_type").innerHTML="";
	}
	number=no;
	}

function loginmethod() {

	
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	var atLocation = email.indexOf("@");
	var dotLocation = email.lastIndexOf(".");
	//var email1 = document.forms["loginform"]["email"].value;
	if(atLocation< 1 || (dotLocation - atLocation)< 2 ){
      
      alert("Email is not Valid!!!");
      document.forms["loginform"]["email"].style.borderColor="red";
      document.forms["loginform"]["password"].style.borderColor="red";
      return false;
  }
	else if(!email == "" && !password == "")
	{
		alert("Log in Successful");
	  document.forms["loginform"]["email"].style.borderColor="green";
      document.forms["loginform"]["password"].style.borderColor="green";
      return false;

	}
	else {
		alert("Field must not empty ");
		}
}


function signupmethod(){
	

var cemail = document.getElementById('c_email').value;
var pass = document.getElementById('pass').value;
var fullname = document.getElementById('fullname').value;

var atLocation = cemail.indexOf("@");
var dotLocation = cemail.lastIndexOf(".");



if (cemail=="" && pass =="" && fullname == "") {
	alert("Field must not empty ");
		document.forms["singupform"]["c_email"].style.borderColor="red";
		document.forms["singupform"]["pass"].style.borderColor="red";
		document.forms["singupform"]["fullname"].style.borderColor="red";
	}

else if(atLocation< 1 || (dotLocation - atLocation)< 2 ){
      
      alert("Email is not Valid!!!");
      document.forms["singupform"]["c_email"].style.borderColor="red";
      return false;
  }

else if(number<=3){
	alert("Password is weak");
}

else if(!pass == "" && !fullname == "")
	{
		alert("Sign up Successful");
		document.forms["singupform"]["c_email"].style.borderColor="green";
		document.forms["singupform"]["pass"].style.borderColor="green";
		document.forms["singupform"]["fullname"].style.borderColor="green";
	}
	console.log("Boom");
}
