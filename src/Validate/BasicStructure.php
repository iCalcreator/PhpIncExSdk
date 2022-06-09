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

use Kigkonsult\PhpIncExSdk\Dto\BasicStructure as Dto;

class BasicStructure extends ValidateBase
{
    /**
     * BasicStructure
     *
     * @param Dto $dto
     * @param array|null $result
     * @param string|null $upper
     * @return bool
     */
    public static function check( Dto $dto, ?array & $result = [], ?string $upper = '' ) : bool
    {
        static $NEEDLESS = 'needless';
        $return = true;

        if( ! $dto->isRequiredSet()) { // i.e SpecID
            $return = false;
            self::updResultWithReqPropname( $upper, self::SPEC_ID, $result );
        }
        if(( self::PRIVATE === $dto->getSpecId()) && ! $dto->isExtSpecIdSet()) {
            //  note remark in interface
            $return = false;
            $key    = self::getKey(  $upper, self::EXT_SPECID );
            $result[$key] = self::$REQUIRED;
        }
        elseif(( self::PRIVATE !== $dto->getSpecId()) && $dto->isExtSpecIdSet()) {
            $return = false;
            $key    = self::getKey(  $upper, self::EXT_SPECID );
            $result[$key] = $NEEDLESS;
        }

        if( $dto->isReferenceSet()) {
            $key    = self::getKey(  $upper, self::REFERENCE );
            foreach( $dto->getReference() as $x => $item ) {
                if( false === Reference::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }
        return $return;
    }
}
