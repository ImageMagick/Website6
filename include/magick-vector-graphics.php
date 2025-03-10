<div>
<h1 class="text-center">Magick Vector Graphics</h1>
<p class="text-center"><a href="magick-vector-graphic.php#overview">MVG Overview</a> • <a href="magick-vector-graphics.php#primitives">Drawing Primitives</a></p>

<p class="lead">This specification defines the features and syntax for Magick Vector Graphics (MVG), a modularized language for describing two-dimensional vector and mixed vector/raster graphics in ImageMagick.  You can use the language to draw from the
command line, from an MVG file, from an <a href="http://www.w3.org/TR/SVG/">SVG -- Scalable Vector Graphics</a> file or from one of the ImageMagick <a href="develop.php">program interfaces</a>.  Use this command, for example, to render an arc:</p>

<pre class="bg-light text-dark mx-4"><code>convert -size 100x60 canvas:skyblue -fill white -stroke black \
  -draw "path \'M 30,40  A 30,20  20  0,0 70,20 A 30,20  20  1,0 30,40 Z \'" \
  arc.png');
</code></pre>

<p>and here is the result:</p>

<ul>
  <a href="../image/arc.png"><img src="../image/arc.png" width="100" height="60" alt="arc"></a>
</ul>

<p>When the drawing gets sufficiently complex, we recommend you assemble the graphic primitives into a MVG file. For our example, we use <a href="../source/piechart.mvg">piechart.mvg</a>:</p>

<pre class="pre-scrollable bg-light text-dark mx-4"><code>push graphic-context
  viewbox 0 0 624 369
  affine 0.283636 0 0 0.283846 -0 -0
  push graphic-context
    push graphic-context
      fill 'darkslateblue'
      stroke 'blue'
      stroke-width 1
      rectangle 1,1 2199,1299
    pop graphic-context
    push graphic-context
      font-size 40
      fill 'white'
      stroke-width 1
      text 600,1100 'Average: 20.0'
    pop graphic-context
    push graphic-context
      fill 'red'
      stroke 'black'
      stroke-width 5
      path 'M700.0,600.0 L340.0,600.0 A360.0,360.0 0 0,1 408.1452123287954,389.2376150414973 z'
    pop graphic-context
    push graphic-context
      font-size 40
      fill 'white'
      stroke-width 1
      text 1400,140 'MagickWand for PHP'
    pop graphic-context
    push graphic-context
      font-size 30
      fill 'white'
      stroke-width 1
      text 1800,140 '(10.0%)'
    pop graphic-context
    push graphic-context
      fill 'red'
      stroke 'black'
      stroke-width 4
      rectangle 1330,100 1370,140
    pop graphic-context
    push graphic-context
      fill 'yellow'
      stroke 'black'
      stroke-width 5
      path 'M700.0,600.0 L408.1452123287954,389.2376150414973 A360.0,360.0 0 0,1 976.5894480359858,369.56936567559273 z'
    pop graphic-context
    push graphic-context
      font-size 40
      fill 'white'
      stroke-width 1
      text 1400,220 'MagickCore'
    pop graphic-context
    push graphic-context
      font-size 30
      fill 'white'
      stroke-width 1
      text 1800,220 '(29.0%)'
    pop graphic-context
    push graphic-context
      fill 'yellow'
      stroke 'black'
      stroke-width 4
      rectangle 1330,180 1370,220
    pop graphic-context
    push graphic-context
      fill 'fuchsia'
      stroke 'black'
      stroke-width 5
      path 'M700.0,600.0 L976.5894480359858,369.56936567559273 A360.0,360.0 0 0,1 964.2680466142854,844.4634932636567 z'
    pop graphic-context
    push graphic-context
      font-size 40
      fill 'white'
      stroke-width 1
      text 1400,300 'MagickWand'
    pop graphic-context
    push graphic-context
      font-size 30
      fill 'white'
      stroke-width 1
      text 1800,300 '(22.9%)'
    pop graphic-context
    push graphic-context
      fill 'fuchsia'
      stroke 'black'
      stroke-width 4
      rectangle 1330,260 1370,300
    pop graphic-context
    push graphic-context
      fill 'blue'
      stroke 'black'
      stroke-width 5
      path 'M700.0,600.0 L964.2680466142854,844.4634932636567 A360.0,360.0 0 0,1 757.853099990584,955.3210081341651 z'
    pop graphic-context
    push graphic-context
      font-size 40
      fill 'white'
      stroke-width 1
      text 1400,380 'JMagick'
    pop graphic-context
    push graphic-context
      font-size 30
      fill 'white'
      stroke-width 1
      text 1800,380 '(10.6%)'
    pop graphic-context
    push graphic-context
      fill 'blue'
      stroke 'black'
      stroke-width 4
      rectangle 1330,340 1370,380
    pop graphic-context
    push graphic-context
      fill 'lime'
      stroke 'black'
      stroke-width 5
      path 'M700.0,600.0 L757.853099990584,955.3210081341651 A360.0,360.0 0 0,1 340.0,600.0 z'
    pop graphic-context
    push graphic-context
      font-size 40
      fill 'white'
      stroke-width 1
      text 1400,460 'Magick++'
    pop graphic-context
    push graphic-context
      font-size 30
      fill 'white'
      stroke-width 1
      text 1800,460 '(27.5%)'
    pop graphic-context
    push graphic-context
      fill 'lime'
      stroke 'black'
      stroke-width 4
      rectangle 1330,420 1370,460
    pop graphic-context
    push graphic-context
      font-size 100
      fill 'white'
      stroke-width 1
      text 100,150 'ImageMagick'
    pop graphic-context
    push graphic-context
      fill 'none'
      stroke 'black'
      stroke-width 5
      circle 700,600 700,960
    pop graphic-context
  pop graphic-context
pop graphic-context
</code></pre>

<p>to render a pie chart with this command:</p>

<pre class="bg-light text-dark mx-4"><code>convert mvg:piechart.mvg piechart.png
</code></pre>

<p>which produces this rendering:</p>

<ul>
  <a href="../image/piechart.png"><img src="../image/piechart.png" width="624" height="369" alt="piechart"></a>
</ul>

<p>However, in general, MVG is sufficiently difficult to work with that you probably want to use a program to generate your graphics in the SVG format.  ImageMagick automagically converts SVG to MVG and renders your image, for example, we render <a href="../source/piechart.svg">piechart.svg</a> with this command:</p>

<pre class="bg-light text-dark mx-4"><code>convert mvg:piechart.svg piechart.jpg
</code></pre>


<p>to produce the same pie chart we created with the MVG language.</p>

<p>Drawing is available from many of the ImageMagick <a href="develop.php">program interfaces</a> as well.  ImageMagick converts the drawing API calls to MVG and renders it.  Here is example code written in the <a href="magick-wand.php">MagickWand</a> language: </p>

<pre class="pre-scrollable bg-light text-dark mx-4"><code>(void) PushDrawingWand(draw_wand);
{
  const PointInfo points[6] =
  {
    { 180,504 },
    { 282.7,578.6 },
    { 243.5,699.4 },
    { 116.5,699.4 },
    { 77.26,578.6 },
    { 180,504 }
  };

  DrawSetStrokeAntialias(draw_wand,True);
  DrawSetStrokeWidth(draw_wand,9);
  DrawSetStrokeLineCap(draw_wand,RoundCap);
  DrawSetStrokeLineJoin(draw_wand,RoundJoin);
  (void) DrawSetStrokeDashArray(draw_wand,0,(const double *)NULL);
  (void) PixelSetColor(color,"#4000c2");
  DrawSetStrokeColor(draw_wand,color);
  DrawSetFillRule(draw_wand,EvenOddRule);
  (void) PixelSetColor(color,"#800000");
  DrawSetFillColor(draw_wand,color);
  DrawPolygon(draw_wand,6,points);
}
(void) PopDrawingWand(draw_wand);
</code></pre>

<h2><a class="anchor" id="overview"></a>MVG Overview</h2>

<p>MVG ignores all white-space between commands. This allows multiple MVG commands per line. It is common convention to terminate each MVG command with a new line to make MVG easier to edit and read. This syntax description uses indentation in MVG sequences to aid with understanding. Indentation is supported but is not required.</p>

<p>Metafile wrapper syntax (to support stand-alone MVG files):</p>

<pre class="bg-light text-dark mx-4"><code>push graphic-context
  viewbox 0 0 width height
  [ any other MVG commands ]
pop graphic-context
</code></pre>

<p>Pattern syntax (saving and restoring context):</p>

<pre class="bg-light text-dark mx-4"><code>push pattern id x,y width,height
 push graphic-context
  [ drawing commands ]
 pop graphic-context
pop pattern
</code></pre>

<p>an example is (%s is a identifier string):</p>

<pre class="bg-light text-dark mx-4"><code>push defs
 push pattern %s 10,10 20,20
  push graphic-context
   fill red
   rectangle 5,5 15,15
  pop graphic-context
  push graphic-context
   fill green
   rectangle 10,10 20,20
  pop graphic-context
 pop pattern
pop defs
</code></pre>

<p>For image tiling use:</p>

<pre class="bg-light text-dark mx-4"><code>push pattern id x,y width,height
 image Copy ...
pop pattern
</code></pre>

<p>Note you can use the pattern for either the fill or stroke like:</p>

<pre class="bg-light text-dark mx-4"><code>stroke url(#%s)
</code></pre>

<p>or</p>

<pre class="bg-light text-dark mx-4"><code>fill url(#%s)
</code></pre>

<p>The clip path defines a clipping area, where only the contained area to be drawn upon.  Areas outside of the clipping areare masked.</p>

<pre class="bg-light text-dark mx-4"><code>push defs
 push clip-path "myClipPath"
  push graphic-context
   rectangle 10,10 20,20
  pop graphic-context
 pop clip-path
pop defs
clip-path url(#myClipPath)
</code></pre>

<h2><a class="anchor" id="primitives"></a>Drawing Primitives</h2>

<p>Here is a complete description of the MVG drawing primitives:</p>

<div>
<table class="table table-sm table-hover table-striped table-responsive">
<thead>
  <tr>
    <th>Primitive</th>
    <th>Description</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td><a class="anchor" id="affine"></a>affine <var>s<sub>x</sub></var>,<var>r<sub>x</sub></var>,<var>r<sub>y</sub></var>,<var>s<sub>y</sub></var>,<var>t<sub>x</sub></var>,<var>t<sub>y</sub></var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="arc"></a>arc <var>x<sub>0</sub></var>,<var>y<sub>0</sub></var>   <var>x<sub>1</sub></var>,<var>y<sub>1</sub></var>   <var>a<sub>0</sub></var>,<var>a<sub>1</sub></var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="bezier"></a>bezier <var>x<sub>0</sub></var>,<var>y<sub>0</sub></var> ... <var>x<sub>n</sub></var>,<var>y<sub>n</sub></var></td>
    <td><code>Bezier</code> (spline) requires three or more x,y coordinates to define its shape. The first and last points are the knots (preserved coordinates) and any intermediate coordinates are the control points. If two control points are specified, the line between each end knot and its sequentially respective control point determines the tangent direction of the curve at that end. If one control point is specified, the lines from the end knots to the one control point determines the tangent directions of the curve at each end. If more than two control points are specified, then the additional control points act in combination to determine the intermediate shape of the curve. In order to draw complex curves, it is highly recommended either to use the <code>Path</code> primitive or to draw multiple four-point bezier segments with the start and end knots of each successive segment repeated. </td>
  </tr>
  <tr>
    <td><a class="anchor" id="border-color"></a>border-color <var>color</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="circle"></a>circle <var>origin<sub>x</sub></var>,<var>origin<sub>y</sub></var>   <var>perimeter<sub>x</sub></var>,<var>perimeter<sub>y</sub></var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="clip-path"></a>clip-path url(<var>name</var>)</td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="clip-rule"></a>clip-rule <var>rule</var></td>
    <td>Choose from these rule types:
<pre class="bg-light text-dark mx-4"><code>evenodd
nonzero</code></pre></td>
  </tr>
  <tr>
    <td><a class="anchor" id="clip-units"></a>clip-units <var>units</var></td>
    <td>Choose from these unit types:
<pre class="bg-light text-dark mx-4"><code>userSpace
userSpaceOnUse
objectBoundingBox</code></pre></td>
  </tr>
  <tr>
    <td><a class="anchor" id="color"></a>color <var>x</var>,<var>y</var> <var>method</var></td>
    <td>Choose from these method types:
<pre class="bg-light text-dark mx-4"><code>point
replace
floodfill
filltoborder
reset</code></pre></td>
  </tr>
  <tr>
    <td><a class="anchor" id="compliance"></a>compliance <var>type</var></td>
    <td>Choose from these compliance types: MVG or SVG</td>
  </tr>
  <tr>
    <td><a class="anchor" id="decorate"></a>decorate <var>type</var></td>
    <td>Choose from these types of decorations:
<pre class="bg-light text-dark mx-4"><code>none
line-through
overline
underline</code></pre></td>
  </tr>
  <tr>
    <td><a class="anchor" id="ellipse"></a>ellipse <var>center<sub>x</sub></var>,<var>center<sub>y</sub></var>   <var>radius<sub>x</sub></var>,<var>radius<sub>y</sub></var>   <var>arc<sub>start</sub></var>,<var>arc<sub>stop</sub></var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="fill"></a>fill <var>color</var></td>
    <td>Choose from any of these <a href="color.php">colors</a>.</td>
  </tr>
  <tr>
    <td><a class="anchor" id="fill-opacity"></a>fill-opacity <var>opacity</var></td>
    <td>The opacity ranges from 0.0 (fully transparent) to 1.0 (fully opaque) or as a percentage (e.g. 50%).</td>
  </tr>
  <tr>
    <td><a class="anchor" id="fill-rule"></a>fill-rule <var>rule</var></td>
    <td>Choose from these rule types:
<pre class="bg-light text-dark mx-4"><code>evenodd
nonzero</code></pre></td>
  </tr>
  <tr>
    <td><a class="anchor" id="font"></a>font <var>name</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="font-family"></a>font-family <var>family</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="font-size"></a>font-size <var>point-size</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="font-stretch"></a>font-stretch <var>type</var></td>
    <td>Choose from these stretch types:
<pre class="bg-light text-dark mx-4"><code>all
normal
ultra-condensed
extra-condensed
condensed
semi-condensed
semi-expanded
expanded
extra-expanded
ultra-expanded</code></pre></td>
  </tr>
  <tr>
    <td><a class="anchor" id="font-style"></a>font-style <var>style</var></td>
    <td>Choose from these styles:
<pre class="bg-light text-dark mx-4"><code>all
normal
italic
oblique</code></pre></td>
  </tr>
  <tr>
    <td><a class="anchor" id="font-weight"></a>font-weight <var>weight</var></td>
    <td>Choose from these weights:
<pre class="bg-light text-dark mx-4"><code>all
normal
bold
100
200
300
400
500
600
700
800
900</code></pre></td>
  </tr>
  <tr>
    <td><a class="anchor" id="gradient-units"></a>gradient-units <var>units</var></td>
    <td>Choose from these units:
<pre class="bg-light text-dark mx-4"><code>userSpace
userSpaceOnUse
objectBoundingBox</code></pre></td>
  </tr>
  <tr>
    <td><a class="anchor" id="gravity"></a>gravity <var>type</var></td>
    <td>Choose from these gravity types:
<pre class="bg-light text-dark mx-4"><code>NorthWest
North
NorthEast
West
Center
East
SouthWest
South
SouthEast</code></pre></td>
  </tr>
  <tr>
    <td><a class="anchor" id="compose"></a>image <var>compose x,y width,height 'filename'</var></td>
    <td>Choose from these compose operations:
    <table class="table table-sm table-hover table-striped table-responsive">
  <tbody>
  <tr>
    <th align="left" style="width: 8%">Method</th>
    <th align="left">Description</th>
  </tr>

  <tr>
    <td>clear</td>
    <td>Both the color and the alpha of the destination are cleared. Neither the source nor the destination are used as input.</td>
  </tr>

  <tr>
    <td>src</td>
    <td>The source is copied to the destination. The destination is not used as input.</td>
  </tr>

  <tr>
    <td>dst</td>
    <td>The destination is left untouched.</td>
  </tr>

  <tr>
    <td><b>src-over</b></td>
    <td>The source is composited over the destination.</td>
  </tr>

  <tr>
    <td>dst-over</td>
    <td>The destination is composited over the source and the result replaces the destination.</td>
  </tr>

  <tr>
    <td>src-in</td>
    <td>The part of the source lying inside of the destination replaces the destination.</td>
  </tr>

  <tr>
    <td>dst-in</td>
    <td>The part of the destination lying inside of the source replaces the destination.</td>
  </tr>

  <tr>
    <td>src-out</td>
    <td>The part of the source lying outside of the destination replaces the destination.</td>
  </tr>

  <tr>
    <td>dst-out</td>
    <td>The part of the destination lying outside of the source         replaces the destination.</td>
  </tr>

  <tr>
    <td>src-atop</td>
    <td>The part of the source lying inside of the destination is  composited onto the destination.</td>
  </tr>

  <tr>
    <td>dst-atop</td>
    <td>The part of the destination lying inside of the source is composited over the source and replaces the destination.</td>
  </tr>

  <tr>
    <td>multiply</td>
    <td>The source is multiplied by the destination and replaces the destination. The resultant color is always at least as dark as either of the two constituent colors. Multiplying any color with black produces black. Multiplying any color with white leaves the original color unchanged.</td>
  </tr>

  <tr>
    <td>screen</td>
    <td>The source and destination are complemented and then multiplied and then replace the destination. The resultant color is always at least as light as either of the two constituent colors. Screening any color with white produces white. Screening any color with black leaves the original color unchanged.</td>
  </tr>

  <tr>
    <td>overlay</td>
    <td>Multiplies or screens the colors, dependent on the destination color. Source colors overlay the destination whilst preserving its highlights and shadows. The destination color is not replaced, but is mixed with the source color to reflect the lightness or darkness of the destination.</td>
  </tr>

  <tr>
    <td>darken</td>
    <td>Selects the darker of the destination and source colors.  The destination is replaced with the source when the source is darker, otherwise it is left unchanged.</td>
  </tr>

  <tr>
    <td>lighten</td>
    <td>Selects the lighter of the destination and source colors.  The destination is replaced with the source when the source is lighter, otherwise it is left unchanged.</td>
  </tr>

  <tr>
    <td>linear-light</td>
    <td>Increase contrast slightly with an impact on the foreground's tonal values.</td>
  </tr>

  <tr>
    <td>color-dodge</td>
    <td>Brightens the destination color to reflect the source color. Painting with black produces no change.</td>
  </tr>

  <tr>
    <td>color-burn</td>
    <td>Darkens the destination color to reflect the source color.  Painting with white produces no change.</td>
  </tr>

  <tr>
    <td>hard-light</td>
    <td>Multiplies or screens the colors, dependent on the source color value. If the source color is lighter than 0.5, the destination is lightened as if it were screened. If the source color is darker than 0.5, the destination is darkened, as if it were multiplied. The degree of lightening or darkening is proportional to the difference between the source color and 0.5. If it is equal to 0.5 the destination is unchanged. Painting with pure black or white produces black or white.</td>
  </tr>

  <tr>
    <td>soft-light</td>
    <td>Darkens or lightens the colors, dependent on the source color value. If the source color is lighter than 0.5, the destination is lightened. If the source color is darker than 0.5, the destination is darkened, as if it were burned in. The degree of darkening or lightening is proportional to the difference between the source color and 0.5. If it is equal to 0.5, the destination is unchanged. Painting with pure black or white produces a distinctly darker or lighter area, but does not result in pure black or white.</td>
  </tr>

  <tr>
    <td>plus</td>
    <td>The source is added to the destination and replaces the destination. This operator is useful for animating a dissolve between two images.</td>
  </tr>

  <tr>
    <td>add</td>
    <td>As per 'plus' but transparency data is treated as matte
        values. As such any transparent areas in either image remain
        transparent. </td>
  </tr>

  <tr>
    <td>minus</td>
    <td>Subtract the colors in the source image from the
        destination image. When transparency is involved, Opaque areas will be
        subtracted from any destination opaque areas. </td>
  </tr>

  <tr>
    <td>subtract</td>
    <td>Subtract the colors in the source image from the
        destination image. When transparency is involved transparent areas are
        subtracted, so only the opaque areas in the source remain opaque in
        the destination image. </td>
  </tr>

  <tr>
    <td>difference</td>
    <td>Subtracts the darker of the two constituent colors from the lighter. Painting with white inverts the destination color. Painting with black produces no change.</td>
  </tr>

  <tr>
    <td>exclusion</td>
    <td>Produces an effect similar to that of 'difference', but appears as lower contrast. Painting with white inverts the destination color. Painting with black produces no change.</td>
  </tr>

  <tr>
    <td>xor</td>
    <td>The part of the source that lies outside of the destination is combined with the part of the destination that lies outside of the source.</td>
  </tr>

  <tr>
    <td>copy-*</td>
    <td>Copy the specified channel in the source image to the
        same channel in the destination image.  If the channel specified in
        the source image does not exist, (which can only happen for methods,
        '<code>copy-opacity</code>' or '<code>copy-black</code>') then it is
        assumed that the source image is a special grayscale channel image
        of the values to be copied. </td>
    </tr>

  <tr>
    <td>change-mask</td>
    <td>Replace any destination pixel that is the similar to the source images pixel (as defined by the current <a href="magick-vector-graphics.php#fuzz">-fuzz</a> factor), with transparency. </td>
  </tr>
  </tbody>
</table></td>
  </tr>
  <tr>
    <td><a class="anchor" id="interline-spacing"></a>interline-spacing <var>pixels</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="interword-spacing"></a>interword-spacing <var>pixels</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="kerning"></a>kerning <var>pixels</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="line"></a>line <var>x,y x<sub>1</sub>,y<sub>1</sub></var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="matte"></a>matte <var>x,y method</var></td>
    <td>Choose from these methods:
<pre class="bg-light text-dark mx-4"><code>point
replace
floodfill
filltoborder
reset</code></pre></td>
  </tr>
  <tr>
    <td><a class="anchor" id="offset"></a>offset <var>offset</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="opacity"></a>opacity <var>opacity</var></td>
    <td>Use percent (e.g. 50%).</td>
  </tr>
  <tr>
    <td><a class="anchor" id="path"></a>path <var>path</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="point"></a>point <var>x,y</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="polygon"></a>polygon <var>x,y x<sub>1</sub>,y<sub>1</sub>, ..., x<sub>n</sub>,y<sub>n</sub></var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="polyline"></a>polyline <var>x,y x<sub>1</sub>,y<sub>1</sub>, ..., x<sub>n</sub>,y<sub>n</sub></var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="pop-clip-path"></a>pop clip-path</td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="pop-defs"></a>pop defs</td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="pop-gradient"></a>pop gradient</td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="pop-graphic-context"></a>pop graphic-context</td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="pop-pattern"></a>pop pattern</td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="push"></a>push clip-path "<var>name</var>"</td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="push-defs"></a>push defs</td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="push-gradient-linear"></a>push gradient <var>id linear x,y x<sub>1</sub>,y<sub>1</sub></var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="push-gradient-radial"></a>push gradient <var>id radial x<sub>c</sub>,c<sub>y</sub> x<sub>f</sub>,y<sub>f</sub> radius</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="push-graphic-context"></a>push graphic-context { "<var>id</var>" }</td>
    <td>the <em>id</em> is optional</td>
  </tr>
  <tr>
    <td><a class="anchor" id="push-pattern"></a>push pattern <var>id x,y width,height</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="rectangle"></a>rectangle <var>x,y x<sub>1</sub>,y<sub>1</sub></var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="rotate"></a>rotate <var>angle</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="roundrectangle"></a>roundrectangle <var>x,y x<sub>1</sub>,y<sub>1</sub> width,height</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="scale"></a>scale <var>x,y</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="skewX"></a>skewX <var>angle</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="skewY"></a>skewX <var>angle</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="stop-color"></a>stop-color <var>color offset</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="stroke"></a>stroke <var>color</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="stroke-antialias"></a>stroke-antialias <var>0 • 1</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="stroke-dasharray"></a>stroke-dasharray <var>none • numeric-list</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="stroke-dashoffset"></a>stroke-dashoffset <var>offset</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="stroke-linecap"></a>stroke-linecap <var>type</var></td>
    <td>Choose from these cap types:
<pre class="bg-light text-dark mx-4"><code>butt
round
square</code></pre></td>
  </tr>
  <tr>
    <td><a class="anchor" id="stroke-linejoin"></a>stroke-linejoin <var>type</var></td>
    <td>Choose from these join types:
<pre class="bg-light text-dark mx-4"><code>bevel
miter
round</code></pre></td>
  </tr>
  <tr>
    <td><a class="anchor" id="stroke-miterlimit"></a>stroke-miterlimit <var>limit</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="stroke-opacity"></a>stroke-opacity <var>opacity</var></td>
    <td>The opacity ranges from 0.0 (fully transparent) to 1.0 (fully opaque) or as a percentage (e.g. 50%).</td>
  </tr>
  <tr>
    <td><a class="anchor" id="stroke-width"></a>stroke-width <var>width</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="text"></a>text <var>"text"</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="text-antialias"></a>text-antialias <var>0 • 1</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="text-undercolor"></a>text-undercolor <var>color</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="translate"></a>translate <var>x,y</var></td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="use"></a>use "<var>url(#id)</var>"</td>
    <td></td>
  </tr>
  <tr>
    <td><a class="anchor" id="viewbox"></a>viewbox <var>x,y x<sub>1</sub>,y<sub>1</sub></var></td>
    <td></td>
  </tr>
</tbody>
</table></div>
<p>Note, the primitives are case sensitive, e.g., use <code>viewbox</code>, not <code>viewBox</code>.</p>
</div>
