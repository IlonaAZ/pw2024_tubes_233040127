<?php 
include("header.php") ?>

<?php  

   include_once 'functions.php'; 
    
   $desk = query("SELECT * FROM desk"); 
   $i = 1; 
  ?>

<br>
<form class="row g-3" method="get">
    <div class="col-auto">
        <a href="tambahdesk.php" class="btn btn-primary">Tambah</a>
    </div>
</form>
<table class="table table-striped">
    <thead>
        <tr>
            <th class="col-1">#</th>
            <th>Judul</th>
            <th>isi</th>
            <th>gambar</th>
            <th class="col-2">Aksi</th>
        </tr>
    </thead>
    <?php foreach ( $desk as $row ) : ?>
    <tbody>
        <tr>
            <td scope="row"><?= $i; ?></td>
            <td><?= $row["judull"]; ?></td>
            <td><?= $row["isii"]; ?></td>
            <td style="width:20%">
                <center><img style="width:70%;" src="img/<?= $row["gambar"]; ?>" alt="<?= $row["gambar"]; ?>">
                </center>
            </td>
            <td style="width:12%;"><a href="ubahdesk.php?id=<?= $row["id"];?>" class="btn btn-warning"
                    style="color: white; font-weight: bold; text-decoration: none;">Edit</a><a
                    href="hapusdesk.php?id=<?= $row["id"]; ?>" onclick="return confirm('anda yakin?')"
                    class="btn btn-danger"
                    style="margin-top :15px; color: white; font-weight: bold; text-decoration: none;">Hapus</a>
            </td>
        </tr>

    </tbody>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>