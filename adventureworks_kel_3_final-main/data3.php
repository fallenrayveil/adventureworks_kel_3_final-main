<?php
require('koneksi.php');

$sql1 = "SELECT salesperson.Name as Nama,
		SUM(fact_sales.TotaLDue) as Penjualan_Terbanyak,
		salesperson.TerritoryID as Wilayah,
        date.tahun as Tahun		
		FROM salesperson 
		join fact_sales on salesperson.SalesPersonID = fact_sales.SalesPersonID
		join date on fact_sales.dateID = date.dateID";

$result1 = mysqli_query($conn,$sql1);

$Penjualan_Terbanyak = array();

while ($row = mysqli_fetch_array($result1)) {
    array_push($Penjualan_Terbanyak,array(
        "Penjualan_Terbanyak"=>$row['Penjualan_Terbanyak'],
        "Nama" => $row['Nama'],
		"Tahun" => $row['Tahun'],
		"Wilayah" => $row['Wilayah']
    ));
}

$data3 = json_encode($Penjualan_Terbanyak);

?>