<?php

declare(strict_types=1);

/**
 * The MIT License (MIT).
 *
 * Copyright (c) 2017-2020 Michael Dekker (https://github.com/firstred)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and
 * associated documentation files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish, distribute,
 * sublicense, and/or sell copies of the Software, and to permit persons to whom the Software
 * is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or
 * substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT
 * NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
 * DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * @author    Michael Dekker <git@michaeldekker.nl>
 * @copyright 2017-2020 Michael Dekker
 * @license   https://opensource.org/licenses/MIT The MIT License
 */

namespace Firstred\PostNL\Entity\Request;

use Firstred\PostNL\Entity\AbstractEntity;
use Firstred\PostNL\Exception\InvalidArgumentException;

/**
 * Class FindNearestLocationsRequest.
 *
 * This class is both the container and can be the actual FindNearestLocationsRequest object itself!
 */
final class FindNearestLocationsRequest extends AbstractEntity
{
    /**
     * Country code.
     *
     * @pattern ^(?:NL|BE)$
     *
     * @example NL
     *
     * @var string|null
     *
     * @since   1.0.0
     */
    private $countrycode;

    /**
     * Postal code.
     *
     * @pattern ^.{1,10}$
     *
     * @example 2132WT
     *
     * @var string|null
     *
     * @since   2.0.0
     */
    private $postalCode;

    /**
     * City.
     *
     * @pattern ^.{0,35}$
     *
     * @example Hoofddorp
     *
     * @var string|null
     *
     * @since   2.0.0
     */
    private $city;

    /**
     * Street.
     *
     * @pattern ^.{0,95}$
     *
     * @example Siriusdreef
     *
     * @var string|null
     *
     * @since   2.0.0
     */
    private $street;

    /**
     * House number.
     *
     * @pattern ^\d{1,10}$
     *
     * @example 42
     *
     * @var int|null
     *
     * @since   2.0.0
     */
    private $houseNumber;

    /**
     * Delivery date.
     *
     * @pattern ^(?:0[1-9]|[1-2][0-9]|3[0-1])-(?:0[1-9]|1[0-2])-[0-9]{4}$
     *
     * @example 03-07-2019
     *
     * @var string|null
     *
     * @since   2.0.0
     */
    private $deliveryDate;

    /**
     * Opening time.
     *
     * @pattern ^(?:2[0-3]|[01]?[0-9]):(?:[0-5]?[0-9]):(?:[0-5]?[0-9])$
     *
     * @example 09:00:00
     *
     * @var string|null
     *
     * @since   2.0.0
     */
    private $openingTime;

    /**
     * Delivery options.
     *
     * @pattern ^(?:PG|PGE)$
     *
     * @example PGE
     *
     * @var array|null
     *
     * @since   2.0.0
     */
    private $deliveryOptions;

    /**
     * Get country code.
     *
     * @return string|null
     *
     * @since 1.0.0
     * @since 2.0.0
     * @see   FindNearestLocationsRequest::$countrycode
     */
    public function getCountrycode(): ?string
    {
        return $this->countrycode;
    }

    /**
     * Set country code.
     *
     * @pattern ^(?:NL|BE)$
     *
     * @example NL
     *
     * @param string|null $countrycode
     *
     * @return static
     *
     * @since   1.0.0
     * @since   2.0.0
     * @see     FindNearestLocationsRequest::$countrycode
     */
    public function setCountrycode(?string $countrycode): FindNearestLocationsRequest
    {
        $this->countrycode = $countrycode;

        return $this;
    }

    /**
     * Get postal code.
     *
     * @return string|null
     *
     * @since 2.0.0
     * @see   FindNearestLocationsRequest::$postalCode
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * Set postal code.
     *
     * @pattern ^.{1,10}$
     *
     * @example 2132WT
     *
     * @param string|null $postalCode
     *
     * @return static
     *
     * @throws InvalidArgumentException
     *
     * @since   2.0.0
     * @see     FindNearestLocationsRequest::$postalCode
     */
    public function setPostalCode(?string $postalCode): FindNearestLocationsRequest
    {
        $this->postalCode = $this->validate->postcode($postalCode);

        return $this;
    }

    /**
     * Get city.
     *
     * @return string|null
     *
     * @since 2.0.0
     * @see   FindNearestLocationsRequest::$city
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * Set city.
     *
     * @pattern ^.{0,35}$
     *
     * @example Hoofddorp
     *
     * @param string|null $city
     *
     * @return static
     *
     * @throws InvalidArgumentException
     *
     * @since   2.0.0
     * @see     FindNearestLocationsRequest::$city
     */
    public function setCity(?string $city): FindNearestLocationsRequest
    {
        $this->city = $this->validate->city($city);

        return $this;
    }

    /**
     * Get street.
     *
     * @return string|null
     *
     * @since 2.0.0
     * @see   FindNearestLocationsRequest::$street
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * Set street.
     *
     * @pattern ^.{0,95}$
     *
     * @example Siriusdreef
     *
     * @param string|null $street
     *
     * @return static
     *
     * @throws InvalidArgumentException
     *
     * @since   2.0.0
     * @see     FindNearestLocationsRequest::$street
     */
    public function setStreet(?string $street): FindNearestLocationsRequest
    {
        $this->street = $this->validate->street($street);

        return $this;
    }

    /**
     * Get house number.
     *
     * @return int|null
     *
     * @since 2.0.0
     * @see   FindNearestLocationsRequest::$houseNumber
     */
    public function getHouseNumber(): ?int
    {
        return $this->houseNumber;
    }

    /**
     * Set house number.
     *
     * @pattern ^\d{1,10}$
     *
     * @example 42
     *
     * @param int|string|null $houseNumber
     *
     * @return static
     *
     * @throws InvalidArgumentException
     *
     * @since   2.0.0
     * @see     FindNearestLocationsRequest::$houseNumber
     */
    public function setHouseNumber($houseNumber): FindNearestLocationsRequest
    {
        $this->houseNumber = $this->validate->integer($houseNumber);

        return $this;
    }

    /**
     * Get delivery date.
     *
     * @return string|null
     *
     * @since 2.0.0
     * @see   FindNearestLocationsRequest::$deliveryDateq
     */
    public function getDeliveryDate(): ?string
    {
        return $this->deliveryDate;
    }

    /**
     * Set delivery date.
     *
     * @pattern ^(?:0[1-9]|[1-2][0-9]|3[0-1])-(?:0[1-9]|1[0-2])-[0-9]{4}$
     *
     * @example 03-07-2019
     *
     * @param string|null $deliveryDate
     *
     * @return static
     *
     * @throws InvalidArgumentException
     *
     * @since   2.0.0
     * @see     FindNearestLocationsRequest::$deliveryDate
     */
    public function setDeliveryDate(?string $deliveryDate): FindNearestLocationsRequest
    {
        $this->deliveryDate = $this->validate->date($deliveryDate);

        return $this;
    }

    /**
     * Get opening time.
     *
     * @return string|null
     *
     * @since 2.0.0
     * @see   FindNearestLocationsRequest::$openingTime
     */
    public function getOpeningTime(): ?string
    {
        return $this->openingTime;
    }

    /**
     * Set opening time.
     *
     * @pattern ^(?:2[0-3]|[01]?[0-9]):(?:[0-5]?[0-9]):(?:[0-5]?[0-9])$
     *
     * @example 09:00:00
     *
     * @param string|null $openingTime
     *
     * @return static
     *
     * @throws InvalidArgumentException
     *
     * @since   2.0.0
     * @see     FindNearestLocationsRequest::$openingTime
     */
    public function setOpeningTime(?string $openingTime): FindNearestLocationsRequest
    {
        $this->openingTime = $this->validate->time($openingTime);

        return $this;
    }

    /**
     * Get delivery options.
     *
     * @return array|null
     *
     * @since 2.0.0
     * @see   FindNearestLocationsRequest::$deliveryOptions
     */
    public function getDeliveryOptions(): ?array
    {
        return $this->deliveryOptions;
    }

    /**
     * Set delivery options.
     *
     * @pattern ^(?:PG|PGE)$
     *
     * @example PGE
     *
     * @param array|null $deliveryOptions
     *
     * @return static
     *
     * @since   2.0.0
     * @see     FindNearestLocationsRequest::$deliveryOptions
     */
    public function setDeliveryOptions(?array $deliveryOptions): FindNearestLocationsRequest
    {
        $this->deliveryOptions = $deliveryOptions;

        return $this;
    }
}