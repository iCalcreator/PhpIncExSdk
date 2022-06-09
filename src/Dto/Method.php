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
use Kigkonsult\PhpIncExSdk\Dto\Traits\DescriptionManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtRestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\RestrictionTrait;

/**
 * The Method class describes the tactics, techniques, procedures, or weakness used by the threat actor in an incident.
 * This class consists of both a list of references describing the attack methods and weaknesses
 * and a free-form text description.
 *
 * An instance of one of these children MUST be present.
 * Reference, Description, sci:AttackPattern, sci:Vulnerability, sci:Weakness, AdditionalData
 */
class Method extends DtoBase
{
    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isReferenceSet() ||
            $this->isDescriptionSet() ||
            $this->isAttackPatternSet() ||
            $this->isVulnerabilitySet() ||
            $this->isWeaknessSet() ||
            $this->isAdditionalDataSet()
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
     * A means by which to extend the restriction attribute.
     * See (rfc7970) Section 5.1.1.
     */
    use ExtRestrictionTrait;

    /**
     * Reference
     *
     * Zero or more.
     * A reference to a vulnerability, malware sample, advisory, or analysis of an attack technique.
     * See (rfc7970) Section 3.11.1.
     *
     * @var Reference[]
     */
    private array $reference = [];

    /**
     * @return Reference[]
     */
    public function getReference() : array
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
        return ! empty( $this->reference );
    }

    /**
     * @param Reference $reference
     * @return static
     */
    public function addReference( Reference $reference ) : static
    {
        $this->reference[] = $reference;
        return $this;
    }

    /**
     * @param null|Reference[] $reference
     * @return static
     */
    public function setReference( ? array $reference = [] ) : static
    {
        $this->reference = [];
        foreach( $reference as $theReference ) {
            $this->addReference( $theReference );
        }
        return $this;
    }

    /*
     * Description
     *
     * Zero or more.  ML_STRING.
     * A free-form text description of techniques, tactics, or procedures used by the threat actor.
     */
    use DescriptionManyTrait;

    /**
     * sci:AttackPattern
     *
     * Zero or more.
     * A reference to a pattern of attack or exploitation per [RFC7203].
     *
     * @var AttackPattern[]
     */
    private array $attackPattern = [];

    /**
     * @return AttackPattern[]
     */
    public function getAttackPattern() : array
    {
        return $this->attackPattern;
    }

    /**
     * Return bool true if attackPattern is not empty
     *
     * @return bool
     */
    public function isAttackPatternSet() : bool
    {
        return ! empty( $this->attackPattern );
    }

    /**
     * @param AttackPattern $attackPattern
     * @return static
     */
    public function addAttackPattern( AttackPattern $attackPattern ) : static
    {
        $this->attackPattern[] = $attackPattern;
        return $this;
    }

    /**
     * @param null|AttackPattern[] $attackPattern
     * @return static
     */
    public function setAttackPattern( ? array $attackPattern = [] ) : static
    {
        $this->attackPattern = [];
        foreach( $attackPattern as $theAttackPattern) {
            $this->addAttackPattern( $theAttackPattern );
        }
        return $this;
    }

    /**
     * sci:Vulnerability
     *
     * Zero or more.
     * A reference to a vulnerability per [RFC7203].
     *
     * @var Vulnerability[]
     */
    private array $vulnerability = [];

    /**
     * @return Vulnerability[]
     */
    public function getVulnerability() : array
    {
        return $this->vulnerability;
    }

    /**
     * Return bool true if vulnerability is not empty
     *
     * @return bool
     */
    public function isVulnerabilitySet() : bool
    {
        return ! empty( $this->vulnerability );
    }

    /**
     * @param Vulnerability $vulnerability
     * @return static
     */
    public function addVulnerability( Vulnerability $vulnerability ) : static
    {
        $this->vulnerability[] = $vulnerability;
        return $this;
    }

    /**
     * @param null|Vulnerability[] $vulnerability
     * @return static
     */
    public function setVulnerability( ? array $vulnerability = [] ) : static
    {
        $this->vulnerability = [];
        foreach( $vulnerability as $theVulnerability) {
            $this->addVulnerability( $theVulnerability );
        }
        return $this;
    }

    /**
     * sci:Weakness
     *
     * Zero or more.
     * A reference to the exploited weakness per [RFC7203].
     *
     * @var Weakness[]
     */
    private array $weakness = [];

    /**
     * @return Weakness[]
     */
    public function getWeakness() : array
    {
        return $this->weakness;
    }

    /**
     * Return bool true if weakness is set
     *
     * @return bool
     */
    public function isWeaknessSet() : bool
    {
        return ! empty( $this->weakness );
    }

    /**
     * @param Weakness $weakness
     * @return static
     */
    public function addWeakness( Weakness $weakness ) : static
    {
        $this->weakness[] = $weakness;
        return $this;
    }

    /**
     * @param null|Weakness[] $weakness
     * @return static
     */
    public function setWeakness( ? array $weakness = [] ) : static
    {
        $this->weakness = [];
        foreach( $weakness as $theWeakness ) {
            $this->addWeakness( $theWeakness );
        }
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
