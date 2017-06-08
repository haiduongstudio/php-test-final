<?php
	require 'view/layout/header.php';
?>
<div id="wrapper">

    <?php require 'view/layout/menu.php'; ?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh mục
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
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($cate as $c) {
                        ?>
                                <tr class="odd gradeX" align="center">
                                    <td><?php echo $c['id']; ?></td>
                                    <td><?php echo $c['cate_name']; ?></td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="index.php?ac=category&mt=delete&pr=<?php echo $c['id'] ?>"> Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?ac=category&mt=edit&pr=<?php echo $c['id'] ?>">Edit</a></td>
                                </tr>
                        <?php
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