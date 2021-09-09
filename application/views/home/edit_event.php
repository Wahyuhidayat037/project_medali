<div class="container-fluid">
	
	<h3><?php echo $title; ?></h3>
	<hr>
	<br>


	<form method="post" action="<?php echo base_url('Home/proses_edit_event') ?>">

    <input type="hidden" name="event_id" value="<?php echo $event['event_id']; ?>">

  <div class="form-group row">
    <label for="event_nama" class="col-sm-2 col-form-label">Event</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="event_nama" required="" id="event_nama" value="<?php echo $event['event_nama']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="event_start" class="col-sm-2 col-form-label">Tanggal Mulai</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" name="event_start" required="" id="event_start" value="<?php echo $event['event_start']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="event_end" class="col-sm-2 col-form-label">Tanggal Selesai</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" name="event_end" required="" id="event_end" value="<?php echo $event['event_end']; ?>">
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