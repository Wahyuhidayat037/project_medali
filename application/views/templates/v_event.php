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
        <?php echo $this->session->flashdata('pesan'); ?>

        <div class="dropdown float-left margin-right">
          <button class="btn btn-primary dropdown-toggle mb-3" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            <?php 
            foreach ($cabordata as $cbr) :
              if ($cbr['cabor_id']==$cabor_id): 

                echo $cbr['cabor_nama'];

              endif;

            endforeach;
            if ($cabor_id==0) :

              echo 'Semua Cabor';
            endif;
            ?>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?php echo base_url('Home/v_event/0'); ?>">Semua Cabor</a>
            <?php foreach ($cabordata as $cbr) : ?>
              <a class="dropdown-item" href="<?php echo base_url('Home/v_event/'.$cbr['cabor_id']); ?>"><?= $cbr['cabor_nama'] ?></a>

            <?php endforeach ?>

          </div>
        </div>

        <div class="table-responsive">
          <table class="table table-bordered table-striped text-center" id="" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Event</th>  
                <th>Medali</th>

                <th style="width: 125px;">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;

              $last_cabor=0;
              foreach ($cabordata as $cbr) :
                if ($cabor_id == $cbr['cabor_id'] or $cabor_id==0) :
                  // if ($cabor_nama == $cbr['cabor_nama'] or $cabor_nama==0) :
                  ?>
                  <tr>

                    <td class="text-left" colspan="3"><?php echo $cbr['cabor_nama']; ?></td>

                    <td colspan=""><a href="<?php echo base_url('Home/tambah_event/'.$cbr['cabor_id']); ?>" class="badge badge-info"><i class="fa fa-plus"></i></a></td>
                  </tr>
                 

                      <?php 

                      foreach ($event as $mdl) :

                        if ($mdl['cabor_id']==$cbr['cabor_id']) :
                        ?>
                      
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $mdl['event_nama']; ?></td>
                       
                        <td>
                    <?php 

                     $medalievent = $this->M_model->medalievent($mdl['event_id']);
                     foreach ($medalievent as $me):
                      ?>
                      <badge style="color: <?= $me['medali_img'] ?>;" title="<?= $me['kontingen_nama'] ?>"><i class="fas fa-medal"></i></badge>
                    <?php endforeach;
                     ?>
                   </td>
                   <td>
                          <a href="<?php echo base_url() ?>Home/detail_event/<?php echo $mdl['event_id']; ?>" class="badge badge-warning"><i class="fas fa-info"></i></a>
                          
                          <a href="<?php echo base_url() ?>Home/edit_event/<?php echo $mdl['event_id']; ?>" class="badge badge-primary"><i class="fas fa-edit"></i></a>

                          <a href="<?php echo base_url() ?>Home/hapus_event/<?php echo $mdl['event_id']; ?>" class="badge badge-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>

                      </tr>
                      <?php 
                      $last_cabor= $mdl['cabor_id'];
                        
                    endif;
                  endforeach; 
                endif;
              endforeach;  
              ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>

</div>