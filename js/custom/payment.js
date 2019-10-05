
function payment1() {

var name = document.getElementById('name').value;
var phonenumber = document.getElementById('phonenumber').value;
var email = document.getElementById('email').value;
var cvc = document.getElementById('cvc').value;
var cardholdnum = document.getElementById('cardholdnum').value;
var valid = document.getElementById('valid').value;
var cardnumber = document.getElementById('cardnumber').value;

var atLocation = email.indexOf("@");
var dotLocation = email.lastIndexOf(".");

if(atLocation< 1 || (dotLocation - atLocation)< 2 ){
      
      alert("Email is not Valied!!!");
      document.forms["paymentform"]["email"].style.borderColor="red";
      document.forms["paymentform"]["name"].style.borderColor="red";
      document.forms["paymentform"]["phonenumber"].style.borderColor="red";
      document.forms["paymentform1"]["cvc"].style.borderColor="red";
      document.forms["paymentform1"]["cardholdnum"].style.borderColor="red";
      document.forms["paymentform1"]["valid"].style.borderColor="red";
      document.forms["paymentform1"]["cardnumber"].style.borderColor="red";
      
      return false;
  }
  else if(!name == "" && !phonenumber == "" && !email == "" && !cvc=="" && !cardholdnum=="" && !valid =="" && !cardnumber=="")
  {

  	alert("PaymentSucceed");
  	return false;
  }
  else{
  	//alert("Fields should not empty");
  }

console.log(cardnumber);


	
}