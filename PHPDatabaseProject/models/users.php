<?php

function list_users() {
    global $database;

    $query = 'SELECT name, email_address, cash_balance, id FROM users';

    // prepare the query please
    $statement = $database->prepare($query);

    // run the query please
    $statement->execute();

    // this might be risky if you have HUGE amounts of data
    $users = $statement->fetchAll();

    $statement->closeCursor();

    return $users;
}

function insert_user($name, $email_address, $cash_balance) {
    global $database;

    $query = "INSERT INTO users (name, email_address, cash_balance) "
            . "VALUES (:name, :email_address, :cash_balance)";

    // value binding in PDO protects against sql injection
    $statement = $database->prepare($query);
    $statement->bindValue(":name", $name);
    $statement->bindValue(":email_address", $email_address);
    $statement->bindValue(":cash_balance", $cash_balance);

    $statement->execute();

    $statement->closeCursor();
}

function update_user($name, $email_address, $cash_balance) {
    global $database;

    $query = "update users set name = :name, cash_balance = :cash_balance "
            . " where email_address = :email_address";

    // value binding in PDO protects against sql injection
    $statement = $database->prepare($query);
    $statement->bindValue(":name", $name);
    $statement->bindValue(":cash_balance", $cash_balance);
    $statement->bindValue(":email_address", $email_address);

    $statement->execute();

    $statement->closeCursor();
}

function delete_user($email_address) {
    global $database;

    $query = "delete from users "
            . " where email_address = :email_address";

    // value binding in PDO protects against sql injection
    $statement = $database->prepare($query);
    $statement->bindValue(":email_address", $email_address);

    $statement->execute();

    $statement->closeCursor();
}
