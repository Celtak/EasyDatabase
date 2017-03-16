<?php

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
     * (optionnel) Passe le ou les champs à trier, par exemple: 'nom=Henrique OR prenom=Rodrigues'
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
}
