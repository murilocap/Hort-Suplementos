const header = document.querySelector("header");
const espaco = document.querySelector("#top-espaco");

var headerHeight = header.clientHeight;

espaco.style.height = headerHeight + 10 + 'px';


function upFileBtn() {
    const foto_prod = document.getElementById('foto-prod');
    const selector = document.getElementById('selector');
    if (foto_prod.value != null) {
        selector.classList.add('file-btn-ok');
        selector.innerHTML = "Arquivo Escolhido!";
    }
}