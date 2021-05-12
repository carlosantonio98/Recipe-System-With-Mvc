<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src=<?= $recursos_bs_jq ?>></script>
<script src=<?= $recursos_pop_js ?>></script>
<script src=<?= $recursos_bs_js ?>></script>
<script src=<?= $chartBundle_js ?>></script>
<script src=<?= $chartUtils_js ?>></script>
<script src=<?= $acciones_js ?>></script>

<script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });

    $('#form-modal').on('show.bs.modal', function(e) {
        $(this).find('#iframe-modal').attr('src', $(e.relatedTarget).data('src'));
    });

    $('#print-modal').on('show.bs.modal', function(e) {
        $(this).find('#iframe-modal').attr('src', $(e.relatedTarget).data('src'));
    });
</script>