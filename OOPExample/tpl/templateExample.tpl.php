<?php
header ( 'Content-Type: text/html; charset=utf-8' );

echo "<table border='1' width='800'>";
echo "<tr align='center'>";
echo "<td>아이디</td>";
echo "<td>이름</td>";
echo "<td>나이</td>";
echo "<td>이메일</td>";
echo "</tr>";

	if (count ( $memberList ) > 0) {
		foreach ( $memberList as $oMember ) {
			echo "<tr align='center'>";
			echo "<td>{$oMember->getId()}</td>";
			echo "<td>{$oMember->getName()}</td>";
			echo "<td>{$oMember->getAge()}</td>";
			echo "<td>{$oMember->getEmail()}</td>";
			echo "</tr>";
		}
		echo "</table>";
	}

	echo "<div align='center'>";
		for($i=1; $i<$totalPage+1; $i++){
			if($i==$curPage){
				echo '['."<strong>".$i.'</strong>]   ';
			}else{
				echo '['."<a href='#' onclick='getMemberList(".$i."); return false;'>".$i."</a>".']   ';
			}
		}
	echo "</div>";
	
	

?>