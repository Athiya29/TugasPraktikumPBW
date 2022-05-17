<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';

// check id terdapat pada tabel atau tidak.
if (isset($_GET['id_buku'])) {

    // memilih record untuk dihapus
    $stmt = $pdo->prepare('SELECT * FROM data_buku WHERE id_buku = ?');
    $stmt->execute([$_GET['id_buku']]);
    $data_buku = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$data_buku) {
        exit('buku tidak dapat ditemukan dengan Id');
    }

    // Confirm untuk menghapus record
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {

            // Yes, record dihapus
            $stmt = $pdo->prepare('DELETE FROM data_buku WHERE id_buku = ?');
            $stmt->execute([$_GET['id_buku']]);
            $msg = 'data buku sudah dihapus!';
        } else {

            // No, kembali ke halaman read.php
            header('Location: read.php');
            exit;
        }
    }
} else {
    exit('Tidak ada ID yang ditemukan!');
}
?>


<?=template_header('Author | Delete')?>

<div class="content delete">
	<h2>Delete data_buku #<?=$data_buku['id_buku']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Apakah kamu yakin akan menghapus buku <strong><span style="text-transform:uppercase"><?=$data_buku['judul_buku']?></span></strong>?</p>
    <div class="yesno">
        <a class="yes" href="delete.php?id=<?=$data_buku['id_buku']?>&confirm=yes">Yes</a>
        <a class="no" href="delete.php?id=<?=$data_buku['id_buku']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>