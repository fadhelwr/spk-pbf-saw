<?php error_reporting((E_ALL ^ (E_NOTICE | E_WARNING)));?>
<div class="row">
	<div class="col-sm-12">
		<h4 class="m-t-0 header-title"><?=$title;?></h4>

		<form method="post" class="form-waktu">	
			<div class="col-md-2" style="margin-bottom: 20px">
				<label for="">Bulan</label>
				<select class="form-control select2" name="id_c1">


					<option value="">November</option>

				</select>
			</div>

			<div class="col-md-2" style="margin-bottom: 20px">
				<label for="">Tahun</label>
				<select class="form-control select2" name="id_c1">


					<option value="">2018</option>

				</select>
			</div>
		</form>

		<div class="col-lg-12">
			<div class="panel panel-color panel-custom">
				<div class="panel-heading">
					<h3 class="panel-title">Penilaian Kualitatif</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive m-b-20">
						<table id="datatable" class="table table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Alternatif</th>
									<th>C1</th>
									<th>C2</th>
									<th>C3</th>
									<th>C4</th>
									<th>C5</th>
									<th>#</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no=1;
								foreach ($row as $data) { ?>
									<tr>
										<th><?=$data->id_nilai;?></th>
										<th><?=$data->nama;?></th>
										<td><?=$data->pilihan_kriteria;?></td>
										<td><?=$data->pilihan_c2;?></td>
										<td><?=$data->pilihan_c3;?></td>
										<td><?=$data->pilihan_c4;?></td>
										<td><?=$data->pilihan_c5;?></td>
										<td><a href="" class="btn btn-xs btn-rounded btn-primary" data-toggle="tooltip" data-placement="left" title="" data-original-title="Edit Review A<?=$no++;?>"><i class="fa fa-pencil"></i></a></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-12">
			<div class="panel panel-color panel-custom">
				<div class="panel-heading">
					<h3 class="panel-title">Rating Kecocokan</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive m-b-20">
						<table id="datatable-fixed-col" class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Alternatif</th>
									<th>C1</th>
									<th>C2</th>
									<th>C3</th>
									<th>C4</th>
									<th>C5</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($row as $data) {  

									$sumC1 = $sumC1 + $data->bobot_kriteria;
									$sumC2 = $sumC2 + $data->bobot_c2;
									$sumC3 = $sumC3 + $data->bobot_c3;
									$sumC4 = $sumC4 + $data->bobot_c4;
									$sumC5 = $sumC5 + $data->bobot_c5;

									?>
									<tr>
										<th>A<?=$data->id_nilai;?></th>
										<th><?=$data->nama;?></th>
										<td><?=$data->bobot_kriteria;?></td>
										<td><?=$data->bobot_c2;?></td>
										<td><?=$data->bobot_c3;?></td>
										<td><?=$data->bobot_c4;?></td>
										<td><?=$data->bobot_c5;?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>

						<table class="table table-striped">
							<tr>
								<th style="width: 48%">JUMLAH</th>
								<th style="width: 10%"><?=$sumC1;?></th>
								<th style="width: 10%"><?=$sumC2;?></th>
								<th style="width: 10%"><?=$sumC3;?></th>
								<th style="width: 10%"><?=$sumC4;?></th>
								<th style="width: 10%"><?=$sumC5;?></th>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-12">
			<div class="panel panel-color panel-custom">
				<div class="panel-heading">
					<h3 class="panel-title">Normalisasi dan Perangkingan</h3>
				</div>
				<div class="panel-body">

					<div class="table-responsive m-b-20">
						<div class="col-lg-8">
							<table id="datatable-keytable" class="table table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Alternatif</th>
										<th>C1</th>
										<th>C2</th>
										<th>C3</th>
										<th>C4</th>
										<th>C5</th>
										<th>Nilai</th>
										<th>Rank</th>
										<th>Saran</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($row as $data) {  

								$wC1	= 0.08; //Diskon
								$wC2	= 0.35; //Tempo Bayar
								$wC3	= 0.06; //Waktu Kirim
								$wC4	= 0.11; //Kemasan
								$wC5	= 0.41; //Expired Date

								//Normalisasi
								$normC1 = $data->bobot_kriteria/$sumC1;
								$normC2 = $data->bobot_c2/$sumC2;
								$normC3 = $data->bobot_c3/$sumC3;
								$normC4 = $data->bobot_c4/$sumC4;
								$normC5 = $data->bobot_c5/$sumC5;

								//Penghitungan Nilai
								$nilai 	= ($wC1 * $normC1) + ($wC2 * $normC2) + ($wC3 * $normC3) + ($wC4 * $normC4) + ($wC5 * $normC5);

								$saran ="";
								$rank ="";

								if ($nilai > 0.155) {
									$saran = "<span class='label label-custom'>Prioritas Disarankan</span>";
									$rank = "1";
									$saranRec = $data->nama;
									$nilaiRec = $nilai;
								}

								if ($nilai >= 0.150 && $nilai <= 0.155) {
									$saran = "<span class='label label-primary'>Baik</span>";
									$rank = "2";
									$saranRecB = $data->nama;
									$nilaiRecB = $nilai;
								}

								if ($nilai >= 0.140 && $nilai <= 0.1499) {
									$saran = "<span class='label label-primary'>Cukup Baik</span>";
									$rank = "3";
									$saranRecCB = $data->nama;
									$nilaiRecCB = $nilai;
								}


								if ($nilai >= 0.130 && $nilai <= 0.1399) {
									$saran = "<span class='label label-dark'>Kurang Baik</span>";
									$rank = "4";
									$saranRecKB = $data->nama;
									$nilaiRecKB = $nilai;
								}

								if ($nilai >= 0.120 && $nilai <= 0.1299) {
									$saran = "<span class='label label-warning'>Tidak Disarankan 1</span>";
									$rank = "5";
								}

								if ($nilai >= 0.010 && $nilai <= 0.1199) {
									$saran = "<span class='label label-warning'>Tidak Disarankan 2</span>";
									$rank = "6";
								}

								if ($nilai >= 0.090 && $nilai <= 0.099) {
									$saran = "<span class='label label-warning'>Tidak Disarankan 3</span>";
									$rank = "7";
								}

								if ($nilai >= 0.00 && $nilai <= 0.089) {
									$saran = "<span class='label label-danger'>Sangat Tidak Disarankan</span>";
									$rank = "8";
								}
								
								?>
								<tr>
									<th>V<?=$data->id_nilai;?></th>
									<th><?=$data->nama;?></th>
									<td><?=round($normC1, 4);?></td>
									<td><?=round($normC2, 4);?></td>
									<td><?=round($normC3, 4);?></td>
									<td><?=round($normC4, 4);?></td>
									<td><?=round($normC5, 4);?></td>
									<td><?=round($nilai, 4);?></td>
									<td><?=$rank;?></td>
									<td><?=$saran;?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>

				<div class="col-lg-4">
					<div class="panel panel-color panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Kesimpulan</h3>
						</div>
						<div class="panel-body">
							Dari hasil perhitungan rangking di atas, maka pemilihan supplier terbaik adalah 
							<?php if($saranRec != NULL) { ?>
							<b><?=$saranRec;?></b> dengan nilai <b><?=round($nilaiRec, 3); } ?></b>

							<?php if($saranRec == NULL && $saranRecB != NULL) { ?>
							<b><?=$saranRecB;?></b> dengan nilai <b><?=round($nilaiRecB, 3); } ?></b>

							<?php if($saranRec == NULL && $saranRecB == NULL) { ?>
							<b><?=$saranRecCB;?></b> dengan nilai <b><?=round($nilaiRecCB, 3); } ?></b>

							<?php if($saranRec == NULL && $saranRecB == NULL && $saranRecCB == NULL){ ?>
							<b><?=$saranRecKB;?></b> dengan nilai <b><?=round($nilaiRecKB, 3); } ?></b>
						</div>
					</div>
				</div>
			</div>
			</div>
			</div>
		</div>
</div>
</div>



