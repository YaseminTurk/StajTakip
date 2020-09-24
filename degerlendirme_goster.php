<?php 
include 'baglan.php';
include 'header.php';
include 'sidebar.php';


?>

<div id="page-wrapper">
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-head-line">Değerlendirme Sonucu</h1> <br><br>

      </div>
      


      <div class="col-md-12">

        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-hover" border="1" align="center" width="80%">
              <thead>
                <tr class="success">
                  <td>Ögrenci Ad</td>
                  <td>Öğrenci Soyad</td>
                  <td>Staja Devam Edilen Gün</td>
                  <td>Şirketin Öğrenciye Verdiği Not</td>
                  <td>Yapılan Staj Gün Sayısı</td>
                  <td>Kabul Edilen Staj Gün Sayısı</td>
                  <td>Değerlendirme Notu</td>
                  


                </tr>
              </thead>


              <?php

  $ogr_id=$_GET['ogrenci_id'];

$stajsorgu=mysqli_query($baglan,"SELECT * from degerlendirme inner join ogrenci on degerlendirme.ogr_id=ogrenci.ogrenci_id where ogr_id=$ogr_id ORDER BY deg_id DESC LIMIT 1"); 

mysqli_set_charset($baglan, "utf8");



            while($stajcek=mysqli_fetch_array($stajsorgu)) //sorgudan dönen verileri diziye atarken kullanılır.
            {

              echo '<tr>';
              echo '<td>'.$stajcek['ogrenci_ad'].'</td>';
              echo '<td>'.$stajcek['ogrenci_soyad'].'</td>';
              echo '<td>'.$stajcek['devam_gun'].'</td>';
              echo '<td>'.$stajcek['sirket_not'].'</td>';
              echo '<td>'.$stajcek['yapilan_gun'].'</td>';
              echo '<td>'.$stajcek['kabul_gun'].'</td>';
              echo '<td>'.$stajcek['okul_not'].'</td>';
              
              
              

              echo '</tr>';
              


            }
            ?>

          </table> <br>

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
                <tr class="success">
                  <td>Kalan Staj Gün Sayısı</td>
                  <td>Sayılan Staj Gün Sayısı</td>
                  <td>Devamsız Gün Sayısı</td>
                 

                </tr>
              </thead>


              <?php

  $ogr_id=$_GET['ogrenci_id'];

$stajsorgu=mysqli_query($baglan,"SELECT * from degerlendirme inner join ogrenci on degerlendirme.ogr_id=ogrenci.ogrenci_id where ogr_id=$ogr_id ORDER BY deg_id DESC LIMIT 1"); 

mysqli_set_charset($baglan, "utf8");



            while($stajcek=mysqli_fetch_array($stajsorgu)) //sorgudan dönen verileri diziye atarken kullanılır.
            {

              $kalan=$stajcek['toplam_gun']-$stajcek['kabul_gun'];
              $sayılan=$stajcek['kabul_gun'];
              $devamsız=$stajcek['toplam_gun']-$stajcek['devam_gun'];
              

              echo '<tr>';

              echo '<td>'.$kalan.'</td>';
              echo '<td>'.$sayılan.'</td>';
              echo '<td>'.$devamsız.'</td>';
              
              
              
              

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


</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->





<?php include 'footer.php'; ?>
