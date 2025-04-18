<div>
<p class="lead">There are copious amounts of extra data associated with images (metadata), beyond the actual image pixels. This metadata can be useful, either for display, or for various calculations, or in modifying the behavior of later image processing operations.  You can utilize percent escapes in a number of options, for example in <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#format_identify_">-format</a> or in montage <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#label" >-label</a>, to print various properties and other settings associated with an image.</p>

<div>
<table class="table table-hover table-striped">
<tr>
    <td><b>Profile Data</b></td>
    <td>Such as EXIF: data, containing focal lengths, exposures, dates, and in
        come cases GPS locations.
    </td></tr>
<tr>
    <td><b>Attributes</b></td>
    <td>These are directly involved with image data, and more commonly
        modified as part of normal image processing.  These include
        width, height, depth, image type (colorspace), timing delays, and
        background color. Most specific percent escapes is to access this
        information.
    </td></tr>
<tr>
    <td><b>Properties</b></td>
    <td>These are stored as a table of free form strings, and are (if possible)
        saved with the image (especially in MIFF and PNG image file formats).
        These include: Labels, Captions, Comments.
    </td></tr>
<tr>
    <td><b>Artifacts</b></td>
    <td>These are various operational (expert) settings that are saved for
        use by various operators, or by the user for future use.  It is just
        a table of free-form strings.  They are not saved with the image when
        written.  See Artifacts and Options below for details.
    </td></tr>
<tr>
    <td><b>Options</b></td>
    <td>Also operational (expert) settings that are saved for
        use by various operators, but are set globally for use by a whole
        image list (also not saved).  See Artifacts and Options below.
    </td></tr>
</table></div>

<h2>Percent Escape Handling</h2>

<p>If you request a percent escape such as <code>%[key]</code> the setting
is looked for in the following order until the first match has been
found...</p>

<ol>
<li>Handle special prefixes such as 'artifact:' 'option:' 'exif:', or
    'fx:'.  This includes and calculations and or globs of those prefixes such
    as 'exif:*' or 'artifact:*' (see below).</li>

<li>If <code>key</code> contains a glob pattern (but no known prefix)
    search free-form properties table.</li>

<li>If <code>key</code> is a special image 'attribute' name (see list
    above) return the associated or calculated image attribute.</li>

<li>Search for setting as a free-form 'property'</li>
<li>Search for setting as a free-form 'artifact'</li>
<li>Search for setting as a free-form 'option'</li>

<li>Replace escape with empty string, and perhaps produce a warning.</li>
</ol>

<p>Remember, all long name forms of percent escapes are handled in a is case
insensitive manner. </p>

<p><b>As of IM v6.8.0-5</b> you can now access the Artifact and Option
free-form string tables directly, allowing you to override the above sequence,
and avoid accessing an attribute or property of the same name.</p>

<pre class="bg-light text-dark mx-4"><code>%[artifact:<var>setting</var>]
%[option:<var>setting</var>]
</code></pre>

<p>Escape handling requires access to an image container.  If none are available, a blank image is created to ensure the expression can be processed and a value returned.  For example, <code>convert -print "%[fx:.8765/3.14]" null: null:</code>.</p>


<h2>Single Letter Attribute Percent Escapes</h2>

<p>Here are common single letter escapes (short form) is used to report the most
common attributes and properties of an image, such as: the image filename
filename, type, width, height. </p>

<div>
<table class="table table-sm table-hover table-striped table-responsive">
  <tr>
    <td>\</td>
    <td>backslash, the next character is literal and not subject to interpretation</td>
  </tr>
  <tr>
    <td>\n</td>
    <td>newline</td>
  </tr>
  <tr>
    <td>\r</td>
    <td>carriage return</td>
  </tr>
  <tr>
    <td>&lt;</td>
    <td>less-than character.</td>
  </tr>
  <tr>
    <td>&gt;</td>
    <td>greater-than character.</td>
  </tr>
  <tr>
    <td>&amp;</td>
    <td>ampersand character.</td>
  </tr>
  <tr>
    <td>%%</td>
    <td>a percent sign</td>
  </tr>
  <tr>
    <td>%b</td>
    <td>file size of image read in (use <a href="#precision">-precision</a> 16 to force results in B)</td>
  </tr>
  <tr>
    <td>%c</td>
    <td>comment meta-data property</td>
  </tr>
  <tr>
    <td>%d</td>
    <td>directory component of path</td>
  </tr>
  <tr>
    <td>%e</td>
    <td>filename extension or suffix</td>
  </tr>
  <tr>
    <td>%f</td>
    <td>filename (including suffix)</td>
  </tr>
  <tr>
    <td>%g</td>
    <td>layer canvas page geometry   (equivalent to "%Wx%H%X%Y")</td>
  </tr>
  <tr>
    <td>%h</td>
    <td>current image height in pixels</td>
  </tr>
  <tr>
    <td>%i</td>
    <td>image filename (note: becomes output filename for "info:")</td>
  </tr>
  <tr>
    <td>%k</td>
    <td>CALCULATED: number of unique colors</td>
  </tr>
  <tr>
    <td>%l</td>
    <td>label meta-data property</td>
  </tr>
  <tr>
    <td>%m</td>
    <td>image file format (file magic)</td>
  </tr>
  <tr>
    <td>%n</td>
    <td>number of images in current image sequence, reported once per frame</td>
  </tr>
  <tr>
    <td>%o</td>
    <td>output filename  (used for delegates)</td>
  </tr>
  <tr>
    <td>%p</td>
    <td>index of image in current image list</td>
  </tr>
  <tr>
    <td>%q</td>
    <td>quantum depth (compile-time constant)</td>
  </tr>
  <tr>
    <td>%r</td>
    <td>image class and colorspace</td>
  </tr>
  <tr>
    <td>%s</td>
    <td>scene number (from input unless re-assigned)</td>
  </tr>
  <tr>
    <td>%t</td>
    <td>filename without directory or extension (suffix)</td>
  </tr>
  <tr>
    <td>%u</td>
    <td>unique temporary filename (used for delegates)</td>
  </tr>
  <tr>
    <td>%w</td>
    <td>current width in pixels</td>
  </tr>
  <tr>
    <td>%x</td>
    <td>x resolution (density)</td>
  </tr>
  <tr>
    <td>%y</td>
    <td>y resolution (density)</td>
  </tr>
  <tr>
    <td>%z</td>
    <td>image depth (as read in unless modified, image save depth)</td>
  </tr>
  <tr>
    <td>%A</td>
    <td>image transparency channel enabled (true/false)</td>
  </tr>
  <tr>
    <td>%B</td>
    <td>file size of image read in bytes</td>
  </tr>
  <tr>
    <td>%C</td>
    <td>image compression type</td>
  </tr>
  <tr>
    <td>%D</td>
    <td>image GIF dispose method</td>
  </tr>
  <tr>
    <td>%G</td>
    <td>original image size (%wx%h; before any resizes)</td>
  </tr>
  <tr>
    <td>%H</td>
    <td>page (canvas) height</td>
  </tr>
  <tr>
    <td>%M</td>
    <td>Magick filename (original file exactly as given,  including read mods)</td>
  </tr>
  <tr>
    <td>%N</td>
    <td>number of images in current image sequence, reported once per image sequence</td>
  <tr>
    <td>%O</td>
    <td>page (canvas) offset ( = %X%Y )</td>
  </tr>
  <tr>
    <td>%P</td>
    <td>page (canvas) size ( = %Wx%H )</td>
  </tr>
  <tr>
    <td>%Q</td>
    <td>image compression quality ( 0 = default )</td>
  </tr>
  <tr>
    <td>%S</td>
    <td>?? scenes ??</td>
  </tr>
  <tr>
    <td>%T</td>
    <td>image time delay (in centi-seconds)</td>
  </tr>
  <tr>
    <td>%U</td>
    <td>image resolution units</td>
  </tr>
  <tr>
    <td>%W</td>
    <td>page (canvas) width</td>
  </tr>
  <tr>
    <td>%X</td>
    <td>page (canvas) x offset (including sign)</td>
  </tr>
  <tr>
    <td>%Y</td>
    <td>page (canvas) y offset (including sign)</td>
  </tr>
  <tr>
    <td>%Z</td>
    <td>unique filename (used for delegates)</td>
  </tr>
  <tr>
    <td>%@</td>
    <td>CALCULATED: trim bounding box (without actually trimming)</td>
  </tr>
  <tr>
    <td>%#</td>
    <td>CALCULATED: 'signature' hash of image values</td>
  </tr>
</table></div>

<p>Here is a sample command and its output for an image with filename
<code>bird.miff</code> and whose width is 512 and height is 480.</p>

<pre class="bg-light text-dark mx-4"><code>-> identify -format "%m:%f %wx%h" bird.miff
MIFF:bird.miff 512x480
</code></pre>

<p>Note that all single letter percent escapes can also be used using long
form (from IM version 6.7.6-9, see next). For example <code>%[f]</code> is
equivalent to the <code>%f</code> short form. </p>

<p><b>WARNING</b>: short form percent escapes are NOT performed when the percent
is after a number.  For example,  <code>10%x10</code> does not expand the
<code>%x</code> as a percent escape.  If you specifically want to expand the
'x', use the long form which overrides this special case. EG:
<code>10%[x]10</code>. </p>

<p>Also be warned that calculated attributes can take some time to generate,
especially for large images.</p>

<h2>Long Form Attribute Percent Escapes</h2>

<p>In addition to the above specific and calculated attributes are recognized
when enclosed in braces (long form):</p>

<div>
<table class="table table-sm table-hover table-striped table-responsive">
  <tr>
    <td>%[basename]</td>
    <td>base filename, no suffixes (as %t)</td>
  </tr>
  <tr>
    <td>%[bit-depth]</td>
    <td>Actual bit-depth of the pixel data</td>
  </tr>
  <tr>
    <td>%[bounding-box]</td>
    <td>upper left and lower right corners of the image bounding box</td>
  </tr>
  <tr>
    <td>%[caption]</td>
    <td>caption meta-data property</td>
  </tr>
   <tr>
    <td>%[caption:pointsize]</td>
    <td>returns the pointsize computed during caption: processing (as of IM 6.9.1-0)</td>
  </tr>
 <tr>
    <td>%[channels]</td>
    <td>??? channels in use - colorspace ???</td>
  </tr>
  <tr>
    <td>%[colorspace]</td>
    <td>colorspace of Image Data (excluding transparency)</td>
  </tr>
  <tr>
    <td>%[compose]</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>%[compression]</td>
    <td>image compression type (as of IM 6.9.6-6)</td>
  </tr>
  <tr>
    <td>%[copyright]</td>
    <td>ImageMagick Copyright String</td>
  </tr>
  <tr>
    <td>%[depth]</td>
    <td>depth of image for write (as input unless changed)</td>
  </tr>
  <tr>
    <td>%[deskew:angle]</td>
    <td>The deskew angle in degrees of rotation</td>
  </tr>
  <tr>
    <td>%[directory]</td>
    <td>directory part of filename (as %d)</td>
  </tr>
  <tr>
    <td>%[distortion]</td>
    <td>how well an image resembles a reference image (<a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#compare" >-compare</a>)</td>
  </tr>
  <tr>
    <td>%[entropy]</td>
    <td>CALCULATED: entropy of the image</td>
  </tr>
  <tr>
    <td>%[extension]</td>
    <td>extension part of filename (as %e)</td>
  </tr>
  <tr>
    <td>%[gamma]</td>
    <td>value of image gamma</td>
  </tr>
  <tr>
    <td>%[group]</td>
    <td>??? window group ???</td>
  </tr>
  <tr>
    <td>%[height]</td>
    <td>original height of image (when it was read in)</td>
  </tr>
  <tr>
    <td>%[input]</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>%[interlace]</td>
    <td>Image interlace mode (as of IM 6.9.6-6)</td>
  </tr>
  <tr>
    <td>%[kurtosis]</td>
    <td>CALCULATED: kurtosis statistic of image</td>
  </tr>
  <tr>
    <td>%[label]</td>
    <td>label meta-data property</td>
  </tr>
   <tr>
    <td>%[label:pointsize]</td>
    <td>returns the pointsize computed during label: processing (as of IM 6.9.1-0)</td>
  </tr>
  <tr>
    <td>%[magick]</td>
    <td>coder used to read image (not the file suffix)</td>
  </tr>
  <tr>
    <td>%[max]</td>
    <td>CALCULATED: maximum value statistic of image</td>
  </tr>
  <tr>
    <td>%[mean]</td>
    <td>CALCULATED: average value statistic of image</td>
  </tr>
  <tr>
    <td>%[min]</td>
    <td>CALCULATED: minimum value statistic of image</td>
  </tr>
  <tr>
    <td>%[opaque]</td>
    <td>CALCULATED: is image fully-opaque?</td>
  </tr>
  <tr>
    <td>%[orientation]</td>
    <td>image orientation</td>
  </tr>
  <tr>
    <td>%[page]</td>
    <td>Virtual canvas (page) geometry</td>
  </tr>
  <tr>
    <td>%[papersize:<em>name</em>]</td>
    <td>paper size for <em>name</em> in pixels at 72DPI (e.g. papersize:A4)</td>
  </tr>
  <tr>
    <td>%[printsize.x]</td>
    <td>X printsize</td>
  </tr>
  <tr>
    <td>%[printsize.y]</td>
    <td>Y printsize</td>
  </tr>
  <tr>
    <td>%[profile:icc]</td>
    <td>ICC profile info</td>
  </tr>
  <tr>
    <td>%[profile:icm]</td>
    <td>ICM profile info</td>
  </tr>
  <tr>
    <td>%[profiles]</td>
    <td>list of any embedded profiles</td>
  </tr>
  <tr>
    <td>%[quality]</td>
    <td>Image quality value (as of IM 6.9.6-6)</td>
  </tr>
  <tr>
    <td>%[rendering-intent]</td>
    <td>Image rendering intent (as of IM 6.9.6-6)</td>
  </tr>
  <tr>
    <td>%[resolution.x]</td>
    <td>X density (resolution) without units</td>
  </tr>
  <tr>
    <td>%[resolution.y]</td>
    <td>Y density (resolution) without units</td>
  </tr>
  <tr>
    <td>%[scene]</td>
    <td>original scene number of image in input file</td>
  </tr>
  <tr>
    <td>%[size]</td>
    <td>original size of image (when it was read in)</td>
  </tr>
  <tr>
    <td>%[skewness]</td>
    <td>CALCULATED: skewness statistic of image</td>
  </tr>
  <tr>
    <td>%[standard-deviation]</td>
    <td>CALCULATED: standard deviation statistic of image</td>
  </tr>
  <tr>
    <td>%[type]</td>
    <td>CALCULATED: image type</td>
  </tr>
  <tr>
    <td>%[unique]</td>
    <td>unique temporary filename ???</td>
  </tr>
  <tr>
    <td>%[units]</td>
    <td>image resolution units</td>
  </tr>
  <tr>
    <td>%[version]</td>
    <td>Version Information of this running ImageMagick</td>
  </tr>
  <tr>
    <td>%[width]</td>
    <td>original width of image (when it was read in)</td>
  </tr>
  <tr>
    <td>%[zero]</td>
    <td>zero (unique filename for delegate use)</td>
  </tr>
</table></div>

<h2>Properties</h2>

<p>All other long forms of percent escapes (not single letter long form) are
handled in a case insensitive manner. Such escapes will attempt to look
up that name specific data sources. </p>

<p>The primary search space (if not a specific attribute listed above) is
a free-form property string.  Such strings are associated and saved with
images, and are typically set using either the <a href="<?php echo
$_SESSION['RelativePath']?>/../script/command-line-options.php#set" >-set</a>
CLI option (or API equivalent), or from special convenience options
(such as <a href="<?php echo
$_SESSION['RelativePath']?>/../script/command-line-options.php#label"
>-label</a>, <a href="<?php echo
$_SESSION['RelativePath']?>/../script/command-line-options.php#comment"
>-comment</a>, <a href="<?php echo
$_SESSION['RelativePath']?>/../script/command-line-options.php#caption"
>-caption</a>). </p>

<p>These convenience options are globally saved (as 'global options' so thay can
be set before images are read), and later are transferred to the property of
individual images, only when they are read in. At that time any internal
percent escape present is then handled. </p>

<p>To change a property of an image already in memory, you need to use <a
href="<?php echo
$_SESSION['RelativePath']?>/../script/command-line-options.php#set" >-set</a>.
</p>

<p>Note that properties, like attributes (and profiles), are saved with
images when write, if the image file format allows. </p>


<h2>Artifacts and Options</h2>

<p>The previous percent escapes are associated with the primary Attributes and
Properties. Which is the original and primary focus of such percent escapes.
</p>

<p>However there are many operational settings that are used by various
ImageMagick operators that can be useful to set and later access.  These
consist of per-image Artifacts, and Global options (associated with a list of
images, typically the current image list).</p>

<p>Note that the major difference between an artifact and a property is that
artifacts, being an internal operational setting, is not saved with images (if
such is possible). </p>

<p>For example when you use <code>-define 'distort:viewport=100x100'</code> you
are in fact generating a global option, which the <a href="<?php echo
$_SESSION['RelativePath']?>/../script/command-line-options.php#distort"
>-distort</a> operator will use to modify its behavior (distorted output
image 'view'). </p>

<p>An Option is essentially an Artifact that has been stored globally as part
of a list of images (specifically a 'Wand' of images). As such they are
identical, in that a Option, is simply a global Artifact for all the
associated images. </p>

<p>As such you can use <code>-set 'option:distort:viewport' '100x100'</code> to
achieve the same result of setting a Artifact for the disort operation to use.
</p>

<p><b>Internal Handling of a Global Option...</b></p>

<p>The Core library ('MagickCore') does not generally directly understand
Global Options. As such, continuing the previous example, the
<code>DistortImages()</code> function only looks up an artifact to discover if
a 'viewport' has been provided to it. </p>

<p>How Global Options are used when a library function requests an Artifact is
one of the key differences between IMv6 and IMv7.</p>

<p>Before each operator, any global Options
are copied to per-image Artifacts, for every image in the current image list.
This allows various operators to find its operational 'defines' or Artifacts.
</p>

<p>Note that many API's that do not use Wands (PerlMagick for example using
arrays of images rather than a Wand). In these API's you will not have Global
Options, only per-image Artifacts. </p>

<p>In summery a Global Option, if available, is equivalent to a per-image
Artifact. </p>


<h2>Glob-Pattern Listing of Properties, Artifacts and Options</h2>

<p>The <var>setting</var> can contain a glob pattern. As such you can
now list all free-form string properties, artifacts, and options, (but not
specific image attributes) using...</p>

<pre class="bg-light text-dark mx-4"><code>convert ... \
   -print "__Properties__\n%[*]" \
   -print "__Artifacts__\n%[artifact:*]" \
   -print "__Options__\n%[option:*]" \
   ...
</code></pre>

<p> The format of glob patterns are very specific and as such is generally
only used to list specific settings, such as when debugging, rather than being
used for image processing use. </p>


<h2>Calculated Percent Escape Prefixes</h2>

<p>There are some special prefixes (before the first ':') which performs
calculations based on the user provided string that follows that prefix.  For
example you can do a numerical calculation use <code>%[fx:...]</code> to
evaluate the given <a href="<?php echo
$_SESSION['RelativePath']?>/../script/fx.php">FX</a> expressions:</p>

<pre class="bg-light text-dark mx-4"><code>%[fx:<var>expression</var>]
</code></pre>

<p>Use <code>pixel:</code> or <code>hex:</code> to evaluate a pixel color as defined by the <a
href="<?php echo $_SESSION['RelativePath']?>/../script/fx.php">FX</a>
expression:</p>

<pre class="bg-light text-dark mx-4"><code>%[pixel:<var>expression</var>]
</code></pre>

<p>Use <a href="<?php echo $_SESSION['RelativePath']?>/../script/command-line-options.php#define">-define</a> to specify the color compliance (e.g. <code>-define pixel:compliance=css</code>)</p>.

<h2>Specific Profile Percent Escape Prefixes</h2>

<p>You can also use the following special formatting syntax to print EXIF
mage meta-data that was included in the image read in:</p>

<pre class="bg-light text-dark mx-4"><code>%[EXIF:<var>tag</var>]
</code></pre>

<p>Choose <var>tag</var> from the following:</p>

<pre class="pre-scrollable bg-light text-dark mx-4"><code>
*  (print all EXIF tags, in keyword=data format)
!  (print all EXIF tags, in tag_number data format)
#hhhh (print data for EXIF tag #hhhh)
ImageWidth
ImageLength
BitsPerSample
Compression
PhotometricInterpretation
FillOrder
DocumentName
ImageDescription
Make
Model
StripOffsets
Orientation
SamplesPerPixel
RowsPerStrip
StripByteCounts
XResolution
YResolution
PlanarConfiguration
ResolutionUnit
TransferFunction
Software
DateTime
Artist
WhitePoint
PrimaryChromaticities
TransferRange
JPEGProc
JPEGInterchangeFormat
JPEGInterchangeFormatLength
YCbCrCoefficients
YCbCrSubSampling
YCbCrPositioning
ReferenceBlackWhite
CFARepeatPatternDim
CFAPattern
BatteryLevel
Copyright
ExposureTime
FNumber
IPTC/NAA
EXIFOffset
InterColorProfile
ExposureProgram
SpectralSensitivity
GPSInfo
ISOSpeedRatings
OECF
EXIFVersion
DateTimeOriginal
DateTimeDigitized
ComponentsConfiguration
CompressedBitsPerPixel
ShutterSpeedValue
ApertureValue
BrightnessValue
ExposureBiasValue
MaxApertureValue
SubjectDistance
MeteringMode
LightSource
Flash
FocalLength
MakerNote
UserComment
SubSecTime
SubSecTimeOriginal
SubSecTimeDigitized
FlashPixVersion
ColorSpace
EXIFImageWidth
EXIFImageLength
InteroperabilityOffset
FlashEnergy
SpatialFrequencyResponse
FocalPlaneXResolution
FocalPlaneYResolution
FocalPlaneResolutionUnit
SubjectLocation
ExposureIndex
SensingMethod
FileSource
SceneType
</code></pre>
<br/>
<p>Surround the format specification with quotation marks to prevent your
shell from misinterpreting any spaces and square brackets.</p>

<p>The following special formatting syntax can be used to print IPTC
information contained in the file:</p>

<pre class="bg-light text-dark mx-4"><code>%[IPTC:<var>dataset</var>:<var>record</var>]
</code></pre>

<p>Select <var>dataset</var> and <var>record</var> from the following:</p>

<pre class="pre-scrollable bg-light text-dark:">
  Envelope Record
  1:00  Model Version
  1:05  Destination
  1:20  File Format
  1:22  File Format Version
  1:30  Service Identifier
  1:40  Envelope Number
  1:50  Product ID
  1:60  Envelope Priority
  1:70  Date Sent
  1:80  Time Sent
  1:90  Coded Character Set
  1:100  UNO (Unique Name of Object)
  1:120  ARM Identifier
  1:122  ARM Version

Application Record
  2:00  Record Version
  2:03  Object Type Reference
  2:05  Object Name (Title)
  2:07  Edit Status
  2:08  Editorial Update
  2:10  Urgency
  2:12  Subject Reference
  2:15  Category
  2:20  Supplemental Category
  2:22  Fixture Identifier
  2:25  Keywords
  2:26  Content Location Code
  2:27  Content Location Name
  2:30  Release Date
  2:35  Release Time
  2:37  Expiration Date
  2:38  Expiration Time
  2:40  Special Instructions
  2:42  Action Advised
  2:45  Reference Service
  2:47  Reference Date
  2:50  Reference Number
  2:55  Date Created
  2:60  Time Created
  2:62  Digital Creation Date
  2:63  Digital Creation Time
  2:65  Originating Program
  2:70  Program Version
  2:75  Object Cycle
  2:80  By-Line (Author)
  2:85  By-Line Title (Author Position) [Not used in Photoshop 7]
  2:90  City
  2:92  Sub-Location
  2:95  Province/State
  2:100  Country/Primary Location Code
  2:101  Country/Primary Location Name
  2:103  Original Transmission Reference
  2:105  Headline
  2:110  Credit
  2:115  Source
  2:116  Copyright Notice
  2:118  Contact
  2:120  Caption/Abstract
  2:122  Caption Writer/Editor
  2:125  Rasterized Caption
  2:130  Image Type
  2:131  Image Orientation
  2:135  Language Identifier
  2:150  Audio Type
  2:151  Audio Sampling Rate
  2:152  Audio Sampling Resolution
  2:153  Audio Duration
  2:154  Audio Outcue
  2:200  ObjectData Preview File Format
  2:201  ObjectData Preview File Format Version
  2:202  ObjectData Preview Data

Pre-ObjectData Descriptor Record
  7:10   Size Mode
  7:20   Max Subfile Size
  7:90   ObjectData Size Announced
  7:95   Maximum ObjectData Size

ObjectData Record
  8:10   Subfile

Post ObjectData Descriptor Record
  9:10   Confirmed ObjectData Size
</code></pre>
</div>
