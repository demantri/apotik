<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<form class="form-inline" action="<?= base_url("Example/kartu_stok")?>" method="POST">
			  		<label class="col-sm-1 control-label">Nama Obat</label>
			  		<div class="col-sm-2">
                      	<div class="input-group">
                           	<select class="form-control coba" name="nm_obat" required="">
                           		<option value="">Pilih Obat</option>
                           		<?php foreach ($obat as $key => $data) { ?>
                           		<option value="<?= $data->nama_obat?>"><?= $data->nama_obat?></option>
                           		<?php } ?>
                           	</select>
                      </div>
                    </div>
					<label class="col-sm-1 control-label">Periode</label>
                    <div class="col-sm-3">
                      	<div class="input-group">
                           	<input type="month" name="month" class="form-control" required="">
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
				<h2>Nama Obat : <?= $nm_obat?></h2>
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
							<th rowspan="2" class="text-center">Tanggal</th>
							<th rowspan="2" class="text-center">Keterangan</th>
							<th colspan="3" class="text-center">Masuk</th>
							<th colspan="3" class="text-center">Keluar</th>
							<th colspan="3" class="text-center">Saldo</th>
						</tr>
						<tr>
                            <th class="text-center">Unit</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Jumlah</th>
							<th class="text-center">Unit</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Jumlah</th>
							<th class="text-center">Unit</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Jumlah</th>
                        </tr>
					</thead>
					<tbody>
						<?php foreach ($list as $key => $value) { ?>
							<?php $ket = substr($value->no_trans, 0, 3) == 'PNJ' ? 'Penjualan' : 'Pembelian' ?>
							<tr>
								<td><?= $value->tgl_trans?></td>
								<td><?= $ket?></td>
								<td><?= $value->unit1?></td>
								<td class="text-right">Rp. <?= $value->harga1 != '-' ? number_format($value->harga1) : '-'; ?></td>
								<td class="text-right">Rp. <?= $value->total1 != '-' ? number_format($value->total1) : '-'; ?></td>
								<td><?= $value->unit2?></td>
								<td class="text-right">Rp. <?= $value->harga2 != '-' ? number_format($value->harga2) : '-';?></td>
								<td class="text-right">Rp. <?= $value->total2 != '-' ? number_format($value->total2) : '-';?></td>
								<td><?= $value->unit3?></td>
								<td class="text-right">Rp. <?= number_format($value->harga3)?></td>
								<td class="text-right">Rp. <?= number_format($value->total3)?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
