var itens = $(".status");

for(var i = 0; i < itens.length; i++){
    var iten = itens[i];
    var conteudo = iten.textContent;

    if(conteudo == 'finalizada'){
      iten.classList.add("disponivel");
    }
    else if(conteudo == 'confirmada'){
      iten.classList.add("disponivel");
    }
    else if(conteudo == 'solicitada'){
      iten.classList.add("solicitada");
    }
    else if(conteudo == 'recusada'){
      iten.classList.add("recusada");
    }
}
