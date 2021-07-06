<div class="block">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-3 d-flex">
        <div class="account-nav flex-grow-1">
          <ul>
            <li class="account-nav__item"><a href="<?= base_url('members/dashboard') ?>">Dashboard</a></li>
            <li class="account-nav__item "><a href="<?= base_url('members/edit_profile') ?>">Ubah Profil</a></li>
            <li class="account-nav__item"><a href="<?= base_url('members/edit_alamat') ?>">Ubah Alamat</a></li>
            <li class="account-nav__item account-nav__item--active"><a href="<?= base_url('members/listtoko') ?>">Toko Saya</a></li>
            <li class="account-nav__item"><a href="<?= base_url('members/riwayat_belanja') ?>">Riwayat Transaksi</a></li>
            <li class="account-nav__item"><a href="<?= base_url('members/password') ?>">Ganti Password</a></li>
            <li class="account-nav__item"><a href="javascript:void(0)" onclick="logout()">Keluar</a></li>
          </ul>
        </div>
      </div>
      <div class="col-12 col-lg-9 mt-4 mt-lg-0">
        <div class="card">
          <div class="card-header">
            <h5>Buat Produk</h5>
          </div>
          <div class="card-divider"></div>
          <div class="card-body">
            <div class="row no-gutters">
              <div class="col-12 col-lg-7 col-xl-6">

                <form action="<?= base_url('members/produk_tambah') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">

              <div class="card-body">

                <input type='hidden' name='id' value=''>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Supplier</label>
                  <div class="col-sm-6">
                    <select name='supplier' class='form-control select2' required>
                      <option value='' selected>- Pilih Supplier -</option>
                      <?php
                      foreach ($supp as $rowz) {
                        echo "<option value='$rowz[id_supplier]'>$rowz[nama_supplier]</option>";
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kategori</label>
                  <div class="col-sm-6">
                    <select name='a' class='form-control select2' required>
                      <option value='' selected>- Pilih Kategori Produk -</option>
                      <?php
                      foreach ($record as $row) {
                        echo "<option value='$row[id_kategori_produk]'>$row[nama_kategori]</option>";
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Produk</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='b' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Satuan</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='c' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Berat</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='berat' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Harga Beli(Modal)</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='d' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Harga Konsumen</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='f' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Diskon</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='diskon'>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Stok</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='stok' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <textarea rows="5" id="summernote" class='form-control' name='ff' required></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Gambar</label>
                  <div class="col-sm-6">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFileLangHTML" name="g">
                      <label class="custom-file-label" for="customFileLangHTML" data-browse="Cari">Pilih gambar...</label>
                    </div>
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type='submit' name='submit' class='btn btn-primary btn-sm'>Simpan</button>
                    <a href='<?= base_url('members/produk_id') ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Batal</button></a>
                  </div>
                </div>

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