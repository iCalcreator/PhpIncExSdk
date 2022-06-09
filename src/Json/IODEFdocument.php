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
use Kigkonsult\PhpIncExSdk\Dto\IODEFdocument as Dto;

class IODEFdocument extends JsonBase
{
    /**
     * Parse json array to populate new IODEFdocument
     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     * @throws Exception
     */
    public static function parse( array $jsonArray ) : Dto
    {
        $dto = new Dto();

        if( isset( $jsonArray[self::VERSION] )) {
            $dto->setVersion( $jsonArray[self::VERSION] );
        }
        if( isset( $jsonArray[self::LANG] )) {
            $dto->setLang( $jsonArray[self::LANG] );
        }
        if( isset( $jsonArray[self::FORMAT_ID] )) {
            $dto->setFormatId( $jsonArray[self::FORMAT_ID] );
        }
        if( isset( $jsonArray[self::PRIVATE_ENUM_NAME] )) {
            $dto->setPrivateEnumName( $jsonArray[self::PRIVATE_ENUM_NAME] );
        }
        if( isset( $jsonArray[self::PRIVATE_ENUM_ID] )) {
            $dto->setPrivateEnumId( $jsonArray[self::PRIVATE_ENUM_ID] );
        }
        if( isset( $jsonArray[self::INCIDENT] )) {
            foreach( $jsonArray[self::INCIDENT] as $subJsonArray ) {
                $dto->addIncident( Incident::parse( $subJsonArray ));
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
     * Write IODEFdocument Dto properties to json array
     *
     * @param Dto $dto
     * @return array
     */
    public static function write( Dto $dto ) : array
    {
        $jsonArray = [];

        if( $dto->isVersionSet()) {
            $jsonArray[self::VERSION] = $dto->getVersion();
        }
        if( $dto->isLangSet()) {
            $jsonArray[self::LANG] = $dto->getLang();
        }
        if( $dto->isFormatIdSet()) {
            $jsonArray[self::FORMAT_ID] = $dto->getFormatId();
        }
        if( $dto->isPrivateEnumNameSet()) {
            $jsonArray[self::PRIVATE_ENUM_NAME] = $dto->getPrivateEnumName();
        }
        if( $dto->isPrivateEnumIdSet()) {
            $jsonArray[self::PRIVATE_ENUM_ID] = $dto->getPrivateEnumId();
        }
        if( $dto->isIncidentSet()) {
            $jsonArray[self::INCIDENT] = [];
            foreach( $dto->getIncident() as $item ) {
                $jsonArray[self::INCIDENT][] = Incident::write( $item );
            }
        }
        if( $dto->isAdditionalDataSet()) {
            $jsonArray[self::ADDITIONALDATA] = [];
            foreach( $dto->getAdditionalData() as $item ) {
                $jsonArray[self::ADDITIONALDATA][] = ExtensionType::write( $item );
            }
        }

        return $jsonArray;
    }
}
