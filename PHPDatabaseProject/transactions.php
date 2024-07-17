<?php

try {
    require_once 'utility/ensure_logged_in.php';
    require_once 'models/database.php';
    require_once 'models/transactions.php';
    require_once 'models/users.php';
    require_once 'models/stocks.php';

    $action = htmlspecialchars(filter_input(INPUT_POST, "action"));

    $id = htmlspecialchars(filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT));
    $user_id = htmlspecialchars(filter_input(INPUT_POST, "user_id", FILTER_VALIDATE_INT));
    $stock_id = htmlspecialchars(filter_input(INPUT_POST, "stock_id", FILTER_VALIDATE_INT));
    $quantity = filter_input(INPUT_POST, "quantity", FILTER_VALIDATE_FLOAT);
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT);

    if ($action == "insert" && $user_id != "0" && $stock_id != 0 && $quantity != 0) {

        $users = list_users();
        $user_name = "";
        $user_email_address = "";
        $users_cash_balance = 0;
        foreach ($users as $user) {
            if ($user['id'] == $user_id) {
                $user_name = $user['name'];
                $user_email_address = $user['email_address'];
                $users_cash_balance = $user['cash_balance'];
            }
        }

        $stocks = list_stocks();
        $stock_price = 0;
        foreach ($stocks as $stock) {
            if ($stock['id'] == $stock_id) {
                $stock_price = $stock['current_price'];
            }
        }

        $total_cost = $stock_price * $quantity;

        if ($users_cash_balance >= $total_cost) {
            insert_transaction($user_id, $stock_id, $quantity, $stock_price);
            $new_balance = $users_cash_balance - $total_cost;
            update_user($user_name, $user_email_address, $new_balance);
            header("Location: transactions.php");
        } else {
            echo $error_message = "insufficent funds to purchase stocks";
            //include('views/error.php');
        }
    } else if ($action == "update" && $user_id != "0" && $stock_id != 0 && $quantity != 0 && $price != 0 && $id != 0) {
        update_transaction($user_id, $stock_id, $quantity, $price, $id);
    } else if ($action == "delete" && $id != 0) {


        $transactions = list_transactions();

        $stock_id = 0;
        $user_id = 0;
        $quantity = 0;
        foreach ($transactions as $transaction) {
            if ($transaction['id'] == $id) {
                $quantity = $transaction['quantity'];
                $stock_id = $transaction['stock_id'];
                $user_id = $transaction['user_id'];
            }
        }

        $stocks = list_stocks();
        $stock_price = 0;
        foreach ($stocks as $stock) {
            if ($stock['id'] == $stock_id) {
                $stock_price = $stock['current_price'];
            }
        }

        $users = list_users();
        $user_name = "";
        $user_email_address = "";
        $users_cash_balance = 0;
        foreach ($users as $user) {
            if ($user['id'] == $user_id) {
                $user_name = $user['name'];
                $user_email_address = $user['email_address'];
                $users_cash_balance = $user['cash_balance'];
            }
        }

        $total_sale = $stock_price * $quantity;

        $new_balance = $users_cash_balance + $total_sale;
        update_user($user_name, $user_email_address, $new_balance);

        delete_transaction($id);

        header("Location: transactions.php");
    } else if ($action != "") {
        $error_message = "Missing stock_id, user_id, or quantity";
        include('views/error.php');
    }


    $transactions = list_transactions();

    include('views/transactions.php');
} catch (Exception $e) {
    $error_message = $e->getMessage();
    include('views/error.php');
}
?>

