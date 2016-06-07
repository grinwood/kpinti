<div class="dropdown-kategori">
    <ul class="list-kategori">
        <?php foreach($daftar_kategori as $kategori){?>
            <li>
                <a href="<?php echo site_url('produk/kategoriView/'.$kategori->id_kategori);?>">
                <?php echo $kategori->nama_kategori; ?></a>
            </li>
        <?php } ?>
    </ul>
</div>