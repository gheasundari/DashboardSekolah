</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer">
    © <?= date('Y') ?> by Ghea Sundari
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->

<script>
    //Get the button
    var mybutton = document.getElementById("myBtn");
    mybutton.style.display = "block";
    // var div = document.getElementById('content');
    // var div2 = document.getElementById('penerimakip');
    // var hs = div.scrollWidth > div.clientWidth;
    // var vs = div.scrollHeight > div.clientHeight;
    // alert("ini " + hs + " cliend width" + div.scrollHeight + " scroll width" + div.clientHeight)
    // // alert("width " + hs + "  cliend width" + div2.clientWidth + " scroll width" + div2.scrollWidth)
    // alert("height " + hs + "  cliend width" + div2.scrollHeight + " scroll width" + div2.clientHeight)
    // alert(vs)
    // When the user scrolls down 20px from the top of the document, show the button
    // window.onscroll = function() {
    //     scrollFunction()
    // };

    // function scrollFunction() {
    //     if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    //         mybutton.style.display = "block";
    //     } else {
    //         mybutton.style.display = "none";
    //     }
    // }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?= base_url('assets/node_modules/popper/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?= base_url('assets/dist/js/perfect-scrollbar.jquery.min.js') ?>"></script>
<!--Wave Effects -->
<script src="<?= base_url('assets/dist/js/waves.js') ?>"></script>
<!--Menu sidebar -->
<script src="<?= base_url('assets/dist/js/sidebarmenu.js') ?>"></script>
<!--stickey kit -->
<script src="<?= base_url('assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js') ?>"></script>
<script src="<?= base_url('assets/node_modules/sparkline/jquery.sparkline.min.js') ?>"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/node_modules/select2/dist/js/select2.full.min.js') ?>" type="text/javascript"></script>
<!--Custom JavaScript -->
<script src="<?= base_url('assets/dist/js/custom.min.js') ?>"></script>

</body>

</html>