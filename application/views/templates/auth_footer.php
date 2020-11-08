<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    <?php if ($this->session->userdata('success')) { ?>
        toastr.success("<?= $this->session->flashdata('success'); ?>")
    <?php } ?>
    <?php if ($this->session->userdata('warning')) { ?>
        toastr.warning("<?= $this->session->flashdata('warning'); ?>")
    <?php } ?>
</script>
</body>

</html>