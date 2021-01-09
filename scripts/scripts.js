function validacaoEmail(field) {
	usuario = field.value.substring(0, field.value.indexOf("@"));
	dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);

	if ((usuario.length >=1) &&
		(dominio.length >=3) &&
		(usuario.search("@")==-1) &&
		(dominio.search("@")==-1) &&
		(usuario.search(" ")==-1) &&
		(dominio.search(" ")==-1) &&
		(dominio.search(".")!=-1) &&
		(dominio.indexOf(".") >=1)&&
		(dominio.lastIndexOf(".") < dominio.length - 1)) {
			
		}
		else{
			alert("E-mail invalido");
		}
}

function mascara(field){

	var campo = field.value;

   if(isNaN(campo[campo.length-1])){ 
   	field.value = campo.substring(0, campo.length-1);
   	return;
   }
   
   if (campo.length == 3 || campo.length == 7) field.value += ".";
   if (campo.length == 11) field.value += "-";

}

function validaCampos(form) {
	if (form.nome.value == '') {
		alert("Nome obrigatorio!");
		return false;
	} else if (form.email.value == '') {
		alert("E-mail obrigatorio!");
		return false;
	} else if (form.cpf.value == '') {
		alert("CPF obrigatorio!");
		return false;
	} 

	var campos = [form.op1.checked,
				  form.op2.checked,
				  form.op3.checked,
				  form.op4.checked,
				  form.op5.checked,
				  form.op6.checked,
				  form.op7.checked];
	var cont = 0;
	var competencias = '';
	form.competencias.value = '';
	for (campo in campos) {
		if (campos[campo]){
			if (competencias != '') 
				competencias = competencias + ',';

			if (campo == 0) { 
				competencias = competencias + 'Gerência de Projetos';
			} else if (campo == 1) {
				competencias = competencias + 'Controle Financeiro';
			} else if (campo == 2) {
				competencias = competencias + 'Controle de Estoque';
			} else if (campo == 3) {
				competencias = competencias + 'Desenvolvimento front end';
			} else if (campo == 4) {
				competencias = competencias + 'Banco de dados';
			} else if (campo == 5) {
				competencias = competencias + 'Desenvolvimento Back End';
			} else if (campo == 6) {
				competencias = competencias + 'DevOps';
			}

			cont++;
		}
	}
	if (cont == 0 || cont > 3 ) {
		alert("Necessário marcar de 1 a 3 Competências!");
		return false;
	} 
	form.competencias.value = competencias;

	return true;
}
