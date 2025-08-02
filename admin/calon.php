<?php
session_start();
$loggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en" id="calonphp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIN</title>
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Coming+Soon&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/croc" rel="stylesheet">

</head>
<body>

<div class="Cnavbar">
<div class="navbar">
    <a href="index.php"><h1 class="logo">TIN</h1></a>
    <input type="checkbox" id="check">
    <div class="profile">
        <img src="img/icons/profile.svg" alt="">
        <span></span>
    </div>
    <div class="floating">
        <a href=""><img src="img/icons/profile.svg" alt=""><p>Profile</p></a>
        <a href=""><img src="img/icons/setting.svg" alt=""><p>setting</p></a>
        <a href=""><img src="img/icons/help.svg" alt=""><p>Help & Support</p></a>
        <a href=""><img src="img/icons/logout.svg" alt=""><p>Sign Out</p></a>
    </div>
</div>
</div>
<div class="below">
    <div class="Csidebar">
        <div class="sidebar">
            <div class="container">
                <img src="img/fj40.png" alt="">
                <a href="dashboard.php"><div class="options-s"><img src="img/fj40.png"><label>Dashboard</label></div></a>
                <a href="calon.php"><div class="options"><img src="img/fj40.png"><label>Calon PesDik</label></div></a>
                <a href="pesdik.php"><div class="options-s"><img src="img/fj40.png"><label>Peserta Didik</label></div></a>
                <input type="checkbox" id="check2">
            </div>
        </div>
    </div>
    <div class="content">
        <div class="counter">
            <div>
            <img src="img/icons/personbox.svg" alt="">
            </div>
            <div>
            <h3>Calon Peserta Didik <br> Terdaftar</h3>
            <p>109</p>
            </div>
        </div>
        
        <div class="table">
            <div class="tableopening">
                <p>Data calon peserta didik <br>2026</p>
                <div class="search">
                    <button><img src="img/icons/filter.svg" alt=""></button>
                    <input type="text">
                    <button> <img src="img/icons/search.svg" alt=""></button>
                </div>
            </div>
            <div class="tablecontent">
                <div class="top">
                    <p>ID</p>
                    <p>NIK</p>
                    <p>Nama Lengkap</p>
                    <p>Tanggal Lahir</p>
                    <p>Jenis Kelamin</p>
                    <p>Alamat Email</p>
                    <p>Nomor Telepon</p>
                    <p>Minat Jurusan</p>
                </div>
                <div class="bottom">
                    <div class="row">
                        <p>001</p>
                        <p>917498172984</p>
                        <p>Wildan Izhar Al Haqq</p>
                        <p>9/11/2025</p>
                        <p>Female</p>
                        <p>wildan@gmail.com</p>
                        <p>08123456789</p>
                        <p>RPL, DKV, TKJ</p>
                    </div>  
                </div>
            </div>
            <div class="tableclosing"></div>
        </div>
    </div>
</div>

<script>
function handleSidebar() {
    const checkbox = document.getElementById('check');
    const checkbox2 = document.getElementById('check2');
    const float = document.querySelector('.floating');
    const sidebar = document.querySelector('.sidebar');
    const isMobile = window.innerWidth < 768;

    if (!isMobile) {
        sidebar.style.display = 'flex';
        checkbox.checked = false;
    } else {
        checkbox2.style.display = 'flex';
        sidebar.style.display = checkbox.checked ? 'flex' : 'none';
    }
    
    if (checkbox2.checked)
        {
        sidebar.style.display = 'none';
        float.style.display = "flex";
        checkbox.checked = false;
    }
}

handleSidebar();

document.getElementById('check').addEventListener('change', handleSidebar);
document.getElementById('check2').addEventListener('change', handleSidebar);

window.addEventListener('resize', handleSidebar);
</script>


</body>
</html>
