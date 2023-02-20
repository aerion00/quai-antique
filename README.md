# Projet Quai Antique

Pour déployer cet application en local il vous suffit d'utiliser tous les informations ci-dessous.
Assurez-vous d'avoir tout le nécéssaire pour ce projet.
- PHP 7.1 ou version ultérieure
- MySQL ou un autre serveur de base de données compatible avec Symfony, je recommande vivement [Laragon](https://laragon.org/)
- Composer

## Déploiement

Pour déployer cet application en local :

```bash
$ git clone https://github.com/aerion00/quai-antique.git
$ cd application
$ composer install
$ php bin/console doctrine:database:create
$ php bin/console doctrine:schema:update --force
```


## Demo
Vous pouvez retrouver la version de ce site en ligne à l'adresse suivante :
[Juste-ici](http://s952347477.onlinehome.fr/)

## Compte admin
Pour créer un compte admin, il vous suffit de créer un USER, par la suite dans le role passer le user en [ROLE_ADMIN].
Il existe déjà un compte : contact@quai-antique.fr / Admin00+

## Important
Pour reste dans l'optique d'un véritable examen, site réalisé sur 2 jours, premier jour conception des entités et des informations nécéssaires pour le site web, après une demi journée, code de tout le site.

