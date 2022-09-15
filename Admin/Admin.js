function cat(id,label)
{
    a = document.getElementById(id).value;
    if(a == "")
    {
        document.getElementById(label).innerHTML = "Please Enter Category..";
        document.getElementById(id).focus();
        return false;
    }
    else
    {
        document.getElementById(label).innerHTML = "";
    }
}

function bname(id,label)
{
    a = document.getElementById(id).value;
    if(a == "")
    {
        document.getElementById(label).innerHTML = "Please Enter Brand Name ..";
        document.getElementById(id).focus();
        return false;
    }
    else
    {
        document.getElementById(label).innerHTML = "";
        
    }
}
function subcat(id,label)
{
    a = document.getElementById(id).value;
    if(a == "")
    {
        document.getElementById(label).innerHTML = "Please Enter Subcategory Name ..";
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