<?php

require_once "classes/rebot.class.php";

$Rebotar = new Rebot();
$Rebotar->Enviar_email();

if (isset($_POST['permissao'])) {
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Redefinir senha</title>
	<meta charset="utf-8">

	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="media/css/util.css">
	<link rel="stylesheet" type="text/css" href="media/css/main.css">
	<link rel="stylesheet" type="text/css" href="media/css/style.css">
	<link rel="stylesheet" type="text/css" href="media/css/barra.css">
	<!--===============================================================================================-->
</head>
<body>

	<?php require_once "include/navbar.php"; ?>
	


	<div class="limiter">
		<div class="container-login100">		

			<?php if (isset($_SESSION['logado']) and $_SESSION['logado'] == true or isset($_POST['permissao'])) { ?>

				<form class="login100-form" method="POST">

					<div class="login100-form-title p-b-43 text-warning">
						Alterar senha
					</div>

					<p>&nbsp;&nbsp;Um código de verificação foi enviado para seu email!</p>
					<a class="" href="#">&nbsp;&nbsp;Enviar novamente</a>	

					<div class="mt-3 wrap-input100 validate-input" >
						<input class="input100" type="text" name="codigo" required="" placeholder="Codigo de verificação" title="Insira o código enviado para o seu endereço de email." value="">
					</div>	

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="senha" required="" placeholder="Digite a nova senha" value="">
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="senha2" required="" placeholder="Confirme a nova senha">
					</div>

					<br><br>					

					<br><br>

					<div class="container-login100-form-btn ">
						<button class="login100-form-btn btn-warning" name="rebotar" type="submit">Enviar</button>
					</div>

				</form>

			<?php } else { ?>

				<form class="login100-form" method="POST">

					<div class="login100-form-title p-b-43 text-warning">
						Email de verificação
					</div>
					
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="email" name="email" id="email" placeholder="Digite seu email" value="<?php if (isset($_POST['email'])) {echo $_POST['email'];}?>">
					</div>

					<div class="container-login100-form-btn mt-5">
						<button class="login100-form-btn btn-warning" name="permissao" type="submit">Enviar código de verificação</button>
					</div>

				</form>

			<?php } ?>

		</div>
	</div>



	<?php require_once "include/footer.php"; ?>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script src="media/js/main.js"></script>


</body>
</html>
