<?php 
$this->load->view("template/head");
?>

<div class="col-sm p-3 min-vh-100">
    <!-- content -->
    <h2>Transaction ID (<?=$transaksi["kode"]?>) </h2>
    <a href="<?=base_url('user/transaksi')?>" class="btn btn-danger">BACK</a>
    <?=@$_SESSION["pesan"]?>
    <hr />
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Product List</h4>
                    <select style="width:100%;" type="" id="selectproduk" class=""></select>
                </div>
                <div class="card-body" id="tabelproduk">

                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Action</h4>
                </div>
                <form method="POST" action="<?=base_url("user/accpenjualan");?>">
                    <input type="hidden" name="kode" value="<?=$transaksi["kode"]?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Total</label>
                            <input type="number" readonly class="form-control" id="total" name="total" value="0"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Bayar</label>
                            <input type="number" class="form-control" id="bayar" name="bayar" value="0" required>
                        </div>
                        <div class="form-group">
                            <label>Kembalian</label>
                            <input readonly type="number" class="form-control" id="kembalian" name="kembalian" value="0"
                                required>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-warning">Bayar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
$this->load->view("template/foot");
?>
<script type="text/javascript">
var kode = "<?=$transaksi["kode"]?>";
loadtable();

$(function() {
    $('#selectproduk').select2({
        minimumInputLength: 3,
        allowClear: true,
        containerCssClass: "select2--large", // For Select2 v4.0
        selectionCssClass: "select2--large", // For Select2 v4.1
        dropdownCssClass: "select2--large",
        theme: "bootstrap-5",
        placeholder: 'Masukkan nama produk',
        ajax: {
            dataType: 'json',
            url: '<?=base_url("user/getproduk")?>',
            delay: 800,
            data: function(params) {
                return {
                    search: params.term
                }
            },
            processResults: function(data, page) {
                return {
                    results: data
                };
            },
        }
    }).on('select2:select', function(evt) {
        var data = $("#selectproduk option:selected").val();
        $('#selectproduk').val(null).trigger('change');
        addproduk(data);
    });
});

function addproduk(idproduk) {
    $.ajax({
        url: '<?=base_url("user/simpanproduk");?>',
        type: 'post',
        data: {
            kode: kode,
            idproduk: idproduk
        },
        success: function(data) {
            loadtable();
        }
    });
}

function loadtable() {
    $.ajax({
        url: '<?=base_url("user/tableproduk");?>',
        type: 'post',
        data: {
            kode: kode
        },
        success: function(data) {
            var res = JSON.parse(data);
            $("#tabelproduk").html(res["item"]);
            $("#total").val(res["total"]);
            hitungsisa();
            $('#selectproduk').focus().select();
        }
    });
}

function ubahqty(iddetail) {
    var qtybaru = $("#it" + iddetail).val();
    //alert(qtybaru);
    $.ajax({
        url: '<?=base_url("user/ubahqty");?>',
        type: 'post',
        data: {
            iddetail: iddetail,
            qtybaru: qtybaru
        },
        success: function(data) {
            loadtable();
        }
    });
}

$("#bayar").keyup(function(e) {
    hitungsisa();
});

function hitungsisa() {
    var a = parseInt($("#total").val());
    var b = parseInt($("#bayar").val());
    var sisa = b - a;
    $("#kembalian").val(sisa);
}
</script>
