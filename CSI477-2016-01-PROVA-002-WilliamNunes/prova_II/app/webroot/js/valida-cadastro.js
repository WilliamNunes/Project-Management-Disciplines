$(document).ready( function() {
  $("#AlunoIndexCadastroForm").validate({
  rules:{
    "data[Aluno][nome]":{
      required:true, minlength:3,
    },
    "data[Aluno][login]":{
      required:true, minlength:7, maxlength:7,
    },
  "data[Aluno][senha]":{
      required:true, minlength:6,
    },
  },

  messages:{
    "data[Aluno][nome]":{
      required: "Informe o seu nome",
      minlength: "O seu nome deve conter, no mínimo, 3 caracteres",
    },
    "data[Aluno][login]":{
      required: "Informe sua matricula para cadastro",
      minlength: "Informe uma matricula válida e com apenas números",
      maxlength: "Informe uma matricula válida e com apenas números",

    },
    "data[Aluno][senha]":{
      required: "Informe uma senha",
      minlength:"A sua senha deve conter, no mínimo, 6 caracteres",
    },
  },
});
$("#AlunoEditarForm").validate({
rules:{
  "data[Aluno][nome]":{
    required:true, minlength:3,
  },
  "data[Aluno][login]":{
    required:true, minlength:7, maxlength:7,
  },
"data[Aluno][senha]":{
    required:true, minlength:6,
  },
},

messages:{
  "data[Aluno][nome]":{
    required: "Informe o seu nome",
    minlength: "O seu nome deve conter, no mínimo, 3 caracteres",
  },
  "data[Aluno][login]":{
    required: "Informe sua matricula para cadastro",
    minlength: "Informe uma matricula válida e com apenas números",
    maxlength: "Informe uma matricula válida e com apenas números",

  },
  "data[Aluno][senha]":{
    required: "Informe uma senha",
    minlength:"A sua senha deve conter, no mínimo, 6 caracteres",
  },
},
});
$("#HoraIndexForm").validate({
rules:{
  "data[Hora][horas_estag]":{
    number:true,
  },
  "data[Hora][horas_atvidade]":{
    number:true,
  },
  "data[Hora][horas_tcc]":{
    number:true,
  },
},

messages:{
  "data[Hora][horas_estag]":{
    number: "Informe um numero",
  },
  "data[Hora][horas_atvidade]":{
    number: "Informe um numero",
  },
  "data[Hora][horas_tcc]":{
    number: "Informe um numero",
  },
},
});
});

function enviardados(){
  if(document.getElementById("AlunoCursoId").value == 0){
    alert( "Informe um curso!" );
    document.getElementById("AlunoCursoId").focus();
    return false;
  }
}
