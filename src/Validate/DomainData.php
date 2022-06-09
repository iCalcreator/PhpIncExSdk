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

use Kigkonsult\PhpIncExSdk\Dto\DomainData as Dto;

class DomainData extends ValidateBase
{
    /**
     * DomainData
     *
     * @param Dto $dto
     * @param array|null $result
     * @param string|null $upper
     * @return bool
     */
    public static function check( Dto $dto, ?array & $result = [], ?string $upper = '' ) : bool
    {
        $return = true;
        $upper  = self::getClassUpper( $upper );

        if( ! $dto->isRequiredSet()) {
            $return = false;
            if( ! $dto->isSystemStatusSet()) {
                self::updResultWithReqPropname( $upper, self::SYSTEM_STATUS, $result );
            }
            if( ! $dto->isDomainStatusSet()) {
                self::updResultWithReqPropname( $upper, self::DOMAIN_STATUS, $result );
            }
            if( ! $dto->isNameSet()) {
                self::updResultWithReqPropname( $upper, self::NAME, $result );
            }
        }
        if( ! self::extAttrOk( $dto->getSystemStatus(), $dto->isExtSystemStatusSet(), $errExt )) {
            $return = false;
            self::updResultWithErrExtUse( $upper, self::SYSTEM_STATUS, $errExt, $result );
        }
        if( ! self::extAttrOk( $dto->getDomainStatus(), $dto->isExtDomainStatusSet(), $errExt )) {
            $return = false;
            self::updResultWithErrExtUse( $upper, self::DOMAIN_STATUS, $errExt, $result );
        }

        if( $dto->isRelatedDNSSet()) {
            $key    = self::getKey(  $upper, self::RELATEDDNS );
            foreach( $dto->getRelatedDNS() as $x => $item ) {
                if( false === ExtensionType::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isNameserversSet()) {
            $key    = self::getKey(  $upper, self::NAMESERVERS );
            foreach( $dto->getNameservers() as $x => $item ) {
                if( false === Nameservers::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }
        if( $dto->isDomainContactsSet() &&
            ( false === DomainContacts::check(
                $dto->getDomainContacts(),
                $result,
                self::getKey(  $upper, self::DOMAINCONTACTS )))) {
            $return = false;
        }

        return $return;
    }
}
