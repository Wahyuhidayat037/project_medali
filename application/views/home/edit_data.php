<div class="container-fluid">
	
	<h3><?php echo $title; ?></h3>
	<hr>
	<br>


	<form method="post" action="<?php echo base_url('Home/proses_edit_data') ?>">

    <input type="hidden" name="kontingen_id" value="<?php echo $kontingen['kontingen_id']; ?>">

  <div class="form-group row">
    <label for="kontingen_nama" class="col-sm-2 col-form-label">Kontingen</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="kontingen_nama" required="" id="kontingen_nama" value="<?php echo $kontingen['kontingen_nama']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="kontingen_manajer" class="col-sm-2 col-form-label">Manajer</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="kontingen_manajer" required="" id="kontingen_manajer" value="<?php echo $kontingen['kontingen_manajer']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="kontingen_ket" class="col-sm-2 col-form-label">Keterangan</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="kontingen_ket" required="" id="kontingen_ket" value="<?php echo $kontingen['kontingen_ket']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="alamat" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-5">
      <button type="submit" class="btn btn-primary">Ubah</button>
      <button type="reset" class="btn btn-danger">Reset</button>
    </div>
  </div>

</form>

</div>
</div>