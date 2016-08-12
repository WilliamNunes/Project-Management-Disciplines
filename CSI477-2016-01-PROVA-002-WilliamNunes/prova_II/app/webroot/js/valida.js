$(document).ready( function() {
  $("#form").validate({
  rules:{
    nome:{
      required:true, minlength:3,
    },
    login:{
      required:true, minlength:7, maxlength:7,
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
      required: "Informe o sua matricula para login",
      minlength: "Informe uma matricula válida e com apenas números",
      maxlength: "Informe uma matricula válida e com apenas números",

    },
    senha:{
      required: "Informe uma senha",
      minlength:"A sua senha deve conter, no mínimo, 6 caracteres",
    },
  },
});
});
