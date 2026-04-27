<?php
if (!isset($_SESSION) || !is_array($_SESSION)) {
  header("Location: ../script/index.php");
  exit();
}
?>
<div>
<h1 class="text-center">Download</h1>
<p class="text-center"><a href="#linux">Linux Binary Release</a> • <a href="#macosx">Mac OS X Binary Release</a> • <a href="#windows">Windows Binary Release</a></p>

<p class="lead">You can install ImageMagick from <a href="<?php echo $_SESSION['RelativePath']?>/../script/install-source.php">source</a>.  However, if you don't have a proper development environment or if you're anxious to get started, download a ready-to-run <a href="#linux">Linux</a> or <a href="#windows">Windows</a> executable.  Before you download, you may want to review recent <a href="https://github.com/ImageMagick/Website6/blob/main/ChangeLog.md">changes</a> to the ImageMagick distribution.</p>

<p>ImageMagick source and binary distributions are available from a variety of FTP and Web <a href="<?php echo $_SESSION['RelativePath']?>/../script/mirror.php">mirrors</a> around the world.</p>

<p>It is strongly recommended to establish a <a href="<?php echo $_SESSION['RelativePath']?>/../script/security-policy.php">security policy</a> suitable for your local environment before utilizing ImageMagick.</p>

<h2><a class="anchor" id="linux"></a>Linux Binary Release</h2>

<p>We do not provide binary releases for linux, try installing from <a href="<?php echo $_SESSION['RelativePath']?>/../script/install-source.php">source</a>. Although ImageMagick runs fine on a single core computer, it automagically runs in parallel on multi-core systems reducing run times considerably. ImageMagick recommended practices <b>strongly</b> encourage you to configure a <a href="<?php echo $_SESSION['RelativePath']?>/../script/security-policy.php">security policy</a> that suits your local environment.</p>

<h2><a class="anchor" id="macosx"></a>Mac OS X Binary Release</h2>

<p>We recommend <a href="https://brew.sh">Homebrew</a> which provides pre-built binaries for Mac (some users prefer <a href="https://macports.org">MacPorts</a>).  Download HomeBrew and type:</p>

<pre class="bg-light text-dark mx-4"><code>brew install imagemagick</code></pre>

<p>ImageMagick depends on Ghostscript fonts.  To install them, type:</p>

<pre class="bg-light text-dark mx-4"><code>brew install ghostscript</code></pre>

<p>The <code>brew</code> command downloads and installs ImageMagick with many of its delegate libraries (e.g. JPEG, PNG, Freetype, etc).  Homebrew <a href="https://github.com/Homebrew/homebrew-core/issues/31510">no longer allows</a> configurable builds; if you need different compile options (e.g. librsvg support), you will need to build from source.

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
    <td><<a href= "<?php echo MagickReleaseUrl . 'ImageMagick-' . MagickVersion . '-Q16-HDRI-x64-dll.exe' ?>"><?php echo 'ImageMagick-' . MagickVersion . '-Q16-HDRI-x64-dll.exe'; ?></a></td>
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
   <td><<a href= "<?php echo MagickReleaseUrl . 'ImageMagick-' . MagickVersion . '-Q16-x64-static.exe' ?>"><?php echo 'ImageMagick-' . MagickVersion . '-Q16-x64-static.exe'; ?></a></td>
   <td>Win64 static at 16 bits-per-pixel component</td>
  </tr>

  <tr>
    <td><<a href= "<?php echo MagickReleaseUrl . 'ImageMagick-' . MagickVersion . '-Q8-x64-dll.exe' ?>"><?php echo 'ImageMagick-' . MagickVersion . '-Q8-x64-dll.exe'; ?></a></td>
   <td>Win64 dynamic at 8 bits-per-pixel component</td>
  </tr>

  <tr>
    <td><<a href= "<?php echo MagickReleaseUrl . 'ImageMagick-' . MagickVersion . '-Q8-x64-static.exe' ?>"><?php echo 'ImageMagick-' . MagickVersion . '-Q8-x64-static.exe'; ?></a></td>
    <td>Win64 static at 8 bits-per-pixel component</td>
  </tr>

  <tr>
    <td><<a href= "<?php echo MagickReleaseUrl . 'ImageMagick-' . MagickVersion . '-Q16-x64-dll.exe' ?>"><?php echo 'ImageMagick-' . MagickVersion . '-Q16-x64-dll.exe'; ?></a></td>
   <td>Win64 dynamic at 16 bits-per-pixel component</td>
  </tr>

  <tr>
    <td><<a href= "<?php echo MagickReleaseUrl . 'ImageMagick-' . MagickVersion . '-Q16-HDRI-x64-dll.exe' ?>"><?php echo 'ImageMagick-' . MagickVersion . '-Q16-HDRI-x64-dll.exe'; ?></a></td>
    <td>Win64 dynamic at 16 bits-per-pixel component with <a href="<?php echo $_SESSION['RelativePath']?>/../script/high-dynamic-range.php">high dynamic-range imaging</a> enabled</td>
  </tr>

  <tr>
    <td><<a href= "<?php echo MagickReleaseUrl . 'ImageMagick-' . MagickVersion . '-Q16-HDRI-x64-static.exe' ?>"><?php echo 'ImageMagick-' . MagickVersion . '-Q16-HDRI-x64-static.exe'; ?></a></td>
    <td>Win64 static at 16 bits-per-pixel component with <a href="<?php echo $_SESSION['RelativePath']?>/../script/high-dynamic-range.php">high dynamic-range imaging</a> enabled</td>
  </tr>

  <tr>
    <td><<a href= "<?php echo MagickReleaseUrl . 'ImageMagick-' . MagickVersion . '-Q16-x86-dll.exe' ?>"><?php echo 'ImageMagick-' . MagickVersion . '-Q16-x86-dll.exe'; ?></a></td>
    <td>Win32 dynamic at 16 bits-per-pixel component</td>
  </tr>

  <tr>
    <td><<a href= "<?php echo MagickReleaseUrl . 'ImageMagick-' . MagickVersion . '-Q16-x86-static.exe' ?>"><?php echo 'ImageMagick-' . MagickVersion . '-Q16-x86-static.exe'; ?></a></td>
    <td>Win32 static at 16 bits-per-pixel component</td>
  </tr>

  <tr>
    <td><<a href= "<?php echo MagickReleaseUrl . 'ImageMagick-' . MagickVersion . '-Q8-x86-dll.exe' ?>"><?php echo 'ImageMagick-' . MagickVersion . '-Q8-x86-dll.exe'; ?></a></td>
    <td>Win32 dynamic at 8 bits-per-pixel component</td>
  </tr>

  <tr>
    <td><<a href= "<?php echo MagickReleaseUrl . 'ImageMagick-' . MagickVersion . '-Q8-x86-static.exe' ?>"><?php echo 'ImageMagick-' . MagickVersion . '-Q8-x86-static.exe'; ?></a></td>
    <td>Win32 static at 8 bits-per-pixel component</td>
  </tr>

  <tr>
    <td><<a href= "<?php echo MagickReleaseUrl . 'ImageMagick-' . MagickVersion . '-Q16-HDRI-x86-dll.exe' ?>"><?php echo 'ImageMagick-' . MagickVersion . '-Q16-HDRI-x86-dll.exe'; ?></a></td>
    <td>Win32 dynamic at 16 bits-per-pixel component with <a href="<?php echo $_SESSION['RelativePath']?>/../script/high-dynamic-range.php">high dynamic-range imaging</a> enabled</td>
  </tr>

  <tr>
    <td><<a href= "<?php echo MagickReleaseUrl . 'ImageMagick-' . MagickVersion . '-Q16-HDRI-x86-static.exe' ?>"><?php echo 'ImageMagick-' . MagickVersion . '-Q16-HDRI-x86-static.exe'; ?></a></td>
    <td>Win32 static at 16 bits-per-pixel component with <a href="<?php echo $_SESSION['RelativePath']?>/../script/high-dynamic-range.php">high dynamic-range imaging</a> enabled</td>
  </tr>

  <tr>
    <td><<a href= "<?php echo MagickReleaseUrl . 'ImageMagick-' . MagickVersion . '-portable-Q16-x64.7z' ?>"><?php echo 'ImageMagick-' . MagickVersion . '-portable-Q16-x64.7z'; ?></a></td>
    <td>Portable Win64 static at 16 bits-per-pixel component.  Just copy to your host and run (no installer, no Windows registry entries).</td>
  </tr>

  <tr>
    <td><<a href= "<?php echo MagickReleaseUrl . 'ImageMagick-' . MagickVersion . '-portable-Q16-x86.7z' ?>"><?php echo 'ImageMagick-' . MagickVersion . '-portable-Q16-x86.7z'; ?></a></td>
    <td>Portable Win32 static at 16 bits-per-pixel component.  Just copy to your host and run (no installer, no Windows registry entries).</td>
  </tr>
I
  <tr>
    <td><<a href= "<?php echo MagickReleaseUrl . 'ImageMagick-' . MagickVersion . '-portable-Q8-x64.7z' ?>"><?php echo 'ImageMagick-' . MagickVersion . '-portable-Q8-x64.7z'; ?></a></td>
    <td>Portable Win64 static at 8 bits-per-pixel component.  Just copy to your host and run (no installer, no Windows registry entries).</td>
  </tr>

  <tr>
    <td><<a href= "<?php echo MagickReleaseUrl . 'ImageMagick-' . MagickVersion . '-portable-Q8-x86.7z' ?>"><?php echo 'ImageMagick-' . MagickVersion . '-portable-Q8-x86.7z'; ?></a></td>
    <td>Portable Win32 static at 8 bits-per-pixel component.  Just copy to your host and run (no installer, no Windows registry entries).</td>
  </tr>

  <tr>
    <td><<a href= "<?php echo MagickReleaseUrl . 'ImageMagick-' . MagickVersion . '-portable-Q16-HDRI-x64.7z' ?>"><?php echo 'ImageMagick-' . MagickVersion . '-portable-Q16-HDRI-x64.7z'; ?></a></td>
    <td>Portable Win64 static at 16 bits-per-pixel component with <a href="<?php echo $_SESSION['RelativePath']?>/../script/high-dynamic-range.php">high dynamic-range imaging</a> enabled.  Just copy to your host and run (no installer, no Windows registry entries).</td>
  </tr>

  <tr>
    <td><<a href= "<?php echo MagickReleaseUrl . 'ImageMagick-' . MagickVersion . '-portable-Q16-HDRI-x86.7z' ?>"><?php echo 'ImageMagick-' . MagickVersion . '-portable-Q16-HDRI-x86.7z'; ?></a></td>
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
