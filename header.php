<?php ob_start();
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }


    if (isset($_SESSION['admin_kadi'])) {
    $admin=$_SESSION['admin_kadi'];
    $adminsorgu=mysqli_query($baglan,"SELECT * FROM admin where admin_kadi='$admin' ");
    $admincek=mysqli_fetch_array($adminsorgu);
    $admin_yetki=$admincek["admin_yetki"];
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Staj Takip Otomasyonu</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><?php if (isset($_SESSION['admin_kadi']) and $admin_yetki==1) {
                    echo "Staj Komisyonu Paneli";
                } if (isset($_SESSION['ogrenci_kadi'])) {
                    echo "Öğrenci Paneli";
                } if (isset($_SESSION['admin_kadi']) and $admin_yetki==0) {
                    echo "Evrak Teslim Paneli";
                } ?></a>
            </div>

            <div class="header-right">

            

                <a href="logout.php" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i>Güvenli Çıkıs</a>



            </div>
        </nav>