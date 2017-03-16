<?php


/**
 * Class easyDatabase
 *
 * Cette classe permet de gérer une base de donnée MySQL avec des méthodes PHP:
 *  - Insérer des données
 *  - Modifier des données
 *  - Supprimer (DANGER) des données
 *  - Récupérer des données
 *
 * Licence: Apache License 2.0
 */

class easyDatabase
{

    private $bdd;

    /**
     * connectionBDD constructor.
     * @param $host
     * @param $nomBase
     * @param $iden
     * @param $pass
     * Connection à la base donnée. Insérer url host et le nom de la base de donnée
     */
    public function __construct($host, $nomBase, $iden, $pass)
    {
        try {
            
            $this->setBdd(new PDO('mysql:host=' . $host . ';dbname=' . $nomBase . ';charset=utf8', $iden , $pass));
            
        } catch (Exception $e) {
            
            die('Erreur : ' . $e->getMessage());
            
        }
    }


    /**
     * @param mixed $bdd
     */
    public function setBdd($bdd)
    {
        
        $this->bdd = $bdd;
        
    }

    /**
     * @param string $table
     * Passe le nom de la table à utiliser
     *
     * [@param string $select]
     * (optionnel) Passe le ou les champs à séléctionner, par exemple: 'nom, prenom'
     *
     * [@param string $where]
     * (optionnel) Passe le ou les champs à trier, par exemple: 'nom="Henrique" OR prenom="Rodrigues"'
     *
     * [@param array(champs, DESC) $order]
     * (optionnel) Passe par quel champs il faut ordonner par ordre croissant, par exemple: ['nom']
     * (optionnel) DESC permet d'ordonner par ordre décroissant, par exemple: ['nom', 'DESC']
     *
     *
     * [@param string $limit]
     * (optionnel) Passe une selection à afficher, par exemple: 0,3
     *
     * SYNTHAXE: selectALL($table, $select, $where, $order, $limit)
     *
     * @return array
     * Renvoie un tableau avec toutes les lignes de la table, par exemple @return[0][2] = troisième colonne de la première ligne.
     */
    public function selectAll($table, $select, $where, $order, $limit)
    {
        
        /* check $select */
        if($select == ""){
            
            $select = '*';
            
        }

        /* build query */
        $constQuery = 'SELECT ' . $select .' FROM ' . $table;

        /* check $where and build if $where exist */
        if($where != ""){
            
            $constQuery = $constQuery . ' WHERE ' .  $where;
            
        }

        /* check $where and build if $where exist */
        if($order != ""){
            
            $constQuery = $constQuery . ' ORDER BY ' . $order[0];
            
            if($order[1] != ""){
                
                $constQuery = $constQuery . ' ' .$order[1];
                
            }
            
        }

        /* check $limit and build if $limit exist*/
        if($limit != ""){
            $constQuery = $constQuery . ' LIMIT ' .  $limit;
        }


        $reponse = $this->bdd->query($constQuery);

        $donneeTable = [];

        while ($donnees = $reponse->fetch()) {

            $donneeTable[] = $donnees;
        }

        return $donneeTable;

        $reponse->closeCursor();

    }

    /**
     * @param string $table
     * Passe le nom de la table à utiliser
     *
     * @param array $values
     * Passe les données à entrer, par exemple: ['chien', 'felix', '18]
     */
    public function insert($table, $values)
    {
        
        $valuesContain = '';

        for ( $i = 0; $i < count($values); $i++) {
            
            $valuesContain = $valuesContain . '"' . $values[$i] . '"';
            
            if( $i != (count($values)) - 1){
                
                $valuesContain = $valuesContain . ", ";
                
            }
            
        }

        $constExec = 'INSERT INTO ' . $table . ' VALUES(' . $valuesContain . ')';
        
        $this->bdd->exec($constExec);
        
    }

    /**
     * @param $table
     * Passe le nom de la table à utiliser
     *
     * @param $set
     * Passe le ou les entrées à modifier, par exemple: 'nom="Henrique", prenom="Rodrigues"'
     *
     * @param $where
     * Passe le ou les champs à modifier, par exemple: 'nom="Henrique"'
     */
    public function update($table, $set, $where)
    {
        
        $constExec = 'UPDATE ' . $table . ' SET ' . $set . ' WHERE ' . $where;

        $this->bdd->exec($constExec);
        
    }

    /**
     * @param string $table
     * Passe le nom de la table à utiliser
     *
     * @param string $where
     * Passe le ou les champs à supprimmer, par exemple: 'nom="Henrique"'
     *
     * ATTENTION MÉTHODE DANGEREUSE
     */
    public function delete($table, $where){
        
        if($where != ""){

            $constExec = 'DELETE FROM ' . $table . ' WHERE ' . $where;

            $this->bdd->exec($constExec);
        }
        
    }
    
}
