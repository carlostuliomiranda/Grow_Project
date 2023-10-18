var pagina = 0;

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

function DeselecionaImagem(){
    document.querySelector("#id-icone").innerHTML = '';
    let img = document.querySelector("#img-icone");
        img.setAttribute("src", "");
        img.className = 'd-none';
    let video = document.querySelector("#video-icone");
        video.setAttribute("src", "");
        video.className = 'd-none';
    CloseModal();
}

function AtualizaDados(titulo, subtitulo, conteudo, id_upload, tipo_upload){
    if(id_upload)
        SelecionaImagem(id_upload, tipo_upload);
    document.getElementById("titulo").value = titulo;
    document.getElementById("subtitulo").value = subtitulo;
    editor.setData(conteudo);
}

function AtualizaPost(id_post){
    IniciaLoading();
    let res = document.querySelector("#response");
    res.className = 'd-none';
    
    let titulo = document.getElementById("titulo").value,
        subtitulo = document.getElementById("subtitulo").value,
        conteudo = editor.getData(),
        id_upload = document.getElementById("id-icone").innerHTML;

    var xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            let res = document.querySelector("#response");
            res.className = 'd-block';
            res.innerHTML = xhttp.response;
            EncerraLoading();
        }
    }

    xhttp.open('POST', 'php/processa-atualizar-post.php');
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("titulo="+titulo+"&subtitulo="+subtitulo+"&conteudo="+conteudo+"&id_upload="+id_upload+"&id_post="+id_post);

}

function IniciaLoading(){
    let load = document.querySelector("#loading");
    load.className = "d-block";
}

function EncerraLoading(){
    let load = document.querySelector("#loading");
    load.className = "d-none";
}