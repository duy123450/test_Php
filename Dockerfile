# Use an official PHP image with Apache preinstalled
FROM php:8.2-apache

# Refresh and upgrade system packages to pull in security fixes, then clean apt caches
RUN set -eux; \
	apt-get update; \
	apt-get upgrade -y; \
	apt-get clean; \
	rm -rf /var/lib/apt/lists/*

# Copy all files from your project into the web directory
COPY . /var/www/html/

# Expose port 80 (used for web traffic)
EXPOSE 80
