<?php 
include 'baglan.php';
include 'header.php';
include 'sidebar.php';
?>

<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-head-line">Evrak Teslim Ekle</h1> <br><br>

				


						<form  method="POST" role="form">
							
							<div class="form-group">
								<label>Evrak Teslim Adı</label>
								<input class="form-control" type="text" name="evrak_teslim_ad" value="">

							</div>
							<div class="form-group">
								<label>Evrak Teslim Soyadı</label>
								<input class="form-control" type="integer" name="evrak_teslim_soyad" value="">
							</div>
							<div class="form-group">
								<label>Evrak Teslim Kullanıcı Adı</label>
								<input class="form-control" type="integer" name="evrak_teslim_kadi" value="">
							</div>
							<div class="form-group">
								<label>Evrak Teslim Şifre</label>
								<input class="form-control" type="integer" name="evrak_teslim_sifre" value="">
							</div> <br>

							<!-- <center><a href="ders_ekle.php"><button style="background-color: blue lighten" type="button" name="btn_ekle" class="btn btn-lg btn-primary">Ders Ekle</button></a></center> <br> -->

							<center><button style="width: 100%" type="submit" name="evrak_teslim_ekle" class="btn btn-primary">Evrak Teslim Ekle</button></center>  <br>

						</form>


					</div>
				</div>
				<!-- /. ROW  -->


			</div>
			<!-- /. PAGE INNER  -->
		</div>
		<!-- /. PAGE WRAPPER  -->



<?php 

if(isset($_POST['evrak_teslim_ekle']))
{
	
	$evrak_teslim_ad=$_POST['evrak_teslim_ad'];
	$evrak_teslim_soyad=$_POST['evrak_teslim_soyad'];
	$evrak_teslim_kadi=$_POST['evrak_teslim_kadi'];
	$evrak_teslim_sifre=$_POST['evrak_teslim_sifre'];

    $sorgu= mysqli_query($baglan,"SELECT admin_kadi from admin where admin_kadi='$evrak_teslim_kadi' and admin_sifre='$evrak_teslim_sifre'");
    $say=mysqli_num_rows($sorgu);
	
	if ($say<1) 
	{
	
    $evrak_teslim_ekle= mysqli_query($baglan,"INSERT into admin (admin_ad,admin_soyad,admin_kadi,admin_sifre,admin_yetki) VALUES ('".$evrak_teslim_ad."','".$evrak_teslim_soyad."','".$evrak_teslim_kadi."','".$evrak_teslim_sifre."',0) ");

       if ($evrak_teslim_ekle) //kayıt başarılıysa
	   {
		   header('Location:evrak_teslim_bilgileri.php');

	   }
	   else
	   {
	   	echo '<script type="text/javascript">alert("Ekleme İşleminiz Başarısız. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=evrak_teslim_bilgileri.php" />';
	   	   //header('Location:evrak_teslim_bilgileri.php?durum=no');
	   }

	}

	else
	{
		echo '<script type="text/javascript">alert("Bu Kullanıcı Adı ve Şifre Zaten Var. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=evrak_teslim_bilgileri.php" />';
		//header('Location:evrak_teslim_bilgileri.php?durum=no');
	}
}


 ?>



		<?php include 'footer.php'; ?>
