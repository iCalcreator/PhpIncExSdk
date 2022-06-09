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
use Kigkonsult\PhpIncExSdk\Dto\Traits\ContactManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\DescriptionManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\DetectTimeTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\DiscoveryManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\EndTimeTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\EventDataManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtRestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\IncidentIDOneTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\LangTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\MethodManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ObservableIdTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\RestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\StartTimeTrait;

/**
 * The Incident class describes commonly exchanged information
 * when reporting or sharing derived analysis from security incidents.
 *
 * Incident MUST have ATTRIBUTE(s) purpose
 * Incident MUST have at least one instance of IncidentID, GenerationTime and Contact
 */
class Incident extends DtoBase
{
    /**
     * Factory method with required property purpose
     *
     * @param string $purpose
     * @return static
     */
    public static function factoryPurpose( string $purpose ) : static
    {
        return parent::factory()
            ->setPurpose( $purpose );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isPurposeSet() &&
            $this->isIncidentIDSet() &&
            $this->isGenerationTimeSet() &&
            $this->isContactSet()
        );
    }
    /**
     * ATTRIBUTE purpose
     *
     * Required.  ENUM.
     * The purpose attribute describes the rationale for documenting the information in this class.
     * It is closely related to the Expectation class (Section 3.15).
     * These values are maintained in the "Incident-purpose" IANA registry per Section 10.2.
     * This attribute is defined as an enumerated list:
     *    1.  traceback.  The incident was sent for trace-back purposes.
     *    2.  mitigation.  The incident was sent to request aid in mitigating the described activity.
     *    3.  reporting.  The incident was sent to comply with reporting requirements.
     *    4.  watch.  The incident was sent to convey indicators that shouldbe monitored.
     *    5.  other.  The incident was sent for purposes specified in the Expectation class.
     *    6.  ext-value.  A value used to indicate that this attribute is extended and the actual value
     *                    is provided using the corresponding ext-* attribute.  See Section 5.1.1.

     * @var string|null
     */
    private ? string $purpose = null;

    /**
     * @return string|null
     */
    public function getPurpose() : ? string
    {
        return $this->purpose;
    }

    /**
     * Return bool true if purpose is set
     *
     * @return bool
     */
    public function isPurposeSet() : bool
    {
        return ( null !== $this->purpose );
    }

    /**
     * @param string|null $purpose
     * @return static
     */
    public function setPurpose( ? string $purpose = null ) : static
    {
        $this->purpose = $purpose;
        return $this;
    }

    /**
     * ATTRIBUTE ext-purpose
     *
     * Optional.  STRING.
     * A means by which to extend the purpose attribute.
     * See Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $extPurpose = null;

    /**
     * @return string|null
     */
    public function getExtPurpose() : ? string
    {
        return $this->extPurpose;
    }

    /**
     * Return bool true if extPurpose is set
     *
     * @return bool
     */
    public function isExtPurposeSet() : bool
    {
        return ( null !== $this->extPurpose );
    }

    /**
     * @param string|null $extPurpose
     * @return static
     */
    public function setExtPurpose( ? string $extPurpose = null ) : static
    {
        $this->extPurpose = $extPurpose;
        return $this;
    }

    /**
     * ATTRIBUTE status
     *
     * Optional.  ENUM.
     * The status attribute conveys the state in a workflow where the incident is currently found.
     * These values are maintained in the "Incident-status" IANA registry per Section 10.2.
     * This attribute is defined as an enumerated list:
     *    1.  new.  The incident is newly reported, and no action has been taken.
     *    2.  in-progress.  The incident is under investigation.
     *    3.  forwarded.  The incident has been forwarded to another party for handling.
     *    4.  resolved.  The investigation into the activity in this incident has concluded.
     *    5.  future.  The described activity has not yet been detected.
     *    6.  ext-value.  A value used to indicate that this attribute is extended and the actual value
     *                    is provided using the corresponding ext-* attribute.  See Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $status = null;

    /**
     * @return string|null
     */
    public function getStatus() : ? string
    {
        return $this->status;
    }

    /**
     * Return bool true if status is set
     *
     * @return bool
     */
    public function isStatusSet() : bool
    {
        return ( null !== $this->status );
    }

    /**
     * @param string|null $status
     * @return static
     */
    public function setStatus( ? string $status = null ) : static
    {
        $this->status = $status;
        return $this;
    }

    /**
     * ATTRIBUTE ext-status
     *
     * Optional.  STRING.
     * A means by which to extend the status attribute.
     * See Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $extStatus = null;

    /**
     * @return string|null
     */
    public function getExtStatus() : ? string
    {
        return $this->extStatus;
    }

    /**
     * Return bool true if extStatus is set
     *
     * @return bool
     */
    public function isExtStatusSet() : bool
    {
        return ( null !== $this->extStatus );
    }

    /**
     * @param string|null $extStatus
     * @return static
     */
    public function setExtStatus( ? string $extStatus = null ) : static
    {
        $this->extStatus = $extStatus;
        return $this;
    }

    /**
     * ATTRIBUTE lang
     *
     * Optional.  ENUM. (xml:lang)
     * A language identifier per Section 2.12 of [W3C.XML] whose values and form are described in [RFC5646].
     * The interpretation of this code is described in Section 6.
     */
    use LangTrait;

    /**
     * ATTRIBUTE restriction
     *
     * Optional.  ENUM.
     * See Section 3.3.1.
     * The default value is "private".
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
     * IncidentID
     *
     * One.
     * An incident tracking number assigned to this incident by the CSIRT that generated the IODEF document.
     * See Section 3.4.
     */
    use IncidentIDOneTrait;

    /**
     * AlternativeID
     *
     * Zero or one.
     * The incident tracking numbers used by other CSIRTs to refer to the incident described in the document.
     * See Section 3.5.
     *
     * @var AlternativeID|null
     */
    private ? AlternativeID $alternativeID = null;

    /**
     * @return AlternativeID|null
     */
    public function getAlternativeID() : ? AlternativeID
    {
        return $this->alternativeID;
    }

    /**
     * Return bool true if alternativeID is set
     *
     * @return bool
     */
    public function isAlternativeIDSet() : bool
    {
        return ( null !== $this->alternativeID );
    }

    /**
     * @param AlternativeID|null $alternativeID
     * @return static
     */
    public function setAlternativeID( ? AlternativeID $alternativeID = null ) : static
    {
        $this->alternativeID = $alternativeID;
        return $this;
    }

    /**
     * RelatedActivity
     *
     * Zero or more.
     * Related activity and attribution of this activity.
     * See Section 3.6.
     *
     * @var RelatedActivity[]
     */
    private array $relatedActivity = [];

    /**
     * @return RelatedActivity[]
     */
    public function getRelatedActivity() : array
    {
        return $this->relatedActivity;
    }

    /**
     * Return bool true if incident is set
     *
     * @return bool
     */
    public function isRelatedActivitySet() : bool
    {
        return ! empty( $this->relatedActivity );
    }

    /**
     * @param RelatedActivity $relatedActivity
     * @return static
     */
    public function addRelatedActivity( RelatedActivity $relatedActivity ) : static
    {
        $this->relatedActivity[] = $relatedActivity;
        return $this;
    }

    /**
     * @param null|RelatedActivity[] $relatedActivity
     * @return static
     */
    public function setRelatedActivity( ? array $relatedActivity = [] ) : static
    {
        $this->relatedActivity = [];
        foreach( $relatedActivity as $theRelatedActivity ) {
            $this->addRelatedActivity( $theRelatedActivity );
        }
        return $this;
    }

    /**
     * DetectTime
     *
     * Zero or one.  DATETIME.
     * The time the incident was first detected.
     * YYYY-mm-ddThh:mm:dd(.ss+)? (('+' | '-') hh ':' mm) | 'Z'
     */
    use DetectTimeTrait;

    /**
     * StartTime
     *
     * Zero or one.  DATETIME.
     * The time the incident started.
     * YYYY-mm-ddThh:mm:dd(.ss+)? (('+' | '-') hh ':' mm) | 'Z'
     */
    use StartTimeTrait;

    /**
     * EndTime
     *
     * Zero or one.  DATETIME.
     * The time the incident ended.
     * YYYY-mm-ddThh:mm:dd(.ss+)? (('+' | '-') hh ':' mm) | 'Z'
     */
    use EndTimeTrait;

    /**
     * RecoveryTime
     *
     * Zero or one.  DATETIME.
     * The time the site recovered from the incident.
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
     * Return bool true if dateTime is set
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
    public function setRecoveryTime( null|string|DateTime $recoveryTime ) : static
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
     * The time the incident was reported.
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
     * Return bool true if dateTime is set
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
     * GenerationTime
     *
     * One.  DATETIME.
     * The time the content in this Incident class was generated.
     * YYYY-mm-ddThh:mm:dd(.ss+)? (('+' | '-') hh ':' mm) | 'Z'
     *
     * @var DateTime|null
     */
    private ? DateTime $generationTime = null;

    /**
     * @param null|bool $asString  default true
     * @return null|string|DateTime
     */
    public function getGenerationTime( ? bool $asString = true ) : null | string | DateTime
    {
        return ( ! empty( $this->generationTime ) && $asString )
            ? self::getDateTimeString( $this->generationTime )
            : $this->generationTime;
    }

    /**
     * Return bool true if dateTime is set
     *
     * @return bool
     */
    public function isGenerationTimeSet() : bool
    {
        return ( null !== $this->generationTime );
    }

    /**
     * @param string|DateTime|null $generationTime
     * @return static
     * @throws Exception
     */
    public function setGenerationTime( null|string|DateTime $generationTime ) : static
    {
        $this->generationTime = is_string( $generationTime )
            ? new DateTime( $generationTime )
            : $generationTime;
        return $this;
    }

    /**
     * Description
     *
     * Zero or more.  ML_STRING.
     * A free-form text description of the incident.
     */
    use DescriptionManyTrait;

    /**
     * Discovery
     *
     * Zero or more.
     * The means by which this incident was detected.
     * See Section 3.10.
     */
    use DiscoveryManyTrait;

    /**
     * Assessment
     *
     * Zero or more.
     * A characterization of the impact of the incident.
     * See Section 3.12.
     *
     * @var Assessment[]
     */
    private array $assessment = [];

    /**
     * @return Assessment[]|null
     */
    public function getAssessment() : ? array
    {
        return $this->assessment;
    }

    /**
     * Return bool true if assessment is set
     *
     * @return bool
     */
    public function isAssessmentSet() : bool
    {
        return ! empty( $this->assessment );
    }

    /**
     * @param Assessment $assessment
     * @return static
     */
    public function addAssessment( Assessment $assessment ) : static
    {
        $this->assessment[] = $assessment;
        return $this;
    }

    /**
     * @param null|Assessment[] $assessment
     * @return static
     */
    public function setAssessment( ? array $assessment = [] ) : static
    {
        $this->assessment = [];
        foreach( $assessment as $theAssessment ) {
            $this->addAssessment( $theAssessment );
        }
        return $this;
    }

    /**
     * Method
     *
     * Zero or more.
     * The techniques used by the threat actor in the incident.
     * See Section 3.11.
     */
    use MethodManyTrait;

    /**
     * Contact
     *
     * One or more.
     * Contact information for the parties involved in the incident.
     * See Section 3.9.
     */
    use ContactManyTrait;

    /**
     * EventData
     *
     * Zero or more.
     * Description of the events comprising the incident.
     * See Section 3.14.
     */
    use EventDataManyTrait;

    /**
     * Indicator
     *
     * Zero or more.
     * Indicators from the analysis of an incident.
     * See Section 3.28-29.
     *
     * @var Indicator[]
     */
    private array $indicator = [];

    /**
     * @return Indicator[]
     */
    public function getIndicator() : array
    {
        return $this->indicator;
    }

    /**
     * Return bool true if indicator is set
     *
     * @return bool
     */
    public function isIndicatorSet() : bool
    {
        return ! empty( $this->indicator );
    }

    /**
     * @param Indicator $indicator
     * @return static
     */
    public function addIndicator( Indicator $indicator ) : static
    {
        $this->indicator[] = $indicator;
        return $this;
    }

    /**
     * @param null|Indicator[] $indicator
     * @return static
     */
    public function setIndicator( ? array $indicator = [] ) : static
    {
        $this->indicator = [];
        foreach( $indicator as $theIndicator ) {
            $this->addIndicator( $theIndicator );
        }
        return $this;
    }

    /**
     * History
     *
     * Zero or one.
     * A log of significant events or actions that occurred during the course of handling the incident.
     * See Section 3.13.
     *
     * @var History|null
     */
    private ? History $history = null;

    /**
     * @return History|null
     */
    public function getHistory() : ? History
    {
        return $this->history;
    }

    /**
     * Return bool true if history is set
     *
     * @return bool
     */
    public function isHistorySet() : bool
    {
        return ( null !== $this->history );
    }

    /**
     * @param History|null $history
     * @return static
     */
    public function setHistory( ?History $history ) : static
    {
        $this->history = $history;
        return $this;
    }

    /**
     * AdditionalData
     *
     * Zero or more.  EXTENSION.
     * Mechanism by which to extend the data model.
     */
    use AdditionalDataManyTrait;
}
