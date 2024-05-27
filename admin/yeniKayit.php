<html lang="en">
<head>
    <title>Kayıt Sayfası</title>
    <meta charset="utf-8">
	<title>Hepsi Şorada Sinan Pasha</title>
    <link rel="stylesheet" href="adminDuzenleme.css" type="text/css" /> 
</head>
<body>
<div class="container">
	<div class="menu">
        <h2>Menü</h2>
        <ul>
            <li><a href="yeniKayit.php" >Ekleme</a></li>
            <li><a href="silme.php">Silme</a></li>
            <li><a href="duzenleme.php">Düzenleme</a></li>
            <li><a href="arama.php">Arama</a></li>
            <li><a href="listeleme.php">Listeleme</a></li>
            <li><a href="index.html">Çıkış</a></li>
        </ul>
    </div>
    <form action="yenikaydet.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Ürün Adı</td>
                <td colspan="2"><input type="text" name="urAd" placeholder="Ürün Adını Giriniz: "></td>
            </tr>
            <tr>
                <td>Ürün Türü</td>
                <td colspan="2"><input type="text" name="urTur" placeholder="Ürün Türünü Giriniz: "></td>
            </tr>
            <tr>
                <td>Ürün Markası</td>
                <td colspan="2"><input type="text" name="urMark" placeholder="Ürün Markasını Giriniz: "></td>
            </tr>
            <tr>
                <td>Ürün Fiyatı</td>
                <td colspan="2"><input type="text" name="urFiy" placeholder="Ürün Fiyatını Giriniz: "></td>
            </tr>
            <tr>
                <td>Ürün Adeti</td>
                <td colspan="2"><input type="text" name="urAdet" placeholder="Ürün Adetini Giriniz: "></td>
            </tr>
            <tr>
                <td>Ürün Açıklaması</td>
                <td colspan="2"><textarea name="urAcik"></textarea></td>
            </tr>
            <tr>
                <td>Dosya Seç</td>
                <td colspan="2"><input type="file" name="dosya"></td>
            </tr>
            <tr>
                <td align="center"><input type="submit" value="Kaydet"></td>
                <td align="center"><input type="reset" value="İptal"></td>
            </tr>
        </table>
    </form>
</div>	
</body>
</html>
