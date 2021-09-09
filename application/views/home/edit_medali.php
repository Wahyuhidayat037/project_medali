<div class="modal fade" id="edit_medali" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Halaman Tambah Medali</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



<form method="post" action="<?php echo base_url('Home/proses_edit_medali/'.$medali['event_id']) ?>">


  <div class="form-group row">
    <label for="medali_id" class="col-sm-2 col-form-label">Medali</label>
    <div class="col-sm-5">
       <select name="medali_id" class="form-control" id="medali_id">
          <option value="">- Pilih -</option>
          <?php foreach ($medaliref as $evt): ?>
            <option value="<?php echo $evt['medali_id']; ?>"
              <?php if ($medali['medali_id']== $evt['medali_id']): ?>
               selected 
              <?php endif ?>
              ><?php echo $evt['medali_nama']; ?></option>
          <?php endforeach ?>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="kontingen_id" class="col-sm-2 col-form-label">Kontingen</label>
    <div class="col-sm-5">
      <select name="kontingen_id" class="form-control" id="kontingen_id">
          <option value="">- Pilih -</option>
          <?php foreach ($kontingendata as $evt): ?>
            <option value="<?php echo $evt['kontingen_id']; ?>" <?php if ($medali['kontingen_id']== $evt['kontingen_id']): ?>
               selected 
              <?php endif ?>><?php echo $evt['kontingen_nama']; ?></option>
          <?php endforeach ?>
      </select>
    </div>
  </div>

<div class="form-group row">
    <label for="kontingen_manajer" class="col-sm-2 col-form-label">Nama Atlet</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="nama_atlet" required="" id="kontingen_manajer" value="<?php echo $medaliref['medali_nama']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="alamat" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-5">
      <input type="hidden" name="event_id" value="<?php echo $medali['event_id'] ?>">
      <input type="hidden" name="id" value="<?php echo $medali['id'] ?>">
      <button type="submit" class="btn btn-primary">Update</button>
      <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
    </div>
  </div>

    <?php 
  // }
   ?>

</form>

</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>