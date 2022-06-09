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
use Kigkonsult\PhpIncExSdk\Dto\Traits\ContactManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\DescriptionManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\EndTimeTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtRestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\NodeRoleManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ReferenceManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\RestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\StartTimeTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\UidRefTrait;

/**
 * The Indicator class describes an indicator.
 * An indicator consists of observable features and phenomenon that aid in the forensic or proactive detection
 * of malicious activity and associated metadata.
 * An indicator can be described outright by referencing or composing previously defined indicators or
 * by referencing observables described in the incident report found in this document.
 *
 * Indicator MUST have at least one instance of IndicatorID
 * The Indicator class MUST have exactly one instance of an
 * Observable, IndicatorExpression, uid-ref, or IndicatorReference class.
 */
class Indicator extends DtoBase
{
    /**
     * Factory method with required properties
     *
     * @param IndicatorID $indicatorID
     * @return static
     */
    public static function factoryIndicatorID( IndicatorID $indicatorID ) : static
    {
        return parent::factory()
            ->setIndicatorID( $indicatorID );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isIndicatorIDSet() && (
            $this->isObservableSet() || $this->isIndicatorExpressionSet() ||
            $this->isUidRefSet() || $this->isIndicatorReferenceSet())
        );
    }

    /**
     * ATTRIBUTE restriction
     *
     * Optional.  ENUM.
     * See (rfc7970) Section 3.3.1.
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
     * A means by which to extend the restriction attribute.  See (rfc7970) Section 5.1.1.
     */
    use ExtRestrictionTrait;


    /**
     * IndicatorID
     *
     * One.
     * An identifier for this indicator.
     * See (rfc7970) Section 3.29.1.
     *
     * @var IndicatorID|null
     */
    private ? IndicatorID $indicatorID = null;

    /**
     * @return IndicatorID|null
     */
    public function getIndicatorID() : ? IndicatorID
    {
        return $this->indicatorID;
    }

    /**
     * Return bool true if indicatorID is set
     *
     * @return bool
     */
    public function isIndicatorIDSet() : bool
    {
        return ( null !== $this->indicatorID );
    }

    /**
     * @param IndicatorID|null $indicatorID
     * @return static
     */
    public function setIndicatorID( ? IndicatorID $indicatorID = null ) : static
    {
        $this->indicatorID = $indicatorID;
        return $this;
    }

    /**
     * AlternativeIndicatorID
     *
     * Zero or more.
     * An alternative identifier for this indicator.
     * See (rfc7970) Section 3.29.2.
     *
     * @var AlternativeIndicatorID[]
     */
    private array $alternativeIndicatorID = [];

    /**
     * @return AlternativeIndicatorID[]
     */
    public function getAlternativeIndicatorID() : array
    {
        return $this->alternativeIndicatorID;
    }

    /**
     * Return bool true if alternativeIndicatorID is set
     *
     * @return bool
     */
    public function isAlternativeIndicatorIDSet() : bool
    {
        return ! empty( $this->alternativeIndicatorID );
    }

    /**
     * @param AlternativeIndicatorID $alternativeIndicatorID
     * @return static
     */
    public function addAlternativeIndicatorID( AlternativeIndicatorID $alternativeIndicatorID ) : static
    {
        $this->alternativeIndicatorID[] = $alternativeIndicatorID;
        return $this;
    }

    /**
     * @param null|AlternativeIndicatorID[] $alternativeIndicatorID
     * @return static
     */
    public function setAlternativeIndicatorID( ? array $alternativeIndicatorID = [] ) : static
    {
        $this->alternativeIndicatorID = [];
        foreach( $alternativeIndicatorID as $theAlternativeIndicatorID ) {
            $this->addAlternativeIndicatorID( $theAlternativeIndicatorID );
        }
        return $this;
    }

    /**
     * Description
     *
     * Zero or more.  ML_STRING.
     * A free-form text description of the indicator.
     */
    use DescriptionManyTrait;

    /**
     * StartTime
     *
     * Zero or one.  DATETIME.
     * A timestamp of the start of the time period during which this indicator is valid.
     * YYYY-mm-ddThh:mm:dd(.ss+)? (('+' | '-') hh ':' mm) | 'Z'
     */
    use StartTimeTrait;

    /**
     * EndTime
     *
     * Zero or one.  DATETIME.
     * A timestamp of the end of the time period during which this indicator is valid.
     * YYYY-mm-ddThh:mm:dd(.ss+)? (('+' | '-') hh ':' mm) | 'Z'
     */
    use EndTimeTrait;

    /**
     * Confidence
     *
     * Zero or one.
     * An estimate of the confidence in the quality of the indicator.
     * See (rfc7970) Section 3.12.5.
     */
    use ConfidenceTrait;

    /**
     * Contact
     *
     * Zero or more.
     * Contact information for this indicator.
     * See (rfc7970) Section 3.9.
     */
    use ContactManyTrait;

    /**
     * Observable
     *
     * Zero or one.
     * An observable feature or phenomenon of this indicator.
     * See (rfc7970) Section 3.29.3.
     *
     * @var Observable|null
     */
    private ? Observable $observable = null;

    /**
     * @return Observable|null
     */
    public function getObservable() : ? Observable
    {
        return $this->observable;
    }

    /**
     * Return bool true if observable is set
     *
     * @return bool
     */
    public function isObservableSet() : bool
    {
        return ( null !== $this->observable );
    }

    /**
     * @param Observable|null $observable
     * @return static
     */
    public function setObservable( ? Observable $observable = null ) : static
    {
        $this->observable = $observable;
        return $this;
    }

    /**
     * uid-ref
     *
     * Zero or one. IDREF. (ObservableReference)
     * An identifier that serves as a reference to a class in the IODEF document.
     * The referenced class will have this identifier set in its observable-id attribute.
     */
    use UidRefTrait;

    /**
     * IndicatorExpression
     *
     * Zero or one.
     * A composition of observables.
     * See (rfc7970) Section 3.29.4.
     *
     * @var IndicatorExpression|null
     */
    private ? IndicatorExpression $indicatorExpression = null;

    /**
     * @return IndicatorExpression|null
     */
    public function getIndicatorExpression() : ? IndicatorExpression
    {
        return $this->indicatorExpression;
    }

    /**
     * Return bool true if indicatorExpression is set
     *
     * @return bool
     */
    public function isIndicatorExpressionSet() : bool
    {
        return ( null !== $this->indicatorExpression );
    }

    /**
     * @param IndicatorExpression|null $indicatorExpression
     * @return static
     */
    public function setIndicatorExpression( ? IndicatorExpression $indicatorExpression = null ) : static
    {
        $this->indicatorExpression = $indicatorExpression;
        return $this;
    }

    /**
     * IndicatorReference
     *
     * Zero or one.
     * A reference to an indicator.
     * See (rfc7970) Section 3.29.7.
     *
     * @var IndicatorReference|null
     */
    private ? IndicatorReference $indicatorReference = null;

    /**
     * @return IndicatorReference|null
     */
    public function getIndicatorReference() : ? IndicatorReference
    {
        return $this->indicatorReference;
    }

    /**
     * Return bool true if indicatorReference is set
     *
     * @return bool
     */
    public function isIndicatorReferenceSet() : bool
    {
        return ( null !== $this->indicatorReference );
    }

    /**
     * @param IndicatorReference|null $indicatorReference
     * @return static
     */
    public function setIndicatorReference( ? IndicatorReference $indicatorReference = null ) : static
    {
        $this->indicatorReference = $indicatorReference;
        return $this;
    }

    /**
     * NodeRole
     *
     * Zero or more.
     * The role of the system in the attack should this indicator be matched to it.
     * See (rfc7970) Section 3.18.2.
     */
    use NodeRoleManyTrait;

    /**
     * AttackPhase
     *
     * Zero or more.
     * The phase in an attack life cycle during which this indicator might be seen.
     * See (rfc7970) Section 3.29.8.
     *
     * @var AttackPhase[]
     */
    private array $attackPhase = [];

    /**
     * @return AttackPhase[]
     */
    public function getAttackPhase() : array
    {
        return $this->attackPhase;
    }

    /**
     * Return bool true if attackPhase is set
     *
     * @return bool
     */
    public function isAttackPhaseSet() : bool
    {
        return ! empty( $this->attackPhase );
    }

    /**
     * @param AttackPhase $attackPhase
     * @return static
     */
    public function addAttackPhase( AttackPhase $attackPhase ) : static
    {
        $this->attackPhase[] = $attackPhase;
        return $this;
    }

    /**
     * @param null|AttackPhase[] $attackPhase
     * @return static
     */
    public function setAttackPhase( ? array $attackPhase = [] ) : static
    {
        $this->attackPhase = [];
        foreach( $attackPhase as $theAttackPhase ) {
            $this->addAttackPhase( $theAttackPhase );
        }
        return $this;
    }

    /**
     * Reference
     *
     * Zero or more.
     * A reference to additional information relevant to this indicator.
     * See (rfc7970) Section 3.11.1.
     */
    use ReferenceManyTrait;

    /**
     * AdditionalData
     *
     * Zero or more.  EXTENSION.
     * Mechanism by which to extend the data model.
     */
    use AdditionalDataManyTrait;
}
