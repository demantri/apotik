<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<form class="form-inline" action="<?= base_url("Example/bukubesar")?>" method="POST">
			  		<label class="col-sm-2 control-label">Periode</label>
			  		<div class="col-sm-2">
                      	<div class="input-group">
                           	<select name="no_coa" class="form-control coba" required="">
                           	<option value="">-</option>
                           	<?php foreach ($akun as $key => $a) { ?>
                           	<option value="<?= $a->kd_akun?>"><?= $a->nm_akun?></option>
                           	<?php } ?>
                           	</select>
                      	</div>
                    </div>
                    <div class="col-sm-5">
                      	<div class="input-group">
                           	<input type="month" class="form-control" name="periode" id="date" required="" >
                            <span class="input-group-btn">
                              	<button type="submit" id="btnSubmit" class="btn btn-primary">Filter</button>
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

			<div>
				<center>
					<h3>Buku Besar</h3>
					<h5>Periode <?= $periode ?></h5>
				</center>
			</div>

			<div class="x_content">
				<table class="table table-bordered">
					<tr>
						<th>Nama Akun&nbsp; : &nbsp;<?= $nm_akun?> </th>
						<th>No Akun&nbsp; : &nbsp;<?= $kd_akun?> </th>
					</tr>
				</table>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<!-- <th>No</th> -->
							<th>Keterangan</th>
							<th>Tanggal Transaksi</th>
							<th>Debit</th>
							<th>Kredit</th>
							<th>Saldo</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$saldo_awal = $saldo_awal->debit - $saldo_awal->kredit;
						// if ($saldo_awal->debit > $saldo_awal->kredit) {
						// 	$saldo_awal = $saldo_awal->debit - $saldo_awal->kredit;
						// } else {
						// 	$saldo_awal = $saldo_awal->kredit - $saldo_awal->debit;
						// }
					?>
					<tr>
						<td colspan="4"><b>Saldo Awal</b></td>
						<td class="text-right">Rp. <?= number_format($saldo_awal)?></td>
					</tr>
					<?php
					foreach ($list as $key => $value) { ?>
						<tr>
							<td><?= $value->id_invoice?></td>
							<td><?= $value->tgl_input?></td>
							<?php if ($value->posisi_dr_cr =='d') { ?>
								<?php if ($value->header_akun == 1 OR $value->header_akun == 5 OR $value->header_akun == 6 ) { ?>
									<?php $saldo_awal = $saldo_awal + $value->nominal; ?>
								<?php } else { ?>
									<?php $saldo_awal = $saldo_awal - $value->nominal; ?>
								<?php } ?>
								<td class="text-right">Rp. <?= number_format($value->nominal)?></td>
								<td></td>
							<?php } else { ?>
								<?php if ($value->header_akun == 1 OR $value->header_akun == 5 OR $value->header_akun == 6 ) { ?>
									<?php $saldo_awal = $saldo_awal - $value->nominal; ?>
								<?php } else { ?>
									<?php $saldo_awal = $saldo_awal + $value->nominal; ?>
							<?php } ?>
							<td></td>
							<td class="text-right">Rp. <?= number_format($value->nominal)?></td>
							<?php }?>
							<td class="text-right">Rp. <?= number_format($saldo_awal)?></td>
						</tr>
					<?php } ?>
					<tr>
						<td colspan="4"><b>Saldo Akhir</b></td>
						<td class="text-right">Rp. <?= number_format($saldo_awal)?></td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
