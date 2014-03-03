<?php

/**
 * @author Tom Gillespy
 * @copyright 2013
 */
$basedir = '/remotescope/';
$pagelinks = array (
                     "index.php" => "Home",
                     "scope.php" => "Scope Camera",
                     "zoom.php" => "Zoom Camera",
                     "stream.php" => "Raw Streams",
                     "schedule.php" => "Scheduling",
                     "roof.php" => "Roof Control",
                   )

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
     <link rel="shortcut icon" href="img/favicon.ico" />
    <title><?php echo $pagetitle; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">


  </head>
<?php 
  if (isset($body))
    {
        echo $body;
    }
    else
    {
        echo '<body>';
    }



?>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">RTCP</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php foreach ($pagelinks as $link => $caption)
              if ($_SERVER['PHP_SELF'] == $basedir.$link)
                {
                    echo '<li class="active"><a href="'.$link.'">'.$caption.'</a></li>';
                }
                else
                {
                    echo '<li><a href="'.$link.'">'.$caption.'</a></li>';
                }
            ?>
          </ul>
          <form class="navbar-form navbar-right" role="form">
            <div class="form-group">
              <input type="text" placeholder="Username" class="form-control" style="width: 150px;">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" style="width: 150px;">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>