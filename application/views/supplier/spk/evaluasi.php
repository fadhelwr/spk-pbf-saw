<div class="row">
<?php
	$tanggal = date('Y-m-d');
    $Pecah = explode( "-", $tanggal );

    for ( $i = 0; $i < count( $Pecah ); $i++ ) {
        $Pecah[$i];
        $thn = $Pecah[0];
        $bln = $Pecah[1];
        $tgl = $Pecah[2];
    }

    $sql= "SELECT * FROM tb_nilai_supplier
           WHERE month(tgl_nilai)='$bln'
           AND year(tgl_nilai)='$thn'";

           $kueri = $this->db->query($sql);
           //if ($kueri->num_rows() < 1) {
           if ($kueri->num_rows() > 0) {

?>

<h4 class="m-t-0 header-title">Penilaian Ditutup</h4>

<div class="alert alert-danger alert-dismissible fade in" role="alert">
	<strong>Ditutup!</strong> Evaluasi Supplier akan dibuka kembali bulan berikutnya.
</div>

<?php
}
	//if ($kueri->num_rows() > 0) {
	if ($kueri->num_rows() < 1) { ?>
	
	<div class="col-sm-12">
		<h4 class="m-t-0 header-title"><?=$title;?></h4>
	<form id="form_validation" method="POST" class="form-spk">

		<div class="alert alert-danger alert-dismissible fade in" role="alert">
			<strong>PERHATIAN!</strong> Simpan hasil kesimpulan pilihan dengan cara klik tombol <span class="label label-primary">Simpan</span> dibagian paling bawah pada halaman ini setelah penghitungan selesai.
		</div>

		<div class="col-md-2">
			<label for="">Kode Nilai</label>
			<input type="text" class="form-control" value="<?=$kodenilai;?>" name="kode" readonly="" required/>
		</div>

		<div class="col-md-10">
			<label for="">Supplier</label>
			<select class="form-control select2" name="kode_supplier">
				<?php foreach ($query as $row) { ?>

					<option value="<?=$row->kode_supplier;?>"><?=$row->nama;?> </option>

				<?php }?>
			</select>
		</div>

		<div class="col-md-2" style="margin-top: 20px">
			<label for="">Diskon</label>
			<select class="form-control select2" name="id_c1">
				<?php foreach ($c1 as $row) { ?>

					<option value="<?=$row->id_kriteria;?>"><?=$row->margin;?> </option>

				<?php }?>
			</select>
		</div>

		<div class="col-md-2" style="margin-top: 20px">
			<label for="">Tempo Bayar</label>
			<select class="form-control select2" name="id_c2">
				<?php foreach ($c2 as $row) { ?>

					<option value="<?=$row->id_c2;?>"><?=$row->margin_c2;?> </option>

				<?php }?>
			</select>
		</div>

		<div class="col-md-2" style="margin-top: 20px">
			<label for="">Waktu Kirim</label>
			<select class="form-control select2" name="id_c3">
				<?php foreach ($c3 as $row) { ?>

					<option value="<?=$row->id_c3;?>"><?=$row->margin_c3;?> </option>

				<?php }?>
			</select>
		</div>

		<div class="col-md-2" style="margin-top: 20px">
			<label for="">Kemasan</label>
			<select class="form-control select2" name="id_c4">
				<?php foreach ($c4 as $row) { ?>

					<option value="<?=$row->id_c4;?>"><?=$row->pilihan_c4;?> </option>

				<?php }?>
			</select>
		</div>

		<div class="col-md-2" style="margin-top: 20px">
			<label for="">Expired Date</label>
			<select class="form-control select2" name="id_c5">
				<?php foreach ($c5 as $row) { ?>

					<option value="<?=$row->id_c5;?>"><?=$row->margin_c5;?> </option>

				<?php }?>
			</select>
		</div>

		<div class="col-md-2" style="margin-top: 20px">
			<label for="">Harga</label>
			<select class="form-control select2" name="id_c6">
				<?php foreach ($c6 as $row) { ?>

					<option value="<?=$row->id_c6;?>"><?=$row->pilihan_c6;?> </option>

				<?php }?>
			</select>
		</div>

		<div class="col-md-2" style="margin-top: 20px">
			<label for="">Ketersediaan</label>
			<select class="form-control select2" name="id_c7">
				<?php foreach ($c7 as $row) { ?>

					<option value="<?=$row->id_c7;?>"><?=$row->pilihan_c7;?> </option>

				<?php }?>
			</select>
		</div>

		<div class="col-md-2" style="margin-top: 20px">
			<label for="">Ketepatan Pesanan</label>
			<select class="form-control select2" name="id_c8">
				<?php foreach ($c8 as $row) { ?>

					<option value="<?=$row->id_c8;?>"><?=$row->pilihan_c8;?> </option>

				<?php }?>
			</select>
		</div>

		<div class="col-md-4" style="margin-top: 20px">
			<label for="">Kemudahan Pelayanan</label>
			<select class="form-control select2" name="id_c9">
				<?php foreach ($c9 as $row) { ?>

					<option value="<?=$row->id_c9;?>"><?=$row->pilihan_c9;?> </option>

				<?php }?>
			</select>
		</div>

		<div class="col-md-2" style="margin-top: 20px">
			<label for="">Legalitas</label>
			<select class="form-control select2" name="id_c10">
				<?php foreach ($c10 as $row) { ?>

					<option value="<?=$row->id_c10;?>"><?=$row->pilihan_c10;?> </option>

				<?php }?>
			</select>
		</div>

		<div class="col-md-2" style="margin-top: 20px">
			<label for="">&nbsp;</label>
			<a class="form-control btn btn-primary tambahkan">Tambahkan</a>
		</div> 
	</form>

	<div class="tampildata"></div>
		
		
	</div>
	<?php }?>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(".tambahkan").click(function(){
			var data = $('.form-spk').serialize();
			$.ajax({
				type: 'POST',
				url: "<?=base_url();?>supplier/simpan-evaluasi/?kode=<?=$kodenilai;?>",
				data: data,
				success: function() {
					$('.tampildata').load("<?=base_url();?>supplier/tampilnilai/?kode=<?=$kodenilai;?>");
				}
			});
		});
	});
</script>



