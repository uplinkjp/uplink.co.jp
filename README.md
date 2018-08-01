# UPLINK.CO.JP

## Documents

- [Google Drive](https://drive.google.com/drive/u/1/folders/0AOv3OX6hKyzzUk9PVA)

---

## Dependencies

- Docker for Mac

### Init

http://uplink.test

**/etc/hosts**

```sh
127.0.0.1    uplink.test
```

```sh
$ docker-compose build
$ docker-compose up -d
```

### Start

```sh
$ docker-compose up -d
```

### Stop

```sh
$ docker-compose stop
```

### Dump

```sh
$ docker exec -it bash uplink_mysql
$ mysqldump -u uplink -p uplink > develop.sql #PW: 3030
```

### Admin

http://uplink.test/wp/wp-admin

- ID: dev / PW: `OAYs^pu273B*hOcb70`