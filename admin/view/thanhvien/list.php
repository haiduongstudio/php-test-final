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
                    <h1 class="page-header">Thành viên
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
                            <th>Username</th>
                            <th>Email</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($user as $u) {
                        ?>
                                <tr class="odd gradeX" align="center">
                                    <td><?php echo $u['id']; ?></td>
                                    <td><?php echo $u['username']; ?></td>
                                    <td><?php echo $u['email']; ?></td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="index.php?ac=user&mt=delete&pr=<?php echo $u['id'] ?>"> Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?ac=user&mt=edit&pr=<?php echo $u['id'] ?>">Edit</a></td>
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