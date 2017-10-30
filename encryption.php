<html>
<head>
	<title>RSA Cryptosystem</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
</head>

<body>
	<center>
		RSA Cryptosystem - Encryption
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
				<td class="narrow">Enter Public Key (e)</td>
				<td><textarea class="field" id="e_val" placeholder="public key (e)"></textarea></td>
			</tr>
			<tr>
				<td class="narrow">Enter Public Key (n)</td>
				<td><textarea class="field" id="n_val" placeholder="public key (n)"></textarea></td>
			</tr>
			<tr>
				<td class="narrow">Enter Plaintext</td>
				<td><textarea class="field" id="plaintext" placeholder="plaintext"></textarea></td>
			</tr>
			<tr>
				<td class="narrow"><input type="submit" id="encrypt_button" class="button" value="Encrypt"></td>
				<td><textarea class="field" id="ciphertext"></textarea></td>
			</tr>
		</table>
	</center>
</body>

<script>
var cipher, e, n, plaintext;
document.getElementById('encrypt_button').onclick = function() {
	e = document.getElementById('e_val').value;
	n = document.getElementById('n_val').value;
	plaintext = document.getElementById('plaintext').value;
	if(e && n && plaintext) {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if(this.readyState === 4 && this.status === 200) {
				cipher = this.responseText;
				document.getElementById('ciphertext').value = cipher;
			}
		}
		xhttp.open('GET', './handler.php?plaintext=' + plaintext + '&e=' + e + '&n=' + n);
		xhttp.send();
	}
}
</script>
</html>