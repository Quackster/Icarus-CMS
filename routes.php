<?php
Router::add('/', 'index.base()');
Router::add('/index', 'index.base()');
Router::add('/home', 'index.base()');

Router::add('/register', 'index.register()');

Router::add('/account/login', 'account.login()');
Router::add('/account/logout', 'account.logout()');
Router::add('/account/register', 'account.register()');

Router::add('/me', 'character.me()');
Router::add('/hotel', 'character.hotel()');
Router::add('/client', 'character.hotel()');

Router::add('/error/404', 'err.notFound()');
Router::add('/error/403', 'err.forbidden()');
Router::add('/error/500', 'err.unexpected()');

Router::add('/housekeeping', 'housekeeping/index.base()');
Router::add('/housekeeping/alert', 'housekeeping/alert.base()');
Router::add('/housekeeping/alert/send', 'housekeeping/alert.send()');
Router::add('/housekeeping/save/note', 'housekeeping/save.note()');
Router::add('/housekeeping/users', 'housekeeping/users.base()');
Router::add('/housekeeping/users/edit', 'housekeeping/users.edit()');
Router::add('/housekeeping/articles', 'housekeeping/articles.base()');
Router::add('/housekeeping/articles/create', 'housekeeping/articles.add()');
Router::add('/housekeeping/articles/edit', 'housekeeping/articles.edit()');
Router::add('/housekeeping/articles/save', 'housekeeping/articles.save()');
Router::add('/housekeeping/articles/delete', 'housekeeping/articles.delete()'); //campaigns
Router::add('/housekeeping/campaigns', 'housekeeping/campaigns.base()');
Router::add('/housekeeping/campaigns/edit', 'housekeeping/campaigns.edit()');
Router::add('/housekeeping/campaigns/create', 'housekeeping/campaigns.create()');
Router::add('/housekeeping/campaigns/save', 'housekeeping/campaigns.save()');
Router::add('/housekeeping/campaigns/delete', 'housekeeping/campaigns.delete()');

?>

