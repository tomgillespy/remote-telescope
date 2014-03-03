<?php

/**
 * @author Tom Gillespy
 * @copyright 2013
 */

$pagetitle = 'Remote Scope Control Panel';
include('includes/page_header.php');
?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Remote Telescope Control Panel</h1>
        <p>Welcome to remotescope.gillespy.net, the main control panel for a cheap, low power remote telescope using open source or very cheap software and hardware to provide a viewing platform and scheduler for astronomical and terrestial observations.</p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Conditions</h2>
          <p>Current Temperature: 5&deg;C</p>
          <p>Current Sky Temperature: -6&deg;C</p>
          <p>Current CPU Temperature: <?php echo  number_format(shell_exec('cat /sys/class/thermal/thermal_zone0/temp')/1000,1); ?>&deg;C</p>
          <div class="alert alert-info">These are currently static values (except for CPU temperature).</div>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Status:</h2>
          <div class="alert alert-danger"><strong>Servos:</strong> OFFLINE</strong></div>
          <div class="alert alert-info"><strong>Telescope:</strong> AT HOME POSITION</div>
          <div class="alert alert-success"><strong>Roof:</strong> CLOSED AND LOCKED</div>
          <div class="alert alert-warning"><strong>Aux Zoom Camera:</strong> OFFLINE</div>
          <p><a class="btn btn-default"  href="stream.php" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Current Main Camera View</h2>
          <p><img style="max-width: 100%; max-height: 100%;" src="ajax/getimage.php" id="camimage" onclick="refreshcamimage()" /></p>
          <div class="alert alert-success"><strong>Camera Online</strong> The camera is currently online. The image above is current as of: <div id="updatetime">Page Loaded Time.</div></div>
          <p><a class="btn btn-default"  href="stream.php" role="button">View details &raquo;</a></p>
        </div>
      </div>

<?php 
  include('includes/page_footer.php'); 
?>
    <script type="text/javascript">
      function refreshcamimage() {
        d = new Date();
        $("#camimage").attr("src", "ajax/getimage.php?timestamp=" + d.getTime());
        $("#updatetime").html(d);
      }
    </script>
<?php
  include('includes/page_end.php');
?>
