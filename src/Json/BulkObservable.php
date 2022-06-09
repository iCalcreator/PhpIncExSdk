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

use Kigkonsult\PhpIncExSdk\Dto\BulkObservable as Dto;

class BulkObservable implements JsonInterface
{
    /**
     * Parse json array to populate new BulkObservable
     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     */
    public static function parse( array $jsonArray ) : Dto
    {
        $dto = new Dto();

        if( isset( $jsonArray[self::TYPE] )) {
            $dto->setType( $jsonArray[self::TYPE] );
        }
        if( isset( $jsonArray[self::EXT_TYPE] )) {
            $dto->setExtType( $jsonArray[self::EXT_TYPE] );
        }
        if( isset( $jsonArray[self::BULKOBSERVABLEFORMAT] )) {
            $dto->setBulkObservableFormat( BulkObservableFormat::parse( $jsonArray[self::BULKOBSERVABLEFORMAT] ));
        }
        if( isset( $jsonArray[self::BULKOBSERVABLELIST] )) {
            $dto->setBulkObservableList( $jsonArray[self::BULKOBSERVABLELIST] );
        }
        if( isset( $jsonArray[self::ADDITIONALDATA] )) {
            foreach( $jsonArray[self::ADDITIONALDATA] as $subJsonArray ) {
                $dto->addAdditionalData( ExtensionType::parse( $subJsonArray ));
            }
        }

        return $dto;
    }

    /**
     * Write BulkObservable Dto properties to json array
     *
     * @param Dto $dto
     * @return object
     */
    public static function write( Dto $dto ) : object
    {
        $jsonArray = [];

        if( $dto->isTypeSet()) {
            $jsonArray[self::TYPE] = $dto->getType();
        }
        if( $dto->isExtTypeSet()) {
            $jsonArray[self::EXT_TYPE] = $dto->getExtType();
        }
        if( $dto->isBulkObservableFormatSet()) {
            $jsonArray[self::BULKOBSERVABLEFORMAT] =
                BulkObservableFormat::write( $dto->getBulkObservableFormat());
        }
        if( $dto->isBulkObservableListSet()) {
            $jsonArray[self::BULKOBSERVABLELIST] = $dto->getBulkObservableList();
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
