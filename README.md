# Authenticatetion
PHP Authentication function, that can use to store your password or other personal data (including links, names, and anything that you need to decrypt and use somewhere in your code).

---

## Authenticate function
You can use it to encrypt and decryt your data, that you need to decrypt somewhere in your code. It uses 'AES-256-CBC' hashing funcion, with a secret key, that you need to change in the function (needs to be 16 characters).

First, open the `authenticate.php` file and change the $key variable. It can be a word or just randomly generated characters, but it needs to be exact 16 characters.
```
$key = 'SECRET_KEY_HERE'; // needs to be 16 characters
```
Then you need to import the file to use the function, use the following: `require './PATH/TO/authenticate.php';`

After you changed the key and imported the file, you can easily use the function: `encrypt('TYPE', $sting);`
You can use the following types: `encrypt` or `decrypt`. If you use anything else, the function will return with the following: `Undefined authentication method!`

---

## Password function
This function can encrypt

You can use it to encrypt and decryt your data, that you need to decrypt somewhere in your code. It uses 'AES-256-CBC' hashing funcion, with a secret key, that you need to change in the function (needs to be 16 characters).

First, open the `authenticate.php` file and change the $key variable. It can be a word or just randomly generated characters, but it needs to be exact 16 characters.
```
$key = 'SECRET_KEY_HERE'; // needs to be 16 characters
```
Then you need to import the file to use the function, use the following: `require './PATH/TO/authenticate.php';`

After you changed the key and imported the file, you can easily use the function: `encrypt('TYPE', $sting);`
