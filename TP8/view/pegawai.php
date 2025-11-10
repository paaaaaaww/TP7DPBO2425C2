<?php
// Ambil semua data pegawai
$dataPegawai = $pegawai->getAllPegawai();

// Cek apakah sedang mode edit
$editData = null;
if (isset($_GET['edit_pegawai'])) {
    foreach ($dataPegawai as $p) {
        if ($p['id_pegawai'] == $_GET['edit_pegawai']) {
            $editData = $p;
           
        }
    }
}
?>

<h3>👥 Data Pegawai</h3>

<form method="POST" class="form-box">
    <input type="hidden" name="id_pegawai" value="<?= $editData['id_pegawai'] ?? ''; ?>">
    <input type="text" name="nama" placeholder="Nama Pegawai" 
           value="<?= $editData['nama'] ?? ''; ?>" required>
    <input type="text" name="jabatan" placeholder="Jabatan" 
           value="<?= $editData['jabatan'] ?? ''; ?>" required>
    <input type="text" name="no_hp" placeholder="No HP" 
           value="<?= $editData['no_hp'] ?? ''; ?>" required>

    <?php if ($editData): ?>
        <button type="submit" name="edit_pegawai" class="btn-primary">Update</button>
        <a href="?page=pegawai" class="btn btn-delete">Batal</a>
    <?php else: ?>
        <button type="submit" name="tambah_pegawai"class="btn-primary">Tambah</button>
    <?php endif; ?>
</form>

<table border="1" cellpadding="6" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>No HP</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($dataPegawai as $p): ?>
    <tr>
        <td><?= $p['id_pegawai']; ?></td>
        <td><?= htmlspecialchars($p['nama']); ?></td>
        <td><?= htmlspecialchars($p['jabatan']); ?></td>
        <td><?= htmlspecialchars($p['no_hp']); ?></td>
        <td>
            <a href="?page=pegawai&edit_pegawai=<?= $p['id_pegawai']; ?>" class="btn btn-edit">Edit</a>
            <a href="?hapus_pegawai=<?= $p['id_pegawai']; ?>" class="btn btn-delete" onclick="return confirm('Yakin hapus data?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
