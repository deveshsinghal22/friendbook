<?php
    session_start();
    include('config.php');

    //check user admin authentication
     
    if($_SESSION['user'] != 'admin'){
            $invalid =   $_SESSION['email'];
            echo $invalid;

            //check user inactive
         
            $query ="update user set isActive ='n' where email= '$invalid' ";
            mysql_query($query, $con);
            header('location:index.php');
        }
?>

<html>
<head>
    <style type="text/css">
        #po {
            background: none repeat scroll 0 0 #79fff8;
            height: 343px;
            margin: 303px;
            padding: 0px;
            margin-top: 0px;
        }
        .head{
        	 
        	
        	 margin-bottom: 10px;
        }
        .head a{
        	background:  #fff;
        }
        img{
        	float: right;
        	margin:20px 0px 0px 200px;
        }
        
    </style>
</head>
<body>
<div id="po">
   
            <h1>

                <?php
                echo "<ul>Welcome      " . $_SESSION['user']."</ul>";
                ?>
            </h1><br>
        
        <div class="head">    <a href="user_admin_success.php?page=1&n=0 ">list all the users</a>
            &nbsp &nbsp
            <a href="block_rqst_msg.php">list all messages </a>
            &nbsp &nbsp
            <a href="edit_self.php">edit your details</a>
        </div>
            <table align="center" border="0" cellpadding="0" cellspacing="0" >

                <?php
                $result = mysql_query("SELECT * FROM user where email='$_SESSION[email]' ");
                while ($row = mysql_fetch_array($result)) {
                    if($row['gender']== 'm')
                        $gender = "MALE";
                    else
                        $gender ="FEMALE";
                    echo "<tr>";
                    echo "<td> ID";
                    echo "</td>";
                    echo "<td style='padding-left: 10px'>" . $row['id'] . "</td>";
                    $pic_name = $row['pic'];?>
                    <td rowspan="4"> <img src="images/<?php echo $pic_name ;  ?> "  width="100" height="100" margin="20px 0px 0px 200px" flaot="right" alt="..:("/>
                    </td>
                    <?php
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td> NAME";
                    echo "</td>";
                    echo "<td style='padding-left: 10px'>" . $row['name'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td> SURNAME";
                    echo "</td>";
                    echo "<td style='padding-left: 10px'>" . $row['surname'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td> GENDER";
                    echo "</td>";
                    echo "<td style='padding-left: 10px'>" . $gender . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td> PHONE";
                    echo "</td>";
                    echo "<td style='padding-left: 10px'>" . $row['phone'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td> DOB";
                    echo "</td>";
                    echo "<td style='padding-left: 10px' >" . $row['DOB'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td> REG";
                    echo "</td>";
                    echo "<td style='padding-left: 10px' >" . $row['REG'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td> ADDRESS";
                    echo "</td>";
                    echo "<td style='padding-left: 10px' >" . $row['address'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td> EMAIL";
                    echo "</td>";
                    echo "<td style='padding-left: 10px'>" . $row['email'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
            </h1>
       
      
            <a href="logout.php"> SignOut</a>
   

   </div>
</body>
</html>