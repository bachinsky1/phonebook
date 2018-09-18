# CakePHP test project for SynergDev vacancy

"In an amicable way", it would be necessary to move the import/export logic to some model. Since the import/export is associated with all tables, and not with any one, I left the handlers in the controller. I think, A chain of three similar foreach-it in ServiceController->import(),  I can somehow optimize, putting everything in one method and one foreach
