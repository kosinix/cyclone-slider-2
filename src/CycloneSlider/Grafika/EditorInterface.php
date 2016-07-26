<?php
namespace CycloneSlider\Grafika;

/**
 * Interface EditorInterface
 * @package Grafika
 */
interface EditorInterface {

    /**
     * Apply an effect to the image. See Effects section for a list of effects to apply.
     *
     * @param EffectInterface $effect
     *
     * @return $this
     */
    public function apply( $effect );

    /**
     * Creates a cubic bezier. Cubic bezier has 2 control points.
     * @param array $point1 Array of X and Y value for start point.
     * @param array $control1 Array of X and Y value for control point 1.
     * @param array $control2 Array of X and Y value for control point 2.
     * @param array $point2 Array of X and Y value for end point.
     * @param Color|string $color Color of the curve. Accepts hex string or a Color object. Defaults to black.
     * @return EditorInterface An instance of image editor.
     */
    public function bezierCubic($point1, $control1, $control2, $point2, $color = '#000000');

    /**
     * Creates a quadratic bezier. Quadratic bezier has 1 control point.
     * @param array $point1 Array of X and Y value for start point.
     * @param array $control Array of X and Y value for control point.
     * @param array $point2 Array of X and Y value for end point.
     * @param Color|string $color Color of the curve. Accepts hex string or a Color object. Defaults to black.
     * @return EditorInterface An instance of image editor.
     */
    public function bezierQuad($point1, $control, $point2, $color = '#000000');
    
    /**
     * Create a blank image given width and height.
     *
     * @param int $width Width of image in pixels.
     * @param int $height Height of image in pixels.
     *
     * @return EditorInterface An instance of image editor.
     */
    public function blank( $width, $height );

    /**
     * Compare two images and returns a hamming distance. A value of 0 indicates a likely similar picture. A value between 1 and 10 is potentially a variation. A value greater than 10 is likely a different image.
     *
     * @param string|ImageInterface $image1 Can be an instance of Image or string containing the file system path to image.
     * @param string|ImageInterface $image2 Can be an instance of Image or string containing the file system path to image.
     *
     * @return int Hamming distance. Note: This breaks the chain if you are doing fluent api calls as it does not return an Editor.
     * @throws \Exception
     */
    public function compare( $image1, $image2 );

    /**
     * Crop the image to the given dimension and position.
     *
     * @param int $cropWidth Crop width in pixels.
     * @param int $cropHeight Crop Height in pixels.
     * @param int|string $cropX The number of pixels from the left of the image. This parameter can be a number or any of the words "left", "center", "right".
     * @param int|string $cropY The number of pixels from the top of the image. This parameter can be a number or any of the words "top", "center", "bottom".
     *
     * @return EditorInterface An instance of image editor.
     */
    public function crop( $cropWidth, $cropHeight, $cropX='center', $cropY='center');

    /**
     * Dither image using Floyd-Steinberg algorithm. Dithering will reduce the color to black and white and add noise.
     * @return EditorInterface An instance of image editor.
     */
    public function dither();

    /**
     * Draw a DrawingObject on the image. See Drawing Objects section.
     *
     * @param DrawingObjectInterface $drawingObject
     *
     * @return EditorInterface An instance of image editor.
     */
    public function draw( $drawingObject );

    /**
     * Creates an ellipse.
     *
     * @param int $width Width of ellipse in pixels.
     * @param int $height Height of ellipse in pixels.
     * @param array $pos Array containing int X and int Y position of the ellipse from top left of the canvass.
     * @param int $borderSize Size of the border in pixels. Defaults to 1 pixel. Set to 0 for no border.
     * @param Color|string|null $borderColor Border color. Defaults to black. Set to null for no color.
     * @param Color|string|null $fillColor Fill color. Defaults to white. Set to null for no color.
     * 
     * @return EditorInterface An instance of image editor.
     */
    public function ellipse($width, $height, array $pos, $borderSize = 1, $borderColor = '#000000', $fillColor = '#FFFFFF');

    /**
     * Compare if two images are equal. It will compare if the two images are of the same width and height. If the dimensions differ, it will return false. If the dimensions are equal, it will loop through each pixels. If one of the pixel don't match, it will return false. The pixels are compared using their RGB (Red, Green, Blue) values.
     *
     * @param string|ImageInterface $image1 Can be an instance of Image or string containing the file system path to image.
     * @param string|ImageInterface $image2 Can be an instance of Image or string containing the file system path to image.
     *
     * @return bool True if equals false if not. Note: This breaks the chain if you are doing fluent api calls as it does not return an Editor.
     * @throws \Exception
     */
    public function equal( $image1, $image2 );
    
    /**
     * Fill entire image with color.
     *
     * @param Color $color An instance of Grafika\Color class.
     * @param int $x X-coordinate of start point.
     * @param int $y Y-coordinate of start point.
     *
     * @return EditorInterface An instance of image editor.
     */
    public function fill( $color, $x = 0, $y = 0 );

    /**
     * Free the current image clearing resources associated with it.
     */
    public function free();

    /**
     * Converts image to grayscale.
     *
     * @return EditorInterface An instance of image editor.
     */
    public function grayscale();

    /**
     * Alias for grayscale.
     *
     * @return EditorInterface An instance of image editor.
     */
    public function greyscale();

    /**
     * Get image instance.
     *
     * @return ImageInterface An instance of image.
     */
    public function getImage();

    /**
     * Checks the PHP install if the editor is available.
     *
     * @return bool True if available false if not.
     */
    public function isAvailable();

    /**
     * Creates a line.
     *
     * @param array $point1 Array containing int X and int Y position of the starting point.
     * @param array $point2 Array containing int X and int Y position of the starting point.
     * @param int $thickness Thickness in pixel. Note: This is currently ignored in GD editor and falls back to 1.
     * @param Color|string $color Color of the line. Defaults to black.
     * 
     * @return EditorInterface An instance of image editor.
     */
    public function line(array $point1, array $point2, $thickness = 1, $color = '#000000');

    /**
     * Change the image opacity.
     *
     * @param float $opacity The opacity level where 1.0 is fully opaque and 0.0 is fully transparent.
     *
     * @return EditorInterface An instance of image editor.
     */
    public function opacity( $opacity );

    /**
     * Opens an image file for manipulation specified by $target.
     *
     * @param mixed $target Can be an instance of Image or a string containing file system path to the image.
     *
     * @return EditorInterface An instance of image editor.
     */
    public function open( $target );

    /**
     * Open an image by passing an instance of Image.
     *
     * @param ImageInterface $image
     *
     * @return $this
     */
    public function openImage( $image );

    /**
     * Open an image by passing a file system path.
     *
     * @param string $file A full path to the image in the file system.
     *
     * @return $this
     * @throws \Exception
     */
    public function openFile( $file );

    /**
     * Overlay an image on top of the current image.
     *
     * @param ImageInterface|string $overlay Can be a string containing a file path of the image to overlay or an Image object.
     * @param string|int $xPos Horizontal position of image. Can be 'left','center','right' or integer number. Defaults to 'center'.
     * @param string|int $yPos Vertical position of image. Can be 'top', 'center','bottom' or integer number. Defaults to 'center'.
     * @param null $width Width of overlay in pixels.
     * @param null $height Height of overlay in pixels.
     *
     * @return EditorInterface An instance of image editor.
     */
    public function overlay( $overlay, $xPos = 'center', $yPos = 'center', $width = null, $height = null );

    /**
     * Creates a polygon.
     *
     * @param array $points Array of all X and Y positions. Must have at least three positions.
     * @param int $borderSize Size of the border in pixels. Defaults to 1 pixel. Set to 0 for no border.
     * @param Color|string|null $borderColor Border color. Defaults to black. Set to null for no color.
     * @param Color|string|null $fillColor Fill color. Defaults to white. Set to null for no color.
     *
     * @return EditorInterface An instance of image editor.
     */
    public function polygon($points, $borderSize = 1, $borderColor = '#000000', $fillColor = '#FFFFFF');

    /**
     * Creates a rectangle.
     * @param int $width Width of rectangle in pixels.
     * @param int $height Height in pixels.
     * @param array $pos Array of X and Y position. X is the distance in pixels from the left of the canvass to the left of the rectangle. Y is the distance from the top of the canvass to the top of the rectangle. Defaults to array(0,0).
     * @param int $borderSize Size of the border in pixels. Defaults to 1 pixel. Set to 0 for no border.
     * @param Color|string|null $borderColor Border color. Defaults to black. Set to null for no color.
     * @param Color|string|null $fillColor Fill color. Defaults to white. Set to null for no color.
     *
     * @return EditorInterface An instance of image editor.
     */
    public function rectangle($width, $height, $pos = array(0, 0), $borderSize = 1, $borderColor = '#000000', $fillColor = '#FFFFFF');
    
    /**
     * Wrapper function for the resizeXXX family of functions. Resize an image to a given width, height and mode.
     *
     * @param int $newWidth Width in pixels.
     * @param int $newHeight Height in pixels.
     * @param string $mode Resize mode. Possible values: "exact", "exactHeight", "exactWidth", "fill", "fit".
     *
     * @return EditorInterface An instance of image editor.
     */
    public function resize( $newWidth, $newHeight, $mode='fit' );

    /**
     * Resize image to exact dimensions ignoring aspect ratio. Useful if you want to force exact width and height.
     *
     * @param int $newWidth Width in pixels.
     * @param int $newHeight Height in pixels.
     *
     * @return EditorInterface An instance of image editor.
     */
    public function resizeExact( $newWidth, $newHeight );

    /**
     * Resize image to exact height. Width is auto calculated. Useful for creating row of images with the same height.
     *
     * @param int $newHeight Height in pixels.
     *
     * @return EditorInterface An instance of image editor.
     */
    public function resizeExactHeight( $newHeight );

    /**
     * Resize image to exact width. Height is auto calculated. Useful for creating column of images with the same width.
     *
     * @param int $newWidth Width in pixels.
     *
     * @return EditorInterface An instance of image editor.
     */
    public function resizeExactWidth( $newWidth );

    /**
     * Resize image to fill all the space in the given dimension. Excess parts are cropped.
     *
     * @param int $newWidth Width in pixels.
     * @param int $newHeight Height in pixels.
     *
     * @return EditorInterface An instance of image editor.
     */
    public function resizeFill( $newWidth, $newHeight );

    /**
     * Resize an image to fit within the given width and height. The re-sized image will not exceed the given dimension. Useful if you want to preserve the aspect ratio.
     *
     * @param int $newWidth Width in pixels.
     * @param int $newHeight Width in pixels.
     *
     * @return EditorInterface An instance of image editor.
     */
    public function resizeFit( $newWidth, $newHeight );

    /**
     * Rotate an image counter-clockwise.
     *
     * @param int $angle The angle in degrees.
     * @param Color|null $color The Color object containing the background color.
     *
     * @return EditorInterface An instance of image editor.
     */
    public function rotate( $angle, $color = null );

    /**
     * Save the image to an image format.
     *
     * @param string $file File path where to save the image.
     * @param null|string $type Type of image. Can be null, "GIF", "PNG", or "JPEG". If null, an appropriate file type will be used.
     * @param null|string $quality Quality of image. Applies to JPEG only. Accepts number 0 - 100 where 0 is lowest and 100 is the highest quality. Or null for default.
     * @param bool $interlace Set to true for progressive JPEG. Applies to JPEG only.
     *
     * @return EditorInterface An instance of image editor.
     */
    public function save( $file, $type = null, $quality = null, $interlace = false );

    /**
     * Set image instance.
     *
     * @param ImageInterface $image An instance of a class implementing Grafika/ImageInterface.
     */
    public function setImage( $image );

    /**
     * Write text to image.
     *
     * @param string $text The text to be written.
     * @param int $size The font size. Defaults to 12.
     * @param int $x The distance from the left edge of the image to the left of the text. Defaults to 0.
     * @param int $y The distance from the top edge of the image to the baseline of the text. Defaults to 12 (equal to font size) so that the text is placed within the image.
     * @param Color $color The Color object. Default text color is black.
     * @param string $font Full path to font file. If blank, will default to Liberation Sans font.
     * @param int $angle Angle of text from 0 - 359. Defaults to 0.
     *
     * @return EditorInterface An instance of image editor.
     * @throws \Exception
     */
    public function text( $text, $size = 12, $x = 0, $y = 12, $color = null, $font = '', $angle = 0 );

}