<?php

try {
    require_once 'utility/ensure_logged_in.php';
    require_once 'models/database.php';
    require_once 'models/users.php';

    $action = htmlspecialchars(filter_input(INPUT_POST, "action"));

    $name = htmlspecialchars(filter_input(INPUT_POST, "name"));
    $email_address = htmlspecialchars(filter_input(INPUT_POST, "email_address"));
    $cash_balance = filter_input(INPUT_POST, "cash_balance", FILTER_VALIDATE_FLOAT);

    if ($action == "insert_or_update" && $name != "" && $email_address != "" && $cash_balance != 0) {
        $insert_or_update = filter_input(INPUT_POST, 'insert_or_update');

        if ($insert_or_update == "insert") {
            insert_user($name, $email_address, $cash_balance);
        } else if ($insert_or_update == "update") {
            update_user($name, $email_address, $cash_balance);
        }

        header("Location: users.php");
    } else if ($action == "delete" && $email_address != "") {
        delete_user($email_address);
        header("Location: users.php");
    } else if ($action != "") {
        $error_message = "Missing name, email address, or cash balance";
        include('views/error.php');
    }


    $users = list_users();

    include('views/users.php');
} catch (Exception $e) {
    $error_message = $e->getMessage();
    include('views/error.php');
}
?>

