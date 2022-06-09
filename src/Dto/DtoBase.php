<?php
/**
 * PhpIncExSdk is the PHP SDK implementation of rfc8727,
 *            JSON Binding of the Incident Object Description Exchange Format (rfc7970)
 *
 * This file is a part of PhpIncExSdk.
 *
 * @author    Kjell-Inge Gustafsson, kigkonsult <ical@kigkonsult.se>
 * @copyright 2022 Kjell-Inge Gustafsson, kigkonsult, All rights reserved
 * @link      https://kigkonsult.se
 * @license   Subject matter of licence is the software PhpIncExSdk.
 *            The above copyright, link, package and this licence notice shall
 *            be included in all copies or substantial portions of the PhpIncExSdk.
 *
 *            PhpIncExSdk is free software: you can redistribute it and/or modify
 *            it under the terms of the GNU Lesser General Public License as
 *            published by the Free Software Foundation, either version 3 of
 *            the License, or (at your option) any later version.
 *
 *            PhpIncExSdk is distributed in the hope that it will be useful,
 *            but WITHOUT ANY WARRANTY; without even the implied warranty of
 *            MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *            GNU Lesser General Public License for more details.
 *
 *            You should have received a copy of the GNU Lesser General Public License
 *            along with PhpIncExSdk. If not, see <https://www.gnu.org/licenses/>.
 */
declare( strict_types = 1 );
namespace Kigkonsult\PhpIncExSdk\Dto;

use DateTime;
use Exception;

abstract class DtoBase implements DtoInterface
{
    /**
     * Factory method
     *
     * @return static
     */
    public static function factory() : static
    {
        return new static();
    }

    /**
     * Return an unique GUID v4 string
     *
     * @return string
     * @throws Exception
     * @see https://www.php.net/manual/en/function.com-create-guid.php#117893
     */
    public static function createGUID() : string
    {
        static $FMT = '%s%s-%s-%s-%s-%s%s%s';
        $bytes      = random_bytes( 16 );
        $bytes[6]   = chr( ord( $bytes[6] ) & 0x0f | 0x40 ); // set version to 0100
        $bytes[8]   = chr( ord( $bytes[8] ) & 0x3f | 0x80 ); // set bits 6-7 to 10
        return vsprintf( $FMT, str_split( bin2hex( $bytes ), 4 ));
    }

    /**
     * @param DateTime $dateTime
     * @return string
     */
    protected static function getDateTimeString( DateTime $dateTime ) : string
    {
        static $dateTimeFMT = 'Y-m-d\TH:i:s';
        return $dateTime->format( $dateTimeFMT ) . self::secondsToOffset( $dateTime->getOffset());
    }

    /**
     * Return DateTime offset as [-/+]hh:mm[ss] (string) from UTC offset seconds OR 'Z' if UTC
     *
     * @param int $offset
     * @return string
     */
    public static function secondsToOffset( int $offset ) : string
    {
        static $MINUS = '-';
        static $PLUS  = '+';
        static $Z     = 'Z';
        static $COLON = ':';
        static $FMT   = '%02d';
        $offset2      = (string) $offset;
        switch( $offset2[0] ) {
            case $MINUS :
                $output = $MINUS;
                $offset = (int) substr( $offset2, 1 );
                break;
            case $PLUS :
                $offset = (int) substr( $offset2, 1 );
                // fall through
            default :
                $output = $PLUS;
                break;
        } // end switch
        if( empty( $offset )) {
            return $Z;
        }
        $output .= sprintf( $FMT, ((int) floor( $offset / 3600 ))); // hour
        $seconds = $offset % 3600;
        $output .= $COLON . sprintf( $FMT, ((int) floor( $seconds / 60 )));   // min
        /* NOT accepted by PHP 'new DateTime( YY-MM.DDTHH:II:SS-hh:II)', tzcorrection as [+-] hh ":"? II?
        $seconds %= 60;
        if( 0 < $seconds ) {
            $output .= $COLON . sprintf( $FMT, $seconds ); // sec
        }
        */
        return $output;
    }
}
