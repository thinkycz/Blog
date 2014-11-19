BI-WT1 Blog
===========

Předpokládá se základní znalost práce s VCS git. Dokumentace je k dispozici na http://git-scm.com/documentation.

Zadání úlohy 2 naleznete na https://gitlab.fit.cvut.cz/bi-wt1/blog-symfony-b141. Udělejte si fork repozitáře. Pro
synchronizaci vašeho repozitáře se zadáním si nezapomeňte nastavit vzdálený repozitář!

```
git remote add zadani git@gitlab.fit.cvut.cz:bi-wt1/blog-symfony-b141.git
```

Inicializace aplikace a knihoven, aktualizace
---------------------------------------------

Pro správu knihoven - instalaci i aktualizaci - se využívá nástroj _composer_ (). Součástí repozitáře je konfigurace
pro nástroj _composer_.

Instalaci provedete příkazem `composer install`. V případě, že již existuje soubor `composer.lock`, instaluje se podle
něj (vhodné např. pro instalaci v produkčním prostředí - zachovávají se konkrétní verze).

Aktualizaci provedete příkazem `composer update` (vytváří či aktualizuje soubor `composer.lock`).

Při instalaci či aktualizaci můžete být tázáni na hodnoty konfiguračních parametrů. Konfigurační parametry se ukládají
do `app/config/parameters.yml` (lze je editovat i ručně).

```
parameters:
    database_driver: pdo_mysql
    database_host: webdev.fit.cvut.cz
    database_port: null
    database_name: LOGIN
    database_user: LOGIN
    database_password: HESLO
    mailer_transport: smtp
    mailer_host: 127.0.0.1
    mailer_user: null
    mailer_password: null
    locale: cs
    secret: NAHODNA_HODNOTA
    debug_toolbar: true
    debug_redirects: false
    use_assetic_controller: true
```

Případně je možné zavolat _composer_ tak, aby spustil pouze tuto inicializaci. Budou se zadávat pouze hodnoty, které
v souboru `app/config/parameters.yml` ještě nejsou uvedeny.

```
kadleto2@ltpx220 ~/.../blog-symfony-b141 $ ../composer.phar run-script post-update-cmd
Creating the "app/config/parameters.yml" file
Some parameters are missing. Please provide them.
database_driver (pdo_mysql):
database_host (127.0.0.1): webdev.fit.cvut.cz
database_port (null):
database_name (symfony): LOGIN
database_user (root): LOGIN
database_password (null): HESLO
mailer_transport (smtp):
mailer_host (127.0.0.1):
mailer_user (null):
mailer_password (null):
locale (en): cs
secret (ThisTokenIsNotSoSecretChangeIt): NAHODNA_HODNOTA
debug_toolbar (true):
debug_redirects (false):
use_assetic_controller (true):
```

Požadované konfigurační parametry a jejich výchozí hodnoty se získávají ze souboru `app/config/parameters.yml.dist`. 