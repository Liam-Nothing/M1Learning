# Use an Alpine-based PHP image as the base
FROM composer:latest

# Update the package index and upgrade installed packages
RUN apk update && \
    apk upgrade


# Set the working directory in the container
WORKDIR /app

# Copy the application code into the container
COPY . /app/

# Install composer (if not already installed) and run 'composer require'
RUN composer require anthonymartin/geo-location