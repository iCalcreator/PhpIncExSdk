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
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtTypeTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\TypeTrait;

/**
 * The BulkObservable class allows the enumeration of a single type of observable without requiring
 * each one to be encoded individually in multiple instances of the same class.
 *
 * BulkObservable MUST have at least one instance of BulkObservableList
 */
class BulkObservable extends DtoBase
{
    /**
     * Factory method with required property
     *
     * @param string $bulkObservableList
     * @return static
     */
    public static function factoryBulkObservableList( string $bulkObservableList ) : static
    {
        return parent::factory()
            ->setBulkObservableList( $bulkObservableList );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return $this->isBulkObservableListSet();
    }

    /**
     * ATTRIBUTE type
     *
     * Optional.  ENUM.
     * The type of the observable listed in the child ObservableList class.
     * These values are maintained in the "BulkObservable-type" IANA registry per Section 10.2.
     *    1.   asn.  Autonomous System Number (per the Address@category attribute).
     *    2.   atm.  Asynchronous Transfer Mode (ATM) address (per the Address@category attribute).
     *    3.   e-mail.  Email address (per the Address@category attribute).
     *    4.   ipv4-addr.  IPv4 host address in dotted-decimal notation, e.g., 192.0.2.1 (per the Address@category attribute).
     *    5.   ipv4-net.  IPv4 network address in dotted-decimal notation,  slash, significant bits,
     *                    e.g., 192.0.2.0/24 (per the Address@category attribute).
     *    6.   ipv4-net-mask.  IPv4 network address in dotted-decimal notation, slash, network mask
     *                         in dotted-decimal notation, i.e., 192.0.2.0/255.255.255.0 (per the Address@category attribute).
     *    7.   ipv6-addr.  IPv6 host address, e.g., 2001:DB8::3 (per the Address@category attribute).
     *    8.   ipv6-net.  IPv6 network address, slash, significant bits, e.g., 2001:DB8::/32 (per the Address@category attribute).
     *    9.   ipv6-net-mask.  IPv6 network address, slash, network mask (per the Address@category attribute).
     *    10.  mac.  Media Access Control (MAC) address, i.e., a:b:c:d:e:f (per the Address@category attribute).
     *    11.  site-uri.  A URL or URI for a resource (per the Address@category attribute).
     *    12.  domain-name.  A fully qualified domain name or part of a name (e.g., fqdn.example.com, example.com).
     *    13.  domain-to-ipv4.  A mapping of FQDN to IPv4 address specified as a comma-separated list
     *                          (e.g., "fqdn.example.com,192.0.2.1").
     *    14.  domain-to-ipv6.  A mapping of FQDN to IPv6 address specified as a comma-separated list
     *                          (e.g., "fqdn.example.com, 2001:DB8::3").
     *    15.  domain-to-ipv4-timestamp.  Same as domain-to-ipv4 but with a timestamp (in the DATETIME format)
     *                                    of the resolution (e.g., "fqdn.example.com, 192.0.2.1, 2015-06-11T00:38:31-06:00").
     *    16.  domain-to-ipv6-timestamp.  Same as domain-to-ipv6 but with a timestamp (in the DATETIME format)
     *                                    of the resolution (e.g., "fqdn.example.com, 2001:DB8::3, 2015-06-11T00:38:31-06:00").
     *    17.  ipv4-port.  An IPv4 address, port, and protocol tuple (e.g., 192.0.2.1, 80, TCP).
     *                     The protocol name corresponds to the "Keyword" column
     *                     in the "Assigned Internet Protocol Numbers" registry [IANA.Protocols].
     *    18.  ipv6-port.  An IPv6 address, port, and protocol tuple (e.g., 2001:DB8::3, 80, TCP).
     *                     The protocol name corresponds to the "Keyword" column in
     *                     the "Assigned Internet Protocol Numbers" registry [IANA.Protocols].
     *    19.  windows-reg-key.  A Microsoft Windows registry key.
     *    20.  file-hash.  A file hash.  The format of this hash is described in the Hash class that MUST be
     *                     present in a sibling BulkObservableFormat class.
     *    21.  email-x-mailer.  An X-Mailer field from an email.
     *    22.  email-subject.  An email subject line.
     *    23.  http-user-agent.  A User Agent field from an HTTP request header
     *                           (e.g., "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0").
     *    24.  http-request-uri.  The Request URI from an HTTP request header.
     *    25.  mutex.  The name of a system mutex (mutual exclusion lock).
     *    26.  file-path.  A file path (e.g., "/tmp/local/file", "c:\windows\system32\file.sys").
     *    27.  user-name.  A username.
     *    28.  ext-value.  A value used to indicate that this attribute is extended and the actual value
     *                     is provided using the corresponding ext-* attribute.  See Section 5.1.1.
     */
    use TypeTrait;

    /**
     * ATTRIBUTE ext-type
     *
     * Optional.  STRING.
     * A means by which to extend the type attribute. See Section 5.1.1.
     */
    use ExtTypeTrait;

    /**
     * BulkObservableFormat
     *
     * Zero or one.
     * Provides additional metadata about the observables  enumerated in the BulkObservableList class.
     * See Section 3.29.3.1.1.
     *
     * @var BulkObservableFormat|null
     */
    private ? BulkObservableFormat $bulkObservableFormat = null;

    /**
     * @return BulkObservableFormat|null
     */
    public function getBulkObservableFormat() : ? BulkObservableFormat
    {
        return $this->bulkObservableFormat;
    }

    /**
     * Return bool true if bulkObservableFormat is set
     *
     * @return bool
     */
    public function isBulkObservableFormatSet() : bool
    {
        return ( null !== $this->bulkObservableFormat );
    }

    /**
     * @param BulkObservableFormat|null $bulkObservableFormat
     * @return static
     */
    public function setBulkObservableFormat( ? BulkObservableFormat $bulkObservableFormat = null ) : static
    {
        $this->bulkObservableFormat = $bulkObservableFormat;
        return $this;
    }

    /**
     * BulkObservableList
     *
     * One.  STRING.
     * A list of observables, one per line.
     * Each line is separated with either a LF character or CR and LF characters.
     * The type attribute specifies which observables will be listed.
     *
     * @var string|null
     */
    private ? string $bulkObservableList = null;

    /**
     * @return string|null
     */
    public function getBulkObservableList() : ? string
    {
        return $this->bulkObservableList;
    }

    /**
     * Return bool true if bulkObservableList is set
     *
     * @return bool
     */
    public function isBulkObservableListSet() : bool
    {
        return ( null !== $this->bulkObservableList );
    }

    /**
     * @param string|null $bulkObservableList
     * @return static
     */
    public function setBulkObservableList( ? string $bulkObservableList = null ) : static
    {
        $this->bulkObservableList = $bulkObservableList;
        return $this;
    }

    /**
     * AdditionalData
     *
     * Zero or more.  EXTENSION.  Mechanism by which to extend the data  model.
     */
    use AdditionalDataManyTrait;
}
