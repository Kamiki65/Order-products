<?php
@session_start();
$_SESSION['mode'] = "edit";
include '../db/linkdb.php';

$customerid = $customername = $statusid = ""; // Initialize variables to avoid undefined variable notices

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Use prepared statements to avoid SQL injection
    $stmt = $conn->prepare("SELECT cu.customerid, cu.customername, cu.statusid
                             FROM tbcustomer cu
                             WHERE cu.customerid = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $rs = $result->fetch_assoc();
        $customerid = $rs['customerid'];
        $customername = $rs['customername'];
        $statusid = $rs['statusid']; // Fetch the statusid for setting the dropdown value
    }
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customer</title>
    <?php include_once('../center/linkcss.php'); ?>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <?php include_once('../center/menu.php'); ?>
            <h1 class="text-center">แก้ไขข้อมูล</h1>
            <form action="savecustomer.php" method="post">
                <div class="row">
                    <div class="col-4 offset-4">
                        <div class="input-group mt-3">
                            <span class="input-group-text" id="basic-addon1">รหัสตำแหน่ง</span>
                            <input type="text" class="form-control" name="customerid" id="customerid" value="<?php echo htmlspecialchars($customerid); ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 offset-4">
                        <div class="input-group mt-3">
                            <span class="input-group-text" id="basic-addon1">ชื่อตำแหน่ง</span>
                            <input type="text" class="form-control" name="customername" id="customername" value="<?php echo htmlspecialchars($customername); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 offset-4">
                        <div class="input-group mt-3">
                            <span class="input-group-text" id="basic-addon1">สถานะ</span>
                            <select name="statusid" id="statusid" class="form-control" required></select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4 offset-4">
                        <input type="submit" value="บันทึกข้อมูล" class="btn btn-primary">
                        <a href="managecustomer.php" class="btn btn-secondary">ย้อนกลับ</a>             
                    </div>
                </div>    
            </form>
        </div>
    </div>
</div>
<?php include_once('../center/linkjs.php'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Ensure jQuery is included -->
<script>
    $(document).ready(function() {
        $.ajax({
            url: 'getstatus.php',
            method: 'post',
            data: '',
            success: function(result) {
                $("#statusid").html(result);
                $("#statusid").val("<?php echo htmlspecialchars($statusid); ?>"); // Pre-select the current status
            }
        });
    });
</script>
</body>
</html>
