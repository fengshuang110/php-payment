# php-payment

###支付php实现###
  不依赖任何框架和代码


###支持###
  目前只有支付宝的pc支付
  由于时间 以后会加上app支付 微信支付 银联支付 等等第三方支付

###nginx 配置 ###
    server {
         listen     80;
         server_name  pay.test.com;
         root    E:\wamp\www\php-payment;
         index index.html index.php;


         #access_log  logs/host.access.log  main;

         location / {
             try_files $uri $uri/ /index.php?$args;
         }

         #location ~ \.php$ {
         #    proxy_pass   http://127.0.0.1;
         #}

         # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000

         location ~ \.php$ {
             fastcgi_pass   127.0.0.1:9000;
             fastcgi_index  index.php;
             fastcgi_param  SCRIPT_FILENAME  $document_root/$fastcgi_script_name;
             include        fastcgi_params;
         }

     }


###访问地址###
  支付宝：http://pay.test.com/demo/getpayurl1?order_id=22222222222222aaa
  微信 http://pay.test.com/demo/getpayurl2?order_id=333333333333333
   微信公众号支付不好测试就不提交了

  支付宝配置商户号文件 /php-payment/Application/Pay/Config.php

  微信配置商户号文件 /php-payment/Application/Pay/Weixin/Config.php
