<!--
default page, login form and link for registration
-->
<?php
    include('config.php');
    session_start();
    if(empty($_SESSION['user'])) {
?>

<html>
<head>
    
    <link href="./css/indexPage.css" rel="stylesheet"/>
    <script type="text/javascript" src="./js/loginFormValidation.js"></script>
    <script type="text/javascript" src="./js/regFormValidation.js"></script>

</head>
<body bgcolor="#fffaf0">
<div id="header">
<center>
    <div class="logo">
    <img src="./images/logo.gif"  height="100px" width="380px"/>
        </div>

    <form id="frm" name="frm" action="logincheck.php" method="post"">

        <table border="0" bgcolor="#6495ed" cellpadding="1" cellspacing="0">
            <tr>

                <td> Email <br/> <input type="text" name="username" id="username" >
                    <div id="userError">
                    <?php
                    if(!empty($_SESSION['invalid'])){
                        echo "wrong username  ";
                    }
                    ?>

                    </div>

                </td>

                <td>  Password <br/> <input type="password" name="password" id="pass">
                    <div id="passError">
                    <?php
                    if(!empty($_SESSION['invalid'])){
                        echo "wrong password";
                        $_SESSION['invalid'] = null;
                    }
                    ?>
                    </div>
                </td>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <td class="btntd">
                    &nbsp;&nbsp;&nbsp;&nbsp; <input type="button" class= "btn" value =""  onclick="loginCheck()">
                </td>

            </tr>
        </table>
    </form>
</center>
</div>
<div class="regis" >
    <center>
        <h1> Registration form </h1>

        <form name="frm1" action="" method="post" enctype="multipart/form-data"  id="frm1" onsubmit="return chkBlank()">
            <table>

                <tr>
                    <td>

                        NAME:
                    </td>
                    <td>
                        <input type="text" name="name" id="name" >
                        <div id="nameError"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        SURNAME:
                    </td>
                    <td><input type="text" name="surname" id="surname">
                        <div id="surnameError"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        GENDER:
                    </td>
                    <td>
                        Male: <input type="radio" name="gender" value="m" id="gender_m">
                        &nbsp;
                        Female: <input type="radio" name="gender" value="f" id="gender_f">
                        <div id="genderError"></div>
                    </td>
                </tr>

                <tr>
                    <td>
                        PASSWORD
                    </td>
                    <td><input type="password" name="pass" id="password"/>
                        <div id="passwordError"></div>
                    </td>
                </tr>
                </tr>
                <tr>
                    <td>
                        PH NO.:
                    </td>
                    <td><input type="text" name="phone" id="phone">
                        <div id="phoneError"></div></td>
                </tr>
                <tr>
                    <td>
                <tr>
                    <td> Birthday</td>
                    <td>
                        <select name="day" id="date">
                            <option value="date">date</option>
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                echo '<option value=' . $i . '>' . $i . '</option>';
                            }
                            ?>
                        </select>

                        <select name="month" id="month">
                            <option value="month">month</option>
                            <option value="Jan">January</option>
                            <option value="Feb">February</option>
                            <option value="Mar">March</option>
                            <option value="Apr">April</option>
                            <option value="May">May</option>
                            <option value="Jun">June</option>
                            <option value="Jul">July</option>
                            <option value="Sept">September</option>
                            <option value="Oct">October</option>
                            <option value="Nov">November</option>
                            <option value="Dec">December</option>
                        </select>

                        <select name="year" id="year">
                            <option value="year">year</option>
                            <?php
                            for ($i = 1970; $i <= 2015; $i++) {
                                echo '<option value=' . $i . '>' . $i . '</option>';
                            }
                            ?>
                        </select>
                        <div id="bdayError"></div>
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>

                        ADDRESS
                    </td>
                    <td>

                        <textarea name="address" id="address" rows="15" cols="10" style="max-width: 100px; min-width: 100px; max-height: 75px; min-height: 75px; text-align: left">

                        </textarea>


                        <div id="addressError"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        EMAIL:
                    </td>
                    <td><input type="text" name="email" id="email">
                        <div id="emailError"></div></td>
                </tr>
                <tr>
                    <td> upload photo !!</td>
                    <td><input type="file" name="pic" id="pic"/>
                        <div id="picError"></div></td>
                </tr>
                <tr>
                    <td><input type="submit" id="register" name="register" value="save" />
                    </td>
                    <td><input type="reset" align="middle"/>

                    </td>
                   <tr>
                        <td rowspan="2">
                            <div id="complete"></div>
                        </td>

                   </tr>
                </tr
            </TABLE>
        </form>
    </center>
    </div>
</body>
</html>
<?php
}
else{
        if($_SESSION['user'] != 'admin'){
            header("location:success.php");
        }
        else{
            header("location:admin_success.php");
        }

    }

    ?>

    <?php
    /* insert query block for registration form*/
        if(!empty($_POST['register'])){
            $DOB = $_POST["day"] . "/" . $_POST["month"] . "/" . $_POST["year"];
            $current = date("d/m/y");
            $encrypt_password = md5($_POST['pass']);
            $nname = $_FILES["pic"]["name"];
            move_uploaded_file($_FILES["pic"]["tmp_name"],
            "images/" . $_FILES["pic"]["name"]);

            $query = "INSERT INTO user ( name , surname , gender, password, phone, DOB, REG, address ,email, pic)
            VALUES ('$_POST[name]','$_POST[surname]','$_POST[gender]','$encrypt_password', '$_POST[phone]','$DOB', '$current','$_POST[address]'
            ,'$_POST[email]' ,  '$nname' )";

            mysql_query($query);
            /* sending mail to registered user*/
            $to       =  $_POST['email'];
            $subject  = 'Testing sendmail.exe';
            $message  = 'Hi, you are registered in friendbook';
            $headers  = 'From: mittal.piyush100@gmail.com' . "\r\n" .
            'Reply-To: mittal.piyush100@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            if(mail($to, $subject, $message, $headers))
                echo "Email sent to ".$to;
            else
                echo "Email sending failed";


        }
    ?>