<?php 
include 'baglan.php';
include 'header.php';
include 'sidebar.php';

if(isset($_SESSION['admin_kadi'])  and !isset($_SESSION['ogrenci_kadi']) )
{
$id=$_GET["ogrenci_id"];

$form2sorgu=mysqli_query($baglan,"SELECT * from form2 where ogrenci_id='$id'"); 

mysqli_set_charset($baglan, "utf8");

$form2cek=mysqli_fetch_array($form2sorgu);
}
if(isset($_SESSION['ogrenci_kadi'])  and !isset($_SESSION['admin_kadi']) )
{
    $ogr=$_SESSION['ogrenci_kadi'];
    $ogrid=mysqli_query($baglan,"SELECT * FROM ogrenci where ogrenci_kadi='$ogr' ");
    $cek=mysqli_fetch_array($ogrid);
    $id=$cek["ogrenci_id"]; //session dan id çekildi
    $form2sorgu=mysqli_query($baglan,"SELECT * from form2 where ogrenci_id='$id'");
    mysqli_set_charset($baglan, "utf8");
    $form2cek=mysqli_fetch_array($form2sorgu);

}

?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Form2 Düzenle</h1> <br><br>



            </div>
        </div>
        <!-- /. ROW  -->

        <form action="" method="POST" role="form">

            <div class="form-group">
                <label>Staj Yılı</label>
                <input class="form-control" type="integer" name="staj_yili" value="<?php echo $form2cek['staj_yili'] ?>">
            </div>

            <div class="form-group">
                <label>İş Yeri Adı</label>
                <input class="form-control" type="text" name="isyeri_ad" value="<?php echo $form2cek['isyeri_ad'] ?>">
            </div>

            <div class="form-group">
                <label>İş Yeri Web Adres</label>
                <input class="form-control" type="text" name="isyeri_web_adres" value="<?php echo $form2cek['isyeri_web_adres'] ?>">
            </div>

            <div class="form-group">
                <label>İş Yeri Adres</label>
                <input class="form-control" type="text" name="isyeri_adres" value="<?php echo $form2cek['isyeri_adres'] ?>">
            </div>

            <div class="form-group">
                <label>İş Yeri Telefon</label>
                <input class="form-control" type="text" name="isyeri_tel" value="<?php echo $form2cek['isyeri_tel'] ?>">
            </div>

            <div class="form-group">
                <label>İş Yeri Email</label>
                <input class="form-control" type="text" name="isyeri_email" value="<?php echo $form2cek['isyeri_email'] ?>">
            </div>

            <div class="form-group">
                <label>Staj 1/2 </label>
                <input class="form-control" type="text" name="staj_1_2" value="<?php echo $form2cek['staj_1_2'] ?>">
            </div>

            <div class="form-group">
                <label> Cumartesi Dahil/Dahil Değil</label>
                <input class="form-control" type="text" name="cumartesi_dahil" value="<?php echo $form2cek['cumartesi_dahil'] ?>">
            </div>

            <div class="form-group">
                <label>İş Yeri Yetkili Ad</label>
                <input class="form-control" type="text" name="isyeri_yetkili_ad" value="<?php echo $form2cek['isyeri_yetkili_ad'] ?>">
            </div>

            <div class="form-group">
                <label>İş Yeri Yetkili Soyad</label>
                <input class="form-control" type="text" name="isyeri_yetkili_soyad" value="<?php echo $form2cek['isyeri_yetkili_soyad'] ?>">
            </div>

            <div class="form-group">
                <label>Staj Başlama Tarihi</label>
                <input class="form-control" type="date" name="staj_bas_tar" value="<?php echo $form2cek['staj_bas_tar'] ?>">
            </div>

            <div class="form-group">
                <label>Staj Bitiş Tarihi</label>
                <input class="form-control" type="date" name="staj_bit_tar" value="<?php echo $form2cek['staj_bit_tar'] ?>">
            </div>

            <div class="form-group">
                <label>Staj Süre</label>
                <input class="form-control" type="integer" name="staj_sure" value="<?php echo $form2cek['staj_sure'] ?>">
            </div>

            <div class="form-group">
                <label>Staj Konu</label>
                <input class="form-control" type="text" name="staj_konu" value="<?php echo $form2cek['staj_konu'] ?>">
            </div>

            <br>

            <?php $sorgu= mysqli_query($baglan,"SELECT * from form2 where ogrenci_id='$id' and durum=1"); //guncellenmiş veri var mı
            $say2=mysqli_num_rows($sorgu);

            ?>
            <?php if (isset($_SESSION['admin_kadi']) and $admin_yetki==0 and !isset($_SESSION['ogrenci_kadi']) ) {?>

                <center><button style="width: 100%" type="submit" name="profil_duzenle_kaydet" class="btn btn-primary"<?php if($say2>0){ ?>disabled <?php }?> > <?php if($say2>0){ ?>  Güncelleme işlemini tamamladınız <?php }else {?> Kaydet <?php } ?></button></center>  <br> 

                 <?php } if (isset($_SESSION['admin_kadi']) and $admin_yetki==1 and !isset($_SESSION['ogrenci_kadi']) ) { ?>

                 <center><button style="width: 100%" type="submit" name="profil_duzenle_kaydet" class="btn btn-primary">Kaydet</button></center>  <br>

             <?php } if (isset($_SESSION['ogrenci_kadi']) and !isset($_SESSION['admin_kadi']) ) {?>

                <center><button style="width: 100%" type="submit" name="profil_duzenle_kaydet" class="btn btn-primary">Kaydet</button></center>  <br>
             <?php }?>



            </form>


        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->


    <?php 

    if (isset($_SESSION['admin_kadi']) and $admin_yetki==0 and !isset($_SESSION['ogrenci_kadi']) ) 
    {
     if(isset($_POST['profil_duzenle_kaydet']))
     {
        $profil_duzenle_kaydet=mysqli_query($baglan,"UPDATE form2 set staj_yili='".$_POST['staj_yili']."',isyeri_ad='".$_POST['isyeri_ad']."',isyeri_web_adres='".$_POST['isyeri_web_adres']."',isyeri_adres='".$_POST['isyeri_adres']."',isyeri_tel='".$_POST['isyeri_tel']."' ,isyeri_email='".$_POST['isyeri_email']."' ,staj_1_2='".$_POST['staj_1_2']."' ,cumartesi_dahil='".$_POST['cumartesi_dahil']."' ,isyeri_yetkili_ad='".$_POST['isyeri_yetkili_ad']."' ,isyeri_yetkili_soyad='".$_POST['isyeri_yetkili_soyad']."' ,staj_bas_tar='".$_POST['staj_bas_tar']."' ,staj_bit_tar='".$_POST['staj_bit_tar']."' ,staj_sure='".$_POST['staj_sure']."' ,staj_konu='".$_POST['staj_konu']."',durum=1 where ogrenci_id='$id' "); //durum 1 yapıldı. Güncelleme işlemi yapıldığını anlamak için 

        if ($profil_duzenle_kaydet) 
        {

            header('Location:ogrenci_bilgileriii.php');

        }
        else
        {
            echo '<script type="text/javascript">alert("Güncelleme İşleminiz Başarısız. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=ogrenci_bilgileriii.php" />';
            //header('Location:ogrenci_bilgileriii.php?durum=no');
        }

    }
}
if (isset($_SESSION['admin_kadi']) and $admin_yetki==1 and !isset($_SESSION['ogrenci_kadi']) ) 
{
    if(isset($_POST['profil_duzenle_kaydet']))
    {
        $profil_duzenle_kaydet=mysqli_query($baglan,"UPDATE form2 set staj_yili='".$_POST['staj_yili']."',isyeri_ad='".$_POST['isyeri_ad']."',isyeri_web_adres='".$_POST['isyeri_web_adres']."',isyeri_adres='".$_POST['isyeri_adres']."',isyeri_tel='".$_POST['isyeri_tel']."' ,isyeri_email='".$_POST['isyeri_email']."' ,staj_1_2='".$_POST['staj_1_2']."' ,cumartesi_dahil='".$_POST['cumartesi_dahil']."' ,isyeri_yetkili_ad='".$_POST['isyeri_yetkili_ad']."' ,isyeri_yetkili_soyad='".$_POST['isyeri_yetkili_soyad']."' ,staj_bas_tar='".$_POST['staj_bas_tar']."' ,staj_bit_tar='".$_POST['staj_bit_tar']."' ,staj_sure='".$_POST['staj_sure']."' ,staj_konu='".$_POST['staj_konu']."' where ogrenci_id='$id' ");

        if ($profil_duzenle_kaydet) 
        {

            header('Location:ogrenci_bilgileriii.php');

        }
        else
        {
            echo '<script type="text/javascript">alert("Güncelleme İşleminiz Başarısız. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=ogrenci_bilgileriii.php" />';
            //header('Location:ogrenci_bilgileriii.php?durum=no');
        }

    }
}

if (isset($_SESSION['ogrenci_kadi']) and  !isset($_SESSION['admin_kadi']) ) 
{
    if(isset($_POST['profil_duzenle_kaydet']))
    {
        $profil_duzenle_kaydet=mysqli_query($baglan,"UPDATE form2 set staj_yili='".$_POST['staj_yili']."',isyeri_ad='".$_POST['isyeri_ad']."',isyeri_web_adres='".$_POST['isyeri_web_adres']."',isyeri_adres='".$_POST['isyeri_adres']."',isyeri_tel='".$_POST['isyeri_tel']."' ,isyeri_email='".$_POST['isyeri_email']."' ,staj_1_2='".$_POST['staj_1_2']."' ,cumartesi_dahil='".$_POST['cumartesi_dahil']."' ,isyeri_yetkili_ad='".$_POST['isyeri_yetkili_ad']."' ,isyeri_yetkili_soyad='".$_POST['isyeri_yetkili_soyad']."' ,staj_bas_tar='".$_POST['staj_bas_tar']."' ,staj_bit_tar='".$_POST['staj_bit_tar']."' ,staj_sure='".$_POST['staj_sure']."' ,staj_konu='".$_POST['staj_konu']."' where ogrenci_id='$id' ");

        if ($profil_duzenle_kaydet) 
        {

            header('Location:form_guncelle.php');

        }
        else
        {
            echo '<script type="text/javascript">alert("Güncelleme İşleminiz Başarısız. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=form_guncelle.php" />';
            //header('Location:ogrenci_bilgileriii.php?durum=no');
        }

    }
}


?>


<?php include 'footer.php'; ?>
