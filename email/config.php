<?php

require_once "classes/site.class.php";

	// Incluir o PHP Mailer
require_once "class.phpmailer.php";

	// Definições de acesso
define('USUARIO', 'projetophp0@gmail.com');
define('SENHA', 'projeto2019');

	// Função de enviar e-mails
function enviar_email($para, $de, $de_nome, $assunto, $corpo) {

		// Iniciando um novo objeto
	$mail = new PHPMailer();

		// Configurações UTF-8
	$mail->CharSet = "UTF-8";

		// Codificação do e-mail
	$mail->Enconding = "base64";

		// Forçando o e-mail a ter o corpo em HTML
	$mail->IsHTML(true);

		// Ativar o SMTP
	$mail->IsSMTP();

		// Ativando a autenticação
	$mail->SMTPAuth = true;

		// Uso de certificados
	$mail->SMTPSecure = 'ssl';

		// Servidor SMTP utilizado para enviar o e-mail
	$mail->Host = 'smtp.gmail.com';
	// $mail->Host = 'mail.vintersr.ga';

		// Porta do servidor SMTP
	$mail->Port = 465;

		// Usuario do servidor
	$mail->Username = USUARIO;

		// Senha do servidor
	$mail->Password = SENHA;

		// Definindo o remetente
	$mail->SetFrom($de, $de_nome);

		// Definindo o assunto
	$mail->Subject = $assunto;

		// Definindo o corpo do e-mail
	$mail->Body = $corpo;

		// Definindo o destinarário
	$mail->AddAddress($para);

		// Definindo copia do e-mail e cópia oculta
		// $mail->AddCC($copia);
		// $mail->AddBCC($copia_oculta);
	
		// Enviando o e-mail
	if ($mail->Send()) {
		return true;
	} else {
		return $mail->ErrorInfo;
	}

}

class Email extends Site {

	public $tk;

	function __construct() {

		parent::__construct();

	}

	// Gerando um token aleatorio
	public function criar_token($Email) {

		$this->tk = mt_rand(100000, 999999);
		$sql = "SELECT * FROM dados_usuario where Token = $this->tk";
		$query = mysqli_query($this->con, $sql);

		while (mysqli_num_rows($query) <> 0) {

			$this->tk = mt_rand(100000, 999999);

		}

		$sql = "UPDATE dados_usuario SET Token = $this->tk where Email = '$Email'";
		mysqli_query($this->con, $sql);
		return $this->tk;

	}


	// Verificando se email existe no banco de dados
	public function verificar_email($Email) {


		$sql = "SELECT * FROM dados_usuario where Email = '$Email'";
		$query = mysqli_query($this->con, $sql);

		if ($Email <> "") { 

			if (mysqli_num_rows($query) == 1) {

				$this->criar_token($Email);
				$alerta['tipo'] = 'success';
				$alerta['mensagem'] = "Email enviado com sucesso!";
				setcookie('alerta', serialize($alerta), time() + 10);
				return $this->tk;
				header('Location: send_email.php');

			} else {

				$alerta['tipo'] = 'danger';
				$alerta['mensagem'] = "Email não está cadastrado!";
				setcookie('alerta', serialize($alerta), time() + 10);
				return false;
				header('Location: send_email.php');

			}

		} else {

			$alerta['tipo'] = 'warning';
			$alerta['mensagem'] = "Você precisa escrever algum email para enviar!";
			setcookie('alerta', serialize($alerta), time() + 10);
			return false;
			header('Location: send_email.php');

		}

	}



}


?>