<?php
// Cek jika parameter id ada di URL dan valid
if (!isset($_GET['id']) || empty($_GET['id']) || $_GET['id'] == 0) {
    header("Location: masyarakat.php"); // Jika id tidak ada atau invalid, arahkan kembali ke halaman masyarakat
    exit();
}

$id = $_GET['id']; // Ambil id dari URL

include 'koneksi.php';
// Query untuk mengambil data pengaduan berdasarkan id
$query = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan = '$id'");

// Cek apakah data ditemukan
if (mysqli_num_rows($query) == 0) {
    echo "Pengaduan tidak ditemukan.";
    exit();
}

$data = mysqli_fetch_array($query);
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Pengaduan</h6>
    </div>
    <div class="card-body" style="font-size: 14px;">
        <!-- Tombol Kembali -->
        <a href="?url=lihat-pengaduan" class="btn btn-primary btn-icon-split mb-3">
            <span class="icon text-white-50">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>

        <!-- Menampilkan Detail Pengaduan -->
        <div class="form-group">
            <label style="font-size: 14px;">Tgl Pengaduan</label>
            <input type="text" name="tgl_pengaduan" class="form-control" readonly value="<?= $data['tgl_pengaduan']; ?>">
        </div>

        <div class="form-group">
            <label style="font-size: 14px;">Isi Laporan</label>
            <textarea name="isi_laporan" class="form-control" readonly><?= $data['isi_laporan']; ?></textarea>
        </div>

        <div class="form-group">
            <label style="font-size: 14px;">Foto</label>
            <div>
                <!-- Menampilkan Foto -->
                <img class="img-thumbnail" src="foto/<?= $data['foto']; ?>" width="300" alt="Foto Pengaduan">
            </div>
        </div>

        <div class="form-group">
            <label style="font-size: 14px;">Status Pengaduan</label>
            <input type="text" name="status" class="form-control" readonly value="<?= $data['status']; ?>">
        </div>
    </div>
</div>
