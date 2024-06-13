
<?php
// dd(asset('cert/acp_test_enc.cer'));

return ['test', [
        'version' => '5.1.0',
        'signMethod' => '01', // RSA
        'encoding' => 'UTF-8',
        'currencyCode' => 'CNY',
        'merId' => '501034483980043',
        'returnUrl' => 'http://dev.git.com/union-pay/demo/payreturn.php', // 前台网关支付返回
        'notifyUrl' => 'http://dev.git.com/union-pay/demo/paynotify.php', // 后台通知
        'frontFailUrl' => 'http://dev.git.com/union-pay/demo/payfail.php',
        'refundnotifyUrl' => 'http://dev.git.com.com/union-pay/demo/refundnotify.php',
        // 'signCertPath' => dirname(__FILE__).'/../cert/acp_test_sign.pfx',
        'signCertPath' => '../public/cert/acp_prod_verify_sign.cer',
        'signCertPwd' => '000000', // 签名证书密码
        // 'verifyCertPath' => dirname(__FILE__).'/../cert/acp_test_verify_sign.cer',  // v5.0.0 required
        // 'verifyRootCertPath' => dirname(__FILE__).'/../cert/acp_test_root.cer', // v5.1.0 required
        // 'verifyMiddleCertPath' => dirname(__FILE__).'/../cert/acp_test_middle.cer', // v5.1.0 required
        // 'encryptCertPath' => '/../cert/acp_test_enc.cer',
        'encryptCertPath' => '../public/cert/acp_prod_enc.cer',
        'ifValidateCNName' => false, // 正式环境设置为true
    ],
];
