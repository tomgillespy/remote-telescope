<?php

/**
 * @author Tom Gillespy
 * @copyright 2013
 */
$body = '';
$pagetitle = 'Position | Remote Scope Control Panel';
include('includes/page_header.php');
?>
<script type="text/javascript">
function rotate(value)
{
document.getElementById('arrowdiv').style.webkitTransform="rotate(" + value + "deg)";
document.getElementById('arrowdiv').style.msTransform="rotate(" + value + "deg)";
document.getElementById('arrowdiv').style.MozTransform="rotate(" + value + "deg)";
document.getElementById('arrowdiv').style.OTransform="rotate(" + value + "deg)";
document.getElementById('arrowdiv').style.transform="rotate(" + value + "deg)";
}
function rotatealt(value)
{
document.getElementById('arrowalt').style.webkitTransform="rotate(" + value + "deg)";
document.getElementById('arrowalt').style.msTransform="rotate(" + value + "deg)";
document.getElementById('arrowalt').style.MozTransform="rotate(" + value + "deg)";
document.getElementById('arrowalt').style.OTransform="rotate(" + value + "deg)";
document.getElementById('arrowalt').style.transform="rotate(" + value + "deg)";
}


</script>
<style type="text/css">
.bottomrightrot {
-webkit-transform-origin: 50% 100%;
-moz-transform-origin: 50% 100%;
-ms-transform-origin: 50% 100%;
-o-transform-origin: 50% 100%;
transform-origin: 50% 100%;
}
</style>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Telescope Position Indicator</h1>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-6">
        <h2>Azimuth Indictor</h2>
          <div style="background-image: url('img/compass.jpg'); background-repeat: no-repeat; width: 473px; height: 479px; vertical-align: middle;">
              <div id="arrowdiv" style="width: 205px; height: 479px; margin: auto; padding-top: 34px;">
                <img src="img/arrow.png" />
              </div>
          </div>
          <input type="range" min="-180" max="180" value="7" onchange="rotate(this.value)" />
        </div>
        <div class="col-md-6">
        <h2>Altitude Indicator</h2>
          <div style="background-image: url('img/altitude.png'); background-repeat: no-repeat; width: 473px; height: 479px; vertical-align: middle;">
            <img src="img/arrow.png" id="arrowalt" class="bottomrightrot" style="margin-top: 33px; margin-left: 342px; margin-right: 0px; margin-bottom: 0px;"/>
          </div>
          <input type="range" min="-95" max="3" value="7" onchange="rotatealt(this.value)" />
       </div>
      </div>

<?php 
  include('includes/page_footer.php'); 
?>




<?php
  include('includes/page_end.php');
?>
