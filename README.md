# CakePHP test project for SynergDev vacancy

##### "По-хорошему", надо бы переместить логику импорта/экспорта в какую-нибудь модель. Так как импорт/экспорт связан со всеми таблицами, оставил обработчики в контроллере. Цепь из трех похожих foreach-ей в ServiceController->import(), думаю, можно как-то оптимизировать, вынеся все в один метод и один foreach 
