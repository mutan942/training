<?php 
$this->load->view("template/head");
?>

<div class="col-sm p-3 min-vh-100">
    <!-- content -->
    <h2>Page Category</h2>
    <hr />
    <?=@$_SESSION["pesan"]?>
    <button onclick="bukamodal()" class="btn btn-primary">ADD CAT</button>
    <hr />
    <table class="table tableku">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kategori</th>
                <th scope="col">*</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 0;
            foreach($kategori as $u){ 
            $no++;    
            ?>
            <tr>
                <td scope="row"><?=$no?></td>
                <td><?=$u["kategori"]?></td>
                <td width="100" align="center"><a href="<?=base_url("home/deletekategori/").$u["id"];?>"
                        class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?=base_url("home/addkategori")?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" class="form-control" name="kategori" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Insert</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php 
$this->load->view("template/foot");
?>

<script>
function bukamodal() {
    $("#exampleModal").modal("toggle");
}
</script>