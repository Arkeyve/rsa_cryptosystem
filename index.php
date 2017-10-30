<html>
<head>
	<title>RSA Cryptosystem</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
</head>

<body>
	<center>
		RSA Cryptosystem - Key Generation
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
				<td class="narrow"><input type="submit" class="button" value="generate p" id="p_gen"></td>
				<td><textarea class="field" id="p_val"></textarea></td>
			</tr>
			<tr>
				<td class="narrow"><input type="submit" class="button" value="generate q" id="q_gen"></td>
				<td><textarea class="field" id="q_val"></textarea></td>
			</tr>
			<tr>
				<td class="narrow">n [p * q]</td>
				<td><textarea class="field" id="n_val"></textarea></td>
			</tr>
			<tr>
				<td class="narrow">fi(n) [(p - 1) * (q - 1)]</td>
				<td><textarea class="field" id="fn_val"></textarea></td>
			</tr>
			<tr>
				<td class="narrow"><input type="submit" class="button" value="generate e" id="e_gen"></td>
				<td><textarea class="field" id="e_val"></textarea></td>
			</tr>
			<tr>
				<td class="narrow">d [e^-1 mod fi(n)]</td>
				<td><textarea class="field" id="d_val"></textarea></td>
			</tr>
		</table>
	</center>
</body>

<script>
var p, q, n, fn, e;

var refresh_n = function() {
	if(p && q) {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if(this.readyState === 4 && this.status === 200) {
				n_fn = this.responseText.split('|');
				n = n_fn[0];
				fn = n_fn[1];
				document.getElementById('n_val').value = n;
				document.getElementById('fn_val').value = fn;
			}
		}
		xhttp.open('GET', './handler.php?get_n=1&p=' + p + '&q=' + q, true);
		xhttp.send();
	}
}

var refresh_d = function() {
	if(e && fn) {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if(this.readyState === 4 && this.status === 200) {
				d = this.responseText;
				document.getElementById('d_val').value = d;
			}
		}
		xhttp.open('GET', './handler.php?get_d=1&e=' + e + '&fn=' + fn, true);
		xhttp.send();
	}
}

document.getElementById('p_gen').addEventListener('click', function() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if(this.readyState === 4 && this.status === 200) {
			p = this.responseText;
			document.getElementById('p_val').value = p;
			refresh_n();
		}
	}
	xhttp.open('GET', './handler.php?get_prime=1', true);
	xhttp.send();
});

document.getElementById('q_gen').addEventListener('click', function() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if(this.readyState === 4 && this.status === 200) {
			q = this.responseText;
			document.getElementById('q_val').value = q;
			refresh_n();
		}
	}
	xhttp.open('GET', './handler.php?get_prime=1', true);
	xhttp.send();
});

document.getElementById('e_gen').addEventListener('click', function() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if(this.readyState === 4 && this.status === 200) {
			e = this.responseText;
			document.getElementById('e_val').value = e;
			refresh_d();
		}
	}
	xhttp.open('GET', './handler.php?get_prime=1', true);
	xhttp.send();
});
</script>
</html>