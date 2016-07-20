$(document).ready( function() {
  $("#form").validate({
  rules:{
    nome:{
      required:true, minlength:3,
    },
    login:{
      required:true,
    },
    senha:{
      required:true,
    },
  },

  messages:{
    nome:{
      required: "Informe o seu nome",
      minlength: "O seu nome deve conter, no mínimo, 3 caracteres",
    },
    login:{
      required: "Informe o seu login para continuar",
    },
    senha:{
      required: "Informe uma senha",
      },
  },
});
});
