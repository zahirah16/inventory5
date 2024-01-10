document.addEventListener('DOMContentLoaded', function() {
    // Temukan elemen form dan elemen select kategori
    const form = document.getElementById('search-form');
    const categorySelect = document.getElementById('category');

    // Tambahkan event listener untuk menangani tekanan tombol "Enter" pada select kategori
    categorySelect.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            // Simpan nilai kategori yang dipilih ke dalam input tersembunyi dalam form
            const selectedCategory = categorySelect.value;
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'category';
            hiddenInput.value = selectedCategory;
            form.appendChild(hiddenInput);

            // Kirim form
            form.submit();

            // Hentikan event keydown
            event.preventDefault();
        }
    });
});
