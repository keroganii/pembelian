<?php
include 'proses/koneksi.php';
if(isset($_GET['id'])){
    $sql=mysqli_query($conn,"SELECT * FROM bahan where id_bahan='$_GET[id]'"); 
    $row=mysqli_fetch_array($sql);
    $nama=$row['nama_bahan'];
    $stok=$row['stok'];
    $satuan=$row['satuan'];
    $link='proses/editbahan.php';
    $id=$_GET['id'];
    $id_kat=$row['id_kat'];
}else{
    $nama='';
    $stok='';
    $satuan='';
    $link='proses/addbahan.php';
    $id="";
    $id_kat="";
}

?>

<div class="content">

    <!-- Form horizontal -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Tambah Data Bahan
                <a class="heading-elements-toggle">
                    <i class="icon-more"></i>
                </a>
            </h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li>
                        <a data-action="collapse"></a>
                    </li>
                    <li>
                        <a data-action="reload"></a>
                    </li>
                    <li>
                        <a data-action="close"></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="<?php echo $link ?>" enctype="multipart/form-data">
                <fieldset class="content-group">
                <input type="text" name="id" value="<?php echo $id ?>" hidden>
                
                    <div class="form-group">
                        <label class="control-label col-lg-2">Nama Bahan</label>
                        <div class="col-lg-9">
                            <input type="text" value='<?php echo $nama ?>' name="nama" class="form-control" required>
                        </div>
                    </div>
                    
                <div class="form-group">
                        <label class="control-label col-lg-2" >Satuan</label>
                        <div class="col-lg-1">
                        <input type="text" name="satuan" value="<?php echo $nama ?>" class="form-control" placeholder="cm">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Stok</label>
                        <div class="col-sm-2">
                            <input id="spinner-basic" value='<?php echo $stok ?>'  name="stok" class="form-control" min="0" value="0" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Kategori Bahan</label>
                        <div class="col-sm-2">
                            <select name="kat" class="form-control">
                                <option <?php if($id_kat=='1'){echo "selected";} ?> value="1">Kain</option>
                                <option <?php if($id_kat=='2'){echo "selected";} ?> value="2">Zipper</option>
                                <option <?php if($id_kat=='3'){echo "selected";} ?> value="3">Foam</option>
                                
                            </select>
                        </div>
                    </div>
                    
                </fieldset>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit form
                        <i class="icon-arrow-right14 position-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>