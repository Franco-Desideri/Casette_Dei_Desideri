<!-- ***** Animazione di Caricamento ***** -->
<div id="js-preloader" class="js-preloader">
  <div class="preloader-inner">
    <span class="dot"></span>
    <div class="dots">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</div>

<!-- ***** Barra Superiore ***** -->
<div class="sub-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8">
        <ul class="info">
          <li><i class="fa fa-envelope"></i> CasetteDeiDesideri@gmail.com</li>
          <li><i class="fa-solid fa-location-dot"></i> Poggio Bustone, RI 057051</li>
        </ul>
      </div>
      <div class="col-lg-4 col-md-4">
        <ul class="social-links">
          <li><a href="#"><i class="fab fa-facebook"></i></a></li>
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- ***** Header principale e Menù di navigazione ***** -->
<header class="header-area header-sticky">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="main-nav">
          <a href="/Casette_Dei_Desideri/User/home" class="logo" style="white-space: nowrap;">
            <h1>Casette Dei Desideri</h1>
          </a>
            <ul class="nav">
              <li><a href="/Casette_Dei_Desideri/AdminContenuti/home"{if $smarty.server.REQUEST_URI == '/Casette_Dei_Desideri/AdminContenuti/home'} class="active"{/if}>Home</a></li>
              <li><a href="/Casette_Dei_Desideri/AdminStruttura/lista"{if $smarty.server.REQUEST_URI == '/Casette_Dei_Desideri/AdminStruttura/lista'} class="active"{/if}>Strutture</a></li>
              <li><a href="/Casette_Dei_Desideri/AdminProdotto/lista"{if $smarty.server.REQUEST_URI == '/Casette_Dei_Desideri/AdminProdotto/lista'}class="active"{/if}>Servizi</a></li>
              <li><a href="/Casette_Dei_Desideri/Admin/profilo"{if $smarty.server.REQUEST_URI == '/Casette_Dei_Desideri/Admin/profilo'}class="active"{/if}>Profilo</a></li>
            </ul>
          <a class='menu-trigger'><span>Menu</span></a>
        </nav>
      </div>
    </div>
  </div>
</header>

