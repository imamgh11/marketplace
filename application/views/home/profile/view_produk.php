<div class="block">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-3 d-flex">
        <div class="account-nav flex-grow-1">
          <ul>
            <li class="account-nav__item"><a href="<?= base_url('members/dashboard') ?>">Dashboard</a></li>
            <li class="account-nav__item"><a href="<?= base_url('members/edit_profile') ?>">Ubah Profil</a></li>
            <li class="account-nav__item"><a href="<?= base_url('members/edit_alamat') ?>">Ubah Alamat</a></li>
            <li class="account-nav__item"><a href="<?= base_url('members/listtoko') ?>">Toko Saya</a></li>
            <li class="account-nav__item   account-nav__item--active"><a href="<?= base_url('members/listtoko') ?>">Toko</a></li>
            <li class="account-nav__item"><a href="<?= base_url('members/riwayat_belanja') ?>">Riwayat Transaksi</a></li>
            <li class="account-nav__item"><a href="<?= base_url('members/password') ?>">Ganti Password</a></li>
            <li class="account-nav__item"><a href="javascript:void(0)" onclick="logout()">Keluar</a></li>
          </ul>
        </div>
      </div>
<div class="col-12 col-lg-3 d-flex">
  <section class="account-nav flex-grow-1">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Produk</h3>
              <a class='float-lest btn btn-primary btn-sm' href='<?= base_url('members/produk_tambah'); ?>'>Tambah Produk</a>
            </div>

            <div class="card-body">
             
              <table id="table1" class="table table-sm table-borderless display nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 25%">Nama Produk</th>
                    <th>Harga Modal</th>
                    <th>Harga Jual</th>
                    <th>Diskon</th>
                    <th>Stok</th>
                    <th style="width: 10%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($record as $row) {?>
                    <tr><td><?php echo $no ?></td>
                        <td><?php echo $row->nama_produk ?></td>
                        <td><?php echo $row->harga_beli ?></td>
                        <td><?php echo $row->harga_konsumen ?></td>
                        <td><?php echo $row->diskon ?></td>
                        <td><?php echo $row->stok ?></td>
                        <td>
    
                             </td>
                          </tr>
                    <?php  $no++;
                  }
                  ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>

      </div>
    </div>
  </div>
