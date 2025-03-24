<?php
@session_start();
$_SESSION['mode'] = "view";
include '../db/linkdb.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Use prepared statements to avoid SQL injection
    $stmt = $conn->prepare("SELECT un.userid, un.username, po.positionid, un.userpass
                             FROM tbuser un
                             JOIN tbposition po ON un.positionid = po.positionid
                             WHERE un.userid = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $rs = $result->fetch_assoc();
        $userid = $rs['userid'];
        $username = $rs['username'];
        $userpass = $rs['userpass'];
        $positionid = $rs['positionid'];
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <?php include_once('../center/linkcss.php');?>
</head>
<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <?php include_once('../center/menu.php');?>
            <h1 class="text-center">แสดงข้อมูล</h1>
            <form action="saveuser.php" method="post">
            <div class="row">
                <div class="col-4 offset-4">
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="basic-addon1">รหัสผู้ใช้</span>
                        <input type="text" class="form-control" placeholder="" name="userid" id="userid" value="<?php echo $userid?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 offset-4">
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="basic-addon1">ชื่อผู้ใช้</span>
                        <input type="text" class="form-control" placeholder="" name="username" id="username" value="<?php echo $username?>"readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-4 offset-4">
                        <div class="input-group mt-3">
                            <span class="input-group-text" id="basic-addon1">รหัสผ่าน</span>
                            <input type="text" class="form-control" name="userpass" id="userpass" value="<?php echo $userpass; ?>" readonly>
                        </div>
                    </div>
                </div>       
            <div class="row mt-3">
                <div class="col-4 offset-4">
                        <a href="manageuser.php" class="btn btn-secondary">ย้อนกลับ</a>             
                </div>
            </div>    
            </from>

            </div>
        </div>
    </div>
<?php include_once('../center/linkjs.php');?>
</body>
</html>