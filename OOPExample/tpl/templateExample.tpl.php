<?php
if(count($memberList) > 0){
	foreach($memberList as $oMember){
		echo "<tr align='center'>";
		echo "<td>{$oMember->getId()}</td>";
		echo "<td>{$oMember->getName()}</td>";
		echo "<td>{$oMember->getAge()}</td>";
		echo "<td>{$oMember->getEmail()}</td>";
		echo "</tr>";
	}
}