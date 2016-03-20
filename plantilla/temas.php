  <?php
    switch ($_SESSION["estilo"]) {
    case 0:
        echo '<link rel="stylesheet" href="../css/default.css">';
        break;
    case 1:
        echo '<link rel="stylesheet" href="../css/plantilla1.css">';
        break;
    case 2:
        echo '<link rel="stylesheet" href="../css/plantilla2.css">';
        break;

}
    ?>
