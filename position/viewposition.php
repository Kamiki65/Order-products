<?php
@session_start();
$_SESSION['mode'] = "view";
include '../db/linkdb.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Use prepared statements to avoid SQL injection
    $stmt = $conn->prepare("SELECT un.positionid, un.positionname, st.statusname
                             FROM tbposition un
                             JOIN tbstatus st ON un.statusid = st.statusid
                             WHERE un.positionid = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $rs = $result->fetch_assoc();
        $positionid = $rs['positionid'];
        $positionname = $rs['positionname'];
        $statusname = $rs['statusname'];
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>position</title>
    <?php include_once('../center/linkcss.php');?>
</head>
<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <?php include_once('../center/menu.php');?>
            <h1 class="text-center">แสดงข้อมูล</h1>
            <form action="saveposition.php" method="post">
            <div class="row">
                <div class="col-4 offset-4">
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="basic-addon1">รหัสตำแหน่ง</span>
                        <input type="text" class="form-control" placeholder="" name="positionid" id="positionid" value="<?php echo $positionid?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 offset-4">
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="basic-addon1">ชื่อตำแหน่ง</span>
                        <input type="text" class="form-control" placeholder="" name="positionname" id="positionname" value="<?php echo $positionname?>"readonly>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4 offset-4">
                        <a href="manageposition.php" class="btn btn-secondary">ย้อนกลับ</a>             
                </div>
            </div>    
            </from>

            </div>
        </div>
    </div>
<?php include_once('../center/linkjs.php');?>
</body>
</html>