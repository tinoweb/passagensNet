<?php

    require 'vendor/autoload.php'; // If you're using Composer (recommended)
    // Comment out the above line if not using Composer
    // require("<PATH TO>/sendgrid-php.php");
    // If not using Composer, uncomment the above line and
    // download sendgrid-php.zip from the latest release here,
    // replacing <PATH TO> with the path to the sendgrid-php.php file,
    // which is included in the download:
    // https://github.com/sendgrid/sendgrid-php/releases


	$data        = $_POST;
    $name        = $data['nome'];
    $email       = $data['email'];
    $telefone    = $data['telefone'];
    $origem         = $data['origem'];
    $destino        = $data['destino'];
    $passAdulto      = $data['passAdulto'];
    $passCrianca     = $data['passCrianca'];
    $passBebe        = $data['passBebe'];
    $dataIda     = $data['dataIda'];
    $dataChegada = $data['dataChegada'];

    $body = 
    	'
		   <strong>Nome:</strong>         ' . $name .         '<br>
           <strong>Email:</strong>        ' . $email .        '<br>
		   <strong>Telefone:</strong>     ' . $telefone .     '<br>
		   <strong>Origem:</strong>       ' . $origem .       '<br>
           <strong>Destino:</strong>      ' . $destino .      '<br>
		   <strong>Passgem Adulto:</strong>   ' . $passAdulto .   '<br>
           <strong>Passgem Criança:</strong>  ' . $passCrianca .  '<br>
           <strong>Passgem Bebe:</strong>     ' . $passBebe .     '<br>
           <strong>Data Ida:</strong>     ' . $dataIda .      '<br>
		   <strong>Data chegada:</strong> ' . $dataChegada .  '<br>
		';

    $email = new \SendGrid\Mail\Mail(); 
    $email->setFrom("deivydcorretor7441@gmail.com", "Contato Site");
    $email->setSubject("Simulação passagem");
    $email->addTo("tino477@gmail.com", "Meu contato site");
    $email->addContent(
        "text/html", "<p> Olá Olan Novais estou fazendo simulações de passagens no site passagem.net
        Os dados para contato são: </p>" .$body
    );
    $sendgrid = new \SendGrid('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');
    try {
        $response = $sendgrid->send($email);
        print $response->statusCode() . "\n";
        print_r($response->headers());
        print $response->body() . "\n";
    } catch (Exception $e) {
        echo "<pre>";
        print_r( 'Caught exception: '. $e->getMessage() ."\n");
    }