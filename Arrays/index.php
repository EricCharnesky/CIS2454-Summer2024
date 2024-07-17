<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //0,  1,   2,   3,  4 - indexes
        $scores = array(95, 97, 100, 82, 100);

        // to add a value to the end - will be index 5
        $scores[] = 78;

        $scores[10] = 92;

        print_r($scores);
        
        end($scores);
        $last_index = key($scores);

        for ($index = 0; $index <= $last_index; $index++) {
            if (isset($scores[$index])) {
                echo "$index : $scores[$index] </br>";
            }
        }
        
        foreach ($scores as $score){
            echo "</br>$score";
        }
        
        // keys and associated values - keys must be unique - key => value
        $names_and_scores = array('Eric' => 100, 'Jeb' => 95, 'Journey' => 75);
        $names_and_scores[] = 23;
        
        print_r($names_and_scores);
        
        // looks for a value associated with the key
        if ( $names_and_scores['Eric'] > 94 ){
            echo "Eric gets an A";
        }
        
        // add OR update
        $names_and_scores['Vivi'] = 94;
        
        $names_and_scores['Jeb'] = 99;
        
        print_r($names_and_scores);
        
        // key is optional, you can just loop through the values
        foreach ($names_and_scores as $name => $score){
            echo "</br>$name has a score of: $score";
        }
        
        ?>
    </body>
</html>
