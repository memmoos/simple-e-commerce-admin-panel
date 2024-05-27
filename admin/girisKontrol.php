<?php
if (isset($_POST["kadi"]) && isset($_POST["sif"])) {
    $un = $_POST["kadi"];
    $sf = $_POST["sif"];
    try {
        $db = new PDO("mysql:host=localhost;dbname=alver;charset=utf8", "root", "");
        $login = $db->prepare("SELECT * FROM giris WHERE kadi=? AND sifre=?");
        $login->execute(array($un, $sf));
        if ($login->rowCount()) {
            $user = $login->fetch(PDO::FETCH_ASSOC);
            if ($user['adminmi'] == 1) {
                // Admin ise farklı bir sayfaya yönlendir
                header("Location: listeleme.php");
                exit;
            } else {
                // Admin değilse farklı bir sayfaya yönlendir
                header("Location: normal_kullanici_panel.php");
                exit;
            }
        } else {
            // Kullanıcı adı veya şifre yanlışsa giriş sayfasına geri yönlendir
            header("Location: zindex.html");
            exit;
        }
    } catch (PDOException $e) {
        print $e->getMessage();
    }
    $db = null;
}
?>
