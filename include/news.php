<div class="magick-header">
<h1 class="text-center">News</h1>
<p class="text-center"><a href="#news">News</a> • <a href="#community">Community</a></p>

<p>ImageMagick recommended practices <strong>strongly</strong> encourage you to configure a <a href="<?php echo $_SESSION['RelativePath']?>/../script/security-policy.php">security policy</a> that best suits your local environment.</p>

<p class="bg-light text-dark mx-4">We are utilizing a new community <a target="_blank" href="https://github.com/ImageMagick/ImageMagick6/discussions">discussion</a> service.  The previous <a target="_blank" href="https://legacy.imagemagick.org/discourse-server">discourse server</a> remains available to read legacy <a target="_blank" href="https://legacy.imagemagick.org/discourse-server~">discussions</a>.</p>

<p>We discovered a bug in the pseudo-random generator prior to ImageMagick 6.9.10-81, the first 3 values repeated because the random state was not initialized properly.  As a consequence of the fix, expect a different numerical sequence when seeding (-seed).</p>


<p>As an analog to linear (RGB) and non-linear (sRGB) color colorspaces, as of ImageMagick 6.9.9-29, we introduce the LinearGray colorspace.  Gray is non-linear grayscale and LinearGray is linear (e.g. -colorspace linear-gray).</p>

<p>ImageMagick <a href="https://imagemagick.org">version 7</a> has been released. We encourage you to migrate your workstreams to version 7.  However, we recognize a significant version 6 user community.  As such, the ImageMagick development team is committed to maintain, but not enhance, version 6 at least until 2028 and possibly beyond.</p>

<p>The ImageMagick development process ensures a stable API and <a href="https://abi-laboratory.pro/tracker/timeline/imagemagick/">ABI</a>. Before each ImageMagick release, we perform a comprehensive security assessment that includes <a href="https://github.com/google/sanitizers/wiki/AddressSanitizer">memory error</a>, <a href="https://github.com/google/sanitizers/wiki/ThreadSanitizer">thread data race</a> detection, and continuous <a href="https://github.com/google/oss-fuzz">fuzzing</a> to detect and prevent security vulnerabilities.</p>

<p>Want more performance from ImageMagick?  Try these options:</p>

<ul>
<li>add more memory to your system, see <a href="https://legacy.imagemagick.org/script/architecture.php#cache">the pixel cache</a>;</li>
<li>add more cores to your system, see <a href="https://legacy.imagemagick.org/script/architecture.php#threads">threads of execution support</a>;</li>
<li>reduce lock contention with the <a href="http://goog-perftools.sourceforge.net/doc/tcmalloc.html">tcmalloc</a> memory allocation library;</li>
<li>push large images to a solid-state drive, see <a href="https://legacy.imagemagick.org/script/architecture.php#tera-pixel">large image support</a>.</li>
</ul>
<p>If these options are prohibitive, you can reduce the quality of the image results.  The default build is Q16.  If you instead use a Q8 build, you use half the memory The trade-off is reduced precision.  For a Q8 build of ImageMagick, use this <code>configure</code> script option: <code>--with-quantum-depth=8</code>.</p>

<h2><a class="anchor" id="community"></a>Community</h2>
<p>To join the ImageMagick community, try the <a target="_blank" href="https://github.com/ImageMagick/ImageMagick6/discussions">discussion</a> service.  You can review questions or comments (with informed responses) posed by ImageMagick users or ask your own questions. If you want to contribute image processing algorithms, other enhancements, or bug fixes, open an <a href="https://github.com/ImageMagick/ImageMagick6/issues">issue</a>. </p>
</div>
