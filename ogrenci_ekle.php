<?php 
include 'baglan.php';
include 'header.php';
include 'sidebar.php';
?>

<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-head-line">Öğrenci Ekle</h1> <br><br>

				


				<form action="" method="POST" role="form">

					<div class="form-group">
						<label>Öğrenci TC NO</label>
						<input class="form-control" type="integer" name="ogrenci_tc_no" value="">
					</div>

					<div class="form-group">
						<label>Öğrenci Ad</label>
						<input class="form-control" type="text" name="ogrenci_ad" value="">
					</div>

					<div class="form-group">
						<label>Öğrenci Soyad</label>
						<input class="form-control" type="text" name="ogrenci_soyad" value="">
					</div>

					<div class="form-group">
						<label>Öğrenci Kullanıcı Adı</label>
						<input class="form-control" type="text" name="ogrenci_kadi" value="">
					</div>

					<div class="form-group">
						<label>Öğrenci Şifresi</label>
						<input class="form-control" type="text" name="ogrenci_sifre" value="">
					</div>

            <!-- <div class="form-group">
                <label>Toplam Staj Gün Sayısı</label>
                <input class="form-control" type="integer" name="toplam_gun" value="">
            </div> -->

            <div class="form-group">
            	<label>Öğrenci Baba Ad</label>
            	<input class="form-control" type="text" name="ogrenci_baba_ad" value="">
            </div>

            <div class="form-group">
            	<label>Öğrenci Anne Ad</label>
            	<input class="form-control" type="text" name="ogrenci_anne_ad" value="">
            </div>

            <div class="form-group">
            	<label>Öğrenci Doğum Yeri</label>
            	<input class="form-control" type="text" name="ogrenci_dogum_yeri" value="">
            </div>

            <div class="form-group">
            	<label>Öğrenci Doğum Tarihi</label>
            	<input class="form-control" type="date" name="ogrenci_dogum_tarihi" value="">
            </div>

            <div class="form-group">
            	<label>Öğrenci Adres</label>
            	<input class="form-control" type="text" name="ogrenci_adres" value="">
            </div>

            <div class="form-group">
            	<label>Öğrenci Telefon No</label>
            	<input class="form-control" type="text" name="ogrenci_tel" value="">
            </div>

            <div class="form-group">
            	<label>Öğrenci EMail</label>
            	<input class="form-control" type="text" name="ogrenci_email" value="">
            </div>

            <div class="form-group">
            	<label>Öğrenci Numarası</label>
            	<input class="form-control" type="integer" name="ogrenci_no" value="">
            </div>

            <div class="form-group">
            	<label>Öğrenci Sınıf</label>
            	<input class="form-control" type="text" name="ogrenci_sinif" value="">
            </div>

            <div class="form-group">
            	<label>Öğrenci N.Ö/İÖ</label>
            	<input class="form-control" type="text" name="ogrenci_no_io" value="">
            </div>
            <br>


            <center><button style="width: 100%" type="submit" name="ogr_ekle" class="btn btn-primary">Ekle</button></center>  <br>

        </form>


    </div>
</div>
<!-- /. ROW  -->


</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->



<?php 

if(isset($_POST['ogr_ekle']))
{
	$ogrenci_tc_no=$_POST['ogrenci_tc_no'];
	$ogrenci_ad=$_POST['ogrenci_ad'];
	$ogrenci_soyad=$_POST['ogrenci_soyad'];
	$ogrenci_kadi=$_POST['ogrenci_kadi'];
	$ogrenci_sifre=$_POST['ogrenci_sifre'];
	//$toplam_gun=$_POST['toplam_gun'];
	$ogrenci_baba_ad=$_POST['ogrenci_baba_ad'];
	$ogrenci_anne_ad=$_POST['ogrenci_anne_ad'];
	$ogrenci_dogum_yeri=$_POST['ogrenci_dogum_yeri'];
	$ogrenci_dogum_tarihi=$_POST['ogrenci_dogum_yeri'];
	$ogrenci_adres=$_POST['ogrenci_adres'];
	$ogrenci_tel=$_POST['ogrenci_tel'];
	$ogrenci_email=$_POST['ogrenci_email'];
	$ogrenci_no=$_POST['ogrenci_no'];
	$ogrenci_sinif=$_POST['ogrenci_sinif'];
	$ogrenci_no_io=$_POST['ogrenci_no_io'];
	

	$sorgu= mysqli_query($baglan,"SELECT ogrenci_no from ogrenci where ogrenci_no='$ogrenci_no'");
	$say=mysqli_num_rows($sorgu);

	
	if ($say<1) 
	{

		$ogrenciekle= mysqli_query($baglan,"INSERT into ogrenci (ogrenci_tc_no,ogrenci_ad,ogrenci_soyad,ogrenci_kadi,ogrenci_sifre,toplam_gun,ogrenci_baba_ad,ogrenci_anne_ad,ogrenci_dogum_yeri,ogrenci_dogum_tarihi,ogrenci_adres,ogrenci_tel,ogrenci_email,ogrenci_no,ogrenci_sinif,ogrenci_no_io) VALUES ('".$ogrenci_tc_no."','".$ogrenci_ad."','".$ogrenci_soyad."','".$ogrenci_kadi."','".$ogrenci_sifre."',60, '".$ogrenci_baba_ad."','".$ogrenci_anne_ad."','".$ogrenci_dogum_yeri."','".$ogrenci_dogum_tarihi."','".$ogrenci_adres."','".$ogrenci_tel."','".$ogrenci_email."','".$ogrenci_no."','".$ogrenci_sinif."','".$ogrenci_no_io."') ");

       if ($ogrenciekle) //kayıt başarılıysa
       {
       	header('Location:ogrenci_bilgileriii.php');

       }
       else
       {
        echo '<script type="text/javascript">alert("Ekleme İşlemi Başarısız. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=ogrenci_bilgileriii.php" />';
       	//header('Location:ogrenci_bilgileriii.php?durum=no');
       }

   }

   else
   {
    echo '<script type="text/javascript">alert("Bu Öğrenci Numarası Kayıtlı Bir Öğrenci Var. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=ogrenci_bilgileriii.php" />';
   	//header('Location:ogrenci_bilgileriii.php?durum=no');
   }
}


?>



<?php include 'footer.php'; ?>
