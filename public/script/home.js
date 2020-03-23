let descTxt = "مبادرة من قسم تكنولوجيا التعليم بكلية التربية النوعية بجامعة الفيوم، تهدف لتوظيف أدوات ومحتوى التعليم الإلكتروني لخدمة المجتمع",
    descElm = document.getElementById("desc");
window.onload = function () {
  loader.style.display = 'none' ;
  document.body.style.overflow = 'auto';
  write();
}
function write(){
  let i = 0;
  let interval = setInterval(function(){
    if(i < descTxt.length){
      descElm.textContent += descTxt[i];
      i += 1;
    } else{
      clearInterval(interval);
    }
  }, 50);

}


var player;

function onYouTubePlayerAPIReady() {
    player = new YT.Player('home-video', {
        events: {
            'onReady': onPlayerReady
        }
    });
}

function onPlayerReady(event) {
    document.getElementById('exampleModal').onblur = function () {
      player.pauseVideo();
    }
    var pauseButton1 = document.getElementById("close-vid-1");
    var pauseButton2 = document.getElementById("close-vid-2");

    pauseButton1.addEventListener("click", function() {
        player.pauseVideo();
    });
    pauseButton2.addEventListener("click", function() {
        player.pauseVideo();
    });
}
