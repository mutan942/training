</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="<?=base_url("assets/js/bootstrap.bundle.min.js");?>" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
<script>
$(document).ready(function() {
    $('.tableku').DataTable();
    $(".selectku").select2({
        dropdownParent: $("#exampleModal")
    });
});
</script>
</body>

</html>
