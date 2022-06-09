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
namespace Kigkonsult\PhpIncExSdk;

use JsonException;
use RuntimeException;

/**
 * Class json
 *
 * Encapsulates json methods
 */
class Json
{
    /**
     * Encapsulates json method json_decode
     *
     * @param string $jsonString
     * @param null|int $flags    default JSON_OBJECT_AS_ARRAY | JSON_THROW_ON_ERROR
     * @return mixed
     * @throws RuntimeException
     */
    public static function jsonDecode(
        string $jsonString,
        ? int $flags = JSON_OBJECT_AS_ARRAY | JSON_THROW_ON_ERROR
    ) : mixed
    {
        try {
            $jsonArray     = json_decode( $jsonString, true, 512, $flags );
            $jsonLastError = json_last_error();
            if( JSON_ERROR_NONE !== $jsonLastError ) {
                throw new JsonException( json_last_error_msg(), $jsonLastError );
            }
        }
        catch( JsonException $e ) {
            throw new RuntimeException( $e->getMessage(), $e->getCode(), $e );
        }
        return $jsonArray;
    }

    /**
     * Encapsulates json method json_encode
     *
     * @param array $jsonArray
     * @param null|int $flags   default  JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR
     * @return string
     * @throws RuntimeException
     */
    public static function jsonEncode(
        array $jsonArray,
        ? int $flags = JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR
    ) : string
    {
        try {
            if( false === ( $jsonString = json_encode( $jsonArray, $flags ))) {
                throw new JsonException( json_last_error_msg(), json_last_error());
            }
        }
        catch( JsonException $e ) {
            throw new RuntimeException( $e->getMessage(), $e->getCode(), $e );
        }
        return $jsonString;
    }
}
