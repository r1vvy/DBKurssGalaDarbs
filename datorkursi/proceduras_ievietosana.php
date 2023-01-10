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
        <div class="container-fluid d-flex" style="justify-content: center">
            <div class="row">
                <div class="col-12 shadow p-3 mb-5 bg-body rounded mx-3">
                    <form id="procedure" action="proceduras_rezultats.php" method="post">
                        <label for="procedura">Ievadiet procedūru:</label>
                        <div id="form-area">
                            <textarea name="procedura" required rows="4" class="col-12"></textarea>
                        </div>
                        <input type="button" value="+" class="add-button">
                        <input type="submit" value="izpildit">
                    </form>
                </div>
            </div>
        </div>
    <script>
        let i = 1;
        function addField() {
            // Create a new textarea element
            var textarea = document.createElement("textarea");
            // Set the name and required attributes of the textarea
            textarea.setAttribute("name", "ieraksts" + i++);
            textarea.setAttribute("class", "col-12");
            textarea.setAttribute("required", "");
            // Add the textarea to the form
            document.getElementById("form-area").appendChild(textarea);
        }
        document.querySelector(".add-button").addEventListener("click", addField);
    </script>
    </body>
</html>