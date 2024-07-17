<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            function list_users($name = NULL){
                // if not null
                if (isset($name)){
                    return array($name);
                }
                // else $name is null
                else {
                    return array("Eric", "Jeb", "Vivi");
                }
            }
            
            print_r(list_users("Bob"));
            print_r(list_users());
        ?>
    </body>
</html>
