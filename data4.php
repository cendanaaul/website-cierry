<?php
//setting header to json
header('Content-Type: application/json');

include('koneksi.php');
$query = sprintf("SELECT SUM(sf.SubTotal) total, p.Category category FROM sales_fact sf JOIN product p ON sf.ProductID = p.ProductID WHERE p.Category is NOT NULL GROUP BY p.Category;");
$result4 = $koneksi->query($query);

$data4 = array();
foreach ($result4 as $row4){
	$data4[] = $row4;
}

$result4 -> close();

print json_encode($data4);
