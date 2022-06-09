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
namespace Kigkonsult\PhpIncExSdk\Dto\Traits;

trait ObservableIdTrait
{
    /**
     * observable-id Attribute
     *
     * The observable-id attribute tags information in the document as an observable so that it can be referenced
     * later in the description of an indicator.  The value of this attribute is a unique identifier in
     * the scope of the document.  It is used by the ObservableReference class to enumerate observables
     * when defining an indicator with the IndicatorData class.
     *
     * IDtype = text .regexp "[a-zA-Z_][a-zA-Z0-9_.-]*"
     *
     * @var string|null
     */
    protected ? string $observableId = null;

    /**
     * @return string|null
     */
    public function getObservableId() : ? string
    {
        return $this->observableId;
    }

    /**
     * Return bool true if observableId is set
     *
     * @return bool
     */
    public function isObservableIdSet() : bool
    {
        return ( null !== $this->observableId );
    }

    /**
     * @param string|null $observableId
     * @return static
     */
    public function setObservableId( ? string $observableId = null ) : static
    {
        $this->assertIDLIST( self::OBSERVABLE_ID, $observableId );
        $this->observableId = $observableId;
        return $this;
    }

    use AssertIDLISTTrait;
}
