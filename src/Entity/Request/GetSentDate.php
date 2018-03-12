<?php
/**
 * The MIT License (MIT)
 *
 * Copyright (c) 2017-2018 Thirty Development, LLC
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
 * @author    Michael Dekker <michael@thirtybees.com>
 * @copyright 2017-2018 Thirty Development, LLC
 * @license   https://opensource.org/licenses/MIT The MIT License
 */

namespace ThirtyBees\PostNL\Entity\Request;

use Sabre\Xml\Writer;
use ThirtyBees\PostNL\Entity\AbstractEntity;
use ThirtyBees\PostNL\Service\BarcodeService;
use ThirtyBees\PostNL\Service\ConfirmingService;
use ThirtyBees\PostNL\Service\DeliveryDateService;
use ThirtyBees\PostNL\Service\LabellingService;
use ThirtyBees\PostNL\Service\LocationService;
use ThirtyBees\PostNL\Service\ShippingStatusService;
use ThirtyBees\PostNL\Service\TimeframeService;

/**
 * Class GetSentDate
 *
 * @package ThirtyBees\PostNL\Entity
 *
 * @method bool         getAllowSundaySorting()
 * @method string       getCity()
 * @method string       getCountryCode()
 * @method string       getHouseNr()
 * @method string       getHouseNrExt()
 * @method string[]     getOptions()
 * @method string       getPostalCode()
 * @method string       getDeliveryDate()
 * @method string       getShippingDuration()
 * @method string       getStreet()
 *
 * @method GetSentDate setAllowSundaySorting(bool $allowSundaySorting)
 * @method GetSentDate setCity(string $city)
 * @method GetSentDate setCountryCode(string $code)
 * @method GetSentDate setHouseNr(string $houseNr)
 * @method GetSentDate setHouseNrExt(string $houseNrExt)
 * @method GetSentDate setOptions(array $options)
 * @method GetSentDate setDeliveryDate(string $date)
 * @method GetSentDate setShippingDuration(string $duration)
 * @method GetSentDate setStreet(string $street)
 */
class GetSentDate extends AbstractEntity
{
    /**
     * Default properties and namespaces for the SOAP API
     *
     * @var array $defaultProperties
     */
    public static $defaultProperties = [
        'Barcode' => [
            'AllowSundaySorting' => BarcodeService::DOMAIN_NAMESPACE,
            'City'               => BarcodeService::DOMAIN_NAMESPACE,
            'CountryCode'        => BarcodeService::DOMAIN_NAMESPACE,
            'DeliveryDate'       => BarcodeService::DOMAIN_NAMESPACE,
            'HouseNr'            => BarcodeService::DOMAIN_NAMESPACE,
            'HouseNrExt'         => BarcodeService::DOMAIN_NAMESPACE,
            'Options'            => BarcodeService::DOMAIN_NAMESPACE,
            'PostalCode'         => BarcodeService::DOMAIN_NAMESPACE,
            'ShippingDuration'   => BarcodeService::DOMAIN_NAMESPACE,
            'Street'             => BarcodeService::DOMAIN_NAMESPACE,
        ],
        'Confirming'     => [
            'AllowSundaySorting' => ConfirmingService::DOMAIN_NAMESPACE,
            'City'               => ConfirmingService::DOMAIN_NAMESPACE,
            'CountryCode'        => ConfirmingService::DOMAIN_NAMESPACE,
            'DeliveryDate'       => ConfirmingService::DOMAIN_NAMESPACE,
            'HouseNr'            => ConfirmingService::DOMAIN_NAMESPACE,
            'HouseNrExt'         => ConfirmingService::DOMAIN_NAMESPACE,
            'Options'            => ConfirmingService::DOMAIN_NAMESPACE,
            'PostalCode'         => ConfirmingService::DOMAIN_NAMESPACE,
            'ShippingDuration'   => ConfirmingService::DOMAIN_NAMESPACE,
            'Street'             => ConfirmingService::DOMAIN_NAMESPACE,
        ],
        'Labelling'      => [
            'AllowSundaySorting' => LabellingService::DOMAIN_NAMESPACE,
            'City'               => LabellingService::DOMAIN_NAMESPACE,
            'CountryCode'        => LabellingService::DOMAIN_NAMESPACE,
            'DeliveryDate'       => LabellingService::DOMAIN_NAMESPACE,
            'HouseNr'            => LabellingService::DOMAIN_NAMESPACE,
            'HouseNrExt'         => LabellingService::DOMAIN_NAMESPACE,
            'Options'            => LabellingService::DOMAIN_NAMESPACE,
            'PostalCode'         => LabellingService::DOMAIN_NAMESPACE,
            'ShippingDuration'   => LabellingService::DOMAIN_NAMESPACE,
            'Street'             => LabellingService::DOMAIN_NAMESPACE,
        ],
        'ShippingStatus' => [
            'AllowSundaySorting' => ShippingStatusService::DOMAIN_NAMESPACE,
            'City'               => ShippingStatusService::DOMAIN_NAMESPACE,
            'CountryCode'        => ShippingStatusService::DOMAIN_NAMESPACE,
            'DeliveryDate'       => ShippingStatusService::DOMAIN_NAMESPACE,
            'HouseNr'            => ShippingStatusService::DOMAIN_NAMESPACE,
            'HouseNrExt'         => ShippingStatusService::DOMAIN_NAMESPACE,
            'Options'            => ShippingStatusService::DOMAIN_NAMESPACE,
            'PostalCode'         => ShippingStatusService::DOMAIN_NAMESPACE,
            'ShippingDuration'   => ShippingStatusService::DOMAIN_NAMESPACE,
            'Street'             => ShippingStatusService::DOMAIN_NAMESPACE,
        ],
        'DeliveryDate'   => [
            'AllowSundaySorting' => DeliveryDateService::DOMAIN_NAMESPACE,
            'City'               => DeliveryDateService::DOMAIN_NAMESPACE,
            'CountryCode'        => DeliveryDateService::DOMAIN_NAMESPACE,
            'DeliveryDate'       => DeliveryDateService::DOMAIN_NAMESPACE,
            'HouseNr'            => DeliveryDateService::DOMAIN_NAMESPACE,
            'HouseNrExt'         => DeliveryDateService::DOMAIN_NAMESPACE,
            'Options'            => DeliveryDateService::DOMAIN_NAMESPACE,
            'PostalCode'         => DeliveryDateService::DOMAIN_NAMESPACE,
            'ShippingDuration'   => DeliveryDateService::DOMAIN_NAMESPACE,
            'Street'             => DeliveryDateService::DOMAIN_NAMESPACE,
        ],
        'Location'       => [
            'AllowSundaySorting' => LocationService::DOMAIN_NAMESPACE,
            'City'               => LocationService::DOMAIN_NAMESPACE,
            'CountryCode'        => LocationService::DOMAIN_NAMESPACE,
            'DeliveryDate'       => LocationService::DOMAIN_NAMESPACE,
            'HouseNr'            => LocationService::DOMAIN_NAMESPACE,
            'HouseNrExt'         => LocationService::DOMAIN_NAMESPACE,
            'Options'            => LocationService::DOMAIN_NAMESPACE,
            'PostalCode'         => LocationService::DOMAIN_NAMESPACE,
            'ShippingDuration'   => LocationService::DOMAIN_NAMESPACE,
            'Street'             => LocationService::DOMAIN_NAMESPACE,
        ],
        'Timeframe'      => [
            'AllowSundaySorting' => TimeframeService::DOMAIN_NAMESPACE,
            'City'               => TimeframeService::DOMAIN_NAMESPACE,
            'CountryCode'        => TimeframeService::DOMAIN_NAMESPACE,
            'DeliveryDate'       => TimeframeService::DOMAIN_NAMESPACE,
            'HouseNr'            => TimeframeService::DOMAIN_NAMESPACE,
            'HouseNrExt'         => TimeframeService::DOMAIN_NAMESPACE,
            'Options'            => TimeframeService::DOMAIN_NAMESPACE,
            'PostalCode'         => TimeframeService::DOMAIN_NAMESPACE,
            'ShippingDuration'   => TimeframeService::DOMAIN_NAMESPACE,
            'Street'             => TimeframeService::DOMAIN_NAMESPACE,
        ],
    ];
    // @codingStandardsIgnoreStart
    /** @var bool $AllowSundaySorting */
    protected $AllowSundaySorting;
    /** @var string $City */
    protected $City;
    /** @var string $CountryCode */
    protected $CountryCode;
    /** @var string $DeliveryDate */
    protected $DeliveryDate;
    /** @var string $HouseNr */
    protected $HouseNr;
    /** @var string $HouseNrExt */
    protected $HouseNrExt;
    /** @var string[] $Options */
    protected $Options;
    /** @var string $PostalCode */
    protected $PostalCode;
    /** @var string $ShippingDuration */
    protected $ShippingDuration;
    /** @var string $Street */
    protected $Street;
    // @codingStandardsIgnoreEnd

    /**
     * GetSentDate constructor.
     *
     * @param bool        $allowSundaySorting
     * @param string|null $city
     * @param string|null $countryCode
     * @param string|null $houseNr
     * @param string|null $houseNrExt
     * @param array       $options
     * @param string|null $postalCode
     * @param string|null $DeliveryDate
     * @param string|null $street
     * @param string|null $shippingDuration
     */
    public function __construct(
        $allowSundaySorting = false,
        $city = null,
        $countryCode = null,
        $houseNr = null,
        $houseNrExt = null,
        array $options = null,
        $postalCode = null,
        $DeliveryDate = null,
        $street = null,
        $shippingDuration = null
    ) {
        parent::__construct();

        $this->setAllowSundaySorting($allowSundaySorting);
        $this->setCity($city);
        $this->setCountryCode($countryCode);
        $this->setHouseNr($houseNr);
        $this->setHouseNrExt($houseNrExt);
        $this->setOptions($options);
        $this->setPostalCode($postalCode);
        $this->setDeliveryDate($DeliveryDate);
        $this->setStreet($street);
        $this->setShippingDuration($shippingDuration);
    }

    /**
     * Set the postcode
     *
     * @param string $postcode
     *
     * @return $this
     */
    public function setPostalCode($postcode = null)
    {
        if (is_null($postcode)) {
            $this->PostalCode = null;
        } else {
            $this->PostalCode = strtoupper(str_replace(' ', '', $postcode));
        }

        return $this;
    }

    /**
     * Return a serializable array for the XMLWriter
     *
     * @param Writer $writer
     *
     * @return void
     */
    public function xmlSerialize(Writer $writer)
    {
        $xml = [];
        if (!$this->currentService || !in_array($this->currentService, array_keys(static::$defaultProperties))) {
            $writer->write($xml);

            return;
        }

        foreach (static::$defaultProperties[$this->currentService] as $propertyName => $namespace) {
            if ($propertyName === 'Options') {
                if (isset($this->Options)) {
                    $options = [];
                    foreach ($this->Options as $option) {
                        $options[] = ["{http://schemas.microsoft.com/2003/10/Serialization/Arrays}string" => $option];
                    }
                    $xml["{{$namespace}}Options"] = $options;
                }
            } elseif ($propertyName === 'AllowSundaySorting') {
                $xml["{{$namespace}}AllowSundaySorting"] = $this->AllowSundaySorting ? 'true' : 'false';
            } elseif (isset($this->{$propertyName})) {
                $xml[$namespace ? "{{$namespace}}{$propertyName}" : $propertyName] = $this->{$propertyName};
            }
        }
        // Auto extending this object with other properties is not supported with SOAP
        $writer->write($xml);
    }
}
