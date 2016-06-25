$(document).ready( function() {
  $("#form").validate({
  rules:{
    nome:{
      required:true, minlength:3,
    },
    login:{
      required:true, minlength:3,
    },
    senha:{
      required:true, minlength:3,
    },
    preco:{
      required:true, number:true,
    },
    imagem:{
      required:true, minlength:3,
    },
  },

  messages:{
    nome:{
      required: "Informe o nome",
      minlength: "O nome deve conter, no mínimo, 3 caracteres",
    },
    login:{
      required: "Informe o login",
      minlength: "O login deve conter, no mínimo, 3 caracteres",
    },
    senha:{
      required: "Informe a senha",
      minlength:"A sua senha deve conter, no mínimo, 3 caracteres",
    },
    preco:{
      required: "Informe o preço",
      number: "Deve ser um número !",
    },
    imagem:{
      required:"Informe o endereço da imagem",
      minlength:"a imagem deve estar no diretorio como: ./nomepasta/",
    },
  },
});
$("#formII").validate({
rules:{
  nome:{
    required:true, minlength:3,
  },
  login:{
    required:true, minlength:3,
  },
  senha:{
    required:true, minlength:3,
  },
  preco:{
    required:true, number:true,
  },
  imagem:{
    required:true, minlength:3,
  },
},

messages:{
  nome:{
    required: "Informe o nome",
    minlength: "O nome deve conter, no mínimo, 3 caracteres",
  },
  login:{
    required: "Informe o login",
    minlength: "O login deve conter, no mínimo, 3 caracteres",
  },
  senha:{
    required: "Informe a senha",
    minlength:"A sua senha deve conter, no mínimo, 3 caracteres",
  },
  preco:{
    required: "Informe o preço",
    number: "Deve ser um número !",
  },
  imagem:{
    required:"Informe o endereço da imagem",
    minlength:"a imagem deve estar no diretorio raiz: ../imagens/",
  },
},
});
});
