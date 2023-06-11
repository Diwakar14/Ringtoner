function likedMe(u,id)
{
//   console.log(u);
//    console.log(id);
    if(!u || !id){
        alert("You need to login to like the Ringtone.");
        window.location = 'uploader/users/login/login';
    }else{
        var nlike = document.getElementById('nlikes'+id);
        var like=1;
        var formdata = new FormData();
        formdata.append("user",u);
        formdata.append("song_id",id);
        formdata.append("like",like);
        
        
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);
        ajax.open("POST", "soc.php");
        ajax.send(formdata);
        function progressHandler(event) {
           
        }
        function completeHandler(event) {
            nlike.innerHTML = event.target.responseText;
        }
        function errorHandler(event) {
            msg.innerHTML = "Error Occured during Upload.";
        }
        function abortHandler(event) {
            msg.innerHTML = "Error Occured during Upload.";
        }    
    }
    
}

function dislikedMe(u,id)
{
//   console.log(u);
//    console.log(id);
    if(!u || !id){
        alert("You need to login to like the Ringtone.");
        window.location = 'uploader/users/login/login';
    }else{
        var ndislike = document.getElementById('ndislikes'+id);
        var dislike=0;
        var formdata = new FormData();
        formdata.append("user",u);
        formdata.append("song_id",id);
        formdata.append("dislike",dislike);
        
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);
        ajax.open("POST", "soc.php");
        ajax.send(formdata);
        function progressHandler(event) {
           
        }
        function completeHandler(event) {
            ndislike.innerHTML = event.target.responseText;
        }
        function errorHandler(event) {
            msg.innerHTML = "Error Occured during Upload.";
        }
        function abortHandler(event) {
            msg.innerHTML = "Error Occured during Upload.";
        }    
    }
    
}

