
<!DOCTYPE html>
<header>
    <a href="index.php">Home</a>&nbsp;

    <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) { ?>
        <a href="stocks.php">Stocks</a>&nbsp;
        <a href="users.php">Users</a>&nbsp;
        <a href="transactions.php">Transactions</a>&nbsp; 
        <a href="login.php?action=logout">Log Out</a>
    <?php } else { ?>
        <a href="login.php">Login</a>&nbsp;
    <?php } ?>

</header>
