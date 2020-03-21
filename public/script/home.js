let descTxt = "مبادرة من قسم تكنولوجيا التعليم بكلية التربية النوعية بجامعة الفيوم، تهدف لتوظيف أدوات ومحتوى التعليم الإلكتروني لخدمة المجتمع للتوعية ضد فيروس كورونا.",
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
