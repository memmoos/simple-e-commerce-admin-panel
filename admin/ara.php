<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=alver;charset=utf8", "root", "");

    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = '%' . $_GET['search'] . '%';
        $sorgu = $db->prepare("SELECT urunId, urunAdi, urunTuru, urunMark, urunFiyati, urunAdeti, urunAcikla , resim_adi FROM urunler WHERE urunAdi LIKE :search");
        $sorgu->bindParam(':search', $search, PDO::PARAM_STR);
    } else {
        $sorgu = $db->prepare("SELECT urunId, urunAdi, urunTuru, urunMark, urunFiyati, urunAdeti, urunAcikla,resim_adi FROM urunler");
    }

    $sorgu->execute();

    echo "<table class='product-table'>";
    echo "<tr><th>Resim</th><th>ID</th><th>Adı</th><th>Türü</th><th>Markası</th><th>Fiyatı</th><th>Adedi</th><th>Açıklama</th><th>Sil</th><th>Düzenle</th></tr>";

    while ($cikcik = $sorgu->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td height='100' width='100'><img src='".$cikcik["resim_adi"]."'></td>";
        echo "<td>" . htmlspecialchars($cikcik['urunId']) . "</td>";
        echo "<td>" . htmlspecialchars($cikcik['urunAdi']) . "</td>";
        echo "<td>" . htmlspecialchars($cikcik['urunTuru']) . "</td>";
        echo "<td>" . htmlspecialchars($cikcik['urunMark']) . "</td>";
        echo "<td>" . htmlspecialchars($cikcik['urunFiyati']) . "</td>";
        echo "<td>" . htmlspecialchars($cikcik['urunAdeti']) . "</td>";
        echo "<td>" . htmlspecialchars($cikcik['urunAcikla']) . "</td>";
        echo "<td><a href='sil.php?urId=" . $cikcik['urunId'] . "'>Sil</a></td>";
        echo "<td><a href='duzenleKayit.php?&urId=$cikcik[urunId]&urAdi=$cikcik[urunAdi]&urTur=$cikcik[urunTuru]&urMark=$cikcik[urunMark]&urFiy=$cikcik[urunFiyati]&urAded=$cikcik[urunAdeti]&urAcık=$cikcik[urunAcikla]'>Duzenle</a></td></tr>";
        echo "</tr>";
    }

    echo "</table>";
} catch (PDOException $e) {
    echo "Bağlantı Hatası: " . $e->getMessage();
}
?>
