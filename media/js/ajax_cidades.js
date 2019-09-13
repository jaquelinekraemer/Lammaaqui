		function executar_ajax() {

			var estado = window.document.querySelector('#id_estado').value;
			var cidade = window.document.querySelector('#id_cidade');

			cidade.disabled = false;


			$.ajax ({

				url: 'cidades.php',
				type: 'POST',
				data: {estado:estado},
				dataType: 'HTML'

			}).done(function(mostrar){

				var mostrar = JSON.parse(mostrar);
				$('#id_cidade').empty();

				function alterar_selects(cid) {

					$('#id_cidade').append('<option value="' + cid + '">' + cid + '</option>');

				}

				mostrar.forEach(alterar_selects);

			});

		}
