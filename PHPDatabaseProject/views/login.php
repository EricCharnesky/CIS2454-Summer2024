<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <?php include ('topNavigation.php'); ?>
    </br>
    <body>
        <h2>Login</h2>
        <?php echo $message ?>
        <form action="login.php" method="post"> 
            <label>Email Address:</label> 
            <input type="text" name="email_address"/><br> 
            <label>Password</label> 
            <input type="password" name="password"/><br> 
            <label>&nbsp;</label>
            <input type="submit" value="Login"/> 
        </form>
    </body>
    <?php include ('footer.php'); ?>
</html>
