<p align="center">
  <img src="https://raw.githubusercontent.com/acidjazz/changer/master/client/static/ss.png" />
</p>

> sample app that delivers change in denominations
### Installation

* clone from github
* run `yarn` and `composer install` to install all of your dependencies
* copy `.env.example` to `.env` and configure it to your likings 
* TL;DR
 ```bash
git clone git@github.com:acidjazz/changer.git; cd changer; yarn; composer install; cp .env.example .env;
 ```

### Local Environment
* run `yarn dev` in one terminal for our nuxt dev setup
* run `yarn api` (alias for `./artisan serve`) in another terminal for our laravel API
* visit [http://localhost:3000](http://localhost:3000)
* visit [http://localhost:8000/change](http://localhost:8000/change?price=4000&wallet=5500) to view our endpoint 

### About the [boilerplate](https://github.com/acidjazz/laranuxt)

<p align="center">
  <a href="https://laravel.com"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" width="92" height="92" /></a>
  <a href="https://vuejs.org"><img src="https://vuejs.org/images/logo.png" width="92" height="92" /></a>
  <a href="https://tailwindcss.com"><img src="https://pbs.twimg.com/profile_images/1278691829135876097/I4HKOLJw_400x400.png" width="92" height="92" /></a>
  <a href="https://github.com/acidjazz/metapi"><img src="https://github.com/acidjazz/metapi/raw/master/logo.png" width="92" height="92" /></a>
</p>

## Laravel + Nuxt.js Boilerplate

[![](https://img.shields.io/badge/nuxt.js-v2.14.5-04C690.svg)](https://nuxtjs.org)
[![](https://img.shields.io/badge/Laravel-v8.0.1-ff2e21.svg)](https://laravel.com)
![Test PHP](https://github.com/acidjazz/laranuxt/workflows/Test%20PHP/badge.svg)
![Test Javascript](https://github.com/acidjazz/laranuxt/workflows/Test%20Javascript/badge.svg)

### What is included

* [NUXT](https://nuxtjs.org) front end, a progressive Vue.js framework - `v2.14.0`
  * [@nuxtjs/axios](https://github.com/nuxt-community/axios-module) to communicate with our API - `v5.12.0`
  * [@nuxtjs/tailwindcss](https://github.com/nuxt-community/Gnuxt-tailwindcss) a [utility-first](https://tailwindcss.com) framework - now with PurgeCSS built in - `v2.1.0`
  * [nuxt-tailvue](https://github.com/acidjazz/nuxt-tailvue) a collection of components built for Nuxt.js, powered by TailwindCSS


* [Laravel](https://laravel.com) - for our API - `v7.22.4`
  * [metapi](https://github.com/acidjazz/metapi) - API helpers and utilities - `v2.1.1`
  * [debugbar](https://github.com/barryvdh/laravel-debugbar) - awesome debugbar for our API - `v3.5.1`
  * [ide-helper](https://github.com/barryvdh/laravel-ide-helper) - Helper files to enable accurate IDE autocompletion - `v2.8.0`

