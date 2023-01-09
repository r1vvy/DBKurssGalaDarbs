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
        <form id="procedure" action="proceduras_rezultats.php" method="post">
            <label for="procedura">Ievadiet procedūru:</label>
            <br/>
            <textarea name="procedura" required rows="4" cols="80"></textarea>
            <br/>
            <input type="button" value="+" id="add-button">
            <input type="submit" value="izpildit">
        </form>
    <script>
        let i = 1;
        function addField() {
            // Create a new textarea element
            var textarea = document.createElement("textarea");
            // Set the name and required attributes of the textarea
            textarea.setAttribute("name", "ieraksts" + i++);
            textarea.setAttribute("required", "");
            // Add the textarea to the form
            document.getElementById("procedure").appendChild(textarea);
        }
        document.getElementById("add-button").addEventListener("click", addField);
    </script>
    </body>
</html>