<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src=<?= $recursos_bs_jq ?>></script>
<script src=<?= $recursos_pop_js ?>></script>
<script src=<?= $recursos_bs_js ?>></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    // Inicializando data-aos 
    AOS.init({
        offset: 120,
        delay: 0,
        duration: 400, 
    });
    
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('#inputId').val($(e.relatedTarget).attr('href'));
    });

    $('#confirm-update').on('show.bs.modal', function(e) {
        $(this).find('#inputId').val($(e.relatedTarget).attr('href'));
    });

    $('#form-modal').on('show.bs.modal', function(e) {
        $(this).find('#iframe-modal').attr('src', $(e.relatedTarget).data('src'));
    });

    $('#print-modal').on('show.bs.modal', function(e) {
        $(this).find('#iframe-modal').attr('src', $(e.relatedTarget).data('src'));
    });
</script>