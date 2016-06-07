    <nav class="navbar  navbar-inverse" style="background-color:#2E3092">
     
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="padnav border"><a href="index.php" ><strong class="<?php echo $home;?>">HOME</strong></a></li>
            <li class="border padnav"><a href="profil.php"><strong class="<?php echo $profil;?>">PROFIL</strong></a></li>
            <li class=" border padnav"><a href="publis_kami.php"><strong class="<?php echo $publis_kami;?>">PUBLISHING</strong></a></li>
            <li class=" border padnav"><a href="news.php"><strong class="<?php echo $news;?>">NEWS</strong></a></li>
            <li class=" border padnav"><a href="info_lomba.php"><strong class="<?php echo $lomba;?>">COMPETITION</strong></a></li>
            <li class=" border padnav"><a href="info_beasiswa.php"><strong class="<?php echo $beasiswa;?>">SCHOLARSHIP</strong></a></li>
            <li class=" border padnav"><a href="#contact"><strong>CONTACT</strong></a></li>
   
          </ul>
		  <span class="pull-right padnav" style="color:#fff;font-size:17px;padding-top: 25px;" ><strong>Today is: <?php echo date('H:i');?></strong></span>
        </div><!-- /.nav-collapse -->
    </nav><!-- /.navbar -->