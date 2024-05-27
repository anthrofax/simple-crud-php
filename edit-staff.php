<?php
include_once ('./connect.php');

$id = $_GET['id'];

$get_staff = mysqli_query($db, "SELECT * FROM staff WHERE id=$id");

$staff = mysqli_fetch_assoc($get_staff);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];

    $query = mysqli_query($db, "UPDATE staff SET nama='$nama', telp='$telp', email='$email' WHERE id='$id'");

    echo
        "<script>
            alert('Buku berhasil diperbarui')
        </script>";


    header('Location: ./staff.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Form Update Staff</title>
</head>
<body>
    <div class="container py-3">
        <h1>Form Update Data Staff</h1>

        <form method="post">
        <div class="mb-3">
            <label class="form-label" for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $staff['nama'] ?>">
        </div>
        
        <div class="mb-3">
            <label class="form-label" for="telp">Telepon</label>
            <input type="text" name="telp" class="form-control" value="<?php echo $staff['telp'] ?>">
        </div>
        
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="text" name="email" class="form-control" value="<?php echo $staff['email'] ?>">
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Edit Staff</button>
        </form>
        
        <br>
        <a href="./staff.php"><button type="button" class="btn btn-secondary">Kembali</button>
</a>
    </div>
</body>
</html>