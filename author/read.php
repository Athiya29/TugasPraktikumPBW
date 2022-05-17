<?php
include 'functions.php';
// Koneksi ke MySQL database
$pdo = pdo_connect_mysql();

// Get Halaman via GET REQUEST, Default 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

// Banyaknnya record per page
$records_per_page = 5;


// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM data_buku ORDER BY id_buku LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();

// Fetch record,
$data_bukus = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Get total banyak data_buku di database
$num_data_bukus = $pdo->query('SELECT COUNT(*) FROM data_buku')->fetchColumn();
?>


<?=template_header('Author | Read')?>

<div class="content read">
	<h2> data buku di galeri Anda</h2>
	<a href="create.php" class="tambah">Tambah data_buku</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>judul_buku</td>
                <td>$tahun_terbit</td>
                <td>jumlah_publikasi</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_bukus as $data_buku): ?>
            <tr>
                <td><?=$data['id_buku']?></td>
                <td><?=$data['judul_buku']?></td>
                <td><?=$data['tahun_terbit']?></td>
                <td><?=$data['jumlah_publikasi']?></td>
                <td class="actions">
                    <a href="update.php?id_buku=<?=$data['id_buku']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id_buku=<?=$data['id_buku']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_data_bukus): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>