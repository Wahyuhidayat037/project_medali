<div class="container-fluid">
	
	<h3><?php echo $title; ?></h3>
	<hr>
	<br>

  <table>
    <tr>
      <td class="col-sm-3 col-form-label">Event</td>
      <td>:</td>
      <td><?php echo $eventdetail['event_nama'] ?></td>
    </tr>

    <tr>
      <td class="col-sm-3 col-form-label">Cabang Olahraga</td>
      <td>:</td>
      <td><?php echo $eventdetail['cabor_nama'] ?></td>
    </tr>

    <tr>
      <td class="col-sm-3 col-form-label">Tanggal</td>
      <td>:</td>
      <td>
        <?php echo $this->M_model->uraitanggal($eventdetail['event_start'], $eventdetail['event_end']) ?>
      </td>
    </tr>
  </table>
  <button type="button" class="btn btn-primary float-right mt-3 mb-3" data-toggle="modal" data-target="#edit_modal">
    <i class="fa fa-plus"></i>
  </button>
  <table class="table table-bordered table-striped text-center" id="" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>No</th>
        <th>Medali</th>
        <th>Kontingen</th>
        <th>Nama Atlet</th>
        <th style="width: 125px;">Action</th>

      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;

      foreach ($medalievent as $mdl) :
        ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $mdl['medali_nama']; ?></td>
          <td><?php echo $mdl['kontingen_nama']; ?></td>
          <td><?php echo $mdl['nama_atlet']; ?></td>

          <td>
            <form action="<?= base_url('Home/hapus_medali/'.$mdl['event_id']) ?>" method="post">
             <button type="button" class="badge badge-warning border-top-0 border-right-0 border-left-0 border-bottom-0" data-toggle="modal" data-target="#edit_modal<?= $mdl['id'] ?>">
              <i class="fa fa-edit"></i>
            </button>
            <input type="hidden" name="id" value="<?=$mdl['id'] ?>">
            <button onclick="return confirm('Apakah Yankin Ingin Hapus??')" class="badge badge-danger border-top-0 border-right-0 border-left-0 border-bottom-0"><i class="fas fa-trash-alt"></i></button>
          </form>
        </td>
      </tr>

      <!-- Modal -->
      <div class="modal fade" id="edit_modal<?= $mdl['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Medali</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="<?php echo base_url('Home/proses_edit_medali/'.$mdl['event_id']) ?>">


                <div class="form-group row">
                  <label for="medali_id" class="col-sm-3 col-form-label">Medali</label>
                  <div class="col-sm-5">
                   <select name="medali_id" class="form-control" id="medali_id">
                    <option value="">- Pilih -</option>
                    <?php foreach ($medaliref as $evt): ?>
                      <option value="<?php echo $evt['medali_id']; ?>"
                        <?php if ($mdl['medali_id']== $evt['medali_id']): ?>
                         selected 
                       <?php endif ?>
                       ><?php echo $evt['medali_nama']; ?></option>
                     <?php endforeach ?>
                   </select>
                 </div>
               </div>

               <div class="form-group row">
                <label for="kontingen_id" class="col-sm-3 col-form-label">Kontingen</label>
                <div class="col-sm-5">
                  <select name="kontingen_id" class="form-control" id="kontingen_id">
                    <option value="">- Pilih -</option>
                    <?php foreach ($kontingendata as $evt): ?>
                      <option value="<?php echo $evt['kontingen_id']; ?>" <?php if ($mdl['kontingen_id']== $evt['kontingen_id']): ?>
                      selected 
                      <?php endif ?>><?php echo $evt['kontingen_nama']; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="kontingen_manajer" class="col-sm-3 col-form-label">Nama Atlet</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_atlet" required="" id="kontingen_manajer" value="<?php echo $mdl['nama_atlet']; ?>">
                </div>
              </div>




              <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-5">
                  <input type="hidden" name="event_id" value="<?php echo $mdl['event_id'] ?>">
                  <input type="hidden" name="id" value="<?php echo $mdl['id'] ?>">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
                </div>
              </div>
              <?php 
  // }
              ?>

            </form>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</tbody>
</table>

</div>
</div>