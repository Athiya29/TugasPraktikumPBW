<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// check id terdapat pada tabel atau tidak.
if (isset($_GET['id_buku'])) {
    if (!empty($_POST)) {

        // Sama seperti create.php
        $id_buku = isset($_POST['id_buku']) ? $_POST['id_buku'] : NULL;
        $judul_buku = isset($_POST['judul_buku']) ? $_POST['judul_buku'] : '';
        $tahun_terbit = isset($_POST['tahun_terbit']) ? $_POST['tahun_terbit'] : '';
        $jumlah_publikasi = isset($_POST['jumlah_publikasi']) ? $_POST['jumlah_publikasi'] : '';
        
        // Update record
        $stmt = $pdo->prepare('UPDATE data SET id_buku = ?, judul_buku = ?, tahun_terbit = ?, jumlah_publikasi = ? WHERE id_buku = ?');
        $stmt->execute([$id_buku, $judul_buku, $tahun_terbit, $jumlah_publikasi, $_GET['id_buku']]);
        $msg = 'Data sudah diperbarui!';
    }

    // Get data dari tabel data_buku
    $stmt = $pdo->prepare('SELECT * FROM data WHERE id_buku = ?');
    $stmt->execute([$_GET['id_buku']]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$data) {
        exit('buku tidak ditemukan dengan ID tersebut!');
    }
} else {
    exit('Tidak ada ID yang ditemukan!');
}
?>



<?=template_header('Author | Update')?>

<!-- <?=$contact['id_buku']?> -->

<div class="content update">
    <h2>Update Produk</h2>
    <form action="update.php?id_buku=<?=$data['id_buku']?>" method="post">

        <!-- input id buku-->
        <label for="id_buku">ID</label>
        <input type="text" name="id" value="<?=$data['id_buku']?>" id="id_buku">

        <!-- input judul buku -->
        <label for="judul_buku">Nama Produk</label>
        <input type="text" name="judul_buku" value="<?=$data['judul_buku']?>" id="judul_buku" required>

        <!-- input tahun terbit -->
        <label for="tahun_terbit">Jenis Produk</label>
        <input type="text" name="tahun_terbit" value="<?=$data['tahun_terbit']?>" id="tahun_terbit" required>

        <!-- input jumlah publikasi -->
        <label for="jumlah_publikasi">Jumlah publikasi</label>
        <input type="number" name="jumlah_publikasi" value="<?=$data['jumlah_publikasi']?>" id="jumlah_publikasi" min="0" required>

        <!-- Tombol tambah -->
        <input type="submit" value="Update">

    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>