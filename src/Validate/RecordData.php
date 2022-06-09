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

use Kigkonsult\PhpIncExSdk\Dto\RecordData as Dto;

class RecordData extends ValidateBase
{
    /**
     * RecordData
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
            $key    = $upper . self::$PROPLIST;
            static $IMPLODELIST = [
                self::RECORDITEM,
                self::URL,
                self::FILEDATA,
                self::WINDOWSREGISTRYKEYSMODIFIED,
                self::CERTIFICATEDATA,
                self::ADDITIONALDATA
            ];
            $result[$key] = sprintf( self::$ONEREQUIRED, self::implodeList( $IMPLODELIST ));
        }
        if( ! self::extAttrOk( $dto->getRestriction(), $dto->isExtRestrictionSet(), $errExt )) {
            $return = false;
            self::updResultWithErrExtUse( $upper, self::RESTRICTION, $errExt, $result );
        }

        if( $dto->isDescriptionSet()) {
            $key    = self::getKey(  $upper, self::DESCRIPTION );
            foreach( $dto->getDescription() as $x => $item ) {
                if( false === MLStringType::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }
        if( $dto->isApplicationSet() &&
            ( false === SoftwareType::check(
                $dto->getApplication(),
                $result,
                self::getKey(  $upper, self::APPLICATION )))) {
            $return = false;
        }

        if( $dto->isRecordPatternSet()) {
            $key    = self::getKey(  $upper, self::RECORDPATTERN );
            foreach( $dto->getRecordPattern() as $x => $item ) {
                if( false === RecordPattern::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }
        if( $dto->isRecordItemSet()) {
            $key    = self::getKey(  $upper, self::RECORDITEM );
            foreach( $dto->getRecordItem() as $x => $item ) {
                if( false === ExtensionType::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isFileDataSet()) {
            $key    = self::getKey(  $upper, self::FILEDATA );
            foreach( $dto->getFileData() as $x => $item ) {
                if( false === FileData::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isWindowsRegistryKeysModifiedSet()) {
            $key    = self::getKey(  $upper, self::WINDOWSREGISTRYKEYSMODIFIED );
            foreach( $dto->getWindowsRegistryKeysModified() as $x => $item ) {
                if( false === WindowsRegistryKeysModified::check(
                    $item,
                    $result,
                    self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isCertificateDataSet()) {
            $key    = self::getKey(  $upper, self::CERTIFICATEDATA );
            foreach( $dto->getCertificateData() as $x => $item ) {
                if( false === CertificateData::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isAdditionalDataSet()) {
            $key    = self::getKey(  $upper, self::ADDITIONALDATA );
            foreach( $dto->getAdditionalData() as $x => $item ) {
                if( false === ExtensionType::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        return $return;
    }
}
