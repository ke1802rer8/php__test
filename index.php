<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta  name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест</title>
    <meta name="description" content="Lorem ipsum">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
    <body>

        <?php

        
        require_once('database.php');

        $mysql = Database();

        $size_page = 20;

        if (isset($_GET['page'])) {
            
            $page = $_GET['page'];
        } else { 
            $page = 1;
        }

        $sql = "SELECT * FROM test";

        $result = mysqli_query($mysql, $sql);
        $rows = mysqli_num_rows($result);

        $total_pages = intdiv($rows, $size_page);

        $start = $page * $size_page - $size_page;

        $res = mysqli_query($mysql, "SELECT * FROM test LIMIT $start, $size_page");


        while ( $postrow[] = mysqli_fetch_array($res))?>

        <div class="container">     
                <table class="table" >
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Фамилия</th>
                        <th scope="col">Username</th>
                        <th scope="col">Username</th>
                    </tr>
                    </thead>
                    
                    <tbody>
        <?php for ($i = 0; $i < $size_page; $i++) {
            $del = $i % 2;
            if($del == 0){?>

                    <tr class="bg-success" method="post">
                        <th scope="row"><?=$postrow[$i]['id']?></th>
                        <td><?=$postrow[$i]['name']?></td>
                        <td><?=$postrow[$i]['value1']?></td>
                        <td><?=$postrow[$i]['value2']?></td>
                        <td><?=$postrow[$i]['value3']?></td>   
                    </tr>           
                    <?php } else{?>  
                        <tr  method="post">
                        <th scope="row"><?=$postrow[$i]['id']?></th>
                        <td><?=$postrow[$i]['name']?></td>
                        <td><?=$postrow[$i]['value1']?></td>
                        <td><?=$postrow[$i]['value2']?></td>
                        <td><?=$postrow[$i]['value3']?></td>   
                    </tr>    
                        <?php }?>
        <?php }?>
                    </tbody>        
                </table>     
            </div>

        <ul class="container pagination">
            <li class="<?php if($page == 1){ echo 'disabled'; } else{ echo 'page__style'; } ?>"><a href="?page=1">First</a></li>
            <li class=" <?php if($page <= 1){ echo 'disabled'; } else{ echo 'page__style'; } ?>">
                <a href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>">Prev</a>
            </li>
            <li class="number"><?php echo '<b>'.$page.'</b>'?></li>
            <li class="page__style <?php if($page >= $total_pages){ echo 'disabled '; } ?>">
                <a href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=".($page + 1); } ?>">Next</a>
            </li>
            <li class="page__style <?php if($page >= $total_pages){ echo 'disabled '; } ?>"><a href="?page=<?php echo $total_pages; ?>">Last</a></li>
        </ul>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://kit.fontawesome.com/d4346b87e7.js" crossorigin="anonymous"></script>     
    </body>
</html>
