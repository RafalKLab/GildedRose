# GildedRose refactoring kata laravel api 
How to launch api
1. Clone GitHub repo
2. Install Composer Dependencies into project directory 
```
composer install
```
3. Install NPM Dependencies
npm install
```
npm install
```
4. Create a copy of your .env example file. 
5. Generate an app encryption key
```
php artisan key:generate
```
6. Create an empty database
7. In the .env file, add database information DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD (if is set)
8. Migrate the database, in this case you will have two tables in your database - categories and items
```
php artisan migrate
```
9. Seed the database to have initial data
```
php artisan db:seed
```
10. Now you can launch api
```
php artisan serve
```

# How to use api
This api works with two models, item and category, both has basic CRUD
### Item model example 
Get all items
Method: GET
```
http://127.0.0.1:8000/api/items
```
Get item by ID
Method: GET
```
http://127.0.0.1:8000/api/items/{item_id}
```
Create item
Method: POST
```
http://127.0.0.1:8000/api/items
```
Example data:
```json
  {
        "category_id": 1,
        "name": "Book_item",
        "value": 10,
        "quality": 10
  }
```
Update item
Method: PUT
```
http://127.0.0.1:8000/api/items/{item_id}
```
Example data:
```json
  {
        "category_id": 1,
        "name": "UpdatedBook_item",
        "value": 10,
        "quality": 10
  }
```
Delete item
Method: DELETE
```
http://127.0.0.1:8000/api/items/{item_id}
```
### Category model example 
Get all categories
Method: GET
```
http://127.0.0.1:8000/api/categories
```
Get category by ID
Method: GET
```
http://127.0.0.1:8000/api/categories/{item_id}
```
Create category
Method: POST
```
http://127.0.0.1:8000/api/categories
```
Example data:
```json
  {
        "name": "NewCategory"
  }
```
Update category
Method: PUT
```
http://127.0.0.1:8000/api/categories/{item_id}
```
Example data:
```json
  {
        "name": "UpdatedCategory"
  }
```
Delete category
Method: DELETE
```
http://127.0.0.1:8000/api/categories/{item_id}
```
Get all items based on a category. E.g. Return all items that belong to the *posters* category.
Method: GET
```
http://127.0.0.1:8000/api/categories/search/posters
```
Delete all items based on a category. E.g. Delete all items that belong to the *posters* category.
Method: DELETE
```
http://127.0.0.1:8000/api/categories/delete/posters
```

## Data requirements
* Category name must be at least 5 symbols  
* Item name must always end in *_item*  
* Item value at least 10, no greater than 100  
* Item quality at least -10, no greater than 50  
