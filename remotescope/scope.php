<?php

/**
 * @author Tom Gillespy
 * @copyright 2013
 */
$body = '<body onload="createImageLayer();" style="cursor: default;">';
$pagetitle = 'Remote Scope Control Panel';
include('includes/page_header.php');
?>
<script type="text/javascript">


      /* Copyright (C) 2007 Richard Atterer, richard©atterer.net
       * This program is free software; you can redistribute it and/or modify it
       * under the terms of the GNU General Public License, version 2. See the file
       * COPYING for details.
       */

      var imageNr = 0; // Serial number of current image
      var finished = new Array(); // References to img objects which have finished downloading
      var paused = false;
      var previous_time = new Date();

      function createImageLayer() {
        var img = new Image();
        img.style.position = "absolute";
        img.style.zIndex = -1;
        img.onload = imageOnload;
        img.onclick = imageOnclick;
        img.style.maxHeight = "100%";
        img.style.maxWidth = "100%";
        //img.width = 640;
        //img.height = 480;
        img.src = "ajax/getimage.php";
        var webcam = document.getElementById("webcam");
        webcam.insertBefore(img, webcam.firstChild);
      }

      // Two layers are always present (except at the very beginning), to avoid flicker
      function imageOnload() {
        this.style.zIndex = imageNr; // Image finished, bring to front!
        while (1 < finished.length) {
          var del = finished.shift(); // Delete old image(s) from document
          del.parentNode.removeChild(del);
        }
        finished.push(this);
        current_time = new Date();
        delta = current_time.getTime() - previous_time.getTime();
        fps   = (1000.0 / delta).toFixed(3);
        
        //document.getElementById('info').innerHTML = delta + " ms (" + fps + " fps)";
        document.getElementById('info').innerHTML = fps + " FPS (" + delta + " ms between images)";
        previous_time = current_time;
        if (!paused) createImageLayer();
      }

      function imageOnclick() { // Clicking on the image will pause the stream
        paused = !paused;
        if (!paused) createImageLayer();
      }

    
</script>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Main Telescope Control</h1>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-6">
          <h2>Control</h2>
            <div class="btn-group">
              <button type="button" class="btn btn-default">Left</button>
              <button type="button" class="btn btn-default" onclick="panservo(0,0)">Reset</button>
              <button type="button" class="btn btn-default">Right</button>
            </div>
        </div>
        <div class="col-md-6">
          <h2>Image:</h2>
          <div class="alert alert-info"><strong>Image Framerate: </strong><span id="info"></span></div>
          <div id="webcam" style="height: 500px;"></div>
       </div>
      </div>

<?php 
  include('includes/page_footer.php'); 
?>
    <script type="text/javascript">
      var servoposition = 5000;
       function panservo(servo, direction)
         {
            $.ajax({
               url: 'ajax/servotest.php',
               data: 'position=' + servoposition + '&servo=' + servo,
            });
            console.log(servo);
            console.log(direction);
         }
    </script>
<?php
  include('includes/page_end.php');
?>
