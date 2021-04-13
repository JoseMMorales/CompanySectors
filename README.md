# Company Sectors Project 

## About this project...

This is a CRUD App where the user can create, modify and delete companies and sectors. Full Stack project where accessing as an Admin you can have different functionalities to manage a group of companies by sectors. Designed for a clear and intuitive navigation to make use experience satisfactory, with a very simple steps to proceed with any action. Responsiveness and accessible in all devices. There is also a currency exchange service in the landing page, where the user can enter an amount and currencies to get immediate conversions.

## Stack used...
I have used [Symfony](https://symfony.com/) website-skeleton for a traditional web application structure, giving me an advantage of which dependencies would require during development stage, and also [Doctrine](https://www.doctrine-project.org/) to get PHP libraries in order to store on DDBB and mapping objects.

## Composer..
Company Sectors has been built with package manager [Composer](https://getcomposer.org/) to get all bundles required across the project. 

#### How to to use it [here ...](https://getcomposer.org/download/)

## Local Server...
Symfony offers its own web server to make you more productive while developing any application, so that's why I chose [Symfony Server](https://symfony.com/doc/current/setup/symfony_server.html). 

#### Ready to start!!

<div align="center">

![Screenshot 2021-04-13 at 11 46 21](https://user-images.githubusercontent.com/43299285/114533185-ed256d80-9c4d-11eb-9ca8-a34181e733ac.png)

</div>

#### Please go to Installing section to find out how to proceed...

## External API for exchange...
As mentioned before to make the currency exchange service works, I had to use external API [Fixer.io](https://fixer.io/) and execute requests from Symfony Currency Controller. In this case to make the URL dynamically, I had to include variables in parameters to pass them all over Fixer for creating conversion response.

Using [HTTP Client](https://symfony.com/doc/current/http_client.html) component to consume APIs is pretty straight forward just following the instructions and installing with composer.

### Request...
`GET - http://data.fixer.io/api/convert?access_key=(Your_token)&from=$from&to=$to&amount=$amount&date=$dateString`
### Response...
```
array:6 [
  "success" => true
  "query" => array:3 [
    "from" => "USD"
    "to" => "EUR"
    "amount" => 1000
  ]
  "info" => array:2 [
    "timestamp" => 1617148799
    "rate" => 0.853015
  ]
  "date" => "2021-03-30"
  "historical" => true
  "result" => 853.015
]
```

## Company Project DDBB...

You can see the DDBB uploaded in /MySQL (Folder) for you to use it in this project, I have been also working with [PHPMyAdmin](https://www.phpmyadmin.net/) for the administration of [MySQL](https://www.mysql.com/) and [XAMPP](https://www.youtube.com/watch?time_continue=1&v=h6DEDm7C37A&feature=emb_logo) as development environment, but you are free to use whatever suits you better.

#### Design below...

<div align="center">

![Screenshot 2021-04-13 at 11 58 57](https://user-images.githubusercontent.com/43299285/114534778-a59fe100-9c4f-11eb-81ad-dbb9aa6f129e.png)

</div>

## Installing..
* **Note that you should have installed PHP ^7.2.5 and composer to proceed with steps below**

#### If there is any issue with PHP Version in Mac please enter in your terminal `curl -s http://php-osx.liip.ch/install.sh | bash -s 7.3`

* Clone the project to your local directory
* `$git clone https://github.com/JoseMMorales/CompanySectors.git`
* `$cd CompanySectors`
*  I am using [VSCode](https://code.visualstudio.com/), so if so do you. Just enter `code .` to open CompanySectors project in the editor.
* `$composer install`
* `symfony server:start`
* Project available at `https://127.0.0.1:8000` in your browser

## :exclamation::exclamation: Please note :exclamation::exclamation: 
Just to advise that credentials at .env file are just being created to build Company Sector Project, so it should be changed for you to use the repo accordingly with yours.

* <b>ROW 31:</b> Change DDBB details:<br />
`DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name"`

* <b>Currency Controller ROW: 90 </b> Change your Fixe.io token and variables if you want to use currency exchange service.
`http://data.fixer.io/api/convert?access_key=(Your_Token)&from=(From_Currency)&to=(To_Currency)&amount=(Amount)&date=(Date)`

## Author
Jose MMorales
