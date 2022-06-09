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

use Kigkonsult\PhpIncExSdk\Dto\Contact as Dto;

class Contact implements JsonInterface
{
    /**
     * Parse json array to populate new Contact
     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     */
    public static function parse( array $jsonArray ) : Dto
    {
        $dto = new Dto();

        if( isset( $jsonArray[self::ROLE] )) {
            $dto->setRole( $jsonArray[self::ROLE] );
        }
        if( isset( $jsonArray[self::EXT_ROLE] )) {
            $dto->setExtRole( $jsonArray[self::EXT_ROLE] );
        }
        if( isset( $jsonArray[self::TYPE] )) {
            $dto->setType( $jsonArray[self::TYPE] );
        }
        if( isset( $jsonArray[self::EXT_TYPE] )) {
            $dto->setExtType( $jsonArray[self::EXT_TYPE] );
        }
        if( isset( $jsonArray[self::RESTRICTION] )) {
            $dto->setRestriction( $jsonArray[self::RESTRICTION] );
        }
        if( isset( $jsonArray[self::EXT_RESTRICTION] )) {
            $dto->setExtRestriction( $jsonArray[self::EXT_RESTRICTION] );
        }
        if( isset( $jsonArray[self::CONTACTNAME] )) {
            foreach( $jsonArray[self::CONTACTNAME] as $subJsonArray ) {
                $dto->addContactName( MLStringType::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::CONTACTTITLE] )) {
            foreach( $jsonArray[self::CONTACTTITLE] as $subJsonArray ) {
                $dto->addContactTitle( MLStringType::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::DESCRIPTION] )) {
            foreach( $jsonArray[self::DESCRIPTION] as $subJsonArray ) {
                $dto->addDescription( MLStringType::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::REGISTRYHANDLE] )) {
            foreach( $jsonArray[self::REGISTRYHANDLE] as $subJsonArray ) {
                $dto->addRegistryHandle( RegistryHandle::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::POSTALADDRESS] )) {
            foreach( $jsonArray[self::POSTALADDRESS] as $subJsonArray ) {
                $dto->addPostalAddress( PostalAddress::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::EMAIL] )) {
            foreach( $jsonArray[self::EMAIL] as $subJsonArray ) {
                $dto->addEmail( Email::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::TELEPHONE] )) {
            foreach( $jsonArray[self::TELEPHONE] as $subJsonArray ) {
                $dto->addTelephone( Telephone::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::TIMEZONE] )) {
            $dto->setTimezone( $jsonArray[self::TIMEZONE] );
        }
        if( isset( $jsonArray[self::CONTACT] )) {
            foreach( $jsonArray[self::CONTACT] as $subJsonArray ) {
                $dto->addContact( self::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::ADDITIONALDATA] )) {
            foreach( $jsonArray[self::ADDITIONALDATA] as $subJsonArray ) {
                $dto->addAdditionalData( ExtensionType::parse( $subJsonArray ));
            }
        }

        return $dto;
    }

    /**
     * Write Contact Dto properties to json array
     *
     * @param Dto $dto
     * @return object
     */
    public static function write( Dto $dto ) : object
    {
        $jsonArray = [];

        if( $dto->isRoleSet()) {
            $jsonArray[self::ROLE] = $dto->getRole();
        }
        if( $dto->isExtRoleSet()) {
            $jsonArray[self::EXT_ROLE] = $dto->getExtRole();
        }
        if( $dto->isTypeSet()) {
            $jsonArray[self::TYPE] = $dto->getType();
        }
        if( $dto->isExtTypeSet()) {
            $jsonArray[self::EXT_TYPE] = $dto->getExtType();
        }
        if( $dto->isRestrictionSet()) {
            $jsonArray[self::RESTRICTION] = $dto->getRestriction();
        }
        if( $dto->isExtRestrictionSet()) {
            $jsonArray[self::EXT_RESTRICTION] = $dto->getExtRestriction();
        }
        if( $dto->isContactNameSet()) {
            $jsonArray[self::CONTACTNAME] = [];
            foreach( $dto->getContactName() as $item ) {
                $jsonArray[self::CONTACTNAME][] = MLStringType::write( $item );
            }
        }
        if( $dto->isContactTitleSet()) {
            $jsonArray[self::CONTACTTITLE] = [];
            foreach( $dto->getContactTitle() as $item ) {
                $jsonArray[self::CONTACTTITLE][] = MLStringType::write( $item );
            }
        }
        if( $dto->isDescriptionSet()) {
            $jsonArray[self::DESCRIPTION] = [];
            foreach( $dto->getDescription() as $item ) {
                $jsonArray[self::DESCRIPTION][] = MLStringType::write( $item );
            }
        }
        if( $dto->isRegistryHandleSet()) {
            $jsonArray[self::REGISTRYHANDLE] = [];
            foreach( $dto->getRegistryHandle() as $item ) {
                $jsonArray[self::REGISTRYHANDLE][] = RegistryHandle::write( $item );
            }
        }
        if( $dto->isPostalAddressSet()) {
            $jsonArray[self::POSTALADDRESS] = [];
            foreach( $dto->getPostalAddress() as $item ) {
                $jsonArray[self::POSTALADDRESS][] = PostalAddress::write( $item );
            }
        }
        if( $dto->isEmailSet()) {
            $jsonArray[self::EMAIL] = [];
            foreach( $dto->getEmail() as $item ) {
                $jsonArray[self::EMAIL][] = Email::write( $item );
            }
        }
        if( $dto->isTelephoneSet()) {
            $jsonArray[self::TELEPHONE] = [];
            foreach( $dto->getTelephone() as $item ) {
                $jsonArray[self::TELEPHONE][] = Telephone::write( $item );
            }
        }
        if( $dto->isTimezoneSet()) {
            $jsonArray[self::TIMEZONE] = $dto->getTimezone();
        }
        if( $dto->isContactSet()) {
            $jsonArray[self::CONTACT] = [];
            foreach( $dto->getContact() as $item ) {
                $jsonArray[self::CONTACT][] = self::write( $item );
            }
        }
        if( $dto->isAdditionalDataSet()) {
            $jsonArray[self::ADDITIONALDATA] = [];
            foreach( $dto->getAdditionalData() as $item ) {
                $jsonArray[self::ADDITIONALDATA][] = ExtensionType::write( $item );
            }
        }

        return (object) $jsonArray;
    }
}
