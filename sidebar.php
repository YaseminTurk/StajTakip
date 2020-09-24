<?php 

if (isset($_SESSION['admin_kadi'])) {
    $admin=$_SESSION['admin_kadi'];
    $adminsorgu=mysqli_query($baglan,"SELECT * FROM admin where admin_kadi='$admin' ");
    $admincek=mysqli_fetch_array($adminsorgu);
    $admin_yetki=$admincek["admin_yetki"];
}


?>

<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div">
                    <img src="assets/img/tf_logo_tr.png" class="img-thumbnail" />

                    <div class="inner-text">



                        Hoşgeldiniz <?php 
                        if(isset($_SESSION['ogrenci_kadi'])){ echo $_SESSION['ogrenci_kadi'];  }
                        if(isset($_SESSION['admin_kadi']) and $admin_yetki==1){ echo $_SESSION['admin_kadi'];  }
                        if(isset($_SESSION['admin_kadi']) and $admin_yetki==0){ echo $_SESSION['admin_kadi'];  }?>
                        <br />
                        <small> </small>
                    </div>
                </div>

            </li>


            <?php //evrak teslim ise
            if(isset($_SESSION['admin_kadi']) and $admin_yetki==0 and !isset($_SESSION['ogrenci_kadi']) ){?>
             <li>
                <a class="active-menu" href="index.php"><i class="fa fa-dashboard "></i>Anasayfa</a>
            </li>

            <li>
                <a  href="admin_profil_duzenle.php"><i class="fa fa-dashboard "></i>Profil Güncelle</a>
            </li>  

            <li>
                <a  href="ogrenci_bilgileriii.php"><i class="fa fa-dashboard "></i>Ögrenci Bilgileri</a>
            </li>

            
        <?php }

        ?>

        <?php 

        

        if(isset($_SESSION['ogrenci_kadi']) and !isset($_SESSION['admin_kadi'])){

            $ogr=$_SESSION['ogrenci_kadi'];
            $ogrid=mysqli_query($baglan,"SELECT * FROM ogrenci where ogrenci_kadi='$ogr' ");
            $cek=mysqli_fetch_array($ogrid);
            $id=$cek["ogrenci_id"];


            $ogrform=mysqli_query($baglan,"SELECT * FROM form2 where ogrenci_id='$id'  ");
            $say=mysqli_num_rows($ogrform);
            $ogrform1=mysqli_query($baglan,"SELECT * FROM form2 where ogrenci_id='$id' and durum=1  ");
            $say2=mysqli_num_rows($ogrform1);


            ?>

            <li>
                <a class="active-menu" href="index.php"><i class="fa fa-dashboard "></i>Anasayfa</a>
            </li>

            <li>
                <a  href="profil_duzenle.php"><i class="fa fa-dashboard "></i>Profil Güncelle</a>
            </li>
            <?php if ($say==0) {?>
             <li>
                <a  href="form2_ekle.php"><i class="fa fa-dashboard "></i>Form2 Ekle</a>
            </li>
        <?php } ?>

        <?php if ($say2!=1 and $say!=0) {?>
             <li>
                <a  href="form_guncelle.php"><i class="fa fa-dashboard "></i>Form2 Güncelle</a>
            </li>
        <?php } ?>
        


        <li>
            <a  href="uyari_mesaji.php"><i class="fa fa-dashboard "></i>Uyarı Mesajı</a>
        </li>

        <li>

            <a  href="degerlendirme_goster.php?ogrenci_id=<?php echo $id; ?>"><i class="fa fa-dashboard "></i>Değerlendirme</a>
        </li>

    <?php }

    ?>

    <?php //staj_komisyonu ise
    if(isset($_SESSION['admin_kadi'] ) and $admin_yetki==1 and !isset($_SESSION['ogrenci_kadi'])){?>
     <li>
        <a class="active-menu" href="index.php"><i class="fa fa-dashboard "></i>Anasayfa</a>
    </li>

    <li>
        <a  href="admin_profil_duzenle.php"><i class="fa fa-dashboard "></i>Profil Güncelle</a>
    </li> 

    <li>
        <a  href="ogrenci_bilgileriii.php"><i class="fa fa-dashboard "></i>Öğrenci Bilgileri</a>
    </li>

    

    <li>
        <a  href="evrak_teslim_bilgileri.php"><i class="fa fa-dashboard "></i>Evrak Teslim Bilgileri</a>
    </li>






<?php }

?>




</ul>

</div>

</nav>