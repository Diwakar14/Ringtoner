function upload() {
    var msg = document.getElementById('msg');
    var category = document.getElementById('category').value;
    var description = document.getElementById('description').value;
    var tags = document.getElementById('tags').value;
    var ring_file = document.getElementById('ringtone_file').files[0];
    var progress = document.getElementById('progressID');
    var upload_btn = document.getElementById('upload');
    
    if (category == '' || description == '' || tags == '') {
        alert('You have to fill all the fields');
    } else {

        if (ring_file.size > 2000000) {
            alert("Size can't be greater than 2MB");
        }
        else if (ring_file.type != "audio/mp3") {
            alert("Only Music Files are allowed")
        } else {
            upload_btn.style.display = 'none';
            var formdata = new FormData();
            formdata.append("cat", category);
            formdata.append("desc", description);
            formdata.append("tag", tags);
            formdata.append("ringtoneFile", ring_file);

            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.open("POST", "upload_ringtone.php");
            ajax.send(formdata);
            function progressHandler(event) {
                var percent = Math.round(event.loaded / 1024) / Math.round(event.total / 1024) * 100;
                console.log(percent);
                progress.style.width = percent + "%";
            }
            function completeHandler(event) {
                msg.innerHTML = event.target.responseText;
            }
            function errorHandler(event) {
                msg.innerHTML = "Error Occured during Upload.";
            }
            function abortHandler(event) {
                msg.innerHTML = "Error Occured during Upload.";
            }

        }
    }
}


