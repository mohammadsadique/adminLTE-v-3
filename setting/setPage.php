<?php session_start(); 
    $rootname = 'miniproject/superadmin/';
    function url(){
        $protocol = isset($_SERVER["HTTPS"]) ? 'https://' : 'http://';
        $serverName = $_SERVER['SERVER_NAME'];
        return $rootURL = $protocol.$serverName;
    }
    require($_SERVER['DOCUMENT_ROOT'].'/miniproject/superadmin/dbconnect.php');

    // custom function page
    require($_SERVER['DOCUMENT_ROOT'].'/miniproject/function/function.php');
?>