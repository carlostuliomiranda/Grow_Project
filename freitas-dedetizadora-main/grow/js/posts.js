var pagina = 0;
var todos = 0;
RequestPosts();

function RequestPosts(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            document.getElementById("loading").className = "d-none";
            document.getElementById("conteudo").innerHTML += xhttp.response[0];
            if(xhttp.response[1]){
                document.getElementById("mais").className = "d-none";
            }
        }
    }
    xhttp.responseType = 'json';
    xhttp.open('POST', 'php/request-posts.php');
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("pagina="+pagina+"&todos="+todos);
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

function DeletePost(id_post){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            if(xhttp.response)
                location.reload();
        }
    }
    xhttp.open('POST', 'php/processa-delete-post.php');
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+id_post);
}