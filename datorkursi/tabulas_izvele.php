<?php
require_once("config.php");
include('head.php');
include('nav.php');
echo '<h1 class="display-3 text-center mb-5">Tabulas</h1>';
// forma
echo '<div class="small-middle-container">';
echo
    '<form action="table.php" class="d-flex" method="get">
        <input type="text" class="form-control me-2" name="table" placeholder="Tabulas nosaukums">
        <button class="btn btn-dark mx-2" type="submit">Izvēlēties</button>
    </form>';
// tabulu saraksts
echo '<div class="shadow p-3 mb-5 bg-body rounded">';
include('tabulu_saraksts.php');
    echo '</div>';
echo '</div>';
