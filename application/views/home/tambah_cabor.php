<div class="container-fluid">
	
	<h3><?php echo $title; ?></h3>
	<hr>
	<br>


	<form method="post" action="<?php echo base_url('Home/proses_tambah_cabor') ?>">

  <div class="form-group row">
    <label for="cabor_nama" class="col-sm-2 col-form-label">Cabang Olahraga</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="cabor_nama" required="" id="cabor_nama" autofocus="autofocus">
    </div>
  </div>

  <div class="form-group row">
    <label for="cabor_ket" class="col-sm-2 col-form-label">Keterangan</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="cabor_ket" required="" id="cabor_ket">
    </div>
  </div>

  <div class="form-group row">
    <label for="alamat" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-5">
      <button type="submit" class="btn btn-primary">Tambah</button>
      <button type="reset" class="btn btn-danger">Reset</button>
    </div>
  </div>

</form>

</div>
</div>