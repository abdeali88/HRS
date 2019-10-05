
function hotels() {
	var Hotel_location = document.getElementById('Hotel_location').value;
var Check_in = document.getElementById('Check_in').value;
var Check_out = document.getElementById('Check_out').value;
var Price = document.getElementById('Price').value;
var hn1=document.getElementById('Hotel_name');
var hl1=document.getElementById('l1').value;

if(!Hotel_location=="" && !Check_in==""&& !Check_out==""&&!Price=="")
{
	alert("All Avalable Hotels Room is Given Below");
}
else{
	// hl1.style.display="none";
	hn1.style.color="blue";
	document.getElementById('')
	document.getElementById('Hotel_location').style.borderColor="red";
	document.getElementById('Check_in').style.borderColor="red";
	document.getElementById('Check_out').style.borderColor="red";
	document.getElementById('Price').style.borderColor="red";
}
//document.getElementById('div').style.display="none";
	
}