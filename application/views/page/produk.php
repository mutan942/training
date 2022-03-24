<?php 
$this->load->view("template/head");
?>

<div class="col-sm p-3 min-vh-100">
    <!-- content -->
    <h2>Page Product</h2>
    <hr />
    <?=@$_SESSION["pesan"]?>
    <button onclick="bukamodal()" class="btn btn-primary">ADD ITEM</button>
    <hr />
    <table class="table tableku">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Item</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">*</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 0;
            foreach($produk as $u){ 
            $no++;    
            ?>
            <tr>
                <td scope="row"><?=$no?></td>
                <td><?=$u["produk"]?></td>
                <td><?=$u["kategori"]?></td>
                <td><?=$u["harga"]." /".$u["satuan"]?></td>
                <td><?=$u["stok"]?></td>
                <td width="100" align="center"><a href="<?=base_url("home/deleteproduk/").$u["id"];?>"
                        class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?=base_url("home/addproduk")?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="produk" />
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select style="width:100%;" name="kategori" class="selectku form-control">
                            <option>-- Choose One --</option>
                            <?php foreach($kategori as $k) : ?>
                            <option value="<?=$k["id"]."-".$k["kategori"];?>"><?=$k["id"]."-".$k["kategori"];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="harga" />
                    </div>
                    <div class="form-group">
                        <label>Unit</label>
                        <input type="text" class="form-control" name="satuan" />
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" class="form-control" name="stok" />
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