# Laravel Template Frontend

## Tree
```bash
├───assets                             # Applications source foder
│   ├───codebase                       # Codebase source
│   │   ├───fonts                      # 
│   │   ├───js                         #
│   │   │   └───codebase.js            # import Codebase from 'codebase'
│   │   └───scss                       # Codebase styles
│   ├───fonts                          # Fonts
│   │   ├───admin                      # Admin app fonts
│   │   └───client                     # Client app fonts
│   ├───images                         # Images root
│   │   ├───admin                      # Admin app images required by scss
│   │   │   └───static                 # Static images (copied into public/admin/images/static)
│   │   └───client                     # Client app images required by scss
│   │       └───static                 # Static images (copied into public/cleint/images/static)
│   ├───js                             # Javascript root
│   │   ├───admin                      # Admin app source
│   │   │   ├───Api                    # Api root
│   │   │   │   └───shared             # Shared api modules
│   │   │   └───pages                  # Pages root (each file === webpack enry)
│   │   │       └───shared             # Shared pages modules
│   │   ├───client                     # Client app source
│   │   │   └───pages                  # Pages root (each file === webpack enry)
│   │   └───common                     # Shared modules
│   │       ├───snippets               # 
│   │       └───utils                  # 
│   └───sass                           # SCSS root
│       ├───admin                      # Admin app sources
│       │   ├───components             # 
│       │   ├───core                   # 
│       │   ├───pages                  # Pages root (each file === webpack entry)
│       │   └───vendor                 # 
│       └───client                     # Client app sources
│           ├───components             # 
│           ├───core                   # 
│           └───pages                  # Pages root (each file === webpack entry)
│           └───vendor                 # 
├───lang                               # 
└───views                              # Views root
    ├───admin                          # Admin app views
    │   ├───components                 # App components
    │   └───pages                      # App pages
    └───client                         # Client app views
        ├───components                 # App components
        └───pages                      # App pages
```


## Applications

### Javascript
##### Structure
```bash
├───admin                      # App source (admin/client)
│   ├───Api                    # API
│   │   └───shared             # API shared functionality
│   ├───pages                  # Pages root (each file === webpack enry)
│   │   └───shared             # Pages shared functionality
│   ├───modules                # Modules root
│   │    └───shared            # modules shared functionality
│   └───shared                 # App shared functionality
└───common                     # Common functionality between admin/client apps
```

* All **shared** folders must contain only parent directory shared functionality.
* **API** - All communications with the server must be placed here.
* **modules** - contains separated modules (js/vuejs)
* **pages** - All the magic begins here. You must import all the necessary dependencies here.  Each file is a webpack entry. One page = one file.*
* **core.js** - App main file. Should be imported in each `page`.

##### About

Both applications written at ES2015+ and bundled with [laravel-mix](https://github.com/JeffreyWay/laravel-mix/tree/master/docs#readme).

### Styles
```bash
├───client                    # App source (admin/client)
│   ├───components            # Components (heade/footer/input/etc...)
│   ├───core                  # Framework (bootstrap/flexboxgrid2)
│   ├───pages                 # Pages root (each file === webpack enry)
│   └───vendor                # Vendor libraries override should be placed here
```

##### About 
All styles handled by webpack. So all relative import are resolved and copied into `public/(client|admin)/assets/(images|fonts)`.

### Assets (images/fonts)
```bash
├───assets                    # 
│   ├───fonts                 # 
│   │   ├───admin             # Admin app fonts
│   │   └───client            # Client app fonts
│   ├───images                # 
│   │   ├───admin             # Admin app images required in css
│   │   │   └───static        # All files from here will be copied
│   │   └───client            # Client app images required in css
│   │       └───static        # All files from here will be copied
```

##### About 

* `images/(admin|client)/static` - Will be copied into `public/(admin|client)/assets/images/static`

## CODEBASE

Admin application structure is the same as client application structure.

###### Admin app based on **Codebase 2.2** UI Template

* Codebase layout could be configured in `.env`
