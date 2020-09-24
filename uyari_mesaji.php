<?php 
include 'baglan.php';
include 'header.php';
include 'sidebar.php';
?>

<div id="page-wrapper">
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-head-line">Mesajlar</h1> <br><br>

      </div>

      
      <div class="col-md-12">

        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-hover" border="1" align="center" width="80%" >
              <thead>
                <tr class="success">
                  <td>Mesaj ID</td>
                  <td>Gönderen</td>
                  <td>Mesaj</td>
                  <td>Saat</td>
                  <td>Tarih</td>

                </tr>
              </thead>


              <?php 
              
              $ogr=$_SESSION['ogrenci_kadi'];

              $ogrid=mysqli_query($baglan,"SELECT * FROM ogrenci where ogrenci_kadi='$ogr' ");
              $cek=mysqli_fetch_array($ogrid);
  $id=$cek["ogrenci_id"]; //session dan id çekildi



  $mesaj=mysqli_query($baglan,"SELECT * FROM mesaj inner join admin on mesaj.gonderen_id=admin.admin_id where ogrenci_id='$id' ");


  
  while($cek1=mysqli_fetch_array($mesaj)) //sorgudan dönen verileri diziye atarken kullanılır.
  {
    
    echo '<tr>';
    echo '<td>'.$cek1['mesaj_id'].'</td>';
    echo '<td>'.$cek1['admin_ad'].'</td>';
    echo '<td>'.$cek1['icerik'].'</td>';
    echo '<td>'.$cek1['saat'].'</td>';
    echo '<td>'.$cek1['tarih'].'</td>';
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
