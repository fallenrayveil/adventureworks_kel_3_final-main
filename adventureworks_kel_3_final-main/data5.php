<?php
require('koneksi.php');

$sql = "SELECT vendor_name.Name as Nama, 
        SUM(fact_purchasing.StockedQty) AS Paling_Banyak,
		date.Tahun as Tahun
        FROM vendor_name 
		join fact_purchasing on vendor_name.VendorID = fact_purchasing.VendorID,
		join date on fakta_penjualan.time_id = date.time_id";
		
$result = mysqli_query($conn,$sql);

$hasil = array();

while ($row = mysqli_fetch_array($result)) {
    array_push($hasil,array(
        "Nama"=>$row['Nama'],
        "Paling_Banyak"=>$row['Paling_Banyak'],
        "Tahun"=>$row['Tahun']
    ));
}

$data5 = json_encode($hasil);

?>