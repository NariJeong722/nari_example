<html>
<head></head>
<body>

	<form action="./ajax/TemplateController.php" method="post">
		<div id="searchDiv">
			<select id="search1">
				<option value="0"> �˻���� </option>
				<option value="equal"> = </option>
				<option value="like">LIKE</option>
			</select>
			<select id="search2">
				<option value="0"> �˻��÷� </option>
				<option value="name">�̸�</option>
				<option value="id">���̵�</option>
			</select>
				<input type="text" name="search3" id="search3">
				<input type="submit" name="searchBtn" id="searchBtn" value="�˻�">
		</div>
		<br>
		<table border="1" width="800">
			<thead>
				<tr align="center">
					<td>���̵�</td>
					<td>�̸�</td>
					<td>����</td>
					<td>�̸���</td>
				</tr>
			</thead>
		
			<tbody>
			</tbody>
		
		</table>
	</form>
	
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	 <script type="text/javascript">
		$(document).ready(function(){
			
/* 			$.post("/Example/OOPExample/ajax/TemplateController.php",function(){
					$('tbody').
				} */		
 			$('tbody').load("/Example/OOPExample/ajax/TemplateController.php"); 
			
		});
	</script>	
	
</body>
</html>