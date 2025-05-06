<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BR Architects</title>
  <link rel="stylesheet" href="/public/css/w3.css">
</head>
<body>

  <!-- Navbar -->
  <div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">
      <a href="index.php?page=home" class="w3-bar-item w3-button"><b>BR</b> Architects</a>
      <div class="w3-right w3-hide-small">
        <a href="#projects" class="w3-bar-item w3-button">Projects</a>
        <a href="#about" class="w3-bar-item w3-button">About</a>
        <a href="#contact" class="w3-bar-item w3-button">Contact</a>
        <a href="#Worker" class="w3-bar-item w3-button">Worker</a>
        <a href="#Standort" class="w3-bar-item w3-button">Standort</a>
      </div>
    </div>
  </div>

  <!-- Header -->
  <header id="home" class="w3-display-container w3-content w3-wide" style="max-width:1500px; margin-top:64px;">
    <img class="w3-image" src="../public/images/pic11.jpg" alt="Architecture" width="1500" height="800">
    <div class="w3-display-middle w3-margin-top w3-center">
      <h1 class="w3-xxlarge w3-text-white">
        <span class="w3-padding w3-black w3-opacity-min"><b>BR</b></span>
        <span class="w3-hide-small w3-text-light-grey">Architects</span>
      </h1>
    </div>
  </header>

  <!-- Page content -->
  <div class="w3-content w3-padding" style="max-width:1564px;">

    <!-- Projects Section -->
    <div id="projects" class="w3-container w3-padding-32">
      <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Projects</h3>
    </div>
    <div class="w3-row-padding">
      <?php
      $projects = [
        ['title'=>'Summer House','img'=>'sommerh.jpg','link'=>'index.php?page=shop'],
        ['title'=>'Brick House','img'=>'brickh.jpg'],
        ['title'=>'Beach House','img'=>'beachh.jpg'],
        ['title'=>'Barn House','img'=>'barnh.jpg'],
      ];
      foreach ($projects as $p): ?>
        <div class="w3-col l3 m6 w3-margin-bottom">
          <div class="w3-display-container">
            <div class="w3-display-topleft w3-padding">
              <a href="<?= isset($p['link']) ? htmlspecialchars($p['link'], ENT_QUOTES) : '#' ?>" class="w3-button w3-black w3-white-text">
                <?= htmlspecialchars($p['title'], ENT_QUOTES); ?>
              </a>
            </div>
            <a href="<?= isset($p['link']) ? htmlspecialchars($p['link'], ENT_QUOTES) : '#' ?>">
              <img src="../public/images/<?= htmlspecialchars($p['img'], ENT_QUOTES); ?>" alt="<?= htmlspecialchars($p['title'], ENT_QUOTES); ?>" style="width:100%">
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- About Section -->
    <div id="about" class="w3-container w3-padding-32">
      <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">About</h3>
      <p>
        Dieser Shop dient dazu passende Einrichtung für dein Haus zu finden. 
        Hier findest du alles was du brauchst um dein Haus zu einem Zuhause zu machen. 
        Damit unser Angebot ganz nach deinen vorstellungen passt, bieten wir dir mögliche Haustypen zur verfügung.
      </p>
    </div>

    <!-- Team Section -->
    <div id="Worker" class="w3-row-padding w3-grayscale">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Worker</h3>
      <?php
      $team = [
        ['name'=>'Cédric Sándor Soti','role'=>'CEO & Founder','img'=>'Ich1.jpg'],
        ['name'=>'Cédric Sándor Soti','role'=>'Architect','img'=>'Ich1.jpg'],
        ['name'=>'Cédric Sándor Soti','role'=>'Lernender','img'=>'Ich1.jpg'],
        ['name'=>'Cédric Sándor Soti','role'=>'Manager','img'=>'Ich1.jpg'],
      ];
      foreach ($team as $member): ?>
        <div class="w3-col l3 m6 w3-margin-bottom">
          <img src="../public/images/<?= htmlspecialchars($member['img'], ENT_QUOTES); ?>" alt="<?= htmlspecialchars($member['name'], ENT_QUOTES); ?>" style="width:100%">
          <h3><?= htmlspecialchars($member['name'], ENT_QUOTES); ?></h3>
          <p class="w3-opacity"><?= htmlspecialchars($member['role'], ENT_QUOTES); ?></p>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <p><button class="w3-button w3-black w3-white-text w3-block">Contact</button></p>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Contact Section -->
    <div id="contact" class="w3-container w3-padding-32">
      <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Contact</h3>
      <p>Let’s get in touch and talk about your next project.</p>
      <form action="/action_page.php" method="post" target="_blank">
        <input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required>
        <input class="w3-input w3-section w3-border" type="email" placeholder="Email" name="Email" required>
        <input class="w3-input w3-section w3-border" type="text" placeholder="Subject" name="Subject" required>
        <textarea class="w3-input w3-section w3-border" placeholder="Comment" name="Comment" required></textarea>
        <button class="w3-button w3-black w3-white-text w3-section" type="submit"><i class="fa fa-paper-plane"></i> SEND MESSAGE</button>
      </form>
    </div>

    <!-- Map Section -->
    <div id="Standort" class="w3-container w3-padding-32">
      <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Standort</h3>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2762.6320077204397!2d8.538319815850585!3d47.37631827917066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47900a0a8d5fd189%3A0x8aa4b3e84f39f99a!2sBahnhofstrasse%201%2C%208001%20Z%C3%BCrich!5e0!3m2!1sde!2sch!4v1714911234567!5m2!1sde!2sch"
        width="100%"
        height="450"
        style="border:0;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>

  </div>

  <!-- Footer -->
  <footer class="w3-center w3-black w3-padding-16">
    <p>Benutzer <a href="index.php?page=home" class="Logout-text-green">Logout</a></p>
  </footer>

</body>
</html>