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

use Kigkonsult\PhpIncExSdk\Dto\Observable as Dto;

class Observable extends ValidateBase
{
    /**
     * Observable
     *
     * @param Dto $dto
     * @param array|null $result
     * @param string|null $upper
     * @return bool
     */
    public static function check( Dto $dto, ?array & $result = [], ?string $upper = '' ) : bool
    {
        static $EXACTONEOFREQUIRED = 'MUST have exactly one of %s';

        $return = true;
        $upper  = self::getClassUpper( $upper );

        if( ! $dto->isRequiredSet()) {
            $return = false;
            $key    = $upper . self::$PROPLIST;
            static $IMPLODELIST = [
                self::SYSTEM, self::ADDRESS, self::DOMAINDATA, self::SERVICE, self::EMAILDATA,
                self::WINDOWSREGISTRYKEYSMODIFIED, self::FILEDATA, self::CERTIFICATEDATA,
                self::REGISTRYHANDLE, self::RECORDDATA, self::EVENTDATA, self::INCIDENT,
                self::EXPECTATION, self::REFERENCE, self::ASSESSMENT, self::DETECTIONPATTERN,
                self::HISTORYITEM, self::BULKOBSERVABLE, self::ADDITIONALDATA
            ];
            $result[$key] = sprintf( $EXACTONEOFREQUIRED, self::implodeList( $IMPLODELIST ));
        }
        if( ! self::extAttrOk( $dto->getRestriction(), $dto->isExtRestrictionSet(), $errExt )) {
            $return = false;
            self::updResultWithErrExtUse( $upper, self::RESTRICTION, $errExt, $result );
        }

        if( $dto->isSystemSet() &&
            ( false === System::check(
                $dto->getSystem(),
                $result,
                self::getKey(  $upper, self::SYSTEM )))) {
            $return = false;
        }

        if( $dto->isAddressSet() &&
            ( false === Address::check(
                $dto->getAddress(),
                $result,
                self::getKey(  $upper, self::ADDRESS )))) {
            $return = false;
        }

        if( $dto->isDomainDataSet() &&
            ( false === DomainData::check(
                $dto->getDomainData(),
                $result,
                self::getKey(  $upper, self::DOMAINDATA )))) {
            $return = false;
        }

        if( $dto->isServiceSet() &&
            ( false === Service::check(
                $dto->getService(),
                $result,
                self::getKey(  $upper, self::SERVICE )))) {
            $return = false;
        }

        if( $dto->isEmailDataSet() &&
            ( false === EmailData::check(
                $dto->getEmailData(),
                $result,
                self::getKey(  $upper, self::EMAILDATA )))) {
            $return = false;
        }

        if( $dto->isWindowsRegistryKeysModifiedSet() &&
            ( false === WindowsRegistryKeysModified::check(
                $dto->getWindowsRegistryKeysModified() ,
                $result,
                self::getKey(  $upper, self::WINDOWSREGISTRYKEYSMODIFIED )))) {
            $return = false;
        }

        if( $dto->isFileDataSet() &&
            ( false === FileData::check(
                $dto->getFileData(),
                $result,
                self::getKey(  $upper, self::FILEDATA )))) {
            $return = false;
        }

        if( $dto->isCertificateDataSet() &&
            ( false === CertificateData::check(
                $dto->getCertificateData(),
                $result,
                self::getKey(  $upper, self::CERTIFICATEDATA )))) {
            $return = false;
        }

        if( $dto->isRegistryHandleSet() &&
            ( false === RegistryHandle::check(
                $dto->getRegistryHandle(),
                $result,
                self::getKey(  $upper, self::REGISTRYHANDLE )))) {
            $return = false;
        }

        if( $dto->isRecordDataSet() &&
            ( false === RecordData::check(
                $dto->getRecordData(),
                $result,
                self::getKey(  $upper, self::RECORDDATA )))) {
            $return = false;
        }

        if( $dto->isEventDataSet() &&
            ( false === EventData::check(
                $dto->getEventData(),
                $result,
                self::getKey(  $upper, self::EVENTDATA )))) {
            $return = false;
        }

        if( $dto->isIncidentSet() &&
            ( false === Incident::check(
                $dto->getIncident(),
                $result,
                self::getKey(  $upper, self::INCIDENT )))) {
            $return = false;
        }

        if( $dto->isExpectationSet() &&
            ( false === Expectation::check(
                $dto->getExpectation(),
                $result,
                self::getKey(  $upper, self::EXPECTATION )))) {
            $return = false;
        }

        if( $dto->isReferenceSet() &&
            ( false === Reference::check(
                $dto->getReference(),
                $result,
                self::getKey(  $upper, self::REFERENCE )))) {
            $return = false;
        }

        if( $dto->isAssessmentSet() &&
            ( false === Assessment::check(
                $dto->getAssessment(),
                $result,
                self::getKey(  $upper, self::ASSESSMENT )))) {
            $return = false;
        }

        if( $dto->isHistoryItemSet() &&
            ( false === HistoryItem::check(
                $dto->getHistoryItem(),
                $result,
                self::getKey(  $upper, self::HISTORYITEM )))) {
            $return = false;
        }

        if( $dto->isDetectionPatternSet() &&
            ( false === DetectionPattern::check(
                $dto->getDetectionPattern(),
                $result,
                self::getKey(  $upper, self::DETECTIONPATTERN )))) {
            $return = false;
        }

        if( $dto->isBulkObservableSet() &&
            ( false === BulkObservable::check(
                $dto->getBulkObservable(),
                $result,
                self::getKey(  $upper, self::BULKOBSERVABLE )))) {
            $return = false;
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
