<?php

//VERIFIER SI LE FICHIER EST BIEN ENVOYE
$error = null;
$address = null;

if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $error = 1;

    if ($_FILES['image']['size'] <= 3000000) {
        $informationImage = pathinfo($_FILES['image']['name']);
        $extensionImage = $informationImage['extension'];
        $extensionsArray = array('jpg', 'png', 'jpeg', 'gif');

        if (in_array($extensionImage, $extensionsArray)) {
            $address = 'upload/' . time() . rand() . rand() . '.' . $extensionImage;
            move_uploaded_file($_FILES['image']['tmp_name'], $address);

            $error = 0;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hebergeur D'images gratuit En php</title>
</head>
<style type="text/css">
    html,
    body {
        margin: 0;
        font-family: georgia;
    }

    header {
        text-align: center;
        color: white;
        background: red
    }

    .container {
        width: 500px;
        margin: auto;
    }

    article {
        margin-top: 50px;
        background: #f7f7f7;
        padding: 10px;
    }

    button {
        margin: auto;
        margin-top: 10px;
    }

    h1 {
        margin-top: 0;
        text-align: center;
    }

    #presentation-picture {
        text-align: center;
    }

    #image {
        max-width: 100px;
    }
</style>

<body>

    <header>
        <h2>PHOTOSHOOT</h2>
        <!--formulaire -->
        <div class="container">
    </header>

    <article>
        <h1> Hébergez une image </h1>
        <?php
        if (isset($error) && $error == 0) {

            echo '<div id="presentation-picture"><img src="' . $address . '"  id="image" /> <br />
               </div>
              <input type="text" value="http://localhost/' . $address . '" />
              </div>';
        } else if (isset($error) && $error == 1) {
            echo 'votre image ne peut pas être envoyée.Vérifier son extension
                et sa taille (maximum à 3mo).';
        }


        ?>
        <form method="post" action="index.php" enctype="multipart/form-data">
            <p>
                <input type="file" name="image" required name="image" /> <br />
            <div style="text-align: center;">
                <button type="submit"> Héberger </button>
            </div>
            </p>

        </form>
    </article>
    </div>
</body>

</html>