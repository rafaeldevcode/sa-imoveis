<?php

verifyMethod(405, 'POST');

use Src\Email\BodyEmail;
use Src\Email\EmailServices;

$title = 'Nova solicitação para anunciar imóvel';

$email = new EmailServices(BodyEmail::announce(json_decode(json_encode(requests()), true), $title), $title);
$email->setEmailTo(env('SMTP_EMAIL_TO'));
$email->send();

session([
    'message' => 'Imóvel enviado com sucesso! Aguarde nosso retorno.',
    'type' => 'success'
]);

return header(route('/anunciar-imovel', true), true, 302);
