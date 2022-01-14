<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

</p>
# ZombieSuvirvalSocialNetwork
##Instructions
Once you have installed composer and running composer install
run this commands:
php artisan migrate
php artisan db:seed
php artisan serve
then visit http://localhost:8000/api

## GET api/survivors

200 OK
Content-Type: "application/json"

Return:
[
    {
        "id": 1,
        "name": "Ciara Strosin PhD",
        "age": 34,
        "gender": "Male",
        "latitude": 1519.88,
        "longitude": 295252151.231,
        "infected": 0,
        "points": "10.00",
        "created_at": "2022-01-13T13:09:58.000000Z",
        "updated_at": "2022-01-13T13:09:58.000000Z",
        "reports": 0
    },
    {
        "id": 2,
        "name": "Brandon Eichmann DDS",
        "age": 81,
        "gender": "Female",
        "latitude": 205090,
        "longitude": 139381605.021,
        "infected": 0,
        "points": "10.00",
        "created_at": "2022-01-13T13:09:58.000000Z",
        "updated_at": "2022-01-13T13:09:58.000000Z",
        "reports": 0
    },
    {
        "id": 3,
        "name": "Dr. Hector Jakubowski",
        "age": 109,
        "gender": "Female",
        "latitude": 328.9774834,
        "longitude": 1567091.80047,
        "infected": 0,
        "points": "10.00",
        "created_at": "2022-01-13T13:09:58.000000Z",
        "updated_at": "2022-01-13T13:09:58.000000Z",
        "reports": 0
    },
    {
        "id": 4,
        "name": "Ms. Maeve Ritchie",
        "age": 32,
        "gender": "Male",
        "latitude": 19.754,
        "longitude": 82295.2175735,
        "infected": 0,
        "points": "10.00",
        "created_at": "2022-01-13T13:09:58.000000Z",
        "updated_at": "2022-01-13T13:09:58.000000Z",
        "reports": 3
    },
    {
        "id": 5,
        "name": "Bettie Kerluke",
        "age": 13,
        "gender": "Male",
        "latitude": 24096,
        "longitude": 4419.41038549,
        "infected": 0,
        "points": "10.00",
        "created_at": "2022-01-13T13:09:58.000000Z",
        "updated_at": "2022-01-13T13:09:58.000000Z",
        "reports": 0
    },
    {
        "id": 6,
        "name": "Kristoffer Pouros",
        "age": 25,
        "gender": "Male",
        "latitude": 95.4544,
        "longitude": 81,
        "infected": 0,
        "points": "10.00",
        "created_at": "2022-01-13T13:09:58.000000Z",
        "updated_at": "2022-01-13T13:09:58.000000Z",
        "reports": 0
    },
    {
        "id": 7,
        "name": "Taya Watsica",
        "age": 25,
        "gender": "Female",
        "latitude": 5,
        "longitude": 15108017.71259,
        "infected": 0,
        "points": "10.00",
        "created_at": "2022-01-13T13:09:58.000000Z",
        "updated_at": "2022-01-13T13:09:58.000000Z",
        "reports": 0
    },
    {
        "id": 8,
        "name": "Antwon Wunsch",
        "age": 15,
        "gender": "Female",
        "latitude": 81370.86540169,
        "longitude": 151.76,
        "infected": 0,
        "points": "10.00",
        "created_at": "2022-01-13T13:09:58.000000Z",
        "updated_at": "2022-01-13T13:09:58.000000Z",
        "reports": 0
    },
    {
        "id": 9,
        "name": "Prof. Chandler Harber II",
        "age": 60,
        "gender": "Male",
        "latitude": 6055.046,
        "longitude": 2467029.46,
        "infected": 0,
        "points": "10.00",
        "created_at": "2022-01-13T13:09:58.000000Z",
        "updated_at": "2022-01-13T13:09:58.000000Z",
        "reports": 0
    },
    {
        "id": 10,
        "name": "Beryl Beier I",
        "age": 39,
        "gender": "Male",
        "latitude": 5.82942916,
        "longitude": 299442.89950006,
        "infected": 0,
        "points": "10.00",
        "created_at": "2022-01-13T13:09:58.000000Z",
        "updated_at": "2022-01-13T13:09:58.000000Z",
        "reports": 0
    },
    {
        "id": 11,
        "name": "Ms. Trisha Beahan",
        "age": 12,
        "gender": "Male",
        "latitude": 21531296.751657,
        "longitude": 38.051,
        "infected": 0,
        "points": "10.00",
        "created_at": "2022-01-13T13:09:58.000000Z",
        "updated_at": "2022-01-13T13:09:58.000000Z",
        "reports": 0
    },
    {
        "id": 12,
        "name": "Guiseppe Hilpert",
        "age": 58,
        "gender": "Female",
        "latitude": 20017938,
        "longitude": 359392.5355265,
        "infected": 0,
        "points": "10.00",
        "created_at": "2022-01-13T13:09:58.000000Z",
        "updated_at": "2022-01-13T13:09:58.000000Z",
        "reports": 0
    },
    {
        "id": 13,
        "name": "Bo Dare",
        "age": 11,
        "gender": "Female",
        "latitude": 95400,
        "longitude": 52624665.5165,
        "infected": 0,
        "points": "10.00",
        "created_at": "2022-01-13T13:09:58.000000Z",
        "updated_at": "2022-01-13T13:09:58.000000Z",
        "reports": 0
    },
    {
        "id": 14,
        "name": "Dedric Pfeffer",
        "age": 105,
        "gender": "Female",
        "latitude": 19.15953347,
        "longitude": 515955561.95871,
        "infected": 0,
        "points": "10.00",
        "created_at": "2022-01-13T13:09:58.000000Z",
        "updated_at": "2022-01-13T13:09:58.000000Z",
        "reports": 0
    },
    {
        "id": 15,
        "name": "Oren Hirthe",
        "age": 62,
        "gender": "Male",
        "latitude": 4323.02,
        "longitude": 1874.26581,
        "infected": 0,
        "points": "10.00",
        "created_at": "2022-01-13T13:09:58.000000Z",
        "updated_at": "2022-01-13T13:09:58.000000Z",
        "reports": 0
    },
    {
        "id": 16,
        "name": "Virginia Kuhlman I",
        "age": 60,
        "gender": "Female",
        "latitude": 11.052,
        "longitude": 8.384,
        "infected": 0,
        "points": "10.00",
        "created_at": "2022-01-13T13:09:58.000000Z",
        "updated_at": "2022-01-13T13:09:58.000000Z",
        "reports": 0
    },
    {
        "id": 17,
        "name": "Jalyn Cronin",
        "age": 88,
        "gender": "Female",
        "latitude": 89270.912,
        "longitude": 77428.1541537,
        "infected": 0,
        "points": "10.00",
        "created_at": "2022-01-13T13:09:58.000000Z",
        "updated_at": "2022-01-13T13:09:58.000000Z",
        "reports": 0
    },
    {
        "id": 18,
        "name": "Prof. Marcel Huels PhD",
        "age": 112,
        "gender": "Female",
        "latitude": 23.052,
        "longitude": 25.6387521,
        "infected": 0,
        "points": "10.00",
        "created_at": "2022-01-13T13:09:58.000000Z",
        "updated_at": "2022-01-13T13:09:58.000000Z",
        "reports": 0
    },
    {
        "id": 19,
        "name": "Bryana Morissette",
        "age": 22,
        "gender": "Male",
        "latitude": 85239040.41,
        "longitude": 1.145411,
        "infected": 0,
        "points": "10.00",
        "created_at": "2022-01-13T13:09:58.000000Z",
        "updated_at": "2022-01-13T13:09:58.000000Z",
        "reports": 0
    },
    {
        "id": 20,
        "name": "Aylin King DDS",
        "age": 49,
        "gender": "Female",
        "latitude": 442682888.72763,
        "longitude": 0.962,
        "infected": 0,
        "points": "10.00",
        "created_at": "2022-01-13T13:09:58.000000Z",
        "updated_at": "2022-01-13T13:09:58.000000Z",
        "reports": 0
    }
]

## GET api/survivors/1
200 OK
Content-Type: "application/json"

Return:
{
    "survivor": {
        "id": 1,
        "name": "Ciara Strosin PhD",
        "age": 34,
        "gender": "Male",
        "latitude": 1519.88,
        "longitude": 295252151.231,
        "infected": 0,
        "points": "10.00",
        "created_at": "2022-01-13T13:09:58.000000Z",
        "updated_at": "2022-01-13T13:09:58.000000Z",
        "inventories": [
            {
                "description": null,
                "points": 4
            },
            {
                "description": null,
                "points": 1
            }
        ],
        "reports": 0
    }
}

### POST api/survivors

Body:
{
    "name": "Juan",
    "age": 20,
    "gender": "Male",
    "latitude": "123123.321",
    "longitude": "456454.456",
    "infected": 0
}

201 CREATED
Content-Type: "application/json"

Return:

{
  "data": "Survivor created successfully"
}



## PUT api/survivors/{id}

Params:
{
    "latitude": "321321.45",
    "longitude": "321321.45",
}

201 CREATED
Content-Type: "application/json"

Return:

{
    "data": "Survivor updated successfully"
}

## POST api/survivors/sendReport/{reporter}/{reported}
reporter = $survivor->id
repoted = $survivor->id

Returns:

200 Ok
Content-Type: "application/json"

{
  "msg": "Survivor reported!"
}

200 Ok
Content-Type: "application/json"

{
  "msg": "This survivor has been marked as infected!"
}


400 Ok
Content-Type: "application/json"

{
  "msg": "You cannot auto report"
}

## GET api/reports/infectedSurvivors

200 OK
Content-Type: "application/json"

{
    "data": "survivors infected: 5%"
}


## GET /reports/notInfectedSurvivors/

200 OK
Content-Type: "application/json"


{
    "data": "survivors not infected: 95%"
}

## GET api/reports/averageItems/

200 OK
Content-Type: "application/json"

Returns:

{
    "data": {
        "Water": 0.15,
        "Food": 0.05,
        "Medication": 0.15,
        "Ammunition": 0.55
    }
}

## GET api/reports/pointsLost/{id}

200 OK
Content-Type: "application/json"

Returns:

200 OK
Content-Type: "application/json"
{
    "message": "Survivor founded and not infected"
}

200 OK
Content-Type: "application/json"
{
    "pointsLost": 0
}

## PUT api/trades/exchange/{survivorSend}/{survivorReceive}


200 Ok
Content-Type: "application/json"

{
    "msg": "Exchange completed."
}

409 Conflict
Content-Type: "application/json"

{
    "Erro": "Trying to exchange with the same suvivor"
}

404 Not Found
Content-Type: "application/json"

{
    "Erro": "The sender survivor not exist"
}

400 Bad Request
Content-Type: "application/json"

{
    "Erro": "The sender survivor is infected."
}