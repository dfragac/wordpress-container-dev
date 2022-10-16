FROM wordpress:latest

# Allow devcontainer/Codespace use www-data as the remote user instead of root.
RUN usermod --shell /bin/bash www-data
RUN touch /var/www/.bashrc
RUN chown -R www-data: /var/www/

# Install git, zip & wget
RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git && \
    apt-get install -y sudo && \
    apt-get install -y zip && \
    apt-get install -y wget 

# Allow www-data user to use sudo without password
RUN adduser www-data sudo
RUN echo '%sudo ALL=(ALL) NOPASSWD:ALL' >> /etc/sudoers

# Install Xdebug
RUN pecl install "xdebug" || true \
    && docker-php-ext-enable xdebug

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installing PHP tools - PHP_Codesniffer
RUN curl -sSOL https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar && \
    chmod +x phpcs.phar && \
    mv phpcs.phar /usr/local/bin/phpcs
RUN curl -sSOL https://squizlabs.github.io/PHP_CodeSniffer/phpcbf.phar  && \
    chmod +x phpcbf.phar && \
    mv phpcbf.phar /usr/local/bin/phpcbf

# Install WP CLI
RUN curl -sSO https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
    chmod +x wp-cli.phar && \
    mv wp-cli.phar /usr/local/bin/wp

# Install nvm and node
RUN su www-data -c 'curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.35.3/install.sh | bash'
RUN su www-data -c 'export NVM_DIR="$HOME/.nvm" && [ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh" && nvm install --lts'