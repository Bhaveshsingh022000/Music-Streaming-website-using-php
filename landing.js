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
    if(name == ''){
        document.getElementById('popName').setAttribute("data-content", "Name cannot be Empty");
        $('[data-toggle="popover"]').popover('show');
        document.forms['signUpForm']['name'].focus();
        setTimeout(function(){
            $('[data-toggle="popover"]').popover('hide');
        },1500);
        flag = false;
    }
    else if(!(name.match(/\b^[a-zA-Z ]{5,20}\b/i))){
        $('[data-toggle="popover"]').popover();
        document.forms['signUpForm']['name'].focus();
        flag = false;
    }
    else if(Number.isInteger(phone)){
        flag = true;
    }
    else if(phone.toString().length <10 || phone.toString().length >10){
        flag = false;
    }
    else if(email == ''){
        flag = false;
    }
    else if(!(email.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))){
        flag = false;
    }
    else if(!(pass.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/))){
        flag = false;
    }
    else if(pass != conpass){
        flag = false;
    }
    
    
    
    
    if(flag){
        $("#tr").slideUp();
        $("#tr2").show(1090);
        $('#prevForm').show(1090);    
}
    
}
