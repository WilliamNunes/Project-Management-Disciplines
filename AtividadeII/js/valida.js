$(document).ready( function() {
  $("#form").validate({
  rules:{
    nome:{
      required:true, minlength:3,
    },
    login:{
      required:true, email:true,
    },
    senha:{
      required:true, minlength:6,
    },
  },

  messages:{
    nome:{
      required: "Informe o seu nome",
      minlength: "O seu nome deve conter, no mínimo, 3 caracteres",
    },
    login:{
      required: "Informe o seu e-mail para login",
      email: "Informe um e-mail válido",
    },
    senha:{
      required: "Informe uma senha",
      minlength:"A sua senha deve conter, no mínimo, 6 caracteres",
    },
  },
});
});
