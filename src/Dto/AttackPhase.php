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
use Kigkonsult\PhpIncExSdk\Dto\Traits\DescriptionManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\UrlManyTrait;

/**
 * The AttackPhase class describes a particular phase of an attack life cycle.
 *
 * AttackPhase MUST have at least one instance of a child class.
 * AttackPhaseID, URL, Description, AdditionalData
 */
class AttackPhase extends DtoBase
{
    /**
     * Factory method with property AttackPhaseID
     *
     * @param string $attackPhaseID
     * @return static
     */
    public static function factoryAttackPhaseID( string $attackPhaseID ) : static
    {
        return parent::factory()
            ->addAttackPhaseID( $attackPhaseID );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isAttackPhaseIDSet() ||
            $this->isURLSet() ||
            $this->isDescriptionSet() ||
            $this->isAdditionalDataSet()
        );
    }

    /**
     * AttackPhaseID
     *
     * Zero or more.  STRING.
     * An identifier for the phase of the attack.
     *
     * @var string[]
     */
    protected array $attackPhaseID = [];

    /**
     * @return string[]
     */
    public function getAttackPhaseID() : array
    {
        return $this->attackPhaseID;
    }

    /**
     * Return bool true if attackPhaseID is not empty
     *
     * @return bool
     */
    public function isAttackPhaseIDSet() : bool
    {
        return ! empty( $this->attackPhaseID );
    }

    /**
     * @param string $attackPhaseID
     * @return static
     */
    public function addAttackPhaseID( string $attackPhaseID ) : static
    {
        $this->attackPhaseID[] = $attackPhaseID;
        return $this;
    }

    /**
     * @param null|string[] $attackPhaseID
     * @return static
     */
    public function setAttackPhaseID( ? array $attackPhaseID = [] ) : static
    {
        $this->attackPhaseID = [];
        foreach( $attackPhaseID as $theAttackPhaseID) {
            $this->addAttackPhaseID( $theAttackPhaseID );
        }
        return $this;
    }

    /**
     * URL
     *
     * Zero or more.  URL.
     * A URL to a resource describing this phase of the attack.
     */
    use UrlManyTrait;

    /**
     * Description
     *
     * Zero or more.  ML_STRING.
     * A free-form text description of this phase of the attack.
     */
    use DescriptionManyTrait;

    /**
     * AdditionalData
     *
     * Zero or more.  EXTENSION.
     * Mechanism by which to extend the data  model.
     */
    use AdditionalDataManyTrait;
}
