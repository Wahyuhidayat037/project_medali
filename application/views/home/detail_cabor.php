<div class="container-fluid">
	
	<h3><?php echo $title; ?></h3>
	<hr>
	<br>

  <table>
    <tr>
      <td class="col-sm-6 col-form-label">Cabor</td>
      <td class="col-sm-1">:</td>
      <td><?php echo $cabordetail['cabor_nama'] ?></td>
    </tr>
  </table>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-right mb-3 mt-3" data-toggle="modal" data-target="#myModal">
  <i class="fa fa-plus"></i>
</button>



  

  <div class="table-responsive">
    <table class="table table-bordered table-striped text-center" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Lokasi</th>
          <th>Lokasi</th>
          <th style="width: 125px;">Action</th>

        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;

        foreach ($lokasicabor as $mdl) :
          ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $mdl['lokasi_nama']; ?></td>
            <td><a target="_blank" href="https://www.google.com/maps/place/<?php echo $mdl['lokasi_long'].','.$mdl['lokasi_lat']; ?>"><img src="<?= base_url('files/'); ?>img/peta.png" width="30px"></a></td>

            <td>
              <form action="<?= base_url('Home/hapus_lokasi/'.$mdl['cabor_id']) ?>" method="post">
               <button type="button" class="badge badge-warning border-top-0 border-right-0 border-left-0 border-bottom-0" data-toggle="modal" data-target="#edit_modal<?= $mdl['lokasi_id'] ?>">
                <i class="fa fa-edit"></i>
              </button>
              <input type="hidden" name="lokasi_id" value="<?=$mdl['lokasi_id'] ?>">
              <button onclick="return confirm('Apakah Yankin Ingin Hapus??')" class="badge badge-danger border-top-0 border-right-0 border-left-0 border-bottom-0"><i class="fas fa-trash-alt"></i></button>
            </form>
          </td>
        </tr>

        <!-- Modal -->
        <div class="modal fade" id="edit_modal<?= $mdl['lokasi_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Lokasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="<?php echo base_url('Home/proses_edit_lokasi/'.$mdl['cabor_id']) ?>">


                  <div class="form-group row">
                    <label for="lokasi_id" class="col-sm-4 col-form-label">Nama Lokasi</label>
                    <div class="col-sm-6">
                     <select name="lokasi_id" class="form-control" id="lokasi_id">
                      <option value="">- Pilih -</option>
                      <?php foreach ($lokasidata as $evt): ?>
                        <option value="<?php echo $evt['lokasi_id']; ?>"
                          <?php if ($evt['lokasi_id']== $mdl['lokasi_id']): ?>
                           selected 
                         <?php endif ?>
                         ><?php echo $evt['lokasi_nama']; ?></option>
                       <?php endforeach ?>
                     </select>
                   </div>
                 </div>

                 <div class="form-group row">
                  <label for="kontingen_id" class="col-sm-4 col-form-label">Lokasi Long</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="kontingen_manajer" required="" id="kontingen_manajer" value="<?php echo $mdl['lokasi_long']; ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="kontingen_id" class="col-sm-4 col-form-label">Lokasi Lat</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="kontingen_manajer" required="" id="kontingen_manajer" value="<?php echo $mdl['lokasi_lat']; ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="alamat" class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
                  </div>
                </div>

              </form>
            </div>
          </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
</div>
