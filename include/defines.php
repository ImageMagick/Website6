<div>

<p class="magick-description">The <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#define">-define</a> command-line option adds specific global settings generally used to control coders and image processing operations.</p>

<p>This option creates one or more definitions for coders and decoders to use
while reading and writing image data.  Definitions are generally used to
control image file format coder modules, and image processing operations,
beyond what is provided by normal means.  Defined settings are listed in <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#verbose">-verbose</a> information ("<code>info:</code>" output format) as "Artifacts". </p>

<p>If <var>value</var> is missing for a definition, an empty-valued
definition of a flag is created with that name. This used to control on/off
options.  Use <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#define">-define keys</a> to remove definitions
previously created.  Use <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#define">+define "*"</a> to remove all existing definitions.</p>

<p>The same 'artifact' settings can also be defined using the <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#set">-set "option:<var>key</var>" "<var>value</var>"</a> option, which also allows the use of <a href="<?php echo $_SESSION['RelativePath']?>/../script/escape.php" >Format and Print Image Properties</a> in the defined value. </p>

<p>The <var>option</var> and <var>key</var> are case-independent (they are
converted to lowercase for use within the decoders) while the <var>value</var>
is case-dependent.</p>

<p>Such settings are global in scope, and affect all images and operations. </p>

<pre class="bg-light text-dark mx-4"><samp>convert bilevel.tif -define ps:imagemask eps3:stencil.ps
convert arrow.tga -set colorspace:auto-grayscale=off myArrow.tga
</samp></pre>

<p>Set attributes of the image registry by prefixing the value with
<code>registry:</code>.  For example, to set a temporary path to put work files,
use:</p>

<pre class="bg-light text-dark mx-4"><samp>-define registry:temporary-path=/data/tmp
</samp></pre>

<p>Here is a list of recognized defines:</p>


<div>

<table class="table table-sm table-hover table-striped table-responsive">
   <tr>
    <th align="center" colspan=2>Command-line Defines</th>
  </tr>

  <tr>
   <td colspan=2><p></p></td>
  </tr>

 <tr>
    <td>auto-threshold:verbose</td>
    <td>return derived threshold as the <code>auto-threshold:threshold</code> image property.</td>
  </tr>

  <tr>
    <td>colorspace:auto-grayscale=<var>on|off</var></td>
    <td>Prevent automatic conversion to grayscale inside coders that support
    grayscale. This should be accompanied by -type truecolor. PNG and TIF do
    not need this define. With PNG, just use PNG24:image. With TIF, just use
    -type truecolor. JPG and PSD will need this define.</td>
  </tr>

   <tr>
    <td>compare:ssim-radius=<var>value</var></td>
     <td>Set the structural similarity index radius.</td>
  </tr>

    <tr>
    <td>compare:ssim-sigma=<var>value</var></td>
     <td>Set the structural similarity index sigma.</td>
  </tr>

    <tr>
    <td>compare:ssim-k1=<var>value</var></td>
     <td>Set the structural similarity index k1 argument.</td>
  </tr>

    <tr>
    <td>compare:ssim-k2=<var>value</var></td>
     <td>Set the structural similarity index k2 argument.</td>
  </tr>

 <tr>
    <td>complex:snr=<var>value</var></td>
    <td>Set the divide SNR constant <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#complex">-complex</a>.</td>
  </tr>

  <tr>
    <td>compose:args=<var>arguments</var></td>
     <td>Set certain compose argument values when using convert ... -compose ...
    -composite. See <a href="https://imagemagick.org/script/compose.php"
    >Image Composition</a>.</td>
  </tr>

  <tr>
    <td>compose:clip-to-self=<var>true|false</var></td>
    <td>Some <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#compose" >-compose</a> methods can modify the
    'destination' image outside the overlay area.  It is disabled by default.</td>
  </tr>

  <tr>
    <td>compose:clamp=<var>on|off</var></td>
    <td>Set each pixel whose value is below zero to zero and any the pixel
    whose value is above the quantum range to the quantum range (e.g. 65535)
    otherwise the pixel value remains unchanged.  Define supported in
    ImageMagick 6.9.1-3 and above.</td>
  </tr>

  <tr>
    <td>connected-components:angle-threshold=<var>value</var></td>
    <td>Merges any region with equivalent ellipse angle smaller than
    <var>value</var> into its surrounding region or largest neighbor.
      Thresholds can optionally include ranges, e.g. 410-1600.</td>
  </tr>

  <tr>
    <td>connected-components:area-threshold=<var>value</var></td>
    <td>Merges any region with area smaller than <var>value</var> into its
    surrounding region or largest neighbor.</td>
  </tr>

  <tr>
    <td>connected-components:background-id=<var>object-id</var></td>
    <td>Identify which object is to be the background object.
    Supported in ImageMagick 7.0.9.21.</td>
  </tr>

  <tr>
    <td>connected-components:circularity-threshold=<var>value</var></td>
    <td>Merge any region with circularity smaller than <var>value</var>
    into its surrounding region or largest neighbor. Circularity is
    computed as 4*pi*area/perimeter^2.
    Supported in ImageMagick 7.0.9.24.</td>
  </tr>

  <tr>
    <td>connected-components:diameter-threshold=<var>value</var></td>
    <td>Merge any region with diameter smaller than <var>value</var>
    into its surrounding region or largest neighbor. Diameter is
    computed as sqrt(4*area/pi).
    Supported in ImageMagick 7.0.9.24.</td>
  </tr>

  <tr>
    <td>connected-components:eccentricity-threshold=<var>value</var></td>
    <td>Merge any region with equivalent ellipse eccentricity smaller
    than <var>value</var> into its surrounding region or largest neighbor.
    Supported in ImageMagick 7.0.9.24.</td>
  </tr>

  <tr>
    <td>connected-components:exclude-header=<var>true</var></td>
    <td>List the objects without the header.  Supported in ImageMagick 7.0.9.21.</td>
  </tr>

  <tr>
    <td>connected-components:keep=<var>list-of-ids</var></td>
    <td>Comma and/or hyphenated list of id values to keep in the output.  Supported in ImageMagick 6.9.3-0.</td>
  </tr>

   <tr>
    <td>connected-components:keep-colors=<var>red;green;blue</var></td>
    <td>Keeps objects identified by their color in a semicolon separated list.  Supported in ImageMagick 6.9.3-0.</td>
  </tr>

   <tr>
    <td>connected-components:keep-top=<var>number-of-objects</var></td>
    <td>Keeps only the top number of objects by area.  Supported in ImageMagick 7.0.9.21.</td>
  </tr>

  <tr>
    <td>connected-components:major-axis-threshold=<var>value</var></td>
    <td>Merge any region with equivalent ellipse major axis diameter smaller
    than <var>value</var> into its surrounding region or largest neighbor.
    Supported in ImageMagick 7.0.9.24.</td>
  </tr>

 <tr>
    <td>connected-components:mean-color=<var>true</var></td>
    <td>Change the output image from id values to mean color values. Supported in ImageMagick 6.9.2-8.</td>
  </tr>

  <tr>
    <td>connected-components:minor-axis-threshold=<var>value</var></td>
    <td>Merge any region with equivalent ellipse minor axis diameter smaller than <var>value</var> into its surrounding region or largest neighbor.  Supported in ImageMagick 7.0.9.24.</td>
  </tr>

  <tr>
    <td>connected-components:perimeter-threshold=<var>value</var></td>
    <td>Merge any region with perimeter smaller than <var>value</var> into its surrounding region or largest neighbor.  Supported in ImageMagick 7.0.9.24.</td>
  </tr>

  <tr>
    <td>connected-components:remove=<var>list-of-ids</var></td>
    <td>Comma and/or hyphenated list of id values to remove from the output.
     Supported in ImageMagick 6.9.2-9.</td>
  </tr>

   <tr>
    <td>connected-components:remove-colors=<var>red;green;blue</var></td>
    <td>Remove objects identified by their color in a semicolon separated list.
    Supported in ImageMagick 6.9.3-0.</td>
  </tr>

  <tr>
    <td>connected-components:verbose=<var>true</var></td>
    <td>Lists id, bounding box, centroid, area, mean color for each region.</td>
  </tr>

  <tr>
    <td>convolve:scale=<var>{kernel_scale}[!^] [,{origin_addition}] [%]</var></td>
     <td>Define the kernel scaling. The special flag ! automatically scales to
    full dynamic range. The ! flag can be used in combination with a factor or
    percent. The factor or percent is then applied after the automatic scaling.
    An example is 50%!. This produces a result 50% darker than full dynamic
    range scaling. The ^ flag assures the kernel is 'zero-summing', for
    example when some values are positive and some are negative as in edge
    detection kernels. The origin addition adds that value to the center
    pixel of the kernel. This produces an effect that is like adding the image
    that many times to the result of the filtered image. The typical value
    is 1 so that the original image is added to the result of the convolution.
    The default is 0.</td>
  </tr>

  <tr>
    <td>deskew:auto-crop=<var>true</var></td>
    <td>auto crop the image after deskewing.</td>
  </tr>

  <tr>
    <td>delegate:bimodal=<var>true</var></td>
     <td>Specify direct conversion from Postscript to PDF.</td>
  </tr>

  <tr>
    <td>distort:scale=<var>value</var></td>
    <td>Set the output scaling factor for use with <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#distort"
   >-distort</a>.</td>
  </tr>

  <tr>
    <td>distort:viewport=<var>WxH+X+Y</var></td>
    <td>Set the viewport for use with <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#distort">-distort</a>.</td>
  </tr>

  <tr>
    <td>dither:diffusion-amount=<var>X%</var></td>
    <td>Set the amount of diffusion to use with Floyd-Steinberg diffusion</td>
  </tr>

  <tr>
    <td>filename:literal=<var>true</var></td>
    <td>By default, an output filename can contain <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-processing.php#output">embedded formatting characters</a>.  Use this option to bypass interpretting embedded formatting characters and instead use the filename literally.</td>
  </tr>

  <tr>
    <td>filter:option=<var>value</var></td>
     <td>Set a filter option for use with <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#resize">-resize</a>.
    See below for specific options.</td>
  </tr>

  <tr>
    <td>filter:b=<var>value</var></td>
     <td>Redefine the spline factor used for cubic filters such as Cubic,
     Catrom, Mitchel, and Hermite, as well as the Parzen cubic windowing
     function. If only one of the b or c values are defined, the other is
     set so as to generate a 'Cubic-Keys' filter. The meaning of the b and c
     values was defined in a research paper by Mitchell-Netravali.</td>
  </tr>

  <tr>
    <td>filter:blur=<var>factor</var></td>
     <td>Scale the X axis of the filter (and its window). Use > 1.0 for blurry
     or < 1.0 for sharp. This should only be used with Gaussian and
     Gaussian-like filters simple filters, or you may not get the
     expected results.</td>
  </tr>

  <tr>
    <td>filter:c=<var>value</var></td>
     <td>Redefine the Keys alpha factor used for cubic filters such as Cubic,
     Catrom, Mitchel, and Hermite, as well as the Parzen cubic windowing
     function. If only one of the b or c values are defined, the other is
     set so as to generate a 'Cubic-Keys' filter. The meaning of the b and c
     values was defined in a research paper by Mitchell-Netravali.</td>
  </tr>

  <tr>
    <td>filter:kaiser-alpha=<var>value</var></td>
     <td>Set the Kaiser window alpha value. When it is multiplied by 'PI',
     it is equivalent to "kaiser-beta" and will override that setting.
     It only affects the Kaiser windowing function and does not affect
     any other attributes.</td>
  </tr>

   <tr>
    <td>filter:kaiser-beta=<var>value</var></td>
     <td>Set the Kaiser window beta value. It only affects Kaiser windowing
     function and does not affect any other attributes. Before ImageMagick
     v6.7.6-10, this option was known as "filter:alpha" (an inheritance
     from the very old "zoom" program). It was changed to bring the function
     in line with more modern academic research usage and better assign it
     be more definitive. The default value is 6.5</td>
  </tr>

 <tr>
    <td>filter:lobes=<var>count</var></td>
     <td>Set the number of lobes to use for the Sinc/Bessel filter.
     This is an alternate way of specifying the 'support' range of the filter,
     that is designed to be more suited to windowed filters, especially when
     used for image distorts.</td>
  </tr>

  <tr>
    <td>filter:sigma=<var>value</var></td>
     <td>Set the 'sigma' value used to define the Gaussian filter.
     The default sigma value is '0.5'. It only affects the Gaussian filter,
     but does not shrink (but may enlarge) the filter's 'support'.
     It can be used to generate very small blurs, but without the filter
     'missing' pixels due to using a small support setting.
     A larger value of '0.707' (a value of '1/sqrt(2)') is another
     common setting.</td>
  </tr>

  <tr>
    <td>filter:support=<var>radius</var></td>
     <td>Set the filter support radius. It defines how large the filter
     should be and thus directly defines how slow the filtered resampling
     process is. All filters have a default 'preferred' support size.
     Some filters like Lagrange and windowed filters adjust themselves
     depending on this value. With simple filters this value either does
     nothing (but slow the resampling), or will clip the filter function
     in a detrimental way.</td>
  </tr>

  <tr>
    <td>filter:verbose=<var>true</var></td>
     <td>Enable printing of information about the final internal
     filter selection to standard output. This includes a commented header
     on the filter settings being used and data allowing the filter weights
     to be easily graphed. Note however that some filters are internally
     defined in terms of other filters. The Lanczos filter, for example,
     is defined in terms of a SincFast windowed SincFast filter, while
     the Mitchell filter is defined as a general Cubic family filter
     with specific 'B' and 'C' settings.</td>
  </tr>

  <tr>
    <td>filter:window=<var>filter_function</var></td>
     <td>The IIR (infinite impulse response) filters Sinc and Jinc are
     windowed (brought down to zero over the defined support range) with
     the given filter. This allows you to specify a filter function to be
     used as a windowing function for these IIR filters. Many of the defined
     filters are actually windowing functions for these IIR filters. A typical
     choices is Box, (which effectively turns off the windowing function).</td>
  </tr>

  <tr>
    <td>filter:window-support=<var>radius</var></td>
     <td>Scale the windowing function to this size. This causes
     the windowing (or self-windowing Lagrange filter) to act is if the
     support window is larger than what is actually supplied to the calling
     operator. The filter, however, is still clipped to the true support
     size that is provided. If unset, this will equal the normal filter
     support size.</td>
  </tr>

  <tr>
    <td>fourier:normalize=<var>inverse</var></td>
    <td>Set the location for the FFT/IFT normalization as use by
    <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#fft">+-fft</a> and <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#ift">+-ift</a>. The default is
    <var>forward</var>.</td>
  </tr>

  <tr>
    <td>frames:step</td>
    <td>When selecting image <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-processing.php">frames</a>, the default is to step one frame at a time through a list, e.g. [0-3], returns frames 0, 1, 2, and 3.  Set the step to 2 in this example and we instead get frames 0 and 2.</td>
  </tr>

  <tr>
    <td>h:format=<var>value</var></td>
     <td>Set the image encoding format use when writing a C-style header.
         <var>format</var> can be any output format supported by ImageMagick
         except for <var>h</var> and <var>magick</var>.  If this
         option is omitted, the default is <var>GIF</var> for PseudoClass
         images and <var>PNM</var> for DirectClass images.
    </td>
  </tr>

  <tr>
    <td>hough-lines:accumulator=true</td>
     <td>Return the accumulator image in addition to the lines image.</td>
  </tr>

  <tr>
    <td>json:features</td>
   <td>Include features in verbose information.</td>
  </tr>

  <tr>
    <td>json:limit</td>
    <td> </td>
  </tr>

  <tr>
    <td>json:locate</td>
    <td> </td>
  </tr>

  <tr>
    <td>json:moments</td>
   <td>Include image moments in verbose information.</td>
  </tr>

   <tr>
    <td>kmeans:seed-colors=<var>color-list</var></td>
     <td>Initialize the colors, where color-list is a semicolon delimited
     list of seed colors (e.g. red;sRGB(19,167,254);#00ffff)</td>
  </tr>

 <tr>
    <td>magick:format=<var>value</var></td>
     <td>Set the image encoding format use when writing a C-style header.
         This is the same as "h:format=format" described above.</td>
  </tr>

   <tr>
    <td>magnify:method=<var>value</var></td>
    <td>Choose the method of pixel art magnification. The choices are:
    eagle2X, eagle3X, eagle3XB, epb2X, fish2X, hq2X, scale2X (default),
    scale3X, xbr2X</td>
  	</tr>

   <tr>
    <td>modulate:colorspace=<var>colorspace</var></td>
    <td>Define the colorspace to use with <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#modulate">-modulate</a>.
    Any hue-based colorspace may be use. The default is HSL.</td>
  	</tr>

 <tr>
    <td>morphology:compose=<var>compose-method</var></td>
     <td>Specify how to merge results generated by multiple<a
    href="#morphology" >-morphology</a> kernel. The default is none. One
    typical value is 'lighten' as used, for example, with the sobel edge
    kernels. </td>
  </tr>

  <tr>
    <td>morphology:showKernel=<var>1</var></td>
     <td>Output (to 'standard error') all the information about a generated <a
    href="#morphology" >-morphology</a> kernel.</td>
  </tr>

  <tr>
    <td>phash:colorspaces=<var>colorspace,colorspace,...</var></td>
    <td>The perceptual hash defaults to the xyY and HCLp colorspaces.  When
    using this define, you can specify up to six alternative colorspaces. (as
    of IM 7.0.3-8)</td>
  </tr>

  <tr>
    <td>phash:normalize=<var>true</var></td>
    <td>Normalize the phash metric by dividing by the number of channels
    specified by <code>-define phash:colorspaces</code> when using compare
    -metric phash. (as of IM 7.0.3-8)</td>
  </tr>

   <tr>
    <td>pixel:compliance=<var>value</var></td>
     <td>Set the "pixel:" output format according to several standards.
     The choices are SVG, None, Undefined, MVG, X11, XPM. The default
     list values for (s)RGB colors in the form of (s)rgb(r,g,b) or
     (s)rgba(r,g,b,a). Color names will no longer be presented. For sRGB or
     RGB colors, the SVG, X11, XPM and None options lists color names,
     if they exist. The MVG and Undefined options list hex values. When
     colors are presented or converted to hue-based colorspaces, the values
     listed will be integers for hue and percents for the other two components.
     For other colorspaces, values may be listed as either percents or
     fractional value. Setting the depth to 8 will limit values to the 8-bit
     range, except for hue-based colors.</td>
   </tr>

  <tr>
    <td>profile:skip=<var>name1,name2,...</var></td>
     <td>Skip the named profile[s] when reading the image. Use skip="*" to
    skip all named profiles in the image. Many named profiles exist,
    including ICC, EXIF, APP1, IPTC, XMP, and others.</td>
  </tr>

  <tr>
    <td>precision:highres-transform=<var>true</var></td>
     <td>Increase the profile transform precision. Note, there is a slight
     performance penalty as the high-precision transform is floating point
     rather than unsigned. It is important to note that results may depend
     on whether or not the original image already has an included profile.</td>
  </tr>

  <tr>
    <td>preserve-timestamp=<var>true|false</var></td>
     <td>Preserve file timestamp (<code>mogrify</code> only).</td>
  </tr>

  <tr>
    <td>q-table=<var>quantization-table.xml</var></td>
     <td>Custom JPEG quantization tables.</td>
  </tr>

  <tr>
    <td>quantum:format=<var>type</var></td>
     <td>Set the type to <code>floating-point</code> to specify a floating-point
    format for raw files (e.g. GRAY:) or for MIFF and TIFF images in HDRI mode
    to preserve negative values. If <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#depth">-depth</a> 16 is
    included, the result is a single precision floating point format.
    If <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#depth">-depth</a> 32 is included, the result is
    double precision floating point format. For signed pixel data, use <code>-define quantum:format=signed</code></td>
  </tr>

   <tr>
    <td>quantum:maximum=<var>value</var></td>
     <td>Maximum value for certain image types such as DCM. If not set, the
     the maximum value is QuantumRange.</td>
  </tr>

   <tr>
    <td>quantum:minimum=<var>value</var></td>
     <td>Minimum value for certain image types such as DCM. If not set, the
     the minimum value is zero.</td>
  </tr>

 <tr>
    <td>quantum:polarity=<var>photometric-interpretation</var></td>
     <td>Set the photometric-interpretation of an image (typically for TIFF
     image file format) to either <code>min-is-black</code> (default) or
    <code>min-is-white</code>.</td>
  </tr>

  <tr>
    <td>registry:<var>attribute</var>=<var>value</var></td>
     <td>Set attributes of the image registry, for example,
     registry:temporary-path=/data/tmp.
    </td>
  </tr>

  <tr>
    <td>registry:precision=<var>value</var></td>
    <td>Set the maximum number of significant digits to be printed.</td>
  </tr>

  <tr>
    <td>resample:verbose=<var>true</var></td>
     <td>Output the cylindrical filter lookup table created by the EWA
     (Elliptical Weighted Average) resampling algorithm. Note this table
     uses a squared radius lookup value. This is typically only used for
     debugging EWA resampling.
    </td>
  </tr>

  <tr>
    <td>sample:offset=<var>geometry</var></td>
     <td>Location of the sampling point within the sub-region being sampled,
    expressed as percentages (see <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#sample" >-sample</a>).</td>
  </tr>

   <tr>
    <td>shepards:power=<var>value</var></td>
     <td>Set the exponent in the Shepard's distortion. The default is 2.</td>
  </tr>

<tr>
    <td>stream:buffer-size=<var>value</var></td>
   <td>Set the stream buffer size.  Select 0 for unbuffered I/O.</td>
  </tr>

 <tr>
    <td>trim:percent-background=<var>X%</var></td>
   <td>Set the amount of background that is tolerated in an edge. It is
   specified as a percent. 0% means no background is tolerated.
   50% means an edge can contain up to 50% pixels that are background per
   the fuzz-factor.</td>
  </tr>

  <tr>
    <td>type:features=<var>string</var></td>
    <td>Add a font feature to be used by the RAQM delegate during complex
    text layout. This is usually used to turn on optional font features that
    are not enabled by default, but can be also used to turn off default font
    features. Features include those to control kerning, ligature and Arabic.</td>
  </tr>

  <tr>
    <td>type:hinting=<var>false</var></td>
    <td>Disable font hinting. Proper glyph rendering needs the scaled points
    to be aligned along the target device pixel grid, through an operation
    often called hinting. One of its main purposes is to ensure that important
    widths and heights are respected throughout the whole font. (For example,
    it is very often desirable that the ‘I’ and the ‘T’ glyphs have their
    central vertical line of the same pixel width. Hinting also manages
    features like stems and overshoots, which can cause problems at small
    pixel sizes.</td>
  </tr>

  <tr>
    <td>x:screen=<var>true</var></td>
    <td>Obtain the image from the root window.</td>
  </tr>

  <tr>
    <td>x:silent=<var>true</var></td>
    <td>Turn off the beep when importing an image.</td>
  </tr>


  <tr>
   <td colspan=2><p></p></td>
  </tr>

  <tr>
   <td colspan=2><p></p></td>
  </tr>

  <tr>
   <th align="center" colspan=2>IMAGE FORMATS</th>
  </tr>

  <tr>
   <td colspan=2><p></p></td>
  </tr>

  <tr>
    <td>bmp3:alpha=<var>true|false</var></td>
    <td>Include any alpha channel when writing in the BMP image format.</td>
  </tr>

  <tr>
    <td>bmp:format=<var>value</var></td>
    <td>Valid values are <var>bmp2</var>, <var>bmp3</var>,
   and <var>bmp4</var>.  This option can be useful when the
   method of prepending "BMP2:" to the output filename is inconvenient or
   is not available, such as when using the <a href="<?php echo $_SESSION['RelativePath']?>/../script/mogrify.php">mogrify</a>
   utility.</td>
  </tr>

  <tr>
    <td>bmp:subtype=<var>value</var></td>
    <td>BMP channel depth subtypes. The choices are: RGB555, RGB565, ARGB4444,
    ARGB1555. Only support in BMP (BMP4). BMP3 and BMP2 do not contain header
    fields to support these options.</td>
  </tr>

  <tr>
    <td>{caption,label}:{max,start}-pointsize=<var>value</var></td>
    <td>This sets the bounding pointsize to use when searching for the maximum pointsize where the text annotation still fits within the image boundaries.</td>
  </tr>

  <tr>
    <td>dcm:display-range=<var>reset</var></td>
     <td>Set the display range to the minimum and maximum pixel values for the
    DCM image format.</td>
  </tr>

  <tr>
    <td>dcm:rescale=<var>true</var></td>
     <td>Enable interpretation of the rescale slope and intercept settings
     in the file.</td>
  </tr>

   <tr>
    <td>dcm:rescale=<var>true</var></td>
     <td>Enable interpretation of the rescale slope and intercept settings
     in the file.</td>
  </tr>

    <tr>
    <td>dcm:window=<var>CxW</var></td>
     <td>Specify the dcm window center and width.</td>
  </tr>

<tr>
    <td>dds:cluster-fit=<var>true|false</var></td>
     <td>Enable the DDS cluster-fit.</td>
  </tr>

  <tr>
    <td>dds:compression=<var>dxt1|dxt5|none</var></td>
     <td>Set the dds compression.</td>
  </tr>

  <tr>
    <td>dds:mipmaps=<var>value</var></td>
     <td>Set the dds number of mipmaps.</td>
  </tr>

  <tr>
     <td>dds:weight-by-alpha=<var>true|false</var></td>
     <td>Enable the DDS alpha weighting.</td>
  </tr>

  <tr>
    <td>dng:max-raw-memory=<var>value</var></td>
    <td>Stop processing if raw buffer size grows larger than that value (in megabytes). Default is 8192.</td>
  </tr>

  <tr>
    <td>dng:no-auto-bright=<var>false</var></td>
    <td>Disable the histogram-based white level.</td>
  </tr>

  <tr>
    <td>dng:output-color=<var>value</var></td>
     <td>Select the output colorspace. The choices are:
       0 - Raw color (unique to each camera),
       1 - sRGB D65 (default),
       2 - Adobe RGB (1998) D65,
       3 - Wide Gamut RGB D65,
       4 - Kodak ProPhoto RGB D65,
       5 - XYZ,
       6 - ACES</td>
    </tr>

 <tr>
    <td>dng:use-auto-wb=<var>true</var></td>
     <td>Compute the white balance by averaging the entire image.</td>
  </tr>

  <tr>
    <td>dng:use-camera-wb=<var>true</var></td>
     <td>Uses the white balance specified by the camera. The default is true.</td>
  </tr>

  <tr>
    <td>dot:layout-engine=<var>value</var></td>
     <td>Specify the layout engine for the DOT image format (e.g., <code>neato</code>).</td>
  </tr>

  <tr>
    <td>eps:use-cropbox=<var>true</var></td>
     <td>Force ImageMagick to respect the crop box.</td>
  </tr>

  <tr>
    <td>exr:color-type=<var>value</var></td>
     <td>Specify the color type for the EXR format: RGB, RGBA, YC, YCA, Y,
     YA, R, G, B, A).</td>
  </tr>

  <tr>
    <td>fpx:view=<var>value</var></td>
     <td>Specify the FlashPix viewing object, which contains the specification
     of a viewing transform. The viewing transform enables applications to
     represent a set of simple edits as a list of "commands" which are applied
     to the image in real time without altering the original image.</td>
  </tr>

  <tr>
    <td>heic:cicp=<var>value</var></td>
    <td>Set the HEIC color primaries, transfer characteristics, matrix coefficients, and full range flag. Use <samp>1/13/6/1</samp> for full range BT.709.  See ISO/IEC 14496-12:2022 standard for a description of these fields and values.</td>
  </tr>

  <tr>
    <td>heic:preserve-orientation=<var>true</var></td>
    <td>Preserve the original EXIF orientation during HEIC decoding and rotate
    the pixels accordingly. By default, EXIF orientation is reset to "1" to
    match the actual orientation of pixels in HEIC.
    </td>
  </tr>

  <tr>
    <td>icon:auto-resize</td>
     <td>Automatically stores multiple sizes when writing an ico image (requires a 256x256 input image).</td>
  </tr>

  <tr>
    <td>jp2:layer-number=<var>value</var></td>
     <td>Set the maximum number of quality layers to decode. Same for JPT, JC2,
    and J2K.</td>
  </tr>

  <tr>
    <td>jp2:number-resolutions=<var>value</var></td>
     <td>Set the number of resolutions to encode.Same for JPT, JC2, and
     J2K.</td>
  </tr>

  <tr>
    <td>jp2:progression-order=<var>value</var></td>
     <td>Choose from LRCP, RLCP, RPCL, PCRL or CPRL. Same for JPT, JC2, and
    J2K.</td>
  </tr>

  <tr>
    <td>jp2:quality=<var>value,value...</var></td>
     <td>Set the quality layer PSNR, given in dB. The order is from left to
    right in ascending order. The default is a single lossless quality layer.
    Same for JPT, JC2, and J2K.</td>
  </tr>

  <tr>
    <td>jp2:rate=<var>value</var></td>
     <td>Specify the compression factor to use while writing JPEG-2000 files.
     The compression factor is the reciprocal of the compression ratio. The
     valid range is 0.0 to 1.0, with 1.0 indicating lossless compression. If
     defined, this value overrides the -quality setting.  A quality setting
     of 75 results in a rate value of 0.06641. Same for JPT, JC2, and J2K.</td>
  </tr>

  <tr>
    <td>jp2:reduce-factor=<var>value</var></td>
     <td>Set the number of highest resolution levels to be discarded.Same for
    JPT, JC2, and J2K.</td>
  </tr>

  <tr>
    <td>jpeg:block-smoothing=<var>on|off</var></td>
    <td> </td>
  </tr>

  <tr>
    <td>jpeg:colors=<var>value</var></td>
     <td>Set the desired number of colors and let the JPEG encoder do the
    quantizing.</td>
  </tr>

  <tr>
    <td>jpeg:dct-method=<var>value</var></td>
     <td>Choose from <code>default</code>, <code>fastest</code>,
    <code>float</code>, <code>ifast</code>, and <code>islow</code>.</td>
  </tr>

  <tr>
    <td>jpeg:extent=<var>value</var></td>
     <td>Restrict the maximum JPEG file size, for example <code>-define
    jpeg:extent=400KB</code>.  The JPEG encoder will search for the highest
    compression quality level that results in an output file that does not
    exceed the value. The <code>-quality</code> option also will be respected
    starting with version 6.9.2-5. Between 6.9.1-0 and 6.9.2-4, add -quality
    100 in order for the jpeg:extent to work properly. Prior to 6.9.1-0, the
    -quality setting was ignored.</td>
  </tr>

  <tr>
    <td>jpeg:fancy-upsampling=<var>on|off</var></td>
    <td> </td>
  </tr>

  <tr>
    <td>jpeg:optimize-coding=<var>on|off</var></td>
    <td> </td>
  </tr>

  <tr>
    <td>jpeg:q-table=<var>table</var></td>
    <td> </td>
  </tr>

  <tr>
    <td>jpeg:restart-interval=<var>value</var></td>
    <td>Set the restart interval to `interval` MCU blocks.</td>
  </tr>

  <tr>
    <td>jpeg:sampling-factor=<var>sampling-factor-string</var></td>
    <td> </td>
  </tr>

  <tr>
    <td>jpeg:size=<var>geometry</var></td>
     <td>Set the size hint of a JPEG image, for
    example, <code>-define jpeg:size=128x128</code>.
    It is most useful for increasing performance and reducing the memory
    requirements when reducing the size of a large JPEG image.</td>
  </tr>

  <tr>
    <td>mng:need-cacheoff</td>
   <td>turn playback caching off for streaming MNG.</td>
  </tr>

  <tr>
    <td>pcl:fit-to-page=<var>true</var></td>
  </tr>

 <tr>
    <td>pdf:fit-page=<var>geometry</var></td>
     <td><var>Geometry</var> specifies the scaling dimensions for resizing when the PDF is being read. The geometry is either WxH{%} or page size. No offsets are allowed. (introduced in IM 6.8.8-8)</td>
  </tr>

  <tr>
    <td>pdf:fit-to-page=<var>true</var></td>
    <td> </td>
  </tr>

  <tr>
    <td>pdf:page-direction=<var>right-to-left</var></td>
    <td> </td>
  </tr>

  <tr>
    <td>pdf:stop-on-error=<var>true</var></td>
    <td> </td>
  </tr>

   <tr>
    <td>pdf:thumbnail=<var>true</var></td>
     <td>Generate thumbnails when saving a PDF file.</td>
  </tr>

  <tr>
    <td>pdf:use-cropbox=<var>true</var></td>
    <td> </td>
  </tr>

  <tr>
    <td>pdf:use-trimbox=<var>true</var></td>
    <td> </td>
  </tr>

  <tr>
    <td>png:bit-depth=<var>value</var></td>
    <td> </td>
  </tr>

  <tr>
    <td>png:chunk-malloc-max=<var>value</var></td>
    <td>Set the maximum chunk size.</td>
  </tr>

  <tr>
    <td>png:color-type=<var>value</var></td>
     <td>Desired bit-depth and color-type for PNG output.  You can force the
    PNG encoder to use a different bit-depth and color-type than it would have
    normally selected, but only if this does not cause any loss of image
    quality. Any attempt to reduce image quality is treated as an error and no
    PNG file is written.  E.g., if you have a 1-bit black-and-white image, you
    can use these "defines" to cause it to be written as an 8-bit grayscale,
    indexed, or even a 64-bit RGBA.  But if you have a 16-million color image,
    you cannot force it to be written as a grayscale or indexed PNG.  If you
    wish to do this, you must use the appropriate <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#depth">-depth</a>,
    <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#colors">-colors</a>, or <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#type">-type</a> directives to
    reduce the image quality prior to using the PNG encoder. Note that in
    indexed PNG files, "bit-depth" refers to the number of bits per index,
    which can be 1, 2, 4, or 8.  In such files, the color samples always have
    8-bit depth.</td>
  </tr>

  <tr>
    <td>png:compression-filter=<var>value</var></td>
    <td>Valid values are 0 through 9. 0-4 are the corresponding PNG filters,
   5 means adaptive filtering except for images with a colormap, 6 means
   adaptive filtering for all images, 7 means MNG "loco" compression, 8 means
   Z_RLE strategy with adaptive filtering, and 9 means Z_RLE strategy with no
   filtering.</td>
  </tr>

  <tr>
    <td>png:compression-level=<var>value</var></td>
    <td>Valid values are 0 through 9, with 0 providing the least, but fastest
       compression and 9 usually providing the best and always the slowest.</td>
  </tr>

  <tr>
    <td>png:compression-strategy=<var>value</var></td>
    <td>Valid values are 0 through 4, meaning default, filtered, huffman_only,
   rle, and fixed ZLIB compression strategy. If you are using an old zlib
   that does not support Z_RLE (before 1.2.0) or Z_FIXED (before 1.2.2.2),
   values 3 and 4, respectively, will use the zlib default strategy
   instead.</td>
  </tr>

  <tr>
    <td>png:format=<var>value</var></td>
    <td> valid values are <var>png8</var>, <var>png24</var>,
   <var>png32</var>, <var>png48</var>,
   <var>png64</var>, and <var>png00</var>.
   This property is useful for specifying
   the specific PNG format to be used, when the usual method of prepending the
   format name to the output filename is inconvenient, such as when writing
   a PNG-encoded ICO file or when using <a href="<?php echo $_SESSION['RelativePath']?>/../script/mogrify.php">mogrify</a>.
   Value = <var>png8</var> reduces the number of colors to 256,
   only one of which may be fully transparent, if necessary.  The other
   values do not force any reduction of quality; it is an error to request
   a format that cannot represent the image data without loss (except that
   it is allowed to reduce the bit-depth from 16 to 8 for all formats).
   Value = <var>png24</var> and <var>png48</var>
   allow transparency, only if a single color is fully transparent and that
   color does not also appear in an opaque pixel; such transparency is
   written in a PNG <code>tRNS</code> chunk.
   Value = <var>png00</var> causes the image to inherit its
   color-type and bit-depth from the input image, if the input was also
   a PNG.</td>
  </tr>

  <tr>
    <td>png:exclude-chunk=<var>value</var></td>

  <tr>
    <td>png:include-chunk=<var>value</var></td>
     <td>ancillary chunks to be excluded from or included in PNG output.

    <p>The <var>value</var> can be the name of a PNG chunk-type such
    as <var>bKGD</var>, a comma-separated list of chunk-names
    (which can include the word <var>date</var>, the word
    <var>all</var>, or the word <var>none</var>).
    Although PNG chunk-names are case-dependent, you can use all lowercase
    names if you prefer.</p>

    <p>The "include-chunk" and "exclude-chunk" lists only affect the behavior
    of the PNG encoder and have no effect on the PNG decoder.</p>

    <p>As a special case, if the <samp>sRGB</samp> chunk is excluded and
    the <samp>gAMA</samp> chunk is included, the <samp>gAMA</samp> chunk will
    only be written if gamma is not 1/2.2, since most decoders do not assume
    sRGB for gAMA=0.45455 when no colorspace information is included in
    the PNG file.  Because the list is processed from left to right, you
    can achieve this with a single define:</p>

<pre class="bg-light text-dark mx-4"><code>-define png:include-chunk=none,gAMA
</code></pre>

    <p>As a special case, if the <code>sRGB</code> chunk is not excluded and
    the PNG encoder recognizes that the image contains the sRGB ICC profile,
    the PNG encoder will write the <code>sRGB</code> chunk instead of the
    entire ICC profile.  To force the PNG encoder to write the sRGB
    profile as an <code>iCCP</code> chunk in the output PNG instead of the
    <code>sRGB</code> chunk, exclude the <code>sRGB</code> chunk.</p>

    <p>The critical PNG chunks <code>IHDR</code>, <code>PLTE</code>,
    <code>IDAT</code>, and <code>IEND</code> cannot be excluded.  Any such
    entries appearing in the list will be ignored.</p>

    <p>If the ancillary PNG <code>tRNS</code> chunk is excluded and the
    image has transparency, the PNG colortype is forced to be 4 or 6
    (GRAY_ALPHA or RGBA).  If the image is not transparent, then the
    <code>tRNS</code> chunk isn't written anyhow, and there is no effect
    on the PNG colortype of the output image.</p>

    <p>The <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#strip">-strip</a> option does the equivalent of the
    following for PNG output:</p>

<pre class="bg-light text-dark mx-4"><code>-define png:exclude-chunk=EXIF,iCCP,iTXt,sRGB,tEXt,zCCP,zTXt,date</code></pre>

    <p>The default behavior is to include all known PNG ancillary chunks
    plus ImageMagick's private <code>vpAg</code> ("virtual page") chunk,
    and to exclude all PNG chunks that are unknown to ImageMagick,
    regardless of their PNG "copy-safe" status as described in the
    PNG specification.</p>

    <p>Any chunk names that are not known to ImageMagick are ignored
    if they appear in either the "include-chunk" or "exclude-chunk" list.
    The ancillary chunks currently known to ImageMagick are
    <code>bKGD</code>, <code>cHRM</code>, <code>gAMA</code>, <code>iCCP</code>,
    <code>oFFs</code>, <code>pHYs</code>, <code>sRGB</code>, <code>tEXt</code>,
    <code>tRNS</code>, <code>vpAg</code>, and <code>zTXt</code>.</p>

    <p>You can also put <code>date</code> in the list to include or exclude
    the "Date:create" and "Date:modify" text chunks that ImageMagick normally
    inserts in the output PNG.</p></td>
  </tr>

  <tr>
    <td>png:ignore-crc[=<var>true</var>]</td>
     <td>When you know your image has no CRC or ADLER32 errors, this can speed
     up decoding. It is also helpful in debugging bug reports from "fuzzers".</td>
  </tr>

  <tr>
    <td>png:preserve-colormap[=<var>true</var>]</td>
     <td>Use the existing image->colormap. Normally the PNG encoder will
    try to optimize the palette, eliminating unused entries and putting
    the transparent colors first.  If this flag is set, that behavior
    is suppressed.</td>
  </tr>

  <tr>
    <td>png:preserve-iCCP[=<var>true</var>]</td>
     <td>By default, the PNG decoder and encoder examine any ICC profile
    that is present, either from an <code>iCCP</code> chunk in the PNG
    input or supplied via an option, and if the profile is recognized
    to be the sRGB profile, converts it to the <code>sRGB</code> chunk.
    You can use <code>-define png:preserve-iCCP</code> to prevent
    this from happening; in such cases the <code>iCCP</code> chunk
    will be read or written and no <code>sRGB</code> chunk will be
    written.  There are some ICC profiles that claim to be sRGB but
    have various errors that cause them to be rejected by libpng16; such
    profiles are recognized anyhow and converted to the <code>sRGB</code>
    chunk, but are rejected if the <code>-define png:preserve-iCCP</code>
    is present. Note that not all "sRGB" ICC profiles are recognized
    yet; we will add them to the list as we encounter them.</td>
  </tr>

  <tr>
    <td>png:swap-bytes[=<var>true</var>]</td>
     <td>The PNG specification requires that any multi-byte integers be stored
    in network byte order (MSB-LSB endian).  This option allows you to
    fix any invalid PNG files that have 16-bit samples stored incorrectly
    in little-endian order (LSB-MSB).  The "-define png:swap-bytes" option
    must appear before the input filename on the commandline.  The swapping
    is done during the libpng decoding operation.</td>
  </tr>

  <tr>
    <td>ps:imagemask</td>
     <td>If the ps:imagemask flag is defined, the PS3 and EPS3 coders will
    create Postscript files that render bilevel images with the Postscript
    imagemask operator instead of the image operator.</td>
  </tr>

  <tr>
    <td>psd:additional-info=all|selective</td>
     <td>This option should only be used when converting from a PSD file to
     another PSD file. This should be placed after the image is read. The two
     options are 'all' and 'selective'. The 'selective' option will preserve
     all additional information that is not related to the geometry of the
     image. The 'all' option should only be used when the geometry of the
     image has not been changed. This option is helpful when transferring
     non-simple layers, such as adjustment layers from the input PSD file to
     the output PSD file. If this option is not used, the additional
     information will not be preserved. This define is available as of
     ImageMagick version 6.9.5-8.
    </td>
  </tr>

  <tr>
    <td>psd:alpha-unblend=off</td>
     <td>Disable new automatic un-blending of transparency with the base image
     for the flattened layer 0 before adding the alpha channel to the output
     image. This define must be placed before the input psd image. (Available
     as of IM 6.9.2.5). The automatic un-blending is new to IM 6.9.2.5 and
     prevents the transparency from being applied twice in the output
     image. This option should be set before reading the image.</td>
  </tr>

  <tr>
    <td>psd:preserve-opacity-mask=<var>true</var></td>
     <td>This option should only be used when converting from a PSD file to
     another PSD file. It will preserve the opacity mask of a layer and add it
     back to the layer when the image is saved. Setting this to 'true' will
     enable this feature. This define is available as of ImageMagick version
     6.9.5-10.
    </td>
  </tr>

 <tr>
    <td>ptif:pyramid=<var>min-base</var>x<var>levels</var></td>
    <td>Specify the min-base and number of levels of the pyramid, e.g., 64x4.</td>
  </tr>

  <tr>
    <td>svg:embedding=<var>true</var></td>
    <td>Enable embedding of a another SVG for which you trust the source.  This is disabled by default as it can be a source of infinite recusion.</td>
  </tr>

  <tr>
    <td>svg:parse-huge=<var>true</var></td>
    <td>Enable rendering of a very large SVG for which you trust the source</td>
  </tr>

  <tr>
    <td>svg:substitute-entities=<var>true</var></td>
    <td>Enable entity substitution if you trust the source.</td>
  </tr>

  <tr>
    <td>tga:preserve-orientation=<var>true</var></td>
    <td>Preserve the image orientation.</td>
  </tr>

  <tr>
    <td>tiff:alpha=<var>associated|unassociated|unspecified</var></td>
    <td>Specify the alpha extra samples as associated, unassociated or
    unspecified.</td>
  </tr>

  <tr>
    <td>tiff:assume-alpha=<var>true|false</var></td>
    <td>Assume undeclared extra channels are alpha.</td>
  </tr>

  <tr>
    <td>tiff:endian=<var>msb|lsb</var></td>
    <td> </td>
  </tr>

  <tr>
    <td>tiff:exif-properties=<var>False</var></td>
    <td>Disable reading the EXIF properties.</td>
  </tr>

  <tr>
    <td>tiff:gps-properties=<var>False</var></td>
    <td>Disable reading the GPS properties.</td>
  </tr>

  <tr>
    <td>tiff:fill-order=<var>msb|lsb</var></td>
    <td> </td>
  </tr>

  <tr>
    <td>tiff:ignore-layers=<var>true</var></td>
    <td>Ignore the Photoshop layers.</td>
  </tr>

  <tr>
    <td>tiff:ignore-tags=<var>comma-separate-list-of-tag-IDs</var></td>
    <td>Allow one or more tag ID values to be ignored.</td>
  </tr>

  <tr>
    <td>tiff:predictor=<var>[1, 2 or 3]</var></td>
    <td>A mathematical operator that is applied to the image data before an
    encoding scheme is applied. The general idea is that subsequent pixels of
    an image resemble each other. Thus, substracting the information from a
    pixel that is already contained in previous one is likely to reduce its
    information density considerably and aid subsequent compression.
    1 = No prediction scheme used before coding. 2 = Horizontal differencing.
    3 = Floating point horizontal differencing.</td>
  </tr>

  <tr>
    <td>tiff:rows-per-strip=<var>value</var></td>
    <td>Set the number of rows per strip.</td>
  </tr>

  <tr>
    <td>tiff:tile-geometry=<var>WxH</var></td>
    <td>Set the tile size for pyramid tiffs. Requires the suffix
        PTIF: before the outputname.</td>
  </tr>

  <tr>
   <td colspan=2><p></p></td>
  </tr>

  <tr>
   <td colspan=2><p></p></td>
  </tr>

  <tr>
    <th align="center" colspan=2>PSEUDO-IMAGE FORMATS</th>
  </tr>

  <tr>
    <td>caption:max-pointsize=<var>pointsize</var></td>
     <td>Limit the maximum point size</td>
  </tr>

  <tr>
    <td>caption:split=<var>boolean</var></td>
   <td>split text if required to fit caption on canvas</td>
  </tr>

   <tr>
    <td>gradient:angle=<var>angle (in degrees)</var></td>
     <td>For a linear gradient, this specifies the direction of
     the gradient going from color1 to color2 in a clockwise
     positive manner relative to north (up). For a radial
     gradient, this specifies the rotation of the gradient in a
     clockwise positive manner from its normal X-Y orientation.
      Supported in ImageMagick 6.9.2-5.</td>
   </tr>

   <tr>
   	 <td>gradient:bounding-box=<var>WxH+X+Y</var></td>
     <td>Limit the gradient to a larger or smaller region than
     the image dimensions. If the region defined by the bounding
     box is smaller than the image, then color1 will be the color
     of the background.
      Supported in ImageMagick 6.9.2-5.</td>
   </tr>

   <tr>
    <td>gradient:center=<var>x,y</var></td>
     <td>Specify the coordinates of the center point for the
     radial gradient. The default is the center of the image.
      Supported in ImageMagick 6.9.2-5.</td>
   </tr>

    <tr>
    <td>gradient:direction=<var>value</var></td>
     <td>Specify the direction of the linear gradient towards
     the top/bottom/left/right or diagonal corners. The choices are:
     NorthWest, North, Northeast, West, East, SouthWest, South, SouthEast.
      Supported in ImageMagick 6.9.2-5.</td>
   </tr>

     <tr>
    <td>gradient:extent=<var>value</var></td>
     <td>Specify the shape of an image centered radial gradient.
     The choices are: Circle, Diagonal, Ellipse, Maximum, Minimum.
     Circle and Maximum draw a circular radial gradient even for
     rectangular shaped images of radius equal to the larger of
     the half-width and half-height of the image. The Circle and
     Maximum options are both equivalent to the default radial
     gradient. The Minimum option draws a circular radial gradient
     even for rectangular shaped images of radius equal to the
     smaller of the half-width and half-height of the image.
     The Diagonal option draws a circular radial gradient even
     for rectangular shaped images of radius equal to the
     half-diagonal of the image. The Ellipse options draws an
     elliptical radial gradient for rectangular shaped images of
     radii equal to half the width and half the height of the image.
      Supported in ImageMagick 6.9.2-5.</td>
   </tr>

 <tr>
    <td>gradient:radii=<var>x,y</var></td>
     <td>Specify the x and y radii of the gradient. If the
     x radius and the y radius are equal, the shape of the
     radial gradient will be a circle. If they differ, then
     the shape will be an ellipse. The default values are the
     maximum of the half width and half height of the image.
      Supported in ImageMagick 6.9.2-5.</td>
   </tr>

   <tr>
    <td>gradient:vector=<var>x1,y1,x2,y2</var></td>
     <td>Specify the direction of the linear gradient going from
     vector1 (x1,y1) to vector2 (x2,y2). Color1 (fromColor) will be
     located at vector position x1,y1 and color2 (toColor) will be
     located at vector position x2,y2.
      Supported in ImageMagick 6.9.2-5.</td>
   </tr>

  <tr>
    <td>histogram:unique-colors=<var>false</var></td>
     <td>Suppress the textual listing of the image's unique colors.</td>
   </tr>

  <tr>
    <td>pango:align=<var>left|center|right</var></td>
     <td></td>
   </tr>

  <tr>
    <td>pango:auto-dir=<var>true|false</var></td>
     <td></td>
   </tr>

  <tr>
    <td>pango:ellipsize=<var>start|middle|end</var></td>
     <td></td>
   </tr>

  <tr>
    <td>pango:gravity-hint=<var>natural|strong|line</var></td>
     <td></td>
   </tr>

  <tr>
    <td>pango:hinting=<var>none|auto|full</var></td>
     <td></td>
   </tr>

  <tr>
    <td>pango:indent=<var>points</var></td>
     <td></td>
   </tr>

   <tr>
    <td>pango:justify=<var>true|false</var></td>
     <td></td>
   </tr>

   <tr>
    <td>pango:language=<var>en_US|others</var></td>
     <td></td>
   </tr>

   <tr>
    <td>pango:markup=<var>true|false</var></td>
     <td></td>
   </tr>

   <tr>
    <td>pango:single-paragraph=<var>true|false</var></td>
     <td></td>
   </tr>

  <tr>
    <td>pango:wrap=<var>word|char|word-char</var></td>
     <td></td>
   </tr>


    <tr>
    <td>txt:compliance=<var>value</var></td>
     <td>Set the "txt:" format for the values in parentheses according to
     several standards. The choices are svg, none, undefined, mvg, x11, xpm.
     The default will list values for (s)RGB colors in the quantum range.
     The SVG, X11, XPM, MVG and None options lists values in the 8-bit range
     for all Q-level compiles. The undefined option also lists values in the
     quantum range. When colors are presented or converted to hue-based
     colorspaces, the values listed will be integers for hue and percents for
     the other two components. For other colorspaces, values may be listed as
     either percents or fractional value. Setting the depth to 8 will limit
     values to the 8-bit range, except for hue-based colors.</td>
   </tr>

  <tr>
    <td>webp:<var>tag</var>=<var>value</var></td>
    <td>WebP has a plethora of defines detailed on this <a href="<?php echo $_SESSION['RelativePath']?>/../script/webp.php">page</a>.</td>
  </tr>

  <tr>
    <td>xmp:validate=<var>{true,false}</var></td>
    <td>By default, ImageMagick validates any XMP profile embedded in an image.</td>
  </tr>

<tr>
   <td colspan=2><p></p></td>
  </tr>

   <tr>
   <td colspan=2><p></p></td>
  </tr>

  <tr>
    <th align="center" colspan=2>Identify Defines</th>
  </tr>

  <tr>
   <td colspan=2><p></p></td>
  </tr>

  <tr>
    <td>identify:locate=<var>value</var></td>
    <td>Display minimum or maximum pixel locations. Valid values are <samp>minimum</samp>,<samp>maximum</samp>. The default is <samp>maximum.</samp></td>
  </tr>

  <tr>
    <td>identify:limit=<var>value</var></td>
    <td>The maximum number of pixel locations to display when using <samp>identify:locate</samp>.</td>
  </tr>
</table>

</div>
</div>
