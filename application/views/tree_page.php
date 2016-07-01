<script type="text/javascript">
$(document).ready(function(){
    $('.tree-toggle').click(function () {
        $(this).parent().children('ul.tree').toggle(200);
    });
});
</script>
<div class="container " style="width:15%;float:left">
    <div class="row panel-heading">
        <h4 class="panel-title">Kategori</h4>
    </div>
    <div class="row panel-body">
      <div class="span3">
        <div class="">
            <div>
                <ul class="nav nav-list">
                    <?php foreach ($daftar_kategori2 as $kategori) {
                        echo "<li><label class='tree-toggle nav-header'><a href='".site_url('produk/cariByKategori/'.$kategori['id_kategori'])."'>".$kategori['nama_kategori']."</a></label>";
                        echo "<ul class='nav nav-list tree' style='margin-left:10px'>";
                        foreach ($kategori['sub_categories'] as $sub1) {
                                echo "<li><label class='tree-toggle nav-header'><a href='".site_url('produk/cariByKategori/'.$sub1['id_kategori'])."'>".$sub1['nama_kategori']."</a></label>";
                                echo "<ul class='nav nav-list tree' style='margin-left:20px'>";
                                foreach ($sub1['sub_categories'] as $sub2) {
                                    echo "<li><label class='tree-toggle nav-header'><a href='".site_url('produk/cariByKategori/'.$sub2['id_kategori'])."'>".$sub2['nama_kategori']."</a></label></li>";
                                }
                                echo "</ul>";
                            echo "</li>";
                        }
                        echo "</ul></li>";
                    }?>
                </ul>
            </div>
           </div>
        </div>
    </div>
</div>