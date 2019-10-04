var inputTel = document.querySelector('input[name=inputTel]');
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
  let i = t.value.length;
  let saida = mask.substring(1,0);
  let texto = mask.substring(i)
  if (texto.substring(0,1) != saida){
  t.value += texto.substring(0,1);
  }
}

let botao = document.getElementById("botaoadm").onclick = function(){
  window.location = ('./admin/login.php');
}

let inputNome = document.querySelector('input[name=inputNome]');
inputNome.onblur = function(){
  inputNome.setAttribute('class', 'form-control is-valid');
}

var emailInput = document.querySelector('input[name=inputEmail4]');
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

var inputZip = document.querySelector('input[name=inputZip]');
inputZip.setAttribute('maxlength', '9');
inputZip.onblur = function(){
  getCep(inputZip.value);
}
inputZip.onkeypress = function(){
  mascara(this, '#####-###');
}

async function getCep(endereco) {
  let erroZip = document.getElementById('erroZip');
  try {
    const response = await axios.get(`https://viacep.com.br/ws/${endereco}/json/`);
    const {bairro, localidade, logradouro, uf} = response.data;

    inputZip.setAttribute('class', 'form-control is-valid');
    erroZip.innerText = ('');
    
    setCep(bairro, localidade, logradouro, uf);
  } catch (error) {
    
    inputZip.setAttribute('class', 'form-control is-invalid');
    erroZip.innerText = ('Endereço CEP inválido!');
  }
}

function setCep(bairro, localidade, logradouro, uf){
  let inputAddress = (document.querySelector('input[name=inputAddress]').value = `${logradouro}, Bairro ${bairro}`, 
    (document.querySelector('input[name=inputAddress]').setAttribute('class', 'form-control is-valid')));
  let inputCity = (document.querySelector('input[name=inputCity]').value = localidade, 
    (document.querySelector('input[name=inputCity]').setAttribute('class', 'form-control is-valid')));
  let inputState = (document.querySelector('input[name=inputState]').value = uf, 
    (document.querySelector('input[name=inputState]').setAttribute('class', 'form-control is-valid')));
}