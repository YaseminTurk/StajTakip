<?php 
include 'baglan.php';
include 'header.php';
include 'sidebar.php';
?>

<div id="page-wrapper">
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-head-line">Evrak Teslim Bilgileri</h1> <br><br>

      </div>
      <div class="col-md-2">

        <a href="evrak_teslim_ekle.php"><button style="width: 100%" type="submit"  name="btn_ekle" class="btn btn-primary">Evrak Teslim Ekle</button></a><br><br>

     </div>


     <div class="col-md-12">

      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-hover" border="1" align="center" width="80%">
            <thead>
              <tr class="success">
                <td>Evrak Teslim ID</td>
                
                <td>Evrak Teslim Adı</td>
                <td>Evrak Teslim Soyadı</td>
                <td>Evrak Teslim Kullanıcı Adı</td>
                <td>Evrak Teslim Şifre</td>

                <td>Güncelle</td>
                <td>Sil</td>


              </tr>
            </thead>


            <?php

            $evrakteslimsorgu=mysqli_query($baglan,"SELECT * from admin where admin_yetki=0"); 

            mysqli_set_charset($baglan, "utf8");



            while($evrakteslimcek=mysqli_fetch_array($evrakteslimsorgu)) //sorgudan dönen verileri diziye atarken kullanılır.
            {

              echo '<tr>';
              echo '<td>'.$evrakteslimcek['admin_id'].'</td>';
              echo '<td>'.$evrakteslimcek['admin_ad'].'</td>';
              echo '<td>'.$evrakteslimcek['admin_soyad'].'</td>';
              echo '<td>'.$evrakteslimcek['admin_kadi'].'</td>';
              echo '<td>'.$evrakteslimcek['admin_sifre'].'</td>';
              ?>
              <td><a href="evrak_teslim_guncelle.php?evrak_teslim_id=<?php echo $evrakteslimcek['admin_id'] ?>"><button style="width: 100%" type="submit"  name="btn_guncelle" class="btn btn-primary">Güncelle</button></a></td>

              <td><a href="evrak_teslim_bilgileri.php?evrak_teslim_id=<?php echo $evrakteslimcek['admin_id'] ?> & evrakteslimsil=ok"><button style="width: 100%" type="submit"  name="btn_guncelle" class="btn btn-primary">Sil</button></a></td>



              <?php

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


<?php 

if(@$_GET['evrakteslimsil']=="ok")
{

  $etsil=mysqli_query($baglan,"DELETE from admin where admin_id='".$_GET['evrak_teslim_id']."'");


  if ($etsil) 
  {

    header('Location:evrak_teslim_bilgileri.php');

  }
  else
  {
    echo '<script type="text/javascript">alert("Silme İşleminiz Başarısız. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=evrak_teslim_bilgileri.php" />';
    //header('Location:evrak_teslim_bilgileri.php?durum=no');
  }
  
}

 ?>


<?php include 'footer.php'; ?>
