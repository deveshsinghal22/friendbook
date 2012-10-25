<?php

    session_start();
    include('config.php');
    if($_SESSION['user'] != 'admin'){
        $invalid =   $_SESSION['email'];
        $query ="update user set isActive ='n' where email= '$invalid' ";
        mysql_query($query, $con);
        header('location:index.php');
    }
?>

        <html>
     <head>
    
    <link href="./css/indexPage.css" rel="stylesheet"/>
    <script type="text/javascript" src="./js/loginFormValidation.js"></script>
    <script type="text/javascript" src="./js/regFormValidation.js"></script>

</head>
        <body bgcolor="#f0f8ff">
        <center>
            <div class="user">
            <h1> List of All Users </h1>
            <a href="admin_success.php">go to admin page</a><br><br>
           </div>

            <table border="1" cellpadding="10" bgcolor="aqua" cellspacing="0">
                <tr >
                    <th>SNo.</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Gender</th>
                    <th>Phone </th>
                    <th>DOB</th>
                    <th>DOR</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>IsActive</th>
                    <th>Edit/Delete</th>
                </tr>
        <?php

            $page = (int) $_GET['page'];
                if ($page < 1){$page = 1; }
            $resultsPerPage = 3;
            $startResults = ($page - 1) * $resultsPerPage;
            $numberOfRows = mysql_num_rows(mysql_query("select * from user where type = 'u' "));
            $totalPages = ceil($numberOfRows / $resultsPerPage);
            $query = mysql_query("SELECT * FROM user  where type = 'u' LIMIT $startResults, $resultsPerPage");
            $sno = ($page * $resultsPerPage) - ($resultsPerPage) ;

        if( $page > $totalPages){
            echo "<h1>NO RECORD FOUND</h1>";
        }
           
        else {

        while($row = mysql_fetch_array($query ))
        {
            $sno++;
            echo "<tr>";
            echo "<td>".$sno."</td>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['surname']."</td>";
            echo "<td>".$row['gender']."</td>";
            echo "<td>".$row['phone']."</td>";
            echo "<td>".$row['DOB']."</td>";
            echo "<td>".$row['REG']."</td>";
            echo "<td>".$row['address']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['isActive']."</td>";
            echo "<td> <a href='edit_user.php?id=".$row['id']."&pg=".$page."'>Edit</a>/
                <a href='delete_user.php?id=".$row['id']."&pg=".$page."'>Delete</a> </td>";
            echo "</tr>";
        }

        }

        if( $page != 1)
            echo '<a href="?page=1">First</a>&nbsp';

        if($page > 1)
            echo '<a href="?page='.($page - 1).'">Back</a>&nbsp';

        for($i = 1; $i <= $totalPages; $i++)
        {
            if($i == $page)
                echo '<strong>'.$i.'</strong>&nbsp';
            else
                echo '<a href="?page='.$i.'">'.$i.'</a>&nbsp';
        }

        if ($page < $totalPages)
            echo '<a href="?page='.($page + 1).'">Next</a>&nbsp;';
        if ($page != $totalPages)
            echo '<a href="?page='.$totalPages.'">Last</a>';
        ?>
    </table>

    <a href="admin_success.php">Go Back </a>
</center>
</body>
</html>