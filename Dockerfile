FROM php:8.2-apache

RUN apt update && apt install nano

RUN a2enmod rewrite