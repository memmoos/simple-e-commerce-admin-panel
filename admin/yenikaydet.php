<html lang="en">
<head>
    <title>Ekleme Sayfası</title>
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
				if(isset($_POST["urAd"])) {
					$urA=$_POST["urAd"];
					$urT=$_POST["urTur"];	
					$urM=$_POST["urMark"];
					$urF=$_POST["urFiy"];
					$urE=$_POST["urAdet"];
					$urC=$_POST["urAcik"];
					
					$maxBoyut = 700000;
					$dosyaUzantisi = substr($_FILES["dosya"]["name"],-4,4);
					$dosyaAdi = rand(1,99999).$dosyaUzantisi;
					$dosyaYolu = "dosya/".$dosyaAdi;
					
					if($_FILES["dosya"]["size"] > $maxBoyut) {
						echo "<h2>Dosya boyutu 700kb'dan yüksek olamaz...</h2>";
					} else {
						$dosyaTuru = $_FILES["dosya"]["type"];
						
						if($dosyaTuru == "image/jpeg" || $dosyaTuru == "image/png" || $dosyaTuru == "image/gif" || $dosyaTuru == "application/zip") {
							if(is_uploaded_file($_FILES["dosya"]["tmp_name"])) {
								$tasi = move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaYolu);
								
								try {
									$db=new PDO("mysql:host=localhost;dbname=alver;charset=utf8","root","");
									$sorgu=$db->prepare("INSERT INTO urunler(urunAdi, urunTuru, urunMark,urunFiyati,urunAdeti,urunAcikla, resim_adi, resim_turu, resim_size) VALUES (?,?,?,?,?,?,?,?,?)");
									$sorgu->bindParam(1,$urA,PDO::PARAM_STR);
									$sorgu->bindParam(2,$urT,PDO::PARAM_STR);
									$sorgu->bindParam(3,$urM,PDO::PARAM_STR);
									$sorgu->bindParam(4,$urF,PDO::PARAM_STR);
									$sorgu->bindParam(5,$urE,PDO::PARAM_STR);
									$sorgu->bindParam(6,$urC,PDO::PARAM_STR);
									$sorgu->bindParam(7,$dosyaYolu,PDO::PARAM_STR);
									$sorgu->bindParam(8,$dosyaTuru,PDO::PARAM_STR);
									$sorgu->bindParam(9,$_FILES["dosya"]["size"],PDO::PARAM_INT);
									$sorgu->execute();
									echo "<h2>Tebrikler, kayıtlar başarıyla girildi.</h2>";
								} catch(PDOException $e) {
									echo "<h2>Bir hata oluştu: ".$e->getMessage()."</h2>";
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
</body>
</html
