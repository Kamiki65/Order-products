<?php
    @session_start();
    $mode = $_SESSION['mode'];
    include_once('../db/linkdb.php');

    // echo '<pre>' ,print_r($_POST),'</pre>'; 
        
        if($mode == "add") {
            $sqlLastid = "SELECT userid 
                            FROM tbuser
                            ORDER BY userid*1 DESC LIMIT 1";
            $queryLastid = $conn->query($sqlLastid);
            if($queryLastid->num_rows > 0) {
                $rsLastid = $queryLastid->fetch_assoc();
                $userid = $rsLastid['userid'] + 1;
            } else {
                $userid = 1;
            }

        $username = $_POST['username'];
        $userpass = $_POST['userpass'];
        $positionid = $_POST['positionid'];
        $statusid = $_POST['statusid'];
    
        $sql = "INSERT INTO tbuser(userid,username,userpass,positionid,statusid)
        VALUES ('$userid','$username','$userpass','$positionid','$statusid')";
    
        $query = $conn->query($sql);
        header("refresh:0, url=manageuser.php");
    }

    if($mode == "edit") {
        
        $userid = $_POST['userid'];
        $username = $_POST['username'];
        $userpass = $_POST['userpass'];
        $positionid = $_POST['positionid'];
        $statusid = $_POST['statusid'];
    
        $sql = "UPDATE tbuser SET
                    username = '$username',
                    userpass = '$userpass',
                    positionid = '$positionid',
                    statusid = '$statusid'
                    WHERE userid = '$userid'";
    
        $query = $conn->query($sql);
        header("refresh:0,url=manageuser.php");
    }
    if($mode == "cancel") {
        
        $userid = $_POST['userid'];
        $statusid = $_POST['statusid'];
    
        $sql = "UPDATE tbuser SET
                    statusid = '$statusid'
                    WHERE userid = '$userid'";
    
        $query = $conn->query($sql);
        header("refresh:0, url=manageuser.php");
    }
    ?>