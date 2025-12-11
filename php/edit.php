<?php
    function sanitize($data) {
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }

    include 'app.php'; 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $students = selectStudentsById($id);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = sanitize($_POST['id']);
        $name = sanitize($_POST['name']);
        $age = sanitize($_POST['age']);
        $grade = sanitize($_POST['grade']);
    
        // Memanggil fungsi untuk update data siswa
        updateStudent($id, $name, $age, $grade);
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Update Data Siswa</h1>
            <p>Perbarui informasi siswa yang telah ada</p>
        </header>

        <section class="form-section">
            <h2>Form Update Siswa</h2>
            <form method="POST" action="">
                <input type="hidden" id="id" name="id" value="<?php echo sanitize($students[0]['id']); ?>" required>

                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" value="<?php echo sanitize($students[0]['name']); ?>" required>

                <label for="age">Usia:</label>
                <input type="number" id="age" name="age" value="<?php echo sanitize($students[0]['age']); ?>" required>

                <label for="grade">Nilai:</label>
                <input type="text" id="grade" name="grade" value="<?php echo sanitize($students[0]['grade']); ?>" required>

                <button type="submit">Update Siswa</button>
            </form>
        </section>

        <footer>
            <p>&copy; 2024 Manajemen Siswa - ALH</p>
        </footer>
    </div>
</body>
</html>
