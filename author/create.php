<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if post empty (kosong)
if (!empty($_POST)) {
    // jika post buku tidak empty (kosong), insert new record
    // Set Variables
    $id_buku = isset($_POST['id_buku']) && !empty($_POST['id_buku']) && $_POST['id_buku'] != 'auto' ? $_POST['id_buku'] : NULL;
    $judul_buku = isset($_POST['judul_buku']) ? $_POST['judul_buku'] : '';
    $tahun_terbit = isset($_POST['tahun_terbit']) ? $_POST['tahun_terbit'] : '';
    $jumlah_publikasi = isset($_POST['jumlah_publikasi']) ? $_POST['jumlah_publikasi'] : '';

    // Insert record baru
    $stmt = $pdo->prepare('INSERT INTO buku_buku VALUES (?, ?, ?, ?)');
    $stmt->execute([$id_buku, $judul_buku, $tahun_terbit, $jumlah_publikasi]);

    // Output pesan
    $msg = 'buku Ditambahkan!';
}
?>


<?=template_header('Author | Create')?>

<div class="content update">
	<h2>Tambah buku</h2>
    <form action="create.php" method="post">

        <!-- input id buku-->
        <label for="id_buku">ID</label>
        <input type="text" name="id_buku" value="auto" id="id_buku">

        <!-- input judul buku -->
        <label for="judul_buku">Judul Buku</label>
        <input type="text" name="judul_buku" id="judul_buku" required>

        <!-- input tahun terbit -->
        <label for="tahun_terbit">Tahun Terbit</label>
        <input type="text" name="tahun_terbit" id="tahun_terbit" required>

        <!-- input jumlah publikasi -->
        <label for="jumlah_publikasi">Jumlah Publikasi</label>
        <input type="number" name="jumlah_publikasi" id="jumlah_publikasi" min="0" required>

        <!-- Tombol tambah -->
        <input type="submit" value="Tambah">

    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>