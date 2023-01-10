<nav class="navbar navbar-fixed-top navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 30px;">
            <div class="container">
                <span class="navbar-brand mb-0 h1">kajasbumba</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item mx-2 active">
                            <a class="nav-link" href="index.php">Sākums</a>
                        </li>
                        <li class="nav-item mx-2 dropdown">
                            <a href="#" 
                                class="nav-link dropdown-toggle" 
                                id="navbarDropdown1" 
                                role="button" 
                                data-bs-toggle="dropdown" 
                                aria-expanded="false">
                                Uzbūve
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                    <a class="dropdown-item" href="tabulas_izvele.php">Izvēlēties tabulu</a>
                                    <a class="dropdown-item" href="vaicajumu_saraksts.php">Vaicājums</a>
                                    <a class="dropdown-item" href="proceduras_ievietosana.php">Procedūra</a>
                            </div>
                        </li>
                        <li class="nav-item mx-2 dropdown">
                            <a href="#"                              
                                class="nav-link dropdown-toggle" 
                                id="navbarDropdown2" 
                                role="button" 
                                data-bs-toggle="dropdown" 
                                aria-expanded="false">
                                Skripti
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                    <a class="dropdown-item" href="tabulu_izveides_skripti.php">Izveides</a>
                                    <a class="dropdown-item" href="datu_ievietosanas_skripti.php">Datu ievietošanas</a>
                            </div>
                        </li>
                        <li class="nav-item mx-2">
                            <form action="table.php" class="d-flex" method="get">
                                <input type="text" class="form-control me-2" name="table" placeholder="Tabulas nosaukums">
                                <button class="btn btn-light mx-2" type="submit">Izvēlēties</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>