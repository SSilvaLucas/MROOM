var buscaInput = document.querySelector("#busca-iten");

buscaInput.addEventListener("input", function(){
    var itens = document.querySelectorAll(".iten");
    if(this.value.length > 0){
        for(var i = 0; i < itens.length; i++){
            var iten = itens[i];

            var nome = iten.querySelector(".info-nome").textContent;

            var expressao = new RegExp(this.value, "i");

            if(expressao.test(nome)){
                iten.classList.remove("invisivel");
            }else{
                iten.classList.add("invisivel");
            }
        }
    }else{
        for(var i = 0; i < itens.length; i++){
            var iten = itens[i];

            iten.classList.remove("invisivel");
        }
    }
});
