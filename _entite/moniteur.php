<?php
function deleteMoniteur($id) {
    global $link;

    $sql="delete from moniteur where mo_id=:id";
    try {
        $statement = $link->prepare($sql);
        $statement->execute([":id"=>$id]); 
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

/**
 * insert une nouvelle leçon
 */
function insertMoniteur($option) {    
    global $link;

    $sql = "insert into moniteur values (null,:mo_nom)";
    $statement = $link->prepare($sql);
    $statement->execute($option); 
}

/**
 * Maj d'une leçon
 */
function updatetMoniteur($option) {
    global $link;

    $sql = "update moniteur set mo_nom=:mo_nom where mo_id=:mo_id";
    $statement = $link->prepare($sql);
    $statement->execute($option); 
}

function findMoniteurById($id) {
    global $link;

    $sql = "select * from moniteur where mo_id=:id";
    $statement = $link->prepare($sql);
    $statement->execute([":id"=>$id]);
    return $statement->fetch(); 
}

function findMoniteurByLogin($mo_login) {
    global $link;

    $sql="select * from moniteur where mo_login=:mo_login";
    $statement = $link->prepare($sql);
    $statement->execute([":mo_login"=>$mo_login]);
    return $statement->fetch(); 
}


function findAllMoniteur() {
    global $link;

    $sql="select * from moniteur";
    $result=$link->query($sql);
    return $result->fetchAll();
}

function findLeconByMoniteur($mo_id) {
    global $link;

    $sql="select * from moniteur,lecon where mo_id=le_moniteur and mo_id=:mo_id order by le_date,le_heure_debut";
    $statement=$link->prepare($sql);
    $statement->execute([":mo_id"=>$mo_id]);    
    return $statement->fetchAll();
}