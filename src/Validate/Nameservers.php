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
namespace Kigkonsult\PhpIncExSdk\Validate;

use Kigkonsult\PhpIncExSdk\Dto\Nameservers as Dto;

class Nameservers extends ValidateBase
{
    /**
     * Nameservers
     *
     * @param Dto $dto
     * @param array|null $result
     * @param string|null $upper
     * @return bool
     */
    public static function check( Dto $dto, ? array & $result = [], ? string $upper = '' ) : bool
    {
        $return = true;
        $upper  = self::getClassUpper( $upper );

        if( ! $dto->isRequiredSet()) {
            $return = false;
            if( ! $dto->isServerSet()) {
                self::updResultWithReqPropname( $upper, self::SERVER, $result );
            }
            if( ! $dto->isAddressSet()) {
                self::updResultWithReqPropname( $upper, self::ADDRESS, $result );
            }
        }

        if( $dto->isAddressSet()) {
            $key = self::getKey(  $upper, self::ADDRESS );
            foreach( $dto->getAddress() as $x => $item ) {
                if( false === Address::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        return $return;
    }
}