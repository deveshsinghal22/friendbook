<link rel="stylesheet" type="text/css" href="css/indexPage.css">
    <?php
    session_start();
    include('config.php');
    if($_SESSION['user'] == null)
        header('location: index.php');

    if($_SESSION['status'] != 'y'){
        echo "you are blocked";
    ?>
        <a href="logout.php">exit and SignOut</a>
    <?php
    }
    else {
    ?>
        <html>
        <head>
             <script src="js/jquery-1.2.6.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="js/new.js"></script>
        </head>
        <body bgcolor="#5C6CD1">
            <div class="nav">
                <?php include('topMenuHeader.php');?>
            </div>
            <table align="center"  border="1" cellspacing="0" bgcolor="#f0ffff">
            <tr>
                <td>
                    <center>
                        <h1>
                            <?php
                            echo "Hello     " . $_SESSION['user'];
                            ?>

                            <table align="center" border="1" cellpadding="10">

                                <?php
                                $result = mysql_query("SELECT * FROM user where email='$_SESSION[email]' ");
                                while ($row = mysql_fetch_array($result)) {

                                    if($row['gender']== 'm')
                                        $gender = "MALE";
                                    else
                                        $gender ="FEMALE";

                                    $name = $row['name'];

                                    echo "<tr>";
                                    echo "<td> ID";
                                    echo "</td>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    $pic_name = $row['pic'];?>
                                    <td rowspan="4"> <img src="images/<?php echo $pic_name ;  ?> " width="100" height="100" alt="..:("/>
                                    </td>
                                    <?php
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td> NAME";
                                    echo "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td> SURNAME";
                                    echo "</td>";
                                    echo "<td>" . $row['surname'] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td> GENDER";
                                    echo "</td>";
                                    echo "<td>" . $gender . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td> PHONE";
                                    echo "</td>";
                                    echo "<td>" . $row['phone'] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td> DOB";
                                    echo "</td>";
                                    echo "<td>" . $row['DOB'] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td> REG";
                                    echo "</td>";
                                    echo "<td>" . $row['REG'] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td> ADDRESS";
                                    echo "</td>";
                                    echo "<td>" . $row['address'] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td> EMAIL";
                                    echo "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                    </table>
                </h1>
            </center>
</body>
</html>
    <?php } ?>
    </td>
    <td valign="top">
        <div id="container" style="height: 460px; overflow: auto;" display : none> 
        </div>
    </td>
        <td valign="top">

            <div id="container_new">

            </div>
        </td>

    </tr>
    </table>