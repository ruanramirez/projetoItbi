<?php


namespace Source\App;


class Web
{
    public function home($data)
    {
        echo "<h1>Web Home</h1>";
        var_dump($data);
    }

    public function report($data)
    {
        echo "<h1>Avaliação de Laudos</h1>";
        var_dump($data);

        $url = URL_BASE;
        require __DIR__ . "/../../themes/reportReview.php";
    }

    public function error($data)
    {
        echo "<h1>Web Erro {$data["errcode"]}</h1>";
        var_dump($data);
    }
}