
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Transactions List</title>
    </head>
    <?php include ('topNavigation.php'); ?>
    </br>
    <body>
        <table>
            <tr>
                <th>User ID</th>
                <th>Stock ID</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Timestamp</th>
                <th>ID</th>
            </tr>
            <?php foreach ($transactions as $transaction) : ?>
                <tr>
                    <td><?php echo $transaction['user_id']; ?></td>
                    <td><?php echo $transaction['stock_id']; ?></td>
                    <td><?php echo $transaction['quantity']; ?></td>
                    <td><?php echo $transaction['price']; ?></td>
                    <td><?php echo $transaction['timestamp']; ?></td>
                    <td><?php echo $transaction['id']; ?></td>
                </tr>

            <?php endforeach; ?>
        </table>
        </br>
        <h2>Add Transaction</h2>
        <form action="transactions.php" method="post"> 
            <label>User ID:</label> 
            <input type="text" name="user_id"/><br> 
            <label>Stock ID:</label> 
            <input type="text" name="stock_id"/><br> 
            <label>Quantity:</label> 
            <input type="text" name="quantity"/><br> 
            <input type="hidden" name='action' value='insert'/>
            <label>&nbsp;</label>
            <input type="submit" value="Add Stock"/> 
        </form>
        </br>
        <h2>Update Transaction</h2>
        <form action="transactions.php" method="post"> 
            <label>ID:</label> 
            <input type="text" name="id"/><br> 
            <label>User ID:</label> 
            <input type="text" name="user_id"/><br> 
            <label>Stock ID:</label> 
            <input type="text" name="stock_id"/><br> 
            <label>Quantity:</label> 
            <input type="text" name="quantity"/><br> 
            <label>Price:</label> 
            <input type="text" name="price"/><br> 
            <input type="hidden" name='action' value='update'/>
            <label>&nbsp;</label>
            <input type="submit" value="Update Stock"/> 
        </form>
        </br>
        <h2>Delete Transaciton</h2>
        <form action="transactions.php" method="post"> 
            <label>ID:</label> 
            <input type="text" name="id"/><br> 
            <input type="hidden" name='action' value='delete'/>
            <label>&nbsp;</label>
            <input type="submit" value="Delete Transaction"/> 
        </form>
    </body>
    </br>
    <?php include ('footer.php'); ?>
</html>