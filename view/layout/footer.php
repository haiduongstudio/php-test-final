<footer id="index-footer">
    <div class="container">
        <div class="col-md-6">
            <div class="col-md-6">
                <p><i class="fa fa-angle-right"></i> Trang chủ</p>
                <p><i class="fa fa-angle-right"></i> Sản phẩm mới</p>
            </div>
            <div class="col-md-6">
                <p><i class="fa fa-angle-right"></i> Liên hệ</p>
                <p><i class="fa fa-angle-right"></i> Giỏ hàng của bạn</p>
            </div>
        </div>
        <div class="col-md-6" style="border-left: 1px solid white; padding-bottom: 5px;">
            <div class="fb-page" data-href="https://www.facebook.com/Test-B%C3%A1n-h%C3%A0ng-Online-1914318105523901/"
                 data-tabs="timeline" data-width="500" data-height="250" data-small-header="false"
                 data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/Test-B%C3%A1n-h%C3%A0ng-Online-1914318105523901/"
                            class="fb-xfbml-parse-ignore"><a
                            href="https://www.facebook.com/Test-B%C3%A1n-h%C3%A0ng-Online-1914318105523901/">Test Bán
                        hàng Online</a></blockquote>
            </div>
        </div>
        <div style="clear: both;"></div>
        <div class="copyright">Copyright © Hải Nguyễn Tiến</div>
    </div>
</footer>
<script>
    function addcart(id) {
        $.ajax({
            url: "index.php?ac=giohang&mt=addcartajax",
            type: "post",
            dataType: "text",
            data: {
                id: id
            },
            success: function (data) {
                $('.gio-hang-tb').html(data);
                alert('Đã thêm vào giỏ hàng');
            }
        });
    }
</script>
