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
 * The SystemImpact class describes the technical impact of the incident to the systems on the network.
 *
 * SystemImpact MUST have ATTRIBUTE(s) type
 */
class SystemImpact extends DtoBase
{
    /**
     * Factory method with required property type
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
     * An estimate of the relative severity of the activity.
     * The permitted values are shown below.
     * There is no default value.
     *    1.  low.  Low severity
     *    2.  medium.  Medium severity
     *    3.  high.  High severity
     */
    use SeverityTrait;

    /**
     * ATTRIBUTE completion
     *
     * Optional.  ENUM.
     * An indication whether the described activity was successful.
     * The permitted values are shown below.
     * There is no default value.
     *    1.  failed.  The attempted activity was not successful.
     *    2.  succeeded.  The attempted activity succeeded.
     *
     * @var string|null
     */
    private ? string $completion = null;

    /**
     * @return string|null
     */
    public function getCompletion() : ? string
    {
        return $this->completion;
    }

    /**
     * Return bool true if completion is set
     *
     * @return bool
     */
    public function isCompletionSet() : bool
    {
        return ( null !== $this->completion );
    }

    /**
     * @param string|null $completion
     * @return static
     */
    public function setCompletion( ? string $completion = null ) : static
    {
        $this->completion = $completion;
        return $this;
    }

    /**
     * ATTRIBUTE type
     *
     * Required.  ENUM.
     * Classifies the impact.  The permitted values are shown below.
     * The default value is "unknown".
     * These values are maintained in the "SystemImpact-type" IANA registry per Section 10.2.
     *    1.   takeover-account.  Control was taken of a given account.
     *    2.   takeover-service.  Control was taken of a given service.
     *    3.   takeover-system.  Control was taken of a given system.
     *    4.   cps-manipulation.  A cyber-physical system was manipulated.
     *    5.   cps-damage.  A cyber-physical system was damaged.
     *    6.   availability-data.  Access to particular data was degraded or denied.
     *    7.   availability-account.  Access to an account was degraded or denied.
     *    8.   availability-service.  Access to a service was degraded or denied.
     *    9.   availability-system.  Access to a system was degraded or denied.
     *    10.  damaged-system.  Hardware on a system was irreparably damaged.
     *    11.  damaged-data.  Data on a system was deleted.
     *    12.  breach-proprietary.  Sensitive or proprietary information was accessed or exfiltrated.
     *    13.  breach-privacy.  Personally identifiable information was accessed or exfiltrated.
     *    14.  breach-credential.  Credential information was accessed or exfiltrated.
     *    15.  breach-configuration.  System configuration or data inventory was access or exfiltrated.
     *    16.  integrity-data.  Data on the system was modified.
     *    17.  integrity-configuration.  Application or system configuration was modified.
     *    18.  integrity-hardware.  Firmware of a hardware component was modified.
     *    19.  traffic-redirection.  Network traffic on the system was redirected
     *    20.  monitoring-traffic.  Network traffic emerging from a host or enclave was monitored.
     *    21.  monitoring-host.  System activity (e.g., running processes, keystrokes) were monitored.
     *    22.  policy.  Activity violated the system owner's acceptable use policy.
     *    23.  unknown.  The impact is unknown.
     *    24.  ext-value.  A value used to indicate that this attribute is extended
     *                     and the actual value is provided using the corresponding ext-* attribute.  See (rfc7970) Section 5.1.1.
     */
    use TypeTrait;

    /**
     * ATTRIBUTE type
     *
     * Optional.  STRING.
     * A means by which to extend the type attribute.
     * See (rfc7970) Section 5.1.1.
     */
    use ExtTypeTrait;

    /**
     * Description
     *
     * Zero or more.  ML_STRING.  A free-form text description of the impact to the system.
     */
    use DescriptionManyTrait;
}
