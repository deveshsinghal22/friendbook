   <!--
   module for set user inactive or active , admin feature..


   -->

    <?php
        session_start();
        include('config.php');
        if($_SESSION['user'] != 'admin'){
            $invalid =   $_SESSION['email'];
            echo $invalid;

            $query ="update user set isActive ='n' where email= '$invalid' ";
            mysql_query($query, $con);
            header('location:index.php');

        }
        $id = $_GET['id'];
        $pg = $_GET['pg'];
        echo $_GET['id'];
        $query = " update user set isActive = 'n' where id = $id ";
        mysql_query($query);
        header('location:user_admin_success.php?page='.$pg.'');
    ?>