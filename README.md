# EasyDatabase
A class in php that allows to easily manage a database MySQL

![](http://img4.hostingpics.net/thumbs/mini_232054easyDatabase.jpg)


## English

A French version below.
Sorry if my English is bad :-( .

### Getting Started

#### Installing

Download and move the easyDatabase.class.php file to your working directory.


Include it.

```php
<?php require "easyDatabase.class.php"; ?>
```

#### Create object

Instantiate a new object with the easyDatabase class, remembering to include the url, the database name, the identifier and the password.

```php
<?php $newData = new easyDatabase('localhost:8889', 'monsql', 'root', 'root'); ?>
```

### Usage

#### Example BDD

Table name: Contact.

| Nom       | Prenom    | Age       |
| --------- | --------- | --------- |
| Merant    | Pierre    | 25        |
| Bonnel    | Paul      | 18        |
| Rodrigues | Jacques   | 64        |

#### Get values

```php
<?php 
  $select = $newData->selectAll('Contact');  
  // $select return all table
  // $select[0][1] return 'Pierre'  
?>
```

```php
<?php 
  $select = $newData->selectAll('Contact', 'Nom, Prenom');  
  // $select return all values of fields Nom et Prenom
  // $select[1][0] return 'Bonnel' 
?>
```

```php
<?php 
  $select = $newData->selectAll('Contact', '', 'nom="Merant"');  
  // $select return all fields dont whose nom (name) is Merant
  // $select[0][2] return '25' 
?>
```

```php
<?php 
  $select = $newData->selectAll('Contact', '', '', 'nom');  
  // $select return all table in ascending order
  // $select[0][0] return 'Bonnel'
?>
```


## Français

### Commencer

#### Installation

Téléchargez et déplacez le fichier easyDatabase.class.php dans votre répertoire de travail.

Insérez-le.

```php
<?php require "easyDatabase.class.php"; ?>
```

#### Création objet

Instanciez un nouvel objet avec la class easyDatabase. N'oubliez pas d'indiquer l'url, le nom de la base de donnée, l'indentifiant et le mot de passe.

```php
<?php $newData = new easyDatabase('localhost:8889', 'monsql', 'root', 'root'); ?>
```

### Utilisation

#### Exemple BDD

Nom de la table: Contact.

| Nom       | Prenom    | Age       |
| --------- | --------- | --------- |
| Merant    | Pierre    | 25        |
| Bonnel    | Paul      | 18        |
| Rodrigues | Jacques   | 64        |

#### Récupération entrée

```php
<?php 
  $select = $newData->selectAll('Contact');  
  // $select retourne toute la table
  // $select[0][1] retourne 'Pierre'  
?>
```

```php
<?php 
  $select = $newData->selectAll('Contact', 'Nom, Prenom');  
  // $select retourne toutes les entrées des champs Nom et Prenom
  // $select[1][0] retourne 'Bonnel' 
?>
```

```php
<?php 
  $select = $newData->selectAll('Contact', '', 'nom="Merant"');  
  // $select retourne tous les champs dont le nom est Merant
  // $select[0][2] retourne '25' 
?>
```

```php
<?php 
  $select = $newData->selectAll('Contact', '', '', 'nom');  
  // $select retourne toute la table dans l'ordre croissant
  // $select[0][0] retourne 'Bonnel'
?>
```





