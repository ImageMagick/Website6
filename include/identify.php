<div>
<h1 class="text-center">Image Format and Characteristics</h1>
<p class="text-center"><a href="#usage">Example Usage</a> • <a href="#options">Option Summary</a></p>

<p class="lead">The <code>identify</code> program describes the format and characteristics of one or more image files. It also reports if an image is incomplete or corrupt. The information returned includes the image number, the file name, the width and height of the image, whether the image is colormapped or not, the number of colors in the image, the number of bytes in the image, the format of the image (JPEG, PNM, etc.), and finally the number of seconds it took to read and process the image.  Many more attributes are available with the verbose option.  See <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-processing.php">Command Line Processing</a> for advice on how to structure your <code>identify</code> command or see below for example usages of the command.</p>

<h2><a class="anchor" id="usage"></a>Example Usage</h2>

<p>We list a few examples of the <code>identify</code> command here to illustrate its usefulness and ease of use. To get started, lets identify an image in the JPEG format:</p>

<pre class="bg-light text-dark mx-4"><code>-> identify rose.jpg
rose.jpg JPEG 70x46 70x46+0+0 8-bit sRGB 2.36KB 0.000u 0:00.000
</code></pre>

<p>By default, <code>identify</code> provides the following output:</p>
￼
<ul><code>Filename[frame #] image-format widthxheight page-widthxpage-height+x-offset+y-offset colorspace user-time elapsed-time</code></ul>

<p>Next, we look at the same image in greater detail:</p>

<pre class="pre-scrollable bg-light text-dark mx-4"><code>-> identify -verbose rose.jpg
Image: rose.jpg
  Format: JPEG (Joint Photographic Experts Group JFIF format)
  Mime type: image/jpeg
  Class: DirectClass
  Geometry: 70x46+0+0
  Units: Undefined
  Type: TrueColor
  Endianess: Undefined
  Colorspace: sRGB
  Depth: 8-bit
  Channel depth:
    red: 8-bit
    green: 8-bit
    blue: 8-bit
  Channel statistics:
    Pixels: 3220
    Red:
      min: 35 (0.137255)
      max: 255 (1)
      mean: 145.57 (0.570865)
      standard deviation: 67.2976 (0.263912)
      kurtosis: -1.37971
      skewness: 0.0942169
      entropy: 0.974889
    Green:
      min: 33 (0.129412)
      max: 255 (1)
      mean: 89.2193 (0.349879)
      standard deviation: 52.0803 (0.204236)
      kurtosis: 2.70722
      skewness: 1.82562
      entropy: 0.877139
    Blue:
      min: 11 (0.0431373)
      max: 255 (1)
      mean: 80.3742 (0.315193)
      standard deviation: 53.8536 (0.21119)
      kurtosis: 2.90978
      skewness: 1.92617
      entropy: 0.866692
  Image statistics:
    Overall:
      min: 11 (0.0431373)
      max: 255 (1)
      mean: 105.055 (0.411979)
      standard deviation: 58.1422 (0.228008)
      kurtosis: 1.25759
      skewness: 1.4277
      entropy: 0.90624
  Rendering intent: Perceptual
  Gamma: 0.454545
  Chromaticity:
    red primary: (0.64,0.33,0.03)
    green primary: (0.3,0.6,0.1)
    blue primary: (0.15,0.06,0.79)
    white point: (0.3127,0.329,0.3583)
  Background color: white
  Border color: srgb(223,223,223)
  Matte color: grey74
  Transparent color: black
  Interlace: None
  Intensity: Undefined
  Compose: Over
  Page geometry: 70x46+0+0
  Dispose: Undefined
  Iterations: 0
  Compression: JPEG
  Quality: 92
  Orientation: Undefined
  Properties:
    date:create: 2014-11-09T09:00:35-05:00
    date:modify: 2014-11-09T09:00:35-05:00
    jpeg:colorspace: 2
    jpeg:sampling-factor: 2x2,1x1,1x1
    signature: 22a99838bd5594250f706d1d9383b2830f439fcbaf1455cbe2f7f59a4deb065a
  Artifacts:
    filename: rose.jpg
    verbose: true
  Tainted: False
  Filesize: 2.36KB
  Number pixels: 3.22K
  Pixels per second: 3.22EB
  User time: 0.000u
  Elapsed time: 0:01.000
  Version: ImageMagick Q16 https://imagemagick.org
</code></pre>

<p>Note, the image signature is generated from the pixel components, not the ima
ge metadata.</p>


<p>To get the print size in inches of an image at 72 DPI, use:</p>

<pre class="bg-light text-dark mx-4"><code>-> identify -format "%[fx:w/72] by %[fx:h/72] inches" document.png
8.5 x 11 inches
</code></pre>

<p>The depth and dimensions of a raw image must be specified on the command line:</p>

<pre class="bg-light text-dark mx-4"><code>-> identify -depth 8 -size 640x480 image.raw
image.raw RGB 640x480 sRGB 9kb 0.000u 0:01
</code></pre>

<p>Here we display the image texture features, moments, perceptual hash, and the number of unique colors in the image:</p>

<pre class="bg-light text-dark mx-4"><code>-> identify -verbose -features 1 -moments -unique image.png
</code></pre>

<p>Here is a special define that outputs the location of the minimum or maximum pixel of the image:</p>

<pre class="bg-light text-dark mx-4"><code>identify -precision 5 -define identify:locate=maximum -define identify:limit=3 image.png
</code></pre>

<p>You can find additional examples of using <code>identify</code> in <a href="https://legacy.imagemagick.org/Usage/">Examples of ImageMagick Usage</a>.</p>

<h2><a class="anchor" id="options"></a>Option Summary</h2>

<p>The <code>identify</code> command recognizes these options.  Click on an option to get more details about how that option works.</p>

<table class="table table-sm table-hover table-striped table-responsive">
  <tbody>
  <tr>
    <th align="left">Option</th>
    <th align="left">Description</th>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#alpha">-alpha</a></td>
    <td>on, activate, off, deactivate, set, opaque, copy",
transparent, extract, background, or shape the alpha channel</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#antialias">-antialias</a></td>
    <td>remove pixel-aliasing</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#authenticate">-authenticate <var>value</var></a></td>
    <td>decrypt image with this password</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#auto-orient">-auto-orient</a></td>
    <td>automagically orient image</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#channel">-channel <var>type</var></a></td>
    <td>apply option to select image channels</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#clip">-clip</a></td>
    <td>clip along the first path from the 8BIM profile</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#clip-mask">-clip-mask</a> <var>filename</var></td>
    <td>associate clip mask with the image</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#clip-path">-clip-path <var>id</var></a></td>
    <td>clip along a named path from the 8BIM profile</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#colorspace">-colorspace <var>type</var></a></td>
    <td>set image colorspace</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#crop">-crop <var>geometry</var></a></td>
    <td>crop the image</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#debug">-debug <var>events</var></a></td>
    <td>display copious debugging information</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#define">-define <var>format:option</var></a></td>
    <td>define one or more image format options</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#density">-density <var>geometry</var></a></td>
    <td>horizontal and vertical density of the image</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#depth">-depth <var>value</var></a></td>
    <td>image depth</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#endian">-endian <var>type</var></a></td>
    <td>endianness (MSB or LSB) of the image</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#extract">-extract <var>geometry</var></a></td>
    <td>extract area from image</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#features">-features <var>distance</var></a></td>
    <td>analyze image features (e.g. contract, correlations, etc.).</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#format_identify_">-format <var>string</var></a></td>
    <td>output formatted image characteristics</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#gamma">-gamma <var>value</var></a></td>
    <td>level of gamma correction</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#grayscale">-grayscale <var>method</var></a></td>
    <td>convert image to grayscale</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#help">-help</a></td>
    <td>print program options</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#interlace">-interlace <var>type</var></a></td>
    <td>type of image interlacing scheme</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#interpolate">-interpolate <var>method</var></a></td>
    <td>pixel color interpolation method</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#limit">-limit <var>type value</var></a></td>
    <td>pixel cache resource limit</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#list">-list <var>type</var></a></td>
    <td>Color, Configure, Delegate, Format, Magic, Module, Resource, or Type</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#log">-log <var>format</var></a></td>
    <td>format of debugging information</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#mask">-mask <var>filename</var></a></td>
    <td>associate a mask with the image</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#moments">-moments</a></td>
    <td>display image moments and perceptual hash.</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#monitor">-monitor</a></td>
    <td>monitor progress</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#negate">-negate</a></td>
    <td>replace each pixel with its complementary color </td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#ping">-ping</a></td>
    <td>by default, efficiently determine certain image characteristics by only reading the requisite image metadata.  To accurately identify all the image metadata and pixel characteristics, use <samp>+ping</samp>. </td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#precision">-precision <var>value</var></a></td>
    <td>set the maximum number of significant digits to be printed</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#quiet">-quiet</a></td>
    <td>suppress all warning messages</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#regard-warnings">-regard-warnings</a></td>
    <td>pay attention to warning messages.</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#respect-parentheses">-respect-parentheses</a></td>
    <td>settings remain in effect until parenthesis boundary.</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#sampling-factor">-sampling-factor <var>geometry</var></a></td>
    <td>horizontal and vertical sampling factor</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#set">-set <var>attribute value</var></a></td>
    <td>set an image attribute</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#size">-size <var>geometry</var></a></td>
    <td>width and height of image</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#strip">-strip</a></td>
    <td>strip image of all profiles and comments</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#unique">-unique</a></td>
    <td>display image the number of unique colors in the image.</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#units">-units <var>type</var></a></td>
    <td>the units of image resolution</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#verbose">-verbose</a></td>
    <td>print detailed information about the image</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#version">-version</a></td>
    <td>print version information</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#virtual-pixel">-virtual-pixel <var>method</var></a></td>
    <td>access method for pixels outside the boundaries of the image</td>
  </tr>

  </tbody>
</table>

</div>
