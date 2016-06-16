	$( document ).ready( function(){
		 $("#calcular").click( function(){
			 var amplitude = parseFloat($("#amplitude").val());
			 var intervalo = parseFloat($("#intervalo").val());
			 var mag = (Math.log10(amplitude) + (3*Math.log10(8*intervalo)) - 2.92);
			 var imprime
			 if ( isNaN(mag) == true){
				 imprime = "Por favor, informe a Amplitude e/ou o Intervalo de tempo ";
 				//$("#resultado").val(imprime);
 			}
 		  else if (mag<3.5){
				imprime =  String(mag.toFixed(2));
				imprime = imprime + " - Geralmente não sentido, mas gravado.";
 			}

 			else if (mag >= 3.5 && mag <= 5.4){
				imprime = String(mag.toFixed(2));
				imprime = imprime + " - Às vezes sentido, mas raramente causa danos.";
 			}

 			else if (mag>=5.5 && mag<=6){
				imprime = String(mag.toFixed(2));
				imprime = imprime + " - Pode causar danos importantes em edifícios mal construidos. Provoca apenas danos ligeiros em edifícios bem construídos";
 			}

 			else if (mag>=6.1 && mag<=6.9){
				imprime = String(mag.toFixed(2));
				imprime = imprime + " - Pode ser destruidor em áreas habitadas num raio de até 100Km do epicentro" ;
 			}

			else if (mag>=7 && mag<=7.9){
				imprime = String(mag.toFixed(2));
				imprime = imprime + " - Grande terremoto. Pode provocar danos graves em zonas vastas";
 			}
			else{
				imprime = String(mag.toFixed(2));
				imprime = imprime + " - Enorme terremoto. Pode causar danos sérios num raio de várias centenas de quilómetros em torno do epicentro";
		 	}

			$("#resultado").val(imprime);
			mag = 0;
			imprime ="";
		});
	});
