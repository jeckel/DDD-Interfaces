# DDD-Interfaces
Collections of interfaces and traits usable for DDD projects

# Run Tests


```bash
docker run -v `pwd`:/project --rm -it --workdir /project php:alpine php vendor/bin/phpunit --bootstrap vendor/autoload.php tests
```
