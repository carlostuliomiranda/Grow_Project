var pagina = 0;
RequestUploads();

function RequestUploads(){
    var midia = document.getElementById("midia"),
        ordenar = document.getElementById("ordenar"),
        pesquisar = document.getElementById("pesquisar");
    
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            document.getElementById("container-imagens").innerHTML = xhttp.response;
        }
    }

    xhttp.open('POST', 'php/request-uploads.php');
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("midia="+midia.value+"&ordenar="+ordenar.value+"&pesquisar="+pesquisar.value+"&pagina="+pagina);
}

function RenameFile(nome, extensao, id){
    var oldName = document.getElementById('editar-nome').value;
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            CloseModal();
            OpenFile(id, xhttp.response);
        }
    }

    xhttp.open('POST', 'php/renomear-midia.php');
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("newName="+nome+"&oldName="+oldName+"&extensao="+extensao);
}

function OpenFile(id, msg){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            var modal = document.getElementById('modal');
            modal.innerHTML = xhttp.responseText;
            modal.showModal();
            document.getElementById('response').innerHTML = msg;
        }
    }
    xhttp.open('POST', 'php/request-modal.php');
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+id);
}

function DeleteFile(id){
    if(confirm("Deseja mesmo apagar este arquivo?")){
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function(){
            if(xhttp.readyState == 4 && xhttp.status == 200){
                window.location.href = window.location.href;
            }
        }
    
        xhttp.open('POST', 'php/deletar-midia.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id="+id);
    }
}

function CloseModal(){
    document.getElementById('modal').close();
}

function SetaOffset(v){
    if(v >= 0)
        pagina += Math.trunc(v);
    else
        pagina = v;
    RequestUploads();
}