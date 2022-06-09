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

use DateTime;
use Exception;
use Kigkonsult\PhpIncExSdk\Dto\Traits\AdditionalDataManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\AssessmentTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ContactManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\DescriptionManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\DetectTimeTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\DiscoveryManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\EndTimeTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\EventDataManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtRestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\MethodManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ObservableIdTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\RestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\StartTimeTrait;

/**
 * The EventData class is a container class to organize data about events that occurred during an incident.
 *
 * At least one of the aggregate classes MUST be present in an instance of the EventData class.
 * Description, DetectTime, StartTime, EndTime, RecoveryTime, ReportTime, Contact,
 * Discovery, Assessment, Method, System, Expectation, RecordData, EventData, AdditionalData
 */
class EventData extends DtoBase
{
    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isDescriptionSet() ||
            $this->isDetectTimeSet() ||
            $this->isStartTimeSet() ||
            $this->isEndTimeSet() ||
            $this->isRecoveryTimeSet() ||
            $this->isReportTimeSet() ||
            $this->isContactSet() ||
            $this->isDiscoverySet() ||
            $this->isAssessmentSet() ||
            $this->isMethodSet() ||
            $this->isSystemSet() ||
            $this->isExpectationSet() ||
            $this->isRecordDataSet() ||
            $this->isEventDataSet() ||
            $this->isAdditionalDataSet()
        );
    }

    /**
     * ATTRIBUTE restriction
     *
     * Optional.  ENUM.
     * See (rfc7970) Section 3.3.1.
     * The default value is "default".
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
     *                     is provided using the corresponding ext-* attribute.  See (rfc7970) Section 5.1.1.
     */
    use RestrictionTrait;

    /**
     * ATTRIBUTE ext-restriction
     *
     * Optional.  STRING.
     * A means by which to extend the restriction attribute.
     * See (rfc7970) Section 5.1.1.
     */
    use ExtRestrictionTrait;

    /**
     * ATTRIBUTE observable-id
     *
     * Optional.  ID.
     * See (rfc7970) Section 3.3.2.
     */
    use ObservableIdTrait;


    /**
     * Description
     *
     * Zero or more.  ML_STRING.
     * A free-form text description of the event.
     */
    use DescriptionManyTrait;

    /**
     * DetectTime
     *
     * Zero or one.  DATETIME.
     * The time the event was detected.
     * YYYY-mm-ddThh:mm:dd(.ss+)? (('+' | '-') hh ':' mm) | 'Z'
     */
    use DetectTimeTrait;

    /**
     * StartTime
     *
     * Zero or one.  DATETIME.
     * The time the event started.
     * YYYY-mm-ddThh:mm:dd(.ss+)? (('+' | '-') hh ':' mm) | 'Z'
     */
    use StartTimeTrait;

    /**
     * EndTime
     *
     * Zero or one.  DATETIME.
     * The time the event ended.
     * YYYY-mm-ddThh:mm:dd(.ss+)? (('+' | '-') hh ':' mm) | 'Z'
     */
    use EndTimeTrait;

    /**
     * RecoveryTime
     *
     * Zero or one.  DATETIME.
     * The time the site recovered from the event.
     * YYYY-mm-ddThh:mm:dd(.ss+)? (('+' | '-') hh ':' mm) | 'Z'
     *
     * @var DateTime|null
     */
    private ? DateTime $recoveryTime = null;

    /**
     * @param null|bool $asString  default true
     * @return null|string|DateTime
     */
    public function getRecoveryTime( ? bool $asString = true ) : null | string | DateTime
    {
        return ( ! empty( $this->recoveryTime ) && $asString )
            ? self::getDateTimeString( $this->recoveryTime )
            : $this->recoveryTime;
    }

    /**
     * Return bool true if recoveryTime is set
     *
     * @return bool
     */
    public function isRecoveryTimeSet() : bool
    {
        return ( null !== $this->recoveryTime );
    }

    /**
     * @param string|DateTime|null $recoveryTime
     * @return static
     * @throws Exception
     */
    public function setRecoveryTime( null|string|DateTime $recoveryTime = null ) : static
    {
        $this->recoveryTime = is_string( $recoveryTime )
            ? new DateTime( $recoveryTime )
            : $recoveryTime;
        return $this;
    }

    /**
     * ReportTime
     *
     * Zero or one.  DATETIME.
     * The time the event was reported.
     * YYYY-mm-ddThh:mm:dd(.ss+)? (('+' | '-') hh ':' mm) | 'Z'
     *
     * @var DateTime|null
     */
    private ? DateTime $reportTime = null;

    /**
     * @param null|bool $asString  default true
     * @return null|string|DateTime
     */
    public function getReportTime( ? bool $asString = true ) : null | string | DateTime
    {
        return ( ! empty( $this->reportTime ) && $asString )
            ? self::getDateTimeString( $this->reportTime )
            : $this->reportTime;
    }

    /**
     * Return bool true if reportTime is set
     *
     * @return bool
     */
    public function isReportTimeSet() : bool
    {
        return ( null !== $this->reportTime );
    }

    /**
     * @param string|DateTime|null $reportTime
     * @return static
     * @throws Exception
     */
    public function setReportTime( null|string|DateTime $reportTime ) : static
    {
        $this->reportTime = is_string( $reportTime )
            ? new DateTime( $reportTime )
            : $reportTime;
        return $this;
    }

    /**
     * Contact
     *
     * Zero or more.
     * Contact information for the parties involved in the event.
     * See (rfc7970) Section 3.9.
     */
    use ContactManyTrait;

    /**
     * Discovery
     *
     * Zero or more.
     * The means by which the event was detected.
     * See (rfc7970) Section 3.10.
     */
    use DiscoveryManyTrait;

    /**
     * Assessment
     *
     * Zero or one.
     * The impact of the event on the victim and the actions taken.
     * See (rfc7970) Section 3.12.
     */
    use AssessmentTrait;

    /**
     * Method
     *
     * Zero or more.
     * The technique used by the threat actor in the event.
     * See (rfc7970) Section 3.11.
     */
    use MethodManyTrait;

    /**
     * System
     *
     * Zero or More.
     * A host or network involved in an event.
     * See (rfc7970) Section 3.17.
     *
     * @var System[]
     */
    private array $system = [];

    /**
     * @return System[]
     */
    public function getSystem() : array
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
        return ! empty( $this->system );
    }

    /**
     * @param System $system
     * @return static
     */
    public function addSystem( System $system ) : static
    {
        $this->system[] = $system;
        return $this;
    }

    /**
     * @param null|System[] $system
     * @return static
     */
    public function setSystem( ? array $system = []) : static
    {
        $this->system = [];
        foreach( $system as $theSystem ) {
            $this->addSystem( $theSystem );
        }
        return $this;
    }

    /**
     * Expectation
     *
     * Zero or more.
     * The expected action to be performed by the recipient for the described event.
     * See (rfc7970) Section 3.15.
     *
     * @var Expectation[]
     */
    private array $expectation = [];

    /**
     * @return Expectation[]
     */
    public function getExpectation() : array
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
        return ! empty( $this->expectation );
    }

    /**
     * @param Expectation $expectation
     * @return static
     */
    public function addExpectation( Expectation $expectation ) : static
    {
        $this->expectation[] = $expectation;
        return $this;
    }

    /**
     * @param null|Expectation[] $expectation
     * @return static
     */
    public function setExpectation( ? array $expectation = [] ) : static
    {
        $this->expectation = [];
        foreach( $expectation as $theExpectation ) {
            $this->addExpectation( $theExpectation );
        }
        return $this;
    }

    /**
     * RecordData
     *
     * Zero or more.
     * (Supportive data (e.g., log files) that provides additional information about the event.)
     * Log or audit data generated by a particular tool.
     * Separate instances of the RecordData class SHOULD be used for each type of log.
     * See Section 3.22.1.
     *
     * @var RecordData[]
     */
    private array $recordData = [];

    /**
     * @return RecordData[]
     */
    public function getRecordData() : array
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
        return ! empty( $this->recordData );
    }

    /**
     * @param RecordData $recordData
     * @return static
     */
    public function addRecordData( RecordData $recordData ) : static
    {
        $this->recordData[] = $recordData;
        return $this;
    }

    /**
     * @param null|RecordData[] $recordData
     * @return static
     */
    public function setRecordData( ? array $recordData = [] ) : static
    {
        $this->recordData = [];
        foreach( $recordData as $theRecordData ) {
            $this->addRecordData( $theRecordData );
        }
        return $this;
    }

    /**¨
     * EventData
     *
     * Zero or more.
     * A recursive definition of the EventData class.
     * See (rfc7970) Section 3.14.2 for an explanation on using this class.
     */
    use EventDataManyTrait;

    /**
     * AdditionalData
     *
     * Zero or more.  EXTENSION.
     * An extension mechanism for data not explicitly represented in the data model.
     */
    use AdditionalDataManyTrait;
}
