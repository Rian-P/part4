<form action="/sewa" method="post">
    @csrf
    <div>
        <label for="nama_barang">Nama Barang</label>
        <input type="text" id="nama_barang" name="nama_barang" required>
    </div>
    <div>
        <label for="harga_sewa">Harga Sewa</label>
         <select  id="harga_sewa"name="harga_sewa" required>
            <option value="">Pilih Lama Sewa</option>
            <option value="45000">12 Jam</option>
            <option value="35000">24 Jam</option>
           
            <!-- tambahkan opsi sesuai kebutuhan -->
        </select>
    </div>
    <div>
        <label for="tanggal_awal">Tanggal Awal Sewa</label>
        <input type="date" id="tanggal_awal" name="tanggal_awal" min="<?= date('Y-m-d') ?>" required>
    </div>
    <div>
        <label for="tanggal_akhir">Tanggal Akhir Sewa</label>
        <input type="date" id="tanggal_akhir" name="tanggal_akhir" min="<?= date('Y-m-d') ?>" required onchange="hitungTotalHarga()">
    </div>
    <div>
        <label for="total_harga">Total Harga Sewa</label>
        <input type="number" id="total_harga" name="total_harga"  readonly>
    </div>
     <label for="time-ambil">Waktu Ambil:</label>
  <input type="time" id="time-ambil" name="time-ambil" onchange="setKembali()" required><br>

  <label for="time-kembali">Waktu Kembali:</label>
  <input type="time" id="time-kembali" name="time-kembali  required><br>
</form>

<script>
    function hitungTotalHarga() {
        const hargaSewa = document.getElementById('harga_sewa').value;
        const tanggalAwal = new Date(document.getElementById('tanggal_awal').value);
        const tanggalAkhir = new Date(document.getElementById('tanggal_akhir').value);

        const selisihHari = Math.round((tanggalAkhir - tanggalAwal) / (1000 * 60 * 60 * 24));
        document.getElementById('total_harga').value = hargaSewa * selisihHari;
    }
    function setKembali() {
    var ambil = document.getElementById("time-ambil").value;
    var ambilTime = new Date("1970-01-01T" + ambil + ":00");
    var kembaliTime = new Date(ambilTime.getTime());
    var kembali = kembaliTime.toTimeString().slice(0, 5);
    document.getElementById("time-kembali").value = kembali;
  }
</script>



<form>
  <label for="hargaProperti">Harga Properti:</label>
  <input type="number" id="hargaProperti" name="hargaProperti" ><br><br>
  
  <label for="jangkaWaktu">Jangka Waktu (dalam tahun):</label>
  <input type="number" id="jangkaWaktu" name="jangkaWaktu"><br><br>
  
  <label for="bunga">Bunga (% per tahun):</label>
  <input type="number" id="bunga" name="bunga"><br><br>
  
  <button type="button" onclick="hitungAngsuran()">Hitung Angsuran</button><br><br>
  
  <label for="angsuran">Angsuran per bulan:</label>
  <input type="text" id="angsuran" name="angsuran" readonly>
</form>


<script>
    function hitungAngsuran() {
  var hargaProperti = document.getElementById("hargaProperti").value;
  var jangkaWaktu = document.getElementById("jangkaWaktu").value;
  var bunga = document.getElementById("bunga").value;

  var pokokPinjaman = hargaProperti;
  var bungaBulanan = bunga / 1200; // bunga per bulan
  var jumlahAngsuran = jangkaWaktu * 12; // jumlah angsuran

  // rumus perhitungan angsuran perbulan
  var angsuran = (pokokPinjaman * bungaBulanan) / (1 - Math.pow(1 + bungaBulanan, -jumlahAngsuran));

  // tampilkan hasil perhitungan pada input dengan id "angsuran"
  document.getElementById("angsuran").value = "Rp. " + angsuran.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
}

</script>

