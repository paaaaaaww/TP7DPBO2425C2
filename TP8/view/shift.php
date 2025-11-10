<?php
$dataShift = $shift->getAllShift();
?>

<h3>⏰ Daftar Shift</h3>
<table border="1" cellpadding="6" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama Shift</th>
        <th>Jam Mulai</th>
        <th>Jam Selesai</th>
    </tr>
    <?php foreach ($dataShift as $s): ?>
    <tr>
        <td><?= $s['id_shift']; ?></td>
        <td><?= htmlspecialchars($s['nama_shift']); ?></td>
        <td><?= $s['jam_mulai']; ?></td>
        <td><?= $s['jam_selesai']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
