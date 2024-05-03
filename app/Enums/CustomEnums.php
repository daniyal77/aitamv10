<?php

namespace App\Enums;


use Illuminate\Support\Arr;

trait CustomEnums
{
    private array $attributes = [];
    private array $consts = [];
    protected array $translations = [];
    protected static array $singleton = [];

    public static function singelton()
    {
        $class = get_called_class();
        if (!isset(static::$singleton[$class])) {
            static::$singleton[$class] = (new $class);
        }
        return static::$singleton[$class];
    }

    function __construct()
    {
        $class = get_called_class();
        // Gets const's
        $reflect = new \ReflectionClass($class);
        $this->consts = $reflect->getConstants();
        // fill translation variable
        if (method_exists($this, 'translations'))
            $this->translations = (array)$this->translations();
        // fill cusses
        if (method_exists($this, 'attributes'))
            $this->attributes = (array)$this->attributes();
    }

    /**
     * Gets All list
     *
     * @return array
     */
    public static function all(): array
    {
        $list = [];
        foreach (self::singelton()->consts as $name => $val) {
            $list[$name] = [
                'title' => self::singelton()->translate($val),
                'html'  => self::singelton()->translate($val, true),
                'value' => $val
            ];
        }
        return $list;
    }

    /**
     * Gets All list except
     *
     * @param array $except
     *
     * @return array
     */
    public static function except(array $except = []): array
    {
        return Arr::except(self::all(), (array)$except);
    }

    /**
     * Gets list only
     *
     * @param array $only
     *
     * @return array
     */
    public static function only(array $only = []): array
    {
        return Arr::only(self::all(), (array)$only);
    }

    /**
     * Gets label list
     *
     * @param array     $except
     * @param bool|bool $html
     *
     * @return array
     */
    public static function getLabels(bool $html = false): array
    {
        $list = [];
        foreach (self::singelton()->consts as $name => $const)
            $list[$const] = self::singelton()->translate($const, $html);
        return $list;
    }

    public static function getLabel($const, $html = false)
    {
        return self::singelton()->translate($const, $html);
    }

    public static function getLabelList($html = false): array
    {
        return self::getLabels($html);
    }

    /**
     * Gets label list Exceptional
     *
     * @param array     $except
     * @param bool|bool $html
     *
     * @return array
     */
    public static function getLabelsExcept(array $except = [], bool $html = false): array
    {
        return Arr::except(self::getLabels($html), (array)$except);
    }

    /**
     * Gets the constatns list mentioned in first parameter
     *
     * @param array      $only
     * @param bool|false $style
     *
     * @return array
     */
    public static function getLabelsOnly(array $only = [], $html = false): array
    {
        return Arr::only(self::getLabels($html), (array)$only);
    }

    /**
     * Gets constants list
     *
     * @return array
     */
    public static function getConstants()
    {
        return array_keys(self::singelton()->consts);
    }

    /**
     * Gets constants list
     *
     * @param array $except
     *
     * @return array
     */
    public static function getConstantsExcept(array $except = []): array
    {
        return array_keys(Arr::except(self::singelton()->consts, (array)$except));
    }

    /**
     * Gets constans slug list
     *
     * @return array
     */
    public static function getSlugs(): array
    {
        $list = [];
        foreach (self::getConstants() as $const)
            $list[$const] = str_uslug($const);
        return $list;
    }

    /**
     * Gets constans slug list
     *
     * @param array $except
     *
     * @return array
     */
    public static function getSlugsExcept(array $except = []): array
    {
        return Arr::except(self::getSlugs(), (array)$except);
    }

    /**
     * Finds constant related to given style
     *
     * @param $slug
     *
     * @return mixed
     */
    public static function getConstBySlug($slug)
    {
        foreach (self::singelton()->consts as $name => $const) {
            if (str_uslug($const) == $slug)
                return $const;
        }
    }

    /**
     * Checks whether the given constant exists
     *
     * @param            $name
     * @param bool|bool  $strict
     *
     * @return bool
     */
    public static function exists($name, bool $strict = false): bool
    {
        $constants = self::singelton()->consts;
        if ($strict) {
            return array_key_exists($name, $constants);
        }
        $keys = array_map('strtolower', array_keys($constants));
        return in_array(strtolower($name), $keys);
    }

    /**
     * Checks whether the given value exists
     *
     * @param $value
     *
     * @return bool
     */
    public static function valueExists($value): bool
    {
        $values = array_values(self::singelton()->consts);
        return in_array($value, $values, true);
    }

    /**
     * Translates constants
     *
     * @param            $const
     * @param bool|bool  $html
     *
     * @return null|string
     */
    function translate($const, bool $html = false): ?string
    {
        $label = null;

        if ($const) {
            if (isset($this->translations[$const]))
                $label = $this->translations[$const];
            if ($html) {
                // fill attributes
                $attrs = null;
                if (isset($this->attributes [$const]))
                    $attrs = html_attributes($this->attributes[$const]);
                return "<label{$attrs}>$label</label>";
            }
        }

        return $label;
    }

    static function getConstantsArrayValue()
    {
        return self::singelton()->consts;
    }

    static function optionList($key='id',$value='value',$choice=true){
        $list = [];
        if($choice)
            $list[]=[$key => null, $value => 'انتخاب کنید'];

        foreach (self::getLabelList() as $k => $v) {
            $list[] = [$key => $k, $value => $v];
        }

        return $list;
    }
}
