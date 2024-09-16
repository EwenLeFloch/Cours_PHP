Tuto PHP & MYSQL: Débutants
Chapitre 1: Introduction
A. Installation de l'environnement sur windows:

1. Activer Linux
   Très simple, il suffit d'ouvrir powershell en mode administrateur, puis d'écrire la ligne de commande suivante : wsl --set-default-version 2

2. Installer Debian
   Debian est une distribution linux, très simple à installer aussi, il faut aller sur le windows store, le télécharger puis l'installer.

3. Pré-requis globaux
   Il faut :

Lancer Debian, un terminal s'ouvre.
Vider le fichier /etc/resolv.conf.
Pour cela dans le terminal, tapez: cd /etc faites entrée puis sudo nano resolv.conf .
cd /etc permet de se rendre dans le dossier etc, sudo permet d'éxecuter une commande en administrateur, nano est l'éditeur de fichier.
Videz le fichier, puis faites ctrl+X pour sortir, et Y lorsque le terminal demande s'il faut sauvegarder.
Créer le fichier wsl.conf
Pour cela dans le terminal tapez nano wsl.conf et ajoutez dans ce fichier:
[network]
generateResolvConf = false
Une fois que c'est fait, dans powershell tapez wsl --shutdown, relancez Debian puis modifiez avec nano le fichier etc/resolv.conf et ajoutez au contenu :
nameserver 8.8.8.8 4. Installer Docker et Docker Compose
Dans le terminal Debian, copiez-collez : sudo apt update && sudo apt upgrade && sudo apt-get install apt-transport-https ca-certificates curl software-properties-common
Cela met à jour et installe les paquets nécessaire.

Ajoutez la clé GPG officielle de Docker : curl -fsSL https://download.docker.com/linux/debian/gpg | sudo apt-key add -

Ajoutez le dépot Docker: sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/debian $(lsb_release -cs)stable"

Installer Docker CE: sudo apt update && sudo apt install docker-ce

Démarrer le service Docker: sudo service docker start

Ajouter vous au groupe d'administrateur de docker: sudo groupadd docker && sudo usermod -aG docker $USER puis fermer le terminal et rouvrez-le (Cette étape permet de connecter DDEV à docker)

Installer Docker Compose: sudo apt update && sudo apt install curl jq make acl git pass
puis sudo curl –L "https://github.com/docker/compose/releases/download/latest/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose

Rendre le fichier installé exécutable : sudo chmod +x /usr/local/bin/docker-compose

Vérifier l'installation : docker compose version et docker ps

5.Installer DDEV
sudo apt update
puis
sudo apt install build-essential

Téléchargez le script : curl -O https://raw.githubusercontent.com/drud/ddev/master/scripts/install_ddev.sh

Rendez le fichier exécutable : chmod +x install_ddev.sh

Lancez le script : ./install_ddev.sh

Vérifiez la bonne installation de DDEV : ddev --version

B. Création du dossier et lancement du serveur de développement local

1. Créer le dossier
   Soit manuellement, en passant par l'explorateur de fichier, soit dans le terminal Debian en tapant cd ~ pour vous rendre dans le dossier home/ puis en tapant mkdir nom_du_dossier

2. Lancer le serveur de développement local
   Placez vous dans le dossier créé: cd nom_du_dossier puis tapez: ddev config répondez aux questions posées (Tuto -> laissez vide -> php) puis tapez (ddev start)

3. Créez un fichier index.php
   Grâce à votre Editeur de code préféré (moi c'est vs code), créez un fichier index.php que vous placerez à la racine du dossier.
   Et voilà ! (Si vous avez une erreur, vérifiez que index.php est bien à la racine de votre dossier créé, vérifiez que DDEV est lancé: (ddev start))
