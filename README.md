# prj_tinymarket
tinymarket

- [Probando servor](https://youtu.be/ansUGkcrhwY?t=753)
    - `sudo npm install -g servor`
    - para probar el compilado de react
    - escucha cambios en la carpeta build (react): `servor build index.html 3000 --reload`
    
- [Iconos](https://www.flaticon.com/packs/beauty-15)

- **sqlyog**
    - ![](https://trello-attachments.s3.amazonaws.com/5eb15644e823d340ffa477fd/1137x655/c15826378e1748154745cc134ea879cb/image.png)

- Generando entidades a partir de la bd
    - `php bin/console --env=local  doctrine:mapping:import "App\Entity" annotation --path=src/Entity`
        - Es importante que en **.env.local** exista la linea con ip de localhost:
            - `DATABASE_URL=mysql://root:1234@127.0.0.1:3306/db_tinymarket?serverVersion=5.7`

- [Tema admin - Github](https://github.com/creativetimofficial/light-bootstrap-dashboard)
- Pasar el build a synfony
    - `py.sh "/Users/ioedu/projects/prj_tinymarket/frontend_react/pannel/.pysh" index react`

- **Generar entidades**
    - cambiar en **.env.local** la ruta a la bd
    - `DATABASE_URL=mysql://root:1234@127.0.0.1:3306/db_tinymarket?serverVersion=5.7 #esto para lanzarlo desde la maquina host`
    - `php bin/console --env=local doctrine:mapping:import "App\Entity" annotation --path=src/Entity`

### Errores
```
Google Maps JavaScript API error: ApiNotActivatedMapError
https://developers.google.com/maps/documentation/javascript/error-messages#api-not-activated-map-error
_.od @ js?v=3.exp&key=AIzaSyDimWax6oDetilbXKqdmmoIIxHREyJ4aY0:54
(anonymous) @ common.js:73
(anonymous) @ common.js:150
c @ common.js:67
(anonymous) @ AuthenticationService.Authenticate?1shttps%3A%2F%2Fwww.tinymarket.es%2Fcontacto&4sAIzaSyDimWax6oDetilbXKqdmmoIIxHREyJ4aY0&callback=_xdc_._z6v3h5&key=AIzaSyDimWax6oDetilbXKqdmmoIIxHREyJ4aY0&token=72486:1
```
- Habia que entrar [aqui](https://console.cloud.google.com/google/maps-apis/apis/maps-backend.googleapis.com/metrics?project=tinymarket-es&folder=&organizationId=)
- Google no me indexaba
```
solucion:
# framework.yaml
# seo
disallow_search_engine_index: false
```
- Error con ocramius/proxy-manager
```
Your requirements could not be resolved to an installable set of packages.
Problem 1
- Installation request for ocramius/proxy-manager 2.8.0 -> satisfiable by ocramius/proxy-manager[2.8.0].
- ocramius/proxy-manager 2.8.0 requires php ~7.4.1 -> your PHP version (7.4.0) does not satisfy that requirement.
Problem 2
- ocramius/proxy-manager 2.8.0 requires php ~7.4.1 -> your PHP version (7.4.0) does not satisfy that requirement.
- doctrine/migrations 2.2.1 requires ocramius/proxy-manager ^2.0.2 -> satisfiable by ocramius/proxy-manager[2.8.0].
- Installation request for doctrine/migrations 2.2.1 -> satisfiable by doctrine/migrations[2.2.1].
make[2]: *** [composer-install] Error 2
make[1]: *** [prepare] Error 2
make: *** [docker-sync-restart] Error 2

solucion:
En composer.lock he cambiado esta linea:
"require": {
    "laminas/laminas-code": "^3.4.1",
    "ocramius/package-versions": "^1.8.0",
    "php": "~7.4.1", --> a 7.4.0
    "webimpress/safe-writer": "^2.0.1"
},
esto terminará dando algun error en el futuro (cuando use persistencia), pero por lo menos docker ya se levanta
```
- Error 502 Bad Gateway nginx/1.17.7
```
Hay que reiniciar el contenedor de nginx 
docker stop sf-tinymarket-be
docker start sf-tinymarket-be
```
- Error *Access denied, the user is neither anonymous, nor remember-me.*
```
Estoy usando roles tipo 1,2,3,4,5 y deben ser ROLE_1,...N, con prefijo ROLE
```
- Redireccion en login:
`security.yaml: default_target_path: tasks`
- Error 500 al no encontrar favico.ico
`@todo`
