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
        <h4>Vaicājums 1</h4>
        <pre>
            SELECT Uzvards, Vards, Pozicija, Nosaukums
            FROM speletaji INNER JOIN klubi
            USING (KlubsID)
            ORDER BY klubi.Nosaukums;
        </pre>
        <h4>Vaicājums 2</h4>
        <pre>
            SELECT * FROM speletaji
            WHERE YEAR(Dzimsanas_diena) &gt;= 2000 AND (Pozicija = "MID" OR Pozicija = "DEF");
        </pre>
        <h4>Vaicājums 3</h4>
        <pre>
            SELECT Valsts, COUNT(*)
            FROM speletaji
            GROUP BY Valsts
            ORDER BY 2 DESC;
        </pre>
        <h4>Vaicājums 4</h4>
        <pre>
            SELECT *, DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), Dzimsanas_diena)), '%Y') + 0 AS vecums
            FROM speletaji
            ORDER BY vecums DESC;
        </pre>
        <h4>Vaicājums 5</h4>
        <pre>
            SELECT Vards, Uzvards, Pozicija, Nosaukums, Nospeletas_minutes
            FROM klubi JOIN speletaji JOIN speletajs_statistika
            ON klubi.KlubsID = speletaji.KlubsID AND
            speletaji.SpeletajsID = speletajs_statistika.SpeletajsID AND
            speletajs_statistika.Ligas_nosaukums = "Premier League"
            ORDER BY Nospeletas_minutes DESC;
        </pre>
        <h4>Vaicājums 6</h4>
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
        <h4>Vaicājums 7</h4>
        <pre>
            SELECT Uzvards, Vards, Nosaukums, Ligas_nosaukums
            FROM klubi JOIN speletaji JOIN speletajs_statistika
            ON klubi.KlubsID = speletaji.KlubsID AND
            speletaji.SpeletajsID = speletajs_statistika.SpeletajsID AND 
            speletaji.Uzvards LIKE "A%" AND speletajs_statistika.Ligas_nosaukums = "Europa League";
        </pre>
        <h4>Vaicājums 8</h4>
        <pre>
            SELECT *
            FROM klubi RIGHT JOIN ligas_klubi
            ON klubi.KlubsID = ligas_klubi.KlubsID
            WHERE LigasID = 1;
        </pre>
        <h4>Vaicājums 9</h4>
        <pre>
            SELECT COUNT(DISTINCT Valsts) AS "Parstavetas valstis" 
            FROM speletaji, speletajs_statistika
            WHERE speletaji.SpeletajsID = speletajs_statistika.SpeletajsID AND
            speletajs_statistika.Ligas_nosaukums = "Premier League";
        </pre>
        <h4>Vaicājums 10</h4>
        <pre>
            SELECT sp.SpeletajsID, sp.Vards, sp.Uzvards, sp.Pozicija, sp_sk.Total_mins
            FROM speletaji AS sp
            JOIN (SELECT SpeletajsID, SUM(Nospeletas_minutes) AS Total_mins
                    FROM speletajs_statistika
                    GROUP BY SpeletajsID
                    ) AS sp_sk ON sp.SpeletajsID = sp_sk.SpeletajsID;
        </pre>
        <form action="vaicajuma_rezultats.php" method="post">
        <label for="ieraksts">Ievadiet vaicājumu:</label>
        <br/>
        <textarea name="ieraksts" required rows="4" cols="80"></textarea>
        <br/>
        <input type="submit" value="izpildit">
        </form>
    </body>
</html>