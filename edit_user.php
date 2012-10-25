<!--
change values in profile edited by admin in user's account ,in view
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
?>
<html>
<body>
<center>
    <h1>Edit Your Details</h1>
    <h5>edit the field which are you want to update</h5>
</center>
<form action="edit_update.php" name="edit_user" method="post">
<table align="center" border="1" cellpadding="10">

<?php
$query = mysql_query("select * from user where id='".$_GET['id']."'");
$id = $_GET['id'];
while ($row = mysql_fetch_array($query)) {
   $bday = $row['DOB'] ;
        list($date,$month,$year) = explode('/',$bday,3);


    if($row['gender']== 'm')
        $gender = "MALE";
    else
        $gender ="FEMALE";
    ?>
    <input type="hidden" name ="edit_id" value="<?php echo $id ?>"/>
    <input type="hidden" name ="pg" value="<?php echo $_GET['pg'] ?>" />
    <tr>
        <td> NAME
        </td>
        <td><input type="text" name="edit_name" value="<?php echo $row['name'] ?>"/> </td>
    </tr>
    <tr>
        <td> SURNAME
        </td>
        <td> <input type="text" name="surname" value="<?php echo $row['surname'] ?>"/>
        </td>
    </tr>
    <tr>
        <td> GENDER
        </td>
        <td> MALE <input type="radio" name="gender" value="MALE"
            <?php if($row['gender'] == 'm') echo "checked"; ?> />&nbsp
            FEMALE <input type="radio" name="gender" value="FEMALE"
                <?php if($row['gender'] == 'f') echo "checked"; ?> /> </td>
    </tr>
    <tr>
        <td> PHONE
        </td>
        <td> <input type="text" name="phone" value="<?php echo $row['phone'] ?>"/>
        </td>
    </tr>
    <tr>
        <td> user type
        </td>
        <td> admin <input type="radio" name = "user_type" value ="a"
                <?php if($row['type'] == 'a') echo "checked"; ?> /> &nbsp
             user <input type="radio" name = "user_type" value ="u"
                <?php if($row['type'] == 'u') echo "checked"; ?> /> </td>
        </td>
    </tr>
    <tr>
        <td> Account Status
        </td>
        <td> Active  <input type="radio" name="user_status" value="y"
            <?php if($row['isActive'] == 'y') echo "checked"; ?> /> &nbsp
            Not-Active <input type= "radio" name= "user_status" value= "n"
                <?php if($row['isActive'] == 'n') echo "checked"; ?> /> </td>
        </td>
    </tr>


    <tr>
        <td> DOB
        </td>
        <td>
            <select name="date" id="date" >
                <option value="date">date</option>
                <?php
                for ($i = 1; $i <= 31; $i++) { ?>
                    <option value="<?php echo $i ?>" <?php if($date == $i){ ?> selected="selected" <?php } ?> > <?php echo $i ?> </option>
                    <?php
                }
                ?>
            </select>

            <select name="month" id="month">
                <option value="month">month</option>
                <option value="January" <?php if($month == 'january'){ ?> selected="selected" <?php } ?> >January</option>
                <option value="February" <?php if($month == 'February'){ ?> selected="selected" <?php } ?>>February</option>
                <option value="March" <?php if($month == 'March'){ ?> selected="selected" <?php } ?>>March</option>
                <option value="April" <?php if($month == 'April'){ ?> selected="selected" <?php } ?>>April</option>
                <option value="May" <?php if($month == 'May'){ ?> selected="selected" <?php } ?>>May</option>
                <option value="June" <?php if($month == 'June'){ ?> selected="selected" <?php } ?>>June</option>
                <option value="July" <?php if($month == 'July'){ ?> selected="selected" <?php } ?>>July</option>
                <option value="September" <?php if($month == 'September'){ ?> selected="selected" <?php } ?>>September</option>
                <option value="October" <?php if($month == 'October'){ ?> selected="selected" <?php } ?>>October</option>
                <option value="November" <?php if($month == 'November'){ ?> selected="selected" <?php } ?>>November</option>
                <option value="December" <?php if($month == 'December'){ ?> selected="selected" <?php } ?>>December</option>
            </select>

            <select name="year" id="year">
                <option value="year">year</option>
                <?php
                for ($i = 1970; $i <= 2015; $i++) { ?>
                    <option value="<?php echo $i ?>" <?php if($year == $i){ ?> selected="selected" <?php } ?>> <?php echo $i ?></option>
              <?php  }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td> ADDRESS
        </td>
        <td> <textarea name="address"rows="3" cols="15" >  <?php echo $row['address']  ?>
        </textarea></td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="submit" name="update" value="update"/>
        </td>
    </tr>
</form>
<?php

}
$pg = $_GET['pg']
?>
</table>
<center><a href="user_admin_success.php">Go Back </a> </center>
</body>
</html>