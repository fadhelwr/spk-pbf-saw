<?php error_reporting((E_ALL ^ (E_NOTICE | E_WARNING)));?>
<div class="row">
	<div class="col-sm-12">
		<h4 class="m-t-0 header-title"><?=$title;?></h4>
		
		<div class="col-lg-6">
			<div class="panel panel-color panel-custom">
				<div class="panel-heading">
					<h3 class="panel-title">Diskon (C1) [Benefit]</h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover m-0">
						<thead>
							<tr>
								<th>No.</th>
								<th>Pilihan Kriteria</th>
								<th>Bobot</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ($c1 as $row) { ?>
							<tr>
								<th><?=$row->id_kriteria;?></th>
								<td><?=$row->pilihan_kriteria;?></td>
								<td><?=$row->bobot_kriteria;?></td>
								<td><?=$row->margin;?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="panel panel-color panel-custom">
				<div class="panel-heading">
					<h3 class="panel-title">Tempo Bayar (C2) [Cost]</h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover m-0">
						<thead>
							<tr>
								<th>No.</th>
								<th>Pilihan Kriteria</th>
								<th>Bobot</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ($c2 as $row) { ?>
							<tr>
								<th><?=$row->id_c2;?></th>
								<td><?=$row->pilihan_c2;?></td>
								<td><?=$row->bobot_c2;?></td>
								<td><?=$row->margin_c2;?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="panel panel-color panel-custom">
				<div class="panel-heading">
					<h3 class="panel-title">Waktu Kirim (C3) [Benefit]</h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover m-0">
						<thead>
							<tr>
								<th>No.</th>
								<th>Pilihan Kriteria</th>
								<th>Bobot</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ($c3 as $row) { ?>
							<tr>
								<th><?=$row->id_c3;?></th>
								<td><?=$row->pilihan_c3;?></td>
								<td><?=$row->bobot_c3;?></td>
								<td><?=$row->margin_c3;?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="panel panel-color panel-custom">
				<div class="panel-heading">
					<h3 class="panel-title">Kemasan (C4) [Benefit]</h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover m-0">
						<thead>
							<tr>
								<th>No.</th>
								<th>Pilihan Kriteria</th>
								<th>Bobot</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ($c4 as $row) { ?>
							<tr>
								<th><?=$row->id_c4;?></th>
								<td><?=$row->pilihan_c4;?></td>
								<td><?=$row->bobot_c4;?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="panel panel-color panel-custom">
				<div class="panel-heading">
					<h3 class="panel-title">Expired Date (C5) [Benefit]</h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover m-0">
						<thead>
							<tr>
								<th>No.</th>
								<th>Pilihan Kriteria</th>
								<th>Bobot</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ($c5 as $row) { ?>
							<tr>
								<th><?=$row->id_c5;?></th>
								<td><?=$row->pilihan_c5;?></td>
								<td><?=$row->bobot_c5;?></td>
								<td><?=$row->margin_c5;?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="panel panel-color panel-custom">
				<div class="panel-heading">
					<h3 class="panel-title">Harga (C6) [Cost]</h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover m-0">
						<thead>
							<tr>
								<th>No.</th>
								<th>Pilihan Kriteria</th>
								<th>Bobot</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ($c6 as $row) { ?>
							<tr>
								<th><?=$row->id_c6;?></th>
								<td><?=$row->pilihan_c6;?></td>
								<td><?=$row->bobot_c6;?></td>
								<td><?=$row->margin_c6;?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="panel panel-color panel-custom">
				<div class="panel-heading">
					<h3 class="panel-title">Ketersediaan (C7) [Benefit]</h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover m-0">
						<thead>
							<tr>
								<th>No.</th>
								<th>Pilihan Kriteria</th>
								<th>Bobot</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ($c7 as $row) { ?>
							<tr>
								<th><?=$row->id_c7;?></th>
								<td><?=$row->pilihan_c7;?></td>
								<td><?=$row->bobot_c7;?></td>
								<td><?=$row->margin_c7;?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="panel panel-color panel-custom">
				<div class="panel-heading">
					<h3 class="panel-title">Ketepatan Pesanan (C8) [Benefit]</h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover m-0">
						<thead>
							<tr>
								<th>No.</th>
								<th>Pilihan Kriteria</th>
								<th>Bobot</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ($c8 as $row) { ?>
							<tr>
								<th><?=$row->id_c8;?></th>
								<td><?=$row->pilihan_c8;?></td>
								<td><?=$row->bobot_c8;?></td>
								<td><?=$row->margin_c8;?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="panel panel-color panel-custom">
				<div class="panel-heading">
					<h3 class="panel-title">Kemudahan Pelayanan (C9) [Benefit]</h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover m-0">
						<thead>
							<tr>
								<th>No.</th>
								<th>Pilihan Kriteria</th>
								<th>Bobot</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ($c9 as $row) { ?>
							<tr>
								<th><?=$row->id_c9;?></th>
								<td><?=$row->pilihan_c9;?></td>
								<td><?=$row->bobot_c9;?></td>
								<td><?=$row->margin_c9;?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="panel panel-color panel-custom">
				<div class="panel-heading">
					<h3 class="panel-title">Legalitas (C10) [Benefit]</h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover m-0">
						<thead>
							<tr>
								<th>No.</th>
								<th>Pilihan Kriteria</th>
								<th>Bobot</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ($c10 as $row) { ?>
							<tr>
								<th><?=$row->id_c10;?></th>
								<td><?=$row->pilihan_c10;?></td>
								<td><?=$row->bobot_c10;?></td>
								<td><?=$row->margin_c10;?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>



