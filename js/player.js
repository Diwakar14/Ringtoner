window.addEventListener("load", initPlayer);

    function initPlayer() {
       
        //Referencing html dom elements

        var aProgress = document.getElementById('activeProgress');
        var iProgress = document.getElementById('inactiveProgress');
        var currentTime = document.getElementById('play_time');
        var playb = document.getElementById('play');
        var pauseb = document.getElementById('pause');
        var iProgressCTX = iProgress.getContext('2d');

        //Declaring of functions
        drawInactive(iProgressCTX, iProgress);

        playb.addEventListener("click", playfun);
        pauseb.style.display = "none";

        function playfun() {
            if (audio.paused) {
                audio.play();
                playb.style.display = "none";
                currentTime.style.top = "-246px";
                pauseb.style.display = "block";
                currentTime.style.fontSize = "15px";
            }
        }
        pauseb.addEventListener("click", pausefun);

        function pausefun() {
            if (audio.play) {
                audio.pause();
                playb.style.display = "block";
                playb.style.top = "-253px";
                currentTime.style.top = "-265px";
                currentTime.style.fontSize = "10px";
                pauseb.style.display = "none";
            }
        }

        audio.addEventListener("timeupdate", function() {
            seektimeupdate();
        });
        drawProgress(aProgress, 0.1);

        function seektimeupdate() {
            var nt = audio.currentTime * (100 / audio.duration);
            //console.log(Math.round(nt) / 100);
            drawProgress(aProgress, Math.round(nt) / 100);
            var curmins = Math.floor(audio.currentTime / 60);
            var cursecs = Math.floor(audio.currentTime - curmins * 60);
            var durmins = Math.floor(audio.duration / 60);
            var dursecs = Math.floor(audio.duration - durmins * 60);
            if (cursecs < 10) {
                cursecs = "0" + cursecs;
            }
            if (dursecs < 10) {
                dursecs = "0" + dursecs;
            }
            if (curmins < 10) {
                curmins = "0" + curmins;
            }
            if (durmins < 10) {
                durmins = "0" + durmins;
            }
            currentTime.innerHTML = curmins + ":" + cursecs;
            //totalTime.innerHTML = durmins + ":" + dursecs;
        }


    }


    function drawProgress(bar, percentage) {
        var barCTX = bar.getContext("2d");
        var quarterTurn = Math.PI / 2;
        var endingAngle = ((2 * percentage) * Math.PI) - quarterTurn;
        var startingAngle = 0 - quarterTurn;
        bar.width = bar.width;
        barCTX.lineCap = 'square';
        barCTX.beginPath();
        barCTX.lineWidth = 5;
        barCTX.strokeStyle = '#00B4FF';
        barCTX.arc(bar.width / 2, bar.height / 2-1, 50, startingAngle, endingAngle);
        barCTX.stroke();
    }

    function drawInactive(iProgressCTX, iProgress) {
        iProgressCTX.lineCap = 'circle';
        //outer ring
        iProgressCTX.beginPath();
        iProgressCTX.lineWidth = 15;
        iProgressCTX.strokeStyle = '#e1e1e1';
        iProgressCTX.arc(iProgress.width / 2, iProgress.height / 2, 52, 0, 2 * Math.PI);
        iProgressCTX.stroke();

        //progress bar
        iProgressCTX.beginPath();
        iProgressCTX.lineWidth = 0;
        iProgressCTX.fillStyle = '#e6e6e6';
        iProgressCTX.arc(iProgress.width / 2, iProgress.height / 2, 54, 0, 2 * Math.PI);
        iProgressCTX.fill();

        //progressbar caption
        iProgressCTX.beginPath();
        iProgressCTX.lineWidth = 0;
        iProgressCTX.fillStyle = '#fff';
        iProgressCTX.arc(iProgress.width / 2, iProgress.height / 2, 47, 0, 2 * Math.PI);
        iProgressCTX.fill();

    }