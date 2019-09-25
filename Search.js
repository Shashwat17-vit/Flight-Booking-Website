
function enable()
{
	document.getElementById("ad").disabled=false;
	document.getElementById("info").innerHTML="";
}
function disable()
{
	document.getElementById("ad").disabled=true;
	document.getElementById("info").innerHTML="Only One Way Ticket";
}