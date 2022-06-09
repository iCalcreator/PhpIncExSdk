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
use Kigkonsult\PhpIncExSdk\Dto\Traits\AssertIDLISTTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ConfidenceTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\IndicatorReferenceManyTrait;

/**
 * The IndicatorExpression describes an expression composed of observed phenomenon, features, or indicators.
 * Elements of the expression can be described directly, reference relevant data from other parts of a
 * given IODEF document, or reference previously defined indicators.
 *
 * No requirements found
 */
class IndicatorExpression extends DtoBase
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
     * ATTRIBUTE operator
     *
     * Optional.  ENUM.
     * The operator to be applied between the child elements.
     * See (rfc7970) Section 3.29.5 for parsing guidance.
     * The default value is "and".
     * These values are maintained in the "IndicatorExpression-operator" IANA registry per Section 10.2.
     *    1.  not.  negation operator.
     *    2.  and.  conjunction operator.
     *    3.  or.  disjunction operator.
     *    4.  xor.  exclusive disjunction operator.
     * @var string|null
     */
    private ? string $operator = null;

    /**
     * @return string|null
     */
    public function getOperator() : ? string
    {
        return $this->operator;
    }

    /**
     * Return bool true if operator is set
     *
     * @return bool
     */
    public function isOperatorSet() : bool
    {
        return ( null !== $this->operator );
    }

    /**
     * @param string|null $operator
     * @return static
     */
    public function setOperator( ? string $operator = null ) : static
    {
        $this->operator = $operator;
        return $this;
    }

    /**
     * ATTRIBUTE ext-operator
     *
     * Optional.  STRING.
     * A means by which to extend the operator attribute.  See (rfc7970) Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $extOperator = null;

    /**
     * @return string|null
     */
    public function getExtOperator() : ? string
    {
        return $this->extOperator;
    }

    /**
     * Return bool true if extOperator is set
     *
     * @return bool
     */
    public function isExtOperatorSet() : bool
    {
        return ( null !== $this->extOperator );
    }

    /**
     * @param string|null $extOperator
     * @return static
     */
    public function setExtOperator( ? string $extOperator = null ) : static
    {
        $this->extOperator = $extOperator;
        return $this;
    }

    /**
     * IndicatorExpression
     *
     * Zero or more.
     * An expression composed of other observables or indicators.
     * See (rfc7970) Section 3.29.4.
     *
     * @var IndicatorExpression[]
     */
    private array $indicatorExpression = [];

    /**
     * @return IndicatorExpression[]
     */
    public function getIndicatorExpression() : array
    {
        return $this->indicatorExpression;
    }

    /**
     * Return bool true if indicatorExpression is set
     *
     * @return bool
     */
    public function isIndicatorExpressionSet() : bool
    {
        return ! empty( $this->indicatorExpression );
    }

    /**
     * @param IndicatorExpression $indicatorExpression
     * @return static
     */
    public function addIndicatorExpression( IndicatorExpression $indicatorExpression ) : static
    {
        $this->indicatorExpression[] = $indicatorExpression;
        return $this;
    }

    /**
     * @param null|IndicatorExpression[] $indicatorExpression
     * @return static
     */
    public function setIndicatorExpression( ? array $indicatorExpression = [] ) : static
    {
        $this->indicatorExpression = [];
        foreach( $indicatorExpression as $theIndicatorExpression ) {
            $this->addIndicatorExpression( $theIndicatorExpression );
        }
        return $this;
    }

    /**
     * Observable
     *
     * Zero or more.
     * A description of an observable.
     * See (rfc7970) Section 3.29.3.
     *
     * @var Observable[]
     */
    private array $observable = [];

    /**
     * @return Observable[]
     */
    public function getObservable() : array
    {
        return $this->observable;
    }

    /**
     * Return bool true if observable is set
     *
     * @return bool
     */
    public function isObservableSet() : bool
    {
        return ! empty( $this->observable );
    }

    /**
     * @param Observable $observable
     * @return static
     */
    public function addObservable( Observable $observable ) : static
    {
        $this->observable[] = $observable;
        return $this;
    }

    /**
     * @param null|Observable[] $observable
     * @return static
     */
    public function setObservable( ? array $observable = [] ) : static
    {
        $this->observable = [];
        foreach( $observable as $theObservable ) {
            $this->addObservable( $theObservable );
        }
        return $this;
    }

    /**
     * uid-ref IDREF
     *
     * Zero or more.
     * A reference to an observable.
     * See (rfc7970) Section 3.29.6.
     *
     * @var string[]
     */
    private array $uidRef = [];

    /**
     * @return string[]
     */
    public function getUidRef() : array
    {
        return $this->uidRef;
    }

    /**
     * Return bool true if uidRef is set
     *
     * @return bool
     */
    public function isUidRefSet() : bool
    {
        return ! empty( $this->uidRef );
    }

    /**
     * @param string $uidRef
     * @return static
     */
    public function addUidRef( string $uidRef ) : static
    {
        $this->assertIDLIST( self::UID_REF, $uidRef );
        $this->uidRef[] = $uidRef;
        return $this;
    }

    /**
     * @param null|string[] $uidRef
     * @return static
     */
    public function setUidRef( ? array $uidRef = [] ) : static
    {
        $this->uidRef = [];
        foreach( $uidRef as $theUidRef ) {
            $this->addUidRef( $theUidRef );
        }
        return $this;
    }

    use AssertIDLISTTrait;

    /**
     * IndicatorReference
     *
     * Zero or more.
     * An expression composed of other observables or indicators.
     * See (rfc7970) Section 3.29.4.
     */
    use IndicatorReferenceManyTrait;

    /**
     * Confidence
     *
     * Zero or one.
     * An estimate of the confidence in the quality of the terms expressed in the expression.
     * See (rfc7970) Section 3.12.5.
     */
    use ConfidenceTrait;

    /**
     * AdditionalData
     *
     * Zero or more.  EXTENSION.
     * Mechanism by which to extend the data  model.
     */
    use AdditionalDataManyTrait;
}
