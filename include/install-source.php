<?php
if (!isset($_SESSION) || !is_array($_SESSION)) {
  header("Location: ../script/index.php");
  exit();
}
?>
<div>
<h1 class="text-center">Install ImageMagick from Source</h1>
<p class="text-center"><a href="#linux">Install from Linux Source</a> • <a href="#windows">Install from Windows Source</a></p>

<p class="lead">Chances are, ImageMagick is already installed on your computer if you are using some flavor of Linux, and its likely not installed if you are using some form of Windows.  In either case, you can type the following to find out:</p>

<pre class="bg-light text-dark mx-4"><code>identify -version
</code></pre>

<p>If the <a href="<?php echo $_SESSION['RelativePath']?>/../script/identify.php">identify</a> program executes and identifies itself as ImageMagick, you may not need to install ImageMagick from source unless you want to add support for additional image formats or upgrade to a newer version.  You also have the option of installing a pre-compiled <a href="<?php echo $_SESSION['RelativePath']?>/../script/download.php">binary release</a>.  However, if you still want to install from source, choose a platform, <a href="#linux">Linux</a> or <a href="#windows">Windows</a>.  Before installing from source, you may want to review recent <a href="https://github.com/ImageMagick/Website6/blob/main/ChangeLog.md" rel="noopener noreferrer" target="_blank">changes</a> to the ImageMagick distribution.</p>

<p>The authoritative source code repository is <a href="https://github.com/ImageMagick/ImageMagick6">https://github.com/ImageMagick/ImageMagick6</a>.</p>

<h2><a class="anchor" id="linux"></a>Install from Linux Source</h2>

<p>ImageMagick builds on a variety of Linux and Linux-like operating systems including Linux, Solaris, FreeBSD, Mac OS X, and others.  A compiler is required and fortunately almost all modern Linux systems have one.  Clone the source repository:</p>


<pre class="p-3 mb-2 text-body-secondary bg-body-tertiary"><samp>git clone https://github.com/ImageMagick/ImageMagick6.git ImageMagick-<?php echo MagickLibVersionText ?></samp></pre>

<p>Or download <a href="https://imagemagick.org/archive">ImageMagick.tar.gz</a> from <a href="https://imagemagick.org/archive">imagemagick.org</a> or a <a href="<?php echo $_SESSION['RelativePath']?>/../script/mirror.php">mirror</a> and verify the distribution against its <a href="https://imagemagick.org/archive/digest.rdf">message digest</a>.</p>

<p>Next configure and compile ImageMagick.  Note the <a href="https://en.wikipedia.org/wiki/Pkg-config">pkg-config</a> script is required so that ImageMagick can find certain optional delegate libraries on your system.  To configure, type:</p>

<pre class="p-3 mb-2 text-body-secondary bg-body-tertiary"><samp>cd ImageMagick-<?php echo MagickLibVersionText ?>

./configure
make</samp></pre>

<p>If build fails, try <code>gmake</code> instead.</p>

<p>For advanced users, we recommend a modules build:</p>
<pre class="p-3 mb-2 text-body-secondary bg-body-tertiary"><samp>./configure --with-modules</samp></pre>

<p>If ImageMagick configured and compiled without complaint, you are ready to install it on your system.  Administrator privileges are required to install.  To install, type</p>

<pre class="bg-light text-dark mx-4"><code>sudo make install
</code></pre>

<p>You may need to configure the dynamic linker run-time bindings:</p>

<pre class="bg-light text-dark mx-4"><code>sudo ldconfig /usr/local/lib
</code></pre>

<p>Finally, verify the ImageMagick install worked properly, type</p>

<pre class="bg-light text-dark mx-4"><code>/usr/local/bin/convert logo: logo.gif
</code></pre>

<p>For a more comprehensive test, run the ImageMagick validation suite. Ghostscript and Freetype are prerequisites, otherwise expect the EPS, PS, PDF and text annotations tests to fail.</p>

<pre class="bg-light text-dark mx-4"><code>make check
</code></pre>

<p>Ghostscript and Freetype are prerequisites, otherwise certain unit tests that render text and the EPS, PS, and PDF formats will likely fail. These unit tests require the open security policy to pass.</p>

<p>Congratulations, you have a working ImageMagick distribution and you are ready to use ImageMagick to <a href="https://legacy.imagemagick.org/Usage/">convert, compose, or edit</a> your images or perhaps you'll want to use one of the <a href="<?php echo $_SESSION['RelativePath']?>/../script/develop.php">Application Program Interfaces</a> for C, C++, Perl, and others.</p>

<p>The above instructions will satisfy a great number of ImageMagick users, but we suspect a few will have additional questions or problems to consider.  For example, what does one do if ImageMagick fails to configure or compile?  Or what if you don't have administrator privileges and what if you don't want to install ImageMagick in the default <code>/../usr/local</code> folder?  You will find the answer to these questions, and more, in <a href="<?php echo $_SESSION['RelativePath']?>/../script/advanced-linux-installation.php">Advanced Linux Source Installation</a>.</p>

<h2><a class="anchor" id="windows"></a>Install from Windows Source</h2>

<p>Building ImageMagick source for Windows requires a modern version of Microsoft Visual Studio IDE.  Users have reported success with the Borland C++ compiler as well.  If you don't have a compiler you can still install a self-installing <a href="<?php echo $_SESSION['RelativePath']?>/../script/download.php">binary release</a>.</p>

<p>Clone the Github repo:</p>

<pre class="bg-light text-dark mx-4"><code>git clone -b ImageMagick-Windows-6 --single-branch https://github.com/ImageMagick/ImageMagick6-Windows.git ImageMagick-Windows-6</code></pre>

<p>and run <code>CloneRepositories.cmd</code>.  Alternatively, download <a href="https://imagemagick.org/archive//windows/">ImageMagick-windows.zip</a> and verify its <a href="https://imagemagick.org/archive//windows/digest.rdf">message digest</a>.  For the latter, you can unpack the distribution with <a href="http://www.winzip.com">WinZip</a> or type the following from any MS-DOS Command Prompt window:</p>

<pre class="bg-light text-dark mx-4"><code>unzip ImageMagick-windows.zip</code></pre>

<p>Next, launch your Visual Studio IDE and choose <samp>Open->Project</samp>.  Select the configure workspace from the <samp>ImageMagick-<?php echo(MagickLibVersionText); ?>/VisualMagick/configure</samp> folder and press Open.  Choose <samp>Build->Build Solution</samp>
to compile the program and on completion run the program.</p>

<ul><img class="img-fluid me-auto d-block" src="<?php echo $_SESSION['RelativePath']?>/../image/configure.jpg" alt="[configure]" /></ul>

<p>Press <samp>Next</samp> and click on the multi-threaded static build.  If you are using the Visual Studio 6.0 IDE, make sure no check is next to the <var>Generate Visual Studio 7</var> format option.  Now press, on <samp>Next</samp> twice and finally <samp>Finish</samp>.  The configuration utility just created a workspace required to build ImageMagick from source.  Choose <samp>Open->Project</samp> and select the VisualStaticMT workspace from the <samp>ImageMagick-<?php echo(MagickLibVersionText); ?>/VisualMagick/</samp>  folder.  Finally, choose <samp>Build->Build Solution</samp> to compile and build the ImageMagick distribution.</p>

<p>To verify ImageMagick is working properly, launch a MS-DOS Command Prompt window and type</p>

<pre class="p-3 mb-2 text-body-secondary bg-body-tertiary"><samp>cd ImageMagick-<?php echo MagickLibVersionText ?>

convert logo: image.jpg</samp></pre>

<p>For a more comprehensive test, run the ImageMagick validation suite:</p>

<pre class="bg-light text-dark mx-4"><code>validate
</code></pre>

<p>Congratulations, you have a working ImageMagick distribution under Windows and you are ready to use ImageMagick to <a href="https://legacy.imagemagick.org/Usage/">convert, compose, or edit</a> your images or perhaps you'll want to use one of the <a href="<?php echo $_SESSION['RelativePath']?>/../script/develop.php">Application Program Interfaces</a> for C, C++, Perl, and others.</p>

<p>The above instructions will satisfy a great number of ImageMagick users, but we suspect a few will have additional questions or problems to consider.  For example, what does one do if ImageMagick fails to configure or compile?  Or what if you want to install ImageMagick in a place other than the <samp>ImageMagick-<?php echo(MagickLibVersionText); ?>/VisualMagick/bin</samp> folder?  You will find the answer to these questions, and more, in <a href="<?php echo $_SESSION['RelativePath']?>/../script/advanced-windows-installation.php">Advanced Windows Source Installation</a>.</p>

</div>
