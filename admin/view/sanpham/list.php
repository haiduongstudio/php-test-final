<?php
	require 'view/layout/header.php';
?>
<div id="wrapper">

    <?php require 'view/layout/menu.php'; $stt=1; ?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản phẩm
                        <small>Danh sách</small>
                    </h1>
                <?php
                    if(isset($_SESSION['sucsses'])) { ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['sucsses'];unset( $_SESSION['sucsses']) ?>
                    </div>
                <?php
                    }
                ?>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>STT</th>
                            <th>Tên SP</th>
                            <th>Danh mục</th>
                            <th>Mã SP</th>
                            <th>Giá</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($sanpham as $sp) {
                                
                        ?>
                                <tr class="odd gradeX" align="center">
                                    <td><?php echo $stt; ?></td>
                                    <td>
                                        <?php 
                                            echo $sp['tensanpham']; 
                                        ?> <br>
                                        <img src="<?php echo $sp['anhsp'] ?>" width="100" >
                                    </td>
                                    <td>
                                        <?php
                                            $idtheloai = $sp['id_theloai'];
                                            $theloai = "SELECT * FROM theloai WHERE id='$idtheloai' LIMIT 1 ";
                                            $theloai = $this->db->query($theloai);
                                            $theloai = $theloai->fetch_assoc();
                                            $idcate = $sp['id_cate'];
                                            $cate = "SELECT * FROM category WHERE id='$idcate' LIMIT 1 ";
                                            $cate = $this->db->query($cate);
                                            $cate = $cate->fetch_assoc();
                                            echo $theloai['tentheloai'].'<br> -'.$cate['cate_name'];
                                        ?>
                                    </td>
                                    <td><?php echo $sp['masanpham']; ?></td>
                                    <td><?php echo number_format($sp['giasp'],0, ',', '.'); ?> VNĐ</td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="index.php?ac=sanpham&mt=delete&pr=<?php echo $sp['id'] ?>"> Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?ac=sanpham&mt=edit&pr=<?php echo $sp['id'] ?>">Edit</a></td>
                                </tr>
                        <?php
                                $stt++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php
	require 'view/layout/footer.php';
?>