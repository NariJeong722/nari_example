<html>
<head></head>
<body>
<form action="" method="post">
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
		<tr align="center">
			<td>아이디</td>
			<td>이름</td>
			<td>나이</td>
			<td>이메일</td>
		</tr>
		<tr>
		</tr>
	</table>
</form>
</body>
</html>