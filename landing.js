function showSignUp(x){
    if(x==true){
        document.getElementById("sign").style.display = "block";
    }
    else{
        document.getElementById("sign").style.display = "none";
    }
}
function showLogIn(x){
    if(x==true){
        document.getElementById("log").style.display = "block";
    }
    else{
        document.getElementById("log").style.display = "none";
    }
}
function switchSL(x){
    if(x==true){
        document.getElementById("log").style.display = "block";
        document.getElementById("sign").style.display = "none";
    }
    else{
        document.getElementById("log").style.display = "none";
        document.getElementById("sign").style.display = "block";
    }
}

function check(){
    var flag = true;
    var name = document.forms['signUpForm']['name'].value;
    var phone = document.forms['signUpForm']['phone'].value;
    var email = document.forms['signUpForm']['email'].value;
    var pass = document.forms['signUpForm']['password'].value;
    var conpass = document.forms['signUpForm']['confPassword'].value;
    var gender = document.forms['signUpForm']['gender'].value;
    var terms = document.forms['signUpForm']['terms'].value;
    
    if(name == ''){    
        document.forms['signUpForm']['name'].focus();
        flag = false;
    }
    
    else if(!(name.match(/\b^[a-zA-Z ]{5,25}\b/i))){        
        document.forms['signUpForm']['name'].focus();       
        flag = false;
    }
    else if(phone = ''){        
        document.forms['signUpForm']['phone'].focus();        
        flag = false;
    }
    else if(Number.isInteger(phone)){        
        document.forms['signUpForm']['phone'].focus();        
        flag = false;
    }
    else if(phone.match(/[0-9]{10}/) ){   
        console.log(phone.toString().length);     
        document.forms['signUpForm']['phone'].focus();        
        flag = false;
    }
    else if(email == ''){       
        document.forms['signUpForm']['email'].focus();        
        flag = false;
    }
    else if(!(email.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))){
        document.forms['signUpForm']['email'].focus();
        flag = false;
    }
    else if(!(pass.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/))){        
        document.forms['signUpForm']['password'].focus();
        flag = false;
    }
    else if(pass != conpass){       
        document.forms['signUpForm']['confPassword'].focus();
        flag = false;
    }
    else if(gender ==""){
        document.forms['signUpForm']['gender'].focus();
        flag = false;
    }
    else if(terms ==""){
        document.forms['signUpForm']['terms'].focus();
        flag = false;
    }
    
    if(flag){
        $("#tr").slideUp();
        $("#tr2").show(1090);
        $('#prevForm').show(1090);    
}
    
}
