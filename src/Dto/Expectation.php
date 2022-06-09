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

use Kigkonsult\PhpIncExSdk\Dto\Traits\ActionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ContactOneTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\DefinedCOAManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\DescriptionManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\EndTimeTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtActionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtRestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ObservableIdTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\RestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\SeverityTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\StartTimeTrait;

/**
 * The Expectation class conveys to the recipient of the IODEF document the actions the sender is requesting.
 *
 * No requirements found
 */
class Expectation extends DtoBase
{
    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return true;
    }

    /**
     * Attribute action
     *
     * Optional.  ENUM.
     * Classifies the type of action requested.
     * The default value of "other".
     * These values are maintained in the "Expectation-action" IANA registry per Section 10.2.
     *    1.   nothing.  No action is requested.  Do nothing with the information.
     *    2.   contact-source-site.  Contact the site(s) identified as the source of the activity.
     *    3.   contact-target-site.  Contact the site(s) identified as the target of the activity.
     *    4.   contact-sender.  Contact the originator of the document.
     *    5.   investigate.  Investigate the system(s) listed in the event.
     *    6.   block-host.  Block traffic from the machine(s) listed as sources in the event.
     *    7.   block-network.  Block traffic from the network(s) lists as sources in the event.
     *    8.   block-port.  Block the port listed as sources in the event.
     *    9.   rate-limit-host.  Rate-limit the traffic from the machine(s) listed as sources in the event.
     *    10.  rate-limit-network.  Rate-limit the traffic from the network(s) lists as sources in the event.
     *    11.  rate-limit-port.  Rate-limit the port(s) listed as sources in the event.
     *    12.  redirect-traffic.  Redirect traffic from the intended recipient for further analysis.
     *    13.  honeypot.  Redirect traffic from systems listed in the event to a honeypot for further analysis.
     *    14.  upgrade-software.  Upgrade or patch the software or firmware on an asset listed in the event.
     *    15.  rebuild-asset.  Reinstall the operating system or applications on an asset listed in the event.
     *    16.  harden-asset.  Change the configuration of an asset listed in the event to reduce the attack surface.
     *    17.  remediate-other.  Remediate the activity in a way other than by rate-limiting or blocking.
     *    18.  status-triage.  Confirm receipt and begin triaging the incident.
     *    19.  status-new-info.  Notify the sender when new information is received for this incident.
     *    20.  watch-and-report.  Watch for the described activity or indicators, and notify the sender when seen.
     *    21.  training.  Train user to identify or mitigate the described threat.
     *    22.  defined-coa.  Perform a predefined course of action (COA). The COA is named in the DefinedCOA class.
     *    23.  other.  Perform a custom action described in the Description class.
     *    24.  ext-value.  A value used to indicate that this attribute is extended and
     *                     the actual value is provided using the corresponding ext-* attribute.  See Section 5.1.1.
     */
    use ActionTrait;

    /**
     * Attribute ext-action
     *
     * Optional.  STRING.  A means by which to extend the action attribute.  See Section 5.1.1.
     */
    use ExtActionTrait;

    /**
     * ATTRIBUTE severity
     *
     * Optional.  ENUM.
     * Indicates the desired priority of the action.
     * This attribute is an enumerated list with no default value, and
     * the semantics of these relative measures are context dependent.
     *    1.  low.  Low priority
     *    2.  medium.  Medium priority
     *    3.  high.  High priority
     */
    use SeverityTrait;

    /**
     * ATTRIBUTE restriction
     *
     * Optional.  ENUM.
     * See Section 3.3.1.
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
     *                     is provided using the corresponding ext-* attribute.  See Section 5.1.1.
     */
    use RestrictionTrait;

    /**
     * ATTRIBUTE ext-restriction
     *
     * Optional.  STRING.
     * A means by which to extend the restriction attribute.  See Section 5.1.1.
     */
    use ExtRestrictionTrait;

    /**
     * ATTRIBUTE observable-id
     *
     * Optional.  ID.  See Section 3.3.2.
     */
    use ObservableIdTrait;

    /**
     * Description
     *
     * Zero or more.  ML_STRING.
     * A free-form text description of the desired action(s).
     */
    use DescriptionManyTrait;

    /*
     * DefinedCOA
     *
     * Zero or more.  STRING.
     * A unique identifier meaningful to the sender and recipient of this document
     * that references a course of action.  This class MUST be present if the action attribute is set to "defined-coa"
     */
    use DefinedCOAManyTrait;

    /**
     * StartTime
     *
     * Zero or one.  DATETIME.
     * The time at which the sender would like the action performed.
     * A timestamp that is earlier than the ReportTime specified in the Incident class denotes that the sender
     * would like the action performed as soon as possible.  The absence of this element indicates no expectations
     * of when the recipient would like the action performed.
     * YYYY-mm-ddThh:mm:dd(.ss+)? (('+' | '-') hh ':' mm) | 'Z'
     */
    use StartTimeTrait;

    /**
     * EndTime
     *
     * Zero or one.  DATETIME.
     * The time by which the sender expects the recipient to complete the action.
     * If the recipient cannot complete the action before EndTime, the recipient MUST NOT carry out the action.
     * Because of transit delays and clock drift, the sender MUST be prepared for the recipient to have carried
     * out the action, even if it completes past EndTime.
     * YYYY-mm-ddThh:mm:dd(.ss+)? (('+' | '-') hh ':' mm) | 'Z'
     */
    use EndTimeTrait;

    /**
     * Contact
     *
     * Zero or one.
     * The entity expected to perform the action.
     * See Section 3.9.
     */
    use ContactOneTrait;
}
