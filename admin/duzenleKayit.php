<!DOCTYPE html>
<html>
<head>
    <title>Ürün Düzenleme Formu</title>
    <script>
        function temizle() {
            // Tüm input alanlarını temizle
            var inputs = document.getElementsByTagName("input");
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].type === "text") {
                    inputs[i].value = "";
                }
            }
        }
    </script>
    <title>Düzenleme Sayfası</title>
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
			<?php
				// GET yöntemi ile gelen verileri al
				$gelenId = $_GET["urId"];
				$gelenAdi = $_GET["urAdi"];
				$gelenTuru = $_GET["urTur"];
				$gelenMarka = $_GET["urMark"];
				$gelenFiyat = $_GET["urFiy"];
				$gelenAded = $_GET["urAded"];
				$gelenAcik = $_GET["urAcık"];
				$gelenResim = $_GET["urResim"];
			?>
			<form action="duzenleKaydet.php" method="post" enctype="multipart/form-data">
				<table>
					<tr>
						<td><b>Ürün ID</b></td>
						<td><input type="text" name="urId" value="<?php echo $gelenId ?>"></td>
					</tr>
					<tr>
						<td><b>Ürün Adı</b></td>
						<td><input type="text" name="urAdi" value="<?php echo $gelenAdi ?>"></td>
					</tr>
					<tr>
						<td><b>Ürün Türü</b></td>
						<td><input type="text" name="urTur" value="<?php echo $gelenTuru ?>"></td>
					</tr>
					<tr>
						<td><b>Ürün Markası</b></td>
						<td><input type="text" name="urMark" value="<?php echo $gelenMarka ?>"></td>
					</tr>
					<tr>
						<td><b>Ürün Fiyatı</b></td>
						<td><input type="text" name="urFiy" value="<?php echo $gelenFiyat ?>"></td>
					</tr>
					<tr>
						<td><b>Ürün Adedi</b></td>
						<td><input type="text" name="urAded" value="<?php echo $gelenAded ?>"></td>
					</tr>
					<tr>
						<td><b>Ürün Açıklama</b></td>
						<td><input type="text" name="urAcik" value="<?php echo $gelenAcik ?>"></td>
					</tr>
					<tr>
						<td>Dosya Seç</td>
						<td colspan="2"><input type="file" name="dosya1"></td>
						<td><img src="<?php echo $gelenResim ?>"width="200" height="100"></td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="submit" value="Güncelle">
							<input type="button" value="Temizle" onclick="temizle()">
						</td>
					</tr>
				</table>
			</form>
	</div>
</body>
</html>
