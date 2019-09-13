<?php error_reporting((E_ALL ^ (E_NOTICE | E_WARNING)));?>
<div class="row">
	<div class="col-sm-12">
		<h4 class="m-t-0 header-title"><?=$title;?></h4>
		<?=$this->session->flashdata('pesan')?>

		<div class="col-lg-12">
			<div class="panel panel-color panel-custom">
				<div class="panel-heading">
					<h3 class="panel-title">Suppliier Terbaik <a href="<?=base_url();?>supplier/evaluasi-supplier" class="btn btn-xs btn-rounded btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Evaluasi"><i class="fa fa-plus"></i></a></h3>
				</div>
				<div class="panel-body">
					<table id="dataTables-example" class="table table-hover m-0">
						<thead>
							<tr>
								<th>Kode Nilai</th>
								<th>Nama Supplier</th>
								<th>Nilai</th>
								<th>Tanggal Nilai</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach ($laporan as $row) { ?>
							<tr>
								<td><?=$row->kode_nilai;?></td>
								<td><?=$row->nama;?></td>
								<td><?=$row->nilai;?></td>
								<td><?=Supplier::format($row->periode);?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>



