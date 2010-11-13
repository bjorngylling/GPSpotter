<?php echo $this->Html->docType('xhtml-strict') ?>

<html>
  <head>
    <?php 
      echo $this->Html->charset();
      echo $this->Html->css(array('reset', 'master'));
      echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js'); 
      echo $scripts_for_layout;
    ?>
    
    <title>GPSpotter - <?php echo $title_for_layout ?></title>

  </head>
  
  <body>
    <div id="wrapper">
      <div id="header">
        <h1>GPSpotter</h1>
      </div>
      <div id="menu">
        <ul>
          <li><?php echo $this->Html->link(__('List Gps Units', true), array('controller' => 'gps_units', 'action' => 'index'));?> &bull; </li>
          <li><a href="#">Menu item 2</a></li>
        </ul>
      </div><!-- menu -->
      <div id="content">
        <?php echo $this->Session->flash(); ?>

        <?php echo $content_for_layout ?>
      </div><!-- content -->
      <div id="footer">
          Made by Björn Gylling (bjogy661)
      </div>
    </div> <!-- wrapper -->
    <?php if (Configure::read('debug') == 2) { ?>

    <style type="text/css">
        .cake-sql-log { display: none; }
    </style>
    <script language="javascript">
        <!--
        $(document).ready(function() {
            $("#sql_toggle").click(function() {
                $('.cake-sql-log').toggle();

            });
        });    
        -->
    </script>
    <a href="#" id="sql_toggle">[Expand/Collapse SQL]</a>

    <?php } 
    echo $this->element('sql_dump'); ?>
  </body>
</html>