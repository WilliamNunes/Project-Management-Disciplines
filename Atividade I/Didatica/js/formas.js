function name( el ){
		 return document.getElementsByName( el );
	}

	function valida_radios( radios ){
		 for( var i=0; i<radios.length; i++ ){
				 if( radios[i].checked )
						return true;
				 }
					return false;
	}

	$( document ).ready( function(){
		 $("#validar").click( function(){
				 var erro = false;
					 if( !valida_radios( name('forma1') ) ){
								alert( 'Nenhuma opção marcada na forma verde!' );
									 erro = true;
									 $("#circulo").focus();
					 }
					 else if( !valida_radios( name('forma2') ) ){
								alert( 'Nenhuma opção marcada na forma vermelha!' );
								erro = true;
								$("#quadrado").focus();
					 }
					 else if( !valida_radios( name('forma3') ) ){
								alert( 'Nenhuma opção marcada na forma amarela!' );
								erro = true;
								$("#retangulo").focus();
					 }
					 else if( !valida_radios( name('forma4') ) ){
								alert( 'Nenhuma opção marcada na forma azul!' );
								erro = true;
								$("#triangulo").focus();
					 }
					 if( erro )
							return false;


					//verificação
					 var ctrl = 0;
					 var acertos = " :";
					 var opcoes = name('forma1');
					 for( var i=0; i<opcoes.length; i++ ){
							if( opcoes[i].checked == true && opcoes[i].value == "circulo" ){
									acertos = acertos + "\n forma verde = Círculo";
									ctrl = ctrl +1;
							}
					 }
					 var opcoes = name('forma2');
					 for( var i=0; i<opcoes.length; i++ ){
							if( opcoes[i].checked == true && opcoes[i].value == "quadrado" ){
									acertos = acertos + "\n forma vermelha = Quadrado";
									ctrl = ctrl +1;
							}
					 }
					 var opcoes = name('forma3');
					 for( var i=0; i<opcoes.length; i++ ){
							if( opcoes[i].checked == true && opcoes[i].value == "retangulo" ){
									acertos = acertos + "\n forma amarela = Retângulo";
									ctrl = ctrl +1;
							}
					 }
					 var opcoes = name('forma4');
					 for( var i=0; i<opcoes.length; i++ ){
							if( opcoes[i].checked == true && opcoes[i].value == "triangulo" ){
									acertos = acertos + "\n forma azul = Triângulo";
									ctrl = ctrl +1;
							}
					 }

					alert("Você acertou" + acertos );

					if (ctrl != 4){

						alert( 'As respostas corretas serão marcadas ! volte e veja !' );

						$("#circulo").attr("checked",true);
						$("#quadrado").attr("checked",true);
						$("#retangulo").attr("checked",true);
						$("#triangulo").attr("checked",true);
					}
		});

		$("#limpar").click( function(){
			var opcoes = ["forma1","forma2","forma3","forma4"];

			for (var i = 0; i < opcoes.length; i++) {

				radios = name(opcoes[i]); 
				for( var j = 0; j<radios.length; j++ ){

				 radios[j].checked = false;
				}
			}
		});
	});