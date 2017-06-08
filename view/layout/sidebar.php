<?php
$cate = " SELECT * FROM category";
$cate = $this->db->query($cate);
?>
<div class="col-md-3">

    <?php foreach ($cate as $ct) { ?>

        <div class="list-group sidebar">
            <a href="index.php?ac=sanpham&mt=category&pr=<?php echo $ct['id']; ?>"
               class="list-group-item title-menu-doc"><?php echo $ct['cate_name']; ?></a>
            <?php
            $idcate = $ct['id'];
            $danhmucq = " SELECT * FROM theloai WHERE id_cate='$idcate' ";
            $danhmuc = $this->db->query($danhmucq);
            ?>
            <ul class="menu-doc">
                <?php foreach ($danhmuc as $dm) { ?>
                    <li><a href="index.php?ac=sanpham&mt=loailinhkien&pr=<?php echo $dm['id']; ?>"
                           class="list-group-item <?php if ($_GET['mt'] == 'loailinhkien' && $_GET['pr'] == $dm['id']) {
                               echo 'sidebar-active';
                           } ?>"><i class="fa fa-angle-double-right"></i><span
                                    style="margin-left: 10px;"><?php echo $dm['tentheloai'] ?></span></a></li>
                <?php } ?>
            </ul>
        </div>

    <?php } ?>
</div>