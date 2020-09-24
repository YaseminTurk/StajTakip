<?php 
include 'baglan.php';
include 'header.php';
include 'sidebar.php';
?>

<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-head-line">Staj Takip Sistemi - Form2 Ekleme</h1> <br><br>

				<!-- <?php 

				// if(isset($_SESSION['ogrenci_kadi']) and !isset($_SESSION['admin_kadi']) )
				{

					// $ogr=$_SESSION['ogrenci_kadi'];

					// $ogrid=mysqli_query($baglan,"SELECT * FROM ogrenci where ogrenci_kadi='$ogr' ");
					// $cek=mysqli_fetch_array($ogrid);
					// $id=$cek["ogrenci_id"];
					// $ogrform=mysqli_query($baglan,"SELECT * FROM form2 where ogrenci_id='$id' ");
					// $say=mysqli_num_rows($ogrform);
				}

				// if(isset($_SESSION['admin_kadi']) and $admin_yetki==1 and !isset($_SESSION['ogrenci_kadi']) )
				{
					// $id=$_GET["ogrenci_id"];
				}

				

				?>	 -->	


				<form action="" method="POST" role="form">
					<div class="form-group">

						<label>FORM2 KAYIT BİLGİLERİ</label><br><br>

						<?php 
						if(isset($_SESSION['ogrenci_kadi']) and !isset($_SESSION['admin_kadi'])){
							$ogr=$_SESSION['ogrenci_kadi'];

							$ogrid=mysqli_query($baglan,"SELECT * FROM ogrenci where ogrenci_kadi='$ogr' ");
							$cek=mysqli_fetch_array($ogrid);
							$id=$cek["ogrenci_id"];}

							if(isset($_SESSION['admin_kadi']) and $admin_yetki==1 and !isset($_SESSION['ogrenci_kadi'])){

								$id=$_GET["ogrenci_id"];}



								?>



							</div>
							<div class="form-group">
								<label>Stajın Yapıldığı Yıl</label>
								<input class="form-control" type="year" name="staj_yili" value="">

							</div>

							<div class="form-group">
								<label>İşyeri Adı/Ünvanı</label>
								<input class="form-control" type="text" name="isyeri_ad" value="">

							</div>
							<div class="form-group">
								<label>Web Adresi</label>
								<input class="form-control" type="text" name="isyeri_web_adres" value="">

							</div>
							<div class="form-group">
								<label>Adresi</label>
								<input class="form-control" type="text" name="isyeri_adres" value="">

							</div>
							<div class="form-group">
								<label>Telefon No</label>
								<input class="form-control" type="text" name="isyeri_tel" value="">

							</div>
							<div class="form-group">
								<label>E-Posta Adresi</label>
								<input class="form-control" type="email" name="isyeri_email" value="">

							</div>
							<div class="form-group">
								<label>Staj 1/2</label>
								<input class="form-control" type="integer" name="staj_1_2" value="">

							</div>
							<div class="form-group">
								<label>Cumartesi Dahil/Hariç</label>
								<input class="form-control" type="text" name="cumartesi_dahil" value="">

							</div>
							<div class="form-group">
								<label>Yetkili Adı</label>
								<input class="form-control" type="text" name="isyeri_yetkili_ad" value="">

							</div>
							<div class="form-group">
								<label>Yetkili Soyadı</label>
								<input class="form-control" type="text" name="isyeri_yetkili_soyad" value="">

							</div>
							<div class="form-group">
								<label>Staj Başlama Tarihi</label>
								<input class="form-control" type="date" name="staj_bas_tar" value="">

							</div>
							<div class="form-group">
								<label>Staj Bitiş Tarihi</label>
								<input class="form-control" type="date" name="staj_bit_tar" value="">

							</div>
							<div class="form-group">
								<label>Stajın Süresi(Günü)</label>
								<input class="form-control" type="integer" name="staj_sure" value="">

							</div>
							<div class="form-group">
								<label>Stajın Konusu</label>
								<input class="form-control" type="text" name="staj_konu" value="">

							</div>

							<br>



							<center><button style="width: 100%" type="submit" name="form2_ekle" class="btn btn-primary"> Ekle</button></center>  <br>

						</form>


					</div>
				</div>
				<!-- /. ROW  -->


			</div>
			<!-- /. PAGE INNER  -->
		</div>
		<!-- /. PAGE WRAPPER  -->

		<?php 

		if(isset($_POST['form2_ekle']))
		{


			$staj_yili=$_POST['staj_yili'];

			$isyeri_ad=$_POST['isyeri_ad'];
			$isyeri_web_adres=$_POST['isyeri_web_adres'];
			$isyeri_adres=$_POST['isyeri_adres'];
			$isyeri_tel=$_POST['isyeri_tel'];
			$isyeri_email=$_POST['isyeri_email'];
			$staj_1_2=$_POST['staj_1_2'];
			$cumartesi_dahil=$_POST['cumartesi_dahil'];
			$isyeri_yetkili_ad=$_POST['isyeri_yetkili_ad'];
			$isyeri_yetkili_soyad=$_POST['isyeri_yetkili_soyad'];
			$staj_bas_tar=$_POST['staj_bas_tar'];
			$staj_bit_tar=$_POST['staj_bit_tar'];
			$staj_sure=$_POST['staj_sure'];
			$staj_konu=$_POST['staj_konu'];




			$form2ekle= mysqli_query($baglan,"insert into form2 (ogrenci_id,staj_yili,isyeri_ad,isyeri_web_adres,isyeri_adres,isyeri_tel,isyeri_email,staj_1_2,cumartesi_dahil,isyeri_yetkili_ad,isyeri_yetkili_soyad,staj_bas_tar,staj_bit_tar,staj_sure,staj_konu) VALUES ('".$id."','".$staj_yili."','".$isyeri_ad."','".$isyeri_web_adres."','".$isyeri_adres."','".$isyeri_tel."','".$isyeri_email."','".$staj_1_2."','".$cumartesi_dahil."','".$isyeri_yetkili_ad."','".$isyeri_yetkili_soyad."','".$staj_bas_tar."','".$staj_bit_tar."','".$staj_sure."','".$staj_konu."') ");



	if ($form2ekle) //kayıt başarılıysa
	{
		if(isset($_SESSION['ogrenci_kadi']) and !isset($_SESSION['admin_kadi']))
		{
			header('Location:index.php');
		}
		if(isset($_SESSION['admin_kadi']) and !isset($_SESSION['ogrenci_kadi']))
		{
			header('Location:ogrenci_bilgileriii.php');
		}

	}
	else
	{
		if(isset($_SESSION['ogrenci_kadi']) and !isset($_SESSION['admin_kadi']))
		{
			echo '<script type="text/javascript">alert("Ekleme İşleminiz Başarısız. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=form2_ekle.php" />';
			//header('Location:form2_ekle.php?durum=no');
		}
		if(isset($_SESSION['admin_kadi']) and !isset($_SESSION['ogrenci_kadi']))
		{
			echo '<script type="text/javascript">alert("Ekleme İşleminiz Başarısız. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=ogrenci_bilgileriii.php" />';
			//header('Location:ogrenci_bilgileriii.php?durum=no');
		}
	}
}

?>

<?php include 'footer.php'; ?>
