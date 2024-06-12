<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}
include("header.php") ?>

<?php
include_once 'functions.php';
$id = $_GET["id"];
$berita = query("SELECT * FROM berita WHERE id=$id");
$brt = $berita[0];
if (isset($_POST["ubah"])) {
    if (ubah($_POST) > 0) {
        echo "<script>
    alert('data berhasil diubah!');
    document.location.href = 'index.php';
    </script>";
    } else {
        echo "<script>
    alert('data gagal diubah!');
    document.location.href = 'index.php';
    </script>";
    }
}
?>
<form action="" enctype="multipart/form-data" method="post">
    <input type="hidden" name="id" value="<?php echo $brt["id"]; ?>">
    <input type="hidden" name="gambarLama" value="<?php echo $brt["gambar"]; ?>">
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
            <input class="form-control" value="<?php echo $brt["judul"]; ?>" class="wide text input" type="text"
                name="judul" placeholder="Nama" include_onced autocomplete="off" />
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Isi</label>
        <div class="col-sm-10">
            <input class="form-control" value="<?php echo $brt["isi"]; ?>" class="wide text input" type="text"
                name="isi" placeholder="Nama" include_onced autocomplete="off" />
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Link</label>
        <div class="col-sm-10">
            <input class="form-control" value="<?php echo $brt["link"]; ?>" class="wide text input" type="text"
                name="link" placeholder="Email" include_onced autocomplete="off" />
        </div>
    </div>
    <div class="mb-3 row">
        <label for="gambar" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-10">
            <img src="./img/<?php $brt['gambar']; ?>" alt="">
            <input class="form-control" class="wide text input" type="file" name="gambar" placeholder="Gambar"
                include_onced autocomplete="off" />
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <input type="submit" name="ubah" value="Ubah" class="btn btn-primary" />
        </div>
    </div>
</form>