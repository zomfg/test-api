<?php
/**
 * Description of Auth
 *
 * @author Sergio
 */
class Aum_Controller_Plugin_Auth extends Zend_Controller_Plugin_Abstract {
    /**
     * @var Zend_Config
     */
    private $config = null;

    /**
     * @param Zend_Controller_Request_Abstract $request
     */
    public function  preDispatch(Zend_Controller_Request_Abstract $request) {
        //echo "PLUGIN SPEAKIN\n";
        $this->config = Aum_Config::get();
        if (!($receivedSignature = $request->getHeader($this->config->api->paramKey->auth)))
            return $this->error(Aum_Response::STATUS_CODE_BAD_SIGNATURE);
        $skipParams = array(
            $request->getActionKey(),
            $request->getControllerKey(),
            $request->getModuleKey()
        );
        $params = $request->getParams();
        ksort($params);
        $data = null;
        foreach ($params as $k => $v)
            if (is_string($v) && !in_array($k, $skipParams))
                $data .= '&'.$k.'='.$v;
        $computedSignature = Zend_Crypt_Hmac::compute(
                $this->config->api->security->privateKey,
                $this->config->api->security->algorithm, $data);
//        Zend_Debug::dump($receivedSignature);
//        Zend_Debug::dump($computedSignature);
        if ($computedSignature != $receivedSignature)
            return $this->error(Aum_Response::STATUS_CODE_BAD_SIGNATURE);
    }

    private function error($code) {
        $this->getResponse()->setHttpResponseCode($code);
        $this->getRequest()->setControllerName('gtfo')->setActionName('index')->setParam('httpcode', $code)->setDispatched(true);
    }
}
?>
