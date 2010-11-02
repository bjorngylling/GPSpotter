<?php echo $this->Html->docType('xhtml-strict') ?>

<html>
  <head>
    <?php 
      echo $this->Html->charset();
      echo $this->Html->css(array('reset', 'master'));
      echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js'); 
      echo $scripts_for_layout;
    ?>
    
    <title><?php echo $title_for_layout ?></title>

  </head>
  
  <body>
    <div id="wrapper">
    	<div id="header">
      	<h1>GPSpotter</h1>
      </div>
      <div id="menu">
        <ul>
          <li><a href="#">Menu item 1</a> &bull; </li>
          <li><a href="#">Menu item 2</a></li>
        </ul>
      </div><!-- menu -->
      <div id="content">
        <?php echo $content_for_layout ?>
      </div><!-- content -->
      <div id="footer">
          Made by Björn Gylling (bjogy661)
      </div>

    </div> <!-- wrapper -->
  </body>
</html>