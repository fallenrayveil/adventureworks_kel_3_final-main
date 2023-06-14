<?php
require('koneksi.php');

$sql1 = "SELECT product_purchase.Name as Nama_Produk, 
        SUM(fact_purchasing.StockedQty) as Total_Barang,
       date.tanggal_lengkap as Tanggal
       FROM product_purchase
	   join fact_purchasing on product_purchase.PurchaseOrderID = fact_purchasing.PurchaseOrderID
	   join date on fact_purchasing.DateID = date.DateID";;

$result1 = mysqli_query($conn,$sql1);

$Total_Barang = array();

while ($row = mysqli_fetch_array($result1)) {
    array_push($Total_Barang,array(
        "Total_Barang"=>$row['Total_Barang'],
        "Tanggal" => $row['Tanggal'],
        "Nama_Produk" => $row['Nama_Produk']
    ));
}

$data2 = json_encode($Total_Barang);

?>