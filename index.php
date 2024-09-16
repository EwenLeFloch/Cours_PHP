<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours PHP</title>
</head>
<body>
    <h1>Tuto PHP & MYSQL: Débutants</h1>
    <h2>Chapitre 1: Introduction</h2>

    <h3>A. Installation de l'environnement sur windows:</h3>
    <h4>1. Activer Linux</h4>
    <p>Très simple, il suffit d'ouvrir powershell en mode administrateur, puis d'écrire la ligne de commande suivante : wsl --set-default-version 2
    </p>

    <h4>2. Installer Debian</h4>
    <p>Debian est une distribution linux, très simple à installer aussi, il faut aller sur le windows store, le télécharger puis l'installer.</p>

    <h4>3. Pré-requis globaux</h4>

    <p>Il faut : 
        <ul>
            <li>Lancer Debian, un terminal s'ouvre.</li>
            <li>Vider le fichier /etc/resolv.conf.</li> Pour cela dans le terminal, tapez: <b>cd /etc</b> faites entrée puis <b>sudo nano resolv.conf</b> .
            </br><b>cd /etc</b> permet de se rendre dans le dossier etc, <b>sudo</b> permet d'éxecuter une commande en administrateur, <b>nano</b> est l'éditeur de fichier.
            </br>Videz le fichier, puis faites ctrl+X pour sortir, et Y lorsque le terminal demande s'il faut sauvegarder.
            <li>Créer le fichier wsl.conf</li> Pour cela dans le terminal tapez <b>nano wsl.conf</b> et ajoutez dans ce fichier:
            </br><b>[network]</br>
            generateResolvConf = false</b>
        </ul>

        Une fois que c'est fait, dans powershell tapez <b>wsl --shutdown</b>, relancez Debian puis modifiez avec nano le fichier etc/resolv.conf et ajoutez au contenu :</br>
        <b>nameserver 8.8.8.8</b>
    </p>

    <h4>4. Installer Docker et Docker Compose</h4>
    <p>Dans le terminal Debian, copiez-collez : <b>sudo apt update && sudo apt upgrade && sudo apt-get install apt-transport-https ca-certificates curl software-properties-common</b></br>
    Cela met à jour et installe les paquets nécessaire.</p>
    <p>Ajoutez la clé GPG officielle de Docker : <b>curl -fsSL https://download.docker.com/linux/debian/gpg | sudo apt-key add -</b></p>
    <p>Ajoutez le dépot Docker: <b>sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/debian $(lsb_release -cs)stable"</b></p>
    <p>Installer Docker CE: <b>sudo apt update && sudo apt install docker-ce</b></p>
    <p>Démarrer le service Docker: <b>sudo service docker start</b></p>
    <p>Ajouter vous au groupe d'administrateur de docker: <b>sudo groupadd docker && sudo usermod -aG docker $USER</b> puis fermer le terminal et rouvrez-le (Cette étape permet de connecter DDEV à docker)</p>
    <p>Installer Docker Compose: <b>sudo apt update && sudo apt install curl jq make acl git pass</b></br>
    puis <b>sudo curl –L "https://github.com/docker/compose/releases/download/latest/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose </b></p>
    <p>Rendre le fichier installé exécutable : <b>sudo chmod +x /usr/local/bin/docker-compose</b></p>
    <p>Vérifier l'installation : <b>docker compose version</b> et <b>docker ps</b></p>

    <h4>5.Installer DDEV</h4>
    <p><b>sudo apt update</b></br>puis</br><b>sudo apt install build-essential</b></p>
    <p>Téléchargez le script : <b>curl -O https://raw.githubusercontent.com/drud/ddev/master/scripts/install_ddev.sh</b></p>
    <p>Rendez le fichier exécutable : <b>chmod +x install_ddev.sh</b></p>
    <p>Lancez le script : <b>./install_ddev.sh</b></p>
    <p>Vérifiez la bonne installation de DDEV : <b>ddev --version</b></p>

    <h3>B. Création du dossier et lancement du serveur de développement local</h3>
    <h4>1. Créer le dossier</h4>
    <p>Soit manuellement, en passant par l'explorateur de fichier, soit dans le terminal Debian en tapant <b>cd ~</b> pour vous rendre dans le dossier home/ puis en tapant <b>mkdir nom_du_dossier</b></p>
    <h4>2. Lancer le serveur de développement local</h4>
    <p>Placez vous dans le dossier créé: <b>cd nom_du_dossier</b> puis tapez: <b>ddev config</b> répondez aux questions posées (Tuto -> laissez vide -> php) puis tapez (ddev start)</p>
    <h4>3. Créez un fichier index.php</h4>
    <p>Grâce à votre Editeur de code préféré (moi c'est vs code), créez un fichier index.php que vous placerez à la racine du dossier.
    </br>Et voilà ! (Si vous avez une erreur, vérifiez que index.php est bien à la racine de votre dossier créé, vérifiez que DDEV est lancé: (ddev start))
</p>
<h2>Les variables</h2>
<p>
    &lt;?php
    <br>&emsp; $prenom = "Pierre";
    <br>&emsp; $age = 28;
    <br>&emsp; echo "$prenom a $age ans";
    <br>?&gt;
    <br><?php
    $prenom = "Pierre";
    $age = 28;
    echo "$prenom a $age ans"; 
    ?>
</p>
<h3>Les types de données</h3>
<p>Les variables peuvent stocker 8 grands types de données différentes :
    <ul>
        <li><b>String</b>: Les chaine de caractères</li>
        <li><b>Integer</b>: Les nombres entiers</li>
        <li><b>Float</b>: Les nombres décimaux</li>
        <li><b>Boolean</b>: Les booléens (true, false)</li>
        <li><b>Array</b>: Les tableaux</li>
        <li><b>Object</b>: Les objets</li>
        <li><b>NULL</b>: Le type NULL</li>
        <li><b>Resource</b>: Les ressources</li>
    </ul>

    La valeur de la variable $prenom écrite plus tôt est une chaîne de caractères donc <b>String</b>. <br>
    La valeur de la variable $age est quant à elle, un nombre entier donc <b>Integer</b>. <br>
    La valeur de la variable $age2 = "29" est une chaîne de caractères. En effet, toute utilisation de guillemet ou d'apostrophe fait qu'une valeur est une chaîne de caractère. <br>
    La fonction gettype() nous permet de connaître le type d'une valeur. <br>
    <br>&lt;?php
    <br>&emsp; $prenom = "Pierre";
    <br>&emsp; $age = 28;
    <br>&emsp; $age2 = "29";
    <br>
    <br>&emsp; echo "La variable \$age2 a une valeur de type : ";
    <br>&emsp; echo gettype($age2);
    <br>?&gt;
    <br>
    <?php
    $prenom = "Pierre";
    $age = 28;
    $age2 = "29";
    echo "La variable \$age2 a une valeur de type : " . gettype($age2); 
    ?>
</p>


</body>
</html>