var inputTel = document.getElementById('inputTel');
inputTel.setAttribute('maxlength', '13');
inputTel.onkeypress = function(){
  mascara(this, '## #####-####');
}
inputTel.onblur = function(){
let erroTel = document.getElementById('erroTel');
  if (inputTel.value.length == 13){
    inputTel.setAttribute('class', 'form-control is-valid');
  }else{
    inputTel.setAttribute('class', 'form-control is-invalid');
    erroTel.innerText = ('Número inválido');
  }
}
function mascara(t, mask){
  var i = t.value.length;
  var saida = mask.substring(1,0);
  var texto = mask.substring(i)
  if (texto.substring(0,1) != saida){
  t.value += texto.substring(0,1);
  }
}

let botao = document.getElementById("botaoadm").onclick = function(){
  window.location = ('./admin/login.php');
}

let inputNome = document.getElementById('inputNome');
inputNome.onblur = function(){
  inputNome.setAttribute('class', 'form-control is-valid');
}

var emailInput = document.getElementById('inputEmail4');
emailInput.onkeypress = function() {mudaInput(false);}

function mudaInput(valor){
  let erroEmail = document.getElementById('erroEmail');
  if(valor){
    emailInput.setAttribute('class', 'form-control is-invalid');
    erroEmail.innerText = ('Email já cadastrado!');
  }else{
    emailInput.setAttribute('class', 'form-control');
    erroEmail.remove();
  }
}

async function getCep(endereco) {
  let inputZip = document.getElementById('inputZip');
  let erroZip = document.getElementById('erroZip');
  try {
    const response = await axios.get(`https://viacep.com.br/ws/${endereco}/json/`);
    const {bairro, cep, localidade, logradouro, uf} = response.data;

    inputZip.setAttribute('class', 'form-control is-valid');
    erroZip.innerText = ('');
    
    setCep(bairro, cep, localidade, logradouro, uf);
  } catch (error) {
    
    inputZip.setAttribute('class', 'form-control is-invalid');
    erroZip.innerText = ('Endereço CEP inválido!');
  }
}

var buscarCep = document.getElementById('inputZip')
buscarCep.onblur = function(){
  getCep(buscarCep.value);
}

function setCep(bairro, cep, localidade, logradouro, uf){
  let inputAddress = (document.getElementById('inputAddress').value = `${logradouro}, Bairro ${bairro}`, 
    (document.getElementById('inputAddress').setAttribute('class', 'form-control is-valid')));
  let inputCity = (document.getElementById('inputCity').value = localidade, 
    (document.getElementById('inputCity').setAttribute('class', 'form-control is-valid')));
  let inputState = (document.getElementById('inputState').value = uf, 
    (document.getElementById('inputState').setAttribute('class', 'form-control is-valid')));
}

var botaoteste = document.getElementById('botaoteste').onclick = function(){
  $('#meuModal').modal(options);
  $('#meuModal').modal('show');

}