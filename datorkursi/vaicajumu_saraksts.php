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
        <div class="container-fluid">
            <div class="row d-flex justify-content-center" style="justify-content: center">
                <div class="col-sm-3 shadow p-3 mb-5 bg-body rounded mx-3">
                    <h1 class="display-5 mb-3 text-center">Vaicājums 1</h1>
                    <pre>
                        SELECT Uzvards, Vards, Pozicija, Nosaukums
                        FROM speletaji INNER JOIN klubi
                        USING (KlubsID)
                        ORDER BY klubi.Nosaukums;
                    </pre>
                </div>
                <div class="col-sm-3 shadow p-3 mb-5 bg-body rounded mx-3">
                    <h1 class="display-5 mb-3 text-center">Vaicājums 2</h1>
                    <pre>
                        SELECT * FROM speletaji
                        WHERE YEAR(Dzimsanas_diena) &gt;= 2000 AND (Pozicija = "MID" OR Pozicija = "DEF");
                    </pre>
                </div>
                <div class="col-sm-3 shadow p-3 mb-5 bg-body rounded mx-3">
                    <h1 class="display-5 mb-3 text-center">Vaicājums 3</h1>
                    <pre>
                        SELECT Valsts, COUNT(*)
                        FROM speletaji
                        GROUP BY Valsts
                        ORDER BY 2 DESC;
                    </pre>
                </div>
                <div class="col-sm-3 shadow p-3 mb-5 bg-body rounded mx-3">
                    <h1 class="display-5 mb-3 text-center">Vaicājums 4</h1>
                    <pre>
                        SELECT *, DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), Dzimsanas_diena)), '%Y') + 0 AS vecums
                        FROM speletaji
                        ORDER BY vecums DESC;
                    </pre>
                </div>
                <div class="col-sm-3 shadow p-3 mb-5 bg-body rounded mx-3">
                    <h1 class="display-5 mb-3 text-center">Vaicājums 5</h1>
                    <pre>
                        SELECT Vards, Uzvards, Pozicija, Nosaukums, Nospeletas_minutes
                        FROM klubi JOIN speletaji JOIN speletajs_statistika
                        ON klubi.KlubsID = speletaji.KlubsID AND
                        speletaji.SpeletajsID = speletajs_statistika.SpeletajsID AND
                        speletajs_statistika.Ligas_nosaukums = "Premier League"
                        ORDER BY Nospeletas_minutes DESC;
                    </pre>
                </div>
                <div class="col-sm-3 shadow p-3 mb-5 bg-body rounded mx-3">
                    <h1 class="display-5 mb-3 text-center">Vaicājums 6</h1>
                    <pre>
                        SELECT Nosaukums, ROUND(AVG(Nospeletas_minutes), 0) as "Videjais speles laiks starp komandas speletajiem (min)", Ligas_nosaukums
                        FROM speletajs_statistika, klubi
                        WHERE Ligas_nosaukums = "Premier League" AND Nosaukums = 
                            (
                                SELECT Nosaukums 
                                FROM klubi, speletaji 
                                WHERE 
                                    speletaji.SpeletajsID = speletajs_statistika.SpeletajsID 
                                    AND speletaji.KlubsID = klubi.KlubsID
                            )
                        GROUP BY Nosaukums;
                    </pre>
                </div>
                <div class="col-sm-3 shadow p-3 mb-5 bg-body rounded mx-3">
                    <h1 class="display-5 mb-3 text-center">Vaicājums 7</h1>
                    <pre>
                        SELECT Uzvards, Vards, Nosaukums, Ligas_nosaukums
                        FROM klubi JOIN speletaji JOIN speletajs_statistika
                        ON klubi.KlubsID = speletaji.KlubsID AND
                        speletaji.SpeletajsID = speletajs_statistika.SpeletajsID AND 
                        speletaji.Uzvards LIKE "A%" AND speletajs_statistika.Ligas_nosaukums = "Europa League";
                    </pre>
                </div>
                <div class="col-sm-3 shadow p-3 mb-5 bg-body rounded mx-3">
                    <h1 class="display-5 mb-3 text-center">Vaicājums 8</h1>
                    <pre>
                        SELECT *
                        FROM klubi RIGHT JOIN ligas_klubi
                        ON klubi.KlubsID = ligas_klubi.KlubsID
                        WHERE LigasID = 1;
                    </pre>
                </div>
                <div class="col-sm-3 shadow p-3 mb-5 bg-body rounded mx-3">
                    <h1 class="display-5 mb-3 text-center">Vaicājums 9</h1>
                    <pre>
                        SELECT COUNT(DISTINCT Valsts) AS "Parstavetas valstis" 
                        FROM speletaji, speletajs_statistika
                        WHERE speletaji.SpeletajsID = speletajs_statistika.SpeletajsID AND
                        speletajs_statistika.Ligas_nosaukums = "Premier League";
                    </pre>
                </div>
                <div class="col-sm-3 shadow p-3 mb-5 bg-body rounded mx-3">
                    <h1 class="display-5 mb-3 text-center">Vaicājums 10</h1>
                    <pre>
                        SELECT sp.SpeletajsID, sp.Vards, sp.Uzvards, sp.Pozicija, sp_sk.Total_mins
                        FROM speletaji AS sp
                        JOIN (SELECT SpeletajsID, SUM(Nospeletas_minutes) AS Total_mins
                                FROM speletajs_statistika
                                GROUP BY SpeletajsID
                                ) AS sp_sk ON sp.SpeletajsID = sp_sk.SpeletajsID;
                    </pre>
                </div>
                <div class="col-sm-9 shadow p-3 mb-5 bg-body rounded mx-3" style="justify-content: center">
                    <form action="vaicajuma_rezultats.php" method="post">
                        <label for="ieraksts" class="form-label">Ievadiet vaicājumu:</label>
                        <br/>
                        <textarea name="ieraksts" class="form-control" required rows="4" cols="80"></textarea>
                        <br/>
                        <button type="submit" class="btn btn-dark mx-2">Izpildīt</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>