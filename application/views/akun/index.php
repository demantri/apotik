<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Lihat Akun</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix">
				</div>
			</div>

			<div class="x_content">
				<?php if($this->session->flashdata('akun_added')): ?>
                  <button id="melinda" style="display: none;" class="btn btn-default source" onclick="new PNotify({
                                  title: 'Berhasil',
                                  text: '<?php echo $this->session->flashdata('akun_added'); ?>',
                                  type: 'success',
                                  hide: false,
                                  styling: 'bootstrap3'
                              });">Success</button>
                 	</div>
                 	
				<?php endif; ?>
				<?php if ($this->session->userdata('level') == 2) { ?>
				<a href="<?php echo base_url('example/add_akun') ?>"><button type="button" class="btn btn-success" style="margin-bottom: 13px"><span class="fa fa-plus"></span> Tambah Akun </button></a>
				<?php } ?>
				<table id="datatable-buttons" class="table table-striped table-bordered">
					<thead>
						<tr>
							<!-- <th>No</th> -->
							<th>Kode Akun</th>
							<th>Nama Akun</th>
							<th class="text-center">Saldo Awal</th>
							<!-- <th></th> -->
						</tr>
					</thead>
					<tbody>
					<?php
						// $no = 1;
						foreach ($akun as $key => $value) { ?>
						<tr>
							<!-- <td><?= $no++?></td> -->
							<td><?= $value->kd_akun?></td>
							<td><?= $value->nm_akun?></td>
							<td class="text-right">Rp. <?= number_format($value->saldo_awal)?></td>
							<!-- <td class="text-center">
								<a href="" data-target="#edit_<?= $value->id?>" data-toggle="modal" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Edit data</a>
							</td> -->
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('akun/modal')?>


