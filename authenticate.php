<?php
    function authenticate($action, $string) {
        $output = "";
        $encrypt_method = "AES-256-CBC";
        $key = "SECRET_KEY_HERE";
        $iv = substr(hash('sha256', $key), 0, 16);
        
        if($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        } else {
            $output = "Undefined authentication method!";
        }
        return $output;
    }
?>
