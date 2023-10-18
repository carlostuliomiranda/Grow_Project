const checkbox = document.getElementById("lembrar"),
    usr = document.getElementById("usuario"),
    btnEnviar = document.getElementById("enviar");

if(localStorage.checkbox && localStorage.checkbox == "on"){
    checkbox.setAttribute("checked", "checked");
    usr.value = localStorage.user;
}else{
    checkbox.removeAttribute("checked");
    usr.value = "";
}

function LembrarDeMim(){
    if(checkbox.checked && usr.value !== ""){
        localStorage.checkbox = "on";
        localStorage.user = usr.value;
    }else{
        localStorage.clear();
    }
}