# php-html-parser
I received task to implement simple xml parser, which can:

1. read tag name on input and parse all items, which are wrapped to required tag.
2. Reading all necessary data from that (depending on tag name).
3. Writing data to prostgres.
4. Implement a simple showcase API.
5. Simple SPA for planning tasks and getting results

# installation
using docker-compose and git you can run this app bundle on your docker.
```
git clone http://github.com/johnynsk/php-html-parser.git && cd php-html-parser
docker-compose up
```
go to http://localhost:8801 and check it.
