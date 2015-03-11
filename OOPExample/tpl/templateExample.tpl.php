<?php
header ( 'Content-Type: text/html; charset=utf-8' );
echo "<div>";
echo "<div><table border='1' width='800'>";
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
	}
echo "</table>";
echo "</div>";
	
echo "<div align='center'>";
 		if(	$totalPage==0){
			echo '['."<strong>".'1'.'</strong>]';
		}else{ 
			for($i=$b_startPage; $i<$b_endPage+1;$i++){
				if($i==$b_startPage && $i!=1){
					echo '['."<a href='#' onclick='getMemberList(".($i-1)."); return false;'>".'pre'."</a>".']  ';
				}
				
				if($i==$curPage){
					echo '['."<strong>".$i.'</strong>]  ';
				}else{
					echo '['."<a href='#' onclick='getMemberList(".$i."); return false;'>".$i."</a>".']   ';
				}
			
				if($i==$b_endPage && $i<$totalPage){
					echo '['."<a href='#' onclick='getMemberList(".($i+1)."); return false;'>".'next'."</a>".']';
				}					
			}
		}
				
echo "</div>";
	
	

?>