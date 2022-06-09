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
use Kigkonsult\PhpIncExSdk\Dto\RecordData as Dto;

class RecordData implements JsonInterface
{
    /**
     * Parse json array to populate new RecordData
     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     * @throws Exception
     */
    public static function parse( array $jsonArray ) : Dto
    {
        $dto = new Dto();

        if( isset( $jsonArray[self::RESTRICTION] )) {
            $dto->setRestriction( $jsonArray[self::RESTRICTION] );
        }
        if( isset( $jsonArray[self::EXT_RESTRICTION] )) {
            $dto->setExtRestriction( $jsonArray[self::EXT_RESTRICTION] );
        }
        if( isset( $jsonArray[self::OBSERVABLE_ID] )) {
            $dto->setObservableId( $jsonArray[self::OBSERVABLE_ID] );
        }
        if( isset( $jsonArray[self::DATETIME] )) {
            $dto->setDateTime( $jsonArray[self::DATETIME] );
        }
        if( isset( $jsonArray[self::DESCRIPTION] )) {
            foreach( $jsonArray[self::DESCRIPTION] as $subJsonArray ) {
                $dto->addDescription( MLStringType::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::APPLICATION] )) {
            $dto->setApplication( SoftwareType::parse( $jsonArray[self::APPLICATION] ));
        }
        if( isset( $jsonArray[self::RECORDPATTERN] )) {
            foreach( $jsonArray[self::RECORDPATTERN] as $subJsonArray ) {
                $dto->addRecordPattern( RecordPattern::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::RECORDITEM] )) {
            foreach( $jsonArray[self::RECORDITEM] as $subJsonArray ) {
                $dto->addRecordItem( ExtensionType::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::URL] )) {
            foreach( $jsonArray[self::URL] as $sub ) {
                $dto->addUrl( $sub );
            }
        }
        if( isset( $jsonArray[self::FILEDATA] )) {
            foreach( $jsonArray[self::FILEDATA] as $subJsonArray ) {
                $dto->addFileData( FileData::parse( $subJsonArray ) );
            }
        }
        if( isset( $jsonArray[self::WINDOWSREGISTRYKEYSMODIFIED] )) {
            foreach( $jsonArray[self::WINDOWSREGISTRYKEYSMODIFIED] as $subJsonArray ) {
                $dto->addWindowsRegistryKeysModified( WindowsRegistryKeysModified::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::CERTIFICATEDATA] )) {
            foreach( $jsonArray[self::CERTIFICATEDATA] as $subJsonArray ) {
                $dto->addCertificateData( CertificateData::parse( $subJsonArray ));
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
     * Write RecordData Dto properties to json array
     *
     * @param Dto $dto
     * @return object
     */
    public static function write( Dto $dto ) : object
    {
        $jsonArray = [];

        if( $dto->isRestrictionSet()) {
            $jsonArray[self::RESTRICTION] = $dto->getRestriction();
        }
        if( $dto->isExtRestrictionSet()) {
            $jsonArray[self::EXT_RESTRICTION] = $dto->getExtRestriction();
        }
        if( $dto->isObservableIdSet()) {
            $jsonArray[self::OBSERVABLE_ID] = $dto->getObservableId();
        }
        if( $dto->isDateTimeSet()) {
            $jsonArray[self::DATETIME] = $dto->getDateTime();
        }
        if( $dto->isDescriptionSet()) {
            $jsonArray[self::DESCRIPTION] = [];
            foreach( $dto->getDescription() as $item ) {
                $jsonArray[self::DESCRIPTION][] = MLStringType::write( $item );
            }
        }
        if( $dto->isApplicationSet()) {
            $jsonArray[self::APPLICATION] = SoftwareType::write( $dto->getApplication());
        }
        if( $dto->isRecordPatternSet()) {
            $jsonArray[self::RECORDPATTERN] = [];
            foreach( $dto->getRecordPattern() as $item ) {
                $jsonArray[self::RECORDPATTERN][] = RecordPattern::write( $item );
            }
        }
        if( $dto->isRecordItemSet()) {
            $jsonArray[self::RECORDITEM] = [];
            foreach( $dto->getRecordItem() as $item ) {
                $jsonArray[self::RECORDITEM][] = ExtensionType::write( $item );
            }
        }
        if( $dto->isUrlSet()) {
            $jsonArray[self::URL] = [];
            foreach( $dto->getUrl() as $item ) {
                $jsonArray[self::URL][] = $item;
            }
        }
        if( $dto->isFileDataSet()) {
            $jsonArray[self::FILEDATA] = [];
            foreach( $dto->getFileData() as $item ) {
                $jsonArray[self::FILEDATA][] = FileData::write( $item );
            }
        }
        if( $dto->isWindowsRegistryKeysModifiedSet()) {
            $jsonArray[self::WINDOWSREGISTRYKEYSMODIFIED] = [];
            foreach( $dto->getWindowsRegistryKeysModified() as $item ) {
                $jsonArray[self::WINDOWSREGISTRYKEYSMODIFIED][] = WindowsRegistryKeysModified::write( $item );
            }
        }
        if( $dto->isCertificateDataSet()) {
            $jsonArray[self::CERTIFICATEDATA] = [];
            foreach( $dto->getCertificateData() as $item ) {
                $jsonArray[self::CERTIFICATEDATA][] = CertificateData::write( $item );
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
