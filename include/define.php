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
  define('MagickLibVersion', '6.9.13');
  define('MagickVersion', MagickLibVersion . '-46');
  define('MagickReleaseDate', '2026-04-21');
  define('MagickReleaseUrl', "https://github.com/ImageMagick/ImageMagick6/releases/download/" . MagickVersion . "/");
?>
