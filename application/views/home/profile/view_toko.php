<div class="block">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-3 d-flex">
        <div class="account-nav flex-grow-1">
          <ul>
            <li class="account-nav__item"><a href="<?= base_url('members/dashboard') ?>">Dashboard</a></li>
            <li class="account-nav__item "><a href="<?= base_url('members/edit_profile') ?>">Ubah Profil</a></li>
            <li class="account-nav__item"><a href="<?= base_url('members/edit_alamat') ?>">Ubah Alamat</a></li>
            <li class="account-nav__item account-nav__item--active"><a href="<?= base_url('members/toko') ?>">Membuat Toko</a></li>
            <li class="account-nav__item"><a href="<?= base_url('members/riwayat_belanja') ?>">Riwayat Transaksi</a></li>
            <li class="account-nav__item"><a href="<?= base_url('members/password') ?>">Ganti Password</a></li>
            <li class="account-nav__item"><a href="javascript:void(0)" onclick="logout()">Keluar</a></li>
          </ul>
        </div>
      </div>
      <div class="col-12 col-lg-9 mt-4 mt-lg-0">
        <div class="card">
          <div class="card-header">
            <h5>Buat Toko Anda</h5>
          </div>
          <div class="card-divider"></div>
          <div class="card-body">
            <div class="row no-gutters">
              <div class="col-12 col-lg-7 col-xl-6">

                <form action="<?= base_url('members/input_data_toko') ?>" method="post" enctype="multipart/form-data">

                  <input type="hidden" name="id_pengguna" value="<?= $this->session->id_pengguna ?>">

                  
                  <hr>

                  <div class="form-group">
                    <label>Nama Toko</label>
                    <input class='form-control' type='text' name='nama_supplier' required>
                  </div>

                  <div class="form-group">
                    <label>Nama Pemilik</label>
                    <input class='form-control' type='text' name='kontak_person'  required>
                  </div>

                  

                  <div class="form-group">
                    <label>No. Telp</label>
                    <input class='number form-control' type='number' name='no_hp'  required>
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input class='form-control' type='text' name='alamat_lengkap'  required>
                  </div>
                  <div class="form-group">
                    <label>Kode POS</label>
                    <input class='number form-control' type='number' name='kode_pos'  required>
                  </div>
                  <div class="form-group">
                    <label>Deskripsi Toko</label>
                    <textarea class='form-control' type='text' name='keterangan'  required></textarea>
                  </div>



                  <div class="form-group mt-5 mb-0">
                    <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>