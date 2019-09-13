<?php error_reporting((E_ALL ^ (E_NOTICE | E_WARNING)));?>
<div class="row">
	<div class="col-sm-12">
		<h4 class="m-t-0 header-title"><?=$title;?></h4>

		<form method="post" class="form-waktu">	
			<div class="col-md-2" style="margin-bottom: 20px">
				<label for="">Bulan / Tahun</label>
				<div class="input-group">
					<span class="input-group-addon bg-custom b-0"><i class="fa fa-calendar fa-fw"></i></span>
					<input type="month" id="vtahun" class="form-control">
				</div><!-- input-group -->
			</div>

			<div class="col-md-1" style="margin-left: 55px;">
				<label for="">&nbsp;</label>
				<button id="tampil" class="btn btn-primary form-control tampil" type="button"><i class="fa fa-search fa-fw"></i></button>
			</div>
		</form>

		<div class="tampil_transaksi"></div>
</div>
</div>

<script>
   $(function(){
    $("#tampil").click(function(){
       var vtahun = $("#vtahun").val();
       $.ajax({
          url:"<?php echo site_url('supplier/tampil_transaksi');?>",
          type:"POST",
          data:"vtahun="+vtahun,
          cache:false,
          success:function(html){
          $(".tampil_transaksi").html(html);
          }
       })
        })
     
   })
</script>

<!--$('#example-problem').on('click', '.btn-details', function(){ -->





