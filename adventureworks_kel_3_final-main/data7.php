<?php
require('koneksi.php');

$sqll = "SELECT product_purchase.Name as Nama,
		SUM(product_purchase.RejectedQty) as ProdukRusak,
		date.tanggal_lengkap as Tanggal 
		FROM product_purchase join date";

$result1 = mysqli_query($conn,$sqll);

$ProdukRusak = array();

while ($row = mysqli_fetch_array($result1)) {
    array_push($ProdukRusak,array(
        "ProdukRusak"=>$row['ProdukRusak'],
        "Tanggal" => $row['Tanggal']
    ));
}
$data7 = json_encode($ProdukRusak);

?>