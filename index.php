<?php
//inclusão da biblioteca
include('phpqrcode/qrlib.php');

//variaveis
$conteudo = "";
$nome = "";
$tipo = "";
$tamanho = "";


if (isset($_POST['conteudo'])) {
		$conteudo = $_POST['conteudo'];
	}

if (isset($_POST['nome'])) {
		$nome = $_POST['nome'];
	}

if (isset($_POST['tipo'])) {
		$tipo = $_POST['tipo'];
	}
	
if (isset($_POST['tamanho'])) {
		$tamanho = $_POST['tamanho'];
	}

//caso não defina um tamanho o padrão é 5
if($tamanho == ""){
	$tamanho = 5;
}else{
	$tamanho = $_POST['tamanho'];
}

//gerando o qrcode
QRcode::png(@$conteudo, @$nome, @$tipo, @$tamanho);


/*Como o QR code foi desenvolvido para ser colocado em etiquetas, estas podem ser danificadas perdendo parte de sua informação, devido a isso ele conta com informação redundante que pode ter vários níveis, sendo que quando maior a informação redundante menos de informação util podemos colocar no QR code.

    Nível L: conta com 7% de poder de correção;
    Nível M: conta com 15% de poder de correção;
    Nível Q: conta com 25% de poder de correção;
    Nível H: conta com 30% de poder de correção.
*/

//QRcode::png($codeContents, 'level_L.png', QR_ECLEVEL_L); 
//QRcode::png($codeContents, 'level_M.png', QR_ECLEVEL_M); 
//QRcode::png($codeContents, 'level_Q.png', QR_ECLEVEL_Q); 
//QRcode::png($codeContents, 'level_H.png', QR_ECLEVEL_H);



?>

<form method="post" action="index.php">
	<input type="text" name="conteudo" required>
	<input type="text" name="nome" required>
	<select name="tipo">
		<option value="" selected>Escolha o tipo de QrCode</option>
		<option value="QR_ECLEVEL_L">QR_ECLEVEL_L</option>
		<option value="QR_ECLEVEL_M">QR_ECLEVEL_M</option>
		<option value="QR_ECLEVEL_Q">QR_ECLEVEL_Q</option>
		<option value="QR_ECLEVEL_H">QR_ECLEVEL_H</option>
	</select>
	<input type="text" name="tamanho">
	<input type="submit">
</form>

<?php
	if($nome == ""){
		echo "";
	}else{
		echo"<img src=".$nome.">";
	} 
?> 
