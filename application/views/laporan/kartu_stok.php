<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<form class="form-inline" action="<?= base_url("Example/kartu_stok")?>" method="POST">
			  		<label class="col-sm-2 control-label">Nama Obat</label>
			  		<div class="col-sm-9">
                      	<div class="input-group">
                           	<select class="form-control coba" name="nm_obat" required="">
                           		<option value="">Pilih Obat</option>
                           		<?php foreach ($obat as $key => $data) { ?>
                           		<option value="<?= $data->nama_obat?>"><?= $data->nama_obat?></option>
                           		<?php } ?>
                           	</select>
                            <span class="input-group-btn">
                              	<button type="submit" class="btn btn-primary">Cari</button>
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
					<?php 
					$stok_akhir = 0;
					$subtotal = 0;
					foreach ($list as $key => $value) { ?>
						<?php 
						$stok_akhir = $value->jenis != "Penjualan" ? $stok_akhir += $value->jumlah : $stok_akhir -= $value->jumlah;
						$subtotal = $value->jenis != "Penjualan" ? $subtotal += $value->subtotal : $subtotal -= $value->subtotal;
						$harga = $value->jenis != "Penjualan" ? $harga = $value->harga_jual : $harga = $value->harga_jual; 
						?>
						<tr>
							<td><?= $value->created_at?></td>
							<td><?= $value->jenis?></td>
							<?php if ($value->jenis == "Pembelian") { ?>
								<td><?= $value->jumlah?></td>
								<td><?= $value->harga_jual?></td>
								<td>Rp. <?= number_format($value->subtotal)?></td>
								<td></td>
								<td></td>
								<td></td>
								<td><?= $stok_akhir?></td>
								<td><?= $harga?></td>
								<td>Rp. <?= number_format($subtotal)?></td>
							<?php } else if ($value->jenis == "Penjualan") { ?>
								<td></td>
								<td></td>
								<td></td>
								<td><?= $value->jumlah?></td>
								<td><?= $value->harga_jual?></td>
								<td>Rp. <?= number_format($value->subtotal)?></td>
								<td><?= $stok_akhir?></td>
								<td><?= $harga?></td>
								<td>Rp. <?= number_format($subtotal)?></td>
							<?php } else { ?>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td><?= $value->jumlah?></td>
								<td><?= $value->harga_jual?></td>
								<td>Rp. <?= number_format($value->subtotal)?></td>
							<?php } ?>
							<!-- <td><?= $stok_akhir?></td> -->
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
