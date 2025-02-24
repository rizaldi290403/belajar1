<html>
<head>
<title>Buat-Kubernetes</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="ketengah" style="text-align: center;">
    <h3>My Profile</h3>
</div>
<img src="SO.png" class="img-thumbnail img-fluid" width="250" height="100" alt="Cinque Terre">

<table class="table">
    <tr>
        <td><h4>Nama</h4></td>
        <td><h4> : </h4></td>
        <td><h4>-</h4></td>
    </tr>
</table>

<div style="text-align: center;">
    <a href="buku.html" class="btn btn-primary btn-lg">Buku Tamu</a>
    <a href="lihat.php" class="btn btn-info btn-lg">Lihat Pengunjung</a>
</div>

<?php
$filecounter = "counter.txt";
if (!file_exists($filecounter)) {
    file_put_contents($filecounter, 0);  // Membuat file jika belum ada
}

$fl = fopen($filecounter, "r+");
if (!$fl) {
    die("Tidak dapat membuka file counter.");
}
$hit = fread($fl, filesize($filecounter));
echo("<table width='250' align='center' border='1' cellspacing='0' cellpadding='0' bordercolor='#0000FF'><tr>");
echo("<td width='250' valign='middle' align='center'>");
echo("<font face='verdana' size='2' color='#FF0000'><b>");
echo("Anda pengunjung yang ke: ");
echo($hit);
echo("</b></font>");
echo("</td>");
echo("</tr></table>");
fclose($fl);

$fl = fopen($filecounter, "w+");
$hit = $hit + 1;
fwrite($fl, $hit, strlen($hit));
fclose($fl);
?>
</body>
</html>
