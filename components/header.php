<?php

require_once "functions.php";


function headerHead()
{
  return '<link rel="stylesheet" href="./assets/css/navbar.css">';
}
function headerNav()
{
  $result = getSiteInformation();

  return empty($_COOKIE['token']) ? '<div class="container">
    <nav class="navbar navbar-expand-lg rounded text-dark" aria-label="Eleventh navbar">
      <div class="container-fluid">
        <a class="navbar-brand text-dark" href="/">' . $result['name'] . '</a>
        <a href="/view/sign-in" class="btn text-light btn-sign"
        style="background:var(--color1);">Войти</a>
        <div class="collapse navbar-collapse" id="navbarsExample09">
        </div>
      </div>
    </nav>

': '<div class="container">
<nav class="navbar navbar-expand-lg rounded text-dark" aria-label="Eleventh navbar">
  <div class="container-fluid">
    <a class="navbar-brand text-dark" href="/">' . $result['name'] . '</a>
    <a href="/view/profile" class="btn text-light btn-sign"
    style="background:var(--color1);">Профиль</a>
    <div class="collapse navbar-collapse" id="navbarsExample09">
    </div>
  </div>
</nav>

';
}

