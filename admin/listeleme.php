<!DOCTYPE html>
<html>
<head>
    <title>Listeleme Sayfası</title>
    <meta charset="utf-8">
	<title>Hepsi Şorada Sinan Pasha</title>
    <link rel="stylesheet" href="adminDuzenleme.css" type="text/css" /> 
</head>
<body>
    <div class="container">
        <div class="menu">
            <h2>Menü</h2>
            <ul>
                <li><a href="yenikayit.php" >Ekleme</a></li>
                <li><a href="silme.php">Silme</a></li>
                <li><a href="duzenleme.php">Düzenleme</a></li>
                <li><a href="arama.php">Arama</a></li>
                <li><a href="listeleme.php">Listeleme</a></li>
                <li><a href="index.html">Çıkış</a></li>
            </ul>
        </div>
        <div class="content">
            <?php
                try {
                    $db = new PDO("mysql:host=localhost;dbname=alver;charset=utf8", "root", "");
                    $sorgu = $db->prepare("SELECT urunId, urunAdi, urunTuru, urunMark, urunFiyati, urunAdeti, urunAcikla, resim_adi FROM urunler");
                    $sorgu->execute();

                    echo "<table class='product-table'>";
                    echo "<tr><th>Resim</th><th>Id</th><th>Adı</th><th>Türü</th><th>Markası</th><th>Fiyatı</th><th>Adeti</th><th>Açıklaması</th></tr>";

                    while ($cikcik = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td height='100' width='100'><img src='".$cikcik["resim_adi"]."'></td>";
                        echo "<td>".$cikcik["urunId"]."</td>";
                        echo "<td>".$cikcik["urunAdi"]."</td>";
                        echo "<td>".$cikcik["urunTuru"]."</td>";
                        echo "<td>".$cikcik["urunMark"]."</td>";
                        echo "<td>".$cikcik["urunFiyati"]."</td>";
                        echo "<td>".$cikcik["urunAdeti"]."</td>";
                        echo "<td>".$cikcik["urunAcikla"]."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } catch(PDOException $e) {
                    echo $e->getMessage();
                }
                $db = null;
            ?>

        </div>
    </div>
</body>
</html>
