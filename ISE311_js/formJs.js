function Stop(){
    event.preventDefault();
}
//the function of checking password:
function CheckingFormat(userName,Password)
{
    //adding format and number arrays with their checkers:
    var MyFormat = "<>$#!@%&^*()[]_+{}:;?|'\"\,./~-=`";
    var checkerFormat = false;
    var checkerNumber = false;
    var Numbers = "1234567890";
    var ErrorOfLength = "";
    //Checking Long:
    if(((userName.length >= 5) && (userName.length <= 20)) && ((Password.length >= 5) && (Password.length <= 20)))
    {
            //taking every char of password:
        for(let i = 0; i < Password.length; i++)
        {
            
            
                //checking for numbers:
                for(let num =0; num < Numbers.length; num++)
                {
                    if(checkerNumber){
                        break;
                    }
                    if (Password[i] == Numbers[num])
                    {
                        checkerNumber =true;
                    }
                }
                //checking for special characters:
                for(let f=0; f < MyFormat.length ; f++)
                {
                    if(checkerFormat){
                        break;
                    }
                    if(Password[i] == MyFormat[f])
                    {
                        checkerFormat = true;
                    }
                }

                if(checkerFormat && checkerNumber){
                    break;
                }
            
            
        }
        if ( checkerFormat &&  checkerNumber)
            {
                document.getElementById('generalError').innerHTML = "";
                return true;
            }
            else {
                document.getElementById('generalError').innerHTML = "Your Password is not useful for our website.";
                return false;
            }
    }
    else{
        
        

        if(! ((userName.length > 4) && (userName.length < 19)) )
        {
            ErrorOfLength = "username";
        }
        if(!((Password.length > 4) && (Password.length < 19)))
        {
            if(ErrorOfLength == "username")
            {
                ErrorOfLength = ErrorOfLength + " and password";
            }
            else{
                ErrorOfLength = "password";
            }
        }
        document.getElementById('generalError').innerHTML = "Your "+ ErrorOfLength +" not useful for our website.";
        return false;
    }
    
}
//Checking username and password on the website memory:
function CheckingBoth(userName, Password)
{
    //added memories on the website as username and password:
    let Website_userName = ['Ferivonus','Fahrettin'];
    let Website_Password = ['Co*de9','MyC*de8'];
    var Returner = false;
    //checking on memories with for loop:
    for (var i = 0; i < 2; i++)
    {
        if ((Website_userName[i] == userName) && (Website_Password[i] == Password)){
            //if its true, it will break the for loop for making clear.
            Returner =true;
        }
    }
    if(Returner==false)
    {
        //error code:
        document.getElementById('generalError').innerHTML = "I guess, you wrote wrong.";                
    }
    else{
        document.getElementById('generalError').innerHTML = "";
    }
    return Returner;
}
//Checking the operations of UsefulPassword and TrueAccount:
function ChangingWebPage(UsefulPassword,TrueAccount)
{
    if(UsefulPassword && TrueAccount)
    {
        //The website will change.
    }
    else{
        //The website will not change.
        event.preventDefault();

    }
}

function isSet(userName,Password){
    var controller = 2;
    var Empty="";

    if((userName == Empty) || (Password == Empty))
    {
        document.getElementById('generalError').innerHTML = "";
    }

    if(userName == Empty)
    {
        
        controller = controller - 1;
        //Type username Error:
        
        document.getElementById('UsernameError').innerHTML = "Username is required";      
                  
    }
    else{
        document.getElementById('UsernameError').innerHTML = "";      

    }
    if(Password == Empty)
    {
        controller = controller - 1;
        document.getElementById('PasswordError').innerHTML = "Password is required";                
    }
    else{
        document.getElementById('PasswordError').innerHTML = "";      

    }
    if(controller == 2){  
        document.getElementById('generalError').innerHTML = "";
        return true;
    }
    else {
       
        document.getElementById('generalError').innerHTML = "";
        return false;
    }
}


function LoginFunc()
{
    //starting with teaching to machine about the variables types:
    var userName ="", Password="";

    var UsefulPassword = true;
    var TrueAccount = false;
    var Setted = false;

    userName = document.getElementById('username').value;
    Password = document.getElementById('password').value;

    Setted = isSet(userName, Password);
    if(Setted){
       UsefulPassword = CheckingFormat(userName, Password);

       if(UsefulPassword)
       {
        TrueAccount = CheckingBoth(userName, Password);
       }
    }
    
    ChangingWebPage(UsefulPassword,TrueAccount);
}