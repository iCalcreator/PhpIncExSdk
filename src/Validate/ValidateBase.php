<?php

namespace Kigkonsult\PhpIncExSdk\Validate;

abstract class ValidateBase implements ValidateInterface
{
    /**
     * @var string
     */
    protected static string $PROPLIST = ':propList';

    /**
     * @var string
     */
    protected static string $REQUIRED = 'required';

    /**
     * @var string
     */
    protected static string $ONEREQUIRED = 'At least one of %s required';

    /**
     * Return new 'upper' based on opt previously set upper and (local) class (FQCN)
     *
     * @param null|string $upper
     * @return string
     */
    protected static function getClassUpper( ? string $upper = '' ) : string
    {
        static $NEEDLE = '\\';
        $fqcn  = static::class;
        $class = ( $pos = strrpos( $fqcn, $NEEDLE )) ? substr( $fqcn, $pos + 1 ) : $fqcn;
        return empty( $upper )
            ? $class
            : $upper . DIRECTORY_SEPARATOR . $class;
    }

    /**
     * @param array $list
     * @return string
     */
    protected static function implodeList( array $list ) : string
    {
        static $COMMA    = ',';
        return implode( $COMMA,$list );
    }

    /**
     * Update result with the required propName
     *
     * @param string $upper
     * @param string $propName
     * @param null|array $result
     */
    protected static function updResultWithReqPropname( string $upper, string $propName, ? array & $result = [] ) : void
    {
        $key          = self::getKey(  $upper, $propName );
        $result[$key] = self::$REQUIRED;
    }

    /**
     * @param string $upper
     * @param string $propName
     * @return string
     */
    protected static function getKey( string $upper, string $propName ) : string
    {
        static $COLON    = ':';
        return $upper . $COLON . $propName;
    }

    /**
     * @param string $key
     * @param int $index
     * @return string
     */
    protected static function getKeyIxd( string $key, int $index ) : string
    {
        static $IXF = '%s(%d)';
        return sprintf( $IXF, $key, $index );
    }

    /**
     * @param string|null $attr
     * @param bool $extAttrSet
     * @param int|null $errExt
     * @return int
     */
    protected static function extAttrOk( ? string $attr, bool $extAttrSet, ? int & $errExt = 0 ) : int
    {
        $return     = true;
        $errExt     = 0;
        $attrSetExt = ( self::EXT_VALUE === $attr );
        if( $attrSetExt && ! $extAttrSet ) {
            $return = false;
            $errExt = 1;
        }
        elseif( ! $attrSetExt && $extAttrSet ) {
            $return = false;
            $errExt = 2;
        }
        return $return;
    }

    /**
     * Update result with the incorrect use of ext-<attribute>
     *
     * @param string $upper
     * @param string $propName
     * @param int  $errExt
     * @param null|array $result
     */
    protected static function updResultWithErrExtUse(
        string $upper,
        string $propName,
        int $errExt,
        ? array & $result = []
    ) : void
    {
        static $ERR1  = 'Required (attribute) due to %s == \'ext-value\'';
        static $ERR2  = 'Misuse of (attribute) due to %s != \'ext-value\'';
        static $EXT   ='ext-';
        $key          = self::getKey(  $upper, $EXT . $propName );
        $fmt          = ( 1 === $errExt ) ? $ERR1 : $ERR2;
        $result[$key] = sprintf( $fmt, $propName );
    }
}
