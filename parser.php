<?php
//3.1 и 3.2

require_once('database.php');

$mysql = Database();

if(($handle = fopen("test.csv", "r")) !== FALSE){
    
    while(($post = fgetcsv($handle)) !== FALSE){
        
        $sqlu = $mysql->query("SELECT * FROM test WHERE test.id = ".$post[0]);
  
        $resulty = mysqli_fetch_assoc($sqlu);

        if( $resulty['id'] == $post[0]){
            $mysql->query("UPDATE test SET name = '{$post[1]}', value1 = '{$post[2]}', value2 = '{$post[3]}', value3 = '{$post[4]}' WHERE id = '{$post[0]}'");
        
        } 
        else{ 

            $mysql->query("INSERT INTO `test` (`id`, `name`, `value1`, `value2`, `value3`) VALUES ('$post[0]','$post[1]','$post[2]','$post[3]','$post[4]')"); 
        
        }      


    }
    fclose($handle);

}

