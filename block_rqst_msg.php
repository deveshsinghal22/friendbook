<?php
session_start();
include('config.php');
if($_SESSION['user'] != 'admin'){
    $invalid =   $_SESSION['email'];
    echo $invalid;
    $query ="update user set isActive ='n' where email= '$invalid' ";
    mysql_query($query, $con);
    header('location:index.php');

    /*
     *
     * check for new blockage rqsts
     *
     * */
}
    $query = "select * from blockuser where status = 'p' ";
    $result = mysql_query($query);
    $value = mysql_fetch_array($result);
        if($value == null){
            echo "you have no new pending request ";
        ?> <a href="admin_success.php">go to admin page</a> <?php
}
        else {

            /*
            if there any new rqst for admi,, display with accept and reject option


            */
             ?>
<table border="1" align="center">
    <tr>
        <th>id</th>
        <th>user Id</th>
        <th>message</th>
        <th>action</th>
    </tr>
    <?php
    $query = mysql_query("select * from blockuser where status = 'p' ");
    while ($row = mysql_fetch_array($query))
    {
        ?>
    <tr>
        <td><?php echo $row['id']?></td>
        <td><?php echo $row['blockId'] ?></td>
        <td><?php echo $row['message'] ?></td>
        <td>
            <a href="reject_rqst.php?id=<?php echo $row['id']?>& uid= <?php echo $row['blockId']?>" >reject</a> /
            <a href="aprove_rqst.php?id=<?php echo $row['id']?>& uid= <?php echo $row['blockId']?>">approve</a>
        </td>
    </tr>
    </tr>
    <?php } ?>
</table>
        <center><a href="admin_success.php">Go Back </a> </center>
<?php } ?>