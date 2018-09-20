# CakePHP test project for SynergDev vacancy

"In an amicable way", the logic of the import/export would be necessary to move to some model. The import/export is associated with all tables, and not with any one. I left the handlers in the controller. I think, a chain of similar foreach in ServiceController->import(),  I can somehow optimize, putting everything in one method and one foreach

###Добавлен простенький RBAC. Админ имеет доступ ко всем контроллерам и экшенам. Юзер может только просматривать записи. Отключен дебаг.

##Админ:admin/admin
##Юзер:user/user
