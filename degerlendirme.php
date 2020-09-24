<?php 
include 'baglan.php';
include 'header.php';
include 'sidebar.php';
?>

<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-head-line">Staj Takip Sistemi - Değerlendirme</h1> <br><br>

				<?php $ogr_id=$_GET['ogrenci_id'];
				$form2=mysqli_query($baglan, "SELECT * from form2 where ogrenci_id=$ogr_id");
				$form2cek=mysqli_fetch_array($form2);

				 ?>


						<form action="" method="POST" role="form">
							<div class="form-group">

								
								<label>Staja Devam Edilen Gün Sayısı</label>
								<input class="form-control" type="integer" name="devam_gun" value="">

							</div>
							
							<div class="form-group">
								<label>Şirketin Öğrenciye Verdiği Not</label>
								<input class="form-control" type="integer" name="sirket_not" value="">

							</div>
							<div class="form-group">
								<label>Yapılan Staj Gün Sayısı</label>
								<input class="form-control" type="integer" name="yapilan_gun" value="<?php echo $form2cek['staj_sure']; ?>">

							</div>
							<div class="form-group">
								<label>Kabul Edilen Staj Gün Sayısı</label>
								<input class="form-control" type="integer" name="kabul_gun" value="">

							</div>
							<div class="form-group">
								<label>Değerlendirme Notu</label>
								<input class="form-control" type="integer" name="okul_not" value="">

							</div>
							

							 <br>

							

							<center><button style="width: 100%" type="submit" name="kyt" class="btn btn-primary"> Kaydet</button></center>  <br>

						</form>


					</div>
				</div>
				<!-- /. ROW  -->


			</div>
			<!-- /. PAGE INNER  -->
		</div>
		<!-- /. PAGE WRAPPER  -->

<?php 

if(isset($_POST['kyt']))
{
    $ogr_id=$_GET['ogrenci_id'];
	$devam_gun=$_POST['devam_gun'];
	$sirket_not=$_POST['sirket_not'];
	$yapilan_gun=$_POST['yapilan_gun'];
	$kabul_gun=$_POST['kabul_gun'];
	$okul_not=$_POST['okul_not'];
	

	$kyt= mysqli_query($baglan,"INSERT into degerlendirme (ogr_id,devam_gun,sirket_not,yapilan_gun,kabul_gun,okul_not) VALUES ('".$ogr_id."','".$devam_gun."','".$sirket_not."','".$yapilan_gun."','".$kabul_gun."','".$okul_not."') ");



	if ($kyt) //kayıt başarılıysa
	{
		header('Location:ogrenci_bilgileriii.php');

	}
	else
	{
		echo '<script type="text/javascript">alert("Kaydetme İşleminiz Başarısız. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=ogrenci_bilgileriii.php" />';
		//header('Location:ogrenci_bilgileriii.php?durum=no');
	}
}

 ?>

		<?php include 'footer.php'; ?>
