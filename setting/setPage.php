<?php
    $rootname = 'AdminLTE-3.0.5/';
    function url(){
        $protocol = isset($_SERVER["HTTPS"]) ? 'https://' : 'http://';
        $serverName = $_SERVER['SERVER_NAME'];
        return $rootURL = $protocol.$serverName;
    }


    function dynamicPages($urlname,$pagename){
        if($urlname == 'home'){

            require($pagename);
        }
    }


    //rout('/dashboard','dashdoard.php');

?>