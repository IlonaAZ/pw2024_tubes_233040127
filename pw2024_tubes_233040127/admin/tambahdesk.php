<?php

 include("header.php") ?>

<?php include 'functions.php' ;
 if( isset($_POST["tambahh"]) ) { if( tambahh($_POST)> 0 ) {
    echo "<script>
    alert('data berhasil ditambahkan!');
    document.location.href = 'index.php';
    </script>";
    } else {
    echo "<script>
    alert('data gagal ditambahkan!');
    document.location.href = 'index.php';
    </script>";
    }
    }
?>
<br>
<br>

<form action="" enctype="multipart/form-data" method="post">
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="Judull" name="judull">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Isi</label>
        <div class="col-sm-10">
            <textarea type="text" class="form-control" id="isii" name="isii" id="exampleFormControlTextarea1" rows="3"
                include_onced autocomplete="off"></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="gambar" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="gambarr" name="gambar" include_onced autocomplete="off">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <input type="submit" name="tambahh" value="Tambahh" class="btn btn-primary" />
        </div>
    </div>
</form>