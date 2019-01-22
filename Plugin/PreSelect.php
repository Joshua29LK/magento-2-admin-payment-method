<?php
/**
 * BSS Commerce Co.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://bsscommerce.com/Bss-Commerce-License.txt
 *
 * @category  BSS
 * @package   Bss_AdminPaymentMethod
 * @author    Extension Team
 * @copyright Copyright (c) 2018-2019 BSS Commerce Co. ( http://bsscommerce.com )
 * @license   http://bsscommerce.com/Bss-Commerce-License.txt
 */

namespace Bss\AdminPaymentMethod\Plugin;

/**
 * Class PreSelect
 *
 * @package Bss\AdminPaymentMethod\Plugin
 */

class PreSelect
{
    /**
     * @var \Bss\AdminPaymentMethod\Model\AdminPaymentMethod
     */
    private $model;

    /**
     * PreSelect constructor.
     * @param \Bss\AdminPaymentMethod\Model\AdminPaymentMethod $model
     */
    public function __construct(\Bss\AdminPaymentMethod\Model\AdminPaymentMethod $model)
    {
        $this->model = $model;
    }

    /**
     * @param \Magento\Sales\Block\Adminhtml\Order\Create\Billing\Method\Form $block
     * @param $result
     * @return bool|string
     */
    public function afterGetSelectedMethodCode(
        \Magento\Sales\Block\Adminhtml\Order\Create\Billing\Method\Form $block,
        $result
    ) {
        if ($result && $result != 'free') {
            return $result;
        }

        $data = $this->model->getDataPreSelect();
        if ($data) {
            $result = \Bss\AdminPaymentMethod\Model\AdminPaymentMethod::CODE;
            return $result;
        }
        return false;
    }
}
