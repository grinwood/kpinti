<?php $this->load->view('akun_page');?>
    <div class="contentmenu">
        <div id="barang-content">
            <table>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Jumlah Barang</th>
                <th>Deskripsi Barang</th>
                <?php foreach($produk as $_produk){
                    echo "<tr>";
                    echo "<td><img class='img-prod' src='".base_url('uploads/'.$_produk->nama_gbr)."' onerror='this.src='http://kpinti.hol.es/asset/images/noimage.png''></td>";
                    echo "<td>".$_produk->nama."</td>";
                    echo "<td>".$_produk->harga."</td>";
                    echo "<td>".$_produk->jumlah."</td>";
                    echo "<td>".$_produk->deskripsi."</td>";
                    echo "</tr>";
                }?>
            </table>
        </div>
    </div>
</div>