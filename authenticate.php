  
/*
 *                   Created by:
 *                     tokrist
 *
 *      You can remove the credit lines freely.
 */
<?php
    function authenticate($action, $string) {
        $encrypt_method = 'AES-256-CBC';
        $key = 'SECRET_KEY_HERE'; // needs to be 16 characters
        $iv = substr(hash('sha256', $key), 0, 16);
        
        if (strlen($key) != 16) return 'Invalid key length!';

        if($action == 'encrypt') {
            return base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
        } else if($action == 'decrypt') {
            return openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        } else {
            return 'Undefined authentication method!';
        }
    }

    function password($action, $string) {
        if($action == 'encrypt') {
            return password_hash($string, PASSWORD_ARGON2ID, ['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 3]);
        } else if($action == 'verify') {
            return password_verify($string, $password); // $string is the input (plain text), $password is the hash that you queryed or stored
        } else {
            return 'Undefined authentication method!';
        }
    }
?>
