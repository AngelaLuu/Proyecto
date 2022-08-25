                <!DOCTYPE html>
                <html lang="en">
                <head>
                <!--<link rel="stylesheet" type="text/css" href="css/gene2.css">-->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>   
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
                <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
                <style >
                    *{
                        font-family: 'Roboto Condensed', sans-serif;
                    }
                </style>
                    <title>proyecto</title>
                </head>
                <body background="../img/fondo22.jpg">
                    <header>
                        <?php
                            require_once('header.php');
                        ?>
                    </header>  
                <section>
                    <div class="container">   
                    <?php
                            require_once('routing.php'); // aqui trae la entidad que se desea ver
                        ?>
                    </div>
                </section>

                        <?php
                            //require_once('footer.php');
                        ?>

                </body>
                </html>

                <script>
                $(document).ready(function(){
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
                });

                $(document).ready(function(){
                  $('[data-toggle="popover"]').popover();
                });
                </script>
