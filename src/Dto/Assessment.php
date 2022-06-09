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
use Kigkonsult\PhpIncExSdk\Dto\Traits\ConfidenceTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\CounterManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtRestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ObservableIdTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\RestrictionTrait;

/**
 * The Assessment class describes the repercussions of the incident to the victim.
 *
 * At least one instance of the possible five impact classes
 * (i.e., SystemImpact, BusinessImpact, TimeImpact, MonetaryImpact, or IntendedImpact) MUST be present.
 */
class Assessment extends DtoBase
{
    /**
     * Return bool true if any *impact is set
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return $this->isSystemImpactSet() ||
            $this->isBusinessImpactSet() ||
            $this->isTimeImpactSet() ||
            $this->isMonetaryImpactSet() ||
            $this->isIntendedImpactSet();
    }

    /**
     * ATTRIBUTE occurrence
     *
     * Optional.  ENUM.
     * Specifies whether the assessment is describing actual or potential outcomes.
     *    1.  actual.  This assessment describes activity that has occurred.
     *    2.  potential.  This assessment describes potential activity that might occur.
     *
     * @var string|null
     */
    private ? string $occurrence = null;

    /**
     * @return string|null
     */
    public function getOccurrence() : ? string
    {
        return $this->occurrence;
    }

    /**
     * Return bool true if occurrence is set
     *
     * @return bool
     */
    public function isOccurrenceSet() : bool
    {
        return ( null !== $this->occurrence );
    }

    /**
     * @param string|null $occurrence
     * @return static
     */
    public function setOccurrence( ? string $occurrence = null ) : static
    {
        $this->occurrence = $occurrence;
        return $this;
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
     * Optional.  ID.  See Section 3.3.2.
     */
    use ObservableIdTrait;

    /**
     * IncidentCategory
     *
     * Zero or more.  ML_STRING.
     * A free-form text description categorizing the type of incident.
     *
     * @var MLStringType[]
     */
    private array $incidentCategory = [];

    /**
     * @return MLStringType[]
     */
    public function getIncidentCategory() : array
    {
        return $this->incidentCategory;
    }

    /**
     * Return bool true if incidentCategory is not empty
     *
     * @return bool
     */
    public function isIncidentCategorySet() : bool
    {
        return ! empty( $this->incidentCategory );
    }

    /**
     * @param MLStringType $incidentCategory
     * @return static
     */
    public function addIncidentCategory( MLStringType $incidentCategory ) : static
    {
        $this->incidentCategory[] = $incidentCategory;
        return $this;
    }

    /**
     * @param null|MLStringType[] $incidentCategory
     * @return static
     */
    public function setIncidentCategory( ? array $incidentCategory = [] ) : static
    {
        $this->incidentCategory = [];
        foreach( $incidentCategory as $theIncidentCategory) {
            $this->addIncidentCategory( $theIncidentCategory );
        }
        return $this;
    }

    /**
     * SystemImpact
     *
     * Zero or more.
     * A technical characterization of the impact of the incident activity on the victim's enterprise.
     * See Section 3.12.1.
     *
     * @var SystemImpact[]
     */
    private array $systemImpact = [];

    /**
     * @return SystemImpact[]
     */
    public function getSystemImpact() : array
    {
        return $this->systemImpact;
    }

    /**
     * Return bool true if systemImpact is set
     *
     * @return bool
     */
    public function isSystemImpactSet() : bool
    {
        return ! empty( $this->systemImpact );
    }

    /**
     * @param SystemImpact $systemImpact
     * @return static
     */
    public function addSystemImpact( SystemImpact $systemImpact ) : static
    {
        $this->systemImpact[] = $systemImpact;
        return $this;
    }

    /**
     * @param null|SystemImpact[] $systemImpact
     * @return static
     */
    public function setSystemImpact( ? array $systemImpact = [] ) : static
    {
        $this->systemImpact = [];
        foreach( $systemImpact as $theSystemImpact ) {
            $this->addSystemImpact( $theSystemImpact );
        }
        return $this;
    }

    /**
     * BusinessBiImpact
     *
     * Zero or more.
     * BiImpact of the incident activity on the business functions of the victim organization.
     * See Section 3.12.2.
     *
     * @var BusinessImpact[]
     */
    private array $businessImpact = [];

    /**
     * @return BusinessImpact[]
     */
    public function getBusinessImpact() : array
    {
        return $this->businessImpact;
    }

    /**
     * Return bool true if businessImpact is set
     *
     * @return bool
     */
    public function isBusinessImpactSet() : bool
    {
        return ! empty( $this->businessImpact );
    }

    /**
     * @param BusinessImpact $businessImpact
     * @return static
     */
    public function addBusinessImpact( BusinessImpact $businessImpact ) : static
    {
        $this->businessImpact[] = $businessImpact;
        return $this;
    }

    /**
     * @param null|BusinessImpact[] $businessImpact
     * @return static
     */
    public function setBusinessImpact( ? array $businessImpact = [] ) : static
    {
        $this->businessImpact= [];
        foreach( $businessImpact as $theBusinessImpact ) {
            $this->addBusinessImpact( $theBusinessImpact );
        }
        return $this;
    }

    /**
     * TimeImpact
     *
     * Zero or more.
     * A characterization of the victim organization due to the incident activity as a function of time.
     * SeeSection 3.12.3.
     *
     * @var TimeImpact[]
     */
    private array $timeImpact = [];

    /**
     * @return TimeImpact[]
     */
    public function getTimeImpact() : array
    {
        return $this->timeImpact;
    }

    /**
     * Return bool true if timeImpact is set
     *
     * @return bool
     */
    public function isTimeImpactSet() : bool
    {
        return ! empty( $this->timeImpact );
    }

    /**
     * @param TimeImpact $timeImpact
     * @return static
     */
    public function addTimeImpact( TimeImpact $timeImpact ) : static
    {
        $this->timeImpact[] = $timeImpact;
        return $this;
    }

    /**
     * @param null|TimeImpact[] $timeImpact
     * @return static
     */
    public function setTimeImpact( ? array $timeImpact = [] ) : static
    {
        $this->timeImpact = [];
        foreach( $timeImpact as $theTimeImpact ) {
            $this->addTimeImpact( $theTimeImpact );
        }
        return $this;
    }

    /**
     * MonetaryImpact
     *
     * Zero or more.
     * The financial loss due to the incident activity.
     * See Section 3.12.4.
     *
     * @var MonetaryImpact[]
     */
    private array $monetaryImpact = [];

    /**
     * @return MonetaryImpact[]
     */
    public function getMonetaryImpact() : array
    {
        return $this->monetaryImpact;
    }

    /**
     * Return bool true if monetaryImpact is set
     *
     * @return bool
     */
    public function isMonetaryImpactSet() : bool
    {
        return ! empty( $this->monetaryImpact );
    }

    /**
     * @param MonetaryImpact $monetaryImpact
     * @return static
     */
    public function addMonetaryImpact( MonetaryImpact $monetaryImpact ) : static
    {
        $this->monetaryImpact[] = $monetaryImpact;
        return $this;
    }

    /**
     * @param null|MonetaryImpact[] $monetaryImpact
     * @return static
     */
    public function setMonetaryImpact( ? array $monetaryImpact = [] ) : static
    {
        $this->monetaryImpact = [];
        foreach( $monetaryImpact as $theIntendedImpact ) {
            $this->addMonetaryImpact( $theIntendedImpact );
        }
        return $this;
    }

    /**
     * IntendedBiImpact
     *
     * Zero or more.
     * The intended outcome to the victim sought by the threat actor.
     * Defined identically to the BusinessBiImpact defined in Section 3.12.2 but describes intent rather than the realized impact.
     *
     * @var IntendedImpact[]
     */
    private array $intendedImpact = [];

    /**
     * @return IntendedImpact[]
     */
    public function getIntendedImpact() : array
    {
        return $this->intendedImpact;
    }

    /**
     * Return bool true if intendedImpact is set
     *
     * @return bool
     */
    public function isIntendedImpactSet() : bool
    {
        return ! empty( $this->intendedImpact );
    }

    /**
     * @param IntendedImpact $intendedImpact
     * @return static
     */
    public function addIntendedImpact( IntendedImpact $intendedImpact ) : static
    {
        $this->intendedImpact[] = $intendedImpact;
        return $this;
    }

    /**
     * @param null|IntendedImpact[] $intendedImpact
     * @return static
     */
    public function setIntendedImpact( ? array $intendedImpact = [] ) : static
    {
        $this->intendedImpact = [];
        foreach( $intendedImpact as $theIntendedImpact ) {
            $this->addIntendedImpact( $theIntendedImpact );
        }
        return $this;
    }

    /**
     * Counter
     *
     * Zero or more.
     * A counter with which to summarize the magnitude of the activity.
     * See Section 3.18.3.
     */
    use CounterManyTrait;

    /**
     * MitigatingFactor
     *
     * Zero or more. ML_STRING.
     * A description of a mitigating factor relative to the impact on the victim organization.
     *
     * @var MLStringType[]
     */
    private array $mitigatingFactor = [];

    /**
     * @return MLStringType[]
     */
    public function getMitigatingFactor() : array
    {
        return $this->mitigatingFactor;
    }

    /**
     * Return bool true if mitigatingFactor is not empty
     *
     * @return bool
     */
    public function isMitigatingFactorSet() : bool
    {
        return ! empty( $this->mitigatingFactor );
    }

    /**
     * @param MLStringType $mitigatingFactor
     * @return static
     */
    public function addMitigatingFactor( MLStringType $mitigatingFactor ) : static
    {
        $this->mitigatingFactor[] = $mitigatingFactor;
        return $this;
    }

    /**
     * @param null|MLStringType[] $mitigatingFactor
     * @return static
     */
    public function setMitigatingFactor( ? array $mitigatingFactor = [] ) : static
    {
        $this->mitigatingFactor = [];
        foreach( $mitigatingFactor as $theMitigatingFactor) {
            $this->addMitigatingFactor( $theMitigatingFactor );
        }
        return $this;
    }

    /**
     * Cause
     *
     * Zero or more.  ML_STRING.
     * A description of an underlying cause of the impact.
     *
     * @var MLStringType[]
     */
    private array $cause = [];

    /**
     * @return MLStringType[]
     */
    public function getCause() : array
    {
        return $this->cause;
    }

    /**
     * Return bool true if cause is not empty
     *
     * @return bool
     */
    public function isCauseSet() : bool
    {
        return ! empty( $this->cause );
    }

    /**
     * @param MLStringType $cause
     * @return static
     */
    public function addCause( MLStringType $cause ) : static
    {
        $this->cause[] = $cause;
        return $this;
    }

    /**
     * @param null|MLStringType[] $cause
     * @return static
     */
    public function setCause( ? array $cause = [] ) : static
    {
        $this->cause = [];
        foreach( $cause as $theCause) {
            $this->addCause( $theCause );
        }
        return $this;
    }

    /**
     * Confidence
     *
     * Zero or one.
     * An estimate of confidence in the impact assessment.
     * See Section 3.12.5.
     */
    use ConfidenceTrait;

    /**
     * AdditionalData
     *
     * Zero or more.  EXTENSION.
     * Mechanism by which to extend the data model.
     */
    use AdditionalDataManyTrait;
}
