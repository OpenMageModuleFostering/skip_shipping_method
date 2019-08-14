<?php
 
class Chandan_Checkout_Model_Adminhtml_System_Config_Source_Shipping_Methods 
{
    protected $_options;
 
    public function toOptionArray()
    {
		$methods = Mage::getSingleton('shipping/config')->getActiveCarriers();
		$shipping = array();
		foreach($methods as $_ccode => $_carrier) {
			if($_methods = $_carrier->getAllowedMethods())  {
				if(!$_title = Mage::getStoreConfig("carriers/$_ccode/title"))
					$_title = $_ccode;
				foreach($_methods as $_mcode => $_method)   {
					$_code = $_ccode . '_' . $_mcode;		
					$this->_options[] = array('value'=>$_code, 'label'=>$_title);
				}
			}
		}
		$options = $this->_options;
        array_unshift($options, array('value'=>'', 'label'=> ''));
        return $options;
	}	
}