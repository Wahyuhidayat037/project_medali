<div class="container-fluid">
	
	<h3><?php echo $title; ?></h3>
	<hr>
	<br>


	<form method="post" action="<?php echo base_url('Home/proses_tambah_event/'.$cabor_id) ?>">

  <div class="form-group row">
    <label for="event_nama" class="col-sm-2 col-form-label">Event</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="event_nama" required="" id="event_nama" autofocus="autofocus">
    </div>
  </div>

  <div class="form-group row">
    <label for="cabor_id" class="col-sm-2 col-form-label">ID Cabor</label>
    <div class="col-sm-5">
      <select name="cabor_id" class="form-control" id="cabor_id">
          <option value="">- Pilih -</option>
          <?php foreach ($event as $evt): ?>
            <option value="<?php echo $evt['cabor_id']; ?>"
              <?php if ($cabor_id== $evt['cabor_id']): ?>
               selected 
              <?php endif ?>
              ><?php echo $evt['cabor_nama']; ?></option>
          <?php endforeach ?>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="event_start" class="col-sm-2 col-form-label">Tanggal Mulai</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" name="event_start" required="" id="event_start">
    </div>
  </div>

  <div class="form-group row">
    <label for="event_end" class="col-sm-2 col-form-label">Tanggal Selesai</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" name="event_end" required="" id="event_end">
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