<div class="header">
	<ul class="list-kategori">
        <?php foreach($daftar_kategori as $_kategori){
            echo "<li><a href>"; echo $_kategori->nama_kategori; echo "</a></li>";
        } ?>
    </ul>
</div>