function ValidarMeusDados() {
  var nome = document.getElementById("nome").value;
  var email = $("#email").val();

  if (nome.trim() == "") {
    alert("Preencher o campo nome!");
    $("#nome").focus();
    return false;
  }
  if (email.trim() == "") {
    alert("Preencher o campo email!");
    $("#email").focus();
    return false;
  }
}

function ValidarCategoria() {
  if ($("#nome").val().trim() == "") {
    alert("Preencher o campo Nome da Categoria!");
    $("#nome").focus();
    return false;
  }
}

function ValidarEmpresa() {
  if ($("#nome").val().trim() == "") {
    alert("Preencher o campo Nome da Empresa!");
    $("#nome").focus();
    return false;
  }
}

function ValidarConta() {
  if ($("#banco").val().trim() == "") {
    alert("Preencher o campo Nome do Banco!");
    $("#banco").focus();
    return false;
  }
  if ($("#agencia").val().trim() == "") {
    alert("Preencher o campo Agência!");
    $("#agencia").focus();
    return false;
  }
  if ($("#numero").val().trim() == "") {
    alert("Preencher o campo Número da Conta!");
    $("#numero").focus();
    return false;
  }
  if ($("#saldo").val().trim() == "") {
    alert("Preencher o campo Saldo da Conta!");
    $("#saldo").focus();
    return false;
  }
}

function ValidarMovimento() {
  if ($("#tipo").val() == "") {
    alert("Selecione o campo Tipo do Movimento");
    $("#tipo").focus();
    return false;
  }
  if ($("#data").val().trim() == "") {
    alert("Preencher o campo Data!");
    $("#data").focus();
    return false;
  }
  if ($("#valor").val().trim() == "") {
    alert("Preencher o campo Valor!");
    $("#valor").focus();
    return false;
  }
  if ($("#categoria").val() == "") {
    alert("Selecione uma categoria!");
    $("#categoria").focus();
    return false;
  }
  if ($("#empresa").val().trim() == "") {
    alert("Preencher o campo Empresa!");
    $("#empresa").focus();
    return false;
  }
  if ($("#conta").val().trim() == "") {
    alert("Preencher o campo Conta!");
    $("#conta").focus();
    return false;
  }
}

function ValidarConsultaPeriodo() {
  if ($("#tipoMov").val().trim() == "") {
    alert("Preencher o campo Tipo Movimento!");
    $("#tipoMov").focus();
    return false;
  }
  if ($("#data_inicial").val().trim() == "") {
    alert("Preencher o campo Data Inicial!");
    $("#data_inicial").focus();
    return false;
  }
  if ($("#data_final").val().trim() == "") {
    alert("Preencher o campo Data Final!");
    $("#data_final").focus();
    return false;
  }
}

function ValidarLogin() {
  if ($("#email").val().trim() == "") {
    alert("Preencher o campo Email!");
    $("#email").focus();
    return false;
  }
  if ($("#senha").val().trim() == "") {
    alert("Preencher o campo Senha!");
    $("#senha").focus();
    return false;
  }
}

function ValidarCadastro() {
  if ($("#nome").val().trim() == "") {
    alert("Preencher o campo Nome!");
    $("#nome").focus();
    return false;
  }
  if ($("#email").val().trim() == "") {
    alert("Preencher o campo Email!");
    $("#email").focus();
    return false;
  }
  if ($("#senha").val().trim() == "") {
    alert("Preencher o campo Senha!");
    $("#senha").focus();
    return false;
  }
  if ($("#senha").val().trim().length < 6) {
    alert("A senha deve conter no mínimo 6 caracteres");
    $("#senha").focus();
    return false;
  }
  if ($("#rsenha").val().trim() == "") {
    alert("Preencher o campo Repetir Senha!");
    $("#rsenha").focus();
    return false;
  }
  if ($("#senha").val().trim() != $("#rsenha").val().trim()) {
    alert("O campo Senha e Repetir Senha devem ser iguais");
    $("#rsenha").focus();
    return false;
  }
}
