<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
}
 include("header.php") ?>

<?php include 'functions.php' ;
 if( isset($_POST["tambah"]) ) { if( tambah($_POST)> 0 ) {
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
            <input type="text" class="form-control" id="Judul" name="judul">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Isi</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="isi" name="isi" include_onced autocomplete="off">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Link</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="link" name="link" include_onced autocomplete="off">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="gambar" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="gambar" name="gambar" include_onced autocomplete="off">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <input type="submit" name="tambah" value="Tambah" class="btn btn-primary" />
        </div>
    </div>
</form>