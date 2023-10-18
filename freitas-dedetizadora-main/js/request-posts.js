var pagina = 0;
var todos = 0;
RequestPosts();

function RequestPosts(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            document.getElementById("conteudo").innerHTML += xhttp.response[0];
            if(xhttp.response[1]){
                document.getElementById("mais").className = "d-none";
            }
        }
    }
    xhttp.responseType = 'json';
    xhttp.open('GET', '../php/request-posts.php?pagina='+pagina+'&todos='+todos);
    xhttp.send();
}

function SetaOffset(v){
    if(v >= 0)
        pagina += Math.trunc(v);
    else{
        pagina += 1;
        todos = 1;
    }
    RequestPosts();
}
