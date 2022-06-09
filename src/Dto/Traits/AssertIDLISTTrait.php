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
namespace Kigkonsult\PhpIncExSdk\Dto\Traits;

use InvalidArgumentException;

trait AssertIDLISTTrait
{
    /**
     * Assert IDLIST format
     *
     * @param string $propName
     * @param null|string $idList
     * @return void
     */
    public function assertIDLIST( string $propName, ? string $idList ) : void
    {
        static $PATTERN = "/[a-zA-Z_][a-zA-Z0-9_.-]*/";
        static $ERRMSG  = 'Invalid IDLIST format %s::%s : %s';
        if( ! empty( $idList ) && ( 1 !== preg_match( $PATTERN, $idList ))) {
            throw new InvalidArgumentException(
                sprintf( $ERRMSG, static::class, $propName, $idList )
            );
        }
    }
}
