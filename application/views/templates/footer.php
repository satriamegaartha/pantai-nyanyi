<!-- footer content -->
<footer>
    <div class="pull-right">
        Copyright &copy; 2020 All right reserved
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->




</div>
</div>


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Logout dari sistem?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>




<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('assets/'); ?>/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/'); ?>/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?= base_url('assets/'); ?>/vendors/nprogress/nprogress.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?= base_url('assets/'); ?>/build/js/custom.min.js"></script>
<!-- toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- datatables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<!-- ckeditor -->
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script src="<?= base_url('assets/') ?>skins/n1theme/skin.js"></script>

<script>
    <?php if ($this->session->userdata('success')) { ?>
        toastr.success("<?= $this->session->flashdata('success'); ?>")
    <?php } ?>
    <?php if ($this->session->userdata('warning')) { ?>
        toastr.warning("<?= $this->session->flashdata('warning'); ?>")
    <?php } ?>
</script>

<script>
    // JQUERY UPLOAD GAMBAR karena setelh choose file tulisan di form gak mau berubah
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>

<script>
    CKEDITOR.replace('deskripsi', {
        skin: 'office2013,<?= base_url('assets/') ?>skins/office2013/',
        width: 720,
        height: 500
    });
</script>
<script>
    CKEDITOR.replace('deskripsi_galeri', {
        skin: 'office2013,<?= base_url('assets/') ?>skins/office2013/',
        width: 700,
        height: 200
    });
</script>
<script>
    CKEDITOR.replace('deskripsi_video', {
        skin: 'office2013,<?= base_url('assets/') ?>skins/office2013/',
        width: 700,
        height: 200
    });
</script>


<script>
    datatable
    $('#datatable').DataTable()
</script>








</body>

</html>