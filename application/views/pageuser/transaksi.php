<?php 
$this->load->view("template/head");
?>

<div class="col-sm p-3 min-vh-100">
    <!-- content -->
    <h2>Transaction <?=date("d F Y")?></h2>
    <a href="<?=base_url('user/addtrans')?>" class="btn btn-primary">NEW TRANS</a>
    <?=@$_SESSION["pesan"]?>
    <hr />
    <h3>Pending Transaction</h3>
    <div class="row">
        <?php 
        foreach($pending as $p):
        ?>
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <center><i style="font-size:2.9rem" class="bi-apple"></i></center>
                <div class="card-body">
                    <h5 class="card-title"><?=$p["kode"]?></h5>
                    <a href="<?=base_url("user/belanja/").$p["kode"];?>" class="btn btn-warning btn-sm">Continue</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php 
$this->load->view("template/foot");
?>