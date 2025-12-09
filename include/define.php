<?php
if (!isset($_SESSION) || !is_array($_SESSION)) {
  header("Location: ../script/index.php");
  exit();
}
?>
<?php
  /*
    ImageMagick Constants.
  */
  define('MagickDevelopmentTeam', 'support-magick-0x01@urban-warrior.org');
  define('MagickMajorReleaseText', '6');
  define('MagickLibVersionText', '6.9.13');
  define('MagickLibSubversion', '-17');
  define('MagickReleaseDate', '2024-05-05');
?>
