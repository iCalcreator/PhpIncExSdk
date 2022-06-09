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
namespace Kigkonsult\PhpIncExSdk\Dto;

use Kigkonsult\PhpIncExSdk\Dto\Traits\AdditionalDataManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\AssessmentTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\EmailDataTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtRestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\RestrictionTrait;

/**
 * The Observable class describes a feature and phenomenon that can be observed or measured
 * for the purposes of detecting malicious behavior.
 *
 * The Observable class MUST have exactly one of the possible child classes.
 * System, Address, DomainData, Service, EmailData, WindowsRegistryKeysModified, FileData,
 * CertificateData, RegistryHandle, RecordData, EventData, Incident, Expectation, Reference,
 * Assessment, DetectionPattern, HistoryItem, BulkObservable, AdditionalData
 */
class Observable extends DtoBase
{
    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isSystemSet() ||
            $this->isAddressSet() ||
            $this->isDomainDataSet() ||
            $this->isServiceSet() ||
            $this->isEmailDataSet() ||
            $this->isWindowsRegistryKeysModifiedSet() ||
            $this->isFileDataSet() ||
            $this->isCertificateDataSet() ||
            $this->isRegistryHandleSet() ||
            $this->isRecordDataSet() ||
            $this->isEventDataSet() ||
            $this->isIncidentSet() ||
            $this->isExpectationSet() ||
            $this->isReferenceSet() ||
            $this->isAssessmentSet() ||
            $this->isDetectionPatternSet() ||
            $this->isHistoryItemSet() ||
            $this->isBulkObservableSet() ||
            $this->isAdditionalDataSet());
    }

    /**
     * ATTRIBUTE restriction
     *
     * Optional.  ENUM.
     * See Section 3.3.1.
     * These values are maintained in the "Restriction" IANA registry per Section 10.2.
     *    1.   public.  The information can be freely distributed without restriction.
     *    2.   partner.  The information may be shared within a closed  community of peers, partners,
     *                   or affected parties, but cannot be openly published.
     *    3.   need-to-know.  The information may be shared only within the organization with individuals
     *                        that have a need to know.
     *    4.   private.  The information may not be shared.
     *    5.   default.  The information can be shared according to an information disclosure policy
     *                   pre-arranged by the communicating parties.
     *    6.   white.  Same as 'public'.
     *    7.   green.  Same as 'partner'.
     *    8.   amber.  Same as 'need-to-know'.
     *    9.   red.  Same as 'private'.
     *    10.  ext-value.  A value used to indicate that this attribute is extended and the actual value
     *                     is provided using the corresponding ext-* attribute.  See Section 5.1.1.
     */
    use RestrictionTrait;

    /**
     * ATTRIBUTE ext-restriction
     *
     * Optional.  STRING.
     * A means by which to extend the restriction attribute.
     * See Section 5.1.1.
     */
    use ExtRestrictionTrait;

    /**
     * System
     *
     * Zero or one.
     * A System observable.
     * See Section 3.17.
     *
     * @var System|null
     */
    private ? System $system = null;

    /**
     * @return System|null
     */
    public function getSystem() : ? System
    {
        return $this->system;
    }

    /**
     * Return bool true if system is set
     *
     * @return bool
     */
    public function isSystemSet() : bool
    {
        return ( null !== $this->system );
    }

    /**
     * @param System|null $system
     * @return static
     */
    public function setSystem( ?system $system = null ) : static
    {
        $this->system = $system;
        return $this;
    }

    /**
     * Address
     *
     * Zero or one.
     * An Address observable.
     * See Section 3.18.1.
     *
     * @var Address|null
     */
    private ? Address $address = null;

    /**
     * @return Address|null
     */
    public function getAddress() : ? Address
    {
        return $this->address;
    }

    /**
     * Return bool true if address is set
     *
     * @return bool
     */
    public function isAddressSet() : bool
    {
        return ( null !== $this->address );
    }

    /**
     * @param Address|null $address
     * @return static
     */
    public function setAddress( ? Address $address = null ) : static
    {
        $this->address = $address;
        return $this;
    }

    /**
     * DomainData
     *
     * Zero or one.
     * A DomainData observable.
     * See Section 3.19.
     *
     * @var DomainData|null
     */
    private ? DomainData $domainData = null;

    /**
     * @return DomainData|null
     */
    public function getDomainData() : ? DomainData
    {
        return $this->domainData;
    }

    /**
     * Return bool true if domainData is set
     *
     * @return bool
     */
    public function isDomainDataSet() : bool
    {
        return ( null !== $this->domainData );
    }

    /**
     * @param DomainData|null $domainData
     * @return static
     */
    public function setDomainData( ? DomainData $domainData = null ) : static
    {
        $this->domainData = $domainData;
        return $this;
    }

    /**
     * Service
     *
     * Zero or one.
     * A Service observable.
     * See Section 3.20.
     *
     * @var Service|null
     */
    private ? Service $service = null;

    /**
     * @return Service|null
     */
    public function getService() : ? Service
    {
        return $this->service;
    }

    /**
     * Return bool true if service is set
     *
     * @return bool
     */
    public function isServiceSet() : bool
    {
        return ( null !== $this->service );
    }

    /**
     * @param Service|null $service
     * @return static
     */
    public function setService( ? Service $service = null ) : static
    {
        $this->service = $service;
        return $this;
    }

    /**
     * EmailData
     *
     * Zero or one.
     * An EmailData observable.
     * See Section 3.21.
     */
    use EmailDataTrait;

    /**
     * WindowsRegistryKeysModified
     *
     * Zero or one.
     * A WindowsRegistryKeysModified observable.
     * SeeSection 3.23.
     *
     * @var WindowsRegistryKeysModified|null
     */
    private ? WindowsRegistryKeysModified $windowsRegistryKeysModified = null;

    /**
     * @return WindowsRegistryKeysModified|null
     */
    public function getWindowsRegistryKeysModified() : ? WindowsRegistryKeysModified
    {
        return $this->windowsRegistryKeysModified;
    }

    /**
     * Return bool true if windowsRegistryKeysModified is set
     *
     * @return bool
     */
    public function isWindowsRegistryKeysModifiedSet() : bool
    {
        return ( null !== $this->windowsRegistryKeysModified );
    }

    /**
     * @param WindowsRegistryKeysModified|null $windowsRegistryKeysModified
     * @return static
     */
    public function setWindowsRegistryKeysModified(
        ? WindowsRegistryKeysModified $windowsRegistryKeysModified = null
    ) : static
    {
        $this->windowsRegistryKeysModified = $windowsRegistryKeysModified;
        return $this;
    }

    /**
     * FileData
     *
     * Zero or one.
     * A FileData observable.
     * See Section 3.25.
     *
     * @var FileData|null
     */
    private ? FileData $fileData = null;

    /**
     * @return FileData|null
     */
    public function getFileData() : ? FileData
    {
        return $this->fileData;
    }

    /**
     * Return bool true if fileData is set
     *
     * @return bool
     */
    public function isFileDataSet() : bool
    {
        return ( null !== $this->fileData );
    }

    /**
     * @param FileData|null $fileData
     * @return static
     */
    public function setFileData( ? FileData $fileData = null ) : static
    {
        $this->fileData = $fileData;
        return $this;
    }

    /**
     * CertificateData
     *
     * Zero or one.
     * A CertificateData observable.
     * See Section 3.24.
     *
     * @var CertificateData|null
     */
    private ? CertificateData $certificateData = null;

    /**
     * @return CertificateData|null
     */
    public function getCertificateData() : ? CertificateData
    {
        return $this->certificateData;
    }

    /**
     * Return bool true if certificateData is set
     *
     * @return bool
     */
    public function isCertificateDataSet() : bool
    {
        return ( null !== $this->certificateData );
    }

    /**
     * @param CertificateData|null $certificateData
     * @return static
     */
    public function setCertificateData( ? CertificateData $certificateData = null ) : static
    {
        $this->certificateData = $certificateData;
        return $this;
    }

    /**
     * RegistryHandle
     *
     * Zero or one.
     * A RegistryHandle observable.
     * See Section 3.9.1.
     *
     * @var RegistryHandle|null
     */
    private ? RegistryHandle $registryHandle = null;

    /**
     * @return RegistryHandle|null
     */
    public function getRegistryHandle() : ? RegistryHandle
    {
        return $this->registryHandle;
    }

    /**
     * Return bool true if registryHandle is set
     *
     * @return bool
     */
    public function isRegistryHandleSet() : bool
    {
        return ( null !== $this->registryHandle );
    }

    /**
     * @param RegistryHandle|null $registryHandle
     * @return static
     */
    public function setRegistryHandle( ? RegistryHandle $registryHandle = null ) : static
    {
        $this->registryHandle = $registryHandle;
        return $this;
    }

    /**
     * RecordData
     *
     * Zero or one.
     * An RecordData observable.
     * See Section 3.14.
     *
     * @var RecordData|null
     */
    private ? RecordData $recordData = null;

    /**
     * @return null|RecordData
     */
    public function getRecordData() : ? RecordData
    {
        return $this->recordData;
    }

    /**
     * Return bool true if recordData is set
     *
     * @return bool
     */
    public function isRecordDataSet() : bool
    {
        return ( null !== $this->recordData );
    }

    /**
     * @param null|RecordData $recordData
     * @return static
     */
    public function setRecordData( ? RecordData $recordData = null ) : static
    {
        $this->recordData = $recordData;
        return $this;
    }

    /**
     * EventData
     *
     * Zero or one.
     * An EventData observable.
     * See Section 3.14.
     *
     * @var EventData|null
     */
    private ? EventData $eventData = null;

    /**
     * @return null|EventData
     */
    public function getEventData() : ? EventData
    {
        return $this->eventData;
    }

    /**
     * Return bool true if eventData is set
     *
     * @return bool
     */
    public function isEventDataSet() : bool
    {
        return ( null !== $this->eventData );
    }

    /**
     * @param null|EventData $eventData
     * @return static
     */
    public function setEventData( ? EventData $eventData = null ) : static
    {
        $this->eventData = $eventData;
        return $this;
    }

    /**
     * Incident
     *
     * Zero or one.
     * An Incident observable.
     * See Section 3.2.
     *
     * @var Incident|null
     */
    private ? Incident $incident = null;

    /**
     * @return Incident|null
     */
    public function getIncident() : ? Incident
    {
        return $this->incident;
    }

    /**
     * Return bool true if incident is set
     *
     * @return bool
     */
    public function isIncidentSet() : bool
    {
        return ( null !== $this->incident );
    }

    /**
     * @param Incident|null $incident
     * @return static
     */
    public function setIncident( ? Incident $incident = null ) : static
    {
        $this->incident = $incident;
        return $this;
    }

    /**
     * Expectation
     *
     * Zero or one.
     * An Expectation observable.
     * See Section 3.15.
     *
     * @var Expectation|null
     */
    private ? Expectation $expectation = null;

    /**
     * @return Expectation|null
     */
    public function getExpectation() : ? Expectation
    {
        return $this->expectation;
    }

    /**
     * Return bool true if expectation is set
     *
     * @return bool
     */
    public function isExpectationSet() : bool
    {
        return ( null !== $this->expectation );
    }

    /**
     * @param Expectation|null $expectation
     * @return static
     */
    public function setExpectation( ? Expectation $expectation = null ) : static
    {
        $this->expectation = $expectation;
        return $this;
    }

    /**
     * Reference
     *
     * Zero or one.
     * A Reference observable.
     * See Section 3.11.1.
     *
     * @var Reference|null
     */
    private ? Reference $reference = null;

    /**
     * @return Reference|null
     */
    public function getReference() : ? Reference
    {
        return $this->reference;
    }

    /**
     * Return bool true if reference is set
     *
     * @return bool
     */
    public function isReferenceSet() : bool
    {
        return ( null !== $this->reference );
    }

    /**
     * @param Reference|null $reference
     * @return static
     */
    public function setReference( ? Reference $reference = null ) : static
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * Assessment
     *
     * Zero or one.
     * An Assessment observable.
     * See Section 3.12.
     */
    use AssessmentTrait;

    /**
     * DetectionPattern
     *
     * Zero or one.
     * A DetectionPattern observable.
     * See Section 3.10.1.
     *
     * @var DetectionPattern|null
     */
    private ? DetectionPattern $detectionPattern = null;

    /**
     * @return DetectionPattern|null
     */
    public function getDetectionPattern() : ? DetectionPattern
    {
        return $this->detectionPattern;
    }

    /**
     * Return bool true if detectionPattern is set
     *
     * @return bool
     */
    public function isDetectionPatternSet() : bool
    {
        return ( null !== $this->detectionPattern );
    }

    /**
     * @param DetectionPattern|null $detectionPattern
     * @return static
     */
    public function setDetectionPattern( ? DetectionPattern $detectionPattern = null ) : static
    {
        $this->detectionPattern = $detectionPattern;
        return $this;
    }

    /**
     * HistoryItem
     *
     * Zero or one.
     * A HistoryItem observable.
     * See Section 3.13.1.
     *
     * @var HistoryItem|null
     */
    private ? HistoryItem $historyItem = null;

    /**
     * @return HistoryItem|null
     */
    public function getHistoryItem() : ? HistoryItem
    {
        return $this->historyItem;
    }

    /**
     * Return bool true if historyItem is set
     *
     * @return bool
     */
    public function isHistoryItemSet() : bool
    {
        return ( null !== $this->historyItem );
    }

    /**
     * @param HistoryItem|null $historyItem
     * @return static
     */
    public function setHistoryItem( ? HistoryItem $historyItem = null ) : static
    {
        $this->historyItem = $historyItem;
        return $this;
    }

    /**
     * BulkObservable
     *
     * Zero or one.
     * A bulk list of observables.
     * See Section 3.29.3.1.
     *
     * @var BulkObservable|null
     */
    private ? BulkObservable $bulkObservable = null;

    /**
     * @return BulkObservable|null
     */
    public function getBulkObservable() : ? BulkObservable
    {
        return $this->bulkObservable;
    }

    /**
     * Return bool true if bulkObservable is set
     *
     * @return bool
     */
    public function isBulkObservableSet() : bool
    {
        return ( null !== $this->bulkObservable );
    }

    /**
     * @param BulkObservable|null $bulkObservable
     * @return static
     */
    public function setBulkObservable( ? BulkObservable $bulkObservable = null ) : static
    {
        $this->bulkObservable = $bulkObservable;
        return $this;
    }

    /**
     * AdditionalData
     *
     * Zero or more.  EXTENSION.
     * Mechanism by which to extend the data  model.
     */
    use AdditionalDataManyTrait;
}
