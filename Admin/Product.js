function pname(id,label)
{
    a = document.getElementById(id).value;
    if( a == "")
    {
        document.getElementById(label).innerHTML = "Please Enter Product Name..";
        document.getElementById(id).focus();
        return false;
    }
    else
    {
        document.getElementById(label).innerHTML = "";
    }
} 
function pprice(id,label)
{
    a = document.getElementById(id).value;
    if( a == "")
    {
        document.getElementById(label).innerHTML = "Please Enter Product Price..";
        document.getElementById(id).focus();
        return false;
    }
    else
    {
        document.getElementById(label).innerHTML = "";
    }
} 
function pqty(id,label)
{
    a = document.getElementById(id).value;
    if( a == "")
    {
        document.getElementById(label).innerHTML = "Please Enter Product Quantity..";
        document.getElementById(id).focus();
        return false;
    }
    else
    {
        
        document.getElementById(label).innerHTML = "";
    }
    
} 
  
function pdes(id,label)
{
    a = document.getElementById(id).value;
    if( a == "")
    {
        document.getElementById(label).innerHTML = "Please Enter Product Description..";
        document.getElementById(id).focus();
        return false;
    }
    else
    {
        document.getElementById(label).innerHTML = "";
    }
} 
function drpcat(id,label)
{
    a = document.getElementById(id).value;
    if(a == "0")
    {
        document.getElementById(label).innerHTML = "Please Select Category ..";
        document.getElementById(id).focus();
        return false;
    }
    else
    {
        document.getElementById(label).innerHTML = "";
        
    }
}
function drpsubcat(id,label)
{
    a = document.getElementById(id).value;
    if(a == "0")
    {
        document.getElementById(label).innerHTML = "Please Select Sub-Category ..";
        document.getElementById(id).focus();
        return false;
    }
    else
    {
        document.getElementById(label).innerHTML = "";
        
    }
}
function drpbrand(id,label)
{
    a = document.getElementById(id).value;
    if(a == "0")
    {
        document.getElementById(label).innerHTML = "Please Select Brand ..";
        document.getElementById(id).focus();
        return false;
    }
    else
    {
        document.getElementById(label).innerHTML = "";
        
    }
}