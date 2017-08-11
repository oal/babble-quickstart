# Babble quickstart project

```bash
# Clone / download the quickstart repository and install dependencies.
git clone git@github.com:oal/babble-quickstart.git my-website
cd my-website
composer install

# Start dev server
composer dump-autoload -o
php babble serve

# Build static HTML version
php babble build
```