<div class="magick-header">
<p class="text-center"><a href="#describe">Algorithm Description</a> • <a href="#measure">Measuring Color Reduction Error</a></p>

<p class="lead magick-description">This document describes how ImageMagick performs color reduction on an image. To fully understand what follows, you should have a knowledge of basic imaging techniques and the tree data structure and terminology.</p>

<h2><a class="anchor" id="describe"></a>Algorithm Description</h2>

<p>For purposes of color allocation, an image is a set of <var>n</var> pixels, where each pixel is a point in RGB space. RGB space is a 3-dimensional vector space, and each pixel, <var>p(i)</var>, is defined by an ordered triple of red, green, and blue coordinates, (<var>r(i)</var>, <var>g(i)</var>, <var>b(i)</var>).</p>

<p>Each primary color component (<var>red</var>, <var>green</var>, or <var>blue</var>) represents an intensity which varies linearly from 0 to a maximum value, <var>Cmax</var>, which corresponds to full saturation of that color. Color allocation is defined over a domain consisting of the cube in RGB space with opposite vertices at (0, 0, 0) and (<var>Cmax</var>, <var>Cmax</var>, <var>Cmax</var>).  ImageMagick requires <var>Cmax</var>= <var>255</var>.</p>

<p>The algorithm maps this domain onto a tree in which each node represents a cube within that domain. In the following discussion, these cubes are defined by the coordinate of two opposite vertices: The vertex nearest the origin in RGB space and the vertex farthest from the origin.</p>

<p>The tree's root node represents the entire domain, (0,0,0) through (<var>Cmax</var>, <var>Cmax</var>, <var>Cmax</var>). Each lower level in the tree is generated by subdividing one node's cube into eight smaller cubes of equal size. This corresponds to bisecting the parent cube with planes passing through the midpoints of each edge.</p>

<p>The basic algorithm operates in three phases:</p>

<ol>
  <li>Classification</li>
  <li>Reduction</li>
  <li>Assignment</li>
</ol>

<p><b>Classification</b></p>

<p>Classification builds a color description tree for the image. Reduction collapses the tree until the number it represents, at most, is the number of colors desired in the output image. Assignment defines the output image's color map and sets each pixel's color by reclassification in the reduced tree.  <var>Our goal is to minimize the numerical discrepancies between the original colors and quantized colors</var>. To learn more about quantization error, see <a href="#measure">Measuring Color Reduction Error</a>.</p>

<p>Classification begins by initializing a color description tree of sufficient depth to represent each possible input color in a leaf. However, it is impractical to generate a fully-formed color description tree in the classification phase for realistic values of <var>Cmax</var>. If color components in the input image are quantized to <var>k</var>-bit precision, so that <var>Cmax</var> = <var>2^k-1</var>, the tree would need <var>k</var> levels below the root node to allow representing each possible input color in a leaf.  This becomes prohibitive because the tree's total number of nodes:</p>

<pre class="bg-light text-dark mx-4"><code>total nodes = 1+Sum(8^i), i=1,k

For k=8,
nodes = 1 + (8^1+8^2+....+8^8)
      = 1 + 8(8^8 - 1)/(8 - 1)
      = 19,173,961
</code></pre>

<p>Therefore, to avoid building a fully populated tree, ImageMagick:</p>

<ol>
  <li>initializes data structures for nodes only as they are needed;</li>
  <li>chooses a maximum depth for the tree as a function of the desired number of colors in the output image (currently the <var>base-two</var> logarithm of <var>Cmax</var>).</li>
</ol>

<pre class="bg-light text-dark mx-4"><code>For Cmax=255,
maximum tree depth = log<sub>2</sub>(256)
                   = 8
</code></pre>

<p>A tree of this depth generally allows the best representation of the source image with the fastest computational speed and the least amount of memory. However, the default depth is inappropriate for some images. Therefore, the caller can request a specific tree depth.</p>

<p>For each pixel in the input image, classification scans downward from the root of the color description tree. At each level of the tree, it identifies the single node which represents a cube in RGB space containing the pixels' color. It updates the following data for each such node:</p>

<dl class="row">
<dt class="col-md-4">n1</dt>
	<dd class="col-md-8">number of pixels whose color is contained in the RGB cube which this node represents;</dd>
<dt class="col-md-4">n2</dt>
  <dd class="col-md-8">number of pixels whose color is not represented in a node at lower depth in the tree; initially, <var>n2=0</var> for all nodes except leaves of the tree.</dd>
<dt class="col-md-4">Sr,Sg,Sb</dt>
  <dd class="col-md-8">sums of the <var>red</var>, <var>green</var>, and <var>blue</var> component values for all pixels not classified at a lower depth. The combination of these sums and <var>n2</var> will ultimately characterize the mean color of a set of pixels represented by this node.</dd>
<dt class="col-md-4">E</dt>
  <dd class="col-md-8">the distance squared in RGB space between each pixel contained within a node and the nodes' center. This represents the quantization error for a node.</dd>
</dl>

<p><b>Reduction</b></p>

<p>Reduction repeatedly prunes the tree until the number of nodes with <var>n2</var> &gt; <var>0</var> is less than or equal to the maximum number of colors allowed in the output image. On any given iteration over the tree, it selects those nodes whose <var>E</var> value is minimal for pruning and merges their color statistics upward. It uses a pruning threshold, <var>Ep</var>, to govern node selection as follows:</p>

<pre class="bg-light text-dark mx-4"><code>Ep = 0
while number of nodes with (n2 &gt; 0) &gt; required maximum number of colors
   prune all nodes such that E &lt;= Ep
   Set Ep  to minimum E in remaining nodes
</code></pre>

<p>This has the effect of minimizing any quantization error when merging two nodes together.</p>

<p>When a node to be pruned has offspring, the pruning procedure invokes itself recursively in order to prune the tree from the leaves upward. The values of <var>n2</var>, <var>Sr</var>, <var>Sg</var>, and <var>Sb</var> in a node being pruned are always added to the corresponding data in that node's parent. This retains the pruned node's color characteristics for later averaging.</p>

<p>For each node, <var>n2</var> pixels exist for which that node represents the smallest volume in RGB space containing those pixel's colors. When <var>n2</var> &gt; <var>0</var> the node will uniquely define a color in the output image. At the beginning of reduction, <var>n2</var> = <var>0</var> for all nodes except the leaves of the tree which represent colors present in the input image.</p>

<p>The other pixel count, <var>n1</var>, indicates the total number of colors within the cubic volume which the node represents. This includes <var>n1</var> - <var>n2</var> pixels whose colors should be defined by nodes at a lower level in the tree.</p>

<p><b>Assignment</b></p>

<p>Assignment generates the output image from the pruned tree. The output image consists of two parts:</p>
<ol>
  <li>A color map, which is an array of color descriptions (RGB triples) for each color present in the output image.</li>

  <li>A pixel array, which represents each pixel as an index into the color map array.</li>
</ol>

<p>First, the assignment phase makes one pass over the pruned color description tree to establish the image's color map. For each node with <var>n2</var> &gt; <var>0</var>, it divides <var>Sr</var>, <var>Sg</var>, and <var>Sb</var> by <var>n2</var>. This produces the mean color of all pixels that classify no lower than this node. Each of these colors becomes an entry in the color map.</p>

<p>Finally, the assignment phase reclassifies each pixel in the pruned tree to identify the deepest node containing the pixel's color. The pixel's value in the pixel array becomes the index of this node's mean color in the color map.</p>

<p>Empirical evidence suggests that the distances in color spaces such as YUV, or YIQ correspond to perceptual color differences more closely than do distances in RGB space.  These color spaces may give better results when color reducing an image. Here the algorithm is as described except each pixel is a point in the alternate color space. For convenience, the color components are normalized to the range 0 to a maximum value, <var>Cmax</var>. The color reduction can then proceed as described.</p>

<h2><a class="anchor" id="measure"></a>Measuring Color Reduction Error</h2>

<p>Depending on the image, the color reduction error may be obvious or invisible. Images with high spatial frequencies (such as hair or grass) will show error much less than pictures with large smoothly shaded areas (such as faces). This because the high-frequency contour edges introduced by the color reduction process are masked by the high frequencies in the image.</p>

<p>To measure the difference between the original and color reduced images (the total color reduction error), ImageMagick sums over all pixels in an image the distance squared in RGB space between each original pixel value and its color reduced value. ImageMagick prints several error measurements including the mean error per pixel, the normalized mean error, and the normalized maximum error.</p>

<p>The normalized error measurement can be used to compare images.  In general, the closer the mean error is to zero the more the quantized image resembles the source image. Ideally, the error should be perceptually-based, since the human eye is the final judge of quantization quality.</p>

<p>These errors are measured and printed when the <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#colors">-colors</a> and <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#verbose">-verbose</a> options are specified on the <a href="<?php echo $_SESSION['RelativePath']?>/../script/convert.php">convert</a> command line:</p>

<div class="table-responsive" style="font-size:smaller !important;">
<table class="table table-sm table-hover table-striped">
  <tr>
    <td>mean error per pixel</td>
    <td>is the mean error for any single pixel in the image.</td>
  </tr>
  <tr>
    <td>normalized mean square error</td>
    <td>is the normalized mean square quantization error for any single pixel in the image. This distance measure is normalized to a range between 0 and 1. It is independent of the range of red, green, and blue values in the image.</td>
  </tr>
  <tr>
    <td>normalized maximum square error</td>
    <td>is the largest normalized square quantization error for any single pixel in the image. This distance measure is normalized to a range between of red, green, and blue values in the image.</td>
  </tr>
</table></div>

</div>
