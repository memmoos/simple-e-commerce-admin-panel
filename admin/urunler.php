<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürünler</title>
    <link rel="stylesheet" href="urunlerrSekil.css">
</head>
<body>
<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=alver;charset=utf8", "root", "");
    $sorgu = $db->prepare("SELECT urunAdi, urunTuru, urunMark,urunFiyati,urunAdeti,urunAcikla,resim_adi FROM urunler");
    $sorgu->execute();

    while ($cikcik = $sorgu->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='urun'>";
        echo "<div class='urun-resim'><img src='".$cikcik["resim_adi"]."' alt='".$cikcik["urunAdi"]."'></div>";
        echo "<div class='urun-detay'>" . $cikcik["urunAcikla"] . "</div>";
        echo "<div class='urun-marka'>" . $cikcik["urunMark"] . "</div>";
        echo "<div class='urun-fiyat'>" . $cikcik["urunFiyati"] . " TL</div>";
        echo "</div>";
    }
} catch (PDOException $e) {
    print $e->getMessage();
}
$db = null;
?>
</body>
</html>
