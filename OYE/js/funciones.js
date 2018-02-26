var validaNombre;
var validaApellidos;
var validaUsuario;
var validaContrasena;
var validaTel;
var validaEmail;
var validaEdad;
var error="";

function validarNombre(){
    var idnombre=document.getElementById('nombre')
    var nombre=this.value;
    nombre=nombre.trim();
    var divG = document.getElementById('formnom');
    var span = document.getElementById('spannom');
    var divP = document.getElementById('infonombre');
    if(nombre.length>0){
        if(nombre.length>25){
            error="<strong class='error'>La longitud máxima es de 25 caracteres.</strong>"
            divG.className="has-error has-feedback";
            //span.className="glyphicon glyphicon-remove form-control-feedback";
            validaNombre=false;
        }else if(!(/^([a-zA-Z]{1,25})$/.test(nombre))){
            error="<strong class='error'>Solo puedes utilizar letras.</strong>"
            divG.className="has-error has-feedback";
            //span.className="glyphicon glyphicon-remove form-control-feedback";
            validaNombre=false;
        }else{
            idnombre.className="form-control";
            divG.className="has-success has-feedback";
            //span.className="glyphicon glyphicon-ok form-control-feedback";
            error="";
            validaNombre=true;
        }
        divP.innerHTML=error;
    }else{
        divP.innerHTML=" ";
        idnombre.className="form-control";
    }
}

function validarApellidos(){
    var idnombre=document.getElementById('nombre')
    var nombre=this.value;
    nombre=nombre.trim();
    var divG = document.getElementById('formnom');
    var divP = document.getElementById('infonombre');
    var span = document.getElementById('spannom');
    if(nombre.length>0){
        if(nombre.length>25){
            error="<strong class='error'>La longitud máxima es de 25 caracteres.</strong>"
            divG.className="has-error has-feedback";
            span.className="glyphicon glyphicon-remove form-control-feedback";
            validaNombre=false;
        }else if(!(/^([a-zA-Z]{1,25})$/.test(nombre))){
            error="<strong class='error'>Solo puedes utilizar letras.</strong>"
            divG.className="has-error has-feedback";
            span.className="glyphicon glyphicon-remove form-control-feedback";
            validaNombre=false;
        }else{
            idnombre.className="form-control";
            divG.className="has-success has-feedback";
            span.className="glyphicon glyphicon-ok form-control-feedback";
            error="";
            validaNombre=true;
        }
        divP.innerHTML=error;
    }else{
        divP.innerHTML=" ";
        idnombre.className="form-control";
    }
}

function validarEmail(){
    var idemail=document.getElementById('email')
    var email=this.value;
    email=email.trim();
    var divG = document.getElementById('formmail');
    var divP = document.getElementById('infoemail');
    var span = document.getElementById('spanmail');
    if(email.length>0){
        if(!(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email))){
            error="<strong class='error'>Correo erróneo.</strong>"
            divG.className="has-error has-feedback";
            span.className="glyphicon glyphicon-remove form-control-feedback";
            validarEmail=false;
        }else if(email.length>50){
            error="<strong class='error'>La longitud máxima es de 50 caracteres.</strong>"
            divG.className="has-error has-feedback";
            span.className="glyphicon glyphicon-remove form-control-feedback";
            validarEmail=false;
        }else{
            divG.className="has-success has-feedback";
            span.className="glyphicon glyphicon-ok form-control-feedback";
            error="";
            validarEmail=true;
        }
        divP.innerHTML=error;
    }else{
        divP.innerHTML="";
        idemail.className="form-control";
    }
}

function validarTel(){
    var idtel=document.getElementById('tel');
    tel=this.value;
    var divG = document.getElementById('formtel');
    var divP = document.getElementById('infotel');
    var span = document.getElementById('spantel');
    if(tel.length>0){
        if(!(/[0-9]{9}/.test(tel))){
            error="<strong class='error'>Se debe de introducir un teléfono correcto.</strong>";
            divG.className="has-error has-feedback";
            span.className="glyphicon glyphicon-remove form-control-feedback";
            validaTel=false;
        }else{
            divG.className="has-success has-feedback";
            span.className="glyphicon glyphicon-ok form-control-feedback";
            error="";
            validaTel=true;
        }
        divP.innerHTML=error;
    }else{
        divP.innerHTML=" ";
    }
}

//MANEJADOR DE EVENTOS
window.onload=function(){
    var nombre=document.getElementById('nombre');
    var enviar=document.getElementById('enviar');
    nombre.onblur=validarNombre;
    enviar1=document.getElementById('enviar');
    enviar1.onclick=function(){
    }
    setInterval(function () {
        if (validarNombre==true && 
        	validarTel==true && 
        	validarEmail==true && 
        	alidaTextA==true && 
        	validaCaja==true)
            enviar1.removeAttribute('disabled','disabled');
        else
        enviar1.setAttribute('disabled','disabled');
    },50)
}