<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>
        <?php include('nav.php'); ?>
        <h1>DB Apraksts</h1>
        Izveidotā datubāze “kajasbumba” ir paredzēta futbola līgu un spēlētāju statistikas datu glabāšanai. 
        Tai pieder 7 entītijas – “treneri”, “stadioni”, “speletaji”, “speletajs_statistika”, “klubi”, “ligas” un “ligas_klubi”. Entītijas – “speletaji”, “treneri” un “stadioni” tiek savienoti ar “klubi”. 
        Vienam klubam var piesaistīt vairākus spēlētājus, vienu treneri (trenerim vienu klubu) un vienam stadionam vairākus klubus. 
        Lai nodrošinātu līgas datu glabātuvi ir izveidota saites starp “klubi”, starptabulu “ligas_klubi”un “ligas”. 
        Tā kā klubs var spēlēt vairākās līgās vienlaicīgi, bet spēlētājam katrā līgā statistika atšķirties, spēlētāju statistika tiek saglabāta katrai līgai norādot līgas nosaukumu (“Ligas_nosaukums”) un sezonu (“Sezona”). 
        Šādi tiek nodrošināts, lai neveidojas datubāzē cikls (klubi > speletajs > statistika > liga > ligas_klubi > klubi) un 1 spēlētājam var piesaistīt statistiku no vairākām līgām.
    </body>
</html>