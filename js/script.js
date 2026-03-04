function applyTheme(isDark) {
    if (isDark) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const savedTheme = localStorage.getItem('darkMode');
    const isDark = savedTheme === 'true';
    
    applyTheme(isDark);
    
    updateThemeButtonText(isDark);
});

// Fungsi untuk update teks tombol
function updateThemeButtonText(isDark) {
    const btnTheme = document.getElementById('btn-theme');
    if (btnTheme) {
        btnTheme.textContent = isDark ? 'Mode Terang' : 'Mode Gelap';
    }
}

// Toggle Dark Mode
const btnTheme = document.getElementById('btn-theme');
if (btnTheme) {
    btnTheme.addEventListener('click', function() {
        const isDark = document.body.classList.toggle('dark-mode');
        
        // Simpan preferensi ke localStorage
        localStorage.setItem('darkMode', isDark);
        
        updateThemeButtonText(isDark);
    });
}

let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Inisialisasi dengan data contoh jika wishlist kosong
if (wishlist.length === 0) {
    wishlist = [
        { nama: "Nike P-6000", harga: "Harga: Rp 1.429.000" },
        { nama: "Nike Air Force 1", harga: "Harga: Rp 1.259.000" }
    ];
    localStorage.setItem('wishlist', JSON.stringify(wishlist));
}

// Update jumlah wishlist di navbar
function updateWishlistCount() {
    const countElement = document.getElementById('wishlist-count');
    if (countElement) {
        countElement.textContent = wishlist.length;
    }
}

// Update jumlah cart di navbar
function updateCartCount() {
    const countElement = document.getElementById('cart-count');
    if (countElement) {
        countElement.textContent = cart.length;
    }
}

function renderWishlist() {
    const listElement = document.getElementById('daftar-wishlist');
    if (!listElement) return;
    
    listElement.innerHTML = '';
    
    if (wishlist.length === 0) {
        listElement.innerHTML = '<li class="list-group-item text-center text-muted">Belum ada item di wishlist</li>';
        return;
    }
    
    wishlist.forEach(function(item, index) {
        const li = document.createElement('li');
        li.className = 'list-group-item d-flex justify-content-between align-items-center';
        li.innerHTML = `
            <div>
                <strong>${item.nama}</strong><br>
                <small class="text-muted">${item.harga}</small>
            </div>
            <button class="btn btn-sm btn-outline-danger" onclick="hapusItemWishlist(${index})">Hapus</button>
        `;
        listElement.appendChild(li);
    });
}

// Render keranjang belanja
function renderCart() {
    const listElement = document.getElementById('daftar-cart');
    const totalElement = document.getElementById('cart-total');
    if (!listElement) return;
    
    listElement.innerHTML = '';
    
    if (cart.length === 0) {
        listElement.innerHTML = '<li class="list-group-item text-center text-muted">Keranjang belanja kosong</li>';
        if (totalElement) totalElement.textContent = 'Rp 0';
        return;
    }
    
    let total = 0;
    
    cart.forEach(function(item, index) {
        // Parse harga dari string "Rp 1.429.000" menjadi number
        const harga = parseInt(item.harga.replace(/[^0-9]/g, ''));
        total += harga;
        
        const li = document.createElement('li');
        li.className = 'list-group-item d-flex justify-content-between align-items-center';
        li.innerHTML = `
            <div>
                <strong>${item.nama}</strong><br>
                <small class="text-muted">${item.harga}</small>
            </div>
            <button class="btn btn-sm btn-outline-danger" onclick="hapusItemCart(${index})">Hapus</button>
        `;
        listElement.appendChild(li);
    });
    
    if (totalElement) {
        totalElement.textContent = 'Rp ' + total.toLocaleString('id-ID');
    }
}

// Tambah ke wishlist
function tambahWishlist(nama, harga) {
    const exists = wishlist.some(item => item.nama === nama);
    
    if (exists) {
        alert('Item ini sudah ada di wishlist!');
        return;
    }
    
    wishlist.push({ nama: nama, harga: harga });
    localStorage.setItem('wishlist', JSON.stringify(wishlist));
    updateWishlistCount();
    alert(`${nama} added to wishlist!`);
}

// Tambah ke keranjang
function tambahCart(nama, harga) {
    cart.push({ nama: nama, harga: harga });
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
    alert(`${nama} telah ditambahkan ke keranjang belanja!`);
}

// Hapus item tertentu dari wishlist
function hapusItemWishlist(index) {
    const item = wishlist[index];
    wishlist.splice(index, 1);
    localStorage.setItem('wishlist', JSON.stringify(wishlist));
    updateWishlistCount();
    renderWishlist();
    alert(`${item.nama} dihapus dari wishlist!`);
}

// Hapus item tertentu dari cart
function hapusItemCart(index) {
    const item = cart[index];
    cart.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
    renderCart();
    alert(`${item.nama} dihapus dari keranjang!`);
}

// Kosongkan semua wishlist
function hapusWishlist() {
    if (confirm('Yakin ingin mengosongkan semua wishlist?')) {
        wishlist = [];
        localStorage.setItem('wishlist', JSON.stringify(wishlist));
        updateWishlistCount();
        renderWishlist();
    }
}

// Kosongkan semua cart
function hapusCart() {
    if (confirm('Yakin ingin mengosongkan semua keranjang?')) {
        cart = [];
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartCount();
        renderCart();
    }
}

// Checkout
function checkout() {
    if (cart.length === 0) {
        alert('Keranjang belanja kosong!');
        return;
    }
    
    if (confirm('Apakah Anda yakin ingin checkout?')) {
        alert('Terima kasih telah berbelanja! Pesanan Anda akan diproses.');
        cart = [];
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartCount();
        renderCart();
        
        // Tutup modal
        const cartModal = document.getElementById('cartModal');
        const modal = bootstrap.Modal.getInstance(cartModal);
        if (modal) {
            modal.hide();
        }
    }
}

// Pasang event listener ke semua tombol wishlist
document.addEventListener('DOMContentLoaded', function() {
    updateWishlistCount();
    updateCartCount();
    
    // Pasang event listener ke tombol wishlist
    const wishlistButtons = document.querySelectorAll('.btn-wishlist');
    wishlistButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const card = this.closest('.card');
            const nama = card.querySelector('.card-title').textContent;
            const harga = card.querySelector('.harga-text').textContent;
            tambahWishlist(nama, harga);
        });
    });
    
    // Pasang event listener ke tombol Beli
    const buyButtons = document.querySelectorAll('.btn-detail');
    buyButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const card = this.closest('.card');
            const nama = card.querySelector('.card-title').textContent;
            const harga = card.querySelector('.harga-text').textContent;
            tambahCart(nama, harga);
        });
    });
    
    // Render wishlist saat modal dibuka
    const wishlistModal = document.getElementById('wishlistModal');
    if (wishlistModal) {
        wishlistModal.addEventListener('show.bs.modal', function() {
            renderWishlist();
        });
    }
    
    // Render cart saat modal dibuka
    const cartModal = document.getElementById('cartModal');
    if (cartModal) {
        cartModal.addEventListener('show.bs.modal', function() {
            renderCart();
        });
    }

});

