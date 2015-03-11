<html>
<head></head>
<body>

	<form onsubmit="return false;">
		<div id="searchDiv" align="center">
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
				<input type="button" name="searchBtn" id="searchBtn" value="�˻�">
		</div>
		<br>
		<!-- <table border="1" width="800">
				<thead>
					<tr align="center">
						<td>���̵�</td>
						<td>�̸�</td>
						<td>����</td>
						<td>�̸���</td>
					</tr>
				</thead>
			</table> -->
			<div id="memList" align="center">
			</div>
			


	</form>
	
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	 <script type="text/javascript">
		$(document).ready(function(){				
 			$("#memList").load("/Example/OOPExample/ajax/TemplateController.php");
 			//getMemberList();

			$("#search3").keypress(function(e){
				if(e.keyCode == 13){
					getMemberList(1);
				}
			});

			$("#searchBtn").click(function(){
					getMemberList(1);
			});
		});
	

		function getMemberList(page){
			var getData = {
					"option":$("#search1").val(),
					"column":$("#search2").val(),
					"keyword":$("#search3").val(),	
					"page":page			
				};
				$.get("/Example/OOPExample/ajax/TemplateController.php",getData,function(data){
					$("#memList").html(data);
				});	
			}

	</script>	
	
</body>
</html>