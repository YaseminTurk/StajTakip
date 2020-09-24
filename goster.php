<?php 
include 'baglan.php';
include 'header.php';
include 'sidebar.php';


?>

<div id="page-wrapper">
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-head-line">Öğrenci Bilgileri</h1> <br><br>

      </div>



      <div class="col-md-12">
<div>
<h3>Ögrenci Profil Bilgileri</h3>
</div>

        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-hover" border="1" align="center" width="80%">
              <thead>
                <tr class="success">
                  <td>Ögrenci TC NO</td>
                  <td>Ögrenci Adı</td>
                  <td>Ögrenci Soyadı</td>
                  <td>Ögrenci Kullanıcı Adı</td>
                  <td>Ögrenci Şifre</td>
                  <td>Toplam Staj Günü</td>
                  <td>Ögrenci Baba Ad</td>
                  <td>Ögrenci Anne Ad</td>
                  <td>Ögrenci Doğum Yeri</td>
                  <td>Ögrenci Doğum Tarihi</td>
                  <td>Öğrenci Adres</td>
                  <td>Ögrenci Telefon No</td>
                  <td>Ögrenci Email</td>
                  <td>Ögrenci No</td>
                  <td>Ögrenci Sınıf</td>
                  <td>Ögrenci NÖ/İÖ</td>


                </tr>
              </thead>


              <?php

$id=$_GET['ogrenci_id'];
$ogrencisorgu=mysqli_query($baglan,"SELECT * from ogrenci where ogrenci_id='$id' "); 

mysqli_set_charset($baglan, "utf8");


            while($ogrencicek=mysqli_fetch_array($ogrencisorgu)) //sorgudan dönen verileri diziye atarken kullanılır.
            {

              echo '<tr>';

              echo '<td>'.$ogrencicek['ogrenci_tc_no'].'</td>';
              echo '<td>'.$ogrencicek['ogrenci_ad'].'</td>';
              echo '<td>'.$ogrencicek['ogrenci_soyad'].'</td>';
              echo '<td>'.$ogrencicek['ogrenci_kadi'].'</td>';
              echo '<td>'.$ogrencicek['ogrenci_sifre'].'</td>';
              echo '<td>'.$ogrencicek['toplam_gun'].'</td>';
              echo '<td>'.$ogrencicek['ogrenci_baba_ad'].'</td>';
              echo '<td>'.$ogrencicek['ogrenci_anne_ad'].'</td>';
              echo '<td>'.$ogrencicek['ogrenci_dogum_yeri'].'</td>';
              echo '<td>'.$ogrencicek['ogrenci_dogum_tarihi'].'</td>';
              echo '<td>'.$ogrencicek['ogrenci_adres'].'</td>';
              echo '<td>'.$ogrencicek['ogrenci_tel'].'</td>';
              echo '<td>'.$ogrencicek['ogrenci_email'].'</td>';
              echo '<td>'.$ogrencicek['ogrenci_no'].'</td>';
              echo '<td>'.$ogrencicek['ogrenci_sinif'].'</td>';
              echo '<td>'.$ogrencicek['ogrenci_no_io'].'</td>';


              echo '</tr>';
              


            }
            ?>

          </table>

        </div>
<!--</div>

<button style="width: 100%" type="submit"  name="btn_guncelle" class="btn btn-primary">Ders Güncelle</button>
</div>-->
</div>

<!-- /. ROW  -->


<?php 

$ogrenciformsorgu=mysqli_query($baglan,"SELECT * from form2 where ogrenci_id='$id' ");
$say=mysqli_num_rows($ogrenciformsorgu);

if ($say>0) {
  
 ?>
<div>
  <h3>Ögrenci Staj Bilgileri</h3>
</div>

<div class="panel-body">
          <div class="table-responsive">
            <table class="table table-hover" border="1" align="center" width="80%">
              <thead>
                <tr class="success">
                  <td>Staj Yılı</td>
                  <td>İş Yeri Adı</td>
                  <td>İş Yeri Web Adres</td>
                  <td>İş Yeri Adres</td>
                  <td>İş Yeri Telefon</td>
                  <td>İş Yeri Email</td>
                  <td>Stak 1/2</td>
                  <td>Cumartesi Dahil/Dahil Değil</td>
                  <td>İş Yeri Yetkili Ad</td>
                  <td>İş Yeri Yetkili Soyad</td>
                  <td>Staj Başlama Tarihi</td>
                  <td>Staj Bitiş Tarihi</td>
                  <td>Staj Süre</td>
                  <td>Staj Konu</td>
                  

                </tr>
              </thead>


              <?php

  
$form2sorgu=mysqli_query($baglan,"SELECT * from form2 where ogrenci_id='$id' "); 

mysqli_set_charset($baglan, "utf8");


            while($form2cek=mysqli_fetch_array($form2sorgu)) //sorgudan dönen verileri diziye atarken kullanılır.
            {

              echo '<tr>';

              echo '<td>'.$form2cek['staj_yili'].'</td>';
              echo '<td>'.$form2cek['isyeri_ad'].'</td>';
              echo '<td>'.$form2cek['isyeri_web_adres'].'</td>';
              echo '<td>'.$form2cek['isyeri_adres'].'</td>';
              echo '<td>'.$form2cek['isyeri_tel'].'</td>';
              echo '<td>'.$form2cek['isyeri_email'].'</td>';
              echo '<td>'.$form2cek['staj_1_2'].'</td>';
              echo '<td>'.$form2cek['cumartesi_dahil'].'</td>';
              echo '<td>'.$form2cek['isyeri_yetkili_ad'].'</td>';
              echo '<td>'.$form2cek['isyeri_yetkili_soyad'].'</td>';
              echo '<td>'.$form2cek['staj_bas_tar'].'</td>';
              echo '<td>'.$form2cek['staj_bit_tar'].'</td>';
              echo '<td>'.$form2cek['staj_sure'].'</td>';
              echo '<td>'.$form2cek['staj_konu'].'</td>';

              
              echo '</tr>';
              

            }
            ?>

          </table><br>

        </div>
<!--</div>

<button style="width: 100%" type="submit"  name="btn_guncelle" class="btn btn-primary">Ders Güncelle</button>
</div>-->
</div>

<!-- /. ROW  -->


<div class="panel-body">
          <div class="table-responsive">
            <table class="table table-hover" border="1" align="center" width="80%">
              <thead>

              <tr>
              <td><a href="ogr_guncelle.php?ogrenci_id=<?php echo $id ?>"><button style="width: 100%" type="submit"  name="btn_guncelle" class="btn btn-primary">Profil Güncelle</button></a></td>

              <td><a href="form_guncelle.php?ogrenci_id=<?php echo $id ?>"><button style="width: 100%" type="submit"  name="btn_guncelle" class="btn btn-primary">Form2 Güncelle</button></a></td>

              <td><a href="goster.php?ogrenci_id=<?php echo $id ?> & ogrsil=ok"><button style="width: 100%" type="submit"  name="btn_guncelle" class="btn btn-primary">Öğrenci Sil</button></a></td>

              <td><a href="degerlendirme.php?ogrenci_id=<?php echo $id ?>"><button style="width: 100%" type="submit"  name="btn_degerlendir" class="btn btn-primary">Değerlendir</button></a></td>

              <td><a href="mesaj_yaz.php?ogrenci_id=<?php echo $id ?>"><button style="width: 100%" type="submit"  name="btn_gonder" class="btn btn-primary">Mesaj Gönder</button></a></td>

              <td><a href="degerlendirme_goster.php?ogrenci_id=<?php echo $id ?>"><button style="width: 100%" type="submit"  name="btn_goster" class="btn btn-primary">Değerlendirme Göster</button></a></td>

              <td><a href="excel1.php?ogrenci_id=<?php echo $id ?>"><button style="width: 100%" type="submit"  name="btn_excel" class="btn btn-primary">Excel</button></a></td>

             </tr>

             </thead>

            
            

          </table>

        </div>
<!--</div>

<button style="width: 100%" type="submit"  name="btn_guncelle" class="btn btn-primary">Ders Güncelle</button>
</div>-->
</div>

<!-- /. ROW  -->

<?php }

if($say==0) {

 ?>



<div class="panel-body">
          <div class="table-responsive">
            <table class="table table-hover" border="1" align="center" width="80%">
              <thead>

              <tr>
              <td><a href="ogr_guncelle.php?ogrenci_id=<?php echo $id ?>"><button style="width: 100%" type="submit"  name="btn_guncelle" class="btn btn-primary">Profil Güncelle</button></a></td>

              <td><a href="goster.php?ogrenci_id=<?php echo $id ?> & ogrsil=ok"><button style="width: 100%" type="submit"  name="btn_guncelle" class="btn btn-primary">Öğrenci Sil</button></a></td>

              <td><a href="form2_ekle.php?ogrenci_id=<?php echo $id ?>"><button style="width: 100%" type="submit"  name="btn_gonder" class="btn btn-primary">Form2 Ekle</button></a></td>

              <td><a href="mesaj_yaz.php?ogrenci_id=<?php echo $id ?>"><button style="width: 100%" type="submit"  name="btn_gonder" class="btn btn-primary">Mesaj Gönder</button></a></td>

             </tr>

             </thead>

            
            

          </table>

        </div>
<!--</div>

</div>-->
</div>

<!-- /. ROW  -->

<?php } ?>





</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->




<?php 

if(@$_GET['ogrsil']=="ok")
{

  $ogrsil=mysqli_query($baglan,"DELETE from ogrenci where ogrenci_id='".$_GET['ogrenci_id']."'");


  if ($ogrsil) 
  {

    $formsil=mysqli_query($baglan,"DELETE from form2 where ogrenci_id='".$id."'");

    header('Location:ogrenci_bilgileriii.php');

  }
  else
  {
    echo '<script type="text/javascript">alert("Silme İşleminiz Başarısız. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=ogrenci_bilgileriii.php" />';
    //header('Location:ogrenci_bilgileriii.php?durum=no');
  }
  
}

?>



<?php include 'footer.php'; ?>
