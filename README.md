# vizitky - bCard Manager 
###########################
Pokyny pro konfiguraci:

- pro úspěsné nakonfigurování aplikace stačí přepsat soubor app/config/config.local.neon
 ten by měl vypadat nějak takto:

parameters:

database:
	dsn: 'mysql:host=localhost;dbname=_nazev_databaze_'
	user: _uzivatel_
	password: _heslo_
	options:
		lazy: yes


Pokud by se kdykoli vyskytl nějaký problém, tak většinou stačí promazat celý obsah adresáře app/temp/cache.
