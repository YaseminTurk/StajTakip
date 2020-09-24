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
      <?php if (isset($_SESSION['admin_kadi']) and $admin_yetki==1) {?>

        <div class="col-md-2">

          <a href="ogrenci_ekle.php"><button style="width: 100%" type="submit"  name="btn_ekle" class="btn btn-primary">Öğrenci Ekle</button></a><br><br>

        </div>

      <?php } ?>
      


      <div class="col-md-12">

        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-hover" border="1" align="center" width="80%">
              <thead>
                <tr class="success">

                  <td>Ögrenci No</td>
                  <td>Ögrenci Adı</td>
                  <td>Ögrenci Soyadı</td>
                  <td>Göster</td>
                  <?php if (isset($_SESSION['admin_kadi']) and $admin_yetki==0) {?>

                   <td>Mesaj Gönder</a></td>

                 <?php } ?>

               </tr>
             </thead>

             <?php

             $ogrencisorgu=mysqli_query($baglan,"SELECT * from ogrenci "); 

             mysqli_set_charset($baglan, "utf8");

            while($ogrencicek=mysqli_fetch_array($ogrencisorgu)) //sorgudan dönen verileri diziye atarken kullanılır.
            {

              echo '<tr>';
              echo '<td>'.$ogrencicek['ogrenci_no'].'</td>';
              echo '<td>'.$ogrencicek['ogrenci_ad'].'</td>';
              echo '<td>'.$ogrencicek['ogrenci_soyad'].'</td>';
              
              ?>

              <?php if (isset($_SESSION['admin_kadi']) and $admin_yetki==0) {?>

                <td><a href="gosterform.php?ogrenci_id=<?php echo $ogrencicek['ogrenci_id'] ?>"><button style="width: 100%" type="submit"  name="btn_ggoster1" class="btn btn-primary">GÖSTER</button></a></td>
                <td><a href="mesaj_yaz.php?ogrenci_id=<?php echo $ogrencicek['ogrenci_id'] ?>"><button style="width: 100%" type="submit"  name="btn_guncelle" class="btn btn-primary">Mesaj Gönder</button></a></td>

              <?php } ?>

              <?php if (isset($_SESSION['admin_kadi']) and $admin_yetki==1) {?>

                <td><a href="goster.php?ogrenci_id=<?php echo $ogrencicek['ogrenci_id'] ?>"><button style="width: 100%" type="submit"  name="btn_goster" class="btn btn-primary">GÖSTER</button></a></td>
              <?php } 

              echo '</tr>';
              


            }
            ?>

          </table>

        </div>
<!--</div>

</div>-->
</div>

<!-- /. ROW  -->


</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->




<?php include 'footer.php'; ?>
