import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function() {
    const profileImageInput = document.getElementById('profile_image');
    if (profileImageInput) {
        profileImageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file && file.size > 10 * 1024 * 1024) { // 10 MB
                alert('Ukuran file tidak boleh lebih dari 10 MB.');
                e.target.value = ''; // Reset input file
            }
        });
    }
});
