<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>API Fapetição</title>
    </head>
    <body>
        Eae cara

        <p>http://localhost:8000/api/login POST</p>
        <p>Headers:</p>
        <p>-Accept: application/json</p>
        <p>Body:</p>
        <p>{</p>
        <p>	"email": "as@df.com",</p>
        <p>	"password": "123456"</p>
        <p>}</p>
        <p>Response:</p>
        <p>{</p>
        <p>  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTUyNTgxMDc5NCwiZXhwIjoxNTI1ODE0Mzk0LCJuYmYiOjE1MjU4MTA3OTQsImp0aSI6IlowYWpQNjFkeTFqR1dxZWoiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.mFmvp6rxWOkuGVookkp0fxksmoSTWqE4aUA2B55Skps"</p>
        <p>}</p>
        <p>http://localhost:8000/api/user GET</p>
        <p>Headers:</p>
        <p>-Accept: application/json</p>
        <p>-Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTUyNTgxMDc5NCwiZXhwIjoxNTI1ODE0Mzk0LCJuYmYiOjE1MjU4MTA3OTQsImp0aSI6IlowYWpQNjFkeTFqR1dxZWoiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.mFmvp6rxWOkuGVookkp0fxksmoSTWqE4aUA2B55Skps</p>
        <p>Response:</p>
        <p>{</p>
        <p>    "id": 1,</p>
        <p>    "email": "as@df.com",</p>
        <p>    "created_at": "2018-05-08 19:30:51",</p>
        <p>    "updated_at": "2018-05-08 19:30:51"</p>
        <p>}</p>

    </body>
</html>
