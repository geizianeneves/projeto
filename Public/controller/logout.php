<?php

declare(strict_types = 1);

require_once('./../../vendor/autoload.php');

// finaliza a sessão
session_destroy();

// retorna para a index.php
header('Location: '. BASE_URL . 'index.php');

?>