<?php


class PagesController
{
    public function home()
    {
        $first_name = 'Bienvenido  LA WEB DE ';
        $last_name = 'Aerolinea';
        require_once('../app/views/pages/home.php');
    }

    public function error404()
    {
        require_once('../app/views/pages/error-404.html');
    }

    public function error500()
    {
        require_once('../app/views/pages/error-500.html');
    }
}

?>