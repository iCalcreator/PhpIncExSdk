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

use Kigkonsult\PhpIncExSdk\Dto\Traits\CategoryTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\DescriptionManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtCategoryTrait;

/**
 * The NodeRole class describes the function performed by or role of a particular system, asset, or network.
 *
 * NodeRole MUST have ATTRIBUTE(s) category
 */
class NodeRole extends DtoBase
{
    /**
     * Factory method with required property category
     *
     * @param string $category
     * @return static
     */
    public static function factoryCategory( string $category ) : static
    {
        return parent::factory()
            ->setCategory( $category );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return $this->isCategorySet();
    }

    /**
     * ATTRIBUTE category
     *
     * Required.  ENUM.
     * Function or role of a node.
     * These values are  maintained in the "NodeRole-category" IANA registry per Section 10.2.
     *    1.   client.  Client computer.
     *    2.   client-enterprise.  Client computer on the enterprise network.
     *    3.   client-partner.  Client computer on network of a partner.
     *    4.   client-remote.  Client computer remotely connected to the enterprise network.
     *    5.   client-kiosk.  Client computer serving as a kiosk.
     *    6.   client-mobile.  Mobile device.
     *    7.   server-internal.  Server with internal services.
     *    8.   server-public.  Server with public services.
     *    9.   www.  WWW server.
     *    10.  mail.  Mail server.
     *    11.  webmail.  Web mail server.
     *    12.  messaging.  Messaging server (e.g., NNTP, IRC, IM).
     *    13.  streaming.  Streaming-media server.
     *    14.  voice.  Voice server (e.g., SIP, H.323).
     *    15.  file.  File server.
     *    16.  ftp.  FTP server.
     *    17.  p2p.  Peer-to-peer node.
     *    18.  name.  Name server (e.g., DNS, WINS).
     *    19.  directory.  Directory server (e.g., LDAP, finger, whois).
     *    20.  credential.  Credential server (e.g., domain controller, Kerberos).
     *    21.  print.  Print server.
     *    22.  application.  Application server.
     *    23.  database.  Database server.
     *    24.  backup.  Backup server.
     *    25.  dhcp.  DHCP server.
     *    26.  assessment.  Assessment server (e.g., vulnerability scanner, endpoint assessment).
     *    27.  source-control.  Source code control server.
     *    28.  config-management.  Configuration management server.
     *    29.  monitoring.  Security monitoring server (e.g., IDS).
     *    30.  infra.  Infrastructure server (e.g., router, firewall, DHCP).
     *    31.  infra-firewall.  Firewall.
     *    32.  infra-router.  Router.
     *    33.  infra-switch.  Switch.
     *    34.  camera.  Camera and video system.
     *    35.  proxy.  Proxy server.
     *    36.  remote-access.  Remote access server.
     *    37.  log.  Log server (e.g., syslog).
     *    38.  virtualization.  Server running virtual machines.
     *    39.  pos.  Point-of-sale device.
     *    40.  scada.  Supervisory control and data acquisition (SCADA) system.
     *    41.  scada-supervisory.  Supervisory system for a SCADA.
     *    42.  sinkhole.  Traffic sinkhole destination.
     *    43.  honeypot.  Honeypot server.
     *    44.  anonymization.  Anonymization server (e.g., Tor node).
     *    45.  c2-server.  Malicious command and control server.
     *    46.  malware-distribution.  Server that distributes malware
     *    47.  drop-server.  Server to which exfiltrated content is uploaded.
     *    48.  hop-point.  Intermediary server used to get to a victim.
     *    49.  reflector.  A system used in a reflector attack.
     *    50.  phishing-site.  Site hosting phishing content.
     *    51.  spear-phishing-site.  Site hosting spear-phishing content.
     *    52.  recruiting-site.  Site to recruit.
     *    53.  fraudulent-site.  Fraudulent site.
     *    54.  ext-value.  A value used to indicate that this attribute is extended
     *                     and the actual value is provided using the corresponding ext-* attribute.  See (rfc7970) Section 5.1.1.
     */
    use CategoryTrait;

    /**
     * ATTRIBUTE ext-category
     *
     * Optional.  STRING.
     * A means by which to extend the category attribute.
     * See (rfc7970) Section 5.1.1.
     */
    use ExtCategoryTrait;

    /**
     * Description
     *
     * Zero or more.  ML_STRING.
     * A free-form text description of the role of the system.
     */
    use DescriptionManyTrait;
}
