<!DOCTYPE html>
<html>
        <head>
                <meta charset ="utf-8">
                <title>Servidor Flask</title>
        </head>

<body>
	<script>
		var x = {{cadena}}.split(" ");		
		var y = x.length();	
	</script>
	<table>
		<th>
			<tr style="color:green;">
				<td>Comando</td>
				<td>Fecha y Hora</td>
			</tr>
			{%for i in x range(0, y)%}
			<tr>
				<td>i</td>		
				<td>x[i]</td>
			{%endfor%}
			</tr>
		</th>
	</table>
</body>
</html>

