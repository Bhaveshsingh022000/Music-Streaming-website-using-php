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
