<?php
// auth.php — include di semua halaman
session_start();

function isLoggedIn() {
    return isset($_SESSION['user_id']) || isset($_SESSION['owner_id']);
}

function currentUser() {
    return [
        'id'   => $_SESSION['user_id'] ?? $_SESSION['owner_id'] ?? null,
        'nama' => $_SESSION['user_nama'] ?? $_SESSION['owner_nama'] ?? null,
    ];
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php?redirect=' . urlencode($_SERVER['REQUEST_URI']));
        exit;
    }
}