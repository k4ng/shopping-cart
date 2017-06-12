<?php if(!$this->cart->contents()):
	echo 'Keranjang belanja masih kosong !';
else:
?>
	<div class="row">
		<div class="col-xs-12 col-sm-12">
          <div class="table-responsive">
		  <form method="POST" action="<?php echo site_url('cart/pesanSekarang');?>">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#Jumlah</th>
                  <th>#Nama Produk</th>
                  <th>#Harga per Satuan</th>
                  <th>#Sub Total Harga</th>
                </tr>
              </thead>
              	<tbody>
					<?php $i = 1; ?>
					<?php foreach($this->cart->contents() as $items): ?>
					
					<?php echo form_hidden('rowid[]', $items['rowid']); ?>
					<input type="hidden" name="IDpesanan[]" value="<?php echo rand(1,10000);?>">
					<tr <?php if($i&1){ echo 'class="alt"'; }?>>
						<td>
							<input type="text" name="qty[]" readonly size="1" value="<?php echo $items['qty']; ?>" style="border:0px;background:none;">
						</td>
						
						<td><input type="text" name="produk[]" readonly value="<?php echo $items['name'];?>" style="border:0px;background:none;"></td>
						
						<td>Rp. <?php echo $this->cart->format_number($items['price']); ?>
						<input type="hidden" name="harga_satuan[]" value="<?php echo $items['price'];?>"></td>
						<td>Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
					</tr>
					
					<?php $i++; ?>
					<?php endforeach; ?>
					
					<tr>
						<td colspan="3"><strong>Total</strong></td>
						<td>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></td>
					</tr>
				</tbody>
            </table>
				<button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-bookmark"></span> Pesan Sekarang</button>
				<?php echo anchor('cart/empty_cart', '<span class="glyphicon glyphicon-remove"></span> Kosongkan Keranjang');?>
		  </form>
          </div>
		</div>
	</div>
<?php 
endif;
?>



