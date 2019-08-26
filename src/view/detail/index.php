<header class="header-detail 
      <?php
      if (isset($_GET['menu']) && $_GET['menu'] == "active") {
        echo "header-active";
      }
      ?>">
  <div class="menu
      <?php
      if (empty($_GET['menu']) || $_GET['menu'] == "inactive") {
        echo "inactive-menu";
      }
      ?>">
    <form class="menu-toggle" action="" method="get"><input type="hidden" name="page" value="detail"><input
        type="hidden" name="id" value="<?php echo $_GET['id'] ?>"><input type="hidden" name="menu"
        value="inactive"><input type="submit" value="" class="close"></form>
    <ul class="navbar">
      <li><a href="index.php">Home</a></li>
      <li class="navItem-active"><a href="index.php?page=programma">Programma</a></li>
      <li><a>Contact</a></li>
    </ul>
  </div>
  <div class="header-content">
    <form class="menu-toggle" action="" method="get"><input type="hidden" name="page" value="detail"><input
        type="hidden" name="id" value="<?php echo $_GET['id'] ?>"><input type="hidden" name="menu" value="active"><input
        type="submit" value="" class="hamburger"></form>
    <h1 class="header-title">Internationaal <span class="enter"> Straattheaterfestival <span class="enter">beveren</h1>
  </div>
  <div class="background-gradient"></div>
</header>

<body>
  <section class="detail-banner">
    <div class="carousel-wrapper">
      <div class="carousel">
        <?php for ($i = 1; $i <= 3; $i++){ ?>
        <?php if (file_exists("./assets/img/acts/".$act['title']."/large_".$i."@1x.jpg")) {
                    $url = "./assets/img/acts/".$act['title']."/large_".$i."@1x.jpg";
                }else{
                    $url = "./assets/img/acts/blanc/large@1x.jpg";
                }?>
        <img class="banner-image" height="100%" src="<?php echo $url?>" />
        <?php } ?>
      </div>
    </div>

    <div class="act-detail">
      <div>
        <p class="act-title"><?php echo $act['title']?></p>
        <p class="act-artist"><?php echo $act['artist']?></p>
      </div>
      <ul class="act-days">


        <ul class="vrijdag-list">
          <li>Vr<span class="full">ijdag</span> 24</li>
          <?php foreach($days as $day){?>
          <?php if($day['day'] == 24){ echo "<li>".$day['time']."</li>";  }?>
          <?php }?>
        </ul>

        <ul class="zaterdag-list">
          <li>Za<span class="full">terdag</span> 25</li>
          <?php foreach($days as $day){?>
          <?php if($day['day'] == 25){ echo "<li>".$day['time']."</li>";  }?>
          <?php }?>
        </ul>

        <ul class="zondag-list">
          <li>Zo<span class="full">ndag</span> 26</li>
          <?php foreach($days as $day){?>
          <?php if($day['day'] == 26){ echo "<li>".$day['time']."</li>";  }?>
          <?php }?>
        </ul>
      </ul>
    </div>
  </section>
  <section class="discription">
      <h2>beschrijving</h2>
      <div>
      <p class="text"><?php echo $act['discription'] ?></p>
      <?php if($act['website'] !== ""){
          echo "<a class='website' href='https://".$act['website']."'></a>";
      }?>
      </div>
  </section>
  <section class="location">
  <h2>de locatie</h2>
  <div class="mapInterface">
  <div>
  <ul class="mapMarker-group">
          <?php $current = 1?>
          <?php foreach($locations as $location){ ?>
          <li class="<?php if ($act['location_id'] == $current) echo "activeMarker" ?>">
            <div>
              <p><?php echo $location["id"];?></p>
              <h3><?php echo $location["adres"];?><h3>
            </div>
          </li>
          <?php $current += 1; ?>
          <?php } ?>
        </ul>
        <img class="map" width="100%" src="./assets/img/main/map.png" style="max-width: 768px;"/>
        </div>
  </div>
  </section>
  <section class="soortgelijk">
    <div class="subtitle-align">
        <div class="subtitle-line"></div>
        <h2 class="subtitle">soort gelijke voorstellingen</h2>
        <div class="subtitle-line"></div>
    </div>
    <ul class="suggestion-list">
        <?php foreach($suggestionActs as $suggestionAct){ ?>
        <li class="suggestion-item">
          <div class="suggestion-image">
          <?php if (file_exists("./assets/img/acts/".$suggestionAct['title']."/medium.jpg")) {
            $url = "./assets/img/acts/".$suggestionAct['title']."/medium.jpg";
          }else{
            $url = "./assets/img/acts/blanc/medium.jpg";
          }?>
            <img width="100%" src="<?php echo $url?>" /></div>
          <p class="suggestion-act-title"><?php echo $suggestionAct['title']?></p>
          <p class="suggestion-act-artist"><?php echo $suggestionAct['artist']?> (<?php echo $suggestionAct['country']?>)
          </p>
          <a class="suggestion-cta" href="index.php?page=detail&id=<?php echo $suggestionAct['id'] ?>">meer</a>
        </li>
        <?php } ?>
      </ul>
  </section>
</body>
<footer class="detailFooter">
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
