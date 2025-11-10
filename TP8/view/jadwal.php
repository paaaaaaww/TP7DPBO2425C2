<?php
$dataJadwal = $jadwal->getAllJadwal();
$dataPegawai = $pegawai->getAllPegawai();
$dataShift = $shift->getAllShift();

$editData = null;
if (isset($_GET['edit'])) {
    $editData = $jadwal->getJadwalById($_GET['edit']);
}
?>

<h3>📅 Jadwal Shift</h3>

<form method="POST" class="form-box">
    <input type="hidden" name="id_jadwal" value="<?= $editData['id_jadwal'] ?? ''; ?>">

    <select name="id_pegawai" required>
        <option value="">-- Pilih Pegawai --</option>
        <?php foreach ($dataPegawai as $p): ?>
            <option value="<?= $p['id_pegawai']; ?>"
                <?= isset($editData) && $editData['id_pegawai'] == $p['id_pegawai'] ? 'selected' : ''; ?>>
                <?= htmlspecialchars($p['nama']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <select name="id_shift" required>
        <option value="">-- Pilih Shift --</option>
        <?php foreach ($dataShift as $s): ?>
            <option value="<?= $s['id_shift']; ?>"
                <?= isset($editData) && $editData['id_shift'] == $s['id_shift'] ? 'selected' : ''; ?>>
                <?= htmlspecialchars($s['nama_shift']) . " (" . $s['jam_mulai'] . " - " . $s['jam_selesai'] . ")"; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <input type="date" name="tanggal" value="<?= $editData['tanggal'] ?? ''; ?>" required>

    <?php if ($editData): ?>
        <button type="submit" name="edit_jadwal" class="btn-primary">Update</button>
        <a href="?page=jadwal" class="btn btn-delete">Batal</a>
    <?php else: ?>
        <button type="submit" name="tambah_jadwal" class="btn-primary">Tambah</button>
    <?php endif; ?>
</form>

<table>
    <tr>
        <th>ID</th>
        <th>Pegawai</th>
        <th>Shift</th>
        <th>Jam</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($dataJadwal as $j): ?>
    <tr>
        <td><?= $j['id_jadwal']; ?></td>
        <td><?= htmlspecialchars($j['nama_pegawai']); ?></td>
        <td><?= htmlspecialchars($j['nama_shift']); ?></td>
        <td><?= $j['jam_mulai']; ?> - <?= $j['jam_selesai']; ?></td>
        <td><?= $j['tanggal']; ?></td>
        <td>
            <a href="?page=jadwal&edit=<?= $j['id_jadwal']; ?>" class="btn btn-edit">Edit</a>
            <a href="?hapus_jadwal=<?= $j['id_jadwal']; ?>" class="btn btn-delete" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
