<!DOCTYPE html>
<html>
<head>
    <title>Arama Sayfası</title>
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
        <form>
            <label for="search">Ürün Adıyla Ara:</label>
            <input type="text" id="search" name="search">
        </form>

        <div id="productTable">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function(){
                $('#search').on('input', function(){
                    var searchValue = $(this).val(); // Arama değerini al

                    $.ajax({
                        type: 'GET', // GET isteği gönderilecek
                        url: 'ara.php', // Sunucuya istek yapılacak PHP dosyasının yolu
                        data: {search: searchValue}, // Arama değerini sunucuya gönder
                        success: function(response){ // Sunucudan dönen cevap başarılı ise
                            $('#productTable').html(response); // Tabloyu güncelle
                        }
                    });
                });
            });
        </script>

        </div>
    </div>
</div>
</script>

