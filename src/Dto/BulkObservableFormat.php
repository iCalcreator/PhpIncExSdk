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

/**
 * The ObservableFormat class specifies metadata about the format of an observable
 * enumerated in a sibling BulkObservableList class.
 *
 * Hash  OR  AdditionalData  required
 */
class BulkObservableFormat extends DtoBase
{
    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isHashSet() || $this->isAdditionalDataSet());
    }

    /**
     * Hash
     *
     * Zero or one.
     * Describes the format of a hash.
     * See Section 3.26.1.
     *
     * @var Hash|null
     */
    private ? Hash $hash = null;

    /**
     * @return Hash|null
     */
    public function getHash() : ? Hash
    {
        return $this->hash;
    }

    /**
     * Return bool true if hash is set
     *
     * @return bool
     */
    public function isHashSet() : bool
    {
        return ( null !== $this->hash );
    }

    /**
     * @param Hash|null $hash
     * @return static
     */
    public function setHash( ? Hash $hash = null ) : static
    {
        $this->hash = $hash;
        return $this;
    }

    /**
     * AdditionalData
     *
     * Zero or more.  EXTENSION.
     * Mechanism by which to extend the data  model.
     */
    use AdditionalDataManyTrait;
}
