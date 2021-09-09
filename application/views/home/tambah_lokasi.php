<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="lokasimodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lokasimodal">Halaman Tambah Medali</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('Home/proses_tambah_lokasi/'.$cabor_id) ?>">
  <div class="form-group row">
    <label for="lokasi_nama" class="col-sm-3 col-form-label">Nama Lokasi</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="lokasi_nama" required="" id="lokasi_nama" autofocus="autofocus">
    </div>
  </div>

  <div class="form-group row">
    <label for="lokasi_long" class="col-sm-3 col-form-label">Lokasi Long</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="lokasi_long" required="" id="lokasi_long">
    </div>
  </div>

  <div class="form-group row">
    <label for="lokasi_lat" class="col-sm-3 col-form-label">Lokasi Lat</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="lokasi_lat" required="" id="lokasi_lat">
    </div>
  </div>

 

  <div class="form-group row">
    <label for="alamat" class="col-sm-3 col-form-label"></label>
    <div class="col-sm-5">
      <input type="hidden" name="cabor_id" value="<?= $cabor_id ?>">
      <button type="submit" class="btn btn-primary">Tambah</button>
      <button type="reset" class="btn btn-danger">Reset</button>
    </div>
  </div>

</form>
     
      </div>
    </div>
  </div>
</div>

  