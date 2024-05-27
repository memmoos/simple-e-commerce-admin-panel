<html lang="en">
<head>
	<meta charset="utf-8">
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
                    <li><a href="yenikayit.php" >Ekleme</a></l>
                    <li><a href="silme.php">Silme</a></li>
                    <li><a href="duzenleme.php">Düzenleme</a></li>
                    <li><a href="arama.php">Arama</a></li>
                    <li><a href="listeleme.php">Listeleme</a></li>
                    <li><a href="index.html">Çıkış</a></li>
            </ul>
        </div>
        <div class="content">
		<?php
			if (isset($_POST["urId"])) {
				$uri=$_POST["urId"];
				$urA=$_POST["urAdi"];
				$urT=$_POST["urTur"];    
				$urM=$_POST["urMark"];
				$urF=$_POST["urFiy"];
				$urE=$_POST["urAded"];
				$urC=$_POST["urAcik"];

				$maxBoyut = 700000;
				$dosyaUzantisi = substr($_FILES["dosya1"]["name"],-4,4);
				$dosyaAdi = rand(1,99999).$dosyaUzantisi;
				$dosyaYolu = "dosya/".$dosyaAdi;
				$resimTuru = $_FILES["dosya1"]["type"];
				$resimSize = $_FILES["dosya1"]["size"];

				if ($_FILES["dosya1"]["size"] > $maxBoyut) {
					echo "<h2>Dosya boyutu 700kb'dan yüksek olamaz...</h2>";
				} else {
					if ($resimTuru == "image/jpeg" || $resimTuru == "image/png" || $resimTuru == "image/gif" || $resimTuru == "application/zip") {
						if (is_uploaded_file($_FILES["dosya1"]["tmp_name"])) {
							try {
								$db=new PDO("mysql:host=localhost;dbname=alver;charset=utf8","root","");
								$tasi = move_uploaded_file($_FILES["dosya1"]["tmp_name"],$dosyaYolu);
								$bul = $db->prepare("select * from urunler where urunId = ?");
								$bul->execute(array($uri));
								$v = $bul->fetch(PDO::FETCH_ASSOC);
								unlink($v["resim_adi"]);

								$sorgu=$db->prepare("UPDATE urunler SET urunAdi=?, urunTuru=?, urunMark=?,urunFiyati=?,urunAdeti=?,urunAcikla=?,resim_adi =?,resim_turu = ?,resim_size = ? where  urunId=?");
								$sorgu->bindParam(1,$urA,PDO::PARAM_STR);
								$sorgu->bindParam(2,$urT,PDO::PARAM_STR);
								$sorgu->bindParam(3,$urM,PDO::PARAM_STR);
								$sorgu->bindParam(4,$urF,PDO::PARAM_STR);
								$sorgu->bindParam(5,$urE,PDO::PARAM_STR);
								$sorgu->bindParam(6,$urC,PDO::PARAM_STR);
								$sorgu->bindParam(7,$dosyaYolu,PDO::PARAM_STR);
								$sorgu->bindParam(8,$resimTuru,PDO::PARAM_STR);
								$sorgu->bindParam(9,$resimSize,PDO::PARAM_STR);
								$sorgu->bindParam(10,$uri,PDO::PARAM_STR);
								$sorgu->execute();
								echo("Tebrikler kayıtlar güncellendi <a href='duzenleme.php'>Duzenle Sayfasına Dön</a>");

							} catch(PDOException $e) {
								print $e->getMessage();
							}
							$db=null;
						} else {
							echo "<h2>Dosya taşınırken bir hata oluştu...</h2>";
						}
					} else {
						echo "<h2>Dosya formatı sadece jpg, png veya gif formatında olmalıdır...</h2>"; 
					}
				}
			}
		?>

        </div>
    </div>	
</body>
</html>
