var user = {email: "", password: ""};
var emailLogin = "";
var passwordLogin = "";

document.getElementById("buttonLogin").addEventListener("click", loginUser);

function moveRight(id, html)
{
    var element = document.getElementById(id);
    element.className = "moveRight";
    element.addEventListener('webkitAnimationEnd', function( event ) { 
    element.parentNode.removeChild(element);
    var node = document.createElement("LI");                 
    var textnode = document.createTextNode("");         
    node.appendChild(textnode); 
    node.id = "child";                             
    document.getElementById("mainView").appendChild(node);
    node.innerHTML = html; 
    node.className += "animated bounceInLeft";
    }, false );
}

function moveLeft(id, html)
{
  var element = document.getElementById(id);
  element.className = "moveLeft";
  element.addEventListener('webkitAnimationEnd', function( event ) {
    element.parentNode.removeChild(element);
    var node = document.createElement("LI");                 
    var textnode = document.createTextNode("");         
    node.appendChild(textnode); 
    node.id = "child";                             
    document.getElementById("mainView").appendChild(node);
    node.innerHTML = html; 
    node.className += "animated bounceInRight";
  //view.innerHTML = html;
  }, false );
}

function moveUp(id, html)
{
    var element = document.getElementById(id);
    element.className = "animated bounceOutUp";
    element.addEventListener('webkitAnimationEnd', function( event ) {
    element.parentNode.removeChild(element);
    var node = document.createElement("LI");                 
    var textnode = document.createTextNode("");         
    node.appendChild(textnode); 
    node.id = "child";                             
    document.getElementById("mainView").appendChild(node);
    node.innerHTML = html; 
    node.className += "animated bounceInUp";
  //view.innerHTML = html;
  }, false );
}

function loginUser()
{
    user.email = emailLogin;
    user.password = passwordLogin;
    var userJSON = JSON.stringify(user);
    var param = "user="+userJSON;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
        if (xhttp.readyState == 4 && xhttp.status == 200) 
        {
            var text = xhttp.responseText;
            if(text)
            {
                var emailInput = document.getElementById("emailLogin");
                var passwordInput = document.getElementById("passwordLogin");
                emailInput.style.borderColor = "green";
                passwordInput.style.borderColor = "green";
                moveUp("child", text);
                localStorage.setItem("user", user.email);
            }
            else
            {
                var emailInput = document.getElementById("emailLogin");
                var passwordInput = document.getElementById("passwordLogin");
                var message = document.getElementById("loginEmail");
                message.innerHTML = "Invalid data";
                message.style.display = "block";
                emailInput.style.borderColor = "red";
                passwordInput.style.borderColor = "red";
            }
        }
    };
    xhttp.open("POST", "index.php/user/authenticate", true);
    xhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhttp.send(param);
}

function loadRegisterForm()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
        if (xhttp.readyState == 4 && xhttp.status == 200) 
        {
            var text = xhttp.responseText;
            if(text)
            {
                moveLeft("child", text);
                setDisplayLocal(text, "Register");
                document.title = "Register";
            }
        }
    };
    xhttp.open("POST", "index.php/user/loadRegister", true);
    xhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhttp.send();
}

function loadUserLog()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
        if (xhttp.readyState == 4 && xhttp.status == 200) 
        {
            var text = xhttp.responseText;
            if(text)
            {
                moveLeft("child", text);
                setDisplayLocal(text, "User Log");
                document.title = "User Log";
            }
        }
    };
    xhttp.open("POST", "index.php/user/loadRegister", true);
    xhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhttp.send();
}

function loadPage2()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
        if (xhttp.readyState == 4 && xhttp.status == 200) 
        {
            var text = xhttp.responseText;
            if(text)
            {
                fadeOut("child", text);
            }
        }
    };
    xhttp.open("POST", "wife/loadPage2", true);
    xhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhttp.send();
}



function fadeOut(id, html)
{
  var element = document.getElementById(id);
  element.className += "animated fadeOut";
  element.addEventListener('webkitAnimationEnd', function( event ) {
    element.parentNode.removeChild(element);
    var node = document.createElement("LI");                 
    var textnode = document.createTextNode("Water");         
    node.appendChild(textnode); 
    node.id = "child";                             
    document.getElementById("mainView").appendChild(node);
    node.innerHTML = html; 
    node.className += "animated slideInRight";
  //view.innerHTML = html;
  }, false );
}

function loadPage3()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
        if (xhttp.readyState == 4 && xhttp.status == 200) 
        {
            var text = xhttp.responseText;
            if(text)
            {
                speed("child", text);
            }
        }
    };
    xhttp.open("POST", "wife/loadPage3", true);
    xhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhttp.send();
}



function speed(id, html)
{
  var element = document.getElementById(id);
  element.className += "animated lightSpeedOut";
  element.addEventListener('webkitAnimationEnd', function( event ) {
    element.parentNode.removeChild(element);
    var node = document.createElement("LI");                 
    var textnode = document.createTextNode("Water");         
    node.appendChild(textnode); 
    node.id = "child";                             
    document.getElementById("mainView").appendChild(node);
    node.innerHTML = html; 
    node.className += "animated flipInY";
  //view.innerHTML = html;
  }, false );
}

function loadPage4()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
        if (xhttp.readyState == 4 && xhttp.status == 200) 
        {
            var text = xhttp.responseText;
            if(text)
            {
                roll("child", text);
            }
        }
    };
    xhttp.open("POST", "wife/loadPage4", true);
    xhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhttp.send();
}

function loadPage5()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
        if (xhttp.readyState == 4 && xhttp.status == 200) 
        {
            var text = xhttp.responseText;
            if(text)
            {
                fade("child", text);
            }
        }
    };
    xhttp.open("POST", "wife/loadPage5", true);
    xhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhttp.send();
}

function roll(id, html)
{
  var element = document.getElementById(id);
  element.className += "animated rollOut";
  element.addEventListener('webkitAnimationEnd', function( event ) {
    element.parentNode.removeChild(element);
    var node = document.createElement("LI");                 
    var textnode = document.createTextNode("Water");         
    node.appendChild(textnode); 
    node.id = "child";                             
    document.getElementById("mainView").appendChild(node);
    node.innerHTML = html; 
    node.className += "animated zoomInUp";
  //view.innerHTML = html;
  }, false );
}

function fade(id, html)
{
  var element = document.getElementById(id);
  element.className += "animated fadeOut";
  element.addEventListener('webkitAnimationEnd', function( event ) {
    element.parentNode.removeChild(element);
    var node = document.createElement("LI");                 
    var textnode = document.createTextNode("Water");         
    node.appendChild(textnode); 
    node.id = "child";                             
    document.getElementById("mainView").appendChild(node);
    node.innerHTML = html; 
    node.className += "animated fadeIn";
  //view.innerHTML = html;
  }, false );
}
function loadLoginForm()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
        if (xhttp.readyState == 4 && xhttp.status == 200) 
        {
            var text = xhttp.responseText;
            if(text)
            {
                moveRight("child", text);
                setDisplayLocal(text, "Login");
                document.title = "Login";
            }
        }
    };
    xhttp.open("POST", "index.php/user/loadLogin", true);
    xhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhttp.send();
}

function VerifyInput(id, id2)
{
    var input = document.getElementById(id);
    if(input.value.length > 7)
    {
        input.style.borderColor = "green";
        var message = document.getElementById(id2);
        message.innerHTML = "";
        message.style.display = "none";
        passwordLogin = input.value;
        enableLogin();
    }
    else
    {
        input.style.borderColor = "red";
        var message = document.getElementById(id2);
        message.innerHTML = "You must enter a password";
        message.style.display = "block";
    }
}

function ValidateLoginEmail(id, id2)  
{
    var inputText = document.getElementById(id);
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
    var message = document.getElementById(id2);
    if(inputText.value.match(mailformat))  
    {  
        inputText.style.borderColor = "green";
        message.innerHTML = "";
        message.style.display = "none";
        emailLogin = inputText.value;
        enableLogin();
    }  
    else  
    {  
        inputText.style.borderColor = "red";
        message.innerHTML = "You must enter a valid email";
        message.style.display = "block";  
    }  
} 

function enableLogin()
{
    var password = document.getElementById("passwordLogin").value;
    if((emailLogin != "") && (password != ""))
    {
        passwordLogin = password;
        var button = document.getElementById("buttonLogin");
        button.disabled = false;
    }
} 



function getRandomColor() 
    {
      var letters = '0123456789ABCDEF'.split('');
      var color = '#';
      for (var i = 0; i < 6; i++ ) {
          color += letters[Math.floor(Math.random() * 16)];
      }
      return color;
    }


    function showMe(id)
    {
      var display = document.getElementById(id).style.display;
      if(display == 'none')
      {
        document.getElementById(id).style.display = "inline-block";
      }
      else
      {
        document.getElementById(id).style.display = "none";
      }

    }

    function changeColor(id)
    {
      document.getElementById(id).style.background = getRandomColor();
      document.getElementById(id).style.color = getRandomColor();
    }

    function showMeClass(classI)
    {
      var display = document.getElementsByClassName(classI).style;
      console.log(display);
      if(display == 'none')
      {
       document.getElementsByClassName(classI).style.display = "inline-block";
       
      }
      else
      {
        document.getElementsByClassName(classI).style.display = "none";
      }
    }

    //register methods

    var nameValue = "";
var emailValue = "";
var passwordValue = "";
var birthdayValue = "";
var newUser = {name_user: '', email: '', password: '', date_birth: ''};



function ValidateEmail(id, id2)  
{
    var inputText = document.getElementById(id);
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
    var message = document.getElementById(id2);
    if(inputText.value.match(mailformat))  
    {  
        emailVerified = VerifyEmail(inputText.value, inputText, message);
        inputText.style.borderColor = "green";
        message.innerHTML = "";
        message.style.display = "none";
        emailValue = inputText.value;
        enableRegister();
    }  
    else  
    {  
        inputText.style.borderColor = "red";
        message.innerHTML = "You must enter a valid email";
        message.style.display = "block";  
    }  
}  

function VerifyName(id, id2)
{
    var inputText = document.getElementById(id);
    var message = document.getElementById(id2);
    if(inputText.value.length < 4)
    {
        var message = document.getElementById(id2);
        message.innerHTML = "User name must be more than 4 characters long";
        message.style.display = "block";
        inputText.style.borderColor = "red";
    }
    else
    {
        var message = document.getElementById(id2);
        message.innerHTML = "";
        message.style.display = "none";
        inputText.style.borderColor = "green";
        nameValue = inputText.value;
        enableRegister();
    }
}

function verifyPassword(id, id2)
{
    var inputText = document.getElementById(id);
    var password = document.getElementById("userPassword").value;
    if(inputText.value != password)
    {
        var message = document.getElementById(id2);
        message.innerHTML = "Passwords entered do not match";
        message.style.display = "block";
        inputText.style.borderColor = "red";
    }
    else
    {
        var message = document.getElementById(id2);
        message.innerHTML = "";
        message.style.display = "none";
        inputText.style.borderColor = "green";
        passwordValue = password;
        enableRegister();
    }
}

function ValidatePassword(id, id2)
{
    var inputText = document.getElementById(id);
    var paswd=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;  
    if(inputText.value.match(paswd))   
    {   
        inputText.style.borderColor = "green"; 
        var message = document.getElementById(id2);
        message.innerHTML = "";
        message.style.display = "none";
        return true;  
    }  
    else  
    {   
        inputText.style.borderColor = "red";
        var message = document.getElementById(id2);
        message.innerHTML = "Password must be 8 characters long and contain 1 number and 1 uppercase letter";
        message.style.display = "block";
        return false;  
    }  
}

//Verify if email is already registered
function VerifyEmail(email, inputText, message)
{
    var param = "email="+email;
    if (email.length == 0) { 
    document.getElementById("txtHint").innerHTML = "";
    return;
    }
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
        if (xhttp.readyState == 4 && xhttp.status == 200) 
        {
            var text = xhttp.responseText;
            if(text === "exists")
            {
                emailVerified = text;
                inputText.style.borderColor = "red";
                message.innerHTML = "Email is already registered";
                message.style.display = "block";
            }
        }
    };
    xhttp.open("POST", "<?php echo site_url('user/VerifyEmail') ?>", true);
    xhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhttp.send(param);
}

function VerifyDate(id, id2)
{
    var inputText = document.getElementById(id);
    var message = document.getElementById(id2);
    var newDate = new Date(inputText.value);
    var curDate = new Date();
    if((newDate.getFullYear() > curDate.getFullYear()) || (newDate.getFullYear() < (curDate.getFullYear()-100)))
    {
        var message = document.getElementById(id2);
        message.innerHTML = "Must be a valid Date";
        message.style.display = "block";
        inputText.style.borderColor = "red";
    }
    else
    {
        var message = document.getElementById(id2);
        message.innerHTML = "";
        message.style.display = "none";
        inputText.style.borderColor = "green";
        birthdayValue = inputText.value;
        enableRegister();
    }
}

function enableRegister()
{
    var button = document.getElementById("buttonRegister");
    //if values are set then the register button is enabled
    if((emailValue != "") && (nameValue != "") && (passwordValue != "") && (birthdayValue != ""))
    {
        button.disabled = false;
    }
}

function registerUser()
{
    //add values to user object
    newUser.name_user = nameValue;
    newUser.email = emailValue;
    newUser.password = passwordValue;
    newUser.date_birth = birthdayValue;
    var userJSON = JSON.stringify(user);
    var param = "user="+userJSON;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
        if (xhttp.readyState == 4 && xhttp.status == 200) 
        {
            var text = xhttp.responseText;
            if(text == "You were registered!")
            {
                document.getElementById('RegisterMessage').innerHTML = text;
                moveLeft("formRegister");
                localStorage.setItem("user", newUser.email);
            }
        }
    };
    xhttp.open("POST", "<?php echo site_url('user/AddNewUser') ?>", true);
    xhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhttp.send(param);
}

function checkLocal()
{
    var user = localStorage.getItem("user");
    var text = localStorage.getItem("display");
    var title = localStorage.getItem("title");
    // if(user)
    // {

    // }
    if(text)
    {
        var element = document.getElementById("child");
        element.display = "none";
        element.parentNode.removeChild(element);
        var node = document.createElement("LI");                 
        var textnode = document.createTextNode("");         
        node.appendChild(textnode); 
        node.id = "child";                             
        document.getElementById("mainView").appendChild(node);
        node.innerHTML = text; 
        node.className += "animated zoomInUp";
        document.title = title;
    }
}

function setDisplayLocal(text, title)
{
    localStorage.setItem("display", text);
    localStorage.setItem("title", title);
}
