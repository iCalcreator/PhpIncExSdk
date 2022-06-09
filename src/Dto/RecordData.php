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
use Kigkonsult\PhpIncExSdk\Dto\Traits\ApplicationTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\DateTimeTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\DescriptionManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtRestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ObservableIdTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\RestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\UrlManyTrait;

/**
 * The RecordData class describes or references log or audit data from a given type of tool
 * and provides a means to annotate the output.
 *
 * At least one of the following classes MUST be present:
 * RecordItem, URL, FileData, WindowsRegistryKeysModified, CertificateData, or AdditionalData.
 */
class RecordData extends DtoBase
{
    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isRecordItemSet() ||
            $this->isURLSet() ||
            $this->isFileDataSet() ||
            $this->isWindowsRegistryKeysModifiedSet() ||
            $this->isCertificateDataSet() ||
            $this->isAdditionalDataSet()
        );
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
     * ATTRIBUTE observable-id
     *
     * Optional.  ID.
     * See Section 3.3.2.
     */
    use ObservableIdTrait;

    /**
     * DateTime
     *
     * Zero or one.  DATETIME.
     * A timestamp of the data found in the RecordItem or URL classes.
     * YYYY-mm-ddThh:mm:dd(.ss+)? (('+' | '-') hh ':' mm) | 'Z'
     */
    use DateTimeTrait;

    /**
     * Description
     *
     * Zero or more.  ML_STRING.
     * A free-form text description of the data provided in the RecordItem or URL classes.
     */
    use DescriptionManyTrait;

    /**
     * Application
     *
     * Zero or one.  SOFTWARE.
     * Identifies the tool used to generate the  data in the RecordItem or URL classes.
     */
    use  ApplicationTrait;

    /**
     * RecordPattern
     *
     * Zero or more.
     * A search string to precisely find the relevant datain the RecordItem or URL classes.
     * See Section 3.22.2.
     *
     * @var RecordPattern[]
     */
    private array $recordPattern = [];

    /**
     * @return RecordPattern[]
     */
    public function getRecordPattern() : array
    {
        return $this->recordPattern;
    }

    /**
     * Return bool true if recordPattern is set
     *
     * @return bool
     */
    public function isRecordPatternSet() : bool
    {
        return ! empty( $this->recordPattern );
    }

    /**
     * @param RecordPattern $recordPattern
     * @return static
     */
    public function addRecordPattern( RecordPattern $recordPattern ) : static
    {
        $this->recordPattern[] = $recordPattern;
        return $this;
    }

    /**
     * @param null|RecordPattern[] $recordPattern
     * @return static
     */
    public function setRecordPattern( ? array $recordPattern = [] ) : static
    {
        $this->recordPattern = [];
        foreach( $recordPattern as $theRecordPattern ) {
            $this->addRecordPattern( $theRecordPattern );
        }
        return $this;
    }

    /**
     * RecordItem
     *
     * Zero or more.  EXTENSION.
     * Log, audit, or forensic data to support the conclusions made during the course of analyzing the incident.
     *
     * @var ExtensionType[]
     */
    private array $recordItem = [];

    /**
     * @return ExtensionType[]
     */
    public function getRecordItem() : array
    {
        return $this->recordItem;
    }

    /**
     * Return bool true if recordItem is not empty
     *
     * @return bool
     */
    public function isRecordItemSet() : bool
    {
        return ! empty( $this->recordItem );
    }

    /**
     * @param ExtensionType $recordItem
     * @return static
     */
    public function addRecordItem( ExtensionType $recordItem ) : static
    {
        $this->recordItem[] = $recordItem;
        return $this;
    }

    /**
     * @param null|ExtensionType[] $recordItem
     * @return static
     */
    public function setRecordItem( ? array $recordItem = [] ) : static
    {
        $this->recordItem = [];
        foreach( $recordItem as $extensionType ) {
            $this->addRecordItem( $extensionType );
        }
        return $this;
    }

    /**
     * URL
     *
     * Zero or more.  URL.
     * A URL reference to a log or audit data.
     */
    use UrlManyTrait;

    /**
     * FileData
     *
     * Zero or one. wrong... Zero or more (rfc7970) or one or more (rfc8727)
     * The files involved in the incident.
     * See Section 3.25.
     *
     * @var FileData[]
     */
    private array $fileData = [];

    /**
     * @return FileData[]
     */
    public function getFileData() : array
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
        return ! empty( $this->fileData );
    }

    /**
     * @param FileData $fileData
     * @return static
     */
    public function addFileData( FileData $fileData ) : static
    {
        $this->fileData[] = $fileData;
        return $this;
    }

    /**
     * @param null|FileData[] $fileData
     * @return static
     */
    public function setFileData( ? array $fileData = [] ) : static
    {
        $this->fileData = [];
        foreach( $fileData as $theFileData ) {
            $this->addFileData( $theFileData );
        }
        return $this;
    }

    /**
     * WindowsRegistryKeysModified
     *
     * Zero or more.
     * The registry keys that were involved in the incident.
     * See Section 3.23.
     *
     * @var WindowsRegistryKeysModified[]
     */
    private array $windowsRegistryKeysModified = [];

    /**
     * @return WindowsRegistryKeysModified[]
     */
    public function getWindowsRegistryKeysModified() : array
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
        return ! empty( $this->windowsRegistryKeysModified );
    }

    /**
     * @param WindowsRegistryKeysModified $windowsRegistryKeysModified
     * @return static
     */
    public function addWindowsRegistryKeysModified( WindowsRegistryKeysModified $windowsRegistryKeysModified ) : static
    {
        $this->windowsRegistryKeysModified[] = $windowsRegistryKeysModified;
        return $this;
    }

    /**
     * @param null|WindowsRegistryKeysModified[] $windowsRegistryKeysModified
     * @return static
     */
    public function setWindowsRegistryKeysModified( ? array $windowsRegistryKeysModified = [] ) : static
    {
        $this->windowsRegistryKeysModified = [];
        foreach( $windowsRegistryKeysModified as $theWindowsRegistryKeysModified ) {
            $this->addWindowsRegistryKeysModified( $theWindowsRegistryKeysModified );
        }
        return $this;
    }

    /**
     * CertificateData
     *
     * Zero or more.
     * The certificates that were involved in the incident.  S
     * ee Section 3.24.
     *
     * @var CertificateData[]
     */
    private array $certificateData = [];

    /**
     * @return CertificateData[]
     */
    public function getCertificateData() : array
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
        return ! empty( $this->certificateData );
    }

    /**
     * @param CertificateData $certificateData
     * @return static
     */
    public function addCertificateData( CertificateData $certificateData ) : static
    {
        $this->certificateData[] = $certificateData;
        return $this;
    }

    /**
     * @param null|CertificateData[] $certificateData
     * @return static
     */
    public function setCertificateData( ? array $certificateData = [] ) : static
    {
        $this->certificateData = [];
        foreach( $certificateData as $theCertificateData ) {
            $this->addCertificateData( $theCertificateData );
        }
        return $this;
    }

    /**
     * AdditionalData
     *
     * Zero or more.  EXTENSION.
     * An extension mechanism for data not explicitly represented in the data model.
     */
    use AdditionalDataManyTrait;
}
