# UPLINK.CO.JP

## Documents

- [Google Drive](https://drive.google.com/drive/u/1/folders/0AOv3OX6hKyzzUk9PVA)

---

## Dependencies

- Docker for Mac

### Init

- UPLINK: http://uplink.test
- UPLINK渋谷: http://shibuya.uplink.test
- UPLINK吉祥寺: http://joji.uplink.test

**/etc/hosts**

```sh
127.0.0.1    uplink.test
127.0.0.1    shibuya.uplink.test
127.0.0.1    joji.uplink.test
```

```sh
$ bin/uplink build
$ bin/uplink start
```

### Start

```sh
$ bin/uplink start
```

### Stop

```sh
$ bin/uplink stop
```

### Dump

```sh
$ bin/uplink ssh mysql
$ mysqldump -u uplink -p uplink > develop.sql #PW: 3030
```

### Admin

http://uplink.test/wp/wp-admin

- ID: dev / PW: `OAYs^pu273B*hOcb70`