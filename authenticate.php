<?php
    function authenticate($action, $string) {
        $output = '';
        $encrypt_method = 'AES-256-CBC';
        $key = 'SECRET_KEY_HERE'; // needs to be 16 characters
        $iv = substr(hash('sha256', $key), 0, 16);
        
        if($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        } else {
            $output = 'Undefined authentication method!';
        }
        
        return $output;
    }

    function password($action, $string) {
        $output = "";
        
        if($action == 'encrypt') {
            $output = password_hash($string, PASSWORD_ARGON2ID, ['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 3]);
        } else if($action == 'decrypt') {
            $output = password_verify($string, $password); // $sting is the input (plain text), $password is the hash that you queryed or stored
        } else {
            $output = 'Undefined authentication method!';
        }
        
        return $output;
    }
?>
