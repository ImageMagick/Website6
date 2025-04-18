<div>
<h1 class="text-center">Download</h1>
<p class="text-center"><a href="#linux">Linux Binary Release</a> • <a href="#macosx">Mac OS X Binary Release</a> • <a href="#iOS">iOS Binary Release</a> • <a href="#windows">Windows Binary Release</a></p>

<p class="lead">You can install ImageMagick from <a href="<?php echo $_SESSION['RelativePath']?>/../script/install-source.php">source</a>.  However, if you don't have a proper development environment or if you're anxious to get started, download a ready-to-run <a href="#linux">Linux</a> or <a href="#windows">Windows</a> executable.  Before you download, you may want to review recent <a href="https://github.com/ImageMagick/Website6/blob/main/ChangeLog.md">changes</a> to the ImageMagick distribution.</p>

<p>ImageMagick source and binary distributions are available from a variety of FTP and Web <a href="<?php echo $_SESSION['RelativePath']?>/../script/mirror.php">mirrors</a> around the world.</p>

<p>It is strongly recommended to establish a <a href="<?php echo $_SESSION['RelativePath']?>/../script/security-policy.php">security policy</a> suitable for your local environment before utilizing ImageMagick.</p>

<h2><a class="anchor" id="linux"></a>Linux Binary Release</h2>

<p>These are the Linux variations that we support.  If your system is not on the list, try installing from <a href="<?php echo $_SESSION['RelativePath']?>/../script/install-source.php">source</a>. Although ImageMagick runs fine on a single core computer, it automagically runs in parallel on multi-core systems reducing run times considerably. ImageMagick recommended practices <b>strongly</b> encourage you to configure a <a href="<?php echo $_SESSION['RelativePath']?>/../script/security-policy.php">security policy</a> that suits your local environment.</p>

<div>
<table class="table table-sm table-hover table-striped table-responsive">
  <col width="40%"/> <col width="60%"/>
  <thead>
  <tr>
    <th>Version</th>
    <th>Description</th>
  </tr>
  </thead>
  <tbody>

  <tr>
  <?php $filename = "ImageMagick-" . MagickLibVersionText . MagickLibSubversion . ".x86_64.rpm";
  ?>
    <td><a href= "https://imagemagick.org/archive//linux/CentOS/x86_64/<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
    <td>Redhat / Ricky 9.2 x86_64 RPM</td>
  </tr>

  <tr>
  <?php $filename = "ImageMagick-libs-" . MagickLibVersionText . MagickLibSubversion . ".x86_64.rpm";
  ?>
    <td><a href= "https://imagemagick.org/archive//linux/CentOS/x86_64/<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
    <td>Fedora x86_64 RPM</td>
  </tr>

  <tr>
    <td><a href="https://imagemagick.org/archive//linux/CentOS">ImageMagick RPM's</a></td>
    <td>Development, Perl, C++, and documentation RPM's.</td>
  </tr>

  <tr>
    <td><a href="https://imagemagick.org/archive//binaries/ImageMagick-i386-pc-solaris2.11.tar.gz">ImageMagick-i386-pc-solaris2.11.tar.gz</a></td>
    <td>Solaris Sparc 2.11</td>
  </tr>

  <tr>
    <td><a href="https://imagemagick.org/archive//binaries/ImageMagick-i686-pc-cygwin.tar.gz">ImageMagick-i686-pc-cygwin.tar.gz</a></td>
    <td>Cygwin</td>
  </tr>

  <tr>
    <td><a href="https://imagemagick.org/archive//binaries/ImageMagick-i686-pc-mingw32.tar.gz">ImageMagick-i686-pc-mingw32.tar.gz</a></td>
    <td>MinGW</td>
  </tr>
  </tbody>
</table></div>

<p>Verify its <a href="https://imagemagick.org/archive//binaries/digest.rdf">message digest</a>.</p>

<p>ImageMagick RPM's are self-installing.  Simply type the following command and you're ready to start using ImageMagick:</p>
<pre class="p-3 mb-2 text-body-secondary bg-body-tertiary"><samp>rpm -Uvh ImageMagick-<?php echo MagickLibVersionText . MagickLibSubversion ?>.x86_64.rpm</samp></pre>

<p>You'll need the libraries as well:</p>
<pre class="p-3 mb-2 text-body-secondary bg-body-tertiary"><samp>rpm -Uvh ImageMagick-libs-<?php echo MagickLibVersionText . MagickLibSubversion ?>.x86_64.rpm</samp></pre>

<p>Note, if there are missing dependencies, install them from the <a href="https://fedoraproject.org/wiki/EPEL">EPEL</a> repo.</p>

<p>For other systems, create (or choose) a directory to install the package into and change to that directory, for example:</p>

<pre class="bg-light text-dark mx-4"><code>cd $HOME</code></pre>

<p>Next, extract the contents of the package.  For example:</p>

<pre class="bg-light text-dark mx-4"><code>tar xvzf ImageMagick.tar.gz</code></pre>

<p>Set the <code>MAGICK_HOME</code> environment variable to the path where you extracted the ImageMagick files. For example:</p>

<pre class="p-3 mb-2 text-body-secondary bg-body-tertiary"><samp>export MAGICK_HOME="$HOME/ImageMagick-<?php echo MagickLibVersionText ?>"</samp></pre>

<p>If the <code>bin</code> subdirectory of the extracted package is not already in your executable search path, add it to your <code>PATH</code> environment variable. For example:</p>

<pre class="bg-light text-dark mx-4"><code>export PATH="$MAGICK_HOME/bin:$PATH</code></pre>


<p>On Linux and Solaris machines add <code>$MAGICK_HOME/lib</code> to the <code>LD_LIBRARY_PATH</code> environment variable:</p>

<pre class="bg-light text-dark mx-4"><code>LD_LIBRARY_PATH="${LD_LIBRARY_PATH:+$LD_LIBRARY_PATH:}$MAGICK_HOME/lib
export LD_LIBRARY_PATH</code></pre>

<p>Finally, to verify ImageMagick is working properly, type the following on the command line:</p>

<pre class="bg-light text-dark mx-4"><code>convert logo: logo.gif
identify logo.gif
display logo.gif</code></pre>

<p>Congratulations, you have a working ImageMagick distribution under Linux or Linux and you are ready to use ImageMagick to <a href="https://legacy.imagemagick.org/Usage/">convert, compose, or edit</a> your images or perhaps you'll want to use one of the <a href="<?php echo $_SESSION['RelativePath']?>/../script/develop.php">Application Program Interfaces</a> for C, C++, Perl, and others.</p>

<h2><a class="anchor" id="macosx"></a>Mac OS X Binary Release</h2>

<p>We recommend <a href="https://brew.sh">Homebrew</a> which provides pre-built binaries for Mac (some users prefer <a href="https://macports.org">MacPorts</a>).  Download HomeBrew and type:</p>

<pre class="bg-light text-dark mx-4"><code>brew install imagemagick</code></pre>

<p>ImageMagick depends on Ghostscript fonts.  To install them, type:</p>

<pre class="bg-light text-dark mx-4"><code>brew install ghostscript</code></pre>

<p>The <code>brew</code> command downloads and installs ImageMagick with many of its delegate libraries (e.g. JPEG, PNG, Freetype, etc).  Homebrew <a href="https://github.com/Homebrew/homebrew-core/issues/31510">no longer allows</a> configurable builds; if you need different compile options (e.g. librsvg support), you can download the ImageMagick Mac OS X distribution we provide:</p>

<div>
<table class="table table-sm table-hover table-striped table-responsive">
  <col width="40%"/> <col width="60%"/>
  <thead>
  <tr>
    <th>Version</th>
    <th>Description</th>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td><a href="https://imagemagick.org/archive//binaries/ImageMagick-x86_64-apple-darwin20.1.0.tar.gz">ImageMagick-x86_64-apple-darwin20.1.0.tar.gz</a></td>
    <td>macOS High Sierra</td>
  </tr>
  <tbody>
</table></div>

<p>Verify its <a href="https://imagemagick.org/archive//binaries/digest.rdf">message digest</a>.</p>

<p>Create (or choose) a directory to install the package into and change to that directory, for example:</p>

<pre class="bg-light text-dark mx-4"><code>cd $HOME</code></pre>

<p>Next, extract the contents of the package.  For example:</p>

<pre class="bg-light text-dark mx-4"><code>tar xvzf ImageMagick-x86_64-apple-darwin20.1.0.tar.gz</code></pre>

<p>Set the <code>MAGICK_HOME</code> environment variable to the path where you extracted the ImageMagick files. For example:</p>

<pre class="p-3 mb-2 text-body-secondary bg-body-tertiary"><samp>export MAGICK_HOME="$HOME/ImageMagick-<?php echo MagickLibVersionText ?>"</samp></pre>

<p>If the <code>bin</code> subdirectory of the extracted package is not already in your executable search path, add it to your <code>PATH</code> environment variable. For example:</p>

<pre class="bg-light text-dark mx-4"><code>export PATH="$MAGICK_HOME/bin:$PATH"</code></pre>


<p>Set the <code>DYLD_LIBRARY_PATH</code> environment variable:</p>

<pre class="bg-light text-dark mx-4"><code>export DYLD_LIBRARY_PATH="$MAGICK_HOME/lib/"</code></pre>

<p>Finally, to verify ImageMagick is working properly, type the following on the command line:</p>

<pre class="bg-light text-dark mx-4"><code>convert logo: logo.gif
identify logo.gif
display logo.gif</code></pre>

<p><b>Note</b>, the <a href="<?php echo $_SESSION['RelativePath']?>/../script/display.php">display</a> program requires the X11 server available on your Mac OS X installation DVD. Once that is installed, you will also need to set <code>export DISPLAY=:0</code>.</p>

<p>The best way to deal with all the exports is to put them at the end of your .profile file</p>

<p>Congratulations, you have a working ImageMagick distribution under Mac OS X and you are ready to use ImageMagick to <a href="https://legacy.imagemagick.org/Usage/">convert, compose, or edit</a> your images or perhaps you'll want to use one of the <a href="<?php echo $_SESSION['RelativePath']?>/../script/develop.php">Application Program Interfaces</a> for C, C++, Perl, and others.</p>

<h2><a class="anchor" id="iOS"></a>iOS Binary Release</h2>

<p><a href="http://www.cloudgoessocial.net/2011/03/21/im-xcode4-ios4-3/">~Claudio</a> provides iOS builds of ImageMagick.</p>

<h4>Download iOS Distribution</h4>

<p>You can download the iOS distribution directly from ImageMagick's <a href="https://imagemagick.org/archive//iOS">repository</a>.</p>

<p>There are always 2 packages for the compiled ImageMagick:</p>

<ul>
<li>iOSMagick-VERSION-libs.zip</li>
<li>iOSMagick-VERSION.zip</li>
</ul>

<p>The first one includes headers and compiled libraries that have been used to compile ImageMagick. Most users would need this one.</p>

<h4>ImageMagick compiling script for iOS OS and iOS Simulator</h4>

<p>To run the script:</p>
<pre class="bg-light text-dark mx-4"><code>./imagemagick_compile.sh <var>VERSION</var></code></pre>
<p>where <var>VERSION</var> is the version of ImageMagick you want to compile (i.e.: <?php echo MagickLibVersionText . MagickLibSubversion; ?>, svn, ...)</p>

<p>This script compiles ImageMagick as a static library to be included in iOS projects and adds support for</p>
<ul>
<li>png</li>
<li>jpeg</li>
<li>tiff</li>
</ul>

<p>Upon successful compilation a folder called <code>IMPORT_ME</code> is created on your <code>~/Desktop</code>. You can import it into your Xcode project.</p>

<h4>Xcode project settings</h4>

<p>After including everything into Xcode please also make sure to have these settings (Build tab of the project information):</p>
<ul>
<li>Other Linker Flags: -lMagickCore-Q16 -lMagickWand-Q16 -ljpeg -lpng -lbz2 -lz</li>
<li>Header Search Paths: $(SRCROOT) - make it Recursive</li>
<li>Library Search Paths: $(SRCROOT) - make it Recursive</li>
</ul>

<p>On the lower left click on the small-wheel and select: Add User-Defined Setting</p>
<ul>
<li>Key: OTHER_CFLAGS</li>
<li>Value: -Dmacintosh=1</li>
</ul>

<h4>Sample project</h4>

<p>A <a href="http://www.cloudgoessocial.net/im_iphone/IM_Test.zip">sample project </a> is available for download. It is not updated too often, but it does give an idea of all the settings and some ways to play around with ImageMagick in an iOS application.</p>

<h2><a class="anchor" id="windows"></a>Windows Binary Release</h2>

<p>ImageMagick runs on Windows 10 (x86 &amp; x64) or newer or Windows Server 2012 or newer.</p>

<p>The amount of memory can be an important factor, especially if you intend to work on large images.  A minimum of 512 MB of RAM is recommended, but the more RAM the better.  Although ImageMagick runs well on a single core computer, it automagically runs in parallel on multi-core systems reducing run times considerably.</p>

<p>The Windows version of ImageMagick is self-installing.  Simply click on the appropriate version below and it will launch itself and ask you a few installation questions.  Versions with <var>Q8</var> in the name are 8 bits-per-pixel component (e.g. 8-bit red, 8-bit green, etc.), whereas,  <var>Q16</var> in the filename are 16 bits-per-pixel component. A Q16 version permits you to read or write 16-bit images without losing precision but requires twice as much resources as the Q8 version.  Versions with <var>dll</var> in the filename include ImageMagick libraries as <a href="http://www.answers.com/topic/dll">dynamic link libraries</a>. Unless you have a Windows 32-bit OS, we recommend this version of ImageMagick for 64-bit Windows:</p>

<div>
<table class="table table-sm table-hover table-striped table-responsive">
  <col width="40%"/> <col width="60%"/>
  <thead>
  <tr>
    <th>Version</th>
    <th>Description</th>
  </tr>
  </thead>
  <tbody>
  <tr>
  <?php $filename = "ImageMagick-" . MagickLibVersionText . MagickLibSubversion . "-Q16-HDRI-x64-dll.exe";
  ?>
    <td><a href= "https://imagemagick.org/archive//binaries/<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
    <td>Win64 dynamic at 16 bits-per-pixel component with High-dynamic-range imaging enabled</td>
  </tr>
  </tbody>
</table></div>

<p>Or choose from these alternate Windows binary distributions:</p>

<div>
<table class="table table-sm table-hover table-striped table-responsive">
  <col width="40%"/> <col width="60%"/>
  <thead>
  <tr>
    <th>Version</th>
    <th>Description</th>
  </tr>
  </thead>
  <tbody>
  <tr>
  <?php $filename = "ImageMagick-" . MagickLibVersionText . MagickLibSubversion . "-Q16-x64-static.exe";
  ?>
      <td><a href= "https://imagemagick.org/archive//binaries/<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
   <td>Win64 static at 16 bits-per-pixel component</td>
  </tr>

  <tr>
  <?php $filename = "ImageMagick-" . MagickLibVersionText . MagickLibSubversion . "-Q8-x64-dll.exe";
  ?>
    <td><a href= "https://imagemagick.org/archive//binaries/<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
   <td>Win64 dynamic at 8 bits-per-pixel component</td>
  </tr>

  <tr>
  <?php $filename = "ImageMagick-" . MagickLibVersionText . MagickLibSubversion . "-Q8-x64-static.exe";
  ?>
    <td><a href= "https://imagemagick.org/archive//binaries/<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
    <td>Win64 static at 8 bits-per-pixel component</td>
  </tr>

  <tr>
  <?php $filename = "ImageMagick-" . MagickLibVersionText . MagickLibSubversion . "-Q16-x64-dll.exe";
  ?>
    <td><a href= "https://imagemagick.org/archive//binaries/<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
   <td>Win64 dynamic at 16 bits-per-pixel component</td>
  </tr>

  <tr>
  <?php $filename = "ImageMagick-" . MagickLibVersionText . MagickLibSubversion . "-Q16-HDRI-x64-dll.exe";
  ?>
    <td><a href= "https://imagemagick.org/archive//binaries/<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
    <td>Win64 dynamic at 16 bits-per-pixel component with <a href="<?php echo $_SESSION['RelativePath']?>/../script/high-dynamic-range.php">high dynamic-range imaging</a> enabled</td>
  </tr>

  <tr>
  <?php $filename = "ImageMagick-" . MagickLibVersionText . MagickLibSubversion . "-Q16-HDRI-x64-static.exe";
  ?>
    <td><a href= "https://imagemagick.org/archive//binaries/<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
    <td>Win64 static at 16 bits-per-pixel component with <a href="<?php echo $_SESSION['RelativePath']?>/../script/high-dynamic-range.php">high dynamic-range imaging</a> enabled</td>
  </tr>

  <tr>
  <?php $filename = "ImageMagick-" . MagickLibVersionText . MagickLibSubversion . "-Q16-x86-dll.exe";
  ?>
    <td><a href= "https://imagemagick.org/archive//binaries/<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
    <td>Win32 dynamic at 16 bits-per-pixel component</td>
  </tr>

  <tr>
  <?php $filename = "ImageMagick-" . MagickLibVersionText . MagickLibSubversion . "-Q16-x86-static.exe";
  ?>
    <td><a href= "https://imagemagick.org/archive//binaries/<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
    <td>Win32 static at 16 bits-per-pixel component</td>
  </tr>

  <tr>
  <?php $filename = "ImageMagick-" . MagickLibVersionText . MagickLibSubversion . "-Q8-x86-dll.exe";
  ?>
    <td><a href= "https://imagemagick.org/archive//binaries/<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
    <td>Win32 dynamic at 8 bits-per-pixel component</td>
  </tr>

  <tr>
  <?php $filename = "ImageMagick-" . MagickLibVersionText . MagickLibSubversion . "-Q8-x86-static.exe";
  ?>
    <td><a href= "https://imagemagick.org/archive//binaries/<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
    <td>Win32 static at 8 bits-per-pixel component</td>
  </tr>

  <tr>
  <?php $filename = "ImageMagick-" . MagickLibVersionText . MagickLibSubversion . "-Q16-HDRI-x86-dll.exe";
  ?>
    <td><a href= "https://imagemagick.org/archive//binaries/<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
    <td>Win32 dynamic at 16 bits-per-pixel component with <a href="<?php echo $_SESSION['RelativePath']?>/../script/high-dynamic-range.php">high dynamic-range imaging</a> enabled</td>
  </tr>

  <tr>
  <?php $filename = "ImageMagick-" . MagickLibVersionText . MagickLibSubversion . "-Q16-HDRI-x86-static.exe";
  ?>
    <td><a href= "https://imagemagick.org/archive/binaries/<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
    <td>Win32 static at 16 bits-per-pixel component with <a href="<?php echo $_SESSION['RelativePath']?>/../script/high-dynamic-range.php">high dynamic-range imaging</a> enabled</td>
  </tr>

  <tr>
  <?php $filename = "ImageMagick-" . MagickLibVersionText . MagickLibSubversion . "-portable-Q16-x64.zip";
  ?>
    <td><a href= "https://imagemagick.org/archive//binaries/<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
    <td>Portable Win64 static at 16 bits-per-pixel component.  Just copy to your host and run (no installer, no Windows registry entries).</td>
  </tr>

  <tr>
  <?php $filename = "ImageMagick-" . MagickLibVersionText . MagickLibSubversion . "-portable-Q16-x86.zip";
  ?>
    <td><a href= "https://imagemagick.org/archive//binaries/<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
    <td>Portable Win32 static at 16 bits-per-pixel component.  Just copy to your host and run (no installer, no Windows registry entries).</td>
  </tr>
I
  <tr>
  <?php $filename = "ImageMagick-" . MagickLibVersionText . MagickLibSubversion . "-portable-Q8-x64.zip";
  ?>
    <td><a href= "https://imagemagick.org/archive//binaries/<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
    <td>Portable Win64 static at 8 bits-per-pixel component.  Just copy to your host and run (no installer, no Windows registry entries).</td>
  </tr>

  <tr>
  <?php $filename = "ImageMagick-" . MagickLibVersionText . MagickLibSubversion . "-portable-Q8-x86.zip";
  ?>
    <td><a href= "https://imagemagick.org/archive//binaries/<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
    <td>Portable Win32 static at 8 bits-per-pixel component.  Just copy to your host and run (no installer, no Windows registry entries).</td>
  </tr>

  <tr>
  <?php $filename = "ImageMagick-" . MagickLibVersionText . MagickLibSubversion . "-portable-Q16-HDRI-x64.zip";
  ?>
    <td><a href= "https://imagemagick.org/archive//binaries/<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
    <td>Portable Win64 static at 16 bits-per-pixel component with <a href="<?php echo $_SESSION['RelativePath']?>/../script/high-dynamic-range.php">high dynamic-range imaging</a> enabled.  Just copy to your host and run (no installer, no Windows registry entries).</td>
  </tr>

  <tr>
  <?php $filename = "ImageMagick-" . MagickLibVersionText . MagickLibSubversion . "-portable-Q16-HDRI-x86.zip";
  ?>
    <td><a href= "https://imagemagick.org/archive//binaries/<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
    <td>Portable Win32 static at 16 bits-per-pixel component with <a href="<?php echo $_SESSION['RelativePath']?>/../script/high-dynamic-range.php">high dynamic-range imaging</a> enabled.  Just copy to your host and run (no installer, no Windows registry entries).</td>
  </tr>

  <tbody>
</table></div>

<p>Verify its <a href="https://imagemagick.org/archive//binaries/digest.rdf">message digest</a>.</p>

<p>It is strongly recommended to establish a <a href="<?php echo $_SESSION['RelativePath']?>/../script/security-policy.php">security policy</a> suitable for your local environment before utilizing ImageMagick.</p>

<p>To verify ImageMagick is working properly, type the following in an Command Prompt window:</p>

<pre class="bg-light text-dark mx-4"><code>convert logo: logo.gif
convert identify logo.gif
convert logo.gif win:</code></pre>

<p>If you have any problems, you likely need <code>vcomp140.dll</code>.  To install it, download <a href="https://support.microsoft.com/en-us/help/2977003/the-latest-supported-visual-c-downloads">Visual C++ Redistributable Package</a>.</p>

<p>Note, use a double quote (<code>"</code>) rather than a single quote (<code>'</code>) for the ImageMagick command line under Windows:</p>

<pre class="bg-light text-dark mx-4"><code>convert "e:/myimages/image.png" "e:/myimages/image.jpg"</code></pre>
<p>Use two double quotes for VBScript scripts:</p>
<pre class="bg-light text-dark mx-4"><code>Set objShell = wscript.createobject("wscript.shell")
objShell.Exec("convert ""e:/myimages/image.png"" ""e:/myimages/image.jpg""")</code></pre>

<p>Congratulations, you have a working ImageMagick distribution under Windows and you are ready to use ImageMagick to <a href="https://legacy.imagemagick.org/Usage/">convert, compose, or edit</a> your images or perhaps you'll want to use one of the <a href="<?php echo $_SESSION['RelativePath']?>/../script/develop.php">Application Program Interfaces</a> for C, C++, Perl, and others.</p>

</div>
