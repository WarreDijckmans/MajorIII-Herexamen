<?php function amount() { 
    if(!isset($_GET['limit'])){
      return "1";
    }else{ 
      return $_GET['limit'];
    }};
?>
<?php $actsToShow = 8 ?>
<header class="header-programma 
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
    <form class="menu-toggle" action="" method="get"><input type="hidden" name="page" value="programma"><input type="hidden" name="menu" value="inactive"><input type="submit" value=" " class="close"></form>
    <ul class="navbar">
      <li><a href="index.php">Home</a></li>
      <li class="navItem-active"><a href="index.php?page=programma">Programma</a></li>
      <li><a>Contact</a></li>
    </ul>
  </div>
  <div class="header-content">
  <form class="menu-toggle" action="" method="get"><input type="hidden" name="page" value="programma"><input type="hidden" name="menu" value="active"><input type="submit" value="" class="hamburger"></form>
  <h1 class="header-title">Internationaal <span class="enter"> Straattheaterfestival <span class="enter">beveren</h1>
  </div>
  <div class="background-gradient"></div>
</header>
<body>
  <form class="filterForm" method="get">
    <div class="filter"> 
    <input type="hidden" name="page" value="programma">
    <fieldset class="filter-fieldset">
      <input class="search" type="search" name="search" placeholder="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search']; }?>">
      <div class="days-align">
        <input class="day-selector" id="alle" type="radio" name="days" value="alle" checked <?php if (isset($_GET['days']) && $_GET['days']=="alle") { echo "checked"; }?>><label class="day-label" for="alle">alle <span class="full">dagen</span></label>

        <input class="day-selector" id="24" type="radio" name="days" value="24" <?php if (isset($_GET['days']) && $_GET['days']=="24") { echo "checked"; }?>><label class="day-label" for="24">vr<span class="full">ijdag</span> 24</label>

        <input class="day-selector" id="25" type="radio" name="days" value="25" <?php if (isset($_GET['days']) && $_GET['days']=="25") { echo "checked"; }?>><label class="day-label" for="25">za<span class="full">terdag</span> 25</label>

        <input class="day-selector" id="26" type="radio" name="days" value="26" <?php if (isset($_GET['days']) && $_GET['days']=="26") { echo "checked"; }?>><label class="day-label" for="26">zo<span class="full">ndag</span> 26</label>
      </div>

      <div>
      <button class="dropdown" name="extraFilters" type="submit" <?php if(isset($_GET['extraFilters']) && $_GET['extraFilters']==1){echo 'style="border:none;"';}else{echo 'style="border-bottom: solid var(--primary-color) 0.2rem;"';}?> value="<?php if(!isset($_GET['extraFilters']) || $_GET['extraFilters']==0 ){echo 1;}else{echo 0;} ?>">Extra filters</button>
    </div>

      <fieldset class="extraFilters" <?php if(!isset($_GET['extraFilters']) || $_GET['extraFilters']!=1){echo 'style="display:none;"';}else{echo 'style="display:block;"';} ?>>
      <div class="align-inputs">
      <div class="childfriendly">
        <input class="childfriendly-selector" type="checkbox" value="1" id="childfriendly" name="childfriendly" <?php if (isset($_GET['childfriendly']) && $_GET['childfriendly']==1) { echo "checked"; }?>><label class="childfriendly-label" for="childfriendly">Kind vriendelijk</label>
      </div>

      <div class="types">
        <div>
        <input class="type-selector" id="mobiel" type="radio" name="type" value="mobiel" <?php if (isset($_GET['type']) && $_GET['type']=="mobiel") { echo "checked"; }?>><label class="type-label" for="mobiel">mobiel</label>
        </div>

        <div>
        <input class="type-selector" id="op podium" type="radio" name="type" value="op podium" <?php if (isset($_GET['type']) && $_GET['type']=="op podium") { echo "checked"; }?>><label class="type-label" for="op podium">op podium</label>
        </div>

        <div>
        <input class="type-selector" id="op straat" type="radio" name="type" value="op straat" <?php if (isset($_GET['type']) && $_GET['type']=="op straat") { echo "checked"; }?>><label class="type-label" for="op straat">op straat</label>
        </div>
      </div>
      </div>
      <div class="soorten">
        <div class="soort-align">
          <input class="soort-selector" id="humor" type="radio" name="soort" value="humor" <?php if (isset($_GET['soort']) && $_GET['soort']=="humor") { echo "checked"; }?>>
          <label class="soort-label soort-label-humor" for="humor">humor</label>
        </div>

        <div class="soort-align">
          <input class="soort-selector" id="dans/muziek" type="radio" name="soort" value="dans/muziek" <?php if (isset($_GET['soort']) && $_GET['soort']=="dans/muziek") { echo "checked"; }?>>
          <label class="soort-label soort-label-muziek" for="dans/muziek">dans/<br>muziek</label>
        </div>

        <div class="soort-align">
          <input class="soort-selector" id="acrobatie" type="radio" name="soort" value="acrobatie" <?php if (isset($_GET['soort']) && $_GET['soort']=="acrobatie") { echo "checked"; }?>>
          <label class="soort-label soort-label-acrobatie" for="acrobatie">acrobatie</label>
        </div>

        <div class="soort-align">
          <input class="soort-selector" id="jongleren" type="radio" name="soort" value="jongleren" <?php if (isset($_GET['soort']) && $_GET['soort']=="jongleren") { echo "checked"; }?>>
          <label class="soort-label soort-label-jongleren" for="jongleren">jongleren</label>
        </div>
      </div>
      </fieldset>
      <div class="submit-filter">
        <a class="clear" href="index.php?page=programma">clear</a>
        <input type="submit" value="filter" >
      </div>
    </fieldset>
    </div>
  <section class="acts">

    <ul class="acts-container">
      <?php $current = 1?>
      <?php foreach($acts as $act){ ?>
      <?php if($current <= (amount()*$actsToShow) && $current > (amount()*$actsToShow)-$actsToShow ){?>
      <li class="act <?php if ($current% 2 == 0) { echo "act-even"; }?>">
        <div class="act-image">
          <?php if (file_exists("./assets/img/acts/".$act['title']."/small.jpg")) {
            $url = "./assets/img/acts/".$act['title']."/small.jpg";
          }else{
            $url = "./assets/img/acts/blanc/small.jpg";
          }?>
          <img width="100%" src="<?php echo $url?>">
        </div>
        <div class="act-info">
          <p class="act-title"><?php echo $act['title']?></p>
          <p class="act-artist"><?php echo $act['artist']?></p>
          <ul class="act-days">
            <?php $lastDay = ""?>
            <?php foreach($days as $day){ ?>
              <?php if($day['act_id']==$act['id'] && $day['day_name'] != $lastDay){
                echo '<li>',substr($day['day_name'], 0,2)," ",$day['day'],'</li>';
                $lastDay = $day['day_name'];
                }?>
            <?php } ?>
          </ul>
          <a class="act-cta" href="index.php?page=detail&id=<?php echo $act['id'] ?>">Lees meer</a>
        </div>
      </li>
      <?php } ?>
      <?php $current += 1; ?>
      <?php } ?>
    </ul>
  </section>
  <section class="controls">
    <button class="next" name="limit" type="submit" value="<?php  echo amount()-1; ?>"  <?php if(amount() <= 1){echo "disabled";} ?>>< <span class="full">Vorige</span></button>
    <p><?php echo amount()."-".ceil($amountOfActs/$actsToShow) ?></p>
    <button class="next" name="limit" type="submit" value="<?php  echo amount()+1; ?>"  <?php if(amount() >= ceil($amountOfActs/$actsToShow)){echo "disabled";} ?>><span class="full">Volgende</span> ></button>
  </section>
  </form>
</body>
<footer class="programmaFooter">
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

