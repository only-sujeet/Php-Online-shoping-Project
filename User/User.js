function fullname(id,label)
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
       pattern=/^[a-zA-z0-9].{8,15}$/;
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
function age(id,label)
{
   a=document.getElementById(id).value;
   if( a == "")
   {
	  document.getElementById(label).innerHTML="Please Enter Age..";
      document.getElementById(id).focus();
     return false;	 
   }
   else
   { 
      document.getElementById(label).innerHTML="";
   }   
}
function uname(id,label)
{
   a = document.getElementById(id).value;
   if( a == "")
   {
      document.getElementById(label).innerHTML = "Please Enter User Name...";
      document.getElementById(id).focus();
      return false;
   }
   else
   {
      pattern = /^[a-zA-Z0-9].{5,15}$/;
      if(pattern.test(a) == true)
      {
         document.getElementById(label).innerHTML = "";
      }
      else
      {
         document.getElementById(label).innerHTML = "Please Enter Minimum 5 length Alphanumeric UserName";
         document.getElementById(id).focus();
         return false;
      }
   }
}
function validate()
{
   n = document.forms["frmreg"]["txtname"].value;
   u = document.forms["frmreg"]["txtuname"].value;
   a= document.forms["frmreg"]["txtage"].value;
   b = document.forms["frmreg"]["txtbdate"].value;
   c = document.forms["frmreg"]["selcity"].value;
   e = document.forms["frmreg"]["txtemail"].value;
   p = document.forms["frmreg"]["txtpass"].value;
   
   if( n == "" || u == "" || a == "" || b == "" || c == "0" || e == "" || p == "" )
   {
	
	   document.getElementById("validate").innerHTML="Please Enter All The Feilds In Form";
      document.getElementById("txtname").focus();
      return false;	 
   }   
}
