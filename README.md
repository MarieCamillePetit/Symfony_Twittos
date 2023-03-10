<br/>
<p align="center">
  <h3 align="center">Twittosphère</h3>

  <p align="center">
    Ce projet est un clone de Twitter, réaliser lors de notre LP DIM en PHP avec le framework Symfony !
    <br/>
    <br/>
  </p>
</p>



## Table Of Contents

* [About the Project](#about-the-project)
* [Getting Started](#getting-started)
  * [Prerequisites](#prerequisites)
  * [Installation](#installation)
* [Authors](#authors)
* [Acknowledgements](#acknowledgements)

## About The Project
Retrouvez le lien de la vidéo présentation : 

https://www.youtube.com/watch?v=UkVaZvJsIbE

Avec cette application, vous pouvez créer un compte et poster des Twittos pour le partagez à la communauté ! 

Nous avons utilisé :

-  "Security-bundle" pour le système d’authentification (login, signup, logout);
- "ORM Doctrine" pour créer la base de données;
- Boostrap
- API : https://animechan.vercel.app/

Fonctionnalités : 
- Login, Signup, Logout
- Voir les Twittos;
- Publier, modifier ou supprimer un Twittos ( à condition d'être connecté);
- Accéder à la citation d'un animé

## Getting Started


### Prerequisites

Pour cette application, vous avez besoin de :

* composer
* symfony


### Installation

1. Récupérer le repository :

```sh
git clone https://github.com/MarieCamillePetit/Symfony_Twittos.git
```

2. Se positionner dans le dossier:

```sh
cd Symfony_Twittos/
```

3. Installer les dépendances :

```sh
composer install
yarn
yarn build
```
4. Base de donnée :
N'oubliez pas de modifier le ".env" pour l'adapter à votre base de donnée.

```sh
# DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
DATABASE_URL="mysql://User:Password@127.0.0.1:3306/u546677444_projetsymfony?serverVersion=5.7"
```

Vous devez créer une base de donnée en local avec le nom : ' u546677444_projetsymfony '
Ensuite exécuter : 
```sh
symfony console make:migration
php bin/console doctrine:migrations:migrate
```

5. Lancer le projet : 

```sh
symfony server:start
```


## Authors

* **Clément Pouillart** - *LP DIM STUDENT* - [Telath](https://github.com/Telath) 
* **Marie-Camille Petit** - *LP DIM STUDENT* - [MarieCamillePetit](https://github.com/MarieCamillePetit)
