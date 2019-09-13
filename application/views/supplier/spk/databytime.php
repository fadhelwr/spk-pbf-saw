<?php error_reporting((E_ALL ^ (E_NOTICE | E_WARNING)));?>
<div class="col-lg-12">
	<div class="panel panel-color panel-custom">
		<div class="panel-heading">
			<h3 class="panel-title">Penilaian Kualitatif</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive m-b-20" style="overflow-x:auto;overflow-y:auto;height:350px;">
				<table class="table table-hover">
					<thead>
						<tr>
						<th width="10">No.</th>
						<th>Nama Supplier</th>
						<th>Diskon</th>
						<th>Tempo Bayar</th>
						<th>Waktu Kirim</th>
						<th>Kemasan</th>
						<th>Expired date</th>
						<th>Harga</th>
						<th>Ketersediaan</th>
						<th>Ketepatan Pesanan</th>
						<th>Kemudahan Pelayanan</th>
						<th>Legalitas</th>
					</tr>
					</thead>
					<tbody>
						<?php
						$nom=1;
						foreach ($row as $data) { ?>
							<tr>
								<td><?=$nom++;?></td>
								<td><?=$data->nama;?></td>
								<td><?=$data->pilihan_kriteria;?></td>
								<td><?=$data->pilihan_c2;?></td>
								<td><?=$data->pilihan_c3;?></td>
								<td><?=$data->pilihan_c4;?></td>
								<td><?=$data->pilihan_c5;?></td>
								<td><?=$data->pilihan_c6;?></td>
								<td><?=$data->pilihan_c7;?></td>
								<td><?=$data->pilihan_c8;?></td>
								<td><?=$data->pilihan_c9;?></td>
								<td><?=$data->pilihan_c10;?></td>
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
			<div class="table-responsive m-b-20" style="overflow-x:auto;overflow-y:auto;height:350px;">
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
							<th>C6</th>
							<th>C7</th>
							<th>C8</th>
							<th>C9</th>
							<th>C10</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$noo =1;
						foreach ($row as $data) {  

							$sumC1 = $sumC1 + $row->bobot_kriteria;
							$sumC2 = $sumC2 + $row->bobot_c2;
							$sumC3 = $sumC3 + $row->bobot_c3;
							$sumC4 = $sumC4 + $row->bobot_c4;
							$sumC5 = $sumC5 + $row->bobot_c5;
							$sumC6 = $sumC6 + $row->bobot_c6;
							$sumC7 = $sumC7 + $row->bobot_c7;
							$sumC8 = $sumC8 + $row->bobot_c8;
							$sumC9 = $sumC9 + $row->bobot_c9;
							$sumC10= $sumC10+ $row->bobot_c10;

							?>
							<tr>
								<th>A<?=$noo++;?></th>
								<th style="width: 40%"><?=$data->nama;?></th>
								<td><?=$data->bobot_kriteria;?></td>
								<td><?=$data->bobot_c2;?></td>
								<td><?=$data->bobot_c3;?></td>
								<td><?=$data->bobot_c4;?></td>
								<td><?=$data->bobot_c5;?></td>
								<td><?=$data->bobot_c6;?></td>
								<td><?=$data->bobot_c7;?></td>
								<td><?=$data->bobot_c8;?></td>
								<td><?=$data->bobot_c9;?></td>
								<td><?=$data->bobot_c10;?></td>
							</tr>


						<?php } ?>
					</tbody>
				</table>

				
			</div>

			<table class="table table-striped">
					<tr>
						<th>#</th>
						<th style="width: 41%">R<sub>ij</sub> (Max<sub>i</sub> dan Min<sub>i</sub>)</th>
						<th><?=$maxnilai->satu;?></th>
						<th><?=$maxnilai->dua;?></th>
						<th><?=$maxnilai->tiga;?></th>
						<th><?=$maxnilai->empat;?></th>
						<th><?=$maxnilai->lima;?></th>
						<th><?=$maxnilai->enam;?></th>
						<th><?=$maxnilai->tujuh;?></th>
						<th><?=$maxnilai->delapan;?></th>
						<th><?=$maxnilai->sembilan;?></th>
						<th><?=$maxnilai->sepuluh;?></th>

						<?php

						$bobot1 = $maxnilai->satu;
						$bobot2 = $maxnilai->dua;
						$bobot3 = $maxnilai->tiga;
						$bobot4 = $maxnilai->empat;
						$bobot5 = $maxnilai->lima;
						$bobot6 = $maxnilai->enam;
						$bobot7 = $maxnilai->tujuh;
						$bobot8 = $maxnilai->delapan;
						$bobot9 = $maxnilai->sembilan;
						$bobot10= $maxnilai->sepuluh;

						?>

					</tr>
				</table>
		</div>
	</div>
</div>

<div class="col-lg-12">
	<div class="panel panel-color panel-custom">
		<div class="panel-heading">
			<h3 class="panel-title">Normalisasi dan Perangkingan</h3>
		</div>
		<div class="panel-body">

			<div class="table-responsive m-b-20" style="overflow-x:auto;overflow-y:auto;height:350px;">
				<div class="col-lg-12">
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
								<th>C6</th>
								<th>C7</th>
								<th>C8</th>
								<th>C9</th>
								<th>C10</th>
								<th>Nilai</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$noom =1;
							foreach ($row as $data) {  

								$wC1	= 0.08; //Diskon
								$wC2	= 0.11; //Tempo Bayar
								$wC3	= 0.02; //Waktu Kirim
								$wC4	= 0.08; //Kemasan
								$wC5	= 0.23; //Expired Date
								$wC6	= 0.08; //Harga
								$wC7	= 0.07; //Ketersediaan
								$wC8	= 0.12; //Ketepatan Pesanan
								$wC9	= 0.06; //Kemudahan Pelayanan
								$wC10	= 0.16; //Legalitas

								//Normalisasi
								$normC1 = $data->bobot_kriteria/$bobot1;
								$normC2 = $bobot2/$data->bobot_c2;
								$normC3 = $data->bobot_c3/$bobot3;
								$normC4 = $data->bobot_c4/$bobot4;
								$normC5 = $data->bobot_c5/$bobot5;
								$normC6 = $bobot6/$data->bobot_c6;
								$normC7 = $data->bobot_c7/$bobot7;
								$normC8 = $data->bobot_c8/$bobot8;
								$normC9 = $data->bobot_c9/$bobot9;
								$normC10= $data->bobot_c10/$bobot10;

								//Penghitungan Nilai
								$nilai 	= ($wC1 * $normC1) + ($wC2 * $normC2) + ($wC3 * $normC3) + ($wC4 * $normC4) + ($wC5 * $normC5) + ($wC6 * $normC6) + ($wC7 * $normC7) + ($wC8 * $normC8) + ($wC9 * $normC9) + ($wC10 * $normC10);

								$arN = array($nilai);
								foreach ($arN as $key => $value) {
								   if ($value >= $max) { 
								        $max = max($arN);
								        $supp = $data->nama;  }        
								}

								?>
								<tr>
									<th>V<?=$noom++;?></th>
									<th><?=$data->nama;?></th>
									<td><?=round($normC1, 2);?></td>
									<td><?=round($normC2, 2);?></td>
									<td><?=round($normC3, 2);?></td>
									<td><?=round($normC4, 2);?></td>
									<td><?=round($normC5, 2);?></td>
									<td><?=round($normC6, 2);?></td>
									<td><?=round($normC7, 2);?></td>
									<td><?=round($normC8, 2);?></td>
									<td><?=round($normC9, 2);?></td>
									<td><?=round($normC10, 2);?></td>
									<td><?=round($nilai, 2);?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="panel panel-color panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Kesimpulan</h3>
					</div>
					<div class="panel-body">
						<h4>Dari hasil perhitungan rangking di atas, maka pemilihan supplier terbaik adalah <b><u><?=$supp;?></b></u>.</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>