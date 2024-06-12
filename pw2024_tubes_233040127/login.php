<?php
session_start();


if(isset($_SESSION["login"])){
    header("Location: admin/index.php");
}
 
// Koneksi ke database
$host = 'localhost';
$dbname = 'pw2024_tubes_233040127';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION["login"] = true;
        header("Location: admin/index.php");
    } else {
        echo "Login gagal. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <link href="../css/summernote-image-list.min.css">
    <script src="../js/summernote-image-list.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<style>
.box {
    padding: 20px;
    background-color: white;
    width: 25%;
    margin-top: 10%;
    margin-left: 34%;
    padding-bottom: 3rem;
    padding-top: 3rem;
    border-radius: 20px
}

h2 {
    text-align: center;
    font-weight: bold;
}

button {
    width: 100%;
    background-color: #ffb534;
    padding: 10px;
    border-radius: 30px;
    color: white;
    transition: .3s;
}

button:hover {
    background-color: transparent;
    color: black;
    border: 1px solid black;
}
</style>

<body style="background-color: #03aed2;">

    <div class="box">
        <form action="" method="post">
            <h2>Login <br>SportAdmin</h2>
            <br>
            <div class="mb-3">
                <input type="text" name="username" class="form-control" id="username" placeholder="Masukan Email">
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" id="password"
                    placeholder="Masukan Password">
            </div>
            <button type="submit" name="Login"><strong>Login</strong></button>
        </form>
    </div>
</body>

</html>

</body>

</html>