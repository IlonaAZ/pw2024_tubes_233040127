<?php 
session_start();
if(!isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
}include("header.php") ?>

<?php  

   include_once 'functions.php'; 
    
   $berita = query("SELECT * FROM berita"); 
   $i = 1; 
   if( isset($_POST["cari"]) ) { 
    $berita = cari($_POST["keyword"]); 
}
  ?>

<br>
<form class="row g-3" method="get">
    <div class="col-auto">
        <a href="tambah.php" class="btn btn-primary">Tambah</a>

    </div>
</form>
<br>
<form action="" class="d-flex" method="post">

    <input style="width: 40%;" type="text" class="form-control" name="keyword" size="40" autofocus
        placeholder="masukkan keyword pencarian.." autocomplete="off">
    <button type="submit" style="margin-left:15px ;" class="btn btn-primary" name="cari">Cari!</button>

</form>
<table class="table table-striped">
    <thead>
        <tr>
            <th class="col-1">#</th>
            <th>Judul</th>
            <th>isi</th>
            <th>Link</th>
            <th>gambar</th>
            <th class="col-2">Aksi</th>
        </tr>
    </thead>
    <?php foreach ( $berita as $row ) : ?>
    <tbody>
        <tr>
            <td scope="row"><?= $i; ?></td>
            <td><?= $row["judul"]; ?></td>
            <td><?= $row["isi"]; ?></td>
            <td><?= $row["link"]; ?></td>
            <td style="width:20%">
                <center><img style="width:70%;" src="img/<?= $row["gambar"]; ?>" alt="<?= $row["gambar"]; ?>">
                </center>
            </td>
            <td style="width:12%;"><a href="ubah.php?id=<?= $row["id"];?>" class="btn btn-warning"
                    style="color: white; font-weight: bold; text-decoration: none;">Edit</a><a
                    href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('anda yakin?')"
                    class="btn btn-danger"
                    style="margin-top :15px; color: white; font-weight: bold; text-decoration: none;">Hapus</a>
            </td>
        </tr>

    </tbody>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>