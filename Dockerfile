# Gunakan PHP image resmi sebagai base image
FROM php:8.1-cli

# Install dependencies untuk PHP (misalnya, curl, git, dll)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Set working directory
WORKDIR /var/www/html

# Salin file aplikasi ke dalam container
COPY . .

# Jika perlu, install composer (untuk manajemen dependensi PHP)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Expose port 80 (atau port lain jika dibutuhkan)
EXPOSE 80

# Command untuk menjalankan PHP built-in server (misalnya untuk development)
CMD ["php", "-S", "0.0.0.0:80", "-t", "/var/www/html"]
