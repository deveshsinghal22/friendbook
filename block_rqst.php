<?php
        include('config.php');
        session_start();
        /*
         * check previous rqst status by user
         */
            $query = "select * from blockuser where blockId = '$_SESSION[id]' ";
            $result = mysql_query($query);
            $value = mysql_fetch_assoc ($result);
        /*
         * actiom when rqst is pending
         *
         */
                if($value['status'] == 'p'){
                    echo "your previous request still pending " ;
                    echo "</br>";
                    echo "<a href='logout.php'> Exit & Logout</a>";
                    }
                /*
               * actiom when rqst is rejected
               *
               * */
                else if($value['status'] == 'r'){
                    echo "your previous request is rejected you can not login further without admin's permission" ;
                    echo "<br>";
                    }
                else {
                    /*
                     * if new request , form to submit message for admin
                     *
                     */

            ?>
            <html>
            <body>
            <center>
                <h3>Send Request admin to unblock account</h3>
                <form id= "rqst" action= "block_rqst_sent.php" method="post">
                    <table border="1">
                        <tr>
                            <td> Id </td> <td><?php echo $_SESSION['id']; ?> </td>
                        </tr>
                        <tr>
                            <td>message</td>
                            <td><textarea rows="3" cols="13" name="msg" id="msg" placeholder ="enter your message here...">
                            </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"> <input type="submit" name="submit" ></td></tr>
                    </table>
                </form>
                <a href="logout.php">exit and logout</a>
            </center>
            </body>
                    <?php } ?>
            </html>
