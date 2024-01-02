<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\DataIntegrity\ViewModel\Index;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\UrlInterface;

class Index implements ArgumentInterface
{
    /**
     * @var \Magento\Framework\UrlInterface
     */
    private $_url;

    /**
     * @param \Magento\Framework\UrlInterface $url
     */
    public function __construct(
        UrlInterface $url
    ) {
        $this->_url = $url;
    }

    /**
     * Build url by requested path and parameters
     *
     * @param string $endpoint
     *
     * @return string
     */
    public function buildUrl($endpoint)
    {
        return $this->_url->getUrl($endpoint);
    }
}
