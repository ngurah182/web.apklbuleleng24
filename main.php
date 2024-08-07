<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Data APKL</title>
</head>

<style>
  select {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            width: 200px;
            transition: border-color 0.3s ease;
        }

        select:focus {
            border-color: #007bff;
            outline: none;
        }
</style>

<body>

    <?php

    include 'menu/navbar.php';
    include 'menu/sidebar.php';

    ?>

    <?php
    // Fungsi untuk memuat halaman berdasarkan parameter GET 'page'
    function switchPage($page)
    {
      switch ($page) {
        case 'dashboard':
          include 'data/dashboard.html';
          break;
        case 'rekapanapkl':
          include 'data/rekapanapkl.html';
          break;
        case 'rekapkec':
          include 'kecamatan/rekapkec.php';
          break;
        default:
          include 'data/dashboard.html';
      }
    }

    // Memuat halaman berdasarkan parameter GET 'page'
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switchPage($page);
    } else {
        // Halaman default
        switchPage('dashboard');
    }
    ?>

<script>
        document.addEventListener('DOMContentLoaded', function () {
          // Ambil username dari localStorage
          const username = localStorage.getItem('username');
    
          if (username) {
            document.getElementById('usernameDisplay').innerText = username;
          } else {
            // Jika tidak ada username di localStorage, redirect ke halaman login
            Swal.fire({
              icon: 'warning',
              title: 'Session Expired',
              text: 'Please log in again.'
            }).then(() => {
              window.location.href = 'index.html'; // Ganti dengan URL halaman login Anda
            });
          }
    
          // Tambahkan event listener untuk logout
          document.getElementById('logoutLink').addEventListener('click', function (e) {
            e.preventDefault();
    
            // Hapus username dari localStorage
            localStorage.removeItem('username');
    
            // Tampilkan pesan logout berhasil
            Swal.fire({
              icon: 'success',
              title: 'Logout Successful',
              text: 'You have been logged out.'
            }).then(() => {
              // Redirect ke halaman login
              window.location.href = 'index.html'; // Ganti dengan URL halaman login Anda
            });
          });
        });
      </script>
</body>
</html>