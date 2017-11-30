/*
Made by Lucas Silva
License: none (public domain)
*/
document.querySelector(".abre-menu").onclick = function(){
    document.documentElement.classList.add("menu-ativo");
};

document.querySelector(".fecha-menu").onclick = function(){
    document.documentElement.classList.remove("menu-ativo");
};

document.documentElement.onclick = function(event){
    if(event.target === document.documentElement){
        document.documentElement.classList.remove("menu-ativo");
    }
};