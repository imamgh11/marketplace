<div class="block">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-3 d-flex">
        <div class="account-nav flex-grow-1">
          <ul>
            <li class="account-nav__item"><a href="<?= base_url('members/dashboard') ?>">Dashboard</a></li>
            <li class="account-nav__item"><a href="<?= base_url('members/edit_profile') ?>">Ubah Profil</a></li>
            <li class="account-nav__item"><a href="<?= base_url('members/edit_alamat') ?>">Ubah Alamat</a></li>
            <li class="account-nav__item  account-nav__item--active"><a href="<?= base_url('members/listtoko') ?>">Toko Saya</a></li>
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
              <h3 class="card-title">Data Toko</h3>
              <a class='float-lest btn btn-primary btn-sm' href='<?= base_url('members/toko'); ?>'>Tambah Toko</a>
              <a class='float-lest btn btn-primary btn-sm' href="<?php echo base_url('/members/reseller_view') ?>">Reseller Saya</a>
            </div>

            <div class="card-body">
              <table id="table1" class="table table-sm table-borderless display nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th>Nama Toko</th>
                    <th>Kontak Person</th>
                    <th>No. Telp</th>
                    <th>Email</th>
                    <th style="width: 10%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($record as $row) {?>
                    <tr><td><?php echo $no ?></td>
                              <td><?php echo $row->nama_supplier ?></td>
                              <td><?php echo $row->kontak_person ?></td>
                              <td><?php echo $row->no_hp ?></td>
                              <td><?php echo $row->alamat_email ?></td>
                              <td>
                              <a class='float-lest btn btn-primary btn-sm' href='<?= base_url('members/produk_id/') . $row->id_supplier; ?>'>Produk</a>
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
