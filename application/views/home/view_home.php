<?php
if ($this->uri->segment(2) == 'kategori') {
    $cek = $this->model_app->edit('tb_toko_kategoriproduk', array('kategori_seo' => $this->uri->segment(3)))->row_array();
    $jumlah = $this->model_app->view_where('tb_toko_produk', array('id_kategori_produk' => $cek['id_kategori_produk']))->num_rows();
    if ($jumlah <= 0) { ?>
        <div class="text-center mt-3 mb-3">
            <h5>Maaf produk pada kategori ini belum tersedia.</h5>
            <a class="btn btn-primary btn-sm mt-2" href="#">Home</a>
        </div>
<?php }
} ?>
<head>
<meta charset="utf-8">
<title>Example of Auto Loading Bootstrap Modal on Page Load</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
</head>
<body>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">CARA MELIPAT GANDAKAN UANG!!!
            Investasi Vs Nabung</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <img src="https://www.pfimegalife.co.id/literasi-keuangan/site/libraries/03.%20PML_OnPage_December%202020_header.jpg" alt="Investasi" class="img-fluid" alt="Responsive image">
                

                <br><br>                
                <a class='float-lest btn btn-primary btn-sm'  href="<?php echo base_url('/artikel') ?>">Baca Selengkapnya</a>
            </div>
        </div>
    </div>
</div>
</body>

<div class="row">
    <div class="col-12">
        <div class="block">

            <table class="table" style="text-align:center">
              <tbody>
                <tr>
                  <th scope="col"><a href="<?php echo base_url('/produk') ?>"><i class="fa fa-shopping-bag fa-3x" style="color:#338dcc;" ></i></a><br><br>Belanja</th>
                  <th scope="col"><a href="<?php echo base_url('/members/reseller_view') ?>"><i class="fa fa-chart-line fa-3x" style="color:#338dcc;" ></i></a><br><br>Pendapatan</th>
                  <th scope="col"><a href="<?php echo base_url('/members/riwayat_belanja') ?>"><i class="fa fa-book fa-3x" style="color:#338dcc;" ></i></a><br><br>Cek Status Pesanan</th>
                  
                </tr>
              </tbody>
              <tbody>
                <th scope="col"><a href="<?php echo base_url('/konfirmasi') ?>"><i class="fa fa-credit-card fa-3x" style="color:#338dcc;" ></i></a><br><br>Konfirmasi Pembayaran</th>
                  <th scope="col"><a href="<?php echo base_url('/login') ?>"><i class="fa fa-user fa-3x" style="color:#338dcc;" ></i></a><br><br>Profile</th>
                  <th scope="col"><a href="<?php echo base_url('/members/edit_profile') ?>"><i class="fa fa-cog fa-3x" style="color:#338dcc;" ></i></a><br><br>Pengaturan</th>
                
              </tbody>
              <tbody>
                <th scope="col"><a href="<?php echo base_url('/artikel') ?>"><i class="fa fa-money-bill-wave fa-3x" style="color:#338dcc;" ></i></a><br><br>Artikel Keuangan</th>
                  <th scope="col"><a href="<?php echo base_url('/members/gold') ?>"><i class="fa fa-cubes fa-3x" style="color:#338dcc;" ></i></a><br><br>Harga Emas Saat Ini</th>
                  <th scope="col"><a href="<?php echo base_url('/members/bitcoin') ?>"><i class="fa fa-coins fa-3x" style="color:#338dcc;" ></i></a><br><br>Harga BitCoin Saat Ini</th>
                
              </tbody>
            </table>
            <br>
            <br>
            <div class="products-view">
                <div class="products-view__list products-list" data-layout="grid-4-full" data-with-features="false">
                    <div class="products-list__body">
                        <?php
                        $no = 1;
                        foreach ($record->result_array() as $row) {
                            if (trim($row['gambar']) == '') {
                                $foto_produk = 'no-image.png';
                            } else {
                                $foto_produk = $row['gambar'];
                            }

                            $stok = $row['stok'];
                            if ($stok !== 0) { ?>
                                <div class="products-list__item">
                                    <div class="product-card">
                                        <input clas='post' id="id_produk" name="id_produk" type="hidden" value="<?= $row['id_produk'] ?>">

                                        <?php
                                        $persen = ($row['diskon'] / $row['harga_konsumen']) * 100;
                                        if ($row['diskon'] == "0") {
                                        } else { ?>
                                            <div class="product-card__badges-list">
                                                <div class="product-card__badge product-card__badge--sale"><?= '-' . round($persen, 2) . '%' ?></div>
                                            </div>
                                        <?php } ?>

                                        <div class="product-card__image"><a href="<?= base_url('produk/detail/') . $row['produk_seo']; ?>">
                                                <img src="<?= base_url('assets/images/produk/') . $foto_produk; ?>" alt=""></a></div>
                                        <div class="product-card__info mb-3">
                                            <div class="product-card__name"><a href="<?= base_url('produk/detail/') . $row['produk_seo']; ?>"><?= $row['nama_produk']; ?></a></div>

                                            <div class="product__rating mt-2">
                                                <div class="product__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">

                                                            <?php
                                                            $idpro = $row['id_produk'];
                                                            $query = $this->db->query("SELECT * FROM tb_ulasan WHERE id_produk='$idpro'");
                                                            $bin  = $this->db->query("SELECT SUM(bintang) AS totalbintang FROM tb_ulasan WHERE id_produk='$idpro'")->row_array();
                                                            $jml_rev = $query->num_rows();

                                                            $jml_bintang = $bin['totalbintang'] / $jml_rev;

                                                            if ($jml_rev == 0) {
                                                                for ($y = 0; $y < 5; $y++) { ?>
                                                                    <svg class="rating__star rating__star" width="13px" height="12px">
                                                                        <g class="rating__fill">
                                                                            <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#star-normal"></use>
                                                                        </g>
                                                                    </svg>
                                                                <?php }
                                                            } else {
                                                                for ($y = 0; $y <  $jml_bintang; $y++) { ?>
                                                                    <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                        <g class="rating__fill">
                                                                            <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#star-normal"></use>
                                                                        </g>
                                                                    </svg>
                                                                <?php }
                                                                for ($y = 0; $y <  5 - $jml_bintang; $y++) { ?>
                                                                    <svg class="rating__star rating__star" width="13px" height="12px">
                                                                        <g class="rating__fill">
                                                                            <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#star-normal"></use>
                                                                        </g>
                                                                    </svg>
                                                            <?php }
                                                            } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if ($jml_rev > 0) { ?>
                                                    <div class="product__rating-legend"><a href="#"><?= $jml_rev ?> Ulasan</a><span></div>
                                                <?php } ?>
                                            </div>

                                            <div class="product-card__prices">
                                                <?php if ($row['diskon'] == '0') { ?>
                                                    Rp <?= rupiah($row['harga_konsumen']) ?>
                                                <?php } else { ?>
                                                    <small><del>Rp <?= rupiah($row['harga_konsumen']) ?></del></small>
                                                    Rp <?= rupiah($row['harga_konsumen'] - $row['diskon']) ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <nav class="mb-5">
            <?php echo $this->pagination->create_links(); ?>
        </nav>
    </div>
</div>