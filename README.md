### How to Install

- run `composer install`
- update .env file
- run `php artisan migrate --seed`

### Test requests

- **Create order:**<br />
    POST: APP_URL/make-order<br />
    Body: 
    ```json
    {
        "products": [
            {
                "product_id": 1,
                "quantity": 2
            },
            {
                "product_id": 2,
                "quantity": 5
            }
        ]
    }


- **Update Product Stock:**

    POST: APP_URL/update-stock<br />
    Body: 
    ```json
    {
        "product_id": 1,
        "quantity": 2
    }
    
