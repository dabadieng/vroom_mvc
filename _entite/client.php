<?php

function deleteClient($id) {
    global $link;

    $sql="delete from client where cl_id=:id";
    try {
        $statement = $link->prepare($sql);
        $statement->execute([":id"=>$id]); 
    } catch (PDOException $e) {
        die($e->getMessage());
    }
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
 * liste toutes les clients
 */
function findAllClient()
{
    global $link;

    $sql = "select * from client";
    $result = $link->query($sql);
    return $result->fetchAll();
}


