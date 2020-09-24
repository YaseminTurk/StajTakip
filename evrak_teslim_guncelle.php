<?php 
include 'baglan.php';
include 'header.php';
include 'sidebar.php';


$evrak_teslim_id=$_GET['evrak_teslim_id'];
$evrak_teslim_sorgu=mysqli_query($baglan,"SELECT * from admin where admin_id='$evrak_teslim_id' "); 

mysqli_set_charset($baglan, "utf8");
$evrakteslimcek=mysqli_fetch_array($evrak_teslim_sorgu);




?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Evrak Teslim Düzenle</h1> <br><br>



            </div>
        </div>
        <!-- /. ROW  -->

        <form action="" method="POST" role="form">

            

            <div class="form-group">
                <label>Evrak Teslim Adı</label>
                <input class="form-control" type="text" name="evrak_teslim_ad" value="<?php echo $evrakteslimcek['admin_ad'] ?>">
            </div>
            <div class="form-group">
                <label>Evrak Teslim Soyadı</label>
                <input class="form-control" type="integer" name="evrak_teslim_soyad" value="<?php echo $evrakteslimcek['admin_soyad'] ?>">
            </div>
            <div class="form-group">
                <label>Evrak Teslim Kullanıcı Adı</label>
                <input class="form-control" type="text" name="evrak_teslim_kadi" value="<?php echo $evrakteslimcek['admin_kadi'] ?>">
            </div>
            <div class="form-group">
                <label>Evrak Teslim Şifresi</label>
                <input class="form-control" type="integer" name="evrak_teslim_sifre" value="<?php echo $evrakteslimcek['admin_sifre'] ?>">
            </div>
            <br>

            <!-- <center><a href="ders_ekle.php"><button style="background-color: blue lighten" type="button" name="btn_ekle" class="btn btn-lg btn-primary">Ders Ekle</button></a></center> <br> -->

            <center><button style="width: 100%" type="submit" name="evrak_teslim_duzenle_kaydet" class="btn btn-primary">Kaydet</button></center>  <br>

        </form>


    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->


<?php 

if(isset($_POST['evrak_teslim_duzenle_kaydet']))
{
    $evrak_teslim_id=$_GET['evrak_teslim_id'];
    $evrak_teslim_duzenle_kaydet=mysqli_query($baglan,"UPDATE admin set admin_ad='".$_POST['evrak_teslim_ad']."', admin_soyad='".$_POST['evrak_teslim_soyad']."', admin_kadi='".$_POST['evrak_teslim_kadi']."', admin_sifre='".$_POST['evrak_teslim_sifre']."' where admin_id='$evrak_teslim_id' ");

    if ($evrak_teslim_duzenle_kaydet) 
    {
        
        header('Location:evrak_teslim_bilgileri.php');

    }
    else
    {
        echo '<script type="text/javascript">alert("Güncelleme İşleminiz Başarısız. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=evrak_teslim_bilgileri.php" />';
        //header('Location:evrak_teslim_bilgileri.php?durum=no');
    }

}


?>


<?php include 'footer.php'; ?>
