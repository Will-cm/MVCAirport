<?php


/*
 * Si la carpeta public no es el directorio raíz
 * el register accedera a la carpeta del proyecto, redirija a la carpeta public.
 */

header('Location: public/');

die();