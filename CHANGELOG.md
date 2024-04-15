# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/) ([Spanish version](https://keepachangelog.com/es-ES/1.0.0/)),and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html) (or at least I'll try to).

### [Version 1.0.2.3](https://github.com/LuisColome/CoreFunctionalityPlugin/releases/tag/v1.0.2.3) - 2024-15-04

#### Changed

-   New styles to login page.

#### Remove

-   Link to plugins from admin bar (Included from WP 6.5).
-   Link to Patterns (former reusable blocks). It been included in WP 6.5

### [Version 1.0.2.2](https://github.com/LuisColome/CoreFunctionalityPlugin/releases/tag/v1.0.2.2) - 2023-15-06

#### Fixed

-   Fixed Merge conflicts
-   Fixed comments and version on main file.

### [Version 1.0.2.1](https://github.com/LuisColome/CoreFunctionalityPlugin/releases/tag/v1.0.2.1) - 2023-14-06

#### Added

-   Add new login screen file
-   Add images directory with the fallback logo
-   Add a function to call an image withim the plugin (commented for now)

#### Changed

-   Require new login screen file + fix comments on the main PHP file
-   Update function to change post name on WP to anything. (by default are Blog articles).

### [Version 1.0.1.2](https://github.com/LuisColome/CoreFunctionalityPlugin/releases/tag/v1.0.1.2) - 2021-13-08

#### Added

-   Link to Reusable Blocks in Appearance menu.

### [Version 1.0.1.1](https://github.com/LuisColome/CoreFunctionalityPlugin/releases/tag/v1.0.1.1) - 2021-31-05

#### Fixed

-   Target of plugins link on the Admin bar added in version 1.0.0.

### [Version 1.0.1](https://github.com/LuisColome/CoreFunctionalityPlugin/releases/tag/v1.0.1) - 2021-31-05

#### Fixed

-   Remove the Changelog list from the Readme file and create a proper separate file.
-   Update the Changelog format for a better human readability.

#### Updated

-   Readme file.

### [Version 1.0.0]

#### Removed

-   The Login Logo URL function, as it was added to my [Genesis Starter Theme](https://github.com/LuisColome/the-dock).

#### Added

-   A function to add a link to the Plugins page from the Frontend under Site's name.

#### Fixed

-   Cleaner the code.

#### Updated

-   README file.

### [Version 0.9.5]

#### Added

-   Team CPT that I use in almost every WordPress Website I lately create.
-   Category pagination fix when /%category%/%post%/ permaling structure is used to avoid 404 errors.

### [Version 0.9.0]

#### Added

-   More nodes to remove from WordPress Admin Bar. Just uncomment them to remove those nodes.
-   The file 'kill-pingbacks.php' to kill all the pingbacks from WordPress.

#### Updated

-   Tested in 5.7 WordPress version.
-   README.md file.
