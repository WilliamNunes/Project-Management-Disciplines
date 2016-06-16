
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
					 if( !valida_radios( name('grupo1') ) ){
								alert( 'Nenhuma opção do Grupo1 marcada!' );
									 erro = true;
									 $("#sabonete").focus();
					 }
					 else if( !valida_radios( name('grupo2') ) ){
								alert( 'Nenhuma opção do Grupo2 marcada!' );
								erro = true;
								$("#algodaodoce").focus();
					 }
					 else if( !valida_radios( name('grupo3') ) ){
								alert( 'Nenhuma opção do Grupo3 marcada!' );
								erro = true;
								$("#maqlavar").focus();
					 }
					 else if( !valida_radios( name('grupo4') ) ){
								alert( 'Nenhuma opção do Grupo4 marcada!' );
								erro = true;
								$("#chave").focus();
					 }
					 if( erro )
							return false;

					//verificação
					 var ctrl = 0;
					 var acertos = " :" ;
					 var opcoes = name('grupo1')
					 for( var i=0; i<opcoes.length; i++ ){
							if( opcoes[i].checked == true && opcoes[i].value == "sabonete" ){
									acertos = acertos + "\n grupo1 = Sabonete";
							}
					 }
					 var opcoes = name('grupo2')
					 for( var i=0; i<opcoes.length; i++ ){
							if( opcoes[i].checked == true && opcoes[i].value == "algodaodoce" ){
									acertos = acertos + "\n grupo2 = Algodão-Doce";
							}
					 }
					 var opcoes = name('grupo3')
					 for( var i=0; i<opcoes.length; i++ ){
							if( opcoes[i].checked == true && opcoes[i].value == "maqlavar" ){
									acertos = acertos + "\n grupo3 = Maquina de Lavar";
							}
					 }
					 var opcoes = name('grupo4')
					 for( var i=0; i<opcoes.length; i++ ){
							if( opcoes[i].checked == true && opcoes[i].value == "chave" ){
									acertos = acertos + "\n grupo4 = Chave";
							}
					 }

					alert("Você acertou" + acertos );

					alert( 'As respostas corretas serão marcadas ! volte e veja !' );

					if (ctrl != 4){

						$("#sabonete").attr("checked",true);
						$("#algodaodoce").attr("checked",true);
						$("#maqlavar").attr("checked",true);
						$("#chave").attr("checked",true);
					}
				});

				$("#limpar").click( function(){
					var opcoes = ["grupo1","grupo2","grupo3","grupo4"];

					for (var i = 0; i < opcoes.length; i++) {

						radios = name(opcoes[i]); 
						for( var j = 0; j<radios.length; j++ ){

				 		radios[j].checked = false;
						}
					}
				});
		});
