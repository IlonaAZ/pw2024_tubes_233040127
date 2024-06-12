<?php
$conn = mysqli_connect("localhost", "root", "", "pw2024_tubes_233040127");
  include_once './admin/functions.php'; 
    

$desk = mysqli_query($conn, "SELECT id,judull,isii,gambar FROM desk");
$berita = query("SELECT * FROM berita"); 
$i = 1; 
if( isset($_POST["cari"]) ) { 
 $berita = cari($_POST["keyword"]); 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/stylea.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
ul li a {
    font-size: 15xp;
}

.btn {
    background-color: #ffb534;
}


.btn:hover {
    background-color: white;
}
</style>

<!--------------------------------------- NAVBAR --------------------------------------->

<body>
    <div class="awal">
        <nav>
            <div class="container nav-conta">
                <a href="" class="logo">SportAlways</a>
                <ul class="navlink" style="margin-left:100px;font-size:30px;">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#tutorial">Manfaat</a></li>
                    <li><a href="#tutoriall">Berita</a></li>
                </ul>
                <form action="" class="d-flex" method="post" style="margin-left: 10rem; z-index:6;">
                    <input style=" height:40px; width:40%;margin-left:50px;box-shadow:5px 5px 5px#ffb534;" type="text"
                        class="form-control" name="keyword" size="60" autofocus placeholder="Pencarian.."
                        autocomplete="off">
                    <br>
                    <button type="submit" style="height:40px;margin-top:5px; margin-left:20px;width:25%;  " class="btn"
                        name="cari">Cari </button>
                </form>
            </div>
        </nav>



        <header id="home">
            <div class=" header header-conta">
                <div class="header-left" style="">
                    <img style="box-shadow:none; border-radius:10px;" src="./admin/img/logo1.jpeg" alt="Foto Gue">
                </div>
                <div class="header-right">
                    <p><b>SportAlways</b></p>
                    <h2>Berita Olahraga Terbaru Hari Ini, Kabar Harian Berita Terkini Sepak Bola, Tenis, Bulu
                        Tangkis,
                        MotoGP, F1, Jadwal Klasemen Liga, dan Skor Hasil Pertandingan.
                    </h2>
                    <div class="header-action">
                    </div>
                </div>
            </div>
        </header>
    </div>

    <!-------------------------------- MANFAAT ------------------------------------->

    <section style="padding-top:10rem; padding-bottom:10rem; margin-top:190px; margin-bottom:140px;" id="tutorial">
        <?php while ($data = mysqli_fetch_assoc($desk)) { ?>
        <div class="container about-container">
            <div class=" about-right">
                <h1 style="color: black;"><?php echo $data['judull'] ?></h1>
                <br>
                <p style="color: black;"><?php echo $data['isii'] ?></p>
            </div>
            <div class=" about-left">
                <img src="./admin/img/<?php echo $data['gambar']; ?>"" alt="">
            </div>
            
        </div>
        <?php } ?>
    </section>


    <br>
    <br>
    <br>

<!--------------------------------- BERITA ---------------------------------->
    
    <div>
        
                <section style=" padding-top:5rem; margin-bottom:140px;" id="tutoriall">
                <h1 style=" color:#ffb534 ;" class=" heading">
                    Berita Terkini Olahraga</h1>
                <div id="cont" class="row row-cols-1 row-cols-md-3 g-4">

                    <?php foreach ( $berita as $row ) : ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="./admin/img/<?= $row['gambar']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><strong><?= $row['judul'] ?></strong></h5>
                                <p class="card-text">
                                    <?= $row['isi'] ?>
                                </p>
                            </div>
                            <div style="background-color: white; border:none; padding-bottom: 30px;"
                                class="card-footer">
                                <a class="bty" href="<?= $row['link'] ?>"
                                    style="text-decoration:none; color:#ffb534; ">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </div>
    </section>
    </div>

    <!------------------------------ FOOTER ---------------------------------->

    <footer id="sticky-footer" class="flex-shrink-0 py-4 text-white">
        <div class="container text-center">
            <strong> <small>Copyright &copy; Ilona Aqila Zahra</small></strong>

        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>