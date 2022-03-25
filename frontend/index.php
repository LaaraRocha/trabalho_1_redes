<?php
const url = 'http://localhost:3080/enviar-mensagem?';
$retorno = '';

    if (isset($_POST['client'])) {
        $mensagemPost = array('mensagem' => $_POST['client']);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, url.http_build_query($mensagemPost));
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //enable headers
        curl_setopt($ch, CURLOPT_HEADER, 1);
        $retorno = curl_exec($ch);

        curl_close($ch);
    }
?>

<!DOCTYPE html>
<html lang="ptbr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Chamada http</title>
    <link rel="stylesheet" type="text/css" href="./resources/style.css" media="screen" />
</head>
    <body>

        <form method="post">
            <fieldset class="msgcliente">
            <div class="cliente">
                <legend><strong>Digite sua mensagem</strong></legend>
                <br>
                <label for=clientela"">Origem</label>
                <br>
                <input type="text" id="clientela" name="client" required="required" placeholder="Mensagem do cliente">

                <input type="submit" id="enviar" name="enviar_mensagem" value="Envia">
            </div>
            </fieldset>

            <fieldset class="msg">
            <div class="mensagem">
                <pre>
                    <?php
                        $tmp = explode("\n",$retorno);
                        echo $tmp[11]
                    ?>
                </pre>
            </div>
            </fieldset>

            <fieldset class="serv">
            <div class="servidor">
                <pre>
                    <?php
                        var_dump($retorno);;
                    ?>
                </pre>
            </div>
            </fieldset>
        </form>

    </body>
</html>
