<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8">
		<title>Servidor Flask</title>
	</head>

	<style type="text/css">
	
		body{
			margin: 0;
			padding: 0;
			background-color: black;
			font-family: sans-serif;
		}
		.login-box{
			width: 280px;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			color: white;
		}
		.login-box h1{
			float: left;
			font-size: 40px;
			border-bottom: 6px solid green;
			margin-botton: 50px;
			padding: 13px 0;
		}
		.textbox{
			width:100%;
			overflow: hidden;
			font-size:20px;
			padding: 8px 0;
			margin: 8px 0;
			background: none;
			border-bottom: 1px solid green;
		}
		.textbox input{
			border:none;
			outline:none;
			background: none;
			color: white;
			font-size: 18px;
			width: 80%;
			float: left;
			margin: 0 10px;
		}
		.btn{
			width: 100%;
			background: none;
			border: 2px solid green;
			color: white;
			padding: 5px;
			font-size: 18px;
			cursor: pointer;	
			margin: 12px 0;
		}


	</style>


	<body>
	<form action ="index.php" method ="POST">
		<div class ="login-box">
			<h1>BIENVENIDO</h1>
			<div class ="textbox">
				<input type ="text" placeholder = "Nombre"  name ="nombre">
			</div>
			<div class ="textbox">
                                <input type ="text" placeholder = "Correo electrónico"  name ="correo">
                        </div>

	
			<input type ="submit" class ="btn" type ="button" name ="entrar_submit" Value = "Entrar">
		</div>
	</form>
	</body>
</html>
