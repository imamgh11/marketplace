<div class="col-12 col-lg-3 d-flex">
  <section class="account-nav flex-grow-1">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Toko</h3>
              <a class='float-lest btn btn-primary btn-sm' href='<?= base_url('members/toko'); ?>'>Tambah Toko</a>
            </div>

            <div class="card-body">
              <table id="table1" class="table table-sm table-borderless display nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th>Jumlah Lead</th>
                    <th>Disetujui</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($record as $row) {?>
                    <tr><td><?php echo $no ?></td>
                              <td><?php echo $row->jml_reseller ?></td>
                              <td><?php echo $row->aktif ?></td>
                              
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