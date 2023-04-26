@extends('base')

@section('body')
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-5 mx-auto">
                <h3>Crashing this site</h3>
                <p>I've crashed production a few times.</p>
                <p>I've built this to match those real environments I've worked in.</p>
                <h3>Less</h3>
                <p>How can I crash less?</p>
                <p>The most common cause was deploying broken code.</p>
                <p>The second was peak loads overloading parts of the system.</p>
                <p>The third would probably be broken integrations. A partner API had downtime or a piece of configuration wasn't set correctly.</p>
                <p>The rarest cause of outages was core infrastructure failing. This would be Amazon Web Services (AWS), who hosts our applications, going down. Or problems with an Internet Service Provider.</p>
                <p class="mt-5 mb-5 clearfix">
                <span class="float-start">
                    <a href="{{ route('media.bulk.edit') }}" class="">Previous<!--<span class="ms-2"><i class="bi bi-arrow-right-circle"></i></span>--></a>
                </span>
                <!--
                <span class="float-end">
                    <a href="{{ route('deployment') }}" class="">Next</a>
                </span>
                    -->
                </p>
                <h3>On Docker, Heroku & Git</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <h5>Development environment</h5>
                <p><a href="https://laravel.com/docs/10.x/sail">Laravel Sail</a> builds my docker containers when developing locally.</p>
                <p>This is the docker-composer.yaml, but it shows the path to the Dockerfile as well.</p>
                <p>It shows the ports for both Laravel and Vite/Vue.</p>
                <p>I had to map the empty_node_modules directory. I develop on a Mac. The Docker image is Linux. I had to map my node_modules into this other directory so they wouldn't be used. Then the build installs the correct ones.</p>
                <p>Sail has a feature that builds a development database using the database environment variables defined in the .env file.</p>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-10 offset-lg-1 ">


                <div class="card rounded-0 mb-3"> <div class="card-header">
                        <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/docker-compose.yml">/docker-composer.yml</a>
                    </div>
                    <div class="card-body">
<pre ><code><span class="text-secondary">   1</span>  version: '3'
<span class="text-secondary">   2</span>  services:
<span class="text-secondary">   3</span>      laravel.test:
<span class="text-secondary">   4</span>          build:
<span class="text-secondary">   5</span>              <mark>context: ./docker/8.2</mark>
<span class="text-secondary">   6</span>              <mark>dockerfile: Dockerfile</mark>
<span class="text-secondary">   7</span>              args:
<span class="text-secondary">   8</span>                  WWWGROUP: '${WWWGROUP}'
<span class="text-secondary">   9</span>                  NODE_VERSION: '19'
<span class="text-secondary">  10</span>          image: sail-8.2/app
<span class="text-secondary">  11</span>          extra_hosts:
<span class="text-secondary">  12</span>              - 'host.docker.internal:host-gateway'
<span class="text-secondary">  13</span>          ports:
<span class="text-secondary">  14</span>              - <mark>'${APP_PORT:-80}:80'</mark>
<span class="text-secondary">  15</span>              - <mark>'${VITE_PORT:-5173}:${VITE_PORT:-5173}'</mark>
<span class="text-secondary">  16</span>          environment:
<span class="text-secondary">  17</span>              WWWUSER: '${WWWUSER}'
<span class="text-secondary">  18</span>              LARAVEL_SAIL: 1
<span class="text-secondary">  19</span>              XDEBUG_MODE: '${SAIL_XDEBUG_MODE:-off}'
<span class="text-secondary">  20</span>              XDEBUG_CONFIG: '${SAIL_XDEBUG_CONFIG:-client_host=host.docker.internal}'
<span class="text-secondary">  21</span>          volumes:
<span class="text-secondary">  22</span>              - <mark>'.:/var/www/html/'</mark>
<span class="text-secondary">  23</span>              - <mark>'./empty_node_modules:/var/www/html/node_modules/'</mark>
<span class="text-secondary">  24</span>          networks:
<span class="text-secondary">  25</span>              - sail
<span class="text-secondary">  26</span>          depends_on:
<span class="text-secondary">  27</span>              - mysql
<span class="text-secondary">  28</span>              - redis
<span class="text-secondary">  29</span>              - minio
<span class="text-secondary">  30</span>      mysql:
<span class="text-secondary">  31</span>          image: 'mysql/mysql-server:8.0'
<span class="text-secondary">  32</span>          ports:
<span class="text-secondary">  33</span>              - '${FORWARD_DB_PORT:-3306}:3306'
<span class="text-secondary">  34</span>          <mark>environment</mark>:
<span class="text-secondary">  35</span>              MYSQL_ROOT_PASSWORD: '${DB_PASSWORD}'
<span class="text-secondary">  36</span>              MYSQL_ROOT_HOST: '%'
<span class="text-secondary">  37</span>              MYSQL_DATABASE: '${DB_DATABASE}'
<span class="text-secondary">  38</span>              MYSQL_USER: '${DB_USERNAME}'
<span class="text-secondary">  39</span>              MYSQL_PASSWORD: '${DB_PASSWORD}'
<span class="text-secondary">  40</span>              MYSQL_ALLOW_EMPTY_PASSWORD: 1
<span class="text-secondary">  41</span>          volumes:
<span class="text-secondary">  42</span>              - 'sail-mysql:/var/lib/mysql'
<span class="text-secondary">  43</span>              - './vendor/laravel/sail/database/mysql/create-testing-database.sh:/docker-entrypoint-initdb.d/10-create-testing-database.sh'
<span class="text-secondary">  44</span>          networks:
<span class="text-secondary">  45</span>              - sail
<span class="text-secondary">  46</span>          healthcheck:
<span class="text-secondary">  47</span>              test:
<span class="text-secondary">  48</span>                  - CMD
<span class="text-secondary">  49</span>                  - mysqladmin
<span class="text-secondary">  50</span>                  - ping
<span class="text-secondary">  51</span>                  - '-p${DB_PASSWORD}'
<span class="text-secondary">  52</span>              retries: 3
<span class="text-secondary">  53</span>              timeout: 5s
<span class="text-secondary">  54</span>      redis:
<span class="text-secondary">  55</span>          image: 'redis:alpine'
<span class="text-secondary">  56</span>          ports:
<span class="text-secondary">  57</span>              - '${FORWARD_REDIS_PORT:-6379}:6379'
<span class="text-secondary">  58</span>          volumes:
<span class="text-secondary">  59</span>              - 'sail-redis:/data'
<span class="text-secondary">  60</span>          networks:
<span class="text-secondary">  61</span>              - sail
<span class="text-secondary">  62</span>          healthcheck:
<span class="text-secondary">  63</span>              test:
<span class="text-secondary">  64</span>                  - CMD
<span class="text-secondary">  65</span>                  - redis-cli
<span class="text-secondary">  66</span>                  - ping
<span class="text-secondary">  67</span>              retries: 3
<span class="text-secondary">  68</span>              timeout: 5s
<span class="text-secondary"> ...</span></code></pre>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <p>I needed to modify the default Dockerfile that Sail uses. Laravel provides <a href="https://laravel.com/docs/10.x/sail#sail-customization" target="_blank">a command</a> to generate a copy into the project.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1 ">


                <div class="card rounded-0 mb-3"> <div class="card-header">
                        <p>Terminal command</p>
                    </div>
                    <div class="card-body">
                        <pre ><code><span class="text-secondary">   %</span>  sail artisan sail:publish</code></pre>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <p>I'd like to understand Docker better.</p>
                <p>Here's my mental model. In my Mac filesystem, there's a directory that imitates the root of an Ubuntu filesystem. Docker has special permissions inside. It can't escape, but it is has root privileges.</p>
                <p>Inside that, the workdir /var/www/html holds my application code.</p>
                <p>My modification to the Dockerfile was to include imagemagick in the installation.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1 ">

                <div class="card rounded-0 mb-3"> <div class="card-header">
                        <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/docker/8.2/Dockerfile">/docker/8.2/Dockerfile</a>
                    </div>
                    <div class="card-body">
<pre ><code><span class="text-secondary">   1</span>  FROM <mark>ubuntu:22.04</mark>
<span class="text-secondary">   2</span>
<span class="text-secondary">   3</span>  LABEL maintainer="Taylor Otwell"
<span class="text-secondary">   4</span>
<span class="text-secondary">   5</span>  ARG WWWGROUP
<span class="text-secondary">   6</span>  ARG NODE_VERSION=18
<span class="text-secondary">   7</span>  ARG POSTGRES_VERSION=14
<span class="text-secondary">   8</span>
<span class="text-secondary">   9</span>  <mark>WORKDIR /var/www/html</mark>
<span class="text-secondary">  10</span>
<span class="text-secondary">  11</span>  ENV DEBIAN_FRONTEND noninteractive
<span class="text-secondary">  12</span>  ENV TZ=UTC
<span class="text-secondary">  13</span>
<span class="text-secondary">  14</span>  RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
<span class="text-secondary">  15</span>
<span class="text-secondary">  16</span>  RUN apt-get update \
<span class="text-secondary">  17</span>      && apt-get install -y gnupg gosu curl ca-certificates zip unzip git supervisor sqlite3 libcap2-bin libpng-dev python2 dnsutils \
<span class="text-secondary">  18</span>      && curl -sS 'https://keyserver.ubuntu.com/pks/lookup?op=get&search=0x14aa40ec0831756756d7f66c4f4ea0aae5267a6c' | gpg --dearmor | tee /etc/apt/keyrings/ppa_ondrej_php.gpg > /dev/null \
<span class="text-secondary">  19</span>      && echo "deb [signed-by=/etc/apt/keyrings/ppa_ondrej_php.gpg] https://ppa.launchpadcontent.net/ondrej/php/ubuntu jammy main" > /etc/apt/sources.list.d/ppa_ondrej_php.list \
<span class="text-secondary">  20</span>      && apt-get update \
<span class="text-secondary">  21</span>      && apt-get install -y php8.2-cli php8.2-dev \
<span class="text-secondary">  22</span>         php8.2-pgsql php8.2-sqlite3 php8.2-gd \
<span class="text-secondary">  23</span>         php8.2-curl \
<span class="text-secondary">  24</span>         php8.2-imap php8.2-mysql php8.2-mbstring \
<span class="text-secondary">  25</span>         php8.2-xml php8.2-zip php8.2-bcmath php8.2-soap \
<span class="text-secondary">  26</span>         php8.2-intl php8.2-readline \
<span class="text-secondary">  27</span>         php8.2-ldap \
<span class="text-secondary">  28</span>         php8.2-msgpack php8.2-igbinary php8.2-redis php8.2-swoole \
<span class="text-secondary">  29</span>         php8.2-memcached php8.2-pcov php8.2-xdebug <mark>imagemagick</mark> \
<span class="text-secondary">  30</span>      && curl -sLS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer \
<span class="text-secondary">  31</span>      && curl -sLS https://deb.nodesource.com/setup_$NODE_VERSION.x | bash - \
<span class="text-secondary">  32</span>      && apt-get install -y nodejs \
<span class="text-secondary">  33</span>      && npm install -g npm \
<span class="text-secondary">  34</span>      && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | gpg --dearmor | tee /etc/apt/keyrings/yarn.gpg >/dev/null \
<span class="text-secondary">  35</span>      && echo "deb [signed-by=/etc/apt/keyrings/yarn.gpg] https://dl.yarnpkg.com/debian/ stable main" > /etc/apt/sources.list.d/yarn.list \
<span class="text-secondary">  36</span>      && curl -sS https://www.postgresql.org/media/keys/ACCC4CF8.asc | gpg --dearmor | tee /etc/apt/keyrings/pgdg.gpg >/dev/null \
<span class="text-secondary">  37</span>      && echo "deb [signed-by=/etc/apt/keyrings/pgdg.gpg] http://apt.postgresql.org/pub/repos/apt jammy-pgdg main" > /etc/apt/sources.list.d/pgdg.list \
<span class="text-secondary">  38</span>      && apt-get update \
<span class="text-secondary">  39</span>      && apt-get install -y yarn \
<span class="text-secondary">  40</span>      && apt-get install -y mysql-client \
<span class="text-secondary">  41</span>      && apt-get install -y postgresql-client-$POSTGRES_VERSION \
<span class="text-secondary">  42</span>      && apt-get -y autoremove \
<span class="text-secondary">  43</span>      && apt-get clean \
<span class="text-secondary">  44</span>      && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
<span class="text-secondary">  45</span>
<span class="text-secondary">  46</span>  RUN setcap "cap_net_bind_service=+ep" /usr/bin/php8.2
<span class="text-secondary">  47</span>
<span class="text-secondary">  48</span>  RUN groupadd --force -g $WWWGROUP sail
<span class="text-secondary">  49</span>  RUN useradd -ms /bin/bash --no-user-group -g $WWWGROUP -u 1337 sail
<span class="text-secondary">  50</span>
<span class="text-secondary">  51</span>  COPY start-container /usr/local/bin/start-container
<span class="text-secondary">  52</span>  COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
<span class="text-secondary">  53</span>  COPY php.ini /etc/php/8.2/cli/conf.d/99-sail.ini
<span class="text-secondary">  54</span>  RUN chmod +x /usr/local/bin/start-container
<span class="text-secondary">  55</span>
<span class="text-secondary">  56</span>  EXPOSE 8000
<span class="text-secondary">  57</span>
<span class="text-secondary">  58</span>  <mark>ENTRYPOINT ["start-container"]</mark></code></pre>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <p><a href="http://supervisord.org/introduction.html">Supervisor</a> starts a process for the development server.</p>
                <p>I work on a local version of this site at 0.0.0.0:80 in my browser.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card rounded-0 mb-3">
                    <div class="card-header">
                        <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/docker/8.2/start-container">/docker/8.2/start-container</a>
                    </div>
                    <div class="card-body">
<pre ><code><span class="text-secondary">  16</span>  exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf</code></pre>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card rounded-0 mb-3">
                    <div class="card-header">
                        <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/docker/8.2/supervisord.conf">/docker/8.2/supervisord.conf</a>
                    </div>
                    <div class="card-body">
                        <pre ><code><span class="text-secondary">   8</span>  command=/usr/bin/<mark>php</mark> -d variables_order=EGPCS /var/www/html/<mark>artisan serve</mark> --host=0.0.0.0 --port=80</code></pre>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <h5>Production deployment</h5>
                <p>Heroku deployment is different. I push my changes to a github repository.</p>
                <p>They serve my application from the public directory using Apache.</p>
                <p>I build my frontend assets before pushing a commit.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1 ">
                <div class="card rounded-0 mb-3"> <div class="card-header">
                        <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/Procfile">/Procfile</a>
                    </div>
                    <div class="card-body">
<pre ><code><span class="text-secondary">   1</span>  web: vendor/bin/heroku-php-apache2 public/</code></pre>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1 ">
                <div class="card rounded-0 mb-3"> <div class="card-header">
                        <p>Terminal command</p>
                    </div>
                    <div class="card-body">
<pre ><code><span class="text-secondary">   %</span>  git push origin master</code></pre>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
