<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours PHP</title>
</head>
<body>
    <h1>Titre principal</h1>
    <?php 
        require 'classes/user.class.php';

        new User();
    ?>

    <p>Un paragraphe</p>
</body>
</html>