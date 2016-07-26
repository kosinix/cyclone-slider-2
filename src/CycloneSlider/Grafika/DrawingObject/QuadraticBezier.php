<?php
namespace CycloneSlider\Grafika\DrawingObject;

use CycloneSlider\Grafika\Color;

/**
 * Base class
 * @package Grafika
 */
abstract class QuadraticBezier
{

    /**
     * Starting point.
     * @var array
     */
    protected $point1;

    /**
     * Control point.
     * @var array
     */
    protected $control;

    /**
     * End point.
     * @var array
     */
    protected $point2;

    /**
     * Color of curve.
     *
     * @var Color
     */
    protected $color;

    public function __construct($point1, $control, $point2, $color = null)
    {

        $this->point1 = $point1;
        $this->control = $control;
        $this->point2 = $point2;
        $this->color = $color;
        if (null === $color) {
            $this->color = new Color('#000000');
        } else {
            if (is_string($color)) {
                $this->color = new Color($color);
            }
        }
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
    public function getControl()
    {
        return $this->control;
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