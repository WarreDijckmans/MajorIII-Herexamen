<header class="header">
  <div class="menu
      <?php
      if (empty($_GET['menu']) || $_GET['menu'] == "inactive") {
        echo "inactive-menu";
      }
      ?>">
    <form class="menu-toggle" method="get"><input type="hidden" name="menu" value="inactive"><input type="submit" class="close" value=" "></form>
    <ul class="navbar">
      <li class="navItem-active"><a>Home</a></li>
      <li><a href="index.php?page=programma">Programma</a></li>
      <li><a>Contact</a></li>
    </ul>
  </div>
  <div class="header-content">
    <form class="menu-toggle" method="get"><input type="hidden" name="menu" value="active"><input type="submit" value=" "
        class="hamburger"></form>
    <div class="header-text">
      <h1 class="header-title">Internationaal Straattheater<span class="title-spacer">- </span>festival <span
          class="enter">beveren</h1>
      <p class="header-dates">vrij 24 - zon 25 <span class="enter"></span>augustus</p>
      <p class="header-gratis"> gratis</p>
    </div>
    <div class="header-image-align">
      <img class="header-image" src="./assets/img/main/clown.png" />
    </div>
  </div>

  <div class="background-gradient"></div>
</header>

<body>
  <div class="wrapper">
    <section class="spotlight">
      <ul class="spotlight-list">
        <?php foreach($spotlightActs as $spotlightAct){ ?>
        <li class="spotlight-item">
          <div class="spotlight-image">
          <?php if (file_exists("./assets/img/acts/".$spotlightAct['title']."/medium.jpg")) {
            $url = "./assets/img/acts/".$spotlightAct['title']."/medium.jpg";
          }else{
            $url = "./assets/img/acts/blanc/medium.jpg";
          }?>
            <img width="100%" src="<?php echo $url?>" /></div>
          <p class="spotlight-act-title"><?php echo $spotlightAct['title']?></p>
          <p class="spotlight-act-artist"><?php echo $spotlightAct['artist']?> (<?php echo $spotlightAct['country']?>)
          </p>
          <a class="spotlight-cta" href="index.php?page=detail&id=<?php echo $spotlightAct['id'] ?>">meer</a>
        </li>
        <?php } ?>
      </ul>
      <a class="spotlight-cta2" href="index.php?page=programma">Bekijk alle</a>
    </section>
    <section class="iconExplanation">
      <div class="subtitle-align">
        <div class="subtitle-line"></div>
        <h2 class="subtitle">de soorten acts</h2>
        <div class="subtitle-line"></div>
      </div>
      <div class="iconGroup">
        <ul class="iconGroup-labels">
          <li class="humor-icon">
            <p>Humor</p>
          </li>
          <li class="jongleren-icon">
            <p>Jongleren</p>
          </li>
          <li class="dans-icon">
            <p>Dans/<br>Muziek</p>
          </li>
          <li class="acro-icon">
            <p>Acrobatie</p>
          </li>
        </ul>
        <div class="iconGroup-image"></div>
      </div>
    </section>
    <section class="locations">
      <div class="subtitle-align">
        <div class="subtitle-line"></div>
        <h2 class="subtitle">de locaties</h2>
        <div class="subtitle-line"></div>
      </div>
      <div class="mapInterface">
        <ul class="mapMarker-group">
          <?php foreach($locations as $location){ ?>
          <li>
            <div>
              <p><?php echo $location["id"];?></p>
              <h3><?php echo $location["adres"];?><h3>
            </div>
          </li>
          <?php } ?>
        </ul>
        <img class="map" width="100%"  src="./assets/img/main/map.png" style="max-width: 768px;"/>
      </div>

    </section>
  </div>
  <section class="sponsers">
    <div class="subtitle-align">
      <div class="subtitle-line"></div>
      <h2 class="subtitle">onze helden</h2>
      <div class="subtitle-line"></div>
    </div>
    <div class="sponser-lineup">
      <img width="15%" src="./assets/img/sponsers/sponser1.png" />
      <img width="15%" src="./assets/img/sponsers/sponser2.png" />
      <img width="15%" src="./assets/img/sponsers/sponser3.png" />
      <img width="15%" src="./assets/img/sponsers/sponser4.png" />
      <img width="15%" src="./assets/img/sponsers/sponser5.png" />
    </div>
  </section>
</body>
<footer class="homeFooter">
  <div class="contact">
    <h3>Internationaal<br>Straattheaterfestival<br>Beveren<h3>
        <ul>
          <li>Erik Apers</li>
          <li>03 750 16 29</li>
          <li>erik.apers@beveren.be</li>
        </ul>
  </div>
  <div class="socials">
    <h3>Volg ons!</h3>
    <p>Of tag ons tijdens uw knots gekke momenten tijdens het festival</p>
    <ul>
      <li><img width="100%" src="./assets/img/icons/facebook icon.png" /></li>
      <li><img width="100%" src="./assets/img/icons/twitter icon.png" /></li>
      <li><img width="100%" src="./assets/img/icons/instagram icon.png" /></li>
    </ul>
  </div>
  <div class="volunteer">
    <h3>Wilt uw meewerken?</h3>
    <p>Laat het dan weten door uw email adres op te geven </p>
    <form action="post">
      <input class="email-input-volunteer" type="email" placeholder="email@domain.com">
      <input class="submit-volunteer" type="submit" value="Schrijf je in">
    </form>
  </div>
  <div class="footer-background-gradient"></div>
</footer>
