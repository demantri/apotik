
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<form class="form-inline" action="<?= base_url("Example/jurnal")?>" method="POST">
			  		<label class="col-sm-2 control-label">Periode</label>
			  		<div class="col-sm-2">
                      	<div class="input-group">
                           	<input type="date" name="start" class="form-control" required="">
                      	</div>
                    </div>
                    <div class="col-sm-5">
                      	<div class="input-group">
                           	<input type="date" name="end" class="form-control" required="">
                            <span class="input-group-btn">
                              	<button type="submit" class="btn btn-primary">Filter</button>
                          	</span>
                      	</div>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2></h2>
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
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<!-- <th>No</th> -->
							<th>Tanggal Transaksi</th>
							<th>ID Invoice</th>
							<th>Keterangan</th>
							<th>Ref</th>
							<th>Debit</th>
							<th>Kredit</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$saldo_d = 0;
						$saldo_k = 0;
						foreach ($jurnal as $key => $value) { ?>
						<tr>
							<?php if ($value->posisi_dr_cr == 'd') { ?>
							<td><?= $value->tgl_input?></td>
							<td><?= $value->id_invoice?></td>
							<td><?= $value->nm_akun?></td>
							<td><?= $value->no_coa?></td>
							<td class="text-right">Rp. <?= number_format($value->nominal)?></td>
							<td></td>
							<?php $saldo_d += $value->nominal; ?>
							<?php } else { ?>
							<td></td>
							<td></td>
							<td class="text-right"><?= $value->nm_akun?></td>
							<td><?= $value->no_coa?></td>
							<td></td>
							<td class="text-right">Rp. <?= number_format($value->nominal)?></td>
							<?php $saldo_k += $value->nominal; ?>
							<?php } ?> 
						</tr>
						<?php } ?>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="4">Subtotal</th>
							<th class="text-right">Rp. <?= number_format($saldo_d)?></th>
							<th class="text-right">Rp. <?= number_format($saldo_k)?></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>


