<?php
@session_start();
if(isset($_SESSION['userid'])) {
    if($_SESSION['userid'] == "") {
        $userid = "not login";
    }
} else{
    $userid = "not login";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>document</title>
    <?php include '../center/linkcss.php'; ?>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <form action="checklogin.php" method="post">
                <div class="col-4 offset-4 mt-5">
                    <div class="card">
                        <div class="card-header">
                            Log in
                         </div>
                        <div class="card-body">
                        </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group mt-3">
                                        <span class="input-group-text" id="basic-addon1">ชื่อผู้ใช้</span>
                                        <input type="text" class="form-control" placeholder="" name="userid" id="userid" required >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group mt-3 mb-3">
                                        <span class="input-group-text" id="basic-addon1">รหัสผ่าน</span>
                                        <input type="text" class="form-control" placeholder="" name="userpass" id="userpass" required >
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Login" class = " btn btn-primary ">
                            <a href="../index.php" class = " btn btn-secondary ">ย้อนกลับ</a>
                            
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

        <?php include '../center/linkjs.php'; ?>    

</body>
</html>