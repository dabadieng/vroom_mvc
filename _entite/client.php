<?php

/**
 * requete pour désinscrire un client à une client
 */
function desincrire($cl_id)
{
    global $link;

    $sql = "delete from plannifier where pl_client=:cl_id and pl_client=:cl_id";
    $statement = $link->prepare($sql);
    $statement->execute([":cl_id" => $cl_id, ":cl_id" => $cl_id]);
}

/**
 * insert un nouveau client
 */
function insertClient($option)
{
    global $link;

    $sql = "insert into client values (null,:cl_nom)";
    $statement = $link->prepare($sql);
    $statement->execute($option);
}

/**
 * Maj d'un client
 */
function updateClient($option, $cl_id)
{
    global $link;

    $sql = "update client set cl_nom= :cl_nom
    where cl_id=:cl_id";
    $statement = $link->prepare($sql);
    $option[":cl_id"] = $cl_id;
    $statement->execute($option);
}

/**
 * 
 */
function findClientById($id)
{
    global $link;

    $sql = "select * from client where cl_id=:id";
    $statement = $link->prepare($sql);
    $statement->execute([":id" => $id]);
    return $statement->fetch();
}

/**
 * liste des inscrit à la client $cl_id
 */
function listeInscrit($cl_id)
{
    global $link;

    $sql = "select * from plannifier,client where pl_client=cl_id and pl_client=:cl_id";
    $statement = $link->prepare($sql);
    $statement->execute([":cl_id" => $cl_id]);
    $data = $statement->fetchAll();
    return $data;
}

/**
 * liste toutes les clients
 */
function findAllClient()
{
    global $link;

    $sql = "select * from client";
    $result = $link->query($sql);
    return $result->fetchAll();
}

/**
 * return une voiture
 */
function getVoiture($vo_id)
{
    global $link;
    $sql = "select * from voiture where vo_id=:id";
    $st = $link->prepare($sql);
    $st->execute([":id" => $vo_id]);
    $row = $st->fetch();
    if ($row)
        $chaine = $row["vo_immatriculation"] . "<br>" . $row["vo_nom"];
    else
        $chaine = "aucune";

    return $chaine;
}
