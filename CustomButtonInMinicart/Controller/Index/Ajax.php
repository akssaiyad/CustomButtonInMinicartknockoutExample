<?php

namespace Aks\CustomButtonInMinicart\Controller\Index;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\LayoutFactory;
use Magento\Framework\App\ActionInterface;

class Ajax implements ActionInterface
{
    protected $resultFactory;
    protected $layoutFactory;

    public function __construct(
        ResultFactory $resultFactory,
        LayoutFactory $layoutFactory
    )
    {
        $this->resultFactory = $resultFactory;
        $this->layoutFactory = $layoutFactory;
    }

    public function execute()
    {
        $layout = $this->layoutFactory->create();
        $html = $layout->createBlock(\Magento\Framework\View\Element\Template::class)
        ->setTemplate('Aks_CustomButtonInMinicart::custom-btn.phtml')
        ->toHtml();
        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $resultJson->setData($html);
        return $resultJson;
    }
}