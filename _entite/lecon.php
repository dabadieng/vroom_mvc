<?php
/**
 * requete pour désinscrire un client à une leçon
 */
function desincrire($le_id,$cl_id) {
    global $link;

    $sql="delete from plannifier where pl_lecon=:le_id and pl_client=:cl_id";
    $statement = $link->prepare($sql);
    $statement->execute([":le_id"=>$le_id,":cl_id"=>$cl_id]);
}

/**
 * insert une nouvelle leçon
 */
function insertLecon($option) {    
    global $link;

    $sql = "insert into lecon values (null,:le_moniteur, :le_voiture, :le_heure_debut, :le_heure_fin, :le_date )";
    $statement = $link->prepare($sql);        
    $statement->execute($option); 
}

/**
 * Maj d'une leçon
 */
function updateLecon($option,$le_id) {
    global $link;

    $sql = "update lecon set le_moniteur= :le_moniteur, le_voiture=:le_voiture, le_date=:le_date, le_heure_debut=:le_heure_debut, le_heure_fin=:le_heure_fin where le_id=:le_id";
    $statement = $link->prepare($sql);
    $option[":le_id"]=$le_id;
    $statement->execute($option); 
}

/**
 * 
 */
function findLeconById($id) {
    global $link;

    $sql = "select * from lecon where le_id=:id";
    $statement = $link->prepare($sql);
    $statement->execute([":id"=>$id]);
    return $statement->fetch();    
}

/**
 * liste des inscrit à la lecon $le_id
 */
function listeInscrit($le_id) {
    global $link;

    $sql="select * from plannifier,client where pl_client=cl_id and pl_lecon=:le_id";
    $statement = $link->prepare($sql);
    $statement->execute([":le_id"=>$le_id]);
    $data=$statement->fetchAll();        
    return $data;
}

/**
 * liste toutes les lecons
 */
function findAllLecon() {
    global $link;

    $sql="select * from lecon,moniteur where le_moniteur=mo_id order by le_date,le_heure_debut";
    $result=$link->query($sql);
    return $result->fetchAll();
}

/**
 * return une voiture
 */
function getVoiture($vo_id) {
    global $link;
    $sql="select * from voiture where vo_id=:id";
    $st=$link->prepare($sql);
    $st->execute([":id"=>$vo_id]);
    $row=$st->fetch();
    if ($row)
        $chaine=$row["vo_immatriculation"] . "<br>" . $row["vo_nom"];
    else
        $chaine="aucune";

    return $chaine;
}

