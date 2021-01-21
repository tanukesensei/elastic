# elastic
Repositório do teste da E-lastic

O projeto foi feito utilizando as bibliotecas PHPMailer e Correios por bubbstore, nesta última utilizando apenas a funcionalidade de rastreio da API dos correios utilizada pela biblioteca.

Para testar o projeto, deve-se fazer a instalação das bibliotecas utilizando o **composer** que é um gerenciador de dependencias para o PHP.

Utilizes os comandos:
```sh
composer install bubbstore/correios
composer require phpmailer/phpmailer
```

Como era apenas um objeto (OA016913717BR) a ser rastreado, ele foi deixado como fixo no código PHP.

A biblioteca  **Correios** foi utilizada para as informações do objeto fosse m rastreadas nos correios e retornadas para o código.

A biblioteca **PHPMailer** foi utilizada para disparar um HTML gerado com as informações do retornadas do objeto.

Para enviar para enviar o HTML com as informações para o endereço específicado no teste, será preciso adicionar algumas as informações de e-mail nos arquivos *mailer.php* e *index.php*.

No arquivo *mailer.php* será necessário informar o **host**, o **username** e a **senha** do e-mail que irá disparar as mensagens.

```php
$mail->isSMTP();
$mail->Host = 'host.mail';
$mail->SMTPAuth = true;
$mail->Username = 'username';
$mail->Password = 'password';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 2525; 
```

Já no arquivo *index.php*, será necessário informar em *setFrom*  o **endereço** que está mandando e-mail e o **título do e-mail**.
Também precisará ser informado em *addAdress* o **e-mail de quem receberá** a informação do objeto e o *nome do recebedor*.
No campo **mail->body** será informado o conteúdo do e-mail que será enviado. 

```php
$mail->setFrom('no-reply@teste.me', 'Ratreio de objetos');
$mail->addAddress('teste@mail.com', 'Nome do Recebedor');
$mail->Body = "E-mail a ser enviado.";
```
Para o teste foi informado um HTML contendo as ultimas informações do rastreio.
