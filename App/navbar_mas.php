<?php
session_start();
if($_SESSION['status']!="login"){
  header('Location:../index.php?error=login');
}
$pageName =  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
?>
<style>
  *{
    --bg:#016872;
  --color: #a0dfdf;
  --gap: 0.5rem;
  --radius: 5px;
  }
  nav {
  background-color: #016872;
  display: flex;
  color:#a0dfdf;
  justify-content: space-between;
  padding: 1rem 2rem;
}

.dropDown {
  background-color: white;
  display: flex;
  align-items: center;
  justify-content: flex-start;
  column-gap: var(--gap);
  padding: 0.6rem;
  cursor: pointer;
  border-radius: var(--radius);
  border: none;
  position: relative;
}


.dropdown {
  position: absolute;
  width: 150px;
  border-radius: var(--radius);
  margin-top: 0.3rem;
  background: white;
  color:var(--bg);
  visibility: hidden;
  opacity: 0;
  transform: translateY(0.5rem);
  transition: all 0.1s cubic-bezier(0.16, 1, 0.5, 1);
}
#btn-drop{
  background-color: #016872;
        color: #fff;
}

.dropdown a {
  display: flex;
  align-items: center;
  column-gap: var(--gap);
  padding: 0.8rem 1rem;
  color: var(--bg);
  text-decoration: none;
}

.dropdown a:hover {
  background-color: #fff;
  color:var(--color);
  border-radius: var(--radius);

}

.show {
  visibility: visible;
  opacity: 1;
  transform: translateY(0rem);
}
.active-class{
  color:var(--bg);
  background:var(--color);
}
.arrow {
  transform: rotate(180deg);
  transition: 0.2s ease;
}
#arrow{
  color: var(--color);
}
#arrow:hover{
  
  color: #fff;
}
nav ul {
  display: flex;
  align-items: center;
  gap: 2rem;
  list-style: none;
}


nav ul li a {
  text-decoration: none;
  font-family: "Segoe UI", sans-serif;
  color: #a0dfdf;
  font-weight: 600;
  padding: 8px 0;
  transition: all ease-in-out .1s;
  border-bottom: 1px solid rgba(255, 68, 0, 0);
}

nav ul li a:hover {
  color: #fff;
}
.activeClass{
  color: #fff;
  border-bottom: 2px solid #fff;
}
.menu-icon {
  /* background-color: tomato; */
  cursor:pointer;
  font-size: 28px;
  display: none;
}

main {
  padding-top: 7rem;
}

@media only screen and (max-width: 768px) {
  nav {
    flex-wrap: wrap;
    position: fixed;
    width: 100%;
    top: 0;
  }

  nav ul {
    margin-left:0;
    flex-direction: column;
    width: 100%;
  }

  nav ul li:last-of-type {
    padding-bottom: 8px;
  }

  nav ul.hidden {
    display: none;
  }

  .menu-icon {
    display: flex;
    align-items: center;
  }
}
</style>
<nav class="main-header navbar">
<div class="container">
      <div class="navbar-brand">
        <span class="brand-text font-weight-bold">SI LELANG</span>
      </div>
      <div id="menu-icon" class="menu-icon">
        <i class="ph-fill ph-list"></i>
      </div>
      <ul id="menu-list" class="hidden">
        <li>
          <a class="<?= $pageName == 'localhost:8080/Lelang_Web/Masyarakat/index.php' ? 'activeClass':'';?>" href="index.php">Home</a>
        </li>
        <li>
          <a class="<?= $pageName == 'localhost:8080/Lelang_Web/Masyarakat/penawaran.php' ? 'activeClass':'';?>" href="penawaran.php">Penawaran</a>
        </li>
        <li>
          <a class="<?= $pageName == 'localhost:8080/Lelang_Web/Masyarakat/history.php' ? 'activeClass':'';?>" href="history.php">History</a>
        </li>
        <li>
        <ul class="ml-auto">
          <div class="d">
              <button class="dropDown btn" id="btn-drop">
                <i class="nav-icon fas fa-bars" id="arrow"></i>
              </button>
              <div class="dropdown" id="dropdown">
                <a class="<?= $pageName == 'localhost:8080/Lelang_Web/Masyarakat/profil.php' ? 'active-class':'';?>" href="profil.php">
                <i class="nav-icon fas fa-user "></i> Profil
                </a>
                <a href="../logout.php">
                  <i class="nav-icon fas fa-power-off"></i>
                  Log Out 
                </a>
                
              </div>
            </div>
          </ul>
        <!-- <ul class="ml-auto">
        <li>
        <a class="<?= $pageName == 'localhost:8080/Lelang_Web/Masyarakat/profil.php' ? 'activeClass':'';?>" href="profil.php">
        <i class="nav-icon fas fa-user "></i>
          </a>
        </li>
        <li>
          <a href="../logout.php">
          <i class="nav-icon fas fa-power-off "></i>
          <span>logout</span>
          </a>
        </li>
        </ul> -->
      </ul>
    </div>
    </nav>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script>

const menuIcon = document.getElementById("menu-icon");
const menuList = document.getElementById("menu-list");

menuIcon.addEventListener("click", () => {
  menuList.classList.toggle("hidden");
});
     const dropdownBtn = document.getElementById("btn-drop");
      const dropdownMenu = document.getElementById("dropdown");
      const toggleArrow = document.getElementById("arrow");

      // Toggle dropdown function
      const toggleDropdown = function () {
        dropdownMenu.classList.toggle("show");
        toggleArrow.classList.toggle("arrow");
      };

      // Toggle dropdown open/close when dropdown button is clicked
      dropdownBtn.addEventListener("click", function (e) {
        e.stopPropagation();
        toggleDropdown();
      });

      // Close dropdown when dom element is clicked
      document.documentElement.addEventListener("click", function () {
        if (dropdownMenu.classList.contains("show")) {
          toggleDropdown();
        }
      });
    </script>
