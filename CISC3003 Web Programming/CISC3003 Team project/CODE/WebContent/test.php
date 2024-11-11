// <?php 
// 				$select_db = mysqli_connect("localhost", "root", "", "webproject")or die("Fail to connect the mysql server <br>");
// 				$sql_query = "SELECT * FROM post;";
// 				$result = mysqli_query($select_db, $sql_query);
// 				while($row=mysqli_fetch_row($result)){
// 				    echo "<table>";
// 				    echo "<tr>";
// 				    echo "<td>$row[4]</td>";
// 				    echo "</tr>";
// 				    echo "</table>";
// 				}
				
// ?>

<?php 
$randomNumber = rand(1, 6);
$icon = "user_0". $randomNumber .".png";

print_r($icon)

?>