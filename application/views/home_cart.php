<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('assets/theme/bootstrap');?>/favicon.ico">

    <title>My Shopping Cart</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/theme/bootstrap');?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/theme/bootstrap');?>/dashboard.css" rel="stylesheet">
	<!---Notification--->
    <link href="<?php echo base_url('assets/theme/bootstrap');?>/notification.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url('assets/theme/bootstrap');?>/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url('assets/theme/bootstrap');?>/assets/js/ie10-viewport-bug-workaround.js"></script>

    <script src="<?php echo base_url('assets/theme/bootstrap');?>/js/jquery.min.js"></script>
	<script type="text/javascript">
		function loadCart()	{
			$('#jmlcart').load('<?php echo base_url(); ?>index.php/cart/total_cart/');
			$('#jmlcart2').load('<?php echo base_url(); ?>index.php/cart/show_cart/');
			$('#keranjang').load('<?php echo base_url(); ?>index.php/cart/show_cart/');
		}
		setInterval (loadCart, 5000);
	</script>
	
	<script type="text/javascript">
		var status = "";
		function tampilForm(frm){
			if(status=="")
			{
				$(frm).slideDown();
				status = "isi";
			}
			else
			{
				$(frm).slideUp();
				status = "";
			}
			
		}
		function tutupForm(frm){
			$(frm).slideUp();
			status = "";
		}
	</script>
  </head>
  <body>
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-send"></span> Shopping Cart</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
				<a href="#" data-toggle="modal" data-target="#troli" onclick="tampilForm('#keranjang')">
			  <span class="glyphicon glyphicon-shopping-cart"></span> Tampilkan Keranjang | <span id="jmlcart">0 Item</span>
				</a>
			</li>
          </ul>
      </div>
    </div>
	
	<div class="container">
		<hr>
		<!-- Modal Tampilkan keranjang-->
		<div class="modal fade" id="troli" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">
					<span class="glyphicon glyphicon-shopping-cart"></span> Keranjang Saya
				</h4>
			  </div>
			  <div class="modal-body">
				<p id="jmlcart2"></p><!--- Keranjang--->
			  </div>
			</div>
		  </div>
		</div>				
			
		<div class="row">
			<?php
				$no = 1;
				foreach($produk->result_array() as $h) {
			?>
			<script type="text/javascript">
				$(document).ready(function(){
					$("#myform-<?php echo $no; ?>").validate({
						debug: false,
						rules: {
							banyak: "required"
						},
						messages: {
							banyak: " error",
						},
						submitHandler: function(form) {
							// do other stuff for a valid form
							$.post('<?php echo base_url(); ?>index.php/cart/tambah', $("#myform-<?php echo $no; ?>").serialize(), function(data) {
								$('#hasil').html(data);
							});
						}
					});
				});
			</script>
			<form method="post" action="" id="myform-<?php echo $no;?>" name="myform-<?php echo $no;?>">
				<div class="col-xs-6 col-sm-4">
					<div class="thumbnail">
					  <img src="<?php echo base_url();?>timthumb.php?src=<?php echo base_url()."assets/uploads/produk";?>/<?php echo $h['img'];?>&w=100&h=100" alt="<?php echo $h['nama_barang'];?>" />
					  <div class="caption">
						<h3>
							<a href="#" data-toggle="modal" data-target="#more<?php echo $no;?>">
								<?php echo $h['nama_barang'];?>
							</a>
						</h3>
						<p><?php echo $h['deskripsi'];?></p>
						<p>
							<input type="hidden" name="kode_barang" value="<?php echo $h['kode_barang'];?>">
							<div class="input-group">
							<?php if($h['stok'] == '0' || $h['stok'] == ''){ ?>
								<input type="text" name="banyak" maxlength="2" class="form-control" disabled value="1" title="Jumlah Barang">
							  <span class="input-group-btn">
								<button type="submit" disabled class="btn btn-sm btn-danger" id="clickable<?php echo $no;?>">
									<span class="glyphicon glyphicon-shopping-cart"></span> Pesan
								</button>
							  </span>
							<?php } else { ?>
								<input type="text" name="banyak" maxlength="2" class="form-control" value="1" title="Jumlah Barang">
							  <span class="input-group-btn">
								<button type="submit" class="btn btn-sm btn-primary" id="clickable<?php echo $no;?>">
									<span class="glyphicon glyphicon-shopping-cart"></span> Pesan
								</button>
							  </span>
							  <script type="text/javascript">
								$(function(){		   
									$('#clickable<?php echo $no; ?>').click(function(){ 
										$.easyNotification('<div class="alert alert-success" role="alert"><h5><span class="glyphicon glyphicon-ok"></span> <b><?php echo $h['nama_barang']; ?></b> Berhasil Ditambahkan  ke dalam <span class="glyphicon glyphicon-shopping-cart"></span>.</h5></div>'); 
									})
								});
							</script>
							<?php } ?>
							</div>
						</p>
					  </div>
					</div>
				</div>
			</form>	

			<!-- Modal produk-->
			<div class="modal fade" id="more<?php echo $no;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">
						<span class="glyphicon glyphicon-play"></span> <?php echo $h['nama_barang'];?>
					</h4>
				  </div>
				  <div class="modal-body">
					<div class="row featurette">
						<div class="col-md-5">
						  <img src="<?php echo base_url();?>timthumb.php?src=<?php echo base_url()."assets/uploads/produk";?>/<?php echo $h['img'];?>&w=200&h=200" alt="<?php echo $h['nama_barang'];?>" />
						</div>
						<div class="col-md-7">
						  <h2 class="featurette-heading"><?php if($h['stok'] == '0' || $h['stok'] == ''){ echo "
<span class='label label-danger'>Habis</span>"; } else { echo "<span class='label label-success'>Tersedia</span>";}?></h2>
						  <p class="lead"><?php echo $h['deskripsi'];?></p>
						</div>
					</div>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>
			  </div>
			</div>	
				<?php
					$no++;
				}
				?>
          </div>
			<hr>
			<p align="right">Cekmyinfo &copy; 2014 - Created By, Cahya Dyazin
        </div>
      </div>
    </div>
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="<?php echo base_url('assets/theme/bootstrap');?>/js/easy.notification.js"></script>
	<script src="<?php echo base_url('assets/theme/bootstrap');?>/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/theme/bootstrap');?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/theme/bootstrap');?>/assets/js/docs.min.js"></script>
  </body>
</html>