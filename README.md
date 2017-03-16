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

### Methods list

| Method    | Syntax    |
| --------- | --------- |
| SelectAll | selectAll ( table , select , where , order , limit )   |
| Insert    | insert ( table , values )|
| Update    | update ( table , set , where )|
| Delete    | delete ( table , where )|
| setBdd    | setBdd ( bdd )|

The setBdd method is used to change the connection parameters of the database. This method is automatically called when the object is created.

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

#### Inserts values

```php
<?php 
  $newData->insert('Contact', ['Shin', 'Jean', '32']); 
  // Add name Shin, first name Jean and age 32 in database
  // Strict syntax
  // In the array's second parameter, there must be as much data as there are fields exiting in the database
?>
```

For empty values, add '' .

#### Update value(s)

```php
<?php 
  $newData->update('Contact', 'nom="Light", prenom="Fabrice"', 'nom="Merant"'); 
  // Change name Merant by Light et first name Anthony by Fabrice
  // Age does not change
?>
```

#### Delete values (all line)

```php
<?php 
  $newData->delete('Contact', 'nom="Bonnel')
  // Delete all Bonnel values: name, first name, age
  // Delete the line
?>
```
Warning dangerous and irreversible method.



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

### Liste des méthode

| Méthodes   | Syntaxe   |
| --------- | --------- |
| SelectAll | selectAll ( table , select , where , order , limit )   |
| Insert    | insert ( table , values )|
| Update    | update ( table , set , where )|
| Delete    | delete ( table , where )|
| setBdd    | setBdd ( bdd )|

La méthode setBdd permet de changer les paramètres de connection de la base de donnée. Cette méthode est appélée automatiquement lors de la création de l'objet.

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

#### Insertion données

```php
<?php 
  $newData->insert('Contact', ['Shin', 'Jean', '32']); 
  // Ajoute le nom Shin, le prénom Jean et l'âge 32 dans la base de donnée
  // Attention syntaxe strict 
  // Il faut dans le tableau du deuxième paramètre autant de données qu'il y a de champs existant dans la base
?>
```
Pour les entrées vides, ajoutez '' .

#### Mise à jour donnée(s)

```php
<?php 
  $newData->update('Contact', 'nom="Light", prenom="Fabrice"', 'nom="Merant"'); 
  // Change le nom Merant par Light et prenom Anthony par Fabrice
  // L'âge ne change pas
?>
```

#### Suppression données (toute la ligne)

```php
<?php 
  $newData->delete('Contact', 'nom="Bonnel')
  // Suprime toutes les données de Bonnel: nom, prenom, age
  // Supprime toute la ligne
?>
```
Attention méthode dangereuse et irréversible.




## License

This project is licensed under the Apache License 2.0 - see the LICENSE.txt file for details





