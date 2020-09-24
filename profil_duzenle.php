<?php 
include 'baglan.php';
include 'header.php';
include 'sidebar.php';

$ogr=$_SESSION['ogrenci_kadi'];

$ogrid=mysqli_query($baglan,"SELECT * FROM ogrenci where ogrenci_kadi='$ogr' ");
$cek=mysqli_fetch_array($ogrid);
$id=$cek["ogrenci_id"];

$ogrencisorgu=mysqli_query($baglan,"SELECT * from ogrenci where ogrenci_id='$id'"); 

mysqli_set_charset($baglan, "utf8");

$ogrencicek=mysqli_fetch_array($ogrencisorgu);




?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Profili Düzenle</h1> <br><br>



            </div>
        </div>
        <!-- /. ROW  -->

        <form action="" method="POST" role="form">

            <div class="form-group">
                <label>Öğrenci TC NO</label>
                <input class="form-control" type="integer" name="ogrenci_tc_no" value="<?php echo $ogrencicek['ogrenci_tc_no'] ?>">
            </div>

            <div class="form-group">
                <label>Öğrenci Ad</label>
                <input class="form-control" type="text" name="ogrenci_ad" value="<?php echo $ogrencicek['ogrenci_ad'] ?>">
            </div>

            <div class="form-group">
                <label>Öğrenci Soyad</label>
                <input class="form-control" type="text" name="ogrenci_soyad" value="<?php echo $ogrencicek['ogrenci_soyad'] ?>">
            </div>

            <div class="form-group">
                <label>Öğrenci Kullanıcı Adı</label>
                <input class="form-control" type="text" name="ogrenci_kadi" value="<?php echo $ogrencicek['ogrenci_kadi'] ?>">
            </div>

            <div class="form-group">
                <label>Öğrenci Şifresi</label>
                <input class="form-control" type="text" name="ogrenci_sifre" value="<?php echo $ogrencicek['ogrenci_sifre'] ?>">
            </div>

            <div class="form-group">
                <label>Toplam Staj Gün Sayısı</label>
                <input class="form-control" type="integer" name="toplam_gun" value="<?php echo $ogrencicek['toplam_gun'] ?>">
            </div>

            <div class="form-group">
                <label>Öğrenci Baba Ad</label>
                <input class="form-control" type="text" name="ogrenci_baba_ad" value="<?php echo $ogrencicek['ogrenci_baba_ad'] ?>">
            </div>

            <div class="form-group">
                <label>Öğrenci Anne Ad</label>
                <input class="form-control" type="text" name="ogrenci_anne_ad" value="<?php echo $ogrencicek['ogrenci_anne_ad'] ?>">
            </div>

            <div class="form-group">
                <label>Öğrenci Doğum Yeri</label>
                <input class="form-control" type="text" name="ogrenci_dogum_yeri" value="<?php echo $ogrencicek['ogrenci_dogum_yeri'] ?>">
            </div>

            <div class="form-group">
                <label>Öğrenci Doğum Tarihi</label>
                <input class="form-control" type="date" name="ogrenci_dogum_tarihi" value="<?php echo $ogrencicek['ogrenci_dogum_tarihi'] ?>">
            </div>

            <div class="form-group">
                <label>Öğrenci Adres</label>
                <input class="form-control" type="text" name="ogrenci_adres" value="<?php echo $ogrencicek['ogrenci_adres'] ?>">
            </div>

            <div class="form-group">
                <label>Öğrenci Telefon No</label>
                <input class="form-control" type="text" name="ogrenci_tel" value="<?php echo $ogrencicek['ogrenci_tel'] ?>">
            </div>

            <div class="form-group">
                <label>Öğrenci EMail</label>
                <input class="form-control" type="text" name="ogrenci_email" value="<?php echo $ogrencicek['ogrenci_email'] ?>">
            </div>

            <div class="form-group">
                <label>Öğrenci Numarası</label>
                <input class="form-control" type="integer" name="ogrenci_no" value="<?php echo $ogrencicek['ogrenci_no'] ?>">
            </div>

            <div class="form-group">
                <label>Öğrenci Sınıf</label>
                <input class="form-control" type="text" name="ogrenci_sinif" value="<?php echo $ogrencicek['ogrenci_sinif'] ?>">
            </div>

            <div class="form-group">
                <label>Öğrenci N.Ö/İÖ</label>
                <input class="form-control" type="text" name="ogrenci_no_io" value="<?php echo $ogrencicek['ogrenci_no_io'] ?>">
            </div>
            <br>


            <center><button style="width: 100%" type="submit" name="profil_duzenle_kaydet" class="btn btn-primary">Kaydet</button></center>  <br>

        </form>


    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->


<?php 

if(isset($_POST['profil_duzenle_kaydet']))
{
    $ogrenci_id=$_GET['ogrenci_id'];
    $profil_duzenle_kaydet=mysqli_query($baglan,"UPDATE ogrenci set ogrenci_tc_no='".$_POST['ogrenci_tc_no']."', ogrenci_ad='".$_POST['ogrenci_ad']."', ogrenci_soyad='".$_POST['ogrenci_soyad']."', ogrenci_kadi='".$_POST['ogrenci_kadi']."', ogrenci_sifre='".$_POST['ogrenci_sifre']."', toplam_gun='".$_POST['toplam_gun']."', ogrenci_baba_ad='".$_POST['ogrenci_baba_ad']."', ogrenci_anne_ad='".$_POST['ogrenci_anne_ad']."', ogrenci_dogum_yeri='".$_POST['ogrenci_dogum_yeri']."', ogrenci_dogum_tarihi='".$_POST['ogrenci_dogum_yeri']."', ogrenci_adres='".$_POST['ogrenci_adres']."', ogrenci_tel='".$_POST['ogrenci_tel']."', ogrenci_email='".$_POST['ogrenci_email']."', ogrenci_no='".$_POST['ogrenci_no']."', ogrenci_sinif='".$_POST['ogrenci_sinif']."', ogrenci_no_io='".$_POST['ogrenci_no_io']."' where ogrenci_id='$id' ");

    if ($profil_duzenle_kaydet) 
    {
        $_SESSION['ogrenci_kadi']=$_POST['ogrenci_kadi'];
        header('Location:profil_duzenle.php?');

    }
    else
    {
        echo '<script type="text/javascript">alert("Güncelleme İşlemi Başarısız. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=ogrenci_bilgileriii.php" />';
        //header('Location:profil_duzenle.php?durum=no');
    }

}


?>


<?php include 'footer.php'; ?>
