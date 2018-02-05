<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'name' => '伏羲教育',
    'keywords' => '伏羲教育首页',
    'description' => '伏羲教育首页',
    'difficulty_level' => [
        1 => '初级',
        2 => '中级',
        3 => '高级',
    ],
    'alipay' => [
        //应用ID,您的APPID。
        'app_id' => "2018013002110709",
        //商户私钥
        'merchant_private_key' => "MIIEowIBAAKCAQEA495M4wB9jXHREDg6mHnU3kYduI6PGD4yy1OQJipjI23fAP1wXXCy/1H4OWH37q6gd+9QeG7L4g2qSApLocAMnAecX75EpwTMJNrqF1qPU0h9lmTV+gG6OwJWjDju/SMAu097KBe5bL7A7/wj05SoDYCWo2/7DIhJv8zfUVP04C4jLVnMy3LGnTduVbndSRBYCMe8hdcZwql/aitgUZwdOXYX7uqRuN5O/htHrX7CbOkdL9o4whsRspmBOfS7wNfoTZAHUJ2dSNiW6yr/3wSUz20EpRJXtcgbfDb4oPdLBUmUC6ZGyxUyFU7Gi6vaIfyluwgSuj4ImOP7eMOrWT6gEwIDAQABAoIBAH/w6CCovNX3Ktg9igDknvWyTqu6N3P4MFLjd1NGh2V0IjsPEdEVHxumLYYikK/OEsFkeD02kHk7DPnn9fE6wJm22EEVtrxEQE8NL1SvfzvWvtT7hv0ZjTPmqyuOJ/mvdpC1HsQzFeSN8gyM+JyqofT61xmrHT07JJVxdY3XYu2fSmycU2dC5tuuNRSgXZ6uKEgp65iybxbu+cNtdj9MX55GNpTNXPxRLnu89bkl/TlIYHF0aUkR5e6rsuZW1PgLMqiC19EZpZSoaReQUaTEZvkKafxT76yBpPkgF2C27z3A1imPlZ8EXjt/OM77ZlbAFWjHVoMxFIm1negyG3Yyt6kCgYEA/76RABXivihkcf1tb6MZh8OpzYvUYP+Z8lEboa+Z0IZq5hbUCwyNLw7bAz0uUjIHDCu3WUZzg8gjNcxH4r5In8KaawMVfZM9YBiHP1Qr7cNceBMIw3RWCcEZcZXpMQpgBbfk4G6GV+VFKi34f6Y5UGLQEiSY+NabCEk5cXV+bP0CgYEA5BiaCLP8+u9GgoU+xRPlBkhX9tkFGHfTipq9dV6R0Wa/GyScAZmizWc3S+OWlYn7IoAgYI++zEg/B8/s0ORWQhh6HrT5NORA7wos3GlwI1NSy1iX4SDeypNOcj4qqR/Y0yMQh0yXcUvrG9puy8riD81wxSV+DE9GuCm+nYp2Vk8CgYA4H2vWpvbhYB/a3BCeBR7fKlMjJmJu/uibwqzbqJuKpVTkNXJHEnQRNaNebJiztQLS6u0LjGhhLRR9A91qpvNtC9mzTjPzINLBOeDERwZ04QBz4Ul1Cxyue0/IG2vXNT2pQ5fYoKietVOeVARKjwHY4DZlJN7lDMNs6BTRD0W1SQKBgQCIFZVws9Gu9KqgnFaCxgfR4793aqr7miH/g6qdJ7rfr+k8jG73FW5oFbiL8lCZDyVhxAeNFLXEsyXHx2mGh3RfIrNZNqenwrZq5ys0pUNeEAxJfaW/jxjcy132Etjo5jM6ZKUr06pW0fCHQZ7wvy54Nx2cwW2ecn3CykULQNyxSQKBgEKtQFyqQansB2jz/ZJDIgDzNoLQnffLPXol1IHRhOrzx6KpUSesw5zBhLYZk6w3tGGujBGdAWJGzlcqlhrH27UYo1bn902T3mJUtlQAuUzkq+yz4ObFteiOdON+V2DrYiiJgp4Iaqh4yEQyaJYHS9HMytxNAjBoF6ZJK/lSipzL",
        //异步通知地址
        'notify_url' => "http://www.fuxiguoxue.com/alipay/notify.html",
        //同步跳转
        'return_url' => "http://www.fuxiguoxue.com/alipay/return.html",
        //编码格式
        'charset' => "UTF-8",
        //签名方式
        'sign_type'=>"RSA2",
        //支付宝网关
        'gatewayUrl' => "https://openapi.alipay.com/gateway.do",
        //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
        'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAjIBX71TCZ5/AtjmsvfcFjm4c4tBe/1jvudTktiy51avQjgTUwyusZVIy0bHyvlUb4bMcXD3HdRTy+VL4RkgVtiXr1QTw4m5/ixe9nk8IJno0K1YHcOOu/BQN3QnxTe6ijpFK8Me3kyLrqxH4MhQTCcheZ8BAdnpleeVKm9y/9to0dWxCy1gRhdvwNaj0kic+VlcewX4R9hCB5kGWqivhpWbXLH1j5AHhLkbKN5XAZ/EqhlyXOO618A2dk2XqjAJ/z0d0ekejMp1ynX1voz5Dd4z0dPik4Pjq5p2A+tLo5/cH+Nbw8p9KroFiaR2DT1b/Y+rM69PWbPlUll1H/RngRQIDAQAB",
    ],
    'wxpay' => [
        //绑定支付的APPID（必须配置，开户邮件中可查看）
        'app_id' => "wxca8966ac77ea67be",
        //商户号（必须配置，开户邮件中可查看）
        'mchid' => "1498172942",
        //商户支付密钥，参考开户邮件设置（必须配置，登录商户平台自行设置）
        //设置地址：https://pay.weixin.qq.com/index.php/account/api_cert
        'key' => "MVvI10v1Oxlksc4Eh0XlazkqXKlNQBBy",
        //APPSECRET：公众帐号secert（仅JSAPI支付的时候需要配置， 登录公众平台，进入开发者中心可设置）
        //获取地址：https://mp.weixin.qq.com/advanced/advanced?action=dev&t=advanced/dev&token=2005451881&lang=zh_CN
        'appsecret' => "eb3e66a2927be0c68e9b6e4c0854fdab",
    ],
];
