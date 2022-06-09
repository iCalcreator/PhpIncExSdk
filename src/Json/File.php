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

use Kigkonsult\PhpIncExSdk\Dto\File as Dto;

class File implements JsonInterface
{
    /**
     * Parse json array to populate new File
     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     */
    public static function parse( array $jsonArray ) : Dto
    {
        $dto = new Dto();

        if( isset( $jsonArray[self::OBSERVABLE_ID] )) {
            $dto->setObservableId( $jsonArray[self::OBSERVABLE_ID] );
        }

        if( isset( $jsonArray[self::FILENAME] )) {
            $dto->setFileName( $jsonArray[self::FILENAME] );
        }

        if( isset( $jsonArray[self::FILESIZE] )) {
            $dto->setFileSize((int) $jsonArray[self::FILESIZE] );
        }

        if( isset( $jsonArray[self::FILETYPE] )) {
            $dto->setFileType( $jsonArray[self::FILETYPE] );
        }

        if( isset( $jsonArray[self::URL] )) {
            foreach( $jsonArray[self::URL] as $sub ) {
                $dto->addUrl( $sub );
            }
        }

        if( isset( $jsonArray[self::HASHDATA] )) {
            $dto->setHashData( HashData::parse( $jsonArray[self::HASHDATA] ));
        }

        if( isset( $jsonArray[self::SIGNATURE] )) {
            foreach( $jsonArray[self::SIGNATURE] as $sub ) {
                $dto->addSignature( $sub );
            }
        }

        if( isset( $jsonArray[self::ASSOCIATEDSOFTWARE] )) {
            $dto->setAssociatedSoftware( SoftwareType::parse( $jsonArray[self::ASSOCIATEDSOFTWARE] ));
        }

        if( isset( $jsonArray[self::FILEPROPERTIES] )) {
            foreach( $jsonArray[self::FILEPROPERTIES] as $subJsonArray ) {
                $dto->addFileProperties( ExtensionType::parse( $subJsonArray ));
            }
        }
        // FileProperties

        return $dto;
    }

    /**
     * Write File Dto properties to json array
     *
     * @param Dto $dto
     * @return object
     */
    public static function write( Dto $dto ) : object
    {
        $jsonArray = [];

        if( $dto->isObservableIdSet()) {
            $jsonArray[self::OBSERVABLE_ID] = $dto->getObservableId();
        }

        if( $dto->isFileNameSet()) {
            $jsonArray[self::FILENAME] = $dto->getFileName();
        }

        if( $dto->isFileSizeSet()) {
            $jsonArray[self::FILESIZE] = $dto->getFileSize();
        }

        if( $dto->isFileTypeSet()) {
            $jsonArray[self::FILETYPE] = $dto->getFileType();
        }

        if( $dto->isUrlSet()) {
            $jsonArray[self::URL] = [];
            foreach( $dto->getUrl() as $item ) {
                $jsonArray[self::URL][] = $item;
            }
        }

        if( $dto->isHashDataSet()) {
            $jsonArray[self::HASHDATA] = $dto->getHashData();
        }

        if( $dto->isSignatureSet()) {
            $jsonArray[self::SIGNATURE] = [];
            foreach( $dto->getSignature() as $item ) {
                $jsonArray[self::SIGNATURE][] = $item;
            }
        }

        if( $dto->isAssociatedSoftwareSet()) {
            $jsonArray[self::ASSOCIATEDSOFTWARE] = SoftwareType::write( $dto->getAssociatedSoftware());
        }

        if( $dto->isFilePropertiesSet()) {
            $jsonArray[self::FILEPROPERTIES] = [];
            foreach( $dto->getFileProperties() as $item ) {
                $jsonArray[self::FILEPROPERTIES][] = ExtensionType::write( $item );
            }
        }

        return (object) $jsonArray;
    }
}
