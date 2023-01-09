<nav class="navbar navbar-fixed-top navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <span class="navbar-brand mb-0 h1">kajasbumba</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Sākums</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" 
                                class="nav-link dropdown-toggle" 
                                id="navbarDropdown" 
                                role="button" 
                                data-bs-toggle="dropdown" 
                                aria-expanded="false">
                                Uzbūve
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="tabulu_saraksts.php">Tabulas</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="tabulas_izvele.php">Izvēlēties tabulu</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="vaicajumu_saraksts.php">Vaicājums</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="proceduras_ievietosana.php">Procedūra</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="apraksts.php">Apraksts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shema.php">Shēma</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tabulu_izveides_skripti.php">Izveides skripti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="datu_ievietosanas_skripti.php">Datu ievietošanas skripti</a>
                        </li>
                        <form action="table.php" class="d-flex">
                            <input type="text" class="form-control me-2" name="table" placeholder="Ievadiet tabulas nosaukumu">
                            <button class="btn btn-light" type="submit">Izvēlēties</button>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>