<!-- Begin Page Content -->
<div class="container-fluid" style="margin-top: 20px">
  <!-- Page Heading -->

  <head>
    <!-- DataTables -->


    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?>
          

      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped text-center" id="" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th rowspan="2" style="line-height: 80px;">Peringkat</th>
                <th rowspan="2" style="line-height: 80px;">Kontingen</th>
                <th colspan="3">Medali</th>
              </tr>
              <tr>
                <th><i style="color: #FFD700;" class="fas fa-medal"></i></th>
                <th><i style="color: #C0C0C0;" class="fas fa-medal"></i></th>
                <th><i style="color: #cd7f32;" class="fas fa-medal"></i></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $peringkat = 1;

              foreach ($rekap as $rkp) :
              ?>
                <tr>
                  <td><?php echo $peringkat++ ?></td>
                  <td><?php echo $rkp['kontingen_nama']; ?></td>
                  <td><?php echo $rkp['emas']; ?></td>
                  <td><?php echo $rkp['perak']; ?></td>
                  <td><?php echo $rkp['perunggu']; ?></td>
                 

                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

</div>