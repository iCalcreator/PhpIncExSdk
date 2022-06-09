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
use Kigkonsult\PhpIncExSdk\Dto\Traits\ObservableIdTrait;

/**
 * The Certificate class describes a given X.509 certificate or certificate chain.
 *
 * Certificate MUST have at least one instance of ds:X509Data
 */
class Certificate extends DtoBase
{
    /**
     * Factory method with required property
     *
     * @param string $x509Data
     * @return static
     */
    public static function factoryX509Data( string $x509Data ) : static
    {
        return parent::factory()
            ->setX509Data( $x509Data );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return $this->isX509DataSet();
    }

    /**
     * ATTRIBUTE observable-id
     *
     * Optional.  ID.
     * See (rfc7970) Section 3.3.2.
     */
    use ObservableIdTrait;

    /**
     * ds:X509Data
     *
     * One.
     * A given X.509 certificate or chain.
     * See (rfc7970) Section 4.4.4 of [W3C.XMLSIG].
     * For now, string...
     *
     * @var string|null
     */
    private ? string $x509Data = null;

    /**
     * @return string|null
     */
    public function getX509Data() : ? string
    {
        return $this->x509Data;
    }

    /**
     * Return bool true if x509Data is set
     *
     * @return bool
     */
    public function isX509DataSet() : bool
    {
        return ( null !== $this->x509Data );
    }

    /**
     * @param string|null $x509Data
     * @return static
     */
    public function setX509Data( ? string $x509Data = null ) : static
    {
        $this->x509Data = $x509Data;
        return $this;
    }

    /**
     * Description
     *
     * Zero or more.  ML_STRING.
     * A free-form text description explaining the context of this certificate.
     */
    use DescriptionManyTrait;
}
