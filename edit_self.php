<!--
module for edit of self account  work for both user and admin
-->

<?php
session_start();
if($_SESSION['status'] != 'y'){
    echo "you are blocked"; ?>
<a href="logout.php">exit and SignOut</a>
<?php
}
else{
    include('config.php');
    ?>
<html>
<body>
<center>
    <h1>Edit Your Details</h1>
    <h5>edit the field which are you want to update</h5>
</center>
<form action="edit_update_self.php" name="edit_self" method="post">
<table align="center" border="0" cellpadding="10">

    <?php
    $result = mysql_query("SELECT * FROM user where id='$_SESSION[id]' ");
    while ($row = mysql_fetch_array($result)) {
        $bday = $row['DOB'] ;
        list($date,$month,$year) = explode('/',$bday,3);
        if($row['gender'] == 'm')
            $gender = "MALE";
        else
            $gender ="FEMALE";
        ?>
        <input type="hidden" value= "<?php echo $_SESSION['id'] ?>" name = "user_id" />
        <tr>
            <td> NAME
            </td>
            <td><input type="text" name="name" value="<?php echo $row['name'] ?>"> </td>
        </tr>
        <tr>
            <td> SURNAME
            </td>
            <td> <input type="text" name="surname" value="<?php echo $row['surname'] ?>"> </td>
        </tr>
        <tr>
            <td> GENDER
            </td>
            <td> MALE <input type="radio" name="gender" value="MALE" <?php if($gender == 'MALE'){ ?>checked="checked" <?php } ?>>&nbsp
                FEMALE <input type="radio" name="gender" value="FEMALE" <?php if($gender == 'FEMALE'){ ?>checked="checked" <?php } ?>> </td>
        </tr>
        <tr>
            <td> PHONE
            </td>
            <td> <input type="text" name="phone" value="<?php echo $row['phone'] ?>"> </td>
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
                    <option value="Jan" <?php if($month == 'jan'){ ?> selected="selected" <?php } ?> >January</option>
                    <option value="Feb" <?php if($month == 'Feb'){ ?> selected="selected" <?php } ?>>February</option>
                    <option value="Mar" <?php if($month == 'Mar'){ ?> selected="selected" <?php } ?>>March</option>
                    <option value="Apr" <?php if($month == 'Apr'){ ?> selected="selected" <?php } ?>>April</option>
                    <option value="May" <?php if($month == 'May'){ ?> selected="selected" <?php } ?>>May</option>
                    <option value="Jun" <?php if($month == 'Jun'){ ?> selected="selected" <?php } ?>>June</option>
                    <option value="Jul" <?php if($month == 'Jul'){ ?> selected="selected" <?php } ?>>July</option>
                    <option value="Sept" <?php if($month == 'Sept'){ ?> selected="selected" <?php } ?>>September</option>
                    <option value="Oct" <?php if($month == 'Oct'){ ?> selected="selected" <?php } ?>>October</option>
                    <option value="Nov" <?php if($month == 'Nov'){ ?> selected="selected" <?php } ?>>November</option>
                    <option value="Dec" <?php if($month == 'Dec'){ ?> selected="selected" <?php } ?>>December</option>
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
            <td> <textarea name="address"rows="3" cols="15" >  <?php echo $row['address'] ?> </textarea></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="editupdate" value="update">
            </td>
        </tr>
</form
<?php

    }
    ?>
</table>
</body>
</html>
<?php } ?>
<?php
// update values in database , insert query  UNDER CONSTRUCTION

if(!empty($_POST['editupdate'])) {

    $DOB = $_POST['date']."/".$_POST['month']."/".$_POST['year'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $id = $_POST['user_id'];

    if ($_POST['gender'] == 'MALE')
        $gender = 'm';
    else
        $gender = 'f';

    $query = "update user set name = '$name' , surname = '$surname',
gender = '$gender', phone = '$phone' , DOB = '$DOB' , address = '$address'
where id = '$id' ";

    mysql_query($query);
}
?>