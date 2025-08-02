<?php
session_start();
$loggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
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
                <a href="dashboard.php"><div class="options"><img src="img/fj40.png"><label>Dashboard</label></div></a>
                <a href="calon.php"><div class="options-s"><img src="img/fj40.png"><label>Calon PesDik</label></div></a>
                <a href="pesdik.php"><div class="options-s"><img src="img/fj40.png"><label>Peserta Didik</label></div></a>
                <input type="checkbox" id="check2">
            </div>
        </div>
    </div>
    <div class="content">
        <div class="widgets">
            <div class="calonpesdik">
                <img src="img/icons/personbox.svg" alt="img">
                <h3>Calon Peserta Didik</h3>
                <h1>107</h1>
                <h2>Jumlah</h2>
            </div>
            <div class="pesdik">
                <img src="img/icons/personbox.svg" alt="img">
                <h3>Peserta Didik</h3>
                <h1>300</h1>
                <h2>Jumlah</h2>
                
            </div>
            <div class="guru">
                <img src="img/icons/personbox.svg" alt="img">
                <h3>Pendidik</h3>
                <h1>100</h1>
                <h2>Jumlah</h2>
                
            </div>
            <div class="nonguru">
                <img src="img/icons/personbox.svg" alt="img">
                <h3>Non Kependidik</h3>
                <h1>94</h1>
                <h2>Jumlah</h2>
            </div>
        </div>

            <div class="calendar">
                <p>Calendar</p>
                <hr>
                <h3>July 2025</h3>
            </div>
            
            <div class="something">
                
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
