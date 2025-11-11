<?php
// Ambil semua data shift
$dataShift = $shift->getAllShift();

// Cek apakah sedang mode edit
$editShift = null;
if (isset($_GET['edit_shift'])) {
    foreach ($dataShift as $s) {
        // kalo id shift sama dengan yang dipilih, simpan datanya untuk diedit
        if ($s['id_shift'] == $_GET['edit_shift']) {
            $editShift = $s;
        }
    }
}
?>

<h3>🕓 Data Shift</h3>

<?php if ($editShift): ?>
<form method="POST" class="form-box">
    <input type="hidden" name="id_shift" value="<?= $editShift['id_shift']; ?>">
    <input type="text" name="nama_shift" value="<?= $editShift['nama_shift']; ?>" readonly>
    <input type="time" name="jam_mulai" value="<?= $editShift['jam_mulai']; ?>" required>
    <input type="time" name="jam_selesai" value="<?= $editShift['jam_selesai']; ?>" required>

    <button type="submit" name="edit_shift" class="btn-primary">Simpan Perubahan</button>
    <a href="?page=shift" class="btn btn-delete">Batal</a>
</form>
<?php endif; ?>

<table border="1" cellpadding="6" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama Shift</th>
        <th>Jam Mulai</th>
        <th>Jam Selesai</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($dataShift as $s): ?>
    <tr>
        <td><?= $s['id_shift']; ?></td>
        <td><?= htmlspecialchars($s['nama_shift']); ?></td>
        <td><?= htmlspecialchars($s['jam_mulai']); ?></td>
        <td><?= htmlspecialchars($s['jam_selesai']); ?></td>
        <td>
            <a href="?page=shift&edit_shift=<?= $s['id_shift']; ?>" class="btn btn-edit">Edit</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
