<div>
<h1 class="text-center">FX Special Effects Image Operator</h1>
<p class="text-center"><a href="#fx">The FX Special Effects Image Operator</a> • <a href="#anatomy">The Anatomy of an FX Expression</a></p>

<a class="anchor" id="fx"></a>

<p class="lead">Use the FX special effects image operator to apply a mathematical expression to an image or image channels.  The FX expression language provides a powerful and flexible way to manipulate images, allowing you to perform a wide range of operations and transformations on your images. Use FX to:</p>

<ul>
  <li>create canvases, gradients, mathematical colormaps</li>
  <li>move color values between images and channels</li>
  <li>translate, flip, mirror, rotate, scale, shear and generally distort images</li>
  <li>merge or composite multiple images together</li>
  <li>convolve or merge neighboring pixels together</li>
  <li>generate image metrics or 'fingerprints'</li>
</ul>

<p>The expression can be simple:</p>

<ul><pre class="bg-light text-dark mx-4"><samp>convert -size 64x64 canvas:black -channel blue -fx "1/2" fx_navy.png
</samp></pre></ul>

<p>Here, we convert a black to a navy blue image:</p>

<ul>
  <a href="<?php echo $_SESSION['RelativePath']?>/../image/black.png"><img src="<?php echo $_SESSION['RelativePath']?>/../image/black.png" width="64" height="64" alt="black" /></a>
  <img style="margin-top:22px; margin-bottom:22px;" src="<?php echo $_SESSION['RelativePath']?>/../image/right.gif" width="20" height="20" alt="==>" />
  <a href="<?php echo $_SESSION['RelativePath']?>/../image/navy.png"><img src="<?php echo $_SESSION['RelativePath']?>/../image/navy.png" width="64" height="64" alt="navy" /></a>
</ul>

<p>Or the expression can be complex:</p>

<ul><pre class="bg-light text-dark mx-4"><samp>convert rose: \
  -fx "(1.0/(1.0+exp(10.0*(0.5-u)))-0.006693)*1.0092503" \
  rose-sigmoidal.png
</samp></pre></ul>

<p>This expression results in a high contrast version of the source image:</p>

<ul>
  <a href="<?php echo $_SESSION['RelativePath']?>/../image/rose.jpg"><img src="<?php echo $_SESSION['RelativePath']?>/../image/rose.jpg" width="70" height="46" alt="rose" /></a>
  <img style="margin-top:13px; margin-bottom:13px;" src="<?php echo $_SESSION['RelativePath']?>/../image/right.gif" width="20" height="20" alt="==>" />
  <a href="<?php echo $_SESSION['RelativePath']?>/../image/rose-sigmoidal.png"><img src="<?php echo $_SESSION['RelativePath']?>/../image/rose-sigmoidal.png" width="70" height="46" alt="rose-sigmoidal" /></a>
</ul>

<p>The expression can include variable assignments.  Assignments, in most cases, reduce the complexity of an expression and permit some operations that might not be possible any other way.  For example, lets create a radial gradient:</p>

<ul><pre class="bg-light text-dark mx-4"><samp>convert -size 70x70 canvas: \
  -fx "Xi=i-w/2; Yj=j-h/2; 1.2*(0.5-hypot(Xi,Yj)/70.0)+0.5" \
  radial-gradient.png
</samp></pre></ul>

<p>The command above returns this image:</p>

<ul>
  <a href="<?php echo $_SESSION['RelativePath']?>/../image/radial-gradient.png"><img src="<?php echo $_SESSION['RelativePath']?>/../image/radial-gradient.png" width="70" height="70" alt="radial-gradient" /></a>
</ul>

<p>This FX expression adds random noise to an image:</p>

<ul><pre class="bg-light text-dark mx-4"><samp>convert photo.jpg -fx 'iso=32; rone=rand(); rtwo=rand(); \
  myn=sqrt(-2*ln(rone))*cos(2*Pi*rtwo); myntwo=sqrt(-2*ln(rtwo))* \
  cos(2*Pi*rone); pnoise=sqrt(p)*myn*sqrt(iso)* \
  channel(4.28,3.86,6.68,0)/255; max(0,p+pnoise)' noisy.png
</samp></pre></ul>

<p>This FX script utilizes a loop to create a <a href="https://en.wikipedia.org/wiki/Julia_set">Julia set</a>:</p>

<ul><pre class="bg-light text-dark mx-4"><samp>convert -size 400x400 xc:black -colorspace gray -fx " \
  Xi=2.4*i/w-1.2; \
  Yj=2.4*j/h-1.2; \
  for (pixel=0.0, (hypot(Xi,Yj) &lt; 2.0) &amp;&amp; (pixel &lt; 1.0), \
    delta=Xi^2-Yj^2; \
    Yj=2.0*Xi*Yj+0.2; \
    Xi=delta+0.4; \
    pixel+=0.00390625 \
  ); \
  pixel == 1.0 ? 0.0 : pixel" \
  \( -size 1x1 xc:white xc:red xc:orange xc:yellow xc:green1 xc:cyan xc:blue \
     xc:blueviolet xc:white -reverse +append -filter Cubic -resize 1024x1! \) \
  -clut -rotate -90 julia-set.png</samp></pre></ul>

<ul>
  <a href="<?php echo $_SESSION['RelativePath']?>/../image/julia-set.png"><img src="<?php echo $_SESSION['RelativePath']?>/../image/julia-set.png" width="160" height="160" alt="Julia Fractals" /></a>
</ul>

<p>This FX script prints the first 10 prime numbers:</p>
<ul><pre class="bg-light text-dark mx-4"><samp>convert xc: -channel gray -fx " \
  for (prime=2, prime &lt; 30, composite=0; \
    for (nn=2, nn &lt; (prime/2+1), if ((prime % nn) == 0, composite++, ); nn++); \
      if (composite &lt;= 0, debug(prime), ); prime++)" null:</samp></pre></ul>

<p>See <a href="https://legacy.imagemagick.org/Usage/transform/index.html#fx">Using FX, The Special Effects Image Operator</a> for more examples.</p>

<p>The next section discusses the FX expression language.</p>

<h2><a class="anchor" id="anatomy"></a>The Anatomy of an FX Expression</h2>

<h4>The FX Expression Language</h4>

<p>The formal FX expression language is defined here:</p>

<dl class="row">
  <dt class="col-md-4"> numbers:</dt>
  	<dd class="col-md-8"> integer, floating point, scientific notation (+/- required, e.g. 3.81469e-06), International System number postfixes (.e.g KB, Mib, GB, etc.)</dd>
  <dt class="col-md-4"> constants: </dt>
    <dd class="col-md-8"> E (Euler's number), Epsilon, Opaque, Phi (golden ratio), Pi, QuantumRange, QuantumScale, Transparent</dd>
  <dt class="col-md-4"> FX operators (in order of precedence): </dt>
     <dd class="col-md-8"> ^ (power), unary -, *, /, % (modulo), +, -,
     &lt;&lt;, &gt;&gt;, &lt;, &lt;=, &gt;, &gt;=, +=, -=, *=, /=, %=, &lt;&lt;=, &gt;&gt;=,
     &amp;=, |=, ++, --, ==, !=, &amp; (bitwise AND),   | (bitwise OR),
     &amp;&amp; (logical AND),  || (logical OR),
     ~ (logical NOT),  ?: (ternary conditional)</dd>
  <dt class="col-md-4"> array: </dt>
    <dd class="col-md-8">an image offers array storage (e.g. p[-1,-1].r) bounded by its width and height.  An image sequence represents multiple arrays (e.g. u.p[0,0].r, v.p[0,0].r).  Storage is limited to Quantum values, e.g. [0..65535] for Q16 builds and floating point for HDRI-enabled builds.</dd>
  <dt class="col-md-4"> math functions: </dt>
     <dd class="col-md-8"> abs(), acos(), acosh(), airy(), alt(), asin(), asinh(), atan(), atanh(), atan2(), ceil(), clamp(), cos(), cosh(), debug(), drc(), erf(), exp(), floor(), gauss(), gcd(), hypot(), int(), isnan(), j0(), j1(), jinc(), ln(), log(), logtwo(), max(), min(), mod(), not(), pow(), rand(), round(), sign(), sin(), sinc(), sinh(), sqrt(), squish(), tan(), tanh(), trunc()</dd>
  <dt class="col-md-4"> channel functions: </dt>
    <dd class="col-md-8"> channel(r,g,b,a), channel(c,m,y,k,a)</dd>
  <dt class="col-md-4"> color names:</dt>
    <dd class="col-md-8"> red, cyan, black, etc.</dd>
  <dt class="col-md-4"> color functions:</dt>
    <dd class="col-md-8"> srgb(), srgba(), rgb(), rgba(), cmyk(), cmyka(), hsl(), hsla(), etc.</dd>
  <dt class="col-md-4"> color hex values:</dt>
    <dd class="col-md-8"> #ccc, #cbfed0, #b9e1cc00, etc.</dd>
  <dt class="col-md-4"> symbols:</dt><dd class="col-md-8"><dl>
     <dd><code>u</code>: first image in list</dd>
     <dd><code>v</code>: second image in list</dd>
     <dd><code>s</code>: current image in list (for %[fx:] otherwise = u)</dd>
     <dd><code>t</code>: index of current image (s) in list</dd>
     <dd><code>n</code>: number of images in list</dd>

     <dd><code>i</code>: column offset</dd>
     <dd><code>j</code>: row offset</dd>
     <dd><code>p</code>: pixel to use (absolute or relative to current pixel)</dd>

     <dd><code>w</code>: width of this image</dd>
     <dd><code>h</code>: height of this image</dd>
     <dd><code>z</code>: channel depth</dd>

     <dd><code>r</code>: red value (from RGBA), of a specific or current pixel</dd>
     <dd><code>g</code>: green</dd>
     <dd><code>b</code>: blue</dd>
     <dd><code>a</code>: alpha</dd>
     <dd><code>o</code>: opacity</dd>

     <dd><code>c</code>: cyan value of CMYK color of pixel</dd>
     <dd><code>y</code>: yellow</dd>
     <dd><code>m</code>: magenta</dd>
     <dd><code>k</code>: black</dd>

     <dd><code>intensity</code>: pixel intensity</dd>

     <dd><code>hue</code>: pixel hue</dd>
     <dd><code>saturation</code>: pixel saturation</dd>
     <dd><code>lightness</code>: pixel lightness</dd>
     <dd><code>luma</code>: pixel luma</dd>

     <dd><code>page.width</code>: page width</dd>
     <dd><code>page.height</code>: page height</dd>
     <dd><code>page.x</code>: page x offset</dd>
     <dd><code>page.y</code>: page y offset</dd>

     <dd><code>printsize.x</code>: x printsize</dd>
     <dd><code>printsize.y</code>: y printsize</dd>

     <dd><code>resolution.x</code>: x resolution</dd>
     <dd><code>resolution.y</code>: y resolution</dd>

     <dd><code>depth</code>: image depth</dd>
     <dd><code>extent</code>: image extent</dd>
     <dd><code>minima</code>: image minima</dd>
     <dd><code>maxima</code>: image maxima</dd>
     <dd><code>mean</code>: image mean</dd>
     <dd><code>standard_deviation</code>: image standard deviation</dd>
     <dd><code>kurtosis</code>: image kurtosis</dd>
     <dd><code>skewness</code>: image skewness (add a channel specifier to compute a statistic for that channel, e.g. depth.r)</dd></dl></dd>
  <dt class="col-md-4"> iterators:</dt>
    <dd class="col-md-8"> do(), for(), while()</dd>
  <dt class="col-md-4"> image attributes:</dt>
  	<dd class="col-md-8"> image.depth, image.kurtosis, image.maxima, image.mean, image.median, image.minima, image.resolution.x, image.resolution.y, image.skewness, image.standard_deviation</dd>
</dl>

<h4>The FX Expression</h4>

<p>An FX expression may include any combination of the following:</p>
<dl class="row">
<dt class="col-md-4"> <var>x</var> <code>^</code> <var>y</var></dt><dd class="col-md-8"> exponentiation (<var>x<sup>y</sup></var>)</dd>
<dt class="col-md-4"> <code>(</code> ... <code>)</code></dt><dd class="col-md-8"> grouping</dd>
<dt class="col-md-4"> <var>x</var> <code>*</code> <var>y</var></dt><dd class="col-md-8"> multiplication</dd>
<dt class="col-md-4"> <var>x</var> <code>/</code> <var>y</var></dt><dd class="col-md-8"> division</dd>
<dt class="col-md-4"> <var>x</var> <code>%</code> <var>y</var></dt><dd class="col-md-8"> modulo</dd>
<dt class="col-md-4"> <var>x</var> <code>+</code> <var>y</var></dt><dd class="col-md-8"> addition</dd>
<dt class="col-md-4"> <var>x</var> <code>-</code> <var>y</var></dt><dd class="col-md-8"> subtraction</dd>
<dt class="col-md-4"> <var>x</var> <code>&lt;&lt;</code> <var>y</var></dt><dd class="col-md-8"> left shift</dd>
<dt class="col-md-4"> <var>x</var> <code>&gt;&gt;</code> <var>y</var></dt><dd class="col-md-8"> right shift</dd>
<dt class="col-md-4"> <var>x</var> <code>&lt;</code> <var>y</var></dt><dd class="col-md-8"> boolean relation, return value 1.0 if <var>x</var> &lt; <var>y</var>,  otherwise 0.0</dd>
<dt class="col-md-4"> <var>x</var> <code>&lt;=</code> <var>y</var></dt><dd class="col-md-8"> boolean relation, return value 1.0 if <var>x</var> &lt;= <var>y</var>,  otherwise 0.0</dd>
<dt class="col-md-4"> <var>x</var> <code>&gt;</code> <var>y</var></dt><dd class="col-md-8"> boolean relation, return value 1.0 if <var>x</var> &gt; <var>y</var>,  otherwise 0.0</dd>
<dt class="col-md-4"> <var>x</var> <code>&gt;=</code> <var>y</var></dt><dd class="col-md-8"> boolean relation, return value 1.0 if <var>x</var> &gt;= <var>y</var>,  otherwise 0.0</dd>
<dt class="col-md-4"> <var>x</var> <code>==</code> <var>y</var></dt><dd class="col-md-8"> boolean relation, return value 1.0 if <var>x </var>==<var> y</var>, otherwise 0.0</dd>
<dt class="col-md-4"> <var>x</var> <code>!=</code> <var>y</var></dt><dd class="col-md-8"> boolean relation, return value 1.0 if <var>x </var>!=<var> y</var>, otherwise 0.0</dd>
<dt class="col-md-4"> <var>x</var> <code>&amp;</code> <var>y</var></dt><dd class="col-md-8"> binary AND</dd>
<dt class="col-md-4"> <var>x</var> <code>|</code> <var>y</var></dt><dd class="col-md-8"> binary OR</dd>
<dt class="col-md-4"> <var>x</var> <code>&amp;&amp;</code> <var>y</var></dt><dd class="col-md-8"> logical AND connective, return value 1.0 if <var>x</var> &gt; 0 and <var>y</var> &gt; 0,  otherwise 0.0</dd>
<dt class="col-md-4"> <var>x</var> <code>||</code> <var>y</var></dt><dd class="col-md-8"> logical OR connective (inclusive), return value 1.0 if <var>x</var> &gt; 0 or <var>y</var> &gt; 0 (or both),  otherwise 0.0</dd>
<dt class="col-md-4"> <code>~</code><var>x</var></dt><dd class="col-md-8"> logical NOT operator, return value 1.0 if <var>not</var> <var>x</var> &gt; 0,  otherwise 0.0</dd>
<dt class="col-md-4"> <code>+</code><var>x</var></dt><dd class="col-md-8"> unary plus, return 1.0*value</dd>
<dt class="col-md-4"> <code>-</code><var>x</var></dt><dd class="col-md-8"> unary minus, return -1.0*value</dd>
<dt class="col-md-4"> <var>x</var> <code>?</code> <var>y</var> <code>:</code> <var>z</var> </dt><dd class="col-md-8">ternary conditional expression, return value <var>y</var> if <var>x</var> != 0, otherwise <var>z</var>; only one ternary conditional permitted per statement</dd>
<dt class="col-md-4"> <var>x</var> <code>=</code> <var>y</var></dt><dd class="col-md-8">assignment; single character variables are reserved, instead use 2 or more characters, letter combinations only (e.g. Xi not X1)</dd>
<dt class="col-md-4"> <var>x</var> <code>;</code> <var>y</var></dt><dd class="col-md-8">statement separator </dd>
<dt class="col-md-4"> <code>phi</code></dt><dd class="col-md-8"> constant (1.618034...)</dd>
<dt class="col-md-4"> <code>pi</code></dt><dd class="col-md-8"> constant (3.14159265359...)</dd>
<dt class="col-md-4"> <code>e</code></dt><dd class="col-md-8"> constant (2.71828...)</dd>
<dt class="col-md-4"> <code>QuantumRange</code></dt><dd class="col-md-8"> constant maximum pixel value (255 for Q8, 65535 for Q16)</dd>
<dt class="col-md-4"> <code>QuantumScale</code></dt><dd class="col-md-8"> constant 1.0/<code>QuantumRange</code></dd>
<dt class="col-md-4"> <code>intensity</code></dt><dd class="col-md-8"> pixel intensity whose value respects the <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#intensity">-intensity</a> option.</dd>
<dt class="col-md-4"> <code>hue</code></dt><dd class="col-md-8"> pixel hue</dd>
<dt class="col-md-4"> <code>saturation</code></dt><dd class="col-md-8"> pixel saturation</dd>
<dt class="col-md-4"> <code>lightness</code></dt><dd class="col-md-8"> pixel lightness; equivalent to 0.5*max(red,green,blue) + 0.5*min(red,green,blue)</dd>
<dt class="col-md-4"> <code>luminance</code></dt><dd class="col-md-8"> pixel luminance; equivalent to <code>0.212656*red + 0.715158*green + 0.072186*blue</code></dd>
<dt class="col-md-4"> <code>red, green, blue</code>, etc.</dt><dd class="col-md-8"> color names</dd>
<dt class="col-md-4"> <code>#ccc, #cbfed0, #b9e1cc00</code>, etc.</dt><dd class="col-md-8"> color hex values</dd>
<dt class="col-md-4"> <code>rgb(), rgba(), cmyk(), cmyka(), hsl(), hsla()</code></dt><dd class="col-md-8"> color functions</dd>
<dt class="col-md-4"> <code>s, t, u, v, n, i, j, w, h, z, r, g, b, a, o, c, y, m, k</code></dt><dd class="col-md-8"> symbols</dd>
<dt class="col-md-4"> <code>abs(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> absolute value function</dd>
<dt class="col-md-4"> <code>acos(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> arc cosine function</dd>
<dt class="col-md-4"> <code>acosh(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> inverse hyperbolic cosine function</dd>
<dt class="col-md-4"> <code>airy(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> Airy function (max=1, min=0); airy(<var>x</var>)=[jinc(<var>x</var>)]<sup>2</sup>=[2*j1(<var>pi*x</var>)/(<var>pi*x</var>)]<sup>2</sup></dd>
<dt class="col-md-4"> <code>alt(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> sign alternation function (return 1.0 if int(<var>x</var>) is even, -1.0 if int(<var>x</var>) is odd)</dd>
<dt class="col-md-4"> <code>asin(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> arc sine function</dd>
<dt class="col-md-4"> <code>asinh(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> inverse hyperbolic sine function</dd>
<dt class="col-md-4"> <code>atan(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> arc tangent function</dd>
<dt class="col-md-4"> <code>atanh(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> inverse hyperbolic tangent function</dd>
<dt class="col-md-4"> <code>atan2(</code><var>y</var>,<var>x</var><code>)</code></dt><dd class="col-md-8"> arc tangent function of two variables</dd>
<dt class="col-md-4"> <code>ceil(</code><var>x</var><code>)</code></dt><dd class="col-md-8">smallest integral value not less than argument</dd>
<dt class="col-md-4"> <code>channel(</code><var>r</var>,<var>g</var>,<var>b</var>,<var>a</var><code>)</code></dt><dd class="col-md-8">select numeric argument based on current channel</dd>
<dt class="col-md-4"> <code>channel(</code><var>c</var>,<var>m</var>,<var>y</var>,<var>k</var>,<var>a</var><code>)</code></dt><dd class="col-md-8">select numeric argument based on current channel</dd>
<dt class="col-md-4"> <code>clamp(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> clamp value</dd>
<dt class="col-md-4"> <code>cos(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> cosine function</dd>
<dt class="col-md-4"> <code>cosh(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> hyperbolic cosine function</dd>
<dt class="col-md-4"> <code>debug(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> print <var>x</var> (useful for debugging your expression)</dd>
<dt class="col-md-4"> <code>do(</code><var>condition test</var>, <var>statements</var><code>)</code></dt><dd class="col-md-8"> iterate while the condition is not equal to 0</dd>
<dt class="col-md-4"> <code>drc(</code><var>x</var>,<var>y</var><code>)</code></dt><dd class="col-md-8"> dynamic range compression (knee curve); drc(<var>x</var>,<var>y</var>)=(<var>x</var>)/(<var>y</var>*(<var>x</var>-1)+1); -1&lt;<var>y</var>&lt;1 </dd>
<dt class="col-md-4"> <code>erf(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> error function</dd>
<dt class="col-md-4"> <code>exp(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> natural exponential function (<var>e<sup>x</sup></var>)</dd>
<dt class="col-md-4"> <code>floor(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> largest integral value not greater than argument</dd>
<dt class="col-md-4"> <code>for(</code><var>initialization</var>, <var>condition test</var>, <var>expression</var><code>)</code></dt><dd class="col-md-8"> iterate while the condition is not equal to 0</dd>
<dt class="col-md-4"> <code>gauss(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> gaussian function; gauss(<var>x</var>)=exp(<var>-x*x/2</var>)/sqrt(2*pi)</dd>
<dt class="col-md-4"> <code>gcd(</code><var>x</var>,<var>y</var><code>)</code></dt><dd class="col-md-8"> greatest common denominator</dd>
<dt class="col-md-4"> <code>hypot(</code><var>x</var>,<var>y</var><code>)</code></dt><dd class="col-md-8"> the square root of x<sup>2</sup>+y<sup>2</sup></dd>
<dt class="col-md-4"> <code>if(</code><var>condition test</var>, <var>nonzero-expression</var>, <var>zero-expression</var><code>)</code></dt><dd class="col-md-8"> interpret expression depending on condition</dd>
<dt class="col-md-4"> <code>int(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> greatest integer function (return greatest integer less than or equal to <var>x</var>)</dd>
<dt class="col-md-4"> <code>isnan(</code><var>x</var><code>)</code></dt><dd class="col-md-8">return 1.0 if <var>x</var> is NAN, 0.0 otherwise</dd>
<dt class="col-md-4"> <code>j0(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> Bessel functions of <var>x</var> of the first kind of order 0</dd>
<dt class="col-md-4"> <code>j1(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> Bessel functions of <var>x</var> of the first kind of order 1</dd>
<dt class="col-md-4"> <code>jinc(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> jinc function (max=1, min=-0.1323); jinc(<var>x</var>)=2*j1(pi*<var>x</var>)/(pi*<var>*x</var>)</dd>
<dt class="col-md-4"> <code>ln(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> natural logarithm function</dd>
<dt class="col-md-4"> <code>log(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> logarithm base 10</dd>
<dt class="col-md-4"> <code>logtwo(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> logarithm base 2</dd>
<dt class="col-md-4"> <code>ln(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> natural logarithm</dd>
<dt class="col-md-4"> <code>max(</code><var>x</var>, <var>y</var><code>)</code></dt><dd class="col-md-8"> maximum of <var>x</var> and <var>y</var></dd>
<dt class="col-md-4"> <code>min(</code><var>x</var>, <var>y</var><code>)</code></dt><dd class="col-md-8"> minimum of <var>x</var> and <var>y</var></dd>
<dt class="col-md-4"> <code>mod(</code><var>x</var>, <var>y</var><code>)</code></dt><dd class="col-md-8"> floating-point remainder function</dd>
<dt class="col-md-4"> <code>not(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> return 1.0 if <var>x</var> is zero, 0.0 otherwise</dd>
<dt class="col-md-4"> <code>pow(</code><var>x</var>,<var>y</var><code>)</code></dt><dd class="col-md-8"> power function (<var>x<sup>y</sup></var>)</dd>
<dt class="col-md-4"> <code>rand()</code></dt><dd class="col-md-8"> value uniformly distributed over the interval [0.0, 1.0) with a 2 to the 128th-1 period</dd>
<dt class="col-md-4"> <code>round()</code></dt><dd class="col-md-8"> round to integral value, regardless of rounding direction</dd>
<dt class="col-md-4"> <code>sign(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> return -1.0 if <var>x</var> is less than 0.0 otherwise 1.0</dd>
<dt class="col-md-4"> <code>sin(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> sine function</dd>
<dt class="col-md-4"> <code>sinc(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> sinc function (max=1, min=-0.21); sinc(<var>x</var>)=sin(<var>pi*x</var>)/(<var>pi*x</var>)</dd>
<dt class="col-md-4"> <code>squish(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> squish function; squish(<var>x</var>)=1.0/(1.0+exp(<var>-x</var>))</dd>
<dt class="col-md-4"> <code>sinh(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> hyperbolic sine function</dd>
<dt class="col-md-4"> <code>sqrt(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> square root function</dd>
<dt class="col-md-4"> <code>tan(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> tangent function</dd>
<dt class="col-md-4"> <code>tanh(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> hyperbolic tangent function</dd>
<dt class="col-md-4"> <code>trunc(</code><var>x</var><code>)</code></dt><dd class="col-md-8"> round to integer, towards zero</dd>
<dt class="col-md-4"> <code>while(</code><var>condition test</var>, <var>expression</var><code>)</code></dt><dd class="col-md-8"> iterate while the condition is not equal to 0</dd>
<dt class="col-md-4"> <code>image.depth, image.kurtosis, image.maxima, image.mean, image.minima, image.resolution.x, image.resolution.y, image.skewness, image.standard_deviation</code></dt><dd class="col-md-8"> image attributes</dd>
</dl>
<p>The expression semantics include these rules:</p>

<ul>
<li>symbols are case insensitive</li>
<li>only one ternary conditional (e.g. x ? y : z) per statement</li>
<li>statements are assignments or the final expression to return</li>
<li>an assignment starts a statement, it is not an operator</li>
<li>single character variables are reserved.  Assignments to reserved built-ins do not throw an exception and have no effect;  e.g. <code>r=3.0; r</code> returns the pixel red color value, not 3.0</li>
<li>unary operators have a lower priority than binary operators, that is, the unary minus (negation) has lower precedence than exponentiation, so -3^2 is interpreted as -(3^2) = -9.  Use parentheses to clarify your intent (e.g. (-3)^2 = 9).</li>
<li>care must be exercised when using the slash ('/') symbol. The string of characters <var>1/2x</var> is interpreted as (1/2)x. The contrary interpretation should be written explicitly as 1/(2x). Again, the use of parentheses helps clarify the meaning and should be used whenever there is any chance of misinterpretation.</li>
</ul>
<br/>


<h4>Source Images</h4>

<p>The symbols <code>u</code> and <code>v</code> refer to the first and second images, respectively, in the current image sequence.  Refer to a particular image in a sequence by appending its index to any image reference (usually <code>u</code>), with a zero index for the beginning of the sequence. A negative index counts from the end.  For example, <code>u[0]</code> is the first image in the sequence, <code>u[2]</code> is the third, <code>u[-1]</code> is the last image, and <code>u[t]</code> is the current image. The current image can also be referenced by <code>s</code>. If the sequence number exceeds the length of the sequence, the count is wrapped. Thus in a 3-image sequence,  <code>u[-1]</code>, <code>u[2]</code>, and <code>u[5]</code> all refer to the same (third) image.</p>

<p>As an example, we form an image by averaging the first image and third images (the second (index 1) image is ignored and just junked):</p>

<ul><pre class="bg-light text-dark mx-4"><samp>convert image1.jpg image2.jpg image3.jpg -fx "(u+u[2])/2.0" image.jpg
</samp></pre></ul>

<p>By default, the image to which <code>p</code>, <code>r</code>, <code>g</code>, <code>b</code>, <code>a</code>, etc., are applied is the current image <code>s</code> in the image list. This is equivalent to <code>u</code> except when used in an escape sequence <code>%[fx:...]</code>. </p>

<p>It is important to note the special role played by the first image. This is the only image in the image sequence that is modified, other images are used only for their data. As an illustrative example, consider the following, and note that the setting <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#channel">-channel red</a> instructs <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#fx">-fx</a> to modify only the green channel; nothing in the red or blue channels will change. It is instructive to ponder why the result is not symmetric.</p>

<ul><pre class="bg-light text-dark mx-4"><samp>convert -channel green logo: -flop logo: -resize "20%" -fx "(u+v)/2" image.jpg
</samp></pre></ul>

<ul>
  <a href="<?php echo $_SESSION['RelativePath']?>/../image/logo-sm-flop.png"><img src="<?php echo $_SESSION['RelativePath']?>/../image/logo-sm-flop.png" width="128" height="96" alt="logo-sm-flop.png" /></a>
  <a href="<?php echo $_SESSION['RelativePath']?>/../image/logo-sm.png"><img src="<?php echo $_SESSION['RelativePath']?>/../image/logo-sm.png" width="128" height="96" alt="logo-sm.png" /></a>
<img style="margin-top:38px; margin-bottom:38px;" src="<?php echo $_SESSION['RelativePath']?>/../image/right.gif" width="20" height="20" alt="==>" />
  <a href="<?php echo $_SESSION['RelativePath']?>/../image/logo-sm-fx.png"><img src="<?php echo $_SESSION['RelativePath']?>/../image/logo-sm-fx.png" width="128" height="96" alt="logo-sm-fx.png" /></a>
</ul>

<br/>
<h4>Accessing Pixels</h4>

<p>All color values are normalized to the range of 0.0 to 1.0.  The alpha channel ranges from 0.0 (fully transparent) to 1.0 (fully opaque).</p>

<p>The pixels are processed one at a time, but a different pixel of an image can be specified using a pixel index represented by <code>p</code>. For example,</p>

<ul><pre class="bg-light text-dark mx-4"><samp>p[-1].g      green value of pixel to the immediate left of the current pixel
p[-1,-1].r   red value of the pixel diagonally left and up from current pixel
</samp></pre></ul>

<p>To specify an absolute position, use braces, rather than brackets.</p>

<ul><pre class="bg-light text-dark mx-4"><samp>p{0,0}.r     red value of the pixel in the upper left corner of the image
p{12,34}.b   blue pixel value at column number 12, row 34 of the image
</samp></pre></ul>

<p>Integer values of the position retrieve the color of the pixel referenced, while non-integer position values return a blended color according to the current <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#interpolate">-interpolate</a> setting.</p>

<p>A position outside the boundary of the image retrieves a value dictated by the <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#virtual-pixel">-virtual-pixel</a> option setting.</p>

<h4>Apply an Expression to Select Image Channels</h4>

<p>Use the <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#channel">-channel</a> setting to specify the output channel of the result. If no output channel is given, the result is set over all channels except the opacity channel. For example, to replace the red channel of <code>alpha.png</code> with the average of the green channels from the images <code>alpha.png</code> and <code>beta.png</code>, use:</p>

<ul><pre class="bg-light text-dark mx-4"><samp>convert alpha.png beta.png -channel red -fx "(u.g+v.g)/2" gamma.png
</samp></pre></ul>


<h4>Results</h4>

<p>The <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#fx">-fx</a> operator evaluates the given expression for each channel (set by <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#channel">-channel</a>) of each pixel in the first image (<code>u</code>) in the sequence. The computed values are temporarily stored in a copy (clone) of that first image until all the pixels have been processed, after which this single new image replaces the list of images in the current image sequence.  As such, in the previous example the updated version of <code>alpha.png</code> replaces both of the original images, <code>alpha.png</code> and <code>beta.png</code>, before being saved as <code>gamma.png</code>.</p>

<p>The current image <code>s</code> is set to the first image in the sequence (<code>u</code>), and <code>t</code> to its index, 0.  The symbols <code>i</code> and <code>j</code> reference the current pixel being processed.</p>


<p>For use with <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#format_identify_">-format</a>, the value-escape <code>%[fx:]</code> is evaluated just once for each image in the current image sequence. As each image in the sequence is being evaluated, <code>s</code> and <code>t</code> successively refer to the current image and its index, while <code>i</code> and <code>j</code> are set to zero, and the current channel set to red (<a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#channel">-channel</a> is ignored). An example:</p>

<ul><pre class="bg-light text-dark mx-4"><samp>convert canvas:'rgb(25%,50%,75%)' rose: -colorspace gray  \
  -format 'Red channel of NW corner of image #%[fx:t] is %[fx:s]\n' info:
Red channel of NW corner of image #0 is 0.464883
Red channel of NW corner of image #1 is 0.184582
</samp></pre></ul>

<p>Here we use the image indexes to <var>rotate</var> each image differently, and use <code>-set</code> with the image index to set a different <var>pause delay</var> on the first image in the animation:</p>

<ul><pre class="bg-light text-dark mx-4"><samp>convert rose: -duplicate 29 -virtual-pixel Gray -distort SRT '%[fx:360.0*t/n]' \
  -set delay '%[fx:t == 0 ? 240 : 10]' -loop 0 rose.gif
</samp></pre></ul>

<p>The color-escape <code>%[pixel:]</code> or <code>%[hex:]</code> is evaluated once per image and per color channel in that image (<a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#channel">-channel</a> is ignored), The values generated are then converted into a color string (a named color or hex color value).  The symbols <code>i</code> and <code>j</code> are set to zero, and <code>s</code> and <code>t</code> refer to each successively current image and index.</p>

</div>
