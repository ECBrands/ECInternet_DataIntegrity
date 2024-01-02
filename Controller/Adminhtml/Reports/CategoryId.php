<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\DataIntegrity\Controller\Adminhtml\Reports;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

/**
 * Adminhtml Reports CategoryId controller
 */
class CategoryId extends Action implements HttpGetActionInterface
{
    const MENU_ID = 'ECInternet_DataIntegrity::categoryidreport';

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;

    /**
     * CategoryId constructor.
     *
     * @param \Magento\Backend\App\Action\Context        $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);

        $this->_resultPageFactory = $resultPageFactory;
    }

    /**
     * Load the page defined in view/adminhtml/layout/dataintegrity_reports_categoryid.xml
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();

        // Active menu
        $resultPage->setActiveMenu(static::MENU_ID);

        // Page title
        $resultPage->getConfig()->getTitle()->prepend(__('Categories with categoryId in request_path'));

        return $resultPage;
    }
}
