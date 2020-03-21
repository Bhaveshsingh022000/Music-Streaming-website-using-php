function showSignUp(x){
    if(x==true){
        document.getElementById("sign").style.display = "block";
    }
    else{
        document.getElementById("sign").style.display = "none";
    }
}
var signUp = document.getElementById("sign");
window.onclick = function(event){
    if(event.target==signUp){
        this.alert("cj");
    }
}
