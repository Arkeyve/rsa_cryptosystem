<html>
<head>
	<title>RSA Cryptosystem</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
</head>

<body>
	<center>
		RSA Cryptosystem - Decryption
		<table style="text-align: center;">
			<tr>
				<td><a href="./index.php" target="_blank">Generate Keys</a></td>
			</tr>
			<tr>
				<td><a href="./encryption.php" target="_blank">Encrypt Using Public Key (e,n)</a></td>
			</tr>
			<tr>
				<td><a href="./decryption.php" target="_blank">Decrypt Using Private Key (d,n)</a></td>
			</tr>
		</table>
		<table>
			<tr>
				<td class="narrow">Enter Private Key (d)</td>
				<td><textarea class="field" id="d_val" placeholder="private key (d)"></textarea></td>
			</tr>
			<tr>
				<td class="narrow">Enter Public Key (n)</td>
				<td><textarea class="field" id="n_val" placeholder="public key (n)"></textarea></td>
			</tr>
			<tr>
				<td class="narrow">Enter Ciphertext</td>
				<td><textarea class="field" id="ciphertext" placeholder="ciphertext"></textarea></td>
			</tr>
			<tr>
				<td class="narrow"><input type="submit" id="decrypt_button" class="button" value="Decrypt"></td>
				<td><textarea class="field" id="plaintext"></textarea></td>
			</tr>
		</table>
	</center>
</body>

<script>
var cipher, d, n, plaintext;
document.getElementById('decrypt_button').onclick = function() {
	d = document.getElementById('d_val').value;
	n = document.getElementById('n_val').value;
	cipher = document.getElementById('ciphertext').value;
	if(d && n && cipher) {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if(this.readyState === 4 && this.status === 200) {
				plaintext = this.responseText;
				document.getElementById('plaintext').value = plaintext;
			}
		}
		xhttp.open('GET', './handler.php?ciphertext=' + cipher + '&d=' + d + '&n=' + n);
		xhttp.send();
	}
}
</script>
</html>