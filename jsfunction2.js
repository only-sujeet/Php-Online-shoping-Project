function fname(id,label)
{
   a=document.getElementById(id).value;
   if( a == "")
   {
	
	 document.getElementById(label).innerHTML="Please Enter Name";
     document.getElementById(id).focus();
     return false;	 
   }
   else
   { 
       pattern=/^[a-zA-Z]{5,15}$/;
	   if(pattern.test(a)==true)
	   {
		   document.getElementById(label).innerHTML="";
	   }  
	   else
	   {
		   document.getElementById(label).innerHTML="Please Enter Alphabat Only";
		   document.getElementById(id).focus();
		   return false;
	   }   
   }   
}

function add(id,label)
{
   a=document.getElementById(id).value;
   if( a == "")
   {
	
	 document.getElementById(label).innerHTML="Please Enter Address";
     document.getElementById(id).focus();
     return false;	 
   }
   else
   { 
       pattern=/^[a-zA-Z0-9]+$/;
	   if(pattern.test(a)==true)
	   {
		   document.getElementById(label).innerHTML="";
	   }  
	   else
	   {
		   document.getElementById(label).innerHTML="Please Enter Alphbat and Number Only";
		   document.getElementById(id).focus();
		   return false;
	   }   
   }   
}

function mob(id,label)
{
   a=document.getElementById(id).value;
   if( a == "")
   {
	
	 document.getElementById(label).innerHTML="Please Enter Mobile Number";
     document.getElementById(id).focus();
     return false;	 
   }
   else
   { 
       pattern=/^[0-9]{10}$/;
	   if(pattern.test(a)==true)
	   {
		   document.getElementById(label).innerHTML="";
	   }  
	   else
	   {
		   document.getElementById(label).innerHTML="Please Enter 10Number Only";
		   document.getElementById(id).focus();
		   return false;
	   }   
   }   
}

function email(id,label)
{
   a=document.getElementById(id).value;
   if( a == "")
   {
	
	 document.getElementById(label).innerHTML="Please Enter Email ID";
     document.getElementById(id).focus();
     return false;	 
   }
   else
   { 
       pattern=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	   if(pattern.test(a)==true)
	   {
		   document.getElementById(label).innerHTML="";
	   }  
	   else
	   {
		   document.getElementById(label).innerHTML="Please Enter Alphbat,number and .,- Only";
		   document.getElementById(id).focus();
		   return false;
	   }   
   }   
}

function pass(id,label)
{
   a=document.getElementById(id).value;
   if( a == "")
   {
	
	 document.getElementById(label).innerHTML="Please Enter Password";
     document.getElementById(id).focus();
     return false;	 
   }
   else
   { 
       pattern=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
	   if(pattern.test(a)==true)
	   {
		   document.getElementById(label).innerHTML="";
	   }  
	   else
	   {
		   document.getElementById(label).innerHTML="Please Enter Minimum 8 Character";
		   document.getElementById(id).focus();
		   return false;
	   }   
   }   
}
function chksel(id,label)
{
   a=document.getElementById(id).value;
   if( a == "0")
   {
	  document.getElementById(label).innerHTML="Please Select a City";
      document.getElementById(id).focus();
     return false;	 
   }
   else
   { 
      document.getElementById(label).innerHTML="";
   }   
}
function validate()
{
   n = document.forms["frmreg"]["txtname"].value;
   a = document.forms["frmreg"]["txtadd"].value;
   m = document.forms["frmreg"]["txtno"].value;
   b = document.forms["frmreg"]["txtbdate"].value;
   c = document.forms["frmreg"]["selcity"].value;
   e = document.forms["frmreg"]["txtemail"].value;
   p = document.forms["frmreg"]["txtpassword"].value;
   
   if( n == "" || a == "" || m == "" || b == "" || c == "0" || e == "" || p == "" )
   {
	
	 document.getElementById("val7").innerHTML="Please Enter All The Feilds In Form";
     document.getElementById("txtname").focus();
     return false;	 
   }
   else
   { 
       location.href = "Q5.html";   
   }   
}

function changecolor(id)
{
	
	
	document.getElementById(id).style.backgroundColor = "lightblue";
	document.getElementById(id).value = ""; 
}


