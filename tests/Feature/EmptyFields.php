<?php

test('user cannot register with empty fields', function () {
    // Kirim request kosong
    $response = $this->post(route('register'), [
        'name' => '',
        'username' => '',
        'email' => '',
        'password' => '',
        'password_confirmation' => '',
    ]);

    // Periksa apakah pengalihan ke halaman pendaftaran kembali
    $response->assertRedirect(route('register'));

    // Periksa apakah pesan error untuk kolom input yang wajib diisi ada
    $response->assertSessionHasErrors(['name', 'username', 'email', 'password']);
});

