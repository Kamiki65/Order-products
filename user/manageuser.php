<?php
@session_start();
include '../db/linkdb.php';
$sql = "SELECT u.userid , u.username ,u.userpass,st.statusname
            FROM tbuser u
            LEFT JOIN tbstatus st ON u.statusid = st.statusid
            ORDER BY u.userid*1 DESC";
$query = $conn->query($sql);
// echo $sql; exit;  
$useridList=$usernameList=$userpassList=$statusnameList=array();
if($query->num_rows > 0) {
    while ($rs = $query ->fetch_assoc()) {
        array_push($useridList,$rs['userid']);
        array_push($usernameList,$rs['username']);
        array_push($userpassList,$rs['userpass']);
        array_push($statusnameList,$rs['statusname']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    
     <?php include ('../center/linkcss.php'); ?>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php include ('../center/menu.php'); ?>
                    <h1 class = "text-center">จัดการผู้ใช้ระบบ</h1>
                <div class="d-grid justify-content-md-end">
                <a href="adduser.php"class ="btn btn-primary">เพิ่มข้อมูล</a>
                </div>
                    <table class = "table table-striped"    >
                        <thead class = "bg-primary text-white" >
                            <th>#</th>
                            <th>รหัสผู้ใช้</th>
                            <th>ชื่อผู้ใช้</th>
                            <th>สถานะ</th>
                            <th>แก้ไข</th>
                            <th>แสดง</th>
                        </thead>
                        <tbody>
                            <?php
                            if(count($useridList) > 0) {
                                for($i=0; $i < count($useridList); $i++) {
                                    $item=$i+1;
                                    $userid = $useridList[$i];
                                    $username = $usernameList[$i];
                                    $userpass = $userpassList[$i];
                                    $statusname = $statusnameList[$i];


                                    ?>
                                    <tr>
                                        <td><?php echo $item; ?></td>
                                        <td><?php echo $userid; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td><?php echo $statusname; ?></td>
                                        <td><a class="btn btn-success" href="edituser.php?id=<?php echo $userid; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                        <td><a class="btn btn-info" href="viewuser.php?id=<?php echo $userid; ?>"><i class="fa-solid fa-eye"></i></a></td>
                                        
                                    </tr>

                                <?php }
                                
                            } else {
                                ?>
                                <tr>
                                    <td colspan="7" class ="text-center" >ไม่มีข้อมูล</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
            </div>

        </div>
    
    </div>
    
    
    <?php include ('../center/linkjs.php'); ?>    
</body>
</html>