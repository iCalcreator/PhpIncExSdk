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
namespace Kigkonsult\PhpIncExSdk\Json;

use Exception;
use Kigkonsult\PhpIncExSdk\Dto\DomainData as Dto;

class DomainData implements JsonInterface
{
    /**
     * Parse json array to populate new DomainData
     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     * @throws Exception
     */
    public static function parse( array $jsonArray ) : Dto
    {
        $dto = new Dto();

        if( isset( $jsonArray[self::SYSTEM_STATUS] )) {
            $dto->setSystemStatus( $jsonArray[self::SYSTEM_STATUS] );
        }
        if( isset( $jsonArray[self::EXT_SYSTEM_STATUS] )) {
            $dto->setExtSystemStatus( $jsonArray[self::EXT_SYSTEM_STATUS] );
        }
        if( isset( $jsonArray[self::DOMAIN_STATUS] )) {
            $dto->setDomainStatus( $jsonArray[self::DOMAIN_STATUS] );
        }
        if( isset( $jsonArray[self::EXT_DOMAIN_STATUS] )) {
            $dto->setExtDomainStatus( $jsonArray[self::EXT_DOMAIN_STATUS] );
        }
        if( isset( $jsonArray[self::OBSERVABLE_ID] )) {
            $dto->setObservableId( $jsonArray[self::OBSERVABLE_ID] );
        }
        if( isset( $jsonArray[self::NAME] )) {
            $dto->setName( $jsonArray[self::NAME] );
        }
        if( isset( $jsonArray[self::DATEDOMAINWASCHECKED] )) {
            $dto->setDateDomainWasChecked( $jsonArray[self::DATEDOMAINWASCHECKED] );
        }
        if( isset( $jsonArray[self::REGISTRATIONDATE] )) {
            $dto->setRegistrationDate( $jsonArray[self::REGISTRATIONDATE] );
        }
        if( isset( $jsonArray[self::EXPIRATIONDATE] )) {
            $dto->setExpirationDate( $jsonArray[self::EXPIRATIONDATE] );
        }
        if( isset( $jsonArray[self::RELATEDDNS] )) {
            foreach( $jsonArray[self::RELATEDDNS] as $subJsonArray ) {
                $dto->addRelatedDNS( ExtensionType::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::NAMESERVERS] )) {
            foreach( $jsonArray[self::NAMESERVERS] as $subJsonArray ) {
                $dto->addNameservers( Nameservers::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::DOMAINCONTACTS] )) {
            $dto->setDomainContacts( DomainContacts::parse( $jsonArray[self::DOMAINCONTACTS] ));
        }

        return $dto;
    }

    /**
     * Write DomainData Dto properties to json array
     *
     * @param Dto $dto
     * @return object
     */
    public static function write( Dto $dto ) : object
    {
        $jsonArray = [];

        if( $dto->isSystemStatusSet()) {
            $jsonArray[self::SYSTEM_STATUS] = $dto->getSystemStatus();
        }
        if( $dto->isExtSystemStatusSet()) {
            $jsonArray[self::EXT_SYSTEM_STATUS] = $dto->getExtSystemStatus();
        }
        if( $dto->isDomainStatusSet()) {
            $jsonArray[self::DOMAIN_STATUS] = $dto->getDomainStatus();
        }
        if( $dto->isExtDomainStatusSet()) {
            $jsonArray[self::EXT_DOMAIN_STATUS] = $dto->getExtDomainStatus();
        }
        if( $dto->isObservableIdSet()) {
            $jsonArray[self::OBSERVABLE_ID] = $dto->getObservableId();
        }
        if( $dto->isNameSet()) {
            $jsonArray[self::NAME] = $dto->getName();
        }
        if( $dto->isDateDomainWasCheckedSet()) {
            $jsonArray[self::DATEDOMAINWASCHECKED] = $dto->getDateDomainWasChecked();
        }
        if( $dto->isRegistrationDateSet()) {
            $jsonArray[self::REGISTRATIONDATE] = $dto->getRegistrationDate();
        }
        if( $dto->isExpirationDateSet()) {
            $jsonArray[self::EXPIRATIONDATE] = $dto->getExpirationDate();
        }
        if( $dto->isRelatedDNSSet()) {
            $jsonArray[self::RELATEDDNS] = [];
            foreach( $dto->getRelatedDNS() as $item ) {
                $jsonArray[self::RELATEDDNS][] = ExtensionType::write( $item );
            }
        }
        if( $dto->isNameserversSet()) {
            $jsonArray[self::NAMESERVERS] = [];
            foreach( $dto->getNameservers() as $item ) {
                $jsonArray[self::NAMESERVERS][] = Nameservers::write( $item );
            }
        }
        if( $dto->isDomainContactsSet()) {
            $jsonArray[self::DOMAINCONTACTS] = DomainContacts::write( $dto->getDomainContacts());
        }

        return (object) $jsonArray;
    }
}
