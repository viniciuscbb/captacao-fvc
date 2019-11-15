var imprimir = document.getElementById('imprimir');
imprimir.onclick = function(){
  destroi();
  window.print(tabela);
  window.location.reload();
}

function destroi(){
  var acoes = document.getElementById('acoes');
  var logo = document.querySelector('div.logo');
  var pesquisar = document.querySelector('div.form-row');
  var footer = document.querySelector('footer');
  var section = document.querySelector('section');
  var sectionContent = document.querySelector('section.content');
  var body = document.querySelector('body');

  section.style.margin = '0px';
  section.style.borderRadius = '0px';
  sectionContent.style.border = '0px';

  body.style.background = 'url()';
  
  logo.style.display = 'none';
  pesquisar.style.display = 'none';
  imprimir.style.display = 'none';
  footer.style.display = 'none';
  acoes.style.display = 'none';
  //editar.style.display = 'none';
  
  for(id = 0; id<document.querySelectorAll('span.badge-info').length; id++){
    var remove = document.querySelectorAll('span.badge-info')[id];
    remove.style.display = 'none';
  }

}