<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
<?php include('head.php'); ?>
<body>
    <?php include('nav.php'); ?>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-6">
                    <h1 class="display-3 text-center mb-5">Shēma</h1>
                    <div class="shadow p-3 mb-5 bg-body rounded">
                        <img src="atteli/shema.png" alt="Datubāzes shēma" class="img-fluid">
                    </div>
            </div>
            <div class="col-sm-6">
                <h1 class="display-3 text-center mb-5">Apraksts</h1>
                <?php include('tabulu_saraksts.php'); ?>
                <p class="fw-normal font-monospace text-center text-md-start mt-5">
                        Izveidotā datubāze “kajasbumba” ir paredzēta futbola līgu un spēlētāju statistikas datu glabāšanai. 
                    Tai pieder 7 entītijas – “treneri”, “stadioni”, “speletaji”, “speletajs_statistika”, “klubi”, “ligas” un “ligas_klubi”. Entītijas – “speletaji”, “treneri” un “stadioni” tiek savienoti ar “klubi”. 
                    Vienam klubam var piesaistīt vairākus spēlētājus, vienu treneri (trenerim vienu klubu) un vienam stadionam vairākus klubus. 
                    Lai nodrošinātu līgas datu glabātuvi ir izveidota saites starp “klubi”, starptabulu “ligas_klubi”un “ligas”. <br> 
                    Tā kā klubs var spēlēt vairākās līgās vienlaicīgi, bet spēlētājam katrā līgā statistika atšķirties, spēlētāju statistika tiek saglabāta katrai līgai norādot līgas nosaukumu (“Ligas_nosaukums”) un sezonu (“Sezona”). 
                    Šādi tiek nodrošināts, lai neveidojas datubāzē cikls (klubi > speletajs > statistika > liga > ligas_klubi > klubi) un 1 spēlētājam var piesaistīt statistiku no vairākām līgām.
                </p>
                
            </div>
        </div>
    </div>

</body>
</html>