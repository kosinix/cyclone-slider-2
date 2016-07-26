<?php
namespace CycloneSlider\Grafika\DrawingObject;

use CycloneSlider\Grafika\Color;

/**
 * Base class
 * @package Grafika
 */
abstract class CubicBezier
{

    /**
     * Starting point. Array of X Y values.
     * @var array
     */
    protected $point1;

    /**
     * Control point 1. Array of X Y values.
     * @var array
     */
    protected $control1;

    /**
     * Control point 2. Array of X Y values.
     * @var array
     */
    protected $control2;

    /**
     * End point. Array of X Y values.
     * @var array
     */
    protected $point2;

    /**
     * Color of curve.
     *
     * @var Color
     */
    protected $color;

    /**
     * CubicBezier constructor.
     * @param $point1
     * @param $control1
     * @param $control2
     * @param $point2
     * @param Color $color
     */
    public function __construct($point1, $control1, $control2, $point2, Color $color)
    {

        $this->point1 = $point1;
        $this->control1 = $control1;
        $this->control2 = $control2;
        $this->point2 = $point2;
        $this->color = $color;

    }

    /**
     * @return array
     */
    public function getPoint1()
    {
        return $this->point1;
    }

    /**
     * @return array
     */
    public function getControl1()
    {
        return $this->control1;
    }

    /**
     * @return array
     */
    public function getControl2()
    {
        return $this->control2;
    }

    /**
     * @return array
     */
    public function getPoint2()
    {
        return $this->point2;
    }

    /**
     * @return Color
     */
    public function getColor()
    {
        return $this->color;
    }

}