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
use Kigkonsult\PhpIncExSdk\Dto\Observable as Dto;

class Observable implements JsonInterface
{
    /**
     * Parse json array to populate new Observable
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
        if( isset( $jsonArray[self::SYSTEM] )) {
            $dto->setSystem( System::parse( $jsonArray[self::SYSTEM] ));
        }
        if( isset( $jsonArray[self::ADDRESS] )) {
            $dto->setAddress( Address::parse( $jsonArray[self::ADDRESS] ));
        }
        if( isset( $jsonArray[self::DOMAINDATA] )) {
            $dto->setDomainData( DomainData::parse( $jsonArray[self::DOMAINDATA] ));
        }
        if( isset( $jsonArray[self::SERVICE] )) {
            $dto->setService( Service::parse( $jsonArray[self::SERVICE] ));
        }
        if( isset( $jsonArray[self::EMAILDATA] )) {
            $dto->setEmailData( EmailData::parse( $jsonArray[self::EMAILDATA] ));
        }
        if( isset( $jsonArray[self::WINDOWSREGISTRYKEYSMODIFIED] )) {
            $dto->setWindowsRegistryKeysModified(
                WindowsRegistryKeysModified::parse( $jsonArray[self::WINDOWSREGISTRYKEYSMODIFIED] )
            );
        }
        if( isset( $jsonArray[self::FILEDATA] )) {
            $dto->setFileData( FileData::parse( $jsonArray[self::FILEDATA] ));
        }
        if( isset( $jsonArray[self::CERTIFICATEDATA] )) {
            $dto->setCertificateData( CertificateData::parse( $jsonArray[self::CERTIFICATEDATA] ));
        }
        if( isset( $jsonArray[self::REGISTRYHANDLE] )) {
            $dto->setRegistryHandle( RegistryHandle::parse( $jsonArray[self::REGISTRYHANDLE] ));
        }
        if( isset( $jsonArray[self::RECORDDATA] )) {
            $dto->setRecordData( RecordData::parse( $jsonArray[self::RECORDDATA] ));
        }
        if( isset( $jsonArray[self::EVENTDATA] )) {
            $dto->setEventData( EventData::parse( $jsonArray[self::EVENTDATA] ));
        }
        if( isset( $jsonArray[self::INCIDENT] )) {
            $dto->setIncident( Incident::parse( $jsonArray[self::INCIDENT] ));
        }
        if( isset( $jsonArray[self::EXPECTATION] )) {
            $dto->setExpectation( Expectation::parse( $jsonArray[self::EXPECTATION] ));
        }
        if( isset( $jsonArray[self::REFERENCE] )) {
            $dto->setReference( Reference::parse( $jsonArray[self::REFERENCE] ));
        }
        if( isset( $jsonArray[self::ASSESSMENT] )) {
            $dto->setAssessment( Assessment::parse( $jsonArray[self::ASSESSMENT] ));
        }
        if( isset( $jsonArray[self::DETECTIONPATTERN] )) {
            $dto->setDetectionPattern( DetectionPattern::parse( $jsonArray[self::DETECTIONPATTERN] ));
        }
        if( isset( $jsonArray[self::HISTORYITEM] )) {
            $dto->setHistoryItem( HistoryItem::parse( $jsonArray[self::HISTORYITEM] ));
        }
        if( isset( $jsonArray[self::BULKOBSERVABLE] )) {
            $dto->setBulkObservable( BulkObservable::parse( $jsonArray[self::BULKOBSERVABLE] ));
        }
        if( isset( $jsonArray[self::ADDITIONALDATA] )) {
            foreach( $jsonArray[self::ADDITIONALDATA] as $subJsonArray ) {
                $dto->addAdditionalData( ExtensionType::parse( $subJsonArray ));
            }
        }

        return $dto;
    }

    /**
     * Write Observable Dto properties to json array
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
        if( $dto->isSystemSet()) {
            $jsonArray[self::SYSTEM] = System::write( $dto->getSystem());
        }
        if( $dto->isAddressSet()) {
            $jsonArray[self::ADDRESS] = Address::write( $dto->getAddress());
        }
        if( $dto->isDomainDataSet()) {
            $jsonArray[self::DOMAINDATA] = DomainData::write( $dto->getDomainData());
        }
        if( $dto->isServiceSet()) {
            $jsonArray[self::SERVICE] = Service::write( $dto->getService());
        }
        if( $dto->isEmailDataSet()) {
            $jsonArray[self::EMAILDATA] = EmailData::write( $dto->getEmailData());
        }
        if( $dto->isWindowsRegistryKeysModifiedSet()) {
            $jsonArray[self::WINDOWSREGISTRYKEYSMODIFIED] =
                WindowsRegistryKeysModified::write( $dto->getWindowsRegistryKeysModified());
        }
        if( $dto->isFileDataSet()) {
            $jsonArray[self::FILEDATA] = FileData::write( $dto->getFileData());
        }
        if( $dto->isCertificateDataSet()) {
            $jsonArray[self::CERTIFICATEDATA] = CertificateData::write( $dto->getCertificateData());
        }
        if( $dto->isRegistryHandleSet()) {
            $jsonArray[self::REGISTRYHANDLE] = RegistryHandle::write( $dto->getRegistryHandle());
        }
        if( $dto->isRecordDataSet()) {
            $jsonArray[self::RECORDDATA] = RecordData::write( $dto->getRecordData());
        }
        if( $dto->isEventDataSet()) {
            $jsonArray[self::EVENTDATA] = EventData::write( $dto->getEventData());
        }
        if( $dto->isIncidentSet()) {
            $jsonArray[self::INCIDENT] = Incident::write( $dto->getIncident());
        }
        if( $dto->isExpectationSet()) {
            $jsonArray[self::EXPECTATION] = Expectation::write( $dto->getExpectation());
        }
        if( $dto->isReferenceSet()) {
            $jsonArray[self::REFERENCE] = Reference::write( $dto->getReference());
        }
        if( $dto->isAssessmentSet()) {
            $jsonArray[self::ASSESSMENT] = Assessment::write( $dto->getAssessment());
        }
        if( $dto->isDetectionPatternSet()) {
            $jsonArray[self::DETECTIONPATTERN] = DetectionPattern::write( $dto->getDetectionPattern());
        }
        if( $dto->isHistoryItemSet()) {
            $jsonArray[self::HISTORYITEM] = HistoryItem::write( $dto->getHistoryItem());
        }
        if( $dto->isBulkObservableSet()) {
            $jsonArray[self::BULKOBSERVABLE] = BulkObservable::write( $dto->getBulkObservable());
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
