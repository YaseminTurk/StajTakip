<?php 
include 'baglan.php';
include 'header.php';
include 'sidebar.php';
?>

<div id="page-wrapper">
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-head-line">Staj Takip Sistemi - Mesaj Yaz</h1> <br><br>

      </div>


      <div class="col-md-12">

        <div class="panel-body">
          <div class="table-responsive">
            <form action="" method="POST" role="form">


              <div class="form-group">
                <label>Mesaj</label> <br><br>
                <textarea rows="5" cols="140" name="mesaj_yaz" placeholder="Mesajınızı buraya yazınız..."></textarea> 
              </div>
              
              <br>
              
              <center><button style="width: 100%" type="submit" name="mesaj_gonder" class="btn btn-primary">Gönder</button></center> <br>

            </form>

          </div>
</div>
</div>
</div>
<!-- /. ROW  -->
</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->


<?php 

if(isset($_POST['mesaj_gonder']))
{
  $ogr_id=$_GET['ogrenci_id']; 

  if (isset($_SESSION['admin_kadi'])) {
    $gonderen=$_SESSION['admin_kadi'];

    $gonderenid=mysqli_query($baglan,"SELECT * FROM admin where admin_kadi='$gonderen' ");
  $cek=mysqli_fetch_array($gonderenid);
  $id=$cek["admin_id"];

  }
  

  
  $tarih=date('Y.m.d');
  $saat=date('H:i');
  $imesaj=$_POST['mesaj_yaz'];



  // echo $ogr_id;
  // echo $gonderen;
  // echo $id;
  // echo $tarih;
  // echo $saat;
  // echo $imesaj;

  $gonder=mysqli_query($baglan,"INSERT into mesaj (ogrenci_id,gonderen_id,icerik,saat,tarih) VALUES ('".$ogr_id."','".$id."','".$imesaj."','".$saat."','".$tarih."') ");
  if ($gonder) 
  {
    echo '<script type="text/javascript">alert("Mesaj Gönderildi.");</script> <meta http-equiv="refresh" content="0;URL=mesaj_yaz.php" />';
    //header('Location:mesaj_yaz.php');
  }
  else
  {
    echo '<script type="text/javascript">alert("Mesaj Gönderilemedi. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=mesaj_yaz.php" />';
    //header('Location:mesaj_yaz.php');

  }

}

?>

<?php include 'footer.php'; ?>
