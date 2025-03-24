<?php
    @session_start();
    $mode = $_SESSION['mode'];
    include_once('../db/linkdb.php');

    echo '<pre>' ,print_r($_POST),'</pre>'; 
        
        if($mode == "add") {
            $sqlLastid = "SELECT positionid 
                            FROM tbposition
                            ORDER BY positionid*1 DESC LIMIT 1";
            $queryLastid = $conn->query($sqlLastid);
            if($queryLastid->num_rows > 0) {
                $rsLastid = $queryLastid->fetch_assoc();
                $positionid = $rsLastid['positionid'] + 1;
            } else {
                $positionid = 1;
            }

        $positionname = $_POST['positionname'];
        $statusid = $_POST['statusid'];
    
        $sql = "INSERT INTO tbposition(positionid,positionname,statusid)
        VALUES ('$positionid','$positionname','$statusid')";
    
        $query = $conn->query($sql);
        header("refresh:0, url=manageposition.php");
    }
    if($mode == "edit") {
        
        $positionid = $_POST['positionid'];
        $positionname = $_POST['positionname'];
        $statusid = $_POST['statusid'];
    
        $sql = "UPDATE tbposition SET
                    positionname = '$positionname',
                    statusid = '$statusid'
                    WHERE positionid = '$positionid'";
    
        $query = $conn->query($sql);
        header("refresh:0, url=manageposition.php");
    }


    ?>