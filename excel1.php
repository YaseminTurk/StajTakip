<?php 
include 'baglan.php';
include 'header.php';
include 'sidebar.php';

$id=$_GET['ogrenci_id'];

?>
<head>
<meta http-equiv="Content-Type" content="text/html";  charset="utf-8" />
</head>
<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-head-line">Staj Takip Sistemi - Excel</h1> <br><br>

			</div>


			<div class="col-md-12">

				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover" border="1" align="center" id="bilgi" width="80%">
							<thead>
								<tr class="success">
									<td>Öğrenci TC NO</td>
									<td>Öğrenci Adı</td>
									<td>Öğrenci Soyadı</td>
									<td>Öğrenci Kullanıcı Adı</td>
									<td>Öğrenci Şifre</td>
									<td>Toplam Staj Günü</td>
									<td>Öğrenci Baba Ad</td>
									<td>Öğrenci Anne Ad</td>
									<td>Öğrenci Doğum Yeri</td>
									<td>Öğrenci Doğum Tarihi</td>
									<td>Öğrenci Adres</td>
									<td>Öğrenci Telefon No</td>
									<td>Öğrenci Email</td>
									<td>Öğrenci No</td>
									<td>Öğrenci Sınıf</td>
									<td>Öğrenci NÖ/İÖ</td>


								</tr> </thead>
								<?php 
								$ogrsorgu=mysqli_query($baglan,"SELECT * from ogrenci where ogrenci_id='$id'"); 
								mysqli_set_charset($baglan, "utf8"); 
              while($ogrcek=mysqli_fetch_array($ogrsorgu)) //sorgudan dönen verileri diziye atarken kullanılır.
              {
              	echo '<tr>';
              	echo '<td>'.$ogrcek['ogrenci_tc_no'].'</td>';
              	echo '<td>'.$ogrcek['ogrenci_ad'].'</td>';
              	echo '<td>'.$ogrcek['ogrenci_soyad'].'</td>';
              	echo '<td>'.$ogrcek['ogrenci_kadi'].'</td>';
              	echo '<td>'.$ogrcek['ogrenci_sifre'].'</td>';
              	echo '<td>'.$ogrcek['toplam_gun'].'</td>';
              	echo '<td>'.$ogrcek['ogrenci_baba_ad'].'</td>';
              	echo '<td>'.$ogrcek['ogrenci_anne_ad'].'</td>';
              	echo '<td>'.$ogrcek['ogrenci_dogum_yeri'].'</td>';
              	echo '<td>'.$ogrcek['ogrenci_dogum_tarihi'].'</td>';
              	echo '<td>'.$ogrcek['ogrenci_adres'].'</td>';
              	echo '<td>'.$ogrcek['ogrenci_tel'].'</td>';
              	echo '<td>'.$ogrcek['ogrenci_email'].'</td>';
              	echo '<td>'.$ogrcek['ogrenci_no'].'</td>';
              	echo '<td>'.$ogrcek['ogrenci_sinif'].'</td>';
              	echo '<td>'.$ogrcek['ogrenci_no_io'].'</td>';


              	echo '</tr>';
              }

              ?>
              

              <thead><tr class="success">
              	<td>Staj Yılı</td>
              	<td>İş Yeri Adı</td>
              	<td>İş Yeri Web Adres</td>
              	<td>İş Yeri Adres</td>
              	<td>İş Yeri Telefon</td>
              	<td>İş Yeri Email</td>
              	<td>Staj 1/2</td>
              	<td>Cumartesi Dahil/Dahil Değil</td>
              	<td>İş Yeri Yetkili Ad</td>
              	<td>İş Yeri Yetkili Soyad</td>
              	<td>Staj Başlama Tarihi</td>
              	<td>Staj Bitiş Tarihi</td>
              	<td>Staj Süre</td>
              	<td>Staj Konu</td>

              </tr> </thead>
              <?php 
              $form2sorgu=mysqli_query($baglan,"SELECT * from form2 where ogrenci_id='$id'"); 
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

              
              <thead><tr class="success">
              	<td>Staja Devam Edilen Gün</td>
              	<td>Şirketin Öğrenciye Verdiği Not</td>
              	<td>Yapılan Staj Gün Sayısı</td>
              	<td>Kabul Edilen Staj Gün Sayısı</td>
              	<td>Değerlendirme Notu</td>



              </tr>
          </thead>
          <?php 
          $degsorgu=mysqli_query($baglan,"SELECT * from degerlendirme where ogr_id='$id' ORDER BY deg_id DESC LIMIT 1"); 
          mysqli_set_charset($baglan, "utf8"); 
              while($degcek=mysqli_fetch_array($degsorgu)) //sorgudan dönen verileri diziye atarken kullanılır.
              {
              	echo '<tr>';
              	echo '<td>'.$degcek['devam_gun'].'</td>';
              	echo '<td>'.$degcek['sirket_not'].'</td>';
              	echo '<td>'.$degcek['yapilan_gun'].'</td>';
              	echo '<td>'.$degcek['kabul_gun'].'</td>';
              	echo '<td>'.$degcek['okul_not'].'</td>';
              	

              	echo '</tr>';
              }

              ?>


              

          </table><br><br>
          <center><td><button onclick="exportTableToExcel('bilgi')">Export Table Data To Excel File</button></a></td></center>

      </div>
<!--</div>

<button style="width: 100%" type="submit"  name="btn_guncelle" class="btn btn-primary">Ders Güncelle</button>
</div>-->
</div>

<!-- /. ROW  -->


</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->



<script type="text/javascript"  charset="utf-8">


	function exportTableToExcel(tableID, filename = ''){
            

		var downloadLink;
		var dataType = 'application/vnd.ms-excel';
		var tableSelect = document.getElementById(tableID);
		var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
    	var blob = new Blob(['\ufeff', tableHTML], {
    		type: dataType
    	});
    	navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}

</script>


<?php include 'footer.php'; ?>
