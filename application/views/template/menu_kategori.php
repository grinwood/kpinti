<div class="rmm style container">
  <ul>
    <li class='kat'><a href="#/"> <span class="glyphicon glyphicon-list"></span> Kategori</a> 
      <ul>
        <?php foreach ($daftar_kategori2 as $kategori) {
            echo "<li><a href='".site_url('produk/kategoriView/'.$kategori['id_kategori'])."'>".$kategori['nama_kategori']."</a>";
            echo "<ul>";
            foreach ($kategori['sub_categories'] as $sub1) {
              echo "<li><a href='".site_url('produk/kategoriView/'.$sub1['id_kategori'])."'>".$sub1['nama_kategori']."</a>";
              echo "<ul>";
              foreach ($sub1['sub_categories'] as $sub2) {
                  echo "<li><a href='".site_url('produk/kategoriView/'.$sub2['id_kategori'])."'>".$sub2['nama_kategori']."</a></li>";
              }
              echo "</ul>";
              echo "</li>";
            }
            echo "</ul></li>";
        }?>
      </ul>
    </li>
  </ul>
</div>