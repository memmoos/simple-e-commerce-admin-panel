<?php
// Veritabanı bağlantısı
try {
    $db = new PDO("mysql:host=localhost;dbname=alver;charset=utf8", "root", "");

    // GET yöntemi ile gelen ürün ID'sini al
    $urunId = $_GET['urId'];
    $urunResim = $_GET['urResim'];


    // Silme işlemi için SQL sorgusu
    $sorgu = $db->prepare("DELETE FROM urunler WHERE urunid = :urunId");
    $sorgu->bindParam(':urunId', $urunId);
    unlink($urunResim);
    $sorgu->execute();

    // Silme işlemi başarılı olduysa kullanıcıyı ana sayfaya yönlendir
    header("Location: listeleme.php");
} catch (PDOException $e) {
    echo "Hata: " . $e->getMessage();
}
?>
