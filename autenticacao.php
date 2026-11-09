<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start(['use_strict_mode' => 1, 
        'cookie_httponly' => true, 'cookie_samesite' => 'Lax']);
}
function exigirLogin():void{
    if(empty($_SESSION['usuario_id'])){
        header('Location: login.php');
        exit;
    }
}

?>