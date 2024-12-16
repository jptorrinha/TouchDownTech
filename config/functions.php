<?php 
// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);
date_default_timezone_set('America/Sao_Paulo');
/**
 * Conecta com o MySQL usando PDO
 */
function db_connect(){
    $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $PDO;
}

function sanitizeString($string) {
  // matriz de entrada
  $what = array( 'ä','ã','à','á','â','ê','ë','è','é','ï','ì','í','ö','õ','ò','ó','ô','ü','ù','ú','û','À','Á','Ã','É','Ê','Í','Ó','Ô','Õ','Ú','ñ','Ñ','ç','Ç',' ','-','(',')',',',';',':','|','!','"','#','$','%','&','/','=','?','~','^','>','<','ª','º','´',' - ' );
  // matriz de saída
  $by   = array( 'a','a','a','a','a','e','e','e','e','i','i','i','o','o','o','o','o','u','u','u','u','a','a','a','e','e','i','o','o','o','u','n','n','c','c','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-', '-' );
  // devolver a string
  return str_replace($what, $by, $string);
}

/* Cria o hash da senha, usando MD5 e SHA-1 */
function make_hash($str){
	return sha1(md5($str));
}

/* Verifica se o usuário está logado */
function isLoggedIn(){
	if (!isset($_SESSION['logged_in'])){
		return false;
	}
	return true;
}

/* Verifica se o cliente está logado */
function isLoggedInCliente(){
	if (!isset($_SESSION['logged_in_cliente'])){
		return false;
	}
	return true;
}

function create_guid() { // Create GUID (Globally Unique Identifier)
	$guid = '';
	$namespace = rand(11111, 99999);
	$uid = uniqid('', true);
	$data = $namespace;
	$data .= $_SERVER['REQUEST_TIME'];
	$data .= $_SERVER['HTTP_USER_AGENT'];
	$data .= $_SERVER['REMOTE_ADDR'];
	$data .= $_SERVER['REMOTE_PORT'];
	$hash = strtoupper(hash('ripemd128', $uid . $guid . md5($data)));
	$guid = substr($hash,  0,  8) . '-' .
					substr($hash,  8,  4) . '-' .
					substr($hash, 12,  4) . '-' .
					substr($hash, 16,  4) . '-' .
					substr($hash, 20, 12);
	return $guid;
}


