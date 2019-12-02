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

</style>
<body>
	<form action ="index" method ="POST">
                <div class ="login-box">
                 	<h1>{{cadena}}</h1>			
                </div>
      </form>
</body>
</html>


