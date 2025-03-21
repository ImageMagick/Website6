<div>
<p class="text-center"><a href="#usage">Example Usage</a> • <a href="#options">Option Summary</a> • <a href="#msl">Magick Scripting Language (MSL)</a> </p>

<p class="lead">The <code>conjure</code> program gives you the ability to perform custom image processing tasks from a script written in the Magick Scripting Language (MSL).  MSL is XML-based and consists of action statements with attributes.  Actions include reading an image, processing an image, getting attributes from an image, writing an image, and more.  An attribute is a key/value pair that modifies the behavior of an action.  See <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-processing.php">Command Line Processing</a> for advice on how to structure your <code>conjure</code> command or see below for example usages of the command.</p>

<h2><a class="anchor" id="usage"></a>Example Usage</h2>

<p>We list a few examples of the <code>conjure</code> command here to illustrate its usefulness and ease of use. To get started, here is simple <code>conjure</code> command:</p>

<pre class="bg-light text-dark mx-4"><code>conjure -dimensions 400x400 msl:incantation.msl
</code></pre>

<p>The MSL script <a href="<?php echo $_SESSION['RelativePath']?>/../source/incantation.msl">incantation.msl</a> used above is here:</p>

<pre class="bg-light text-dark mx-4"><code>&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;image&gt;
  &lt;read filename="image.gif" /&gt;
  &lt;get width="base-width" height="base-height" /&gt;
  &lt;resize geometry="%[dimensions]" /&gt;
  &lt;get width="resize-width" height="resize-height" /&gt;
  &lt;print output="Image sized from %[base-width]x%[base-height] to %[resize-width]x%[resize-height].\n" /&gt;
  &lt;write filename="image.png" /&gt;
&lt;/image&gt;
</code></pre>

<p>In this example, a family stayed home for their vacation but as far as their friends are concerned they went to a beautiful beach in the Caribbean:</p>

<pre class="bg-light text-dark mx-4"><code>&lt;?xml version="1.0" encoding="UTF-8"?>
&lt;group>
    &lt;image id="family">
        &lt;read filename="family.gif"/>
        &lt;resize geometry="300x300"/>
    &lt;/image>
    &lt;image id="palm-trees">
        &lt;read filename="palm-trees.gif"/>
        &lt;resize geometry="300x100"/>
    &lt;/image>
    &lt;image>
        &lt;read filename="beach.jpg"/>
        &lt;composite image="family" geometry="+30+40"/>
        &lt;composite image="palm-trees" geometry="+320+90"/>
    &lt;/image>
    &lt;write filename="family-vacation.png"/>
&lt;/group>
</code></pre>

<p>Here we display the width in pixels of text for a particular font and pointsize.</p>

<pre class="bg-light text-dark mx-4"><code>&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;image&gt;
  &lt;query-font-metrics text="ImageMagick" font="helvetica" pointsize="48" /&gt;
  &lt;print output="Text width is %[msl:font-metrics.width] pixels.\n" /&gt;
&lt;/image&gt;
</code></pre>

<p>The <code>query-font-metrics</code> tag supports these properties:</p>

<pre class="bg-light text-dark mx-4"><code>msl:font-metrics.pixels_per_em.x
msl:font-metrics.pixels_per_em.y
msl:font-metrics.ascent
msl:font-metrics.descent
msl:font-metrics.width
msl:font-metrics.height
msl:font-metrics.max_advance
msl:font-metrics.bounds.x1
msl:font-metrics.bounds.y1
msl:font-metrics.bounds.x2
msl:font-metrics.bounds.y2
msl:font-metrics.origin.x
msl:font-metrics.origin.y
</code></pre>

<p>MSL supports most methods and attributes discussed in the <a href="<?php echo $_SESSION['RelativePath']?>/../script/perl-magick.php">Perl API for ImageMagick</a>.
</p>

<p>In addition, MSL supports the <code>swap</code> element with a single <code>indexes</code> element.</p>

<h2><a class="anchor" id="options"></a>Option Summary</h2>

<p>The <code>conjure</code> command recognizes these options.  Click on an option to get more details about how that option works.</p>

<table class="table table-sm table-hover table-striped table-responsive">
<thead>
  <tr>
    <th align="left">Option</th>
    <th align="left">Description</th>
  </tr>
</thead>

<tbody>
  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#debug">-debug <var>events</var></a></td>
    <td>display copious debugging information</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#help">-help</a></td>
    <td>print program options</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#log">-log <var>format</var></a></td>
    <td>format of debugging information</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#monitor">-monitor</a></td>
    <td>monitor progress</td>
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
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#seed">-seed <var>value</var></a></td>
    <td>seed a new sequence of pseudo-random numbers</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#verbose">-verbose</a></td>
    <td>print detailed information about the image</td>
  </tr>

  <tr>
    <td><a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#version">-version</a></td>
    <td>print version information</td>
  </tr>

  </tbody>
</table>

<h2><a class="anchor" id="msl"></a>Magick Scripting Language</h2>
<p>The <code>conjure</code> command recognizes these MSL elements.  Any element with a strike-thru is not supported yet.</p>
<table class="table table-sm table-hover table-striped table-responsive caption-top">
<caption>Magick Scripting Language (MSL)</caption>
<thead>
  <tr>
    <th>Method</th>
    <th style="width: 40%;">Parameters</th>
    <th style="width: 40%;">Description</th>
  </tr>
</thead>

<tbody>
  <tr>
    <td><strike>adaptiveblur</strike></td>
    <td>geometry="geometry", radius="double", sigma="double", bias="double", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow"</td>

    <td>adaptively blur the image with a Gaussian operator of the given radius and standard deviation (sigma).  Decrease the effect near edges.</td>
  </tr>

  <tr>
    <td><strike>adaptiveresize</strike></td>
    <td>geometry="geometry", width="integer", height="integer", filter="Point, Box, Triangle, Hermite, Hanning, Hamming, Blackman, Gaussian, Quadratic, Cubic, Catrom, Mitchell, Lanczos, Bessel, Sinc", support="double", blur="double"</td>

    <td>adaptively resize image using data dependant triangulation. Specify blur &gt; 1 for blurry or &lt; 1 for sharp</td>
  </tr>

  <tr>
    <td><strike>adaptivesharpen</strike></td>

    <td>geometry="geometry", radius="double", sigma="double", bias="double", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow"</td>
    <td>adaptively sharpen the image with a Gaussian operator of the given radius and standard deviation (sigma).  Increase the effect near edges.</td>
  </tr>

  <tr>
    <td><strike>adaptivethreshold</strike></td>
    <td>geometry="geometry", width="integer", height="integer", offset="integer"</td>
    <td>local adaptive thresholding.</td>

  </tr>

  <tr>
    <td><strike>addnoise</strike></td>
    <td>noise="Uniform, Gaussian, Multiplicative, Impulse, Laplacian, Poisson", attenuate="double", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow"</td>
    <td>add noise to an image</td>

  </tr>

  <tr>
    <td><strike>affinetransform</strike></td>
    <td>affine="array of float values", translate="float, float", scale= "float, float", rotate="float", skewX="float", skewY="float", interpolate="Average, Bicubic, Bilinear, Filter, Integer, Mesh, NearestNeighbor", background="color name"</td>

    <td>affine transform image</td>
  </tr>

  <tr>
    <td><strike>affinity</strike></td>
    <td>image="image-handle", method="None, FloydSteinberg, Riemersma"</td>

    <td>choose a particular set of colors from this image</td>
  </tr>

  <tr>
    <td>&lt;annotate&gt;</td>
    <td>text="string", font="string", family="string", style="Normal, Italic, Oblique, Any", stretch="Normal, UltraCondensed, ExtraCondensed, Condensed, SemiCondensed, SemiExpanded, Expanded, ExtraExpanded, UltraExpanded", weight="integer", pointsize="integer", density="geometry", stroke="color name", strokewidth="integer", fill="color name", undercolor="color name", kerning="float", geometry="geometry", gravity="NorthWest, North, NorthEast, West, Center, East, SouthWest, South, SouthEast", antialias="true, false", x="integer", y="integer", affine="array of float values", translate="float, float", scale="float, float", rotate="float". skewX="float", skewY= "float", align="Left, Center, Right", encoding="UTF-8", interline-spacing="double", interword-spacing="double", direction="right-to-left, left-to-right"</td>

    <td>annotate an image with text. See QueryFontMetrics to get font metrics without rendering any text.</td>
  </tr>

  <tr>
    <td><strike>autogamma</strike></td>
    <td>channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow"</td>

    <td>automagically adjust gamma level of image</td>
  </tr>

  <tr>
    <td><strike>autolevel</strike></td>
    <td>channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow"</td>
    <td>automagically adjust color levels of image</td>

  </tr>

  <tr>
    <td><strike>autoorient</strike></td>
    <td> </td>
    <td>adjusts an image so that its orientation is suitable for viewing (i.e. top-left orientation)</td>
  </tr>

  <tr>

    <td><strike>blackthreshold</strike></td>
    <td>threshold="string", , channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow"</td>
    <td>force all pixels below the threshold intensity into black</td>
  </tr>

  <tr>

    <td><strike>blueshift</strike></td>
    <td>factor="double",</td>
    <td>simulate a scene at nighttime in the moonlight.  Start with a factor of 1.5.</td>
  </tr>

  <tr>
    <td>&lt;blur&gt;</td>

    <td>geometry="geometry", radius="double", sigma="double", bias="double", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow"</td>
    <td>reduce image noise and reduce detail levels with a Gaussian operator of the given radius and standard deviation (sigma).</td>
  </tr>

  <tr>
    <td>&lt;border&gt;</td>
    <td>geometry="geometry", width="integer", height="integer", bordercolor="color name",  compose="Undefined, Add, Atop, Blend, Bumpmap, Clear, ColorBurn, ColorDodge, Colorize, CopyBlack, CopyBlue, CopyCMYK, Cyan, CopyGreen, Copy, CopyMagenta, CopyOpacity, CopyRed, RGB, CopyYellow, Darken, Dst, Difference, Displace, Dissolve, DstAtop, DstIn, DstOut, DstOver, Dst, Exclusion, HardLight, Hue, In, Lighten, Luminize, Minus, Modulate, Multiply, None, Out, Overlay, Over, Plus, ReplaceCompositeOp, Saturate, Screen, SoftLight, Src, SrcAtop, SrcIn, SrcOut, SrcOver, Src, Subtract, Threshold, Xor ",</td>

    <td>surround the image with a border of color</td>
  </tr>

  <tr>
    <td>&lt;charcoal&gt;</td>
    <td>geometry="geometry", radius="double", sigma="double"</td>

    <td>simulate a charcoal drawing</td>
  </tr>

  <tr>
    <td>&lt;chop&gt;</td>
    <td>geometry="geometry", width="integer", height="integer", x="integer", y="integer"</td>

    <td>chop an image</td>
  </tr>

  <tr>
    <td><strike>clamp</strike></td>
    <td>channel="Red, RGB, All, etc."</td>
    <td>set each pixel whose value is below zero to zero and any the pixel whose value is above the quantum range to the quantum range (e.g. 65535) otherwise the pixel value remains unchanged.</td>

  </tr>

  <tr>
    <td><strike>clip</strike></td>
    <td>id="name", inside=""true, false"",</td>
    <td>apply along a named path from the 8BIM profile.</td>

  </tr>

  <tr>
    <td><strike>clipmask</strike></td>
    <td>mask="image-handle"</td>
    <td>clip image as defined by the image mask</td>
  </tr>

  <tr>
    <td><strike>clut</strike></td>
    <td>image="image-handle",  interpolate="Average, Bicubic, Bilinear, Filter, Integer, Mesh, NearestNeighbor", channel="Red, RGB, All, etc."</td>
    <td>apply a color lookup table to an image sequence</td>
  </tr>

  <tr>
    <td><strike>coalesce</strike></td>
    <td> </td>
    <td>merge a sequence of images</td>
  </tr>

  <tr>
    <td><strike>color</strike></td>

    <td>color="color name"</td>
    <td>set the entire image to this color.</td>
  </tr>

  <tr>
    <td><strike>colordecisionlist</strike></td>
    <td>filename="string",</td>

    <td>color correct with a color decision list.</td>
  </tr>

  <tr>
    <td>&lt;colorize&gt;</td>
    <td>fill="color name", blend="string"</td>

    <td>colorize the image with the fill color</td>
  </tr>

  <tr>
    <td><strike>colormatrix</strike></td>
    <td>matrix="array of float values"</td>
    <td>apply color correction to the image.  Although you can use variable sized matrices, typically you use a 5 x 5 for an RGBA image and a 6x6 for CMYKA.  A 6x6 matrix is required for offsets (populate the last column with normalized values).</td>

  </tr>

  <tr>
    <td>&lt;comment&gt;</td>
    <td>string</td>
    <td>add a comment to your image</td>
  </tr>

  <tr>
    <td><strike>comparelayers</strike></td>
    <td>method="any, clear, overlay"</td>
    <td>compares each image with the next in a sequence and returns the minimum bounding region of any pixel differences it discovers.  Images do not have to be the same size, though it is best that all the images are coalesced (images are all the same size, on a flattened canvas, so as to represent exactly how a specific frame should look).</td>
  </tr>

  <tr>

    <td>&lt;composite&gt;</td>
    <td>image="image-handle", compose="Undefined, Add, Atop, Blend, Bumpmap, Clear, ColorBurn, ColorDodge, Colorize, CopyBlack, CopyBlue, CopyCMYK, Cyan, CopyGreen, Copy, CopyMagenta, CopyOpacity, CopyRed, RGB, CopyYellow, Darken, Dst, Difference, Displace, Dissolve, DstAtop, DstIn, DstOut, DstOver, Dst, Exclusion, HardLight, Hue, In, Lighten, Luminize, Minus, Modulate, Multiply, None, Out, Overlay, Over, Plus, ReplaceCompositeOp, Saturate, Screen, SoftLight, Src, SrcAtop, SrcIn, SrcOut, SrcOver, Src, Subtract, Threshold, Xor ", mask="image-handle", geometry="geometry", x="integer", y="integer", gravity="NorthWest, North, NorthEast, West, Center, East, SouthWest, South, SouthEast", opacity="integer", tile="True, False", rotate="double", color="color name", blend="geometry", interpolate="undefined, average, bicubic, bilinear, filter, integer, mesh, nearest-neighbor, spline"</td>

    <td>composite one image onto another.  Use the rotate parameter in concert with the tile parameter.</td>
  </tr>

  <tr>
    <td>&lt;contrast&gt;</td>
    <td>sharpen="True, False"</td>
    <td>enhance or reduce the image contrast</td>

  </tr>

  <tr>
    <td><strike>contraststretch</strike></td>
    <td>levels="string", 'black-point'="double", 'white-point'="double", channel="Red, RGB, All, etc."</td>

    <td>improve the contrast in an image by `stretching' the range of intensity values</td>
  </tr>

  <tr>
    <td><strike>convolve</strike></td>
    <td>coefficients="array of float values", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow", bias="double"</td>

    <td>apply a convolution kernel to the image. Given a kernel "order" , you would supply "order*order" float values (e.g. 3x3 implies 9 values).</td>
  </tr>

  <tr>
    <td>&lt;crop&gt;</td>

    <td>geometry="geometry", width="integer", height="integer", x="integer", y="integer", fuzz="double", gravity="NorthWest, North, NorthEast, West, Center, East, SouthWest, South, SouthEast"</td>
    <td>crop an image</td>

  </tr>

  <tr>
    <td><strike>cyclecolormap</strike></td>
    <td>amount="integer"</td>
    <td>displace image colormap by amount</td>
  </tr>

  <tr>
    <td><strike>decipher</strike></td>
    <td>passphrase="string"</td>
    <td>convert cipher pixels to plain pixels</td>
  </tr>

  <tr>

    <td><strike>deconstruct</strike></td>
    <td> </td>
    <td>break down an image sequence into constituent parts</td>
  </tr>

  <tr>
    <td><strike>deskew</strike></td>
    <td>geometry="string",threshold="double"</td>

    <td>straighten the image</td>
  </tr>

  <tr>
    <td>&lt;despeckle&gt;</td>
    <td> </td>
    <td>reduce the speckles within an image</td>
  </tr>

  <tr>
    <td><strike>difference</strike></td>
    <td>image="image-handle"</td>
    <td>compute the difference metrics between two images </td>
  </tr>

  <tr>

    <td><strike>distort</strike></td>
    <td>points="array of float values", method="Affine, AffineProjection, Bilinear, Perspective, Resize, ScaleRotateTranslate", virtual-pixel="Background Black Constant Dither Edge Gray Mirror Random Tile Transparent White", best-fit="True, False"</td>
    <td>distort image</td>
  </tr>

  <tr>
    <td>&lt;draw&gt;</td>
    <td>primitive="point, line, rectangle, arc, ellipse, circle, path, polyline, polygon, bezier, color, matte, text, @"filename"", points="string" , method=""Point, Replace, Floodfill, FillToBorder, Reset"", stroke="color name", fill="color name", font="string", pointsize="integer", strokewidth="float", antialias="true, false", bordercolor="color name", x="float", y="float", dash-offset="float", dash-pattern="array of float values", affine="array of float values", translate="float, float", scale="float, float", rotate="float",  skewX="float", skewY="float", interpolate="undefined, average, bicubic, bilinear, mesh, nearest-neighbor, spline", kerning="float", text="string", vector-graphics="string", interline-spacing="double", interword-spacing="double", direction="right-to-left, left-to-right"</td>

    <td>annotate an image with one or more graphic primitives.</td>
  </tr>

  <tr>
    <td><strike>encipher</strike></td>
    <td>passphrase="string"</td>
    <td>convert plain pixels to cipher pixels</td>

  </tr>

  <tr>
    <td>&lt;edge&gt;</td>
    <td>radius="double"</td>
    <td>enhance edges within the image with a convolution filter of the given radius.</td>
  </tr>

  <tr>
    <td>&lt;emboss&gt;</td>
    <td>geometry="geometry", radius="double", sigma="double"</td>
    <td>emboss the image with a convolution filter of the given radius and standard deviation (sigma).</td>

  </tr>

  <tr>
    <td>&lt;enhance&gt;</td>
    <td> </td>
    <td>apply a digital filter to enhance a noisy image</td>
  </tr>

  <tr>

    <td>&lt;equalize&gt;</td>
    <td>channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow" </td>
    <td>perform histogram equalization to the image</td>
  </tr>

  <tr>
    <td><strike>extent</strike></td>

    <td>geometry="geometry", width="integer", height="integer", x="integer", y="integer", fuzz="double", background="color name", gravity="NorthWest, North, NorthEast, West, Center, East, SouthWest, South, SouthEast"</td>

    <td>set the image size</td>
  </tr>

  <tr>
    <td><strike>evaluate</strike></td>
    <td>value="double", operator=""Add, And, Divide, LeftShift, Max, Min, Multiply, Or, Rightshift, Subtract, Xor"", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow" </td>

    <td>apply an arithmetic, relational, or logical expression to the image</td>
  </tr>

  <tr>
    <td><strike>filter</strike></td>
    <td>kernel="string", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow", bias="double"</td>

    <td>apply a convolution kernel to the image.</td>
  </tr>

  <tr>
    <td>&lt;flip&gt;</td>
    <td> </td>
    <td>reflect the image scanlines in the vertical direction</td>
  </tr>

  <tr>
    <td>&lt;flop&gt;</td>
    <td> </td>
    <td>reflect the image scanlines in the horizontal direction</td>
  </tr>

  <tr>
    <td><strike>floodfillpaint</strike></td>

    <td>geometry="geometry", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow", x="integer", y="integer" , fill="color name", bordercolor="color name", fuzz="double", invert="True, False"</td>

    <td>changes the color value of any pixel that matches the color of the target pixel and is a neighbor. If you specify a border color, the color value is changed for any neighbor pixel that is not that color.</td>
  </tr>

  <tr>
    <td><strike>forwardfouriertransform</strike></td>
    <td>magnitude="True, False"</td>
    <td>implements the forward discrete Fourier transform (DFT)</td>

  </tr>

  <tr>
    <td>&lt;frame&gt;</td>
    <td>geometry="geometry", width="integer", height="integer", inner="integer", outer="integer", fill="color name",  compose="Undefined, Add, Atop, Blend, Bumpmap, Clear, ColorBurn, ColorDodge, Colorize, CopyBlack, CopyBlue, CopyCMYK, Cyan, CopyGreen, Copy, CopyMagenta, CopyOpacity, CopyRed, RGB, CopyYellow, Darken, Dst, Difference, Displace, Dissolve, DstAtop, DstIn, DstOut, DstOver, Dst, Exclusion, HardLight, Hue, In, Lighten, Luminize, Minus, Modulate, Multiply, None, Out, Overlay, Over, Plus, ReplaceCompositeOp, Saturate, Screen, SoftLight, Src, SrcAtop, SrcIn, SrcOut, SrcOver, Src, Subtract, Threshold, Xor ",</td>

    <td>surround the image with an ornamental border</td>
  </tr>

  <tr>
    <td><strike>function</strike></td>
    <td>parameters="array of float values", function="Sin", virtual-pixel="Background Black Constant Dither Edge Gray Mirror Random Tile Transparent White"</td>

    <td>apply a function to the image</td>
  </tr>

  <tr>
    <td>&lt;gamma&gt;</td>
    <td>gamma="string", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow"</td>

    <td>gamma correct the image</td>
  </tr>

  <tr>
    <td><strike>gaussianblur</strike></td>
    <td>geometry="geometry", radius="double", sigma="double", bias="double", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow"</td>

    <td>reduce image noise and reduce detail levels with a Gaussian operator of the given radius and standard deviation (sigma).</td>
  </tr>

  <tr>
    <td><strike>getpixel</strike></td>
    <td>geometry="geometry", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow", normalize="true, false", x="integer", y="integer"</td>

    <td>get a single pixel. By default normalized pixel values are returned.</td>
  </tr>

  <tr>
    <td><strike>getpixels</strike></td>
    <td>geometry="geometry", width="integer", height="integer", x="integer", y="integer", map="string", normalize="true, false"</td>

    <td>get image pixels as defined by the map (e.g. "RGB", "RGBA", etc.).  By default non-normalized pixel values are returned.</td>
  </tr>

  <tr>
    <td><strike>grayscale</strike></td>
    <td>channel="Average, Brightness, Lightness, Rec601Luma, Rec601Luminance, Rec709Luma, Rec709Luminance, RMS"</td>
    <td>convert image to grayscale</td>

  </tr>

  <tr>
    <td><strike>haldclut</strike></td>
    <td>image="image-handle",  channel="Red, RGB, All, etc."</td>
    <td>apply a Hald color lookup table to an image sequence</td>

  </tr>

  <tr>
    <td><strike>identify</strike></td>
    <td>file="file", features="distance", unique="True, False"</td>
    <td>identify the attributes of an image</td>

  </tr>

  <tr>
    <td>&lt;implode&gt;</td>
    <td>amount="double", interpolate="undefined, average, bicubic, bilinear, mesh, nearest-neighbor, spline"</td>
    <td>implode image pixels about the center</td>

  </tr>

  <tr>
    <td><strike>inversediscretefouriertransform</strike></td>
    <td>magnitude="True, False"</td>
    <td>implements the inverse discrete Fourier transform (DFT)</td>
  </tr>

  <tr>
    <td>&lt;label&gt;</td>
    <td>string</td>
    <td>assign a label to an image</td>
  </tr>

  <tr>

    <td><strike>layers</strike></td>
    <td>method="coalesce, compare-any, compare-clear, compare-over, composite, dispose, flatten, merge, mosaic, optimize, optimize-image, optimize-plus, optimize-trans, remove-dups, remove-zero",  compose="Undefined, Add, Atop, Blend, Bumpmap, Clear, ColorBurn, ColorDodge, Colorize, CopyBlack, CopyBlue, CopyCMYK, Cyan, CopyGreen, Copy, CopyMagenta, CopyOpacity, CopyRed, RGB, CopyYellow, Darken, Dst, Difference, Displace, Dissolve, DstAtop, DstIn, DstOut, DstOver, Dst, Exclusion, HardLight, Hue, In, Lighten, LinearLight, Luminize, Minus, Modulate, Multiply, None, Out, Overlay, Over, Plus, ReplaceCompositeOp, Saturate, Screen, SoftLight, Src, SrcAtop, SrcIn, SrcOut, SrcOver, Src, Subtract, Threshold, Xor ", dither="true, false"</td>
    <td>compare each image the GIF disposed forms of the previous image in the sequence.  From this, attempt to select the smallest cropped image to replace each frame, while preserving the results of the animation.</td>
  </tr>

  <tr>

    <td>&lt;level&gt;</td>
    <td>levels="string", 'black-point'="double", 'gamma'="double", 'white-point'="double", channel="Red, RGB, All, etc."</td>
    <td>adjust the level of image contrast</td>

  </tr>

  <tr>
    <td><strike>levelcolors</strike></td>
    <td>invert=&gt;"True, False", 'black-point'="string",  'white-point'="string", channel="Red, RGB, All, etc."</td>

    <td>level image with the given colors</td>
  </tr>

  <tr>
    <td><strike>linearstretch</strike></td>
    <td>levels="string", 'black-point'="double", 'white-point'="double"</td>

    <td>linear with saturation stretch</td>
  </tr>

  <tr>
    <td><strike>liquidresize</strike></td>
    <td>geometry="geometry", width="integer", height="integer", delta-x="double", rigidity="double"</td>

    <td>rescale image with seam-carving.</td>
  </tr>

  <tr>
    <td>&lt;magnify&gt;</td>
    <td> </td>
    <td>double the size of the image with pixel art scaling</td>
  </tr>

  <tr>
    <td><strike>mask</strike></td>
    <td>mask="image-handle"</td>
    <td>composite image pixels as defined by the mask</td>
  </tr>

  <tr>

    <td><strike>mattefloodfill</strike></td>
    <td>geometry="geometry", x="integer", y="integer" , matte="integer", bordercolor="color name", fuzz="double", invert="True, False"</td>

    <td>changes the matte value of any pixel that matches the color of the target pixel and is a neighbor. If you specify a border color, the matte value is changed for any neighbor pixel that is not that color.</td>
  </tr>

  <tr>
    <td><strike>medianfilter</strike></td>
    <td>geometry="geometry", width="integer", height="integer", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow"</td>

    <td>replace each pixel with the median intensity pixel of a neighborhood.</td>
  </tr>

  <tr>
    <td>&lt;minify&gt;</td>
    <td> </td>
    <td>half the size of an image</td>
  </tr>

  <tr>
    <td><strike>mode</strike></td>
    <td>geometry="geometry", width="integer", height="integer", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow"</td>
    <td>make each pixel the "predominant color" of the neighborhood.</td>

  </tr>

  <tr>
    <td>&lt;modulate&gt;</td>
    <td>factor="geometry", brightness="double", saturation="double", hue="double", lightness="double", whiteness="double", blackness="double" </td>

    <td>vary the brightness, saturation, and hue of an image by the specified percentage</td>
  </tr>

  <tr>
    <td><strike>morphology</strike></td>
    <td>kernel="string", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow", iterations="integer"</td>

    <td>apply a morphology method to the image.</td>
  </tr>

  <tr>
    <td><strike>motionblur</strike></td>
    <td>geometry="geometry", radius="double", sigma="double", angle="double", bias="double", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow"</td>

    <td>reduce image noise and reduce detail levels with a Gaussian operator of the given radius and standard deviation (sigma) at the given angle to simulate the effect of motion</td>
  </tr>

  <tr>
    <td>&lt;negate&gt;</td>
    <td>gray="True, False", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow"</td>
    <td>replace each pixel with its complementary color (white becomes black, yellow becomes blue, etc.)</td>

  </tr>

  <tr>
    <td>&lt;normalize&gt;</td>
    <td>channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow" </td>
    <td>transform image to span the full range of color values</td>
  </tr>

  <tr>
    <td><strike>oilpaint</strike></td>
    <td>radius="integer"</td>
    <td>simulate an oil painting</td>
  </tr>

  <tr>

    <td>&lt;opaque&gt;</td>
    <td>color="color name",
fill="color name", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow", invert="True, False"</td>
    <td>change this color to the fill color within the image</td>
  </tr>

  <tr>
    <td><strike>ordereddither</strike></td>
    <td>threshold="threshold, checks, o2x2, o3x3, o4x4, o8x8, h4x4a, h6x6a, h8x8a, h4x4o, h6x6o, h8x8o, h16x16o, hlines6x4", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow"</td>
    <td>order dither image</td>
  </tr>

  <tr>
    <td><strike>perceptible</strike></td>
    <td>epsilon="double", channel="Red, RGB, All, etc."</td>
    <td>set each pixel whose value is less than |"epsilon"| to "-epsilon" or "epsilon" (whichever is closer) otherwise the pixel value remains unchanged..</td>

  </tr>

  <tr>
    <td><strike>polaroid</strike></td>
    <td>caption="string", angle="double", pointsize="double", font="string", stroke= "color name", strokewidth="integer", fill="color name", gravity="NorthWest, North, NorthEast, West, Center, East, SouthWest, South, SouthEast",  background="color name"</td>

    <td>simulate a Polaroid picture.</td>
  </tr>

  <tr>
    <td><strike>posterize</strike></td>
    <td>levels="integer", dither="True, False"</td>

    <td>reduce the image to a limited number of color level</td>
  </tr>

  <tr>
    <td>&lt;profile&gt;</td>
    <td>name="string", profile="blob", rendering-intent="Undefined, Saturation, Perceptual, Absolute, Relative", black-point-compensation="True, False"</td>

    <td>add or remove ICC or IPTC image profile; name is formal name (e.g. ICC or filename; set profile to '' to remove profile</td>
  </tr>

  <tr>
    <td>&lt;quantize&gt;</td>
    <td>colors="integer", colorspace="RGB, Gray, Transparent, OHTA, XYZ, YCbCr, YIQ, YPbPr, YUV, CMYK, sRGB, HSL, HSB", treedepth= "integer", dither="True, False", dither-method="Riemersma, Floyd-Steinberg", measure_error="True, False", global_colormap="True, False", transparent-color="color"</td>

    <td>preferred number of colors in the image</td>
  </tr>

  <tr>
    <td><strike>radialblur</strike></td>
    <td>geometry="geometry", angle="double", bias="double", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow"</td>

    <td>radial blur the image.</td>
  </tr>

  <tr>
    <td>&lt;raise&gt;</td>
    <td>geometry="geometry", width="integer", height="integer", x="integer", y="integer", raise="True, False"</td>

    <td>lighten or darken image edges to create a 3-D effect</td>
  </tr>

  <tr>
    <td><strike>reducenoise</strike></td>
    <td>geometry="geometry", width="integer", height="integer", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow"</td>

    <td>reduce noise in the image with a noise peak elimination filter</td>
  </tr>

  <tr>
    <td><strike>remap</strike></td>
    <td>image="image-handle",  dither="true, false", dither-method="Riemersma, Floyd-Steinberg"</td>

    <td>replace the colors of an image with the closest color from a reference image.</td>
  </tr>

  <tr>
    <td>&lt;resample&gt;</td>
    <td>density="geometry", x="double", y="double", filter="Point, Box, Triangle, Hermite, Hanning, Hamming, Blackman, Gaussian, Quadratic, Cubic, Catrom, Mitchell, Lanczos, Bessel, Sinc", support="double"</td>

    <td>resample image to desired resolution. Specify blur &gt; 1 for blurry or &lt; 1 for sharp</td>
  </tr>

  <tr>
    <td>&lt;resize&gt;</td>

    <td>geometry="geometry", width="integer", height="integer", filter="Point, Box, Triangle, Hermite, Hanning, Hamming, Blackman, Gaussian, Quadratic, Cubic, Catrom, Mitchell, Lanczos, Bessel, Sinc", support="double", blur="double"</td>
    <td>scale image to desired size. Specify blur &gt; 1 for blurry or &lt; 1 for sharp</td>

  </tr>

  <tr>
    <td>&lt;roll&gt;</td>
    <td>geometry="geometry", x="integer", y="integer"</td>
    <td>roll an image vertically or horizontally</td>

  </tr>

  <tr>
    <td>&lt;rotate&gt;</td>
    <td>degrees="double", background="color name"</td>
    <td>rotate an image</td>

  </tr>

  <tr>
    <td>&lt;sample&gt;</td>
    <td>geometry="geometry", width="integer", height="integer"</td>
    <td>scale image with pixel sampling.</td>

  </tr>

  <tr>
    <td>&lt;scale&gt;</td>
    <td>geometry="geometry", width="integer", height="integer"</td>
    <td>scale image to desired size</td>

  </tr>

  <tr>
    <td>&lt;segment&gt;</td>
    <td>colorspace="RGB, Gray, Transparent, OHTA, XYZ, YCbCr, YCC, YIQ, YPbPr, YUV, CMYK", verbose="True, False", cluster-threshold="double", smoothing-threshold="double"</td>
    <td>segment an image by analyzing the histograms of the color components and identifying units that are homogeneous</td>

  </tr>

  <tr>
    <td><strike>selectiveblur</strike></td>
    <td>geometry="geometry", radius="double", sigma="double", threshold="double", bias="double", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow"</td>

    <td>selectively blur pixels within a contrast threshold.</td>
  </tr>
  <tr>
    <td><strike>separate</strike></td>
    <td>channel="Red, RGB, All, etc."</td>
    <td>separate a channel from the image into a grayscale image</td>

  </tr>

  <tr>
    <td>&lt;shade&gt;</td>
    <td>geometry="geometry", azimuth="double", elevation="double", gray="true, false"</td>

    <td>shade the image using a distant light source</td>
  </tr>

  <tr>
    <td><strike>setpixel</strike></td>
    <td>geometry="geometry", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow", color="array of float values", x="integer", y="integer", color="array of float values"</td>

    <td>set a single pixel.  By default normalized pixel values are expected.</td>
  </tr>

  <tr>
    <td>&lt;shadow&gt;</td>
    <td>geometry="geometry", opacity="double", sigma="double", x="integer", y="integer"</td>

    <td>simulate an image shadow</td>
  </tr>

  <tr>
    <td>&lt;sharpen&gt;</td>
    <td>geometry="geometry", radius="double", sigma="double", bias="double", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow"</td>

    <td>sharpen the image with a Gaussian operator of the given radius and standard deviation (sigma).</td>
  </tr>

  <tr>
    <td>&lt;shave&gt;</td>
    <td>geometry="geometry", width="integer", height="integer"</td>

    <td>shave pixels from the image edges</td>
  </tr>

  <tr>
    <td>&lt;shear&gt;</td>
    <td>geometry="geometry", x="double", y="double" fill="color name"</td>

    <td>shear the image along the X or Y axis by a positive or negative shear angle</td>
  </tr>

  <tr>
    <td><strike>sigmoidalcontrast</strike></td>
    <td>geometry="string", 'contrast'="double", 'mid-point'="double" channel="Red, RGB, All, etc.", sharpen="True, False"</td>

    <td>sigmoidal non-lineraity contrast control.  Increase the contrast of the image using a sigmoidal transfer function without saturating highlights or shadows. Contrast" indicates how much to increase the contrast (0 is none; 3 is typical; 20 is a lot);  mid-point" indicates where midtones fall in the resultant image (0 is white; 50% is middle-gray; 100% is black). To decrease contrast, set sharpen to False.</td>
  </tr>

  <tr>
    <td>&lt;signature&gt;</td>

    <td> </td>
    <td>generate an SHA-256 message digest for the image pixel stream</td>
  </tr>

  <tr>
    <td><strike>sketch</strike></td>
    <td>geometry="geometry", radius="double", sigma="double", angle="double"</td>

    <td>sketch the image with a Gaussian operator of the given radius and standard deviation (sigma) at the given angle</td>
  </tr>

  <tr>
    <td>&lt;solarize&gt;</td>
    <td>geometry="string", threshold="double", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow"</td>

    <td>negate all pixels above the threshold level</td>
  </tr>

  <tr>
    <td><strike>sparsecolor</strike></td>
    <td>points="array of float values", method="Barycentric, Bilinear, Shepards, Voronoi", virtual-pixel="Background Black Constant Dither Edge Gray Mirror Random Tile Transparent White"</td>

    <td>interpolate the image colors around the supplied points</td>
  </tr>

  <tr>
    <td><strike>splice</strike></td>
    <td>geometry="geometry", width="integer", height="integer", x="integer", y="integer", fuzz="double", background="color name", gravity="NorthWest, North, NorthEast, West, Center, East, SouthWest, South, SouthEast"</td>

    <td>splice an image</td>
  </tr>

  <tr>
    <td>&lt;spread&gt;</td>
    <td>radius="double", interpolate="undefined, average, bicubic, bilinear, mesh, nearest-neighbor, spline"</td>

    <td>displace image pixels by a random amount</td>
  </tr>

  <tr>
    <td><strike>statistic</strike></td>
    <td>geometry="geometry", width="integer", height="integer", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow", type="Median, Mode, Mean, Maximum, Minimum, ReduceNoise"</td>

    <td>replace each pixel with corresponding statistic from the neighborhood.</td>
  </tr>
  <tr>
    <td>&lt;stegano&gt;</td>
    <td>image="image-handle", offset="integer"</td>
    <td>hide a digital watermark within the image</td>

  </tr>

  <tr>
    <td>&lt;stereo&gt;</td>
    <td>image="image-handle", x="integer", y="integer"</td>
    <td>composites two images and produces a single image that is the composite of a left and right image of a stereo pair</td>

  </tr>

  <tr>
    <td>&lt;strip&gt;</td>
    <td> </td>
    <td>strip an image of all profiles and comments.</td>
  </tr>

  <tr>

    <td>&lt;swirl&gt;</td>
    <td>degrees="double", interpolate="undefined, average, bicubic, bilinear, mesh, nearest-neighbor, spline"</td>
    <td>swirl image pixels about the center</td>
  </tr>

  <tr>

    <td><strike>texture</strike></td>
    <td>texture="image-handle"</td>
    <td>name of texture to tile onto the image background</td>
  </tr>

  <tr>
    <td><strike>thumbnail</strike></td>

    <td>geometry="geometry", width="integer", height="integer"</td>
    <td>changes the size of an image to the given dimensions and removes any associated profiles.</td>
  </tr>

  <tr>
    <td>&lt;threshold&gt;</td>

    <td>threshold="string", channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow"</td>
    <td>threshold the image</td>
  </tr>

  <tr>
    <td><strike>tint</strike></td>

    <td>fill="color name", blend="string"</td>
    <td>tint the image with the fill color.</td>
  </tr>

  <tr>
    <td>&lt;transparent&gt;</td>

    <td>color="color name", invert="True, False"</td>
    <td>make this color transparent within the image</td>
  </tr>

  <tr>
    <td><strike>transpose</strike></td>

    <td> </td>
    <td>flip image in the vertical direction and rotate 90 degrees</td>
  </tr>

  <tr>
    <td><strike>transverse</strike></td>
    <td> </td>
    <td>flop image in the horizontal direction and rotate 270 degrees</td>

  </tr>

  <tr>
    <td>&lt;trim&gt;</td>
    <td> </td>
    <td>remove edges that are the background color from the image</td>
  </tr>

  <tr>

    <td><strike>unsharpmask</strike></td>
    <td>geometry="geometry", radius="double", sigma="double", gain="double", threshold="double"</td>
    <td>sharpen the image with the unsharp mask algorithm.</td>

  </tr>

  <tr>
    <td><strike>vignette</strike></td>
    <td>geometry="geometry", radius="double", sigma="double", x="integer", y="integer", background="color name"</td>

    <td>offset the edges of the image in vignette style</td>
  </tr>

  <tr>
    <td><strike>wave</strike></td>
    <td>geometry="geometry", amplitude="double", wavelength="double", interpolate="undefined, average, bicubic, bilinear, mesh, nearest-neighbor, spline"</td>

    <td>alter an image along a sine wave</td>
  </tr>

  <tr>
    <td><strike>whitethreshold</strike></td>
    <td>threshold="string", , channel="All, Default, Alpha, Black, Blue, CMYK, Cyan, Gray, Green, Index, Magenta, Opacity, Red, RGB, Yellow"</td>

    <td>force all pixels above the threshold intensity into white</td>
  </tr>
</tbody>
</table>
</div>
