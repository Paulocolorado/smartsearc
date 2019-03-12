<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<script>
	function aaa(docu){
	$obj = $('<object>');
	$obj.attr("data",docu);
	$obj.attr("type","application/pdf");
	$obj.addClass("w100");

	$("#pdfdiv_content").append($obj);
	
	$("#contpdf").show();
	}
</script>
<style>
#pdfdiv_content{
	width:100%;
	height:100%;
	border:1px solid #0000FF;
/*position:relative;*/
	height:800px;
	
}
.w100{
	width:100%;
	position:absolute;
	height:100%;
	}
</style>
</head>

<body>
<div id="contpdf" hidden><input type="button" name="Cerrar" value="Cerrar" onClick="$('#contpdf').hide();">
<div id="pdfdiv_content" ></div></div>
<input type="button" onClick="aaa('http://www.haptracking.com/swdoc/HapAdmcom/docs/23/22/23_1504044584_0Bot%C3%B3nPago-ES%20v1.2.pdf')">
<input type="button" onClick="aaa('http://www.haptracking.com/swdoc/HapAdmcom/docs/23/22/23_1504044711_0Compra%20dell%20ELAD.pdf')">
</body>
</html>