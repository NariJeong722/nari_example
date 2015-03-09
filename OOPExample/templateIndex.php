<html>
<head></head>
<body>

	<form onsubmit="return false;">
		<div id="searchDiv" >
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
				<input type="button" name="searchBtn" id="searchBtn" value="검색">
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
 			$('tbody').load("/Example/OOPExample/ajax/TemplateController.php");

	 		$("#search3").keypress(function(e){
		 		if(e.keyCode == 13){ //enter : 13
		 			clickBtn();
		 		}
	 		});

			$("#searchBtn").click(function(){
				clickBtn();
			});
		});

		function clickBtn(){
			var getData = {
					"option":$("#search1").val(),
					"column":$("#search2").val(),
					"keyword":$("#search3").val()				
				};
				$.get("/Example/OOPExample/ajax/TemplateController.php",getData,function(data){
					$("tbody").html(data);
				});	
			}
	</script>	
	
</body>
</html>