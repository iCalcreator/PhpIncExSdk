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

use Kigkonsult\PhpIncExSdk\Dto\Traits\UidRefTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\VersionTrait;

/**
 * The IndicatorReference describes a reference to an indicator.
 * This reference may be to an indicator described in this IODEF document or in a previously exchanged IODEF document.
 *
 * Either the uid-ref or the euid-ref attribute MUST be set.
 */
class IndicatorReference extends DtoBase
{
    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isUidRefSet() || $this->isEuidRefSet());
    }

    /**
     * ATTRIBUTE uid-ref
     *
     * Optional.  IDREF.
     * An identifier that references an Indicator class in the IODEF document.
     * The referenced Indicator class will have this identifier set in its IndicatorID class.
     */
    use UidRefTrait;

    /**
     * euid-ref
     *
     * Optional.  STRING.
     * An identifier that references an IndicatorID not in this IODEF document.
     *
     * @var string|null
     */
    private ? string $euidRef = null;

    /**
     * @return string|null
     */
    public function getEuidRef() : ? string
    {
        return $this->euidRef;
    }

    /**
     * Return bool true if euidRef is set
     *
     * @return bool
     */
    public function isEuidRefSet() : bool
    {
        return ( null !== $this->euidRef );
    }

    /**
     * @param string|null $euidRef
     * @return static
     */
    public function setEuidRef( ? string $euidRef = null ) : static
    {
        $this->euidRef = $euidRef;
        return $this;
    }

    /**
     * ATTRIBUTE version
     *
     * Optional.  STRING.
     * A version number of an indicator.
     */
    use VersionTrait;
}
