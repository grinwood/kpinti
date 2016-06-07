<html>
<head>
	<title>keranjang</title>
</head>
<body>
    <div class="container" >
        <h4> Daftar Keranjang </h4>
        <div class="panel panel-success">
            <div class="panel-body">
                <table class="table table-stripped">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Pemesanan</th>
                    <th>Total</th>
                </tr>
                <?php $i=1; foreach($daftar_keranjang as $keranjang) {?>
                <tr>
                    <td><?php echo $i++. "."; ?></td>
                    <td><?php echo $keranjang->barang_order; ?><br></td>
                    <td><?php echo $keranjang->jumlah_order; ?></td>
                    <td><?php echo "Rp. ".$keranjang->harga_order;?></td>
					<td>
					    <td><a href="<?php echo site_url('cart/deleteBarang/'.$keranjang->id_pemesanan);?>"><button class="btn btn-success">Hapus Barang</button></td>
					</td>
                </tr>
                <?php } ?>
            </table>
            </div>
        </div>  
    </div>
</body>
</html>