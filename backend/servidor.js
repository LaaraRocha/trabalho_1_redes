const express = require('express');
const app = express(), bodyParser = require("body-parser");
const port = 3080;

app.use(function(req, res, next) {
    res.header("Access-Control-Allow-Origin", "*");
    res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
    next();
});

app.use(bodyParser.json());

app.get('/enviar-mensagem', async (req, res) => {
    console.log(req.query.mensagem);
    if (req.query.mensagem == 'teste') {
        res.json('teste ok!');
    } else {
        res.json('teste tambem ok');
    }
});

app.listen(port, () => {
    console.log(`Server on na porta:${port}`);
});