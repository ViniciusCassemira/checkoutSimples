let nomeCartao = document.getElementById("nomeCartao");
let cvcCartao = document.getElementById("cvcCartao");
let valCartao = document.getElementById("valCartao");
let numeroCartao = document.getElementById("numeroCartao")

let nomeCartaoCheck = document.getElementById('nomeCartaoCheck')
let cvcCartaoCheck = document.getElementById('cvcCartaoCheck')
let valCartaoCheck = document.getElementById('valCartaoCheck')
let numeroCartaoCheck = document.getElementById('numeroCartaoCheck')

let nomeCartaoNoCheck = document.getElementById('nomeCartaoNoCheck')
let cvcCartaoNoCheck = document.getElementById('cvcCartaoNoCheck')
let valCartaoNoCheck = document.getElementById('valCartaoNoCheck')
let numeroCartaoNoCheck = document.getElementById('numeroCartaoNoCheck')

let nomeCartaoVisual = document.getElementById("nomeCartaoVisual");
let numeroCartaoVisual = document.getElementById("numeroCartaoVisual");
let cvcCartaoVisual = document.getElementById("cvcCartaoVisual");
let valCartaoVisual = document.getElementById("valCartaoVisual");

let form = document.getElementById('form');
let avisoPreencher = document.getElementById('avisoPreencher');
let botaoFinalizar = document.getElementById('botaoFinalizar');

form.addEventListener('input',function(){
    let inputVazio = true
    const inputs = form.querySelectorAll('input')
    
    inputs.forEach(inputAtual => {
        if(inputAtual.value.trim()!== ""){
            inputVazio = false
        }
    });
    
    //verificando se o cartão foi preenchido corretamente
    if (cvcCartao.value.length === 3 && valCartao.value.length === 5 && numeroCartao.value.length === 19 && nomeCartao.value.length > 0){
        botaoFinalizar.disabled = false;
        botaoFinalizar.style.backgroundColor = 'rgb(24, 92, 180)';
        botaoFinalizar.style.cursor = 'pointer';
        avisoPreencher.style.visibility = 'hidden';
    }
    else{
        avisoPreencher.style.visibility = 'visible';
        botaoFinalizar.disabled = true;
        botaoFinalizar.style.backgroundColor = 'rgb(128, 147, 172)';
        botaoFinalizar.style.cursor = 'default';
    }

    if (inputVazio === true){
        avisoPreencher.style.visibility = 'hidden'
    }
})

//incluindo o nome no cartao no cartão visual
nomeCartao.addEventListener('input', function(){
    nomeCartaoVisual.textContent = nomeCartao.value || "Cardholder name"
    if(nomeCartao.value){
        document.getElementById('nomeCartaoCheck').style.display = 'block'
    }else{
        document.getElementById('nomeCartaoCheck').style.display = 'none'
    }

});

cvcCartao.addEventListener('input', function(){
    cvcCartaoNoCheck.style.display = 'none'
    let cvcCartao = this.value
    cvcCartao = cvcCartao.replace(/\D/g,"")

    cvcCartaoVisual.innerText = cvcCartao || "cvc"
    this.value = cvcCartao

    if(cvcCartao.length === 3){
        cvcCartaoNoCheck.style.display = 'none'
        cvcCartaoCheck.style.display = 'block'
    }else{
        cvcCartaoCheck.style.display = 'none'
    }
})
cvcCartao.addEventListener('focusout',function(){
    if(cvcCartao.value.length !== 0 && cvcCartao.value.length !== 3){
        cvcCartaoNoCheck.style.display = 'block'
    }else{
        cvcCartaoNoCheck.style.display = 'none'
    }
}) 


//formatando e incluindo o número do cartão no cartao visual
numeroCartao.addEventListener('input', function(){
    numeroCartaoNoCheck.style.display = 'none'
    let numeroCartao = this.value
    numeroCartao = numeroCartao.replace(/\D/g,"")

    if(numeroCartao.length >4 && numeroCartao.length <=8){
        numeroCartao = numeroCartao.replace(/(\d{4})(\d+)/,"$1 $2")
    }else if(numeroCartao.length >8 && numeroCartao.length <=12){
        numeroCartao = numeroCartao.replace(/(\d{4})(\d{4})(\d+)/,"$1 $2 $3")
    }else if(numeroCartao.length>12){
        numeroCartao = numeroCartao.replace(/(\d{4})(\d{4})(\d{4})(\d+)/,"$1 $2 $3 $4")
    }

    this.value = numeroCartao
    numeroCartaoVisual.textContent = numeroCartao|| "xxxx-xxxx-xxxx-xxxx"

    if(numeroCartao.length === 19){
        numeroCartaoCheck.style.display = 'block'
        numeroCartaoNoCheck.style.display = 'none'
    }else{
        numeroCartaoCheck.style.display = 'none'
    }
});
numeroCartao.addEventListener('focusout',function(){
    if(numeroCartao.value.length !== 0 && numeroCartao.value.length !== 19){
        numeroCartaoNoCheck.style.display = 'block'
    }else{
        numeroCartaoNoCheck.style.display = 'none'
    }
}) 

//formatando e incluiindo a val no cartao visual
valCartao.addEventListener('input', function(){
    valCartaoNoCheck.style.display = 'none'
    //setando a variável com o valor de quem chamou a func.
    let valCartao = this.value
    //substituindo qualquer valor que nao seja numérico 
    //por um espaço vazio ("") 
    valCartao = valCartao.replace(/\D/g,"")
    
    if(valCartao.length>2){
        valCartao = valCartao.replace(/(\d{2})(\d+)/,"$1/$2")
    }

    this.value = valCartao
    
    if(valCartao.length === 5){
        valCartaoCheck.style.display = 'block'
        valCartaoNoCheck.style.display = 'none'
    }else{
        valCartaoCheck.style.display = 'none'
    }

    valCartaoVisual.textContent = valCartao || "mm/aa"
})
valCartao.addEventListener('focusout',function(){
    if(valCartao.value.length !== 0 && valCartao.value.length !== 5){
        valCartaoNoCheck.style.display = 'block'
    }else{
        valCartaoNoCheck.style.display = 'none'
    }
})