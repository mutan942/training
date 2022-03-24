<?php 
$this->load->view("template/head");
?>

<div class="col-sm p-3 min-vh-100">
    <!-- content -->
    <h2>My Dashboard <?=@strtoupper($_SESSION["username"])?></h2>
    <hr />
    <?=@$_SESSION["pesan"]?>
    <hr />
    <h3>More content...</h3>
    <p>Sriracha biodiesel taxidermy organic post-ironic, Intelligentsia salvia mustache 90's code editing
        brunch. Butcher polaroid VHS art party, hashtag Brooklyn deep v PBR narwhal sustainable mixtape swag
        wolf squid tote bag. Tote bag cronut semiotics, raw denim deep v taxidermy messenger bag. Tofu YOLO
        Etsy, direct trade ethical Odd Future jean shorts paleo. Forage Shoreditch tousled aesthetic irony,
        street art organic Bushwick artisan cliche semiotics ugh synth chillwave meditation. Shabby chic
        lomo plaid vinyl chambray Vice. Vice sustainable cardigan, Williamsburg master cleanse hella DIY
        90's blog.</p>

</div>

<?php 
$this->load->view("template/foot");
?>