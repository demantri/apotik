<?php foreach ($akun as $key => $value) { ?>
  <div class="modal fade" id="edit_<?= $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Akun</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('example/update_akun')?>" method="post">
          <div class="modal-body">

            <input type="hidden" name="id" value="<?= $value->id?>">

            <div class="form-group row">
              <label for="kd_akun" class="col-sm-2 col-form-label">Kode Akun</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="kd_akun" placeholder="Kode Akun" min="0" readonly="" value="<?= $value->kd_akun?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="nm_akun" class="col-sm-2 col-form-label">Nama Akun</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nm_akun" placeholder="Nama Akun" readonly="" value="<?= $value->nm_akun?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="saldo_awal" class="col-sm-2 col-form-label">Saldo Awal</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="saldo_awal" name="saldo_awal" placeholder="Saldo Awal" value="<?= $value->saldo_awal?>">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>