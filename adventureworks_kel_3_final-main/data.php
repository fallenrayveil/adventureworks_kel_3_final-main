<?php
require('koneksi.php');

$sql = "SELECT dim_produk.Name as Nama, 
        SUM(fakta_penjualan.StockedQty) as Total_Barang
        FROM dim_produk join fakta_penjualan on fakta_penjualan.ProductID=dim_produk.ProductID";
		
$result = mysqli_query($sql);

$Total_Barang = array();

while ($row = mysqli_fetch_array($result)) {
    array_push($Total_Barang,array(
        "Nama"=>$row['Nama'],
        "Total_Barang"=>$row['Total_Barang']
    ));
}

$data = json_encode($Total_Barang);

?>