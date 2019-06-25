<?php

PagSeguro\Library::initialize();    
PagSeguro\Library::cmsVersion()->setName("Pagamento PagSeguro")->setRelease("1.0.0");
PagSeguro\Library::moduleVersion()->setName("Pagamento PagSeguro")->setRelease("1.0.0");
//PagSeguro\Configuration\Configure::setEnvironment("production"); //Habilitar quando for de uso real e nao sandbox
PagSeguro\Configuration\Configure::setEnvironment("sandbox");
PagSeguro\Configuration\Configure::setAccountCredentials("a.ric.c.assis@gmail.com", "FCD16087380A43E7BC72649B8521937B");
//PagSeguro\Configuration\Configure::setAccountCredentials("a.ric.c.assis@gmail.com", "a73eb119e3d4c4033b1497e831e675a0c01504198-7e51-4abc-");//Habilitar quando estiver fora do sandbox para uso real
PagSeguro\Configuration\Configure::setCharset("UTF-8");
PagSeguro\Configuration\Configure::setLog(false, "pagseguro.log");//Cuidade, ao habilitar o arq de log os retornos do pagseguro irão para ele e nao poderão ser capturados. Use quando quiser verificar a resposta do pagseguro
