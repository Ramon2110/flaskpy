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
			background-color:black;
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
		.caja {
  			margin:20px auto 40px auto;	
  			border:1px solid white;
   			overflow: hidden;
   			width: 20em;
			height:3em;
			appearance:none;
   			position:relative;
		}
		.cajados {
                        margin:20px auto 40px auto;     
                        border:1px solid white;
                        overflow: hidden;
                        width: 20em;
                        height:3em;
                        appearance:none;
                        position:relative;
                }

		select {
			appearance:none;
			color:white;
   			background: black;
   			border: none;
   			font-size: 14px;
   			height: 100%;
   			padding: 5px;
   			width: 100%;
		}
		select:focus{ outline: none;}

		.caja::after{
			content:"\025be";
			display:table-cell;
			padding-top:7px;
			text-align:center;
			width:100%;
			height:100%;
			background-color:transparent;
			position:absolute;
			top:0;
			right:0px;	
			pointer-events: none;
		}
 		.btn{
			width: 100%;
			float:left;
			background: none;
			border: 2px solid green;
			color: white;
			padding: 5px;
			padding-right: 3px;
			font-size: 18px;
			cursor: pointer;	
			margin: 12px 0;
		}


	</style>
	
	<body>
        <form action ="comando.php" method ="POST">
                <div class ="login-box">
                        <h1>Hola {{nombre}} elige un comando:</h1>
                        <div class ="caja">
                                <select name ="comando" id ="comando">
					<option>Elige un comando</option>
					<option value="ifconfig">ifconfig</option>
					<option value="vmstat">vmstat</option>
					<option value="free">free</option>
					<option value="ls">ls</option>
                        	        <option value="ps">ps</option>
				</select>
			</div>
			<div class ="cajados">
				<select name ="formato" id ="formato">
                                        <option>Elige un formato</option>
                                        <option value="pdf">PDF</option>
                                        <option value="excel">Excel</option>
                                </select>

                        </div>

                        <input type ="submit" class ="btn" type ="button" name ="where" Value = "CORREO">
			<input type ="submit" class ="btn" type ="button" name ="where" Value = "DESCARGAR">
			<input type ="submit" class ="btn" type ="Button" name="where" Value = "HISTORIAL">		
                </div>
       
        </body>

</html>

