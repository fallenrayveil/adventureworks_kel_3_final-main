<?php
require('koneksi.php');

$sql1 = "select fs.SalesOrderID,fs.TotalDue,d.Tahun
		from fact_sales fs join date d
		group by TotalDue;";

$result1 = mysqli_query($conn,$sql1);

$Hasil = array();

while ($row = mysqli_fetch_array($result1)) {
    array_push($Hasil,array(
        "SalesOrderID" => $row['SalesOrderID'],
		"TotalDue" => $row['TotalDue'],
		"Tahun" => $row['Tahun']
    ));
}

$data4 = json_encode($Hasil);

?>