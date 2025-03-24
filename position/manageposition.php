<?php
@session_start();
include '../db/linkdb.php';
$sql = "SELECT po.positionid , po.positionname ,st.statusname
            FROM tbposition po
            LEFT JOIN tbstatus st ON po.statusid = st.statusid
            ORDER BY po.positionid*1 DESC";
$query = $conn->query($sql);
// echo $sql; exit;  
$positionidList=$positionnameList=$statusnameList=array();
if($query->num_rows > 0) {
    while ($rs = $query ->fetch_assoc()) {
        array_push($positionidList,$rs['positionid']);
        array_push($positionnameList,$rs['positionname']);
        array_push($statusnameList,$rs['statusname']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>position</title>
    
     <?php include ('../center/linkcss.php'); ?>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php include ('../center/menu.php'); ?>
                    <h1 class = "text-center">จัดการตำแหน่ง</h1>
                <div class="d-grid justify-content-md-end">
                <a href="addposition.php"class ="btn btn-primary">เพิ่มข้อมูล</a>
                </div>
                    <table class = "table table-striped"    >
                        <thead class = "bg-primary text-white" >
                            <th>#</th>
                            <th>รหัสตำแหน่ง</th>
                            <th>ชื่อตำแหน่ง</th>
                            <th>สถานะ</th>
                            <th>แก้ไข</th>
                            <th>แสดง</th>
                            <th>ยกเลิก</th>
                        </thead>
                        <tbody>
                        <?php
                            if(count($positionidList) > 0) {
                                for($i=0; $i < count($positionidList); $i++) {
                                    $item=$i+1;
                                    $positionid = $positionidList[$i];
                                    $positionname = $positionnameList[$i];
                                    $statusname = $statusnameList[$i];


                                    ?>
                                    <tr>
                                        <td><?php echo $item; ?></td>
                                        <td><?php echo $positionid; ?></td>
                                        <td><?php echo $positionname; ?></td>
                                        <td><?php echo $statusname; ?></td>
                                        <td><a class="btn btn-success" href="editposition.php?id=<?php echo $positionid; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                        <td><a class="btn btn-info" href="viewposition.php?id=<?php echo $positionid; ?>"><i class="fa-solid fa-eye"></i></a></td>
                                        <td><a class="btn btn-danger" href="cancelposition.php?id=<?php echo $positionid; ?>"><i class="bi bi-trash"></i></a></td>

                                    </tr>

                                <?php }
                                
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6" class ="text-center" >ไม่มีข้อมูล</td>
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