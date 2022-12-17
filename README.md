# CDAW

#Run locally
```
git clone https://github.com/a-sumo/CDAW
cd pokemon_0.2
# edit .env
composer update
php artisan migrate --seed
php artisan serve 
```

Test User:
- Name: Test
- Email: Test@email.com
- Password: TestUser

Implemented features:

- player movement inside map with collisions and battlezones
- pokemon encounters within battlezones
- battlescene with generic abilities
- enemy pokemon storage inside pokédex upon battle end
- display of Pokémon sprites and names fetched with PokéAPI

Features that haven't been implement due to time constraints:

-  types for moves and pokemons
-  damage and health recovery system 
-  storage and display of additional pokemon information
-  recording of events from user session

