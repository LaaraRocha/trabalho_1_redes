<?php
const url = 'http://localhost:3080/enviar-mensagem?';
$retorno = '';

    if (isset($_POST['client'])) {
        $mensagemPost = array('mensagem' => $_POST['client']);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, url.http_build_query($mensagemPost));
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        $retorno = json_decode($json, true);
    }
?>

<!DOCTYPE html>
<html lang="ptbr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Chamada http</title>
</head>
    <body>

        <form method="post">
            <div class="cliente">
                <legend><strong>Digite sua mensagem</strong></legend>
                <label for=clientela"">Origem</label>
                <input type="text" id="clientela" name="client" required="required" placeholder="Mensagem do cliente">

                <input type="submit" id="enviar" name="enviar_mensagem" value="Envia">
            </div>

            <div class="mensagem">
                <pre><?
                        echo $retorno;
                    ?></pre>
            </div>

            <div class="servidor">
                <pre></pre>
            </div>
        </form>

    </body>
</html>
