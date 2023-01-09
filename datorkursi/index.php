<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
<?php include('head.php'); ?>
<body>
    <?php include('nav.php'); ?>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-6">
                    <img src="atteli/shema.png" alt="Datubāzes shēma" class="img-fluid">
            </div>
            <div class="col-sm-6">
                <p>
                        Izveidotā datubāze “kajasbumba” ir paredzēta futbola līgu un spēlētāju statistikas datu glabāšanai. 
                    Tai pieder 7 entītijas – “treneri”, “stadioni”, “speletaji”, “speletajs_statistika”, “klubi”, “ligas” un “ligas_klubi”. Entītijas – “speletaji”, “treneri” un “stadioni” tiek savienoti ar “klubi”. 
                    Vienam klubam var piesaistīt vairākus spēlētājus, vienu treneri (trenerim vienu klubu) un vienam stadionam vairākus klubus. 
                    Lai nodrošinātu līgas datu glabātuvi ir izveidota saites starp “klubi”, starptabulu “ligas_klubi”un “ligas”. 
                    Tā kā klubs var spēlēt vairākās līgās vienlaicīgi, bet spēlētājam katrā līgā statistika atšķirties, spēlētāju statistika tiek saglabāta katrai līgai norādot līgas nosaukumu (“Ligas_nosaukums”) un sezonu (“Sezona”). 
                    Šādi tiek nodrošināts, lai neveidojas datubāzē cikls (klubi > speletajs > statistika > liga > ligas_klubi > klubi) un 1 spēlētājam var piesaistīt statistiku no vairākām līgām.
                </p>
            </div>
        </div>
    </div>

</body>
</html>