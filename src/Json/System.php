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
use Kigkonsult\PhpIncExSdk\Dto\System as Dto;

class System implements JsonInterface
{
    /**
     * Parse json array to populate new System
     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     * @throws Exception
     */
    public static function parse( array $jsonArray ) : Dto
    {
        $dto = new Dto();

        if( isset( $jsonArray[self::CATEGORY] )) {
            $dto->setCategory( $jsonArray[self::CATEGORY] );
        }
        if( isset( $jsonArray[self::EXT_CATEGORY] )) {
            $dto->setExtCategory( $jsonArray[self::EXT_CATEGORY] );
        }
        if( isset( $jsonArray[self::INTERFACE] )) {
            $dto->setInterface( $jsonArray[self::INTERFACE] );
        }
        if( isset( $jsonArray[self::SPOOFED] )) {
            $dto->setSpoofed( $jsonArray[self::SPOOFED] );
        }
        if( isset( $jsonArray[self::VIRTUAL] )) {
            $dto->setVirtual( $jsonArray[self::VIRTUAL] );
        }
        if( isset( $jsonArray[self::OWNERSHIP] )) {
            $dto->setOwnership( $jsonArray[self::OWNERSHIP] );
        }
        if( isset( $jsonArray[self::EXT_OWNERSHIP] )) {
            $dto->setExtOwnership( $jsonArray[self::EXT_OWNERSHIP] );
        }
        if( isset( $jsonArray[self::RESTRICTION] )) {
            $dto->setRestriction( $jsonArray[self::RESTRICTION] );
        }
        if( isset( $jsonArray[self::EXT_RESTRICTION] )) {
            $dto->setExtRestriction( $jsonArray[self::EXT_RESTRICTION] );
        }
        if( isset( $jsonArray[self::NODE] )) {
            $dto->setNode( Node::parse( $jsonArray[self::NODE] ));
        }
        if( isset( $jsonArray[self::NODEROLE] )) {
            foreach( $jsonArray[self::NODEROLE] as $subJsonArray ) {
                $dto->addNodeRole( NodeRole::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::SERVICE] )) {
            foreach( $jsonArray[self::SERVICE] as $subJsonArray ) {
                $dto->addService( Service::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::OPERATINGSYSTEM] )) {
            foreach( $jsonArray[self::OPERATINGSYSTEM] as $subJsonArray ) {
                $dto->addOperatingSystem( SoftwareType::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::COUNTER] )) {
            foreach( $jsonArray[self::COUNTER] as $subJsonArray ) {
                $dto->addCounter( Counter::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::ASSETID] )) {
            foreach( $jsonArray[self::ASSETID] as $sub ) {
                $dto->addAssetID( $sub );
            }
        }
        if( isset( $jsonArray[self::DESCRIPTION] )) {
            foreach( $jsonArray[self::DESCRIPTION] as $subJsonArray ) {
                $dto->addDescription( MLStringType::parse( $subJsonArray ));
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
     * Write System Dto properties to json array
     *
     * @param Dto $dto
     * @return object
     */
    public static function write( Dto $dto ) : object
    {
        $jsonArray = [];

        if( $dto->isCategorySet()) {
            $jsonArray[self::CATEGORY] = $dto->getCategory();
        }
        if( $dto->isExtCategorySet()) {
            $jsonArray[self::EXT_CATEGORY] = $dto->getExtCategory();
        }
        if( $dto->isInterfaceSet()) {
            $jsonArray[self::INTERFACE] = $dto->getInterface();
        }
        if( $dto->isSpoofedSet()) {
            $jsonArray[self::SPOOFED] = $dto->getSpoofed();
        }
        if( $dto->isVirtualSet()) {
            $jsonArray[self::VIRTUAL] = $dto->getVirtual();
        }
        if( $dto->isOwnershipSet()) {
            $jsonArray[self::OWNERSHIP] = $dto->getOwnership();
        }
        if( $dto->isExtOwnershipSet()) {
            $jsonArray[self::EXT_OWNERSHIP] = $dto->getExtOwnership();
        }
        if( $dto->isRestrictionSet()) {
            $jsonArray[self::RESTRICTION] = $dto->getRestriction();
        }
        if( $dto->isExtRestrictionSet()) {
            $jsonArray[self::EXT_RESTRICTION] = $dto->getExtRestriction();
        }
        if( $dto->isNodeSet()) {
            $jsonArray[self::NODE] = Node::write( $dto->getNode() );
        }
        if( $dto->isNodeRoleSet()) {
            $jsonArray[self::NODEROLE] = [];
            foreach( $dto->getNodeRole() as $item ) {
                $jsonArray[self::NODEROLE][] = NodeRole::write( $item );
            }
        }
        if( $dto->isServiceSet()) {
            $jsonArray[self::SERVICE] = [];
            foreach( $dto->getService() as $item ) {
                $jsonArray[self::SERVICE][] = Service::write( $item );
            }
        }
        if( $dto->isOperatingSystemSet()) {
            $jsonArray[self::OPERATINGSYSTEM] = [];
            foreach( $dto->getOperatingSystem() as $item ) {
                $jsonArray[self::OPERATINGSYSTEM][] = SoftwareType::write( $item );
            }
        }
        if( $dto->isCounterSet()) {
            $jsonArray[self::COUNTER] = [];
            foreach( $dto->getCounter() as $item ) {
                $jsonArray[self::COUNTER][] = Counter::write( $item );
            }
        }
        if( $dto->isAssetIDSet()) {
            $jsonArray[self::ASSETID] = [];
            foreach( $dto->getAssetID() as $item ) {
                $jsonArray[self::ASSETID][] = $item;
            }
        }
        if( $dto->isDescriptionSet()) {
            $jsonArray[self::DESCRIPTION] = [];
            foreach( $dto->getDescription() as $item ) {
                $jsonArray[self::DESCRIPTION][] = MLStringType::write( $item );
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
