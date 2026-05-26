<?php
 $pageTitle = "Home";
require_once 'header.php';

// Ambil 4 produk terbaru untuk featured
 $featured = $conn->query("SELECT * FROM tmbbrg ORDER BY id DESC LIMIT 4");
 $totalProduk = $conn->query("SELECT COUNT(*) as c FROM tmbbrg")->fetch_assoc()['c'];
 $totalTransaksi = $conn->query("SELECT COUNT(*) as c FROM transaksi")->fetch_assoc()['c'];
?>

<!-- HERO SECTION -->
<section class="hero-mesh hero-grid relative min-h-[92vh] flex items-center overflow-hidden">
    <!-- Dekorasi floating -->
    <div class="absolute top-20 left-10 w-72 h-72 bg-gold-500/5 rounded-full blur-3xl float-anim"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-gold-500/3 rounded-full blur-3xl float-anim" style="animation-delay:-3s"></div>
    <div class="absolute top-1/2 left-1/3 w-2 h-2 bg-gold-500/40 rounded-full float-anim" style="animation-delay:-1s"></div>
    <div class="absolute top-1/4 right-1/4 w-1.5 h-1.5 bg-gold-500/30 rounded-full float-anim" style="animation-delay:-2s"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-8">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-gold-500/10 border border-gold-500/20 rounded-full">
                    <span class="w-2 h-2 bg-gold-500 rounded-full pulse-gold"></span>
                    <span class="text-xs text-gold-400 font-medium uppercase tracking-wider">Premium Shoe Collection</span>
                </div>
                <h1 class="font-display text-5xl sm:text-6xl lg:text-7xl font-900 leading-[1.05]">
                    Step Into<br><span class="gold-shimmer">Luxury</span>
                </h1>
                <p class="text-zinc-400 text-lg max-w-lg leading-relaxed">
                    Temukan koleksi sepatu premium dari brand ternama dunia. Kualitas terbaik, desain terkini, harga bersahabat.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="stok_barang.php" class="px-8 py-4 bg-gradient-to-r from-gold-400 to-gold-600 text-dark-500 font-semibold rounded-xl hover:from-gold-500 hover:to-gold-700 transition-all btn-press shadow-xl shadow-gold-500/20 text-sm">
                        <i class="fas fa-shopping-bag mr-2"></i>Lihat Koleksi
                    </a>
                    <?php if (!isset($_SESSION['role'])): ?>
                    <a href="register.php" class="px-8 py-4 border border-gold-500/30 text-gold-400 font-semibold rounded-xl hover:bg-gold-500/10 transition-all btn-press text-sm">
                        Daftar Sekarang
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="relative flex justify-center">
                <div class="absolute inset-0 bg-gradient-to-br from-gold-500/10 to-transparent rounded-full blur-3xl scale-75"></div>
                <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600&h=500&fit=crop"
                     alt="Sepatu Premium" class="relative z-10 w-full max-w-lg rounded-3xl shadow-2xl shadow-gold-500/10 float-anim" style="animation-duration:8s">
            </div>
        </div>
    </div>

    <!-- Stats Bar -->
    <div class="absolute bottom-0 left-0 right-0 bg-dark-300/60 backdrop-blur-xl border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 grid grid-cols-3 gap-6 text-center">
            <div>
                <p class="text-2xl sm:text-3xl font-display font-bold text-gold-500">8+</p>
                <p class="text-xs text-zinc-500 mt-1 uppercase tracking-wider">Brand Ternama</p>
            </div>
            <div>
                <p class="text-2xl sm:text-3xl font-display font-bold text-gold-500"><?= $totalProduk ?>+</p>
                <p class="text-xs text-zinc-500 mt-1 uppercase tracking-wider">Produk Tersedia</p>
            </div>
            <div>
                <p class="text-2xl sm:text-3xl font-display font-bold text-gold-500"><?= $totalTransaksi ?>+</p>
                <p class="text-xs text-zinc-500 mt-1 uppercase tracking-wider">Transaksi Sukses</p>
            </div>
        </div>
    </div>
</section>

<!-- FEATURED PRODUCTS -->
<section class="py-20 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="reveal text-center mb-14">
            <span class="text-xs text-gold-500 uppercase tracking-[0.2em] font-semibold">Koleksi Terbaru</span>
            <h2 class="font-display text-3xl sm:text-4xl font-bold mt-3">Featured Products</h2>
            <div class="w-20 h-1 bg-gradient-to-r from-gold-400 to-gold-600 mx-auto mt-5 rounded-full"></div>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php while ($row = $featured->fetch_assoc()): ?>
            <div class="reveal card-hover bg-dark-200 border border-white/5 rounded-2xl overflow-hidden group">
                <div class="img-zoom relative h-52 bg-dark-300">
                    <img src="<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['nama_barang']) ?>" class="w-full h-full object-cover">
                    <div class="absolute top-3 left-3 px-3 py-1 bg-dark-500/80 backdrop-blur-md rounded-full text-[10px] text-gold-400 font-semibold uppercase tracking-wider"><?= htmlspecialchars($row['merek']) ?></div>
                </div>
                <div class="p-5">
                    <h3 class="font-semibold text-zinc-100 text-sm leading-tight"><?= htmlspecialchars($row['nama_barang']) ?></h3>
                    <p class="text-gold-500 font-bold text-lg mt-2"><?= formatRupiah($row['harga']) ?></p>
                    <div class="flex items-center justify-between mt-4">
                        <span class="text-xs text-zinc-500">Ukuran: <?= htmlspecialchars($row['ukuran']) ?></span>
                        <span class="text-xs px-2.5 py-1 rounded-full <?= $row['stok']>10?'bg-emerald-500/10 text-emerald-400':($row['stok']>0?'bg-amber-500/10 text-amber-400':'bg-red-500/10 text-red-400') ?>"><?= $row['stok']>0?'Stok '.$row['stok']:'Habis' ?></span>
                    </div>
                    <?php if ($row['stok'] > 0 && isset($_SESSION['role']) && $_SESSION['role']==='user'): ?>
                    <a href="beli.php?id=<?= $row['id'] ?>" class="mt-4 w-full block text-center py-2.5 bg-gold-500/10 text-gold-400 border border-gold-500/20 rounded-xl text-sm font-medium hover:bg-gold-500/20 transition-all btn-press">Beli Sekarang</a>
                    <?php elseif ($row['stok'] > 0 && !isset($_SESSION['role'])): ?>
                    <a href="login.php" class="mt-4 w-full block text-center py-2.5 bg-gold-500/10 text-gold-400 border border-gold-500/20 rounded-xl text-sm font-medium hover:bg-gold-500/20 transition-all btn-press">Login untuk Beli</a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <div class="reveal text-center mt-12">
            <a href="stok_barang.php" class="inline-flex items-center gap-2 px-8 py-3.5 border border-gold-500/30 text-gold-400 rounded-xl hover:bg-gold-500/10 transition-all btn-press text-sm font-medium">
                Lihat Semua Koleksi <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>
</section>

<!-- WHY CHOOSE US -->
<section class="py-20 bg-dark-300/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="reveal text-center mb-14">
            <span class="text-xs text-gold-500 uppercase tracking-[0.2em] font-semibold">Kenapa Kami</span>
            <h2 class="font-display text-3xl sm:text-4xl font-bold mt-3">Mengapa SOLELUXE?</h2>
            <div class="w-20 h-1 bg-gradient-to-r from-gold-400 to-gold-600 mx-auto mt-5 rounded-full"></div>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            $features = [
                ['fa-certificate','Produk Original','Setiap sepatu yang kami jual dijamin 100% original dari brand resmi.'],
                ['fa-truck-fast','Pengiriman Cepat','Proses pengiriman dalam 1-3 hari kerja ke seluruh Indonesia.'],
                ['fa-shield-halved','Garansi Resmi','Garansi resmi dari brand untuk setiap pembelian di toko kami.'],
                ['fa-headset','Support 24/7','Tim customer service siap membantu kapan saja melalui berbagai channel.']
            ];
            foreach ($features as $f): ?>
            <div class="reveal card-hover bg-dark-200 border border-white/5 rounded-2xl p-7 text-center group">
                <div class="w-14 h-14 bg-gold-500/10 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:bg-gold-500/20 transition-colors">
                    <i class="fas <?= $f[0] ?> text-gold-500 text-xl"></i>
                </div>
                <h3 class="font-semibold text-zinc-100 mb-2"><?= $f[1] ?></h3>
                <p class="text-zinc-500 text-sm leading-relaxed"><?= $f[2] ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- BRANDS -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="reveal text-center mb-10">
            <span class="text-xs text-zinc-600 uppercase tracking-[0.2em] font-semibold">Brand Partners</span>
        </div>
        <div class="reveal flex flex-wrap items-center justify-center gap-8 sm:gap-14 opacity-40">
            <?php foreach(['Nike','Adidas','Reebok','Puma','New Balance','Vans','Asics'] as $b): ?>
            <span class="font-display text-xl sm:text-2xl font-bold text-zinc-400 hover:text-gold-500 transition-colors cursor-default"><?= $b ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once 'footer.php'; ?>
