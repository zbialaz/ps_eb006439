<?php

/**
 * DEFINIÇÕES GLOBAIS DO PROJETO
 */

 define('FRONTEND_TITLE', 'Bicho Novo: Seu Petshop Animal');
 define('BACKEND_TITLE', 'Bicho Novo');
 define('TIMEZONE', 'America/Sao_Paulo');
 define('DISPLAY_ERRORS', 1);
 define('PATH_PROEJETO', __DIR__ . '/../');
 define('SALT_SENHA', '123ABC');

 /**
  * DEFINIÇÕES DO PATH DO ARQUIVO
  */

  define('URL', 'http://localhost');
  define('TEMPLATES', PATH_PROJETO . 'templates/');
  define('TBACKEND', TEMPLATES . 'backend/');
  define('TFRONTEND', TEMPLATES . 'frontend/');

  /**
 * DEFINIÇÕES DO BANCO DE DADOS
 */
define('DB_HOST',   'localhost');
define('DB_SCHEMA', 'ps_eb006439');
define('DB_USER',   'root');
define('DB_PASSWORD', '');

/**
 * DIFINIÇÕES DE ENVIO DE EMAIL
 */
define('MAIL_HOST', 'smtp.gmail.com');
define('MAIL_PORT',  587);
define('MAIL_NAME', 'Bicho Novo Pet Shop');
define('MAIL_USER', '');
define('MAIL_PASS', '');