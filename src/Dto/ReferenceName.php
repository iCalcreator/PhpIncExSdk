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

use Kigkonsult\PhpIncExSdk\Dto\Traits\AssertIDLISTTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\IdTypeTrait;

/**
 * Reference identifier per [https://www.rfc-editor.org/rfc/rfc7495]
 *
 * ReferenceName MUST have ATTRIBUTE(s) specIndex
 * ReferenceName MUST have at least one instance of ID
 */
class ReferenceName extends DtoBase
{
    /**
     * Factory method with required properties specIndex && ID
     *
     * @param int $specIndex
     * @param string $id
     * @return static
     */
    public static function factorySpecIndexId( int $specIndex, string $id ) : static
    {
        return parent::factory()
            ->setSpecIndex( $specIndex )
            ->setId( $id );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isSpecIndexSet() && $this->isIdSet());
    }

    /**
     * ATTRIBUTE specIndex
     *
     * Required.  INTEGER.
     * Enumeration identifier.
     * This value corresponds to an entry in the "Enumeration Reference Type Identifiers" IANA registry
     * with an identical SpecIndex value.
     *
     * @var int|null
     */
    private ? int $specIndex = null;

    /**
     * @return int|null
     */
    public function getSpecIndex() : ?int
    {
        return $this->specIndex;
    }

    /**
     * Return bool true if specIndex is set
     *
     * @return bool
     */
    public function isSpecIndexSet() : bool
    {
        return ( null !== $this->specIndex );
    }

    /**
     * @param int|null $specIndex
     * @return static
     */
    public function setSpecIndex( ? int $specIndex = null ) : static
    {
        $this->specIndex = $specIndex;
        return $this;
    }

    /**
     * ID
     *
     * IDtype One.
     * The identifier assigned to represent the particular enumeration object being referenced.
     */
    use IdTypeTrait;
    use AssertIDLISTTrait;
}
