var pagina = 0;
function ProcessaPost(){
    IniciaLoading();
    let res = document.querySelector("#response");
    res.className = 'd-none';

    let titulo = document.getElementById("titulo").value,
        subtitulo = document.getElementById("subtitulo").value;
    let dataEditor = editor.getData();
    let icone = document.getElementById("id-icone").innerHTML;

    var xhttp = new XMLHttpRequest();
    xhttp.responseType = "json";

    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            let res = document.querySelector("#response");
            res.className = 'd-block';
            res.innerHTML = xhttp.response[0];
            if(xhttp.response[1] == 0){
                let img = document.getElementById("img-icone");
                let video = document.getElementById("video-icone");
                document.querySelector("form").reset();
                img.setAttribute("src", "");
                img.className = "d-none";
                video.setAttribute("src", "");
                video.className = "d-none";
                video.innerHTML = "";
                editor.setData("");
            }
            EncerraLoading();
        }
    }

    xhttp.open('POST', 'php/processa-post.php');
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("icone="+icone+"&titulo="+titulo+"&subtitulo="+subtitulo+"&conteudo="+dataEditor);
}

function AbreModal(){
    document.getElementById("modal").showModal();
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            let resposta = xhttp.response;
            document.querySelector(".modal-content").innerHTML = resposta[0];
            RequestUploads();
        }
    }

    xhttp.responseType = "json";
    xhttp.open('GET', 'php/request-modal-icone.php', true);
    xhttp.send();
}            

function CloseModal(){
    document.getElementById("modal").close();
    pagina = 0;
}

function RequestUploads(){
    var midia = document.getElementById("midia").value,
        ordenar = document.getElementById("ordenar").value,
        pesquisar = document.getElementById("pesquisar").value;
    
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            document.querySelector("#container-imagens").innerHTML = xhttp.responseText;
        }
    }

    xhttp.open('POST', 'php/request-uploads-icone.php');
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("midia="+midia+"&ordenar="+ordenar+"&pesquisar="+pesquisar+"&pagina="+pagina);
}

function SetaOffset(v){
    if(v >= 0)
        pagina += Math.trunc(v);
    else
        pagina = v;
    RequestUploads();
}

function SelecionaImagem(id, tipo){
    document.querySelector("#id-icone").innerHTML = id;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            var path = xhttp.response;    
            var img = document.querySelector("#img-icone");
            var video = document.querySelector("#video-icone");
        
            if(tipo == 'imagem'){
                img.setAttribute("src", "arquivos/uploads/"+path);
                video.className = "d-none";
                img.className = "d-block";
            }else if(tipo == 'video'){
                video.setAttribute("src", "arquivos/uploads/"+path);
                img.className = "d-none";
                video.className = "d-block";
            }
            CloseModal();
        }
    }
    xhttp.open('POST', 'php/obter-path.php');
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+id);
}

function IniciaLoading(){
    let load = document.querySelector("#loading");
    load.className = "d-block";
}

function EncerraLoading(){
    let load = document.querySelector("#loading");
    load.className = "d-none";
}