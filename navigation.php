<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Rent-a-Car</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Page 3</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php
            if(isset($_SESSION["gebruiker"]))
            {
              echo '<li><p class="navbar-btn" data-toggle="modal" data-target="#modal"><a href="session/logout.php" class="btn btn-danger" style="margin-right: 10px;">Log uit</a></li>';
            } else {
              echo '<li><p class="navbar-btn" data-toggle="modal" data-target="#modal"><a href="#" class="btn btn-success" style="margin-right: 10px;">Log in</a></li>';
            }
          ?>
        </ul>
      </div>
</nav>
