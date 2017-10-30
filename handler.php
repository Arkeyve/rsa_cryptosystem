<?php

if(isset($_GET['get_prime'])) {
	echo trim(shell_exec("openssl prime -generate -bits 512"));
}

if(isset($_GET['get_n']) && isset($_GET['p']) && isset($_GET['q'])) {
	$n_fn = trim(shell_exec("python ./rsa_crypto_files/mul.py ".$_GET['p']." ".$_GET['q']));
	echo explode("\n", $n_fn)[0]."|".explode("\n", $n_fn)[1];
}

if(isset($_GET['get_d']) && isset($_GET['e']) && isset($_GET['fn'])) {
	echo trim(shell_exec("python ./rsa_crypto_files/inv.py ".$_GET['e']." ".$_GET['fn']));
}

if(isset($_GET['plaintext']) && isset($_GET['e']) && isset($_GET['n'])) {
	echo trim(shell_exec("python ./rsa_crypto_files/encrypt.py \"".$_GET['plaintext']."\" ".$_GET['e']." ".$_GET['n']));
}

if(isset($_GET['ciphertext']) && isset($_GET['d']) && isset($_GET['n'])) {
	echo trim(shell_exec("python ./rsa_crypto_files/decrypt.py \"".$_GET['ciphertext']."\" ".$_GET['d']." ".$_GET['n']));
}
?>