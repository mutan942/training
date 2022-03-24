<?php 
$this->load->view("template/head");
?>

<div class="col-sm p-3 min-vh-100">
    <!-- content -->
    <h2>Page User</h2>
    <hr />
    <?=@$_SESSION["pesan"]?>
    <button onclick="bukamodal()" class="btn btn-primary">ADD USER</button>
    <hr />
    <table class="table tableku">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Nama</th>
                <th scope="col">Level</th>
                <th scope="col">*</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 0;
            foreach($user as $u){ 
            $no++;    
            ?>
            <tr>
                <td scope="row"><?=$no?></td>
                <td><?=$u["username"]?></td>
                <td><?=$u["nama"]?></td>
                <td><?=$u["level"]?></td>
                <td width="100" align="center"><a href="<?=base_url("home/deleteuser/").$u["id"];?>"
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
            <form action="<?=base_url("home/adduser")?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" />
                    </div>
                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" class="form-control" name="nama" />
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control">
                            <option value="kasir">Kasir</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Insert User</button>
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