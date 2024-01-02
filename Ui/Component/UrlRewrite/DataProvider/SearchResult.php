<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\DataIntegrity\Ui\Component\UrlRewrite\DataProvider;

/**
 * SearchResult ui component
 */
class SearchResult extends \Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult
{
    /**
     * Init select
     *
     * @return void
     */
    protected function _initSelect()
    {
        // Build parent SELECT
        parent::_initSelect();

        $this->getSelect()->where('entity_type = ?', 'category');
        $this->getSelect()->where('INSTR(request_path, entity_id) > 0');
    }
}
