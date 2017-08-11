# Babble quickstart project

## Getting started
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

## Website structure

#### /build
Static HTML files that can be served from anywhere, even without PHP support. Built with `php babble build`.

#### /cache
Cached HTML files and dependency tracking generated upon a page's first page load. This is used when access to the admin interface is required in production, and pages are re-cached when changes occur.

#### /content
YAML files for your site's content. This directory contains sub directories for each model,
in which content is stored as one record per file, organized by record ID
(example: `/models/Page/about.yaml`).

#### /models
Defines data types for the site. All data types (models) must be capitalized (Page, not page)
.yaml files. See this directory for examples.

##### /models/blocks
Similar to models, but may be used in "list" fields. Example: You want a gallery. Create an
"Image" block with the fields "image" and "description", and set this as the only available
block for your list field. This allows you to specify any number of "Image" blocks for this
content type.

#### /public
Contains any publicly available content, including index.php which initiates Babble and
serves all requests. As long as index.php is left unchanged, you are free to make changes
in this directory.

#### /templates
This directory contains Twig templates which will be matched against request path and
models.

Templates starting with a lowercase character are rendered directly (like `blog.twig`) 
when a request to `/blog` is received. Capitalized templates are matched against models, 
so if there's a `Page.twig` file, and a request for `/about` doesn't match `about.twig`, 
it will be assumed to be a `Page`, and rendered accordingly.

Templates prefixed with underscores (_) are hidden, and can be used with template
inheritance or for special purposes (`_404.twig` is used when no content was found). 
Often you want a `_base.twig` file for your site's layout, and extend from this for any
other page.