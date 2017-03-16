# EasyDatabase
A class in php that allows to easily manage a database MySQL

## English

## Français

### Commencer

#### Installation

Téléchargez et déplacez le fichier easyDatabase.class.php dans votre répertoire de travail.

Insérez-le.

```php
<?php require "easyDatabase.class.php"; ?>
```

#### Création objet

Instanciez un nouvel objet avec la class easyDatabase en n'oubliant pas d'indiquer l'url, le nom de la base de donnée, l'indentifiant et le mot de passe.

```php
<?php $newData = new easyDatabase('localhost:8889', 'monsql', 'root', 'root'); ?>
```



