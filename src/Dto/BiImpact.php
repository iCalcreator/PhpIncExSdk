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

use Kigkonsult\PhpIncExSdk\Dto\Traits\DescriptionManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtTypeTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\SeverityTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\TypeTrait;

/**
 * Parent class for BusinessBiImpact and IndendedImpact
 *
 * BiImpact MUST have ATTRIBUTE(s) type
 */
abstract class BiImpact extends DtoBase
{
    /**
     * Factory method with required properties
     *
     * @param string $type
     * @return static
     */
    public static function factoryType( string $type ) : static
    {
        return parent::factory()
            ->setType( $type );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return $this->isTypeSet();
    }

    /**
     * ATTRIBUTE severity
     *
     * Optional.  ENUM.
     * Characterizes the severity of the incident on business functions.
     * The permitted values are shown below.
     * They were derived from Table 3-2 of [NIST800.61rev2].
     * The defaultvalue is "unknown".
     * These values are maintained in the "BusinessBiImpact-severity" IANA registry per Section 10.2.
     *    1.  none.  No effect to the organization's ability to provide all services to all users.
     *    2.  low.  Minimal effect as the organization can still provide all critical services to all users but has lost efficiency.
     *    3.  medium.  The organization has lost the ability to provide a critical service to a subset of system users.
     *    4.  high.  The organization is no longer able to provide some critical services to any users.
     *    5.  unknown.  The impact is not known.
     *    6.  ext-value.  A value used to indicate that this attribute is extended and the actual value is provided
     *                    using the corresponding ext-* attribute.  See Section 5.1.1.
     */
    use SeverityTrait;

    /**
     * ATTRIBUTE ext-severity
     *
     * Optional.  STRING.
     * A means by which to extend the severity attribute.
     * See Section 5.1.1.
     *
     * @var string|null
     */
    protected ? string $extSeverity = null;

    /**
     * @return string|null
     */
    public function getExtSeverity() : ? string
    {
        return $this->extSeverity;
    }

    /**
     * Return bool true if extSeverity is set
     *
     * @return bool
     */
    public function isExtSeveritySet() : bool
    {
        return ( null !== $this->extSeverity );
    }

    /**
     * @param string|null $extSeverity
     * @return static
     */
    public function setExtSeverity( ? string $extSeverity ) : static
    {
        $this->extSeverity = $extSeverity;
        return $this;
    }

    /**
     * ATTRIBUTE type
     *
     * Required.  ENUM.
     * Characterizes the effect this incident and on the business.
     * The permitted values are shown below.
     * The default value is "unknown".
     * These values are maintained in the"BusinessBiImpact-type" IANA registry per Section 10.2.
     *    1.   breach-proprietary.  Sensitive or proprietary information was accessed or exfiltrated.
     *    2.   breach-privacy.  Personally identifiable information was accessed or exfiltrated.
     *    3.   breach-credential.  Credential information was accessed or exfiltrated.
     *    4.   loss-of-integrity.  Sensitive or proprietary information was changed or deleted.
     *    5.   loss-of-service.  Service delivery was disrupted.
     *    6.   theft-financial.  Money was stolen.
     *    7.   theft-service.  Services were misappropriated.
     *    8.   degraded-reputation.  The reputation of the organization's brand was diminished.
     *    9.   asset-damage.  A cyber-physical system was damaged.
     *    10.  asset-manipulation.  A cyber-physical system was manipulated.
     *    11.  legal.  The incident resulted in legal or regulatory action.
     *    12.  extortion.  The incident resulted in actors extorting the victim organization.
     *    13.  unknown.  The impact is unknown.
     *    14.  ext-value.  A value used to indicate that this attribute is extended
     *                     and the actual value is provided using the corresponding ext-* attribute.  See Section 5.1.1.
     */
    use TypeTrait;

    /**
     * ATTRIBUTE ext-type
     *
     * Optional.  STRING.
     * A means by which to extend the type attribute.
     * See Section 5.1.1.
     */
    use ExtTypeTrait;

    /**
     * Description
     *
     * Zero or more.  ML_STRING.
     * A free-form text description of the impact to the organization.
     */
    use DescriptionManyTrait;
}
