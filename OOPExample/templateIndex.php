<html>
<head></head>
<body>

	<form action="./ajax/TemplateController.php" method="post">
		<div id="searchDiv">
			<select id="search1">
				<option value="0"> 검색방법 </option>
				<option value="equal"> = </option>
				<option value="like">LIKE</option>
			</select>
			<select id="search2">
				<option value="0"> 검색컬럼 </option>
				<option value="name">이름</option>
				<option value="id">아이디</option>
			</select>
				<input type="text" name="search3" id="search3">
				<input type="submit" name="searchBtn" id="searchBtn" value="검색">
		</div>
		<br>
		<table border="1" width="800">
			<thead>
				<tr align="center">
					<td>아이디</td>
					<td>이름</td>
					<td>나이</td>
					<td>이메일</td>
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