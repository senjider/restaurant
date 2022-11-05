### How to Install

- run `composer install`
- update .env file
- run `php artisan migrate --seed`

### Test requests
- **Create order:**<br />
    POST: APP_URL/make-order<br />
    Body Example: {<br />
   _________________"products": [<br />
   _____________________________"{<br />
   _____________________________"product_id": 1,<br />
   _____________________________"quantity": 2<br />
                            },<br />
                            {<br />
                                "product_id": 2,<br />
                                "quantity": 5<br />
                            }<br />
                        ]<br />
                    }<br />
<br />
<br />

- **Update Product Stock:**<br />
    POST: APP_URL/update-stock<br />
    Body Example: {<br />
                        "product_id": 1,<br />
                        "quantity": 2<br />
                    }<br />
